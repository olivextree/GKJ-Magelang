<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\PendaftaranDetails;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PendaftaranController extends Controller
{
    public function index()
    {
        return view('admin.pendaftaran.index');
    }

    public function read()
    {
        if (Auth::user()->role == 'admin') {
            $data['pendaftarans'] = Pendaftaran::all();
        } else {
            $data['pendaftarans'] = PendaftaranDetails::where('user_id', Auth::user()->id)->get();
        }
        return view('admin.pendaftaran.read', $data);
    }

    public function detail($id)
    {
        $item = Pendaftaran::findOrFail($id);
        return view('admin.pendaftaran.details', compact('item'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->role == 'admin') {
            $data['user'] = User::where('role', '!=', 'admin')->get();
        } else {
            $data['user'] = User::where('id', Auth::user()->id)->first();
        }
        return view('admin.pendaftaran.create', $data);
    }

    public function store(Request $request)
    {
        if ($request->hasFile('file')) {
            $gambar = $request->file;
            $filename = time() . '.' . $gambar->extension();
            $gambar->move(public_path('upload/acara'), $filename);
        }
        Pendaftaran::create([
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'acara' => $request->acara,
            'file' => $filename,
            'desc' => $request->desc
        ]);
        Alert::Success('Berhasil', 'Berhasil Menambahkan Pendaftaran' . ' ' . $request->acara);
        return redirect(route('kegiatan.index'));
    }

    public function edit($id)
    {
        if (Auth::user()->role == 'admin') {
            $user = User::where('role', '!=', 'admin')->get();
        } else {
            $user = User::where('id', Auth::user()->id)->first();
        }
        $item = Pendaftaran::findOrFail($id);
        return view('admin.pendaftaran.edit', compact('item', 'user'));
    }

    public function update(Request $request, $id)
    {
        if ($request->hasFile('file')) {
            $gambar = $request->file;
            $filename = time() . '.' . $gambar->extension();
            $gambar->move(public_path('upload/gambar'), $filename);
            $savegambar = 'upload/gambar/' . $filename;

            $inputdata = [
                'tanggal_mulai' => $request->tanggal_mulai,
                'tanggal_selesai' => $request->tanggal_selesai,
                'acara' => $request->acara,
                'file' => $filename,
                'desc' => $request->desc
            ];
        } else {
            $inputdata = [
                'tanggal_mulai' => $request->tanggal_mulai,
                'tanggal_selesai' => $request->tanggal_selesai,
                'acara' => $request->acara,
                'desc' => $request->desc
            ];
        }
        $item = Pendaftaran::findOrFail($id);
        $item->update($inputdata);
        Alert::Success('Berhasil', 'Berhasil Mengupdate Data Pendaftaran' . ' ' . $request->acara);
        return redirect(route('kegiatan.index'));
    }

    public function destroy($id)
    {
        $item = Pendaftaran::findOrFail($id);
        $item->delete();
        Alert::Error('Hapus', 'Berhasil menghapus Kegiatan');
        return redirect(route('kegiatan.index'));
    }

    public function mass_status(Request $request)
    {
        $type = $request['status_type'];
        foreach ($request['status'] as $id => $status) {
            $pendaftaran = Pendaftaran::find($id);

            $pendaftaran['status'] = $type;
            $pendaftaran->save();
        }
        Alert::Success('Berhasil', 'Berhasil Mengupdate Status Acara');
        return redirect(route('kegiatan.index'));
    }

    public function daftar_acara($id)
    {
        $item = Pendaftaran::findOrFail($id);
        return view('user.pendaftaran.daftar', compact('item'));
    }

    public function daftar_store(Request $request)
    {
        PendaftaranDetails::create($request->all());
        Alert::Success('Berhasil', 'Anda Berhasil Mendaftar Diacara');
        return redirect(route('blog.kegiatan'));
    }
}
