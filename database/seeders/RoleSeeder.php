<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1=Role::create(['name'=> 'AdminGlobal']);
        $role2=Role::create(['name'=> 'AdminInstitucion']);

        Permission::create(['name'=>'administradors.index',
                            'description'=>'ver listado de administradores globales'])->syncRoles([$role1]);
        Permission::create(['name'=>'administradors.create',
                            'description'=>'crear administradores globales'])->syncRoles([$role1]);
        Permission::create(['name'=>'administradors.edit',
                            'description'=>'editar administradores globales'])->syncRoles([$role1]);
        Permission::create(['name'=>'administradors.destroy',
                            'description'=>'eliminar administradores globales'])->syncRoles([$role1]);


        Permission::create(['name'=>'institucions.index',
                            'description'=>'ver listado de instituciones'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'institucions.create',
                            'description'=>'crear institucion'])->syncRoles([$role1]);
        Permission::create(['name'=>'institucions.edit',
                            'description'=>'editar institucion'])->syncRoles([$role1]);
        Permission::create(['name'=>'institucions.destroy',
                            'description'=>'eliminar institucion'])->syncRoles([$role1]);


        Permission::create(['name'=>'administradorInstitucions.index',
                            'description'=>'ver listado de administradores de instituciones'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'administradorInstitucions.create',
                            'description'=>'crear administradores de instituciones'])->syncRoles([$role1]);
        Permission::create(['name'=>'administradorInstitucions.edit',
                            'description'=>'editar administradores de instituciones'])->syncRoles([$role1]);
        Permission::create(['name'=>'administradorInstitucions.destroy',
                            'description'=>'eliminar administradores de instituciones'])->syncRoles([$role1]);

        
        Permission::create(['name'=>'chofers.index',
                            'description'=>'ver listado de choferes'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'chofers.create',
                            'description'=>'crear chofer'])->syncRoles([$role1]);
        Permission::create(['name'=>'chofers.edit',
                            'description'=>'editar choferes'])->syncRoles([$role1]);
        Permission::create(['name'=>'chofers.destroy',
                            'description'=>'eliminar choferes'])->syncRoles([$role1]);
    

        Permission::create(['name'=>'roles.index',
                            'description'=>'ver listado de roles'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'roles.create',
                            'description'=>'crear rol'])->syncRoles([$role1]);
        Permission::create(['name'=>'roles.edit',
                            'description'=>'editar rol'])->syncRoles([$role1]);
        Permission::create(['name'=>'roles.destroy',
                            'description'=>'eliminar rol'])->syncRoles([$role1]); 
    

        Permission::create(['name'=>'linea.index',
                            'description'=>'ver listado de lineas'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'linea.create',
                            'description'=>'crear linea'])->syncRoles([$role1]);
        Permission::create(['name'=>'linea.edit',
                            'description'=>'editar linea'])->syncRoles([$role1]);
        Permission::create(['name'=>'linea.destroy',
                            'description'=>'eliminar linea'])->syncRoles([$role1]); 


         Permission::create(['name'=>'duenio.index',
                            'description'=>'ver listado de dueños de micros'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'duenio.create',
                            'description'=>'crear dueño de micro'])->syncRoles([$role1]);
        Permission::create(['name'=>'duenio.edit',
                            'description'=>'editar dueño de micro'])->syncRoles([$role1]);
        Permission::create(['name'=>'duenio.destroy',
                            'description'=>'eliminar dueño de micro'])->syncRoles([$role1]); 


        Permission::create(['name'=>'permiso.index',
                            'description'=>'ver listado permisos'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'permiso.create',
                            'description'=>'crear permiso'])->syncRoles([$role1]);
        Permission::create(['name'=>'permiso.edit',
                            'description'=>'editar permiso'])->syncRoles([$role1]);
        Permission::create(['name'=>'permiso.destroy',
                            'description'=>'eliminar permiso'])->syncRoles([$role1]); 

                            
        // Permission::create(['name'=>'cliente.index',
        //                     'description'=>'ver listado de clientes'])->syncRoles([$role1, $role2]);
        // Permission::create(['name'=>'cliente.create',
        //                     'description'=>'crear cliente'])->syncRoles([$role1]);
        // Permission::create(['name'=>'cliente.edit',
        //                     'description'=>'editar cliente'])->syncRoles([$role1]);
        // Permission::create(['name'=>'cliente.destroy',
        //                     'description'=>'eliminar cliente'])->syncRoles([$role1]); 



        // Permission::create(['name'=>'detalleProductos.index',
        //                     'description'=>'ver listado de clientes'])->syncRoles([$role1, $role2]);
        // Permission::create(['name'=>'detalleProductos.create',
        //                     'description'=>'crear cliente'])->syncRoles([$role1]);
        // Permission::create(['name'=>'detalleProductos.edit',
        //                     'description'=>'editar cliente'])->syncRoles([$role1]);
        // Permission::create(['name'=>'detalleProductos.destroy',
        //                     'description'=>'eliminar cliente'])->syncRoles([$role1]); 


        // Permission::create(['name'=>'Nota_de_compras.index',
        //                     'description'=>'ver listado de compras'])->syncRoles([$role1, $role2]);
        // Permission::create(['name'=>'Nota_de_compras.create',
        //                     'description'=>'crear nota de compra'])->syncRoles([$role1]);
        // Permission::create(['name'=>'Nota_de_compras.edit',
        //                     'description'=>'editar nota de compra'])->syncRoles([$role1]);
        // Permission::create(['name'=>'Nota_de_compras.destroy',
        //                     'description'=>'eliminar nota de compra'])->syncRoles([$role1]); 
    }
}
