<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Tagihan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TuSmaController extends Controller
{


    public function index()
    {
      // Assuming you have a column 'jenjang' in your 'Siswa' model to filter by SMA
      $siswa = Siswa::where('jenjang', 'SMA')->get();

      // Menghitung jumlah siswa yang berada di kelas 10
      $countKelas10 = $siswa->where('kelas', 10)->count();
      $countKelas11 = $siswa->where('kelas', 11)->count();
      $countKelas12 = $siswa->where('kelas', 12)->count();
      $countsiswa = Siswa::where('jenjang', 'SMA')->count();

      $siswaSMA = Siswa::where('jenjang', 'SMA')->pluck('id');

      // Assuming $startDate and $endDate are coming from your form inputs
        $startDate = request('start_date');
        $endDate = request('end_date');

        $transaksisma = Transaksi::whereIn('tagihan_id', function($query) use ($siswaSMA) {
                $query->select('id')
                    ->from('tagihans') 
                    ->whereIn('siswa_id', $siswaSMA);
            })
            ->whereBetween('created_at', [$startDate, $endDate]) // Filter by date range
            ->select('tagihan_id', 'created_at', 'nominal_bayar')
            ->get();

        $totalNominalBayar = $transaksisma->sum('nominal_bayar');

        $transaksi = Transaksi::whereHas('tagihan.siswa', function($query) {
            $query->where('jenjang', 'sma');
        })
        ->whereMonth('created_at', now()->month)
        ->whereYear('created_at', now()->year)
        ->with(['tagihan.siswa'])
        ->get();
    



      return view('page.tu-sma.index', compact('countsiswa','countKelas10','countKelas11','countKelas12','totalNominalBayar','transaksi'));

    }


    public function siswa()
    {
      // Assuming you have a column 'jenjang' in your 'Siswa' model to filter by SMA
        $siswa = Siswa::where('jenjang', 'SMA')->get();
        return view('page.tu-sma.siswa', compact('siswa'));
    }

    public function smatabel()
    {
        // Create a mapping of English month abbreviations to Indonesian
        $monthMapping = [
            'Jan' => 'Jan', 'Feb' => 'Peb', 'Mar' => 'Mar', 'Apr' => 'Apr',
            'May' => 'Mei', 'Jun' => 'Jun', 'Jul' => 'Jul', 'Aug' => 'Agst',
            'Sep' => 'Sep', 'Oct' => 'Okt', 'Nov' => 'Nov', 'Dec' => 'Des'
        ];
    
        // Fetch the tagihan data with related siswa and transaksi
        $tagihan = Tagihan::whereHas('siswa', function ($query) {
            $query->where('jenjang', 'sma');
        })
        ->with(['siswa', 'transaksi'])
        ->get();
    
        // Split the data into kelas 10, 11, and 12
        $kelas10 = $tagihan->filter(function ($siswa) {
            return $siswa->siswa->kelas == '10';
        });
    
        $kelas11 = $tagihan->filter(function ($siswa) {
            return $siswa->siswa->kelas == '11';
        });
    
        $kelas12 = $tagihan->filter(function ($siswa) {
            return $siswa->siswa->kelas == '12';
        });
    
        // Process each siswa to calculate monthly totals
        $kelas10 = $kelas10->map(function ($siswa) use ($monthMapping) {
            $monthlyTotals = array_fill_keys(['Jul', 'Agst', 'Sep', 'Okt', 'Nov', 'Des', 'Jan', 'Peb', 'Mar', 'Apr', 'Mei', 'Jun'], 0);
            foreach ($siswa->transaksi as $transaksi) {
                $englishMonth = $transaksi->created_at->format('M');
                $month = $monthMapping[$englishMonth] ?? null;
                if ($month && isset($monthlyTotals[$month])) {
                    $monthlyTotals[$month] += $transaksi->nominal_bayar;
                }
            }
            $siswa->monthlyTotals = $monthlyTotals;
            return $siswa;
        });
    
        $kelas11 = $kelas11->map(function ($siswa) use ($monthMapping) {
            $monthlyTotals = array_fill_keys(['Jul', 'Agst', 'Sep', 'Okt', 'Nov', 'Des', 'Jan', 'Peb', 'Mar', 'Apr', 'Mei', 'Jun'], 0);
            foreach ($siswa->transaksi as $transaksi) {
                $englishMonth = $transaksi->created_at->format('M');
                $month = $monthMapping[$englishMonth] ?? null;
                if ($month && isset($monthlyTotals[$month])) {
                    $monthlyTotals[$month] += $transaksi->nominal_bayar;
                }
            }
            $siswa->monthlyTotals = $monthlyTotals;
            return $siswa;
        });
    
        $kelas12 = $kelas12->map(function ($siswa) use ($monthMapping) {
            $monthlyTotals = array_fill_keys(['Jul', 'Agst', 'Sep', 'Okt', 'Nov', 'Des', 'Jan', 'Peb', 'Mar', 'Apr', 'Mei', 'Jun'], 0);
            foreach ($siswa->transaksi as $transaksi) {
                $englishMonth = $transaksi->created_at->format('M');
                $month = $monthMapping[$englishMonth] ?? null;
                if ($month && isset($monthlyTotals[$month])) {
                    $monthlyTotals[$month] += $transaksi->nominal_bayar;
                }
            }
            $siswa->monthlyTotals = $monthlyTotals;
            return $siswa;
        });
    
        // Pass the processed data to the view
        return view('page.tu-sma.sma', compact('kelas10', 'kelas11', 'kelas12'));
    }

    public function kelas10()
    {
        $transaksi = Transaksi::whereHas('tagihan.siswa', function ($query) {
            $query->where('kelas', '10');
        })
        ->where('keterangan', 'spp')
        ->get();
    
        return view('page.tu-sma.kelas10', compact('transaksi'));
    }
    

    public function kelas11()
    {
        $transaksi = Transaksi::whereHas('tagihan.siswa', function ($query) {
            $query->where('kelas', '11');
        })
        ->where('keterangan', 'spp')
        ->get();

        return view('page.tu-sma.kelas11', compact('transaksi'));
    }

    public function kelas12()
    {
        $transaksi = Transaksi::whereHas('tagihan.siswa', function ($query) {
            $query->where('kelas', '12');
        })
        ->where('keterangan', 'spp')
        ->get();

        return view('page.tu-sma.kelas12', compact('transaksi'));
    }
}
