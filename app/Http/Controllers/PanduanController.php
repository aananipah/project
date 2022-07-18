<?php

namespace App\Http\Controllers;

use App\Panduan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class PanduanController extends Controller
{
    public function viewPanduan() {
        $data = Panduan::all();
        return view('user.panduan.viewPanduan', compact('data'));
    }
    //Procedure
    public function listPanduan(){
        $dataPanduan = DB::select("CALL `getPanduanData`()");
        return view('user.panduan.print', compact('dataPanduan'));
    }

    public function storePanduan(Request $request)
    {
        // menerima data request
        $data          = new Panduan;
        $data->judul   = $request->get('judul');
        $data->kategori = $request->get('kategori');
        $data->isi = $request->get('isi');
        $data->save();

        return redirect()->route('viewPanduan')->with(['success' => 'Data Berhasil Di Tambah']);
    }
    public function editPanduan($id){
        $data = Panduan::where('id_panduan', $id)->get();
        return view('user.panduan.editPanduan', compact('data'));
    }
    public function updatePanduan(Request $request, $id){
        $data               = Panduan::where('id_panduan', $id)->first();
        $data->judul   = $request->get('judul');
        $data->kategori = $request->get('kategori');
        $data->isi = $request->get('isi');
        $data->save();

        return redirect()->route('viewPanduan')->with(['success' => 'Data Berhasil Di Update']);
    }
    public function deletePanduan($id){
        $data = Panduan::where('id_panduan', $id)->first();
        $data->delete();

        return redirect()->route('viewPanduan')->with(['success' => 'Data Berhasil Di Hapus']);
    }
}
