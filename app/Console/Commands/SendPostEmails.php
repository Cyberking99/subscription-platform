<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Mail\PostNotification;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendPostEmails extends Command implements ShouldQueue
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-post-emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send emails to subscribers for new posts';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $posts = Post::whereDoesntHave('emailsSent')->get();

        foreach ($posts as $post) {
            $subscribers = $post->website->subscribers;

            foreach ($subscribers as $subscriber) {
                if (!$post->emailsSent->contains('subscriber_id', $subscriber->id)) {
                    Mail::to($subscriber->email)->send(new PostNotification($post));

                    SentPost::create([
                        'subscriber_id' => $subscriber->id,
                        'post_id' => $post->id,
                    ]);
                }
            }
        }

        $this->info('Emails sent successfully.');
    }
}
