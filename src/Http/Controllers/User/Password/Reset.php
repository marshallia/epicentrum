<?php

namespace Laravolt\Epicentrum\Http\Controllers\User\Password;

use Laravolt\Epicentrum\Repositories\RepositoryInterface;

class Reset
{
    public function __invoke(RepositoryInterface $repository, $id)
    {
        $user = $repository->findById($id);
        app('password')->sendResetLink($user);

        return redirect()->back()->withSuccess(trans('epicentrum::message.password_reset_sent'));
    }
}
