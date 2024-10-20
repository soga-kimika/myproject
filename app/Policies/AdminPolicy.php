<?php

namespace App\Policies;

use App\Models\User;

class AdminPolicy
{
    /**
     * 管理者権限を持っているか確認
     *
     * @param  User  $user
     * @return bool
     */
    public function viewAdmin(User $user)
    {
        return $user->isAdmin();
    }
}
