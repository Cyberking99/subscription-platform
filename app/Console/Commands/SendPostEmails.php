<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Mail\PostNotification;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendPostEmails extends Command
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
                Mail::to($subscriber->email)->send(new PostNotification($post));
            }

            $post->emailsSent()->createMany($subscribers->map(function ($subscriber) {
                return ['subscriber_id' => $subscriber->id];
            }));
        }

        $this->info('Emails sent successfully.');
    }
}
