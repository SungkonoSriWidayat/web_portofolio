<?php

namespace App\Http\Controllers;
use App\Models\DaftarKelas as ModelDaftarKelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;

class DaftarKelas extends Controller
{
    function index(){
        $data = ModelDaftarKelas::all();
        return view('daftar_kelas.index', ['data'=> $data]);
    }

    function tambahkelas(){
        return view('daftar_kelas.tambahkelas');
    }

    function buatkelas(Request $request)
    {
        $request->validate([
            'namakelas' => 'required|min:3',
            'nama_materi' => 'required|min:3',
            'materi' => 'required|mimes:pdf|file',
        ], [
            'namakelas.required' => 'Name Wajib Di isi',
            'nama_materi.required' => 'Nama materi wajib di isi',
            'materi.required' => 'materi wajib di upload',
            'materi.mimes:pdf' => 'materi yang di upload harus berbentuk pdf',
            'materi.file' => 'materi harus berupa file',
        ]);
        
        $materi_file =$request->file('materi');
        $materi_ekstensi = $materi_file->extension();
        $nama_materi = $request->nama_materi.".".date('d-m-y,h.i.s').".".$materi_ekstensi;
        $materi_file->move('kelas/materi',$nama_materi);
        
        ModelDaftarKelas::insert([
            'namakelas' => $request->namakelas,
            'materi' => $nama_materi,
        ]);
        Session::flash('success', 'Data berhasil ditambahkan');

        return redirect('/daftarkelas')->with('success', 'Berhasil Membuatkelas');
        
    }
    function edit($id)
    {
        $data = ModelDaftarKelas::where('id', $id)->get();
        return view('daftar_kelas.upload', ['uc' => $data]);
    }
    function change(Request $request)
    {
        
        $request->validate([
            'materi' => 'required|mimes:pdf|file',
            'nama_materi' => 'required|min:3',
            ], [
                'nama_materi.required' => 'Nama materi wajib di isi',
                'materi.required' => 'materi wajib di upload',
                'materi.mimes:pdf' => 'materi yang di upload harus berbentuk pdf',
                'materi.file' => 'materi harus berupa file',
            ]);

        $user = ModelDaftarKelas::find($request->id);

       
        if ($request->hasFile('materi')) {
            $materi_file = $request->file('materi');
            $materi_ekstensi = $materi_file->extension();
            $nama_materi = $request->nama_materi.".".date('d-m-y,h.i.s').".".$materi_ekstensi;
            $materi_file->move('kelas/materi', $nama_materi);
            $user->materi = $nama_materi;
        }

        $user->save();

        Session::flash('success', 'User berhasil diedit');

        return redirect('/daftarkelas');
    }
    function edittugas($id)
    {
        $data = ModelDaftarKelas::where('id', $id)->get();
        return view('daftar_kelas.uploadtugas', ['uc' => $data]);
    }
    function changetugas(Request $request)
    {
        
        $request->validate([
            'tugas' => 'required|mimes:pdf|file',
            'nama_tugas' => 'required|min:3',
            ], [
                'nama_tugas.required' => 'Nama tugas wajib di isi',
                'tugas.required' => 'tugas wajib di upload',
                'tugas.mimes:pdf' => 'tugas yang di upload harus berbentuk pdf',
                'tugas.file' => 'tugas harus berupa file',
            ]);

        $user = ModelDaftarKelas::find($request->id);

       
        if ($request->hasFile('tugas')) {
            $tugas_file = $request->file('tugas');
            $tugas_ekstensi = $tugas_file->extension();
            $nama_tugas = $request->nama_tugas.".".date('d-m-y,h.i.s').".".$tugas_ekstensi;
            $tugas_file->move('kelas/tugas', $nama_tugas);
            $user->tugas = $nama_tugas;
        }

        $user->save();

        Session::flash('success', 'Tugas berhasil diTambahkan');

        return redirect('/daftarkelas');
    }
    
    function editujian($id)
    {
        $data = ModelDaftarKelas::where('id', $id)->get();
        return view('daftar_kelas.uploadujian', ['uc' => $data]);
    }
    function changeujian(Request $request)
    {
        
        $request->validate([
            'ujian' => 'required|mimes:pdf|file',
            'nama_ujian' => 'required|min:3',
            ], [
                'nama_ujian.required' => 'Nama ujian wajib di isi',
                'ujian.required' => 'ujian wajib di upload',
                'ujian.mimes:pdf' => 'ujian yang di upload harus berbentuk pdf',
                'ujian.file' => 'ujian harus berupa file',
            ]);

        $user = ModelDaftarKelas::find($request->id);

       
        if ($request->hasFile('ujian')) {
            $ujian_file = $request->file('ujian');
            $ujian_ekstensi = $ujian_file->extension();
            $nama_ujian = $request->nama_ujian.".".date('d-m-y,h.i.s').".".$ujian_ekstensi;
            $ujian_file->move('kelas/ujian', $nama_ujian);
            $user->ujian = $nama_ujian;
        }

        $user->save();

        Session::flash('success', 'ujian berhasil di tambahkan');

        return redirect('/daftarkelas');
    }

}
