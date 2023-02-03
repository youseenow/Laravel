<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginPostRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {



    // トップページを表示する
    public function index() {
        return view('index');
    }

    // ログイン画面の値を受け取って表示する
    public function login(LoginPostRequest $request) {
        // validate済
        $datum = $request->validated();
        // var_dump($datum); exit();

        if (Auth::attempt($datum) === false) {
            return back()
                   ->withInput() // 入力値の保持
                   ->withErrors(['auth' => 'emailかパスワードに誤りがあります。',]) // エラーメッセージの出力
                   ;
        }

        $request->session()->regenerate();
        return redirect()->intended('/task/list');

    }

    // ログアウト
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->regenerateToken();  // CSRFトークンの再生成
        $request->session()->regenerate();  // セッションIDの再生成
        return redirect(route('front.index'));
    }

    // 認証されていないユーザーのリダイレクト
    protected function redirectTo($request) {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }



}