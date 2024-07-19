<?php

namespace App\Http\Controllers;

use App\Models\Warta;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class WartaController extends Controller
{
    public function index()
    {
        return view('admin.warta.index');
    }

    public function read()
    {
        $data['wartas'] = Warta::all();
        return view('admin.warta.read',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.warta.create');
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
            $gambar->move(public_path('upload/warta'), $filename);
            $savegambar = 'upload/warta/'.$filename;
        }
        Warta::create([
            'name' => $request->name,
            'file' => $filename,
            'created_at' => Carbon::now()
        ]);
        Alert::Success('Berhasil','warta berhasil ditambahkan');
        return redirect(route('warta.index'));
    }


    public function edit($id)
    {
        $item = Warta::findOrFail($id);
        return view('admin.warta.edit',compact('item'));
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
            $gambar->move(public_path('upload/warta'), $filename);
            $savegambar = 'upload/warta/'.$filename;

            $inputdata = [
            'name' => $request->name,
            'file' => $filename,
            'created_at' => Carbon::now()
            ];
        }else{
            $inputdata = [
            'name' => $request->name,
            'updated_at' => Carbon::now()
            ];
        }

        $item = Warta::findOrFail($id);
        $item->update($inputdata);
        Alert::Success('Berhasil','warta berhasil diupdate');
        return redirect(route('warta.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Warta::findOrFail($id);
        $item->delete();
        Alert::Error('Delete','Data Warta Berhasil Dihapus');
        return redirect(route('warta.index'));
    }
}
