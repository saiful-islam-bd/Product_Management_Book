<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Gate;
use phpDocumentor\Reflection\Types\This;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(4);

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        //authorization using policy
        Gate::authorize('create', Post::class);

        //using gate
        // Gate::authorize('create_post');

        $categories = Category::all();

        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //authorization using policy
        Gate::authorize('create', Post::class);

        //using gate
        // Gate::authorize('create_post');

        //validation
        $request->validate([
            'image' => ['required', 'max:2048', 'image'],
            'title' => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'integer'],
            'description' => ['required']
        ]);

        //image file path declaration
        $fileName = time() . '_' . $request->image->getClientOriginalName();
        $filePath = $request->image->storeAs('uploads', $fileName);

        //storing data in database
        $post = new Post();
        $post->title = $request->title;
        $post->category_id = $request->category_id;
        $post->description = $request->description;
        $post->image = 'storage/' . $filePath;
        $post->save();

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::findOrFail($id);

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);

        //authorization using policy
        Gate::authorize('update', $post);

        //using gate
        // Gate::authorize('edit_post');

        $categories = Category::all();

        return view('posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);

        //authorization using policy
        Gate::authorize('update', $post);

        //using gate
        // Gate::authorize('edit_post');

        //validation
        $request->validate([
            'image' => ['required', 'max:2048', 'image'],
            'title' => ['required', 'max:255'],
            'category_id' => ['required', 'integer'],
            'description' => ['required']
        ]);

        //image file path declaration
        $fileName = time() . '_' . $request->image->getClientOriginalName();
        $filePath = $request->image->storeAs('uploads', $fileName);

        //storing data in database
        $post->title = $request->title;
        $post->category_id = $request->category_id;
        $post->description = $request->description;

        //delete previous file
        File::delete(public_path($post->image));

        $post->image = 'storage/' . $filePath;
        $post->save();

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);

        //authorization using policy
        Gate::authorize('delete', $post);

        //using gate
        // Gate::authorize('delete_post');

        $post->delete();

        return redirect()->route('posts.index');
    }




    public function trashed()
    {
        //authorization using policy
        Gate::authorize('trash', Post::class);

        $posts = Post::onlyTrashed()->paginate(4);

        return view('posts.trashed', compact('posts'));
    }



    public function restore($id)
    {
        $post = Post::onlyTrashed()->findOrFail($id);

        //authorization using policy
        Gate::authorize('restore', $post);

        //using gate
        // Gate::authorize('restore_post');

        $post->restore();

        return redirect()->back();
    }



    public function forceDelete($id)
    {

        $post = Post::onlyTrashed()->findOrFail($id);

        //authorization using policy
        Gate::authorize('forceDelete', $post);

        //using gate
        // Gate::authorize('delete_post');

        //file deleted from local storage too
        File::delete(public_path($post->image));

        $post->forceDelete();

        return redirect()->back();
    }
}
