<?php

namespace Laravolt\Epicentrum\Http\Controllers\User\Password;

use Laravolt\Epicentrum\Repositories\RepositoryInterface;

class Generate
{
    public function __invoke(RepositoryInterface $repository, $id)
    {
        $user = $repository->skipPresenter()->find($id);
        app('password')->sendNewPassword($user, request()->has('must_change_password'));

        return redirect()->back()->withSuccess(trans('epicentrum::message.password_changed_and_sent_to_email'));
    }
}