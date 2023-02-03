<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompletedTask as CompletedTaskModel;
use Illuminate\Support\Facades\Auth;

class CompletedTaskController extends Controller
{

    // 完了タスクの一覧表示
    public function list() {
        // 1Page辺りの表示アイテム数を設定
        $per_page = 2;
        $list = CompletedTaskModel::where('user_id', Auth::id())->orderBy('priority', 'DESC')->orderBy('period')->orderBy('created_at')->paginate($per_page);
        return view('task.completed_list', ['list'=>$list]);
    }

}
