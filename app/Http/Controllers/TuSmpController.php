<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TuSmpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index()
     {
       // Assuming you have a column 'jenjang' in your 'Siswa' model to filter by SMA
       $siswa = Siswa::where('jenjang', 'SMA')->get();
 
       // Menghitung jumlah siswa yang berada di kelas 10
       $countKelas10 = $siswa->where('kelas', 7)->count();
       $countKelas11 = $siswa->where('kelas', 8)->count();
       $countKelas12 = $siswa->where('kelas', 9)->count();
       $countsiswa = Siswa::where('jenjang', 'SMP')->count();
 
       $siswaSMA = Siswa::where('jenjang', 'SMP')->pluck('id');
 
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
             $query->where('jenjang', 'smp');
         })
         ->whereMonth('created_at', now()->month)
         ->whereYear('created_at', now()->year)
         ->with(['tagihan.siswa'])
         ->get();
 
 
         $countTransaksi = $transaksi->count();
     
 
 
 
       return view('page.tu-smp.index', compact('countsiswa','countKelas10','countKelas11','countKelas12','totalNominalBayar','transaksi','countTransaksi'));
 
     }
 
 
     public function siswa()
     {
       // Assuming you have a column 'jenjang' in your 'Siswa' model to filter by SMA
         $siswa = Siswa::where('jenjang', 'smp')->get();
         return view('page.tu-smp.siswa', compact('siswa'));
     }

     public function kelas7()
     {
         $transaksi = Transaksi::whereHas('tagihan.siswa', function ($query) {
             $query->where('kelas', '7');
         })
         ->where('keterangan', 'spp')
         ->get();
     
         return view('page.tu-smp.kelas7', compact('transaksi'));
     }
     
     public function kelas8()
     {
         $transaksi = Transaksi::whereHas('tagihan.siswa', function ($query) {
             $query->where('kelas', '8');
         })
         ->where('keterangan', 'spp')
         ->get();
 
         return view('page.tu-smp.kelas8', compact('transaksi'));
     }
 
     public function kelas9()
     {
         $transaksi = Transaksi::whereHas('tagihan.siswa', function ($query) {
             $query->where('kelas', '9');
         })
         ->where('keterangan', 'spp')
         ->get();
 
         return view('page.tu-smp.kelas9', compact('transaksi'));
     }
     
}
