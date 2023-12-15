@extends('layouts.main')

@section('container')
  <div class="container">
    <div class="flex flex-wrap p-4 lg:p-8">
      <div class="min-h-screen w-full">
        @include('components.search')

        <h1 class="text-2xl font-bold my-5">Bookmark mu</h1>
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">

          @foreach ($posts as $post)
          <div class="flex flex-col">
            <div class="relative w-full bg-primary">
              @include('components.media')
              {{-- @if ($post->media_path === 'placeholder')
                <img class="h-[150px] w-full max-w-full object-cover object-center"
                  src="{{ asset('assets/img/poster.jpeg') }}">
              @elseif ($post->media_type === 'video')
                <video class="h-[150px] w-full max-w-full object-cover object-center">
                  <source src="{{ \Illuminate\Support\Facades\Storage::url($post->media_path) }}" type="video/mp4">
                </video>
              @else
                <img
                  src="{{ $post->media == 'placeholder' ? asset('assets/img/poster.jpeg') : \Illuminate\Support\Facades\Storage::url($post->media_path) }}"
                  class="h-[150px] w-full max-w-full object-cover object-center"
                  alt="{{ \Illuminate\Support\Facades\Storage::url($post->media) }}">
              @endif --}}


              <div class="absolute left-4 top-3 flex flex-wrap gap-1">
                <span class="rounded-md bg-red-500 px-2 py-1 text-xs text-white">{{ $post->priority_level }}</span>
                <span class="top-3 rounded-md bg-primary px-2 py-1 text-xs text-white">{{ $post->category }}</span>
              </div>


            </div>
            <div class="rounded border px-4 pt-4">
              <a href="{{ route('post.show', $post) }}" class="block truncate text-base font-semibold">
                {{ $post->title }}
              </a>
              <p class="text-xs font-semibold leading-8 text-primary">
                {{ $post->created_at->diffForHumans() }}</p>
              <div class="flex items-center justify-between border-t py-3">
                <div class="flex items-center gap-2">
                  <div class="h-5 w-5 rounded-full bg-primary"></div>
                  <p class="text-sm text-secondary">{{ $post->user->name }}</p>
                  <p class="rounded bg-orange-200 p-0.5 text-xs text-orange-800">
                    {{ $post->user->roles->first()->name }}
                  </p>
                </div>
                <div class="flex gap-5">
                    <form action="{{ route('bookmark.store', $post) }}" method="post">
                      <button type="submit">
                        <i class="fa-solid fa-bookmark scale-150 text-primary"></i>
                      </button>
                    </form>
                </div>
              </div>
            </div>
          </div>
        @endforeach


        </div>
      </div>
    </div>
  </div>
@endsection
