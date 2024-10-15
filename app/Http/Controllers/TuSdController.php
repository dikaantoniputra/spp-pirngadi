<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TuSdController extends Controller
{

    public function index()
    {
      // Assuming you have a column 'jenjang' in your 'Siswa' model to filter by SMA
      $siswa = Siswa::where('jenjang', 'TK')->get();

      // Menghitung jumlah siswa yang berada di kelas 10
      $countKelas10 = $siswa->where('kelas', '1')->count();
      $countKelas11 = $siswa->where('kelas', '2')->count();
      $countKelas12 = $siswa->where('kelas', '3')->count();
      $countsiswa = Siswa::where('jenjang', 'TK')->count();

      $siswaSMA = Siswa::where('jenjang', 'SD')->pluck('id');

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
            $query->where('jenjang', 'SD');
        })
        ->whereMonth('created_at', now()->month)
        ->whereYear('created_at', now()->year)
        ->with(['tagihan.siswa'])
        ->get();


        $countTransaksi = $transaksi->count();
    

      return view('page.tu-tk.index', compact('countsiswa','countKelas10','countKelas11','countKelas12','totalNominalBayar','transaksi','countTransaksi'));

    }

    public function siswa()
    {
      // Assuming you have a column 'jenjang' in your 'Siswa' model to filter by SMA
        $siswa = Siswa::where('jenjang', 'sd')->get();
        return view('page.tu-sd.siswa', compact('siswa'));
    }

    public function kelas1()
    {
        $transaksi = Transaksi::whereHas('tagihan.siswa', function ($query) {
            $query->where('kelas', '1');
        })
        ->where('keterangan', 'spp')
        ->get();
    
        return view('page.tu-sd.kelas1', compact('transaksi'));
    }
    
    public function kelas2()
    {
        $transaksi = Transaksi::whereHas('tagihan.siswa', function ($query) {
            $query->where('kelas', '2');
        })
        ->where('keterangan', 'spp')
        ->get();

        return view('page.tu-sd.kelas2', compact('transaksi'));
    }

    public function kelas3()
    {
        $transaksi = Transaksi::whereHas('tagihan.siswa', function ($query) {
            $query->where('kelas', '3');
        })
        ->where('keterangan', 'spp')
        ->get();

        return view('page.tu-sd.kelas3', compact('transaksi'));
    }

    public function kelas4()
    {
        $transaksi = Transaksi::whereHas('tagihan.siswa', function ($query) {
            $query->where('kelas', '4');
        })
        ->where('keterangan', 'spp')
        ->get();
    
        return view('page.tu-sd.kelas4', compact('transaksi'));
    }
    
    public function kelas5()
    {
        $transaksi = Transaksi::whereHas('tagihan.siswa', function ($query) {
            $query->where('kelas', '5');
        })
        ->where('keterangan', 'spp')
        ->get();

        return view('page.tu-sd.kelas5', compact('transaksi'));
    }

    public function kelas6()
    {
        $transaksi = Transaksi::whereHas('tagihan.siswa', function ($query) {
            $query->where('kelas', '6');
        })
        ->where('keterangan', 'spp')
        ->get();

        return view('page.tu-sd.kelas6', compact('transaksi'));
    }


}