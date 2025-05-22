<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    /**
     * @var string
     */
    protected $letter;
    public function __construct(string $letter)
    {
        $this->letter=$letter;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::raw($this->letter,function($message){
            $message->to(env("MAIL_ADMIN_RECEIVER"));
            $message->subject('New user');
        });
    }
}
