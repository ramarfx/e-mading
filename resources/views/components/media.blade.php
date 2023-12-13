@if ($post->media_path === 'placeholder')
<img src="{{ asset('assets/img/poster.jpeg') }}">
@elseif ($post->media_type === 'video')
<video class="h-[150px] w-full max-w-full object-cover object-center">
  <source src="{{ \Illuminate\Support\Facades\Storage::url($post->media_path) }}" type="video/mp4">
</video>
@else
<img
  src="{{ $post->media == 'placeholder' ? asset('assets/img/poster.jpeg') : \Illuminate\Support\Facades\Storage::url($post->media_path) }}"
  class="h-[150px] w-full max-w-full object-cover object-center"
  alt="{{ \Illuminate\Support\Facades\Storage::url($post->media) }}">
@endif
