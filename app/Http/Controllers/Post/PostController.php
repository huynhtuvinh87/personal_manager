<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Post\Actions\ListAction;
use App\Http\Controllers\Post\Tasks\ListTask;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Controllers\Post\Tasks\StoreTask;
use App\Http\Controllers\Post\Tasks\UpdateTask;
use Session;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = app(ListTask::class)->handle($request);
        return view('post.index', ['posts' => $posts]);
    }

    public function create()
    {
        return view('post.create', ['post' => new Post()]);
    }

    public function store(Request $request)
    {
        $post = app(StoreTask::class)->handle($request);
        Session::flash('success', 'Bạn tạo bài post thành công');
        return redirect()->route('post.create');
    }

    public function edit($id)
    {
        return view('post.update', ['post' => Post::find($id)]);
    }

    public function update($id, Request $request)
    {
        $post = app(UpdateTask::class)->handle($id, $request);
        Session::flash('success', 'Bạn tạo bài post thành công');
        return redirect()->route('post.index');
    }

    public function destroy($id)
    {
        Post::find($id)->delete();
        return redirect()->route('post.index');
    }
}
