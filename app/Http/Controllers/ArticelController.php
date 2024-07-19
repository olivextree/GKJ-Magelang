<?php

namespace App\Http\Controllers;

use App\Models\Articel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ArticelController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.articel.index');
    }

    public function read()
    {
        $data['articels'] = Articel::all();
        return view('admin.articel.read',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.articel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('file')){
            $gambar = $request->file;
            $filename = time(). '.' . $gambar->extension();
            $gambar->move(public_path('upload/gambar'), $filename);
            $savegambar = 'upload/articel/'.$filename;
        }
        Articel::create([
            'name' => $request->name,
            'file' => $filename,
            'desc' => $request->desc,
            'created_at' => Carbon::now()
        ]);
        Alert::Success('Berhasil','Data Renungan berhasil ditambahkan');
        return redirect(route('articel.index'));
    }


    public function edit($id)
    {
        $item = articel::findOrFail($id);
        return view('admin.articel.edit',compact('item'));
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
        if ($request->hasFile('file')) {
            $gambar = $request->file;
            $filename = time(). '.' . $gambar->extension();
            $gambar->move(public_path('upload/gambar'), $filename);
            $savegambar = 'upload/gambar/'.$filename;

            $inputdata = [
            'name' => $request->name,
            'file' => $filename,
            'desc' => $request->desc,
            'created_at' => Carbon::now()
            ];
        }else{
            $inputdata = [
            'name' => $request->name,
            'desc' => $request->desc,
            'updated_at' => Carbon::now()
            ];
        }

        $item = Articel::findOrFail($id);
        $item->update($inputdata);
        Alert::Success('Berhasil','Data Renungan berhasil diupdate');
        return redirect(route('articel.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Articel::findOrFail($id);
        $item->delete();
        Alert::Error('Delete','Data Renungan Berhasil Dihapus');
        return redirect(route('articel.index'));
    }
}
