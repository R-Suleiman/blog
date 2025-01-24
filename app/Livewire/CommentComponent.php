<?php

namespace App\Livewire;

use App\Events\CommentEvent;
use App\Models\TopicComments;
use Livewire\Attributes\On;
use Livewire\Component;

class CommentComponent extends Component
{
    public $comment;
    public $topic_id;
    public $conversation = [];

    public function mount($topic_id)
    {
        $this->topic_id = $topic_id;
        $comments = TopicComments::where('topic_id', $this->topic_id)->get();
        foreach ($comments as $comment) {
            $this->conversation[] = $comment;
        }
    }

    public function addComment()
    {
        CommentEvent::dispatch($this->topic_id, $this->comment, $reply_to = null);
        $this->comment = '';
    }

    #[On('echo:comments,CommentEvent')]
    public function listenForComment($data) {
        $comment = new TopicComments($data['comment']);
        $comment->likes = 0;
        $comment->created_at = now();
        $comment->updated_at = now();

        $this->conversation[] = $comment;

        dump($this->conversation);
    }

    public function render()
    {
        return view('livewire.comment-component');
    }
}
