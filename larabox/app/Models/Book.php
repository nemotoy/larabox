<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    /**
     * テーブル名はデフォルトではクラス名の複数形をスネークケースで表現する。オーバーライドする場合は下記のようにする。
     *
     * @var string
     */
    protected $table = 'my_books';
}
