<?php

namespace App\Http\Controllers;
use App\Models\Item;
use App\Models\HomeStartupItem;
use App\Models\Gallery;

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
