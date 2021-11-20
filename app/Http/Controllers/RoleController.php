<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
class RoleController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $roles = Role::all();
        return view('role.index', compact('roles'));
    }

    public function create()
    {
        $uri = [];

        //dd(Route::getRoutes()->getRoutes());
        foreach (Route::getRoutes()->getRoutes() as $route){
            if(isset($route->action['middleware']))
            if(is_array($route->action['middleware'])){
                if(in_array('admin',$route->action['middleware'])){
                    //dd('hoke');
                    $routes = $route->uri();
                    $uri[] = $routes;
                }
            };

        }

        $permissions = Permission::all();
        return view('role.create', compact('uri', 'permissions'));
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $request['user_id'] = Auth::id();
        Role::create($request->all())->permissions()->sync($request->permission, false);
        return redirect()->route("roles")->with('success', 'Role has been added');
    }

    public function edit($id)
    {
        $role = Role::query()->findOrFail($id);
        $selected = $role->permissions()->allRelatedIds()->toArray();
        //dd(in_array(2,$true));
        $permissions = Permission::all();
        return view('role.edit', compact('role', 'permissions', 'selected'));
    }

    public function update(Request $request, $id)
    {
        //dd($request);
        $role = Role::query()->findOrFail($id);
        $role->update($request->all());
        $role->permissions()->sync($request->permission, true);
        return redirect()->route("roles")->with('success', 'Role "' . $role->name . '" has been updated!');
    }

    public function destroy($id)
    {
        $role = Role::query()->findOrFail($id);
        $role->permissions()->detach();
        $role->delete();
        return redirect()->route("roles")->with('success', 'Role has been deleted!');
    }
}

