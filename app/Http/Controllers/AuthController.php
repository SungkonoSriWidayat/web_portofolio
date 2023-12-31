<?php

namespace App\Http\Controllers;

use App\Mail\Smtp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    function index(){
        return view('halaman_auth/login');
    }
    function login(Request $request){
        $request->validate([
            'email' =>'required',
            'password' => 'required'
        ],[
            'email.required'=>'Email tidak boleh kosong!',
            'password.required'=>"Password harus diisi!",
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt(($infologin))){
            if(Auth::user()->email_verified_at != null){
                if(Auth::user()->role === 'admin'){
                    return redirect()->route('admin')->with('success','Welcome admin');
                }else if(Auth::user()->role === 'user'){
                    return redirect()->route('user')->with('success','anda berhasil login');
                }
            }else{
                Auth::logout();
                return redirect()->route('auth')->withErrors('akun anda belum aktif, harap verivikasi email dahulu');
            }
        }else{
            return redirect()->route('auth')->withErrors('Email atau password salah');
        }
    }
    function create(){
        return view('halaman_auth/register');
    }
    function register(Request $request){
        $str = Str::random(100);
        $request->validate([
            'fullname'=> 'required|min:5',
            'email'=> 'required|unique:users|email',
            'password'=> 'required|min:6',
            'gambar'=> 'required|image|file',
        ],[
            'fullname.required' => 'Full name wajib diisi',
            'fullname.min' => 'Full name minimal 5 karakter',
            'email.required' => 'email wajib diisi',
            'email.unique' => 'email telah terdaftar',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 6 karakter',
            'gambar.required' => 'gambar wajib di upload',
            'gambar.image' => 'gambar yang di upload harus image',
            'gambar.file' => 'Gambar harus berupa file'
        ]);

        $gambar_file =$request->file('gambar');
        $gambar_ekstensi = $gambar_file->extension();
        $nama_gambar = date('ymdhis').".".$gambar_ekstensi;
        $gambar_file->move(public_path('picture/accounts'),$nama_gambar);

        $inforegister = [
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => $request->password,
            'gambar' => $nama_gambar,
            'verify_key' => $str,
        ];

        User::create($inforegister);

        $details = [
            'nama'=> $inforegister['fullname'],
            'role'=>'user',
            'datetime' => date('Y-m-d H:i:s'),
            'website'=> 'smtp',
            'url'=>'http://'. request()->getHttpHost()."/"."verify/".$inforegister['verify_key'],
        ];

        Mail::to($inforegister['email'])->send(new Smtp($details));

        return redirect()->route('auth')->with('success','Link verifikasi telah dikirim ke email anda, silahkan cek email anda');
    }
    function verify($verify_key){
        $keyCheck = User::select('verify_key')
        ->where('verify_key',$verify_key)
        ->exists();

        if($keyCheck){
            $user = User::where('verify_key',$verify_key)->update(['email_verified_at' => date('Y-m-d H:i:s')]);

            return redirect()->route('auth')->with('success','Verifikasi berhasil, akun anda sudah aktif');
        }else{
            return redirect()->route('auth')->withErrors('Keys tidak valid. pastikan telah melakukan register')->withInput();
        }
    }
    function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
