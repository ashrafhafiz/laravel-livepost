@component("mail::message")
# New post has been created!

@component('mail::panel')
## Title: {{ $post->title }}
@endcomponent

{{ $post->body }}

@component('mail::button', ['url' => ''])
    Publish
@endcomponent

Thanks, <br>
{{ config('app.name') }}

@endcomponent
