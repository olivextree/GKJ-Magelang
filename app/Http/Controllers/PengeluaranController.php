<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pengeluaran.index');
    }

    public function read()
    {
        $data['pengeluarans'] = Pengeluaran::all();
        return view('admin.pengeluaran.read',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pengeluaran.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pengeluaran::create($request->all());
        Alert::Success('Berhasil','pengeluaran berhasil ditambahkan');
        return redirect(route('pengeluaran.index'));
    }


    public function edit($id)
    {
        $item = Pengeluaran::findOrFail($id);
        return view('admin.pengeluaran.edit',compact('item'));
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

        $item = Pengeluaran::findOrFail($id);
        $item->update($request->except('_token'));
        Alert::Success('Berhasil','pengeluaran berhasil diupdate');
        return redirect(route('pengeluaran.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Pengeluaran::findOrFail($id);
        $item->delete();
        Alert::Error('Delete','pengeluaran Berhasil Dihapus');
        return redirect(route('pengeluaran.index'));
    }
}
