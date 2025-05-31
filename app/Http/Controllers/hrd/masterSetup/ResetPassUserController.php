<?php

namespace App\Http\Controllers\hrd\masterSetup;

use App\Http\Controllers\Controller;
use App\Models\shared\User;

class ResetPassUserController extends Controller
{
    public function index() {
            $user = User::where('hak_akses', 'Pegawai')
                    ->orderBy('id_user', 'ASC')
                    ->get();
            return view('hrd.masterSetup.resetPassUser.index', compact('user'));
    }

    public function resetPassword($id_user) {
        $user = User::where('id_user', $id_user)->first();
        if ($user) {
            $user->password = '4edfd2bae7c4276e7566366389168648';
            $user->save();
        }
        return redirect()->route('reset.pass.user.index');
    }
}
