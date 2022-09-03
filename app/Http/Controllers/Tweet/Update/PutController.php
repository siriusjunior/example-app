<?php

namespace App\Http\Controllers\Tweet\Update;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tweet\UpdateRequest;
use App\Models\Tweet;
use App\Services\TweetService;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class PutController extends Controller
{
    public function __invoke(UpdateRequest $request, TweetService $tweetService)
    {
        if (!$tweetService->checkOwnTweet($request->user()->id, $request->id())) {
            throw new AccessDeniedHttpException();
        }
        $tweet = Tweet::where('id', $request->id())->firstOrFail();
        $tweet->content = $request->tweet();
        $tweet->save();
        return redirect()
            ->route('tweet.update.index', ['tweetId' => $tweet->id])
            ->with('feedback.success', "つぶやきを編集しました");
    }
}
