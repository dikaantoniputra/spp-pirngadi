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
            ->whereIn('keterangan', ['spp', 'lain-lain']) // Only process SPP and 'dll' transactions
            ->select('tagihan_id', 'created_at', 'nominal_bayar')
            ->get();

        $totalNominalBayar = $transaksisma->sum('nominal_bayar'); // Sum only 'spp' transactions

        // Additional processing if needed

        $transaksi = Transaksi::whereHas('tagihan.siswa', function($query) {
            $query->where('jenjang', 'sma');
        })
        ->whereMonth('created_at', now()->month)
        ->whereYear('created_at', now()->year)
        ->with(['tagihan.siswa'])
        ->get();


        $countTransaksi = $transaksi->count();
    



      return view('page.tu-sma.index', compact('countsiswa','countKelas10','countKelas11','countKelas12','totalNominalBayar','transaksi','countTransaksi'));

    }


    public function siswa()
    {
      // Assuming you have a column 'jenjang' in your 'Siswa' model to filter by SMA
        $siswa = Siswa::where('jenjang', 'SMA')->get();
        return view('page.tu-sma.siswa', compact('siswa'));
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
