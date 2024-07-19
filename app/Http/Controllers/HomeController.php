<?php

namespace App\Http\Controllers;

use App\Models\Kebaktian;
use App\Models\KebaktianDetail;
use App\Models\Pendeta;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jumlah['pendeta'] = Pendeta::count();
        $jumlah['pemasukan'] = KebaktianDetail::sum('persembahan');
        $jumlah['anggota'] = User::where('role','!=','admin')->count();
        return view('home',compact('jumlah'));
    }
}