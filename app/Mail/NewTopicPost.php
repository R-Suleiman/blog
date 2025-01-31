<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewTopicPost extends Mailable
{
    use Queueable, SerializesModels;
    protected $post;
    protected $post_type;
    protected $emailSubject;
    protected $author;
    protected $subscriber;
    protected $postUrl;
    /**
     * Create a new message instance.
     */
    public function __construct($post, $post_type, $subscriber)
    {
        $this->post = $post;
        $this->post_type = $post_type;
        $this->emailSubject = $post_type === 'Post' ? 'Blog: A new Post has been posted on the blog' : 'A new Topic for discussion has been hosted';
        $this->postUrl = $post_type === 'Post' ? url('/posts/' . $this->post->title) : url('/forum/topics/' . $this->post->id);
        $this->author = $post_type === 'Post' ? $post->author->first_name . ' ' . $post->author->last_name : $post->admin->first_name . ' ' . $post->admin->last_name;
        $this->subscriber = $subscriber;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->emailSubject,
            replyTo: ['noreply@example.com'],
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.new-post',
            with: [
                'post' => $this->post,
                'postType' => $this->post_type,
                'author' => $this->author,
                'postUrl' => $this->postUrl,
                'unsubscribeUrl'  => url('/newsletter/unsubscribe/' . $this->subscriber->unsubscribe_token)
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
