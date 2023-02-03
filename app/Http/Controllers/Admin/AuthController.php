<?php
declare(strict_types=1);
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminLoginPostRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {




    // トップページを表示する
    public function index() {
        return view('admin.index');
    }

    // ログイン画面の値を受け取って表示する
    public function login(AdminLoginPostRequest $request) {

        // validate済

        // データの取得
        $datum = $request->validated();
        // var_dump($datum); exit();

        // 認証
        if (Auth::guard('admin')->attempt($datum) === false) {
            return back()
                   ->withInput() // 入力値の保持
                   ->withErrors(['auth' => 'ログインIDかパスワードに誤りがあります。',]) // エラーメッセージの出力
                   ;
        }

        $request->session()->regenerate();
        return redirect()->intended('/admin/top');
    }

    // ログアウト
    public function logout(Request $request) {
        Auth::guard('admin')->logout();
        $request->session()->regenerateToken();  // CSRFトークンの再生成
        $request->session()->regenerate();  // セッションIDの再生成
        return redirect(route('admin.index'));
    }

    // 認証されていないユーザーのリダイレクト
    protected function redirectTo($request) {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }



}