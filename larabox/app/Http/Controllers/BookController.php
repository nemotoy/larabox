<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
class BookController extends Controller
{
    public function lists()
    {
        $a = Book::all();
        dd($a);
        return $a->toJson();
    }
}
