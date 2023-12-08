<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\User;
use Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::paginate(10);
        $jumlah = User::count();
        return view('pages.admin.user.index', compact('data','jumlah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(User $user)
    {
        return view('pages.admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user)
    {
        $request->validate([
            'email' =>'required|email',
            'name' =>['required','min:8'],
            'username' =>['required','min:6'],
            'date_of_birth' =>'required',
            'password' =>'required|min:5'
        ]);

        
        User::where('id', $user)->update([
            'email'=>$request->email,
            'name'=>$request->name,
            'username'=>$request->username,
            'date_of_birth'=>$request->date_of_birth,
            'password'=>Hash::make($request->password),
        ]);
        Alert::success('Sukses', 'Profile berhasil diubah');
        return redirect('/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        Alert::success('Sukses', 'Data berhasil dihapus');
        return back()->with('status', "Akun berhasil dihapus");
    }
}
