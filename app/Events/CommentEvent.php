<?php

namespace App\Events;

use App\Models\TopicComments;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class CommentEvent implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $comment;

    /**
     * Create a new event instance.
     */
    public function __construct( $topic_id, $comment, $reply_to)
    {
        $commentData = [
            'topic_id' => $topic_id,
            'comment' => $comment,
            'reply_to' => $reply_to,
        ];

        // Check which guard is authenticated
        if (Auth::guard('web')->check()) {
            $newComment = Auth::guard('web')->user()->comments()->create($commentData);
            $this->user = Auth::guard('web')->user();
        } elseif (Auth::guard('admin')->check()) {
           $newComment = Auth::guard('admin')->user()->comments()->create($commentData);
            $this->user = Auth::guard('admin')->user();
        }

        $newComment->load('commentable');
        $newComment->likes = 0;
        $this->comment = $newComment;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('comments'),
        ];
    }
}
