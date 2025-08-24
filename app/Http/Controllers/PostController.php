<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Pest\Laravel\post;

class PostController extends Controller
{
    public function index()
    {
        $posts = DB::table('posts')->get();

        return view('posts.index', compact('posts'));
    }

    public function create() 
    {
        return view('posts.create');
    }

    public function store(StorePostRequest $storePostRequest)
    {
        DB::table('posts')->insert([
            'title' => $storePostRequest->get('title'),
            'content' => $storePostRequest->get('content'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('posts.index')
        ->with('message', 'Create post successfully');
    }

    public function edit($id)
    {
        $post = DB::table('posts')->where('id', $id)->first();

        if (!$post) {
            abort(404);
        }

        return view('posts.edit', compact('post'));
    }   

    public function update(StorePostRequest $storePostRequest, $id)
    {
        DB::table('posts')->where('id', $id)->update([
            'title' => $storePostRequest->get('title'),
            'content' => $storePostRequest->get('content'),
            'updated_at' => now()
        ]);

        return redirect()->route('posts.index')
        ->with('message', 'Updated successfully');
    }

    public function delete($id)
    {
        DB::table('posts')->where('id', $id)->delete();

        return back()
        ->with('message', 'Deleted successfully');
    }
}
