@php
    use Illuminate\Support\Facades\Storage;

    $isPlaceholder = $post->media_path === 'placeholder';
    $isVideo       = $post->media_type === 'video';
    $mediaUrl      = Storage::url($post->media_path);
    $mediaPath     = $isPlaceholder ? asset('assets/img/poster.jpeg') : $mediaUrl;
@endphp

@if ($isPlaceholder)
    <img class="h-[150px] w-full max-w-full object-cover object-center" src="{{ $mediaPath }}">
@elseif ($isVideo)
    <video class="h-[150px] w-full max-w-full object-cover object-center">
        <source src="{{ $mediaPath }}" type="video/mp4">
    </video>
@else
    <img src="{{ $mediaPath }}" class="h-[150px] w-full max-w-full object-cover object-center" alt="{{ Storage::url($post->media) }}">
@endif
