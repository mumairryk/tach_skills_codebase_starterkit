<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct()
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
    }
}
