<?php

namespace App\Http\Controllers;

use App\Models\klasifikasi;
use App\Models\bidang;
use App\Models\Surat_masuk;
use App\Models\user_role;
use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    function login (){
        return view ('auth.login');
    }
    function register(){
        $data1 = bidang::all();
        $data2 = user_role::all();
        return view ('auth.register', ['data1'=>$data1,'data2'=>$data2]);
    }

    function user_dashboard(){
        $data = ['LoggedUserInfo'=>users::where('id_user','=', session('LoggedUser'))->first()];
        return view ('user.dashboard', $data);
    }
    
    function user_savemail(){
        $data = klasifikasi::all();
        return view ('user.savemail', ['data'=>$data]);
    }

    function logout (){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('/auth/login');
        };
    }

    function index()
    {
        $users = users::all();
        return view('user.index', compact('users'));
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_user)
    {
        $users= Users::findOrFail($id_user);
        return view('user.edit', ['user' =>$users ]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    function update(Request $request, $id_user)
    {
        $request->validate([
            'nama_user'=>'required',
            'username'=>'required',
            'id_bidang'=>'required',
            'id_role'=>'required',
            'jabatan'=>'required',
        ]);

        $user = users::findOrFail($id_user);
        $user->nama_user = $request->get('nama_user');
        $user->username = $request->get('username');
        $user->id_bidang = $request->get('id_bidang');
        $user->id_role = $request->get('id_role');
        $user->jabatan = $request->get('jabatan');
        $save = $user->save();

        if($save){
            return redirect('/user')->with('success', 'Contact updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    function destroy($id_user)
    {
        $user = users::findOrFail($id_user);
        $user->delete();

        return redirect('/user')->with('success', 'Contact deleted!');
    }

    function save(Request $request){
        
        //Validate requests
        $request->validate([
            'nama_user'=>'required',
            'username'=>'required|unique:users',
            'id_bidang'=>'required',
            'id_role'=>'required',
            'jabatan'=>'required',
            'password'=>'required|min:5|max:12'
        ]);

        //insert data into database
        $user = new users;
        $user->nama_user = $request->nama_user;
        $user->username = $request->username;
        $user->password =  Hash::make($request->password);
        $user->id_bidang = $request->id_bidang;
        $user->id_role = $request->id_role;
        $user->jabatan = $request->jabatan;
        $save = $user->save();

        if($save){
            return back()->with('success','New User has been successfully added to database');
        }else{
            return back()->with('fail','Something went wrong, try again later');
        }

    }

    function user_save(Request $request){

        //Validate requests
        $request->validate([
            'no_surat'=>'required',
            'instansi_pengirim'=>'required',
            'perihal'=>'required',
            'file_surat' => 'required|mimes:pdf|max:1024',
            'kode_klas'=>'required'
        ],
        ['file_surat.max' => 'Ukuran maksimum 1MB']
        );

        //insert data into database
        $surat = new surat_masuk;
        

        if($request->file('file_surat')) {
            $surat->no_surat = $request->no_surat;
            $surat->instansi_pengirim = $request->instansi_pengirim;
            $surat->bidang_instansi = $request->bidang_instansi;
            $surat->perihal = $request->perihal;
            $surat->tgl_terimasurat = $request->tgl_terimasurat;
            $surat->tgl_surat = $request->tgl_surat;
            $surat->kode_klas = $request->kode_klas;
            $fileName = $request->kode_klas.'_'.date('Ymd').'.pdf';
            $filePath = $request->file('file_surat')->storeAs('uploads', $fileName, 'public');

            $surat->file_surat = '/storage/' . $filePath;
        }
        
        $save = $surat->save();
        
        if($save){
            return back()->with('success','Surat berhasil masuk ke database');
        }else{
            return back()->with('fail','Something went wrong, try again later');
        }
    
    }

    function check(Request $request){
        //Validate requests
        $request->validate([
            'username'=>'required',
            'password'=>'required|min:5|max:12'
        ]);

        $userInfo = users::where('username','=', $request->username)->first();  
        if (!$userInfo){
                return back()->with('fail','We do not recognize your username');
            }else{
                //check password
                if(Hash::check($request->password, $userInfo->password )){
                    $request->session()->put('LoggedUser', $userInfo->id_user);
                    //return redirect()->route('user.dashboard');
                    return redirect('user/{$id_user}/dashboard');
                }else {

                    return back()->with('fail','Incorrect password');
                }
            }
    }
}