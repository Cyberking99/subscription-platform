@component('mail::message')
# New Post Published: {{ $post->title }}

{{ $post->description }}

Thanks,
{{ $post->website->name }}
@endcomponent