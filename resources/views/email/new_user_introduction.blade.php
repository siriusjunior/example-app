@component('mail::message')

{{ $toUser->name }}さんこんにちは！新しく{{ $newUser->name }}さんが追加されました！

@endcomponent