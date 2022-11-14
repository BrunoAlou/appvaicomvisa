<?php

namespace Database\Seeders;

use App\Enums\Role\RoleNameEnum;
use App\Enums\Tenant\TenantTypeEnum;
use DB;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('users')
            ->insert([
                [
                    'name' => 'Visa teste',
                    'email' => 'visa@teste.com',
                    'username' => 'visa@testado.com',
                    'password' => bcrypt('visa'),
                ],
                [
                    'name' => 'Visa Admin',
                    'email' => 'admin@admin.com',
                    'username' => 'visaadmin',
                    'password' => bcrypt('admin')
                ],
            ]);
    }
}
