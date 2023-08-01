@component('mail::message')
# New Post Published: {{ $post->title }}

{{ $post->description }}

@component('mail::button', ['url' => $post->url])
Read More
@endcomponent

Thanks,
{{ config('app.name') }}
@endcomponent