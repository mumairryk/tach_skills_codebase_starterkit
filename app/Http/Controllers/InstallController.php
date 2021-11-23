<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

class InstallController extends Controller
{
    public function install()
    {
        $permissions_collections= DB::table('permissions')->get();
        //dd(Route::getRoutes()->getRoutes());
        foreach (Route::getRoutes()->getRoutes() as $route){
            if(isset($route->action['middleware']))
                if(is_array($route->action['middleware'])){
                    if(in_array('auth',$route->action['middleware'])){
                        $routes = $route->uri();
                        if($permissions_collections->where(['name'=>$routes])->isEmpty())
                        {
                            DB::table('permissions')->insertOrIgnore(['name'=>$routes]);
                        }
                    }
                };
        }
        $check_user_data = User::all();
        if ($check_user_data->isNotEmpty()) {
            return redirect("/login")->with('error','Installed already');
        }
        $user_data_array=array(
            'name'=>'admin',
            'email'=>'admin@mail.com',
            'password'=>Hash::make('Admin123')
        );
        $user_model = User::create($user_data_array);
        $role_model = Role::create(['user_id'=>$user_model->id,'name'=>'Admin','description'=>'This role is for admin user']);
        $permissions = Permission::all();
        foreach ($permissions as $permission)
        {
            DB::table('permission_role')->insertOrIgnore(['permission_id'=>$permission->id,'role_id'=>$role_model->id]);
        }
        DB::table('role_user')->insertOrIgnore(['role_id'=>$role_model->id,'user_id'=>$user_model->id]);
        return redirect("/login")->with('success','Installer Successfully');
    }
}
