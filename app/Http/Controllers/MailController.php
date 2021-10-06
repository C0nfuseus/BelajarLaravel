<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Surat_masuk;
use App\Models\klasifikasi;


class MailController extends Controller
{
    function maildata()
    {
        $data = klasifikasi::all();
        return view('mail.savemail', ['data' => $data]);
    }
    
    function index()
    {
        $surat = Surat_masuk::all();
        return view('mail.index', compact('surat'));
        //
    }
    
    public function show($id_surat)
    {
        //
    }

    public function edit($id_surat)
    {
        $data = klasifikasi::all();
        $surat = Surat_masuk::findOrFail($id_surat);
        return view('mail.edit', ['surat' => $surat , 'data' => $data]);
    }
    
    function update(Request $request, $id_surat)
    {
        $request->validate([
            'file_surat' => 'mimes:pdf|max:1024',
        ],
        ['file_surat.max' => 'Ukuran maksimum 1MB']
    );

        $surat = Surat_masuk::findOrFail($id_surat);
        $surat->nama_user = $request->get('nama_user');
        $surat->username = $request->get('username');
        $surat->id_bidang = $request->get('id_bidang');
        $surat->id_role = $request->get('id_role');
        $surat->jabatan = $request->get('jabatan');
        $fileName = $request->kode_klas . '_' . date('Ymd') . '.pdf';
        $filePath = $request->file('file_surat')->storeAs('uploads', $fileName, 'public');
        $surat->file_surat = '/storage/' . $filePath;
        $save = $surat->save();

        if ($save) {
            return redirect('/mail/index')->with('success', 'Mail updated!');
        }
    }

    function destroy($id_surat)
    {
        $surat = Surat_masuk::findOrFail($id_surat);
        $surat->delete();

        return redirect('/mail/index')->with('success', 'Mail deleted!');
    }
    
    function save(Request $request)
    {

        //Validate requests
        $request->validate(
            [
                'no_surat' => 'required',
                'instansi_pengirim' => 'required',
                'perihal' => 'required',
                'file_surat' => 'required|mimes:pdf|max:1024',
                'kode_klas' => 'required'
            ],
            ['file_surat.max' => 'Ukuran maksimum 1MB']
        );

        //insert data into database
        $surat = new surat_masuk;


        if ($request->file('file_surat')) {
            $surat->no_surat = $request->no_surat;
            $surat->instansi_pengirim = $request->instansi_pengirim;
            $surat->bidang_instansi = $request->bidang_instansi;
            $surat->perihal = $request->perihal;
            $surat->tgl_terimasurat = $request->tgl_terimasurat;
            $surat->tgl_surat = $request->tgl_surat;
            $surat->kode_klas = $request->kode_klas;
            $fileName = $request->kode_klas . '_' . date('Ymd') . '.pdf';
            $filePath = $request->file('file_surat')->storeAs('uploads', $fileName, 'public');

            $surat->file_surat = '/storage/' . $filePath;
        }
        
        $save = $surat->save();

        if ($save) {
            return back()->with('success', 'Surat berhasil masuk ke database');
        } else {
            return back()->with('fail', 'Something went wrong, try again later');
        }
    }
    
}