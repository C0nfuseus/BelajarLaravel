<?php

namespace App\Http\Controllers;

use App\Models\disposisi;
use Illuminate\Http\Request;
use App\Models\Surat_masuk;
use App\Models\bidang;
use App\Models\Users;

class DisposisiController extends Controller
{
    function data()
    {
        $data1 = disposisi::all();
        $data2 = Surat_masuk::all();
        $data3 = bidang::all();
        $data4 = Users::all();
        return view('mail.disposisi', ['data1' => $data1, 'data2' => $data2, 'data3' => $data3, 'data4' => $data4]);
    }


    function save(Request $request)
    {

        //Validate requests
        $request->validate([
        ]);

        //insert data into database
        $disposisi= new disposisi;
        $disposisi->id_bidang = $request->id_bidang;
        $disposisi->id_user = $request->id_user;
        $disposisi->id_surat = $request->id_surat;
        $disposisi->cat_kabid = $request->cat_kabid;
        $save = $disposisi->save();
        
        if ($save) {
            return back()->with('success', 'New User has been successfully added to database');
        } else {
            return back()->with('fail', 'Something went wrong, try again later');
        }
    }
}
