<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    public function createDosen()
    {
        return view('register.dosen', [
            'title' => 'Daftar Dosen'
        ]);
    }

    public function createMahasiswa()
    {
        return view('register.mahasiswa', [
            'title' => 'Daftar Mahasiswa'
        ]);
    }

    public function storeDosen(Request $request)
    {
        $validatedData = $request->validate([
            'role'      => 'required',
            'status'    => 'required',
            'name'      => 'required|regex:/^[a-zA-Z\s]+$/i|max:255',
            'nip'       => 'required|alpha_num|min:18|max:19|unique:dosens',
            'email'     => 'required|email:dns|unique:users',
            'password'  => 'required|min:8|confirmed'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        $user = User::create([
            'email'     => $validatedData['email'],
            'password'  => $validatedData['password'],
            'role'      => $validatedData['role'],
            'status'    => $validatedData['status']
        ]);

        event(new Registered($user));

        [$user] = User::where('email', $validatedData['email'])->get();

        Dosen::create([
            'user_id'   => $user->id,
            'nip'       => $validatedData['nip'],
            'name'      => $validatedData['name']
        ]);

        $request->session()->flash('success', 'Registrasi Berhasil. Silahkan login!');

        return redirect('/login');
    }

    public function storeMahasiswa(Request $request)
    {
        $validatedData = $request->validate([
            'role'                  => 'required',
            'status'                => 'required',
            'name'                  => 'required|regex:/^[a-zA-Z\s]+$/i|max:255',
            'nik'                   => 'required|numeric|digits:16|unique:mahasiswas',
            'tempat_lahir'          => 'required|regex:/^[a-zA-Z\s]+$/i|max:255',
            'tanggal_lahir'         => 'required|date',
            'npm'                   => 'required|numeric|digits:10|unique:mahasiswas',
            'telp'                  => 'required|numeric|digits_between:9,14|unique:mahasiswas',
            'program_pendidikan'    => 'required',
            'program_studi'         => 'required',
            'semester'              => 'required',
            'ipk'                   => 'required|numeric|between:0,4',
            'email'                 => 'required|email:dns|unique:users',
            'password'              => 'required|min:8|confirmed'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        $user = User::create([
            'email'     => $validatedData['email'],
            'password'  => $validatedData['password'],
            'role'      => $validatedData['role'],
            'status'    => $validatedData['status']
        ]);

        event(new Registered($user));

        [$user] = User::where('email', $validatedData['email'])->get();

        Mahasiswa::create([
            'user_id'               => $user->id,
            'name'                  => $validatedData['name'],
            'nik'                   => $validatedData['nik'],
            'tempat_lahir'          => $validatedData['tempat_lahir'],
            'tanggal_lahir'         => $validatedData['tanggal_lahir'],
            'npm'                   => $validatedData['npm'],
            'telp'                  => $validatedData['telp'],
            'program_pendidikan'    => $validatedData['program_pendidikan'],
            'program_studi'         => $validatedData['program_studi'],
            'semester'              => $validatedData['semester'],
            'ipk'                   => $validatedData['ipk']
        ]);

        $request->session()->flash('success', 'Registrasi Berhasil. Silahkan login!');

        return redirect('/login');
    }
}
