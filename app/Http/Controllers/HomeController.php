<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $countsiswaSma = Siswa::where('jenjang', 'SMA')->where('status', 0)->count();
        $countsiswaSmp = Siswa::where('jenjang', 'SMP')->where('status', 0)->count();
        $countsiswaSd  = Siswa::where('jenjang', 'SD')->where('status', 0)->count();
        $countsiswaTk  = Siswa::where('jenjang', 'TK')->where('status', 0)->count();


        $startDate = Carbon::now()->startOfMonth();  // First day of the current month
        $endDate = Carbon::now()->endOfMonth();      // Last day of the current month

        $siswaSMA = Siswa::where('jenjang', 'SMA')->pluck('id');
        $transaksisma = Transaksi::whereIn('tagihan_id', function($query) use ($siswaSMA) {
                $query->select('id')
                    ->from('tagihans')
                    ->whereIn('siswa_id', $siswaSMA);
            })
            ->whereBetween('created_at', [$startDate, $endDate]) // Filter by date range
            ->whereIn('keterangan', ['spp', 'lain-lain']) // Only process SPP and 'dll' transactions
            ->select('tagihan_id', 'created_at', 'nominal_bayar')
            ->get();

        $totalNominalBayarSMA = $transaksisma->sum('nominal_bayar'); // Sum the nominal_bayar field


        $siswaSMP = Siswa::where('jenjang', 'SMP')->pluck('id');
        $transaksismp = Transaksi::whereIn('tagihan_id', function($query) use ($siswaSMP) {
                $query->select('id')
                    ->from('tagihans')
                    ->whereIn('siswa_id', $siswaSMP);
            })
            ->whereBetween('created_at', [$startDate, $endDate]) // Filter by date range
            ->whereIn('keterangan', ['spp', 'lain-lain']) // Only process SPP and 'dll' transactions
            ->select('tagihan_id', 'created_at', 'nominal_bayar')
            ->get();

        $totalNominalBayarSMP = $transaksismp->sum('nominal_bayar'); // Sum the nominal_bayar field

        $siswaSD = Siswa::where('jenjang', 'SD')->pluck('id');
        $transaksisd = Transaksi::whereIn('tagihan_id', function($query) use ($siswaSD) {
                $query->select('id')
                    ->from('tagihans')
                    ->whereIn('siswa_id', $siswaSD);
            })
            ->whereBetween('created_at', [$startDate, $endDate]) // Filter by date range
            ->whereIn('keterangan', ['spp', 'lain-lain']) // Only process SPP and 'dll' transactions
            ->select('tagihan_id', 'created_at', 'nominal_bayar')
            ->get();

        $totalNominalBayarSD = $transaksisd->sum('nominal_bayar'); // Sum the nominal_bayar field

        $siswaTK = Siswa::where('jenjang', 'TK')->pluck('id');
        $transaksisd = Transaksi::whereIn('tagihan_id', function($query) use ($siswaTK) {
                $query->select('id')
                    ->from('tagihans')
                    ->whereIn('siswa_id', $siswaTK);
            })
            ->whereBetween('created_at', [$startDate, $endDate]) // Filter by date range
            ->whereIn('keterangan', ['spp', 'lain-lain']) // Only process SPP and 'dll' transactions
            ->select('tagihan_id', 'created_at', 'nominal_bayar')
            ->get();

            $totalNominalBayarTK = $transaksisd->sum('nominal_bayar'); // Sum the nominal_bayar field

            $transaksi = Transaksi::whereHas('tagihan.siswa', function($query) {
                $query->whereIn('jenjang', ['sma', 'smp', 'sd', 'tk']); // Use whereIn for multiple values
            })
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->with(['tagihan.siswa'])
            ->get();



        $countTransaksi = $transaksi->count();

        // Kirimkan hasil ke view atau lakukan hal lain
        return view('page.index', compact('countsiswaSma','countsiswaSmp','countsiswaSd','countsiswaTk','totalNominalBayarSMA','totalNominalBayarSMP','totalNominalBayarSD','totalNominalBayarTK','countTransaksi','transaksi'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
