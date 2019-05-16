<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

         // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        /*
        Permission::create(['name' => 'edit articles']);
        Permission::create(['name' => 'delete articles']);
        
        Permission::create(['name' => 'unpublish articles']);
		
        // create roles and assign created permissions

        // this can be done as separate statements
        $role = Role::create(['name' => 'writer']);
        $role->givePermissionTo('edit articles');

        // or may be done by chaining
        $role = Role::create(['name' => 'moderator'])
            ->givePermissionTo(['publish articles', 'unpublish articles']);
		*/
        Permission::create(['name' => 'add_theater']);
        Permission::create(['name' => 'modify_theater']);
        Permission::create(['name' => 'delete_theater']);

        

        $role_sadmin = Role::create(['name' => 'super_admin']);
        //$role_sadmin->givePermissionTo(Permission::all());


        $role_sadmin->givePermissionTo(['add_theater','modify_theater', 'delete_theater' ]);


        User::whereIn('id' , [1, 2])->each(function ($item, $key) {

            $item->assignRole('super_admin');
        });



        Permission::create(['name' => 'reserve']);

        $regular = Role::create(['name' => 'regular']);

        $regular->givePermissionTo(['reserve' ]);

        User::whereNotIn('id' , [1,2])->each(function ($item, $key) {

            $item->assignRole('regular');
        });






    }
}
