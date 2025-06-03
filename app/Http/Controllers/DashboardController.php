<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->hasRole('Hrd Admin')) {
            return view('hrd.dashboard');
        } elseif ($user->hasRole('Pegawai')) {
            return view('karyawan.dashboard');
        } elseif($user->hasRole('Kadiv Hrd')) {
            return view('kadiv_hrd.dashboard');
        } elseif($user->hasRole('Finance Verifikasi')) {
            return view('finance_verifikasi.dashboard');
        } elseif($user->hasRole('Finance Treasury')) {
            return view('finance_treasury.dashboard');
        } elseif($user->hasRole('GA Meeting Room')) {
            return view('ga_meeting_room.dashboard');
        } elseif($user->hasRole('GA Kendaraan Operasional')) {
            return view('ga_kendaraan_operasional.dashboard');
        } else {
            abort(403, 'Unauthorized');
        }
    }
}
