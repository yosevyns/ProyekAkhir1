<?php

namespace App\Http\Controllers;

use App\Models\CertitaUlos;
use Illuminate\Http\Request;
use Alert;

class CeritaUlosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $info = CertitaUlos::first();
        $data = CertitaUlos::all();
        return view('pages.admin.cerita.index', compact('data', 'info'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.cerita.create', ['data'=>new CertitaUlos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_ulos' =>'required|unique:cerita_ulos',
            'gambar_ulos' =>'required',
            'gambar_ulos.*' =>'image|mimes:jpg,png,jpeg,gif,svg',
            'deskripsi_ulos' =>'required',
        ]);
        // $file = $request->file('gambar_ulos');
        // $namaFile = $file->getClientOriginalName();
        // $tujuanFile = 'images';
        // $file->move($tujuanFile, $namaFile);
        // $data[]=$namaFile;
        if($request->hasfile('gambar_ulos'))
         {

            $file = $request->file('gambar_ulos');
            $namaFile = $file->getClientOriginalName();
            $tujuanFile = 'images';
    
            $file->move($tujuanFile, $namaFile);
         }

        $newUlos = new CertitaUlos;
        $newUlos->nama_ulos = $request->nama_ulos;
        $newUlos->gambar_Ulos = $namaFile;
        $newUlos->deskripsi_ulos = $request->deskripsi_ulos;
        // Ulos::create($request->all());
        // dd($request->all());

        $newUlos->save();
        Alert::success('Sukses', 'Data berhasil ditambahkan');
        return redirect('sejarah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CertitaUlos  $certitaUlos
     * @return \Illuminate\Http\Response
     */
    public function show(CertitaUlos $certitaUlos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CertitaUlos  $certitaUlos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ceritum = CertitaUlos::find($id);
        return view('pages.admin.cerita.edit', compact('ceritum'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CertitaUlos  $certitaUlos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $ceritum)
    {
        $request->validate([
            'nama_ulos' =>'required',
            'gambar_ulos' =>'image|mimes:jpg,png,jpeg,gif,svg',
            'deskripsi_ulos' =>'required',
        ]);
        if($request->hasfile('gambar_ulos')){
            $file = $request->file('gambar_ulos');
            $namaFile = $file->getClientOriginalName();
            $tujuanFile = 'images';
    
            $file->move($tujuanFile, $namaFile);
    
            CertitaUlos::where('id',$ceritum)->update([
                'nama_ulos' => $request->nama_ulos,
                'gambar_ulos' =>  $namaFile,
                'deskripsi_ulos' =>  $request->deskripsi_ulos,
            ]);
        }else{
            CertitaUlos::where('id',$ceritum)->update([
                'nama_ulos' => $request->nama_ulos,
                'deskripsi_ulos' =>  $request->deskripsi_ulos,
            ]);
        }
        Alert::success('Sukses', 'Data berhasil diubah');
        return redirect("sejarah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CertitaUlos  $certitaUlos
     * @return \Illuminate\Http\Response
     */
    public function destroy(CertitaUlos $ceritum)
    {
        $ceritum->delete();
        return redirect("sejarah");
    }
}
