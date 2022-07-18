<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class PenggunaController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('users')
                ->where('user', '=', 1)
                ->orderBy('level', 'desc')
                ->get();
        return view('admin.user.view', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $data = User::select('id', 'nama_ibu', 'nama_suami')->get();
        $data = DB::table('users')
                ->where('user', '=', 0)
                ->get();
        return view('admin.user.create', compact('data'));
    }

    public function store(Request $request)
    {
        // menerima data request
        $pswd = rand(100000,999999);
        $id = $request->get('id');
        $data = User::where('id', $id)->first();
        $data->email    = $request->get('email');
        $data->password = bcrypt($pswd);
        $data->level    = $request->get('level');
        $data->user     = 1;
        $data->save();

        return redirect()->route('pengguna.index')->with([
            'pswd' => $pswd
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::where('id', $id)->get();
        $data2 = User::select('id', 'nama_ibu', 'nama_suami')->get();
        return view('admin.user.edit', compact('data', 'data2'));
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
        // menerima data request
        $data = User::where('id', $id)->first();
        $data->name     = $request->get('name');
        $data->email   = $request->get('email');
        $data->level = $request->get('level');
        $data->save();

        return redirect()->route('pengguna.index')->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::where('id', $id)->first();
        $data->delete();
        return redirect()->route('pengguna.index')->with('success', 'Data Berhasil Dihapus');
    }

    public function profile($id)
    {
        $data = User::where('id', $id)->first();
        return view('admin.user.detail', compact('data'));
    }

    public function generatePwd($id)
    {
        $pswd = rand(1000,9999);
        $data = User::where('id', $id)->first();
        $data->password = bcrypt($pswd);
        $data->save();

        return redirect()->route('pengguna.index')->with([
            'pswd' => $pswd
        ]);
    }

    public function showPanduan()
    {
        $user = Auth::user();
        $mapels = mataPelajaran::get();
    	return view('user.panduan.showpanduan', compact('user', 'panduans'));
    }



    /**
     * Show Materi-Materi sesuai dengan kelas dan panduan
     *
     */
    public function showMateri($id)
    {
        $user = Auth::user();

        $panduan = mataPelajaran::findOrFail($id);

        $materis = Materi::where('user', $user->user)->where('panduan', $panduan->nama_panduan)->get();

    	return view('user.panduan.showMateri', compact('user', 'panduan', 'materis'));
    }

    public function showSingleMateri($id)
    {
        $user = Auth::user();

        $singleMateri = Materi::findOrFail($id);

        return view('pages.student.materi.showSingleMateri', compact('user', 'singleMateri'));
    }

    public function exportPdf($id)
    {
    	$singleMateri = Materi::findOrFail($id);

        $pdf = PDF::loadview('pages.student.materi.exportPdf', compact('singleMateri') );

        return $pdf->download('materi.pdf');
    }

    public function downloadMateri(Request $request,$file) {


        return response()->download(public_path('data_file/'.$file));

    }

    
}

