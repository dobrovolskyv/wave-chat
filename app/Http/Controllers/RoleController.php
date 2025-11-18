<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleController extends Controller
{
    public function index()
    {
        return Role::all();

    }
    public function show(Role $role)
    {
        return $role;
    }
    public function store()
    {
        $data = [
            'title' => 'admin 2'
        ];
        $role = Role::create($data);
        return $role;
    }

    public function update(Role $role)
    {
        $role->update([
            'title' => 'ne admin'
        ]);

        return $role;

    }

    public function destroy(Role $role)
    {
        $role->delete();

        return response()->json([
            'message' => 'success'
        ], Response::HTTP_OK);
    }
}
