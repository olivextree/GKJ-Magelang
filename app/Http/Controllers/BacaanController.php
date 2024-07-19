<?php

namespace App\Http\Controllers;

use App\Models\Bacaan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BacaanController extends Controller
{
    public function index()
    {
        $data['bacaan'] = Bacaan::orderBy('id','desc')->get();
        return view('admin.bacaan.index',$data);
    }

    public function create()
    {
        return view('admin.bacaan.create');
    }

    public function edit($id)
    {
        $item = Bacaan::findOrFail($id);
        return view('admin.bacaan.edit',compact('item'));
    }

    public function store(Request $request)
    {
        try {
            Bacaan::create($request->all());
            Alert::Success('Berhasil','Data Berhasil disimpan');
            return redirect(route('bacaan.index'));
        } catch (\Throwable $th) {
            Alert::Error('Gagal','Terjadi Kesalahan Pada Server');
            return back();
        }
    }

    public function update(Request $request,$id)
    {
        $item = Bacaan::findOrFail($id);
        try {
            $item->update($request->except('_token'));
            Alert::Success('Berhasil','Data Berhasil disimpan');
            return redirect(route('bacaan.index'));
        } catch (\Throwable $th) {
            Alert::Error('Gagal','Terjadi Kesalahan Pada Server');
            return back();
        }
    }

    public function destroy($id)
    {
        $item = Bacaan::findOrFail($id);
        $item->delete();
        Alert::Error('Hapus','Data Bacaan Berhasil Dihapus');
        return back();
    }
}
