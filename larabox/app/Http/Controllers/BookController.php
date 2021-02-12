<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
class BookController extends Controller
{
    public function lists()
    {
        return response()->json([
            'books' => [
                ['id' => '1', 'title' => 'aaa'],
                ['id' => '2', 'title' => 'bbb'],
                ['id' => '3', 'title' => 'bbb'],
            ]
            ], 200);
        // $a = Book::all();
        // return $a->toJson();
    }
}
