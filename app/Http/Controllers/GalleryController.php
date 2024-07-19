<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.gallery.index');
    }

    public function read()
    {
        $data['gallerys'] = Gallery::all();
        return view('admin.gallery.read',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallery.create');
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
            $gambar->move(public_path('upload/gallery'), $filename);
            $savegambar = 'upload/gallery/'.$filename;
        }
        Gallery::create([
            'name' => $request->name,
            'file' => $filename,
            'category' => $request->category,
            'created_at' => Carbon::now()
        ]);
        Alert::Success('Berhasil','gallery berhasil ditambahkan');
        return redirect(route('gallery.index'));
    }


    public function edit($id)
    {
        $item = Gallery::findOrFail($id);
        return view('admin.gallery.edit',compact('item'));
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
            $gambar->move(public_path('upload/gallery'), $filename);
            $savegambar = 'upload/gallery/'.$filename;

            $inputdata = [
            'name' => $request->name,
            'category' => $request->category,
            'file' => $filename,
            'created_at' => Carbon::now()
            ];
        }else{
            $inputdata = [
            'name' => $request->name,
            'category' => $request->category,
            'updated_at' => Carbon::now()
            ];
        }

        $item = Gallery::findOrFail($id);
        $item->update($inputdata);
        Alert::Success('Berhasil','gallery berhasil diupdate');
        return redirect(route('gallery.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Gallery::findOrFail($id);
        $item->delete();
        Alert::Error('Delete','gallery Berhasil Dihapus');
        return redirect(route('gallery.index'));
    }
}
