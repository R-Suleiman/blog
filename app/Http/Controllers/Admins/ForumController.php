<?php

namespace App\Http\Controllers\Admins;

use App\Mail\NewTopicPost;
use App\Models\PostCategory;
use App\Models\Subscriber;
use App\Models\Topic;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $which_topics)
    {
        $admin = Auth::guard("admin")->user();

        if ($admin->rank == 1) {
            if ($which_topics == 'other') {
                $topics = Topic::where('admin_id', '!=', $admin->id)->orderBy("created_at", "desc")->paginate(10);
            } else if ($which_topics == "my") {
                $topics = $admin->topics()->orderBy('created_at', 'desc')->paginate(10);
            }
        } else {
            $topics = $admin->topics()->orderBy('created_at', 'desc')->paginate(10);
        }

        return view('admin.topics.index', ['which_topics' => $which_topics, 'topics' => $topics]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = PostCategory::all();
        return view('admin.topics.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $topic = $request->validate(
            [
                'title' => 'required',
                'category' => 'required',
                'description' => 'required',
            ]
        );

        $topic['category_id'] = PostCategory::where('category', $request->category)->first()->id;
        $topic['admin_id'] = Auth::guard('admin')->user()->id;

        Topic::create($topic);

         // send mails to subscribers who have account
         $subscribers = Subscriber::all();
         $users = User::all();
         foreach($subscribers as $subscriber) {
            foreach($users as $user) {
                if($user->email === $subscriber->email) {
                    Mail::to($subscriber->email)->send(new NewTopicPost($topic, 'Topic', $subscriber));
                }
            }
         }

        return to_route('admin.topic.index')->with('message', 'Topic Hosted Successfully and is now Live!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Topic $topic)
    {
        $categories = PostCategory::all();

        return view('admin.topics.show', ['topic' => $topic, 'categories' => $categories]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Topic $topic)
    {
        $categories = PostCategory::all();

        return view('admin.topics.edit', ['topic' => $topic, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Topic $topic)
    {
        $updatedTopic = $request->validate(
            [
                'title' => 'required',
                'category' => 'required',
                'description' => 'required',
            ]
        );
        $categories = PostCategory::all();
        $relatedTopics = Topic::where('category_id', $topic->category->id)->limit(4)->get();
        $updatedTopic['category_id'] = PostCategory::where('category', $request->category)->first()->id;

        $topic->update($updatedTopic);

        return to_route('admin.topic.show', ['topic' => $topic, 'relatedTopics' => $relatedTopics, 'categories' => $categories])->with('message', 'Topic Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Topic $topic)
    {
        $topic->delete();

        return to_route('admin.topic.index')->with('message', 'Topic deleted');
    }

    public function search() {
        return view('admin.topics.search-results');
    }

    public function searchResults(Request $request) {
        $search = $request->input('search');
        $topics = Topic::with('admin')->where('title', 'LIKE', "%{$search}%")->orderBy('created_at','desc')->paginate(15);

        return view('admin.topics.search-results', ['topics' => $topics, 'search' => $search, 'retultsCount' => $topics->count()]);
    }
}
