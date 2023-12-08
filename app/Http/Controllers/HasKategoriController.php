<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ulos;
use App\Models\HasKategori;
use App\Models\Kategori;
Use Alert;

class HasKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = HasKategori::join('kategori', 'kategori.id', '=', 'haskategori.kategori_id')
        ->join('ulos', 'ulos.id', '=', 'haskategori.ulos_id')
        ->select('kategori.*', 'ulos.*', 'haskategori.*')
        ->paginate(10);
        return view('pages.admin.haskategori.table',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ulo = Ulos::all();
        $kategori = Kategori::all();
        return view('pages.admin.haskategori.create', compact('ulo','kategori'));
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
            'ulos_id'=>'required',
            'kategori_id'=>'required',
        ]);
        // dd($request->all());
        Haskategori::create($request->all());
        Alert::success('Sukses', 'Data berhasil ditambahkan');
        return redirect('kategori');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(HasKategori $haskategori)
    {
        $ulo = Ulos::all();
        $data=Kategori::all();
        return view('pages.admin.haskategori.edit', compact('ulo','haskategori', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $haskategori)
    {
        $request->validate([
            'kategori_id' =>'required',
            'ulos_id' =>'required'
        ]);

        
        HasKategori::where('id', $haskategori)->update([
            'kategori_id'=>$request->kategori_id,
            'ulos_id'=>$request->ulos_id,
        ]);
        // dd($request->all());
        Alert::success('Sukses', 'Data berhasil diubah');
        return redirect('kategori');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(HasKategori $haskategori)
    {
        $haskategori->delete();
        Alert::success('Sukses', 'Data Terhapus');
        return redirect("kategori");
            
    }
}
