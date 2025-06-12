<?php

namespace App\Http\Controllers\hrd\masterSetup;

use App\Http\Controllers\Controller;
use App\Models\shared\User;

class ResetPassUserController extends Controller
{
    public function index() {
            $user = User::where('hak_akses', 'Pegawai')
                    ->orderBy('nik', 'ASC')
                    ->get();
            return view('hrd.masterSetup.resetPassUser.index', compact('user'));
    }

    public function resetPassword($nik) {
        $user = User::where('nik', $nik)->first();
        if ($user) {
            $user->password = '4edfd2bae7c4276e7566366389168648';
            $user->save();
        }
        return redirect()->route('reset.pass.user.index');
    }
}
