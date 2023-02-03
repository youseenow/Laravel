<?php
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class WelcomeController extends Controller {
    
    
    
    // トップページを表示する 
    public function index() {
        return view('welcome');
    }
    
    
    
    // 2ページ目を表示する 
    public function second() {
        return view('welcome_second');
    }
    
    
    
}