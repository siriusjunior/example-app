<?php

namespace App\View\Components\Tweet;

use Illuminate\View\Component;

class Options extends Component
{
    private int $tweetId;
    private int $userId;

    public function __construct(int $tweetId, int $userId)
    {
        $this->tweetId = $tweetId;
        $this->userId = $userId;
    }

    public function render()
    {
        return view('components.tweet.options')
            ->with('tweetId', $this->tweetId)
            ->with('myTweet', \Illuminate\Support\Facades\Auth::id() === $this->userId);
    }
}
