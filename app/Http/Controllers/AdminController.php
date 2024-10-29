<?php

namespace App\Http\Controllers;
// ホーム画面表示
class AdminController extends Controller
{
    public function home()
    {
        $user = auth()->user();

        if ($user->is_admin) {
            return view('admin.home');
        } else {
            return redirect('/home');
        }
    }

}
