<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.banner.index');
    }

    public function read()
    {
        $data['banners'] = Banner::all();
        return view('admin.banner.read',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.create');
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
            $savegambar = 'upload/banner/'.$filename;
        }
        Banner::create([
            'name' => $request->name,
            'file' => $filename,
            'created_at' => Carbon::now()
        ]);
        Alert::Success('Berhasil','Banner berhasil ditambahkan');
        return redirect(route('banner.index'));
    }


    public function edit($id)
    {
        $item = Banner::findOrFail($id);
        return view('admin.banner.edit',compact('item'));
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
            'created_at' => Carbon::now()
            ];
        }else{
            $inputdata = [
            'name' => $request->name,
            'updated_at' => Carbon::now()
            ];
        }

        $item = Banner::findOrFail($id);
        $item->update($inputdata);
        Alert::Success('Berhasil','Banner berhasil diupdate');
        return redirect(route('banner.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Banner::findOrFail($id);
        $item->delete();
        Alert::Error('Delete','Data Foto Berhasil Dihapus');
        return redirect(route('banner.index'));
    }
}
