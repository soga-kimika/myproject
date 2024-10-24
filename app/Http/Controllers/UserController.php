<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // ユーザー一覧表示
    public function indexUsers(Request $request)
    {
        // ログインユーザーのクエリを準備
        $query = User::query();

        // 検索条件がある場合
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                // Idは完全一致
                $q->where('id', $search)
                    // 名前は部分一致
                    ->orWhere('name', 'LIKE', "%{$search}%")
                    // メールは部分一致
                    ->orWhere('email', 'LIKE', "%{$search}%");
            });
        }

        // ユーザーを取得し、ページネーション
        $users = $query->paginate(10);

        // ビューを返す
        return view('admin.users', compact('users'));
    }

    // ユーザー削除
    public function destroyUser($id)
    {
        // ユーザーを取得
        $user = User::findOrFail($id);
        // ウィッシュリストに関連するレコードを削除
        $user->homeStartupItems()->delete();
        // 要望に関連するレコードを削除
        $user->items()->delete();
        // ユーザーに関連するレコードを削除
        $user->galleries()->delete();
        // ユーザーに関連するレコードを削除
        $user->clients()->delete();
        // ユーザーを削除
        $user->delete();
        return redirect()->route('admin.users.index');
    }
}
