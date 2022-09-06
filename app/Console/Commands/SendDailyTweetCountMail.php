<?php

namespace App\Console\Commands;

use App\Mail\DialyTweetCount;
use App\Models\User;
use App\Services\TweetService;
use Illuminate\Console\Command;
use Illuminate\Contracts\Mail\Mailer;

class SendDailyTweetCountMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:send-daily-tweet-count-mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '前日のつぶやき数を集計してユーザーに集計メールを送信します。';

    private TweetService $tweetService;
    private Mailer $mailer;

    public function __construct(TweetService $tweetService, Mailer $mailer)
    {
        parent::__construct();
        $this->tweetService = $tweetService;
        $this->mailer = $mailer;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $tweetCount = $this->tweetService->countYesterdayTweets();
        $users = User::get();
        foreach ($users as $user) {
            $this->mailer->to($user->email)
                ->send(new DialyTweetCount($user, $tweetCount));
        }
    }
}
