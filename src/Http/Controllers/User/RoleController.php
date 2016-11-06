<?php

namespace Laravolt\Epicentrum\Http\Controllers\User;

use Illuminate\Http\Request;
use Laravolt\Acl\Models\Role;

class RoleController extends UserController
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->repository->skipPresenter()->find($id);
        $roles = Role::all();
        return view('epicentrum::role.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = $this->repository->skipPresenter()->find($id);
        $user->roles()->sync($request->get('roles', []));

        return redirect()->back()->withSuccess(trans('epicentrum::message.role_updated'));
    }
}
