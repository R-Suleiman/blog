<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Storage;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $which_posts)
    {
        $admin = Auth::guard("admin")->user();

        if ($admin->rank == 1) {
            if ($which_posts == 'other') {
                $posts = Post::where('admin_id', '!=', $admin->id)->orderBy("created_at", "desc")->paginate(10);
            } else if ($which_posts == "my") {
                $posts = $admin->posts()->orderBy('created_at', 'desc')->paginate(10);
            }
        } else {
            $posts = $admin->posts()->orderBy('created_at', 'desc')->paginate(10);
        }

        return view('admin.posts.index', ['which_posts' => $which_posts, 'posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($which_posts)
    {
        $categories = PostCategory::all();
        return view('admin.posts.create', ['which_posts' => $which_posts, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($which_posts, Request $request)
    {
        $post = $request->validate(
            [
                'title' => 'required',
                'category' => 'required',
                'topic' => 'nullable',
                'description' => 'required',
                'file_type' => 'required_with:file|string',
                'file' => 'nullable|file|mimes:jpeg,png,jpg,avif,gif,mp4,avi,mov,wmv|max:20480',
                'featured' => 'nullable'
            ],
            [
                'file.mimes' => 'The file must be an image or video (jpeg, png, jpg, avif, gif, mp4, avi, mov, wmv).',
                'file.max' => 'The file size must not exceed 20MB.'
            ]
        );

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = 'files/posts/';
            $filename = $file->getClientOriginalName() . '-' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs($path, $filename, 'public');
            $post['file'] = $filename;
        }

        $post['category_id'] = PostCategory::where('category', $request->category)->first()->id;
        $post['admin_id'] = Auth::guard('admin')->user()->id;

        if ($request->featured && $request->featured == 'on') {
            $post['featured'] = 1;
        } else {
            $post['featured'] = 0;
        }

        Post::create($post);

        return to_route('admin.posts.index')->with('message', 'Post created Successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show($which_posts, Post $post)
    {
        $relatedPosts = Post::where('category_id', $post->category->id)->limit(4)->get();
        $categories = PostCategory::all();

        return view('admin.posts.show', ['which_posts' => $which_posts, 'post' => $post, 'relatedPosts' => $relatedPosts, 'categories' => $categories]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($which_posts, Post $post)
    {
        $categories = PostCategory::all();

        return view('admin.posts.edit', ['which_posts' => $which_posts, 'post' => $post, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $which_posts, Post $post)
    {
        $updatedPost = $request->validate(
            [
                'title' => 'required',
                'category' => 'required',
                'topic' => 'nullable',
                'description' => 'required',
                'file_type' => 'nullable',
                'file' => 'nullable|file|mimes:jpeg,png,jpg,avif,gif,mp4,avi,mov,wmv|max:20480',
                'featured' => 'nullable'
            ],
            [
                'file.mimes' => 'The file must be an image or video (jpeg, png, jpg, avif, gif, mp4, avi, mov, wmv).',
                'file.max' => 'The file size must not exceed 20MB.'
            ]
        );

        $file_name = $post->file;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = 'files/posts/';
            $file_name = $file->getClientOriginalName() . '-' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs($path, $file_name, 'public');

            // removing the existing profile photo
            $existingfile = $path . $post->file;
            if ($post->file && Storage::disk('public')->exists($existingfile)) {
                Storage::disk('public')->delete($existingfile);
            }
        }

        $updatedPost['file'] = $file_name;
        if ($request->featured && $request->featured == 'on') {
            $updatedPost['featured'] = 1;
        } else {
            $updatedPost['featured'] = 0;
        }

        $relatedPosts = Post::where('category_id', $post->category->id)->limit(4)->get();
        $categories = PostCategory::all();

        $post->update($updatedPost);

        return to_route('admin.post.show', ['which_posts' => $which_posts, 'post' => $post, 'relatedPosts' => $relatedPosts, 'categories' => $categories])->with('message', 'Post Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($which_posts, Post $post)
    {
        $path = 'files/posts/';

        // delete the existing image
        $existingFile = $path . $post->file;
        if ($post->file && Storage::disk('public')->exists($existingFile)) {
            Storage::disk('public')->delete($existingFile);
        }

        $post->delete();

        return to_route('admin.post.index')->with('message', 'Post deleted');
    }
}
