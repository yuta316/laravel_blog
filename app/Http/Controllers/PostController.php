<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Postモデルクラスのuse宣言追加
use App\Post;

class PostController extends Controller
{
    // Poot一覧を表示
    public function index(Post $post) {
        return view('posts/index')->with(['posts' => $post->getPaginateByLimit()]);
    }
}
