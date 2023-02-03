<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRegisterPost;
use App\Models\User as UserModel;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    // ========== ▼▼▼ ユーザー登録画面の表示 ▼▼▼ ==========
    public function index() {
        return view('user.register');
    }



    // ========== ▼▼▼ ユーザー登録機能 ▼▼▼ ==========
    public function register(UserRegisterPost $request) {

        // ----- ▽▽▽ バリデーション済データの受け取り ▽▽▽ -----
        $datum = $request->validated();
        $datum['password'] = Hash::make($datum['password']);

        // ----- ▽▽▽ テーブルへのインサート ▽▽▽ -----
        try {
            $r = UserModel::create($datum);
        } catch(\Throwable $e) {
            // エラーメッセージ
            echo $e->getMessage();
            exit;
        }

        // ----- ▽▽▽ 登録完了メッセージを出す ▽▽▽ -----
        $request->session()->flash('user_success', true);

        // ----- ▽▽▽ リダイレクト ▽▽▽ -----
        return redirect('/');

    }

}
