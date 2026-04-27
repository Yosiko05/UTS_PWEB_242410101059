<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        //Akun
        $accounts = [
            'yosiko' => 'yosiko05',
        ];

        if (isset($accounts[$username]) && $accounts[$username] === $password) {
            return redirect()->route('dashboard', ['username' => $username]);
        }

        return redirect()->route('login', ['error' => 'Username atau password salah!']);
    }
    public function logout()
    {
        return redirect()->route('login');
    }

    public function dashboard(Request $request)
    {
        $username    = $request->query('username');
        $tugas       = $this->getDefaultTugas();
        $total       = count($tugas);
        $selesai     = count(array_filter($tugas, fn($t) => $t['status'] === 'Selesai'));
        $berlangsung = count(array_filter($tugas, fn($t) => $t['status'] === 'Berlangsung'));
        $pending     = count(array_filter($tugas, fn($t) => $t['status'] === 'Pending'));

        return view('dashboard', compact('username', 'tugas', 'total', 'selesai', 'berlangsung', 'pending'));
    }

    public function pengelolaan(Request $request)
    {
        $username = $request->query('username');
        $tugas    = $this->getDefaultTugas();

        return view('pengelolaan', compact('tugas', 'username'));
    }

    public function profile(Request $request)
    {
        $username = $request->query('username');

        return view('profile', compact('username'));
    }

    private function getDefaultTugas()
    {
        return [
            ['id' => 1, 'judul' => 'Profesional Issue',      'prioritas' => 'Tinggi', 'status' => 'Pending',     'deadline' => '2026-04-27'],
            ['id' => 2, 'judul' => 'Datamining',   'prioritas' => 'sedang', 'status' => 'Selesai',     'deadline' => '2026-04-23'],
            ['id' => 3, 'judul' => ' UTS Pweb', 'prioritas' => 'Tinggi', 'status' => 'Berlangsung', 'deadline' => '2026-04-27'],
        ];
    }
}