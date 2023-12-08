<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ulos;
use App\Models\Galerys;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class UlosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.admin.ulos.tabel', ['ulo'=> Ulos::orderBy('id','DESC')->paginate(5)]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.ulos.create', ['data'=>new Ulos]);
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
            'nama_ulos' =>'required',
            'gambar_ulos' =>'required',
            'gambar_ulos.*' =>'required|image|mimes:jpg,png,jpeg,gif,svg',
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

        $newUlos = new Ulos;
        $newUlos->nama_ulos = $request->nama_ulos;
        $newUlos->gambar_Ulos = $namaFile;
        $newUlos->deskripsi_ulos = $request->deskripsi_ulos;
        $newUlos->user_id=Auth::user()->id;
        // Ulos::create($request->all());
        // dd($request->all());

        $newUlos->save();
        Alert::success('Sukses', 'Data berhasil ditambahkan');
        return redirect('ulos');

        // Session::flash('status','Data berhasil ditambahkan'); 

        // return redirect('ulos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datas = Galerys::join('ulos', 'ulos.id', '=', 'galeris.ulos_id')
        ->select('galeris.gambar as image','ulos.*','galeris.*')
        ->get();
        $ulo = Ulos::findOrFail($id);
        $data = Ulos::all();
        // return view('employees.payslip',compact('employees'));
        return view('pages.admin.ulos.show', compact('ulo', 'data', 'datas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Ulos $ulo)
    {
        return view('pages.admin.ulos.edit', compact('ulo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $ulo)
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
    
            Ulos::where('id',$ulo)->update([
                'nama_ulos' => $request->nama_ulos,
                'gambar_ulos' =>  $namaFile,
                'deskripsi_ulos' =>  $request->deskripsi_ulos,
            ]);
        }else{
            Ulos::where('id',$ulo)->update([
                'nama_ulos' => $request->nama_ulos,
                'deskripsi_ulos' =>  $request->deskripsi_ulos,
            ]);
        }
        Alert::success('Sukses', 'Data berhasil diubah');
        return redirect("ulos");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ulos $ulo)
    {
        {
            $ulo->delete();
            Alert::success('Sukses', 'Data berhasil dihapus');
            return redirect("ulos");
        }
    }
}
