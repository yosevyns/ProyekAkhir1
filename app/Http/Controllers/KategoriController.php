<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Ulos;
use App\Models\Galerys;
use App\Models\HasKategori;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::orderBy('id','DESC')->paginate(10);
        $data = HasKategori::join('kategori', 'kategori.id', '=', 'haskategori.kategori_id')
        ->join('ulos', 'ulos.id', '=', 'haskategori.ulos_id')
        ->select('kategori.*', 'ulos.*', 'haskategori.*')
        ->paginate(10);
        return view('pages.admin.kategori.index', compact('kategori', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ulo = Ulos::all();
        return view('pages.admin.kategori.create', compact('ulo'));
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
            'nama_kategori' =>'required|unique:kategori',
            'cover_kategori' =>'required|image|mimes:jpg,png,jpeg,gif,svg',
            'deskripsi_kategori' =>'required',
        ]);

        if($request->hasFile('cover_kategori')){
            $file=$request->file('cover_kategori');
            $tujuanFile = 'images';
            $imageName=time()."_".$file->getClientOriginalName();
            $file->move($tujuanFile, $imageName);
            $user_id = Auth::user()->id;
            
            $kategori = new Kategori([
                'nama_kategori'=>$request->nama_kategori,
                'cover_kategori'=>$imageName,
                'deskripsi_kategori'=>$request->deskripsi_kategori,
            ]);
            $kategori->user_id =Auth::user()->id;
            $kategori->save();
        }
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
        $data = Kategori::join('haskategori', 'haskategori.kategori_id', '=', 'kategori.id')
        ->join('ulos', 'ulos.id', '=', 'haskategori.ulos_id')
        ->join('galeris', 'galeris.ulos_id', '=', 'ulos.id')
        ->select('kategori.*', 'ulos.*', 'kategori.id AS id_', 'haskategori.kategori_id AS id_kategori', 'galeris.*', 'haskategori.*', 'ulos.nama_ulos AS ulos_name', 'ulos.deskripsi_ulos AS ulos_deskripsi', 'ulos.id AS id_ulos')
        ->get();
        $ulo = Kategori::findOrFail($id);
        $datas = Ulos::join('haskategori', 'haskategori.ulos_id', '=', 'ulos.id')->get();
        // return view('employees.payslip',compact('employees'));
        $items = Kategori::all();
        
        return view('pages.admin.kategori.show', compact('ulo', 'datas', 'data', 'items'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
        return view('pages.admin.kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kategori)
    {
        $request->validate([
            'nama_kategori' =>'required',
            'cover_kategori' =>'image|mimes:jpg,png,jpeg,gif,svg',
            'deskripsi_kategori' =>'required',
        ]);
        if($request->hasfile('cover_kategori')){
            $file = $request->file('cover_kategori');
            $namaFile = time()."_".$file->getClientOriginalName();
            $tujuanFile = 'images';
    
            $file->move($tujuanFile, $namaFile);
    
            Kategori::where('id',$kategori)->update([
                'nama_kategori' => $request->nama_kategori,
                'cover_kategori' =>  $namaFile,
                'deskripsi_kategori' =>  $request->deskripsi_kategori,
            ]);
        }else{
            Kategori::where('id',$kategori)->update([
                'nama_kategori' => $request->nama_kategori,
                'deskripsi_kategori' =>  $request->deskripsi_kategori,
            ]);
        }
        Alert::success('Sukses', 'Data berhasil diubah');
        return redirect("kategori");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        Alert::success('Sukses', 'Data berhasil dihapus');
        return redirect("kategori");
    }


}
