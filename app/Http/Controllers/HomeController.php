<?php

namespace App\Http\Controllers;

use App\Events\CommentEvent;
use App\Http\Controllers\Controller;
use App\Mail\InquiryMail;
use App\Models\Admin;
use App\Models\inquiry;
use App\Models\Post;
use App\Models\PostCategory;
use App\Models\Subscriber;
use App\Models\Topic;
use App\Models\TopicComments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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

        return view("search-results", ['categories' => $categories,"otherPosts"=> $otherPosts, 'searchCount' => -1]);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $posts = Post::with('author')->where('title', 'LIKE', "%{$search}%")->orderBy('created_at','desc')->get();
        $categories = PostCategory::all();
        $otherPosts = Post::with('author')->orderBy('created_at','desc')->limit(10)->get();

        return view("search-results", ["posts"=> $posts,"search"=> $search, 'categories' => $categories,"otherPosts"=> $otherPosts, 'searchCount' => $posts->count()]);
    }

    public function author($first_name, $last_name)
    {
        $author = Admin::with('posts')->where('first_name', $first_name)->where('last_name', $last_name)->first();

        return view("author", ["author"=> $author]);
    }

    public function forum() {
        return view('forum.index');
    }

    public function forumHome() {
        $latestTopics = Topic::with('admin')->with('likesClass')->orderBy('created_at', 'desc')->limit(4)->get();
        $trendingTopics = Topic::with('admin')->orderBy('likes', 'desc')->limit(5)->get();
        $otherTopics = Topic::with('admin')->orderBy('created_at', 'desc')->skip(4)->take(5)->get();
        $categories = PostCategory::all();

        return view('forum.topics', ['latestTopics' => $latestTopics, 'trendingTopics' => $trendingTopics, 'otherTopics' => $otherTopics, 'categories' => $categories]);
    }

    public function forumTopics() {
        $topics = Topic::latest()->with('admin')->paginate(10);

        return view('forum.all-topics', ['topics' => $topics]);
    }

    public function forumCategoryTopics($category) {
        $categoryId = PostCategory::where('category', $category)->first()->id;
        $topics = Topic::with('admin')->where('category_id', $categoryId)->orderBy('created_at', 'desc')->paginate(10);
        $otherTopics = Topic::where('category_id', '!=' , $categoryId)->get();

        return view('forum.category-topics', ['topics' => $topics, 'otherTopics' => $otherTopics ,'category' => $category]);
    }

    public function forumSearchPage() {
        $categories = PostCategory::all();
        $otherTopics = Topic::with('admin')->orderBy('created_at','desc')->limit(10)->get();

        return view('forum.search-results', ['categories' => $categories, 'otherTopics' => $otherTopics]);
    }

    public function forumSearchResults(Request $request) {
        $search = $request->input('search');
        $topics = Topic::with('admin')->where('title', 'LIKE', "%{$search}%")->orderBy('created_at','desc')->paginate(15);
        $categories = PostCategory::all();
        $otherTopics = Topic::with('admin')->orderBy('created_at','desc')->limit(10)->get();

        return view('forum.search-results', ['categories' => $categories, 'otherTopics' => $otherTopics, 'topics' => $topics, 'search' => $search, 'searchResults' => $topics->count()]);
    }

    public function forumTopic($id) {
        $topic = Topic::with('admin')->where('id', $id)->first();
        $relatedTopics = Topic::where('category_id', $topic->category->id)->limit(4)->get();
        $comments = TopicComments::where('topic_id', $id)->whereNull('reply_to')->with('replies.replies')->with('commentable')->get();

        //calculate total reply count for each comment
        $comments->each(function ($comment) {
            $comment->replies_count = $this->countAllReplies($comment->replies);
        });

        return view('forum.topic', ['topic' => $topic, 'relatedTopics' => $relatedTopics, 'comments' => $comments]);
    }

    public function storeComments(Request $request) {
        $validated = $request->validate([
            'comment' => 'required|string',
            'topic_id' => 'required|integer',
            'reply_to' => 'nullable|exists:topic_comments,id',
        ]);

        // Broadcast the comment
        CommentEvent::dispatch($request->topic_id, $request->comment, $request->reply_to);

        return response()->json(['message' => 'Comment broadcasted successfully.']);
    }

    public function toggleTopicLikes($topicId) {
        $topic = Topic::where('id', $topicId)->first();

        if (Auth::guard('web')->check()) {
            $user = Auth::guard('web')->user();
        } elseif (Auth::guard('admin')->check()) {
           $user = Auth::guard('admin')->user();
        }
        $userType = get_class($user);

        // check if the like already exists
        $existingLike = $topic->likesClass()->where('likable_id', $user->id)->where('likable_type', $userType)->first();

        if($existingLike) {
            // unlike
            $existingLike->delete();
            $topic->decrement('likes');
            return response()->json(['status' => 'unliked', 'likes_count' => $topic->likes]);
        } else {
            // like
            $topic->likesClass()->create([
                'likable_id' => $user->id,
                'likable_type' => $userType,
            ]);

            $topic->increment('likes');
            return response()->json(['status' => 'liked', 'likes_count' => $topic->likes]);
        }
    }

    public function toggleCommentLikes($commentId) {
        $comment = TopicComments::where('id', $commentId)->first();

        if (Auth::guard('web')->check()) {
            $user = Auth::guard('web')->user();
        } elseif (Auth::guard('admin')->check()) {
           $user = Auth::guard('admin')->user();
        }
        $userType = get_class($user);

        // check if the like already exists
        $existingLike = $comment->likesClass()->where('likable_id', $user->id)->where('likable_type', $userType)->first();

        if($existingLike) {
            // unlike
            $existingLike->delete();
            $comment->decrement('likes');

            return response()->json(['status' => 'unliked', 'likes_count' => $comment->likes]);
        } else {
            // like
            $comment->likesClass()->create([
                'comment_id' => $comment->id,
                'likable_id' => $user->id,
                'likable_type' => $userType,
            ]);

            $comment->increment('likes');

            return response()->json(['status' => 'liked', 'likes_count' => $comment->likes]);
        }
    }

    public function inquiries(Request $request) {
        $validated = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        $contact = inquiry::create($validated);

        // send email to admin
        Mail::to('seniorsuleiman2901@gmail.com')->send(new InquiryMail($contact));

        return back()->with(['message' => 'Inquiry sent successfully.']);
    }

    public function subscribe(Request $request) {
        $request->validate(['email' => 'required|email|unique:subscribers,email']);
        Subscriber::create(['email' => $request->email, 'unsubscribe_token' => Str::random(32)]);

        return back()->with('email-success', 'Thank you for subscribing to our Newsletter!');
    }

    public function unsubscribe($token) {
        $subscriber = Subscriber::where('unsubscribe_token', $token)->first();

        if(!$subscriber) {
            return redirect()->route('index')->with('error', 'Invalid Unsubscribe link!');
        }
        $subscriber->delete();

        return redirect()->route('index')->with('message', 'You have been unsubscribed to our Newsletter');
    }

    // Helper function to recursively count replies
    function countAllReplies($replies) {
        return $replies->reduce(function ($count, $reply) {
            return $count + 1 + $this->countAllReplies($reply->replies);
        });
    }
}
