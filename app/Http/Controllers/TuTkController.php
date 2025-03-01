<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Routing\Controller;

class TuTkController extends Controller
{

    public function index()
    {
        // Assuming you have a column 'jenjang' in your 'Siswa' model to filter by SMA
        $siswa = Siswa::where('jenjang', 'TK')->get();

        // Menghitung jumlah siswa yang berada di kelas 10
        $countKelas10 = $siswa->where('kelas', 'a')->count();
        $countKelas11 = $siswa->where('kelas', 'b')->count();
        $countKelas12 = $siswa->where('kelas', 'kb')->count();
        $countsiswa = Siswa::where('jenjang', 'TK')->count();

        $siswaSMA = Siswa::where('jenjang', 'TK')->pluck('id');

        // Assuming $startDate and $endDate are coming from your form inputs
        $startDate = request('start_date');
        $endDate = request('end_date');

        $transaksisma = Transaksi::whereIn('tagihan_id', function ($query) use ($siswaSMA) {
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

        $transaksi = Transaksi::whereHas('tagihan.siswa', function ($query) {
            $query->where('jenjang', 'TK');
        })
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->with(['tagihan.siswa'])
            ->get();


        $countTransaksi = $transaksi->count();


        $startDate = Carbon::now()->startOfMonth();  // First day of the current month
        $endDate = Carbon::now()->endOfMonth();      // Last day of the current month

        $siswaSMP = Siswa::where('jenjang', 'tk')->pluck('id');
        $transaksismp = Transaksi::whereIn('tagihan_id', function ($query) use ($siswaSMP) {
            $query->select('id')
                ->from('tagihans')
                ->whereIn('siswa_id', $siswaSMP);
        })
            ->whereBetween('created_at', [$startDate, $endDate]) // Filter by date range
            ->whereIn('keterangan', ['spp', 'lain-lain']) // Only process SPP and 'dll' transactions
            ->select('tagihan_id', 'created_at', 'nominal_bayar')
            ->get();

        $totalNominalBayarSMP = $transaksismp->sum('nominal_bayar'); // Sum the nominal_bayar fiel


        $transaksispp = Transaksi::whereHas('tagihan.siswa', function ($query) {
            $query->where('jenjang', 'sd');
        })
            ->where('keterangan', 'spp') // Ubah nama SPP menjadi Pembayaran Bulanan
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->with(['tagihan.siswa'])
            ->get();

        $countTransaksispp = $transaksispp->count();

        $transaksidu = Transaksi::whereHas('tagihan.siswa', function ($query) {
            $query->where('jenjang', 'tk');
        })
            ->where('keterangan', 'du') // Ubah nama SPP menjadi Pembayaran Bulanan
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->with(['tagihan.siswa'])
            ->get();

        $countTransaksidu = $transaksidu->count();

        $transaksimutasi = Transaksi::whereHas('tagihan.siswa', function ($query) {
            $query->where('jenjang', 'tk');
        })
            ->where('keterangan', 'mutasi') // Ubah nama SPP menjadi Pembayaran Bulanan
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->with(['tagihan.siswa'])
            ->get();

        $countTransaksimutasi = $transaksimutasi->count();


        return view('page.tu-tk.index', compact('countTransaksimutasi', 'countTransaksidu', 'countTransaksispp', 'totalNominalBayarSMP', 'countsiswa', 'countKelas10', 'countKelas11', 'countKelas12', 'totalNominalBayar', 'transaksi', 'countTransaksi'));
    }


    public function siswa()
    {
        // Assuming you have a column 'jenjang' in your 'Siswa' model to filter by SMA
        $siswa = Siswa::where('jenjang', 'tk')->get();
        return view('page.tu-tk.siswa', compact('siswa'));
    }

    public function kelasA()
    {
        $transaksi = Transaksi::whereHas('tagihan.siswa', function ($query) {
            $query->where('kelas', 'a');
        })
            ->where('keterangan', 'spp')
            ->get();

        return view('page.tu-tk.kelasA', compact('transaksi'));
    }

    public function kelasB()
    {
        $transaksi = Transaksi::whereHas('tagihan.siswa', function ($query) {
            $query->where('kelas', 'b');
        })
            ->where('keterangan', 'spp')
            ->get();

        return view('page.tu-tk.kelasB', compact('transaksi'));
    }

    public function kelasKB()
    {
        $transaksi = Transaksi::whereHas('tagihan.siswa', function ($query) {
            $query->where('kelas', 'kb');
        })
            ->where('keterangan', 'spp')
            ->get();

        return view('page.tu-tk.kelasKB', compact('transaksi'));
    }
}
