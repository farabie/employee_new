<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
     public function run(): void
    {
        // 1. Modular Permissions
        $modules = [
            'dashboard' => ['access'],
            'karyawan' => ['informasi semua', 'create', 'detail'],
            'divisi' => ['view', 'create', 'edit', 'delete'],
            'departemen' => ['view', 'create', 'edit', 'delete'],
            'jabatan' => ['view', 'create', 'edit', 'delete'],
            'grade' => ['view', 'create', 'edit', 'delete'],
            'lokasi kerja' => ['view', 'create', 'edit', 'delete'],
            'lokasi posisi' => ['view', 'create', 'edit', 'delete'],
            'reset password karyawan' => ['view', 'reset'],
            'struktur orchart' => ['view', 'edit'],
            'approval' => ['view', 'edit'],
            'hari libur nasional' => ['view', 'create', 'edit', 'delete'],
            'hari pemotongan cuti' => ['view', 'create'],
            'kuota cuti karyawan' => ['view', 'create'],
            'tracking' => ['cuti', 'izin personal', 'spd', 'medical'],
        ];

        // 2. Create permissions and store in a collection
        $allPermissions = collect();

        foreach ($modules as $module => $actions) {
            foreach ($actions as $action) {
                $name = $module === 'dashboard' && $action === 'access' 
                    ? 'dashboard' 
                    : "$action $module";

                $permission = Permission::firstOrCreate(['name' => $name, 'guard_name' => 'web']);
                $allPermissions->push($permission);
            }
        }

        // 3. Create Roles
        $hrdAdminRole = Role::firstOrCreate(['name' => 'Hrd Admin']);
        $pegawaiRole = Role::firstOrCreate(['name' => 'Pegawai']);

        // 4. Assign all permissions to HRD Admin
        $hrdAdminRole->syncPermissions($allPermissions);

        // 5. Assign limited permissions to Pegawai
        $pegawaiPermissionNames = [
            'dashboard',
            'tracking cuti',
            'tracking izin personal',
            'tracking spd',
            'tracking medical',
        ];

        $pegawaiPermissions = $allPermissions->filter(function ($permission) use ($pegawaiPermissionNames) {
            return in_array($permission->name, $pegawaiPermissionNames);
        });

        $pegawaiRole->syncPermissions($pegawaiPermissions);

        // 6. Create HRD Admin User
        $hrdAdmin = User::firstOrCreate(
        ['id_user' => 'hr1'],
        [
            'id_peg' => 0,
            'nama_user' => 'Hrd Admin',
            'password' => md5('triasmitra'),
            'hak_akses' => 'Hrd Admin',
        ]
    );

        if (!$hrdAdmin->hasRole($hrdAdminRole->name)) {
            $hrdAdmin->assignRole($hrdAdminRole);
        }
    }
}
