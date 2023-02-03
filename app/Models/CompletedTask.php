<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompletedTask extends Model
{
    use HasFactory;

    // 複数代入不可能な属性
    protected $guarded = [];

    // 重要度を文字で表示する
    const PRIORITY_VALUE = [
        1 => '低い',
        2 => '普通',
        3 => '高い',
    ];

    // 重要度のゲッター
    public function getPriorityString() {
        return $this::PRIORITY_VALUE[ $this->priority ] ?? '';
    }

}
