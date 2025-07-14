<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function showKegiatanView(Request $request)
    {
        $data = $request->validate([
            
        ]);


        return view('mahasiswa.kegiatan');
    }

    private function searchKegiatan() {

    }

    public function showDetailKegiatanView($id = null)
    {
        return view('mahasiswa.detail-kegiatan');
    }
}
