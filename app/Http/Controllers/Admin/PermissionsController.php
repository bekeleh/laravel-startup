<?php

namespace App\Http\Controllers\Admin;

use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePermissionsRequest;
use App\Http\Requests\Admin\UpdatePermissionsRequest;
use function Psy\debug;
use Doctrine\Common\Util\Debug;

class PermissionsController extends Controller
{
    /**
     * Display a listing of Permission.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Gate::allows('users_manage')) {
            return abort(401);
        }

        $permissions = Permission::all();
        return view('admin.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating new Permission.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!Gate::allows('users_manage')) {
            return abort(401);
        }
        return view('admin.permissions.partials.create');;
    }

    /**
     * Store a newly created Permission in storage.
     *
     * @param  \App\Http\Requests\StorePermissionsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePermissionsRequest $request)
    {
        if (!Gate::allows('users_manage')) {
            return abort(401);
        }
        if (Permission::create($request->all())) {
            return redirect()->route('admin.permissions.index')->with('success', 'Permission successfully created.');
        } else {
            return redirect()->route('admin.permissions.index')->with('errors', 'Permission not successfully created.');
        }
    }


    /**
     * Show the form for editing Permission.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Gate::allows('users_manage')) {
            return abort(401);
        }
        $permission = Permission::findOrFail($id);

        return view('admin.permissions.partials.edit', compact('permission'));
    }

    /**
     * Update Permission in storage.
     *
     * @param  \App\Http\Requests\UpdatePermissionsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePermissionsRequest $request, $id)
    {
        if (!Gate::allows('users_manage')) {
            return abort(401);
        }
        $permission = Permission::findOrFail($id);
        if ($permission->update($request->all())) {
            return redirect()->route('admin.permissions.index')->with('success', 'Permission successfully updated.');
        } else {
            return redirect()->route('admin.permissions.index')->with('errors', 'Permission not successfully updated.');
        }
    }


    /**
     * Remove Permission from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Gate::allows('users_manage')) {
            return abort(401);
        }
        $permission = Permission::findOrFail($id);
        if ($permission->delete()) {
            return redirect()->route('admin.permissions.index')->with('success', 'Permission successfully deleted.');
        } else {
            return redirect()->route('admin.permissions.index')->with('errors', 'Permission successfully deleted.');
        }
    }

    /**
     * Delete all selected Permission at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (!Gate::allows('users_manage')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = Permission::whereIn('id', $request->input('ids'))->get();
            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }
}
