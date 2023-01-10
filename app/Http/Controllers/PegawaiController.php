<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawai = DB::table('pegawai')->paginate(5);

        return view('pegawai',['pegawai' => $pegawai]);
    }

    public function cari(Request $request)
    {
        $cari = $request->cari;

        $pegawai = DB::table('pegawai')
            ->where('pegawai_nama', 'like', "%" . $cari . "%")
            ->paginate();

        return view('pegawai', ['pegawai' => $pegawai]);
    }
}
