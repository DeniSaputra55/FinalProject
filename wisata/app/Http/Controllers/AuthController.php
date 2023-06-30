<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Cookie;
// use Session;
use Illuminate\Support\Facades\Session;
use App\Models\User;

session_id("pariwisata");
// session_start();

class AuthController extends Controller
{
    public function showLogin() {
        return view('authentication.login');
    }

    public function showRegister() {
        return view('authentication.register');
    }

    public function login(Request $request) {
        // Validate form
        $this->validate($request, [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string'],
        ]);

        $param = $request->only(['email', 'password']);
        // select credentials to login
        $result = User::where('email', $param['email'])->first();
        if($result) 
        {
            if($result->role == 'admin')
            {
                if(Hash::check($param['password'], $result['password']))
                {
                    if(Auth::attempt($param))
                    {
                        $user = Auth::user();
                        // SET SESSION
                        Session::put('login_admin', true);
                        Session::put('id_user_admin', $result['id']);
                        Session::put('name_admin', $result['name']);
                        Session::put('email_admin', $result['email']);
                        Session::put('password_admin', $param['password']);
                        Session::put('role_admin', $result['role']);
                        // END OF SESSION

                        if(isset($request->remember))
                        {
                            // SET COOKIE
                            Cookie::queue('remember_admin', 'remembered', 120);
                            Cookie::queue('id_user_admin', $result['id'], 120);
                            Cookie::queue('name_admin', $result['name'], 120);
                            Cookie::queue('email_admin', $result['email'], 120);
                            Cookie::queue('role_admin', $result['role'], 120);
                            Cookie::queue('password_admin', $param['password'], 120);
                        }
                        
                        // Redirect pages
                        return redirect()->to('admin/dashboard');
                    }
                }
            }
        }
    }

    public function register(Request $request)
    {
        $param = $request->all();

        $this->validate($request, [
            'name'  => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'unique:users', 'max:255'],
            'password' => ['required', 
                            'string'],
            'konfirmasi_password' => ['required', 'string']
        ]);

        if($param['konfirmasi_password'] == $param['password'])
        {
            $register = User::create([
                'name' => $param['name'],
                'email' => $param['email'],
                'password' => Hash::make($param['password']),
                'role' => 'admin',
                'created_at' => date('Y-m-d H:i:s')          
            ]);
    
            if($register)
            {
                return redirect()->to('admin/auth/login')->with('success', 'Registrasi akun berhasil');
            } else {
                return redirect()->to('admin/auth/login')->with('error', 'Registrasi akun gagal');
            }
        } else {
            return redirect()->to('admin/auth/login')->with('error', 'Registrasi akun gagal! Password tidak sama');
        }
    }

    public function logout()
    {
        Session::flush();
        if(Cookie::has('remember') == true)
        {
            Cookie::queue(Cookie::forget('remember'));
            Cookie::queue(Cookie::forget('id_user'));
            Cookie::queue(Cookie::forget('name'));
            Cookie::queue(Cookie::forget('email'));
            Cookie::queue(Cookie::forget('role'));
            Cookie::queue(Cookie::forget('password'));
        }
        return Redirect::to('admin/auth/login');
    }

    public function logoutPengunjung()
{
    Session::flush();
    if (Cookie::has('remember_pengunjung') == true) {
        Cookie::queue(Cookie::forget('remember_pengunjung'));
        Cookie::queue(Cookie::forget('id_user_pengunjung'));
        Cookie::queue(Cookie::forget('email_pengunjung'));
        Cookie::queue(Cookie::forget('password_pengunjung'));
    }
    return redirect()->to('front');
}

    // Pengunjung
    public function showLoginPengunjung() {
        return view('authentication.pengunjung.login');
    }

    public function showRegisterPengunjung() {
        return view('authentication.pengunjung.register');
    }

    public function loginPengunjung(Request $request)
    {
        // Validasi form
        $this->validate($request, [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string'],
        ]);

        $param = $request->only(['email', 'password']);
        // Pilih kredensial untuk login
        $result = User::where('email', $param['email'])->first();
        if ($result) {
            if ($result->role == 'pengunjung') {
                if (Hash::check($param['password'], $result['password'])) {
                    if (Auth::attempt($param)) {
                        $user = Auth::user();
                        // SET SESSION
                        Session::put('login_pengunjung', true);
                        Session::put('id_user_pengunjung', $result['id']);
                        Session::put('name_pengunjung', $result['name']);
                        Session::put('email_pengunjung', $result['email']);
                        Session::put('password_pengunjung', $param['password']);
                        Session::put('role_pengunjung', $result['role']);
                        // END OF SESSION

                        if (isset($request->remember)) {
                            // SET COOKIE
                            Cookie::queue('remember_pengunjung', 'remembered', 120);
                            Cookie::queue('id_user_pengunjung', $result['id'], 120);
                            Cookie::queue('email_pengunjung', $result['email'], 120);
                            Cookie::queue('password_pengunjung', $param['password'], 120);
                        }

                        // Redirect ke halaman yang diinginkan
                        return redirect()->to('front');
                    }
                }
            }
        }

        // Jika login gagal, tampilkan pesan kesalahan dan arahkan kembali ke halaman login
        $errorMessage = 'Email dan password yang Anda masukkan salah.';
        return redirect()->back()->withErrors(['login_error' => $errorMessage])->withInput();
    }

    public function registerPengunjung(Request $request)
    {
        $param = $request->all();

        $this->validate($request, [
            'name'  => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'unique:users', 'max:255'],
            'password' => ['required', 
                            'string'],
            'konfirmasi_password' => ['required', 'string']
        ]);

        if($param['konfirmasi_password'] == $param['password'])
        {
            $register = User::create([
                'name' => $param['name'],
                'email' => $param['email'],
                'password' => Hash::make($param['password']),
                'role' => 'pengunjung',
                'created_at' => date('Y-m-d H:i:s')          
            ]);
    
            if($register)
            {
                return redirect()->to('pengunjung/auth/login')->with('success', 'Registrasi akun berhasil');
            } else {
                return redirect()->to('pengunjung/auth/login')->with('error', 'Registrasi akun gagal');
            }
        } else {
            return redirect()->to('pengunjung/auth/login')->with('error', 'Registrasi akun gagal! Password tidak sama');
        }
    }

    
}
