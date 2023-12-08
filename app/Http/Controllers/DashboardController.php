<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Models\Ulos;
use App\Models\HasKategori;
use App\Models\Kategori;
use App\Models\Galerys;
use App\Models\CertitaUlos;

class DashboardController extends Controller
{
    public function ulos()
    {
        $data= Ulos::all();
        $ulo = Ulos::orderBy('id','DESC')->get();
        return view('pages.admin.ulos.index', compact('ulo','data'));
        
    }
    public function galeri()
    {
        $data = Galerys::join('ulos', 'ulos.id', '=', 'galeris.ulos_id')
        ->orderBy('galeris.id','DESC')
        ->get();
        return view('pages.admin.galery.index', compact('data'));
        // return view('pages.admin.galery.table', ['posts'=> Galerys::orderBy('id','DESC')->paginate(5)]);
    }

    public function kategori()
    {
        // $data = Kategori::join('haskategori', 'haskategori.kategori_id', '=', 'kategori.id')
        // ->join('ulos', 'ulos.id', '=', 'haskategori.ulos_id')
        // ->select('kategori.*', 'ulos.*', 'haskategori.*')
        // ->get();
        $data= Kategori::all();
        return view('pages.admin.kategori.main',compact('data'));
    }

    public function dashboard(){
        $info = CertitaUlos::all();
        $ulo = Ulos::orderBy('id','DESC')->limit(6)->get();
        $kategori= Kategori::orderBy('id','DESC')->limit(6)->get();
        $galeri = Galerys::join('ulos', 'ulos.id', '=', 'galeris.ulos_id')
        ->orderBy('galeris.id','DESC')
        ->limit(8)
        ->get();
        return view('pages.admin.dashboard.index', compact('info', 'ulo', 'kategori', 'galeri'));
    }
}
