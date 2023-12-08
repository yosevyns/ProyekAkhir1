<?php

namespace App\Http\Controllers;

use App\Models\Galerys;
use App\Models\Ulos;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;

class GaleryController extends Controller
{

    public function index()
    {
        if(Auth::user()->role=="admin"){
            $posts = Galerys::join('ulos', 'ulos.id', '=', 'galeris.ulos_id')
        ->join('users', 'users.id', '=', 'galeris.user_id')
        ->select('ulos.id AS id_ulos', 'galeris.*', 'ulos.nama_ulos', 'users.name')
        ->orderBy('status','ASC')
        ->paginate(10);
        return view('pages.admin.galery.table', compact('posts'));
        }elseif(Auth::user()->role=='user'){
        $posts = Galerys::join('users', 'users.id', '=', 'galeris.user_id')
        ->join('ulos', 'ulos.id', '=', 'galeris.ulos_id')
        ->select('ulos.id AS id_ulos', 'galeris.*', 'ulos.nama_ulos', 'users.name')
        ->orderBy('status','ASC')
        ->get();
        return view('pages.admin.galery.table', compact('posts'));
        }
        // return view('pages.admin.galery.table', ['posts'=> Galerys::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ulo = Ulos::all();
        return view('pages.admin.galery.create', compact('ulo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'ulos_id' =>'required',
            'gambar' =>'required|image|mimes:jpg,png,jpeg,gif,svg',
        ]);

        if($request->hasfile('gambar'))
         {

            $file = $request->file('gambar');
            $namaFile = time()."_".$file->getClientOriginalName();
            $tujuanFile = 'images';
    
            $file->move($tujuanFile, $namaFile);
         }
        $newGaleri = new Galerys;

        if(Auth::user()->role=='admin')
        {
            $newGaleri->user_id = Auth()->user()->id;
            $newGaleri->ulos_id = $request->ulos_id;
            $newGaleri->status = true;
            $newGaleri->gambar = $namaFile;
        }else{
            $newGaleri->user_id = Auth()->user()->id;
            $newGaleri->ulos_id = $request->ulos_id;
            $newGaleri->gambar = $namaFile;
        }

        // dd($request->all());
        $newGaleri->save();
        Alert::success('Sukses', 'Data berhasil ditambahkan');
        return redirect('galeri');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Galerys  $galerys
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Galery  $galery
     * @return \Illuminate\Http\Response
     */
    public function edit(Galerys $galeri)
    {
        $ulo = Ulos::all();
        return view('pages.admin.galery.edit', compact('galeri','ulo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Galerys  $galerys
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $galeri)
    {
        $request->validate([
            'ulos_id' =>'min:1',
            'gambar' =>'image|mimes:jpg,png,jpeg,gif,svg',
        ]);
        if($request->hasfile('gambar')){
            $file = $request->file('gambar');
            $namaFile = time()."_".$file->getClientOriginalName();
            $tujuanFile = 'images';
    
            $file->move($tujuanFile, $namaFile);
    
            Galerys::where('id',$galeri)->update([
                'ulos_id' => $request->ulos_id,
                'gambar' =>  $namaFile,
            ]);
        }else{
            Galerys::where('id',$galeri)->update([
                'ulos_id' => $request->ulos_id,
            ]);
        }
        Alert::success('Sukses', 'Data berhasil diubah');
        return redirect("galeri");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Galerys  $galerys
     * @return \Illuminate\Http\Response
     */
    public function destroy(Galerys $galeri)
    {
        $img_path = 'images/'.$galeri->gambar;
        if(File::exists($img_path)) {
            File::delete($img_path);
        }
        $galeri->delete();
        Alert::success('Sukses', 'Data berhasil dihapus');
        return back();
    }

    public function apply($id)
    {
        $galery=Galerys::where('id',$id)->first();
        $galery->status=true;
        $galery->update();
        return redirect('galeri');
    }

    public function reject($id)
    {
        $galery=Galerys::where('id',$id)->first();
        $galery->status=2;
        // dd($galery->find($id));
        $galery->update();
        return redirect('galeri');
    }
}
