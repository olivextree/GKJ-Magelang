<?php

namespace App\Http\Controllers;

use App\Models\Kebaktian;
use App\Models\KebaktianDetail;
use App\Models\KebaktianPetugas;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class KebaktianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['kebaktians'] = Kebaktian::all();
        return view('admin.kebaktian.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kebaktian.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $kebaktian = Kebaktian::create([
                'name' => $request->name,
                'tgl_kebaktian' => $request->tgl_kebaktian,
                'jadwal_1' => $request->jadwal_1,
                'jadwal_2' => $request->jadwal_2,
                'jadwal_3' => $request->jadwal_3,
                'jadwal_4' => $request->jadwal_4,
            ]);
            DB::commit();
            Alert::Success('Berhasil', 'kebaktian berhasil ditambahkan');
            return redirect(route('kebaktian.index'));
        } catch (\Exception $e) {
            DB::rollBack();
            Alert::Error('Gagal', 'Terjadi Kesalahan Pada Server', $e->getMessage());
            return back();
        }
    }


    public function edit($id)
    {
        $item = kebaktian::findOrFail($id);
        return view('admin.kebaktian.edit', compact('item'));
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
        try {
            $kebaktian = Kebaktian::findOrFail($id);
            $kebaktian->update([
                'name' => $request->name,
                'tgl_kebaktian' => $request->tgl_kebaktian,
                'jadwal_1' => $request->jadwal_1,
                'jadwal_2' => $request->jadwal_2,
                'jadwal_3' => $request->jadwal_3,
                'jadwal_4' => $request->jadwal_4,
            ]);
            if ($request->waktu) {
                foreach ($request->waktu as $item => $v) {
                    $detail = array(
                        'waktu' => $request->waktu[$item],
                        'majelis' => $request->majelis[$item],
                        'laki' => $request->laki[$item],
                        'wanita' => $request->perempuan[$item],
                        'anak' => $request->anak[$item],
                        'persembahan' => $request->persembahan[$item],
                    );
                    KebaktianDetail::where('id', $request->id_detail[$item])->update($detail);
                }
            }
            Alert::Success('Berhasil', 'kebaktian berhasil diupdate');
            return redirect(route('kebaktian.index'));
        } catch (\Throwable $th) {
            dd($th);
            Alert::Error('Gagal', 'Terjadi Kesalahan Pada Server');
            return back();
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Kebaktian::findOrFail($id);
        $detail = KebaktianDetail::where('id_kebaktian', $id)->delete();
        $item->delete();
        Alert::Error('Delete', 'Data Kebaktian Berhasil Dihapus');
        return redirect(route('kebaktian.index'));
    }

    public function detail($id, $type)
    {
        $item = Kebaktian::findOrFail($id);
        return view('admin.kebaktian.detail', compact('item', 'type'));
    }

    public function show($id, $type)
    {
        $data['item'] = Kebaktian::findOrFail($id);
        $data['type'] = $type;
        return view('admin.kebaktian.show', $data);
    }

    public function detailstore(Request $request, $id)
    {
        $kebaktian = Kebaktian::findOrFail($id);
        try {
            if ($request->type == 'petugas') {
                if (count($request->waktu) > 0) {
                    foreach ($request->waktu as $item => $v) {
                        $detail = array(
                            'id_kebaktian' => $kebaktian->id,
                            'waktu' => $request->waktu[$item],
                            'bagian' => $request->bagian[$item],
                            'nama_petugas' => $request->nama_petugas[$item],
                        );
                        KebaktianPetugas::create($detail);
                    }
                }
            } else {
                if (count($request->waktu) > 0) {
                    foreach ($request->waktu as $item => $v) {
                        $detail = array(
                            'id_kebaktian' => $kebaktian->id,
                            'waktu' => $request->waktu[$item],
                            'majelis' => $request->majelis[$item],
                            'laki' => $request->laki[$item],
                            'wanita' => $request->perempuan[$item],
                            'anak' => $request->anak[$item],
                            'persembahan' => $request->persembahan[$item],
                        );
                        KebaktianDetail::create($detail);
                    }
                }
            }
            Alert::Success('Berhasil', 'Berhasil Menambahkan Detail Kebaktian');
            return redirect(route('kebaktian.index'));
        } catch (\Throwable $th) {
            dd($th);
            Alert::Error('Gagal', 'Terjadi Kesalahan Pada Server');
            return back();
        }
    }

    public function pdf($id, $type)
    {
        $item = Kebaktian::findOrFail($id);
        $pdf = Pdf::loadView('admin.laporan.kebaktian', compact('item', 'type'))->setPaper('A4', 'potratit');
        return $pdf->stream();
    }
}
