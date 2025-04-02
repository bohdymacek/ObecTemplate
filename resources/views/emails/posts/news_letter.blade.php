<x-mail::message>


Aktuality za poslednich 7 dnu

<ul>
    @foreach ($posts as $post)
        <li><a href="{{ route('post.show', $post->slug) }}">{{ $post->title }}</a></li>
    @endforeach
</ul>
<p>Klikni na odkaz pro celou aktualitu</p>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
