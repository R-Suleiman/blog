<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $latestPosts = Post::with('author')->orderBy('created_at', 'desc')->limit(4)->get();
        $otherPosts = Post::with('author')->orderBy('created_at', 'desc')->skip(4)->take(4)->get();
        $categories = PostCategory::all();

        // featured posts: making sure they equal total posts (by mixing with most liked and recent one, if they do not reach 5 total)
        $featuredPosts = Post::with('author')->where('featured', true)->orderBy('created_at', 'desc')->limit(5)->get();

        $remainingSlots = 5 - $featuredPosts->count();

        $mostLikedPosts = $remainingSlots > 0
            ? Post::with('author')->whereNotIn('id', $featuredPosts->pluck('id'))->orderBy('created_at', 'desc')->take($remainingSlots)->get()
            : collect();

        $remainingSlots -= $mostLikedPosts->count();

        $recentPosts = $remainingSlots > 0
            ? Post::with('author')->whereNotIn('id', $featuredPosts->pluck('id')->merge($mostLikedPosts->pluck('id')))->orderBy('created_at', 'desc')->take($remainingSlots)->get()
            : collect();

        $TotalFeatured = $featuredPosts->merge($mostLikedPosts)->merge($recentPosts);

        return view("index", ['featuredPosts' => $TotalFeatured, 'latestPosts' => $latestPosts, 'otherPosts' => $otherPosts, 'categories' => $categories]);
    }

    public function contact()
    {
        return view("contact");
    }

    public function latest($tag)
    {
        if($tag == 'all') {
            $latestPosts = Post::orderBy("created_at","desc")->take(8)->get();
        } else {
            $categoryId = PostCategory::where('category', $tag)->first()->id;
            $latestPosts = Post::where('category_id', $categoryId)->take(8)->get();
        }

        $categories = PostCategory::all();

        return view("latest", ["latestPosts"=> $latestPosts, 'categories' => $categories, 'tag' => $tag]);
    }

    public function post($post)
    {
        $newPost = Post::where("title", $post)->first();
        $relatedPosts = Post::where('category_id', $newPost->category->id)->limit(4)->get();
        $categories = PostCategory::all();

        return view("post", ["post"=> $newPost, 'relatedPosts' => $relatedPosts, 'categories'=> $categories]);
    }

    public function categoryPosts($category)
    {
        $categoryId = PostCategory::where('category', $category)->first()->id;
        $categoryPosts = Post::where('category_id', $categoryId)->paginate(12);

        $otherCategories = PostCategory::where('id', '!=' , $categoryId)->get();

        return view("category-posts", ["categoryPosts" => $categoryPosts, 'category' => $category, 'otherCategories' => $otherCategories]);
    }

    public function posts($tag)
    {
        if($tag == 'all') {
            $posts = Post::orderBy("created_at","desc")->paginate(12);
        } else {
            $categoryId = PostCategory::where('category', $tag)->first()->id;
            $posts = Post::where('category_id', $categoryId)->paginate(12);
        }

        $categories = PostCategory::all();

        return view("all-posts", ["posts"=> $posts, 'categories' => $categories, 'tag' => $tag]);
    }

    public function searchPage() {
        $categories = PostCategory::all();
        $otherPosts = Post::with('author')->orderBy('created_at','desc')->limit(10)->get();

        return view("search-results", ['categories' => $categories,"otherPosts"=> $otherPosts]);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $posts = Post::with('author')->where('title', 'LIKE', "%{$search}%")->orderBy('created_at','desc')->get();
        $categories = PostCategory::all();
        $otherPosts = Post::with('author')->orderBy('created_at','desc')->limit(10)->get();

        return view("search-results", ["posts"=> $posts,"search"=> $search, 'categories' => $categories,"otherPosts"=> $otherPosts]);
    }

    public function author($first_name, $last_name)
    {
        $author = Admin::with('posts')->where('first_name', $first_name)->where('last_name', $last_name)->first();

        return view("author", ["author"=> $author]);
    }

    public function forum() {
        return view('forum.index');
    }

    public function forumTopics() {
        return view('forum.topics');
    }

    public function forumCategoryTopics() {
        return view('forum.category-topics');
    }

    public function forumSearchResult() {
        return view('forum.search-results');
    }

    public function forumTopic() {
        return view('forum.topic');
    }
}
