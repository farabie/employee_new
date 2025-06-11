<?php

namespace Database\Seeders;

use App\Models\User;
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
            'approval' => [
                'cuti tahunan',
                'cuti umum',
                'cuti besar',
                'spd',
                'medical',
                'kendaraan operasional',
            ],
            'hari libur nasional' => ['view', 'create', 'edit', 'delete'],
            'hari pemotongan cuti' => ['view', 'create'],
            'kuota cuti karyawan' => ['view', 'create'],
            'tracking' => ['cuti', 'izin personal', 'spd', 'medical', 'kendaraan operasional'],
            'master ruang meeting' => ['view', 'create', 'edit', 'delete'],
            'master kendaraan operasional' => ['view', 'create', 'edit', 'delete'],
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

        $pegawaiPermissions = $allPermissions->filter(fn ($perm) =>
            in_array($perm->name, $pegawaiPermissionNames)
        );

        $pegawaiRole->syncPermissions($pegawaiPermissions);

        // 6. Create HRD Admin User
        $hrdAdmin = User::firstOrCreate(
            ['nik' => 'hr1'],
            [                
                'nama_user' => 'Hrd Admin',
                'password' => md5('triasmitra'),
                'hak_akses' => 'Hrd Admin',
            ]
        );

        if (!$hrdAdmin->hasRole($hrdAdminRole->name)) {
            $hrdAdmin->assignRole($hrdAdminRole);
        }

        // 7. Custom Users and Roles
        $customUsers = [
            [
                'nik' => 'kadiv_hrd',
                'nama_user' => 'Kepala Divisi HRD',
                'hak_akses' => 'Kadiv HRD',
                'role_name' => 'Kadiv Hrd',
                'permissions' => [
                    'dashboard',
                    'spd approval',
                    'medical approval',
                    'tracking spd',
                    'tracking medical',
                ],
            ],
            [
                'nik' => 'finance_verifikasi1',
                'nama_user' => 'Finance Verifikasi 1',
                'hak_akses' => 'Finance Verifikasi',
                'role_name' => 'Finance Verifikasi',
                'permissions' => [
                    'dashboard',
                    'spd approval',
                    'medical approval',
                    'tracking spd',
                    'tracking medical',
                ],
            ],
            [
                'nik' => 'finance_treasury',
                'nama_user' => 'Finance Treasury',
                'hak_akses' => 'Finance Treasury',
                'role_name' => 'Finance Treasury',
                'permissions' => [
                    'dashboard',
                    'spd approval',
                    'medical approval',
                    'tracking spd',
                    'tracking medical',
                ],
            ],
            [
                'nik' => 'ga_1',
                'nama_user' => 'GA Fungsional Meeting Room',
                'hak_akses' => 'GA Meeting Room',
                'role_name' => 'GA Meeting Room',
                'permissions' => [
                    'dashboard',
                    'view master ruang meeting',
                    'create master ruang meeting',
                    'edit master ruang meeting',
                    'delete master ruang meeting',
                ],
            ],
            [
                'nik' => 'ga_2',
                'nama_user' => 'GA Fungsional Kendaraan Operasional',
                'hak_akses' => 'GA Kendaraan Operasional',
                'role_name' => 'GA Kendaraan Operasional',
                'permissions' => [
                    'dashboard',
                    'view master kendaraan operasional',
                    'create master kendaraan operasional',
                    'edit master kendaraan operasional',
                    'delete master kendaraan operasional',
                    'tracking kendaraan operasional',
                ],
            ],
        ];

        foreach ($customUsers as $data) {
            $role = Role::firstOrCreate(['name' => $data['role_name']]);

            $permissions = collect($data['permissions'])->map(function ($perm) {
                return Permission::firstOrCreate(['name' => $perm, 'guard_name' => 'web']);
            });

            $role->syncPermissions($permissions);

            $user = User::firstOrCreate(
                ['nik' => $data['nik']],
                [
                    'nama_user' => $data['nama_user'],
                    'password' => md5('triasmitra'),
                    'hak_akses' => $data['hak_akses'],
                ]
            );

            if (!$user->hasRole($role->name)) {
                $user->assignRole($role);
            }
        }
    }
}
