<?php


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


use Illuminate\Support\Str;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $permissions = [
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'view_orders',
           'delete_orders',
           'generate_invoice',
           'dashboard',
           'view_services',
           'delete_services',
           'edit_services',
           'view_payment_methods',
           'edit_payment_methods',
           'delete_payment_methods',
           'view_admins',
           'edit_admins',
           'delete_admins',
           'view_reports',
           'view_customers',
           'edit_customers',
           'delete_customers',
        ];


        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission,'id'=>Str::uuid()->toString() ]);
       }
    }
}
