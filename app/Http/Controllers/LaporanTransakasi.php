<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Tagihan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class LaporanTransakasi extends Controller
{
    
    public function index()
    {
        $transaksi = Transaksi::whereHas('tagihan.siswa', function($query) {
            $query->where('jenjang', 'tk');
        })->with(['tagihan.siswa'])->get();
    
        return view('page.laporan-transaksi.tk', compact('transaksi'));
    }

    public function sd()
    {
        $transaksi = Transaksi::whereHas('tagihan.siswa', function($query) {
            $query->where('jenjang', 'sd');
        })->with(['tagihan.siswa'])->get();
    
        return view('page.laporan-transaksi.sd', compact('transaksi'));
    }

    public function smp()
    {
        $transaksi = Transaksi::whereHas('tagihan.siswa', function($query) {
            $query->where('jenjang', 'smp');
        })->with(['tagihan.siswa'])->get();
    
        return view('page.laporan-transaksi.smp', compact('transaksi'));
    }

    public function sma()
    {
        $transaksi = Transaksi::whereHas('tagihan.siswa', function($query) {
            $query->where('jenjang', 'sma');
        })->with(['tagihan.siswa'])->get();
    
        return view('page.laporan-transaksi.sma', compact('transaksi'));
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
        return view('page.tabel-transaksi.sma', compact('kelas10', 'kelas11', 'kelas12'));
    }

    public function smptabel()
    {
        // Create a mapping of English month abbreviations to Indonesian
        $monthMapping = [
            'Jan' => 'Jan', 'Feb' => 'Peb', 'Mar' => 'Mar', 'Apr' => 'Apr',
            'May' => 'Mei', 'Jun' => 'Jun', 'Jul' => 'Jul', 'Aug' => 'Agst',
            'Sep' => 'Sep', 'Oct' => 'Okt', 'Nov' => 'Nov', 'Dec' => 'Des'
        ];
    
        // Fetch the tagihan data with related siswa and transaksi
        $tagihan = Tagihan::whereHas('siswa', function ($query) {
            $query->where('jenjang', 'smp');
        })
        ->with(['siswa', 'transaksi'])
        ->get();
    
        // Split the data into kelas 10, 11, and 12
        $kelas7 = $tagihan->filter(function ($siswa) {
            return $siswa->siswa->kelas == '7';
        });
    
        $kelas8 = $tagihan->filter(function ($siswa) {
            return $siswa->siswa->kelas == '8';
        });
    
        $kelas9 = $tagihan->filter(function ($siswa) {
            return $siswa->siswa->kelas == '9';
        });
    
        // Process each siswa to calculate monthly totals
        $kelas7 = $kelas7->map(function ($siswa) use ($monthMapping) {
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
    
        $kelas8 = $kelas8->map(function ($siswa) use ($monthMapping) {
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
    
        $kelas9 = $kelas9->map(function ($siswa) use ($monthMapping) {
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
        return view('page.tabel-transaksi.smp', compact('kelas7', 'kelas8', 'kelas9'));
    }

    public function tktabel()
    {
        // Create a mapping of English month abbreviations to Indonesian
        $monthMapping = [
            'Jan' => 'Jan', 'Feb' => 'Peb', 'Mar' => 'Mar', 'Apr' => 'Apr',
            'May' => 'Mei', 'Jun' => 'Jun', 'Jul' => 'Jul', 'Aug' => 'Agst',
            'Sep' => 'Sep', 'Oct' => 'Okt', 'Nov' => 'Nov', 'Dec' => 'Des'
        ];
    
        // Fetch the tagihan data with related siswa and transaksi
        $tagihan = Tagihan::whereHas('siswa', function ($query) {
            $query->where('jenjang', 'tk');
        })
        ->with(['siswa', 'transaksi'])
        ->get();
    
        // Split the data into kelas 10, 11, and 12
        $kelas7 = $tagihan->filter(function ($siswa) {
            return $siswa->siswa->kelas == 'a';
        });
    
        $kelas8 = $tagihan->filter(function ($siswa) {
            return $siswa->siswa->kelas == 'b';
        });
    
        $kelas9 = $tagihan->filter(function ($siswa) {
            return $siswa->siswa->kelas == 'kb';
        });
    
        // Process each siswa to calculate monthly totals
        $kelas7 = $kelas7->map(function ($siswa) use ($monthMapping) {
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
    
        $kelas8 = $kelas8->map(function ($siswa) use ($monthMapping) {
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
    
        $kelas9 = $kelas9->map(function ($siswa) use ($monthMapping) {
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
        return view('page.tabel-transaksi.tk', compact('kelas7', 'kelas8', 'kelas9'));
    }

    public function sdtabel()
    {
        // Create a mapping of English month abbreviations to Indonesian
        $monthMapping = [
            'Jan' => 'Jan', 'Feb' => 'Peb', 'Mar' => 'Mar', 'Apr' => 'Apr',
            'May' => 'Mei', 'Jun' => 'Jun', 'Jul' => 'Jul', 'Aug' => 'Agst',
            'Sep' => 'Sep', 'Oct' => 'Okt', 'Nov' => 'Nov', 'Dec' => 'Des'
        ];
    
        // Fetch the tagihan data with related siswa and transaksi
        $tagihan = Tagihan::whereHas('siswa', function ($query) {
            $query->where('jenjang', 'sd');
        })
        ->with(['siswa', 'transaksi'])
        ->get();
    
        // Split the data into kelas 10, 11, and 12
        $kelas1 = $tagihan->filter(function ($siswa) {
            return $siswa->siswa->kelas == '1';
        });
    
        $kelas2 = $tagihan->filter(function ($siswa) {
            return $siswa->siswa->kelas == '2';
        });
    
        $kelas3 = $tagihan->filter(function ($siswa) {
            return $siswa->siswa->kelas == '3';
        });

        $kelas4 = $tagihan->filter(function ($siswa) {
            return $siswa->siswa->kelas == '4';
        });
    
        $kelas5 = $tagihan->filter(function ($siswa) {
            return $siswa->siswa->kelas == '5';
        });
    
        $kelas6 = $tagihan->filter(function ($siswa) {
            return $siswa->siswa->kelas == '6';
        });
    
        // Process each siswa to calculate monthly totals
        $kelas1 = $kelas1->map(function ($siswa) use ($monthMapping) {
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
    
        $kelas2 = $kelas2->map(function ($siswa) use ($monthMapping) {
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
    
        $kelas3 = $kelas3->map(function ($siswa) use ($monthMapping) {
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

        $kelas4 = $kelas4->map(function ($siswa) use ($monthMapping) {
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
    
        $kelas5 = $kelas5->map(function ($siswa) use ($monthMapping) {
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
    
        $kelas6 = $kelas6->map(function ($siswa) use ($monthMapping) {
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
        return view('page.tabel-transaksi.sd', compact('kelas1', 'kelas2', 'kelas3','kelas4', 'kelas5', 'kelas6'));
    }
    

    


}
