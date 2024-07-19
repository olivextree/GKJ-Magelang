<?php

namespace App\Http\Controllers;

use App\Models\Pendeta;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PendetaController extends Controller
{
    public function index()
    {
        return view('admin.pendeta.index');
    }

    public function read()
    {
        $data['pendeta'] = Pendeta::all();
        return view('admin.pendeta.read',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pendeta.create');
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
            $gambar->move(public_path('upload/pendeta'), $filename);
        }
        Pendeta::create([
            'name' => $request->name,
            'is_active' => $request->is_active,
            'file' => $filename,
            'created_at' => Carbon::now()
        ]);
        Alert::Success('Berhasil','Pendeta Berhasil Ditambahkan');
        return redirect(route('pendeta.index'));
    }


    public function edit($id)
    {
        $item = Pendeta::findOrFail($id);
        return view('admin.pendeta.edit',compact('item'));
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

        $item = Pendeta::findOrFail($id);
        if ($request->hasFile('file')) {
            $gambar = $request->file;
            $filename = time(). '.' . $gambar->extension();
            $gambar->move(public_path('upload/pendata'), $filename);

            $inputdata = [
            'name' => $request->name,
            'is_active' => $request->is_active,
            'file' => $filename,
            'created_at' => Carbon::now()
            ];
        }else{
            $inputdata = [
            'name' => $request->name,
            'is_active' => $request->is_active,
            'updated_at' => Carbon::now()
            ];
        }
        $item->update($inputdata);
        Alert::Success('Berhasil','Pendeta berhasil diupdate');
        return redirect(route('pendeta.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Pendeta::findOrFail($id);
        $item->delete();
        Alert::Error('Delete','Data Pendeta Berhasil Dihapus');
        return redirect(route('pendeta.index'));
    }
}
