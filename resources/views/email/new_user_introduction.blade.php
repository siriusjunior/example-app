@component('mail::message')

@component('mail::panel')
{{ $toUser->name }}さんこんにちは！新しく{{ $newUser->name }}さんが追加されました！
@endcomponent

@component('mail::button',['url'=> route('tweet.index')])
つぶやきを見にいく
@endcomponent

@endcomponent