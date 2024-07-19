<?php

namespace App\Http\Controllers;

use App\Models\Kebaktian;
use App\Models\Pendaftaran;
use App\Models\PendaftaranDetails;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class LaporanController extends Controller
{
    public function index()
    {
        return view('admin.laporan.index');
    }

    public function store(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        if ($start_date == null || $end_date == null) {
            $datas = Pendaftaran::all();
        } else {
            $datas = Pendaftaran::whereBetween('tanggal_mulai', [$start_date, $end_date])->get();
        }
        $pdf = PDF::loadView('admin.laporan.cetak', compact('datas', 'start_date', 'end_date'))->setPaper('A4', 'landscape');
        return $pdf->stream();
    }

    public function acara()
    {
        $data['acara'] = Pendaftaran::all();
        return view('admin.laporan.acara', $data);
    }

    public function acarastore(Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        if ($start_date == null || $end_date == null) {
            $datas = PendaftaranDetails::all();
        } else {
            $datas = Pendaftaran::whereBetween('tanggal_mulai', [$start_date, $end_date])->get();
        }
        $pdf = PDF::loadView('admin.laporan.cetakacara', compact('datas'))->setPaper('A4', 'landscape');
        return $pdf->download(Carbon::now() . '.pdf');
    }
}
