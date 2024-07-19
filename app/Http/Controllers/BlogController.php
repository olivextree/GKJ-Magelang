<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Articel;
use App\Models\Bacaan;
use App\Models\Banner;
use App\Models\Kebaktian;
use App\Models\Pendaftaran;
use App\Models\PendaftaranDetails;
use App\Models\Pendeta;
use App\Models\User;
use App\Models\Warta;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index()
    {
        $bulan = Carbon::now()->format('m-d');
        $start_week = Carbon::now()->startOfWeek()->format('Y-m-d');
        $end_week = Carbon::now()->endOfWeek()->format('Y-m-d');
        $data['banners'] = Banner::all();
        $data['articels'] = Articel::all();
        $data['about'] = About::first();
        $data['pendeta'] = Pendeta::where('is_active', true)->get();
        $data['birthday'] = User::where('birthday', 'like', '%' . $bulan . '%')->get();
        $data['kebaktian'] = Kebaktian::whereBetween('tgl_kebaktian', [$start_week, $end_week])->first();
        $data['kegiatan'] = Pendaftaran::orderBy('created_at', 'desc')->get();
        return view('frontend.home', $data);
    }

    public function about()
    {
        $data['about'] = About::first();
        return view('frontend.about', $data);
    }

    public function warta()
    {
        $data['wartas'] = Warta::orderBy('created_at', 'desc')->get();
        return view('frontend.warta', $data);
    }

    public function wartadetail($id)
    {
        $data = Warta::findOrFail($id);
        return view('frontend.wartaDetails', compact('data'));
    }

    public function articel()
    {
        $data['articels'] = Articel::orderBy('created_at', 'desc')->get();
        return view('frontend.articel', $data);
    }

    public function detailArticel($id)
    {
        $data = Articel::findOrFail($id);
        return view('frontend.articelDetails', compact('data'));
    }

    public function acara()
    {
        $data['acara'] = Pendaftaran::orderBy('created_at', 'desc')->get();
        return view('frontend.acara', $data);
    }

    public function detailAcara($id)
    {
        $data = Pendaftaran::findOrFail($id);
        $data['total'] = PendaftaranDetails::where('pendaftaran_id', $data->id)->count();
        return view('frontend.acaraDetails', compact('data'));
    }

    public function bacaan()
    {
        $start_week = Carbon::now()->startOfWeek()->format('Y-m-d');
        $end_week = Carbon::now()->endOfWeek()->format('Y-m-d');
        $data['bacaan'] = Bacaan::whereBetween('tanggal', [$start_week, $end_week])->get();
        return view('frontend.bacaan', $data);
    }

    public function kegiatan()
    {
        $data['kegiatan'] = PendaftaranDetails::where('user_id', Auth::user()->id)->get();
        return view('user.dashboard.index', $data);
    }
}
