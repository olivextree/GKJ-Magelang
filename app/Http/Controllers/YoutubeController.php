<?php

namespace App\Http\Controllers;

use App\Models\Youtube;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class YoutubeController extends Controller
{
    public function index()
    {
        return view('admin.youtube.index');
    }

    public function read()
    {
        $data['youtubes'] = Youtube::all();
        return view('admin.youtube.read',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.youtube.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Youtube::create([
            'name' => $request->name,
            'link' => $request->link,
            'created_at' => Carbon::now()
        ]);
        Alert::Success('Berhasil','youtube berhasil ditambahkan');
        return redirect(route('youtube.index'));
    }


    public function edit($id)
    {
        $item = Youtube::findOrFail($id);
        return view('admin.youtube.edit',compact('item'));
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
            $inputdata = [
            'name' => $request->name,
            'link' => $request->link,
            'updated_at' => Carbon::now()
            ];

        $item = youtube::findOrFail($id);
        $item->update($inputdata);
        Alert::Success('Berhasil','youtube berhasil diupdate');
        return redirect(route('youtube.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Youtube::findOrFail($id);
        $item->delete();
        Alert::Error('Delete','youtube Berhasil Dihapus');
        return redirect(route('youtube.index'));
    }
}
