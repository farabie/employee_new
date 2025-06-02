<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class AssignRoleFromHakAkses extends Command
{
    protected $signature = 'role:assign-hakakses';
    protected $description = 'Assign roles to users based on hak_akses field';

    public function handle()
    {
        $users = User::all();

        foreach ($users as $user) {
            if ($user->hak_akses) {
                $user->assignRole($user->hak_akses);
                $this->info("Assigned role {$user->hak_akses} to {$user->nama_user}");
            }
        }

        $this->info('Selesai assign role berdasarkan hak_akses.');
    }
}
