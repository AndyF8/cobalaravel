<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
 

use PDF;



class MahasiswaController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('cari')){
            $data_mahasiswa = Mahasiswa::where('nama','LIKE','%'. $request->cari .'%')->paginate(5);
        }else{
            $data_mahasiswa = DB::table('mahasiswa')->paginate(5);
        }

        
        return view('mahasiswa.index',['data_mahasiswa' => $data_mahasiswa]);
    }

    public function create(Request $request)
    {
        Mahasiswa::create($request->all());
        return redirect('/mahasiswa')->with('sukses', 'Data berhasil di input!');
    }

    public function edit($id)
    {
        $data_mahasiswa = Mahasiswa::find($id);
        return view('mahasiswa.edit',['mahasiswa' => $data_mahasiswa]);
    }

    public function update(Request $request, $id)
    {
        $data_mahasiswa = Mahasiswa::find($id);
        $data_mahasiswa->update($request->all());
        return redirect('/mahasiswa')->with('sukses', 'Data berhasil diupdate!');
    }

    public function delete($id)
    {
        $data_mahasiswa = Mahasiswa::find($id);
        $data_mahasiswa->delete();
        return redirect('/mahasiswa')->with('sukses', 'Data berhasil dihapus');
    }

    public function exportpdf()
    {
        $data_mahasiswa = Mahasiswa::all();
        $pdf = PDF::loadView('export.mahasiswapdf',['mahasiswa' => $data_mahasiswa]);
        return $pdf->download('mahasiswa.pdf');
    }
       


    
}
