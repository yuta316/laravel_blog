<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Postモデルクラスのuse宣言追加
use App\Post;
use App\Category;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    // Post一覧を表示
    public function index(Post $post) {
        return view('posts/index')->with(['posts' => $post->getPaginateByLimit()]);
    }
    
    // 特定IDのPostを表示
    public function show(Post $post) {
        return view('posts/show')->with(['post' => $post]);
    }
    
    // 作成画面に遷移
    public function create(Category $category) {
        return view('posts/create')->with(['categories' => $category->get()]);
    }
    
    // ブログ保存
    public function store(PostRequest $request, Post $post) {
        $input = $request['post'];
        $post->fill($input)->save();
        
        return redirect('/posts/' . $post->id);
    }
    
    // 編集画面に遷移
    public function edit(Post $post) {
        return view('posts/edit')->with(['post' => $post]);
    }
    
    // ブログ編集
    public function update(PostRequest $request, Post $post) {
        $input_post = $request['post'];
        $post->fill($input_post)->save();
        return redirect('/posts/' . $post->id);
    }
    
    // ブログ削除
    public function delete(Post $post) {
        $post->delete();
        return redirect('/');
    }
}
