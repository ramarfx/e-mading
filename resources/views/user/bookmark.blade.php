@extends('layouts.main')

@section('container')
  <div class="container">
    <div class="flex flex-wrap p-8">
      <div class="min-h-screen w-full">
        @include('components.search')

        <div class="grid grid-cols-4 gap-4">
          {{-- {{ dd($bookmarks) }} --}}
          @foreach ($bookmarks as $bookmark)
            <div class="flex flex-col">
              <div class="relative w-full bg-primary">
                {{-- @include('components.media') --}}
                @if ($bookmark->post->media_path === 'placeholder')
                <img class="h-[150px] w-full max-w-full object-cover object-center" src="{{ asset('assets/img/poster.jpeg') }}">
                @elseif ($bookmark->post->media_type === 'video')
                <video class="h-[150px] w-full max-w-full object-cover object-center">
                  <source src="{{ \Illuminate\Support\Facades\Storage::url($bookmark->post->media_path) }}" type="video/mp4">
                </video>
                @else
                <img
                  src="{{ $bookmark->post->media == 'placeholder' ? asset('assets/img/poster.jpeg') : \Illuminate\Support\Facades\Storage::url($bookmark->post->media_path) }}"
                  class="h-[150px] w-full max-w-full object-cover object-center"
                  alt="{{ \Illuminate\Support\Facades\Storage::url($bookmark->post->media) }}">
                @endif


                <div class="absolute left-4 top-3 flex flex-wrap gap-1">
                  <span
                    class="rounded-md bg-red-500 px-2 py-1 text-xs text-white">{{ $bookmark->post->priority_level }}</span>
                  <span
                    class="top-3 rounded-md bg-primary px-2 py-1 text-xs text-white">{{ $bookmark->post->category }}</span>
                  @if ($bookmark->post->is_accept)
                    <span class="top-3 rounded-md bg-green-500 px-2 py-1 text-xs text-white">disetujui</span>
                  @else
                    <span class="top-3 rounded-md bg-yellow-300 px-2 py-1 text-xs text-yellow-900">menunggu
                      persetujuan</span>
                  @endif
                </div>


              </div>
              <div class="rounded border px-4 pt-4">
                <a href="{{ route('post.show', $bookmark->post) }}" class="block truncate text-base font-semibold">
                  {{ $bookmark->post->title }}
                </a>
                <p class="text-xs font-semibold leading-8 text-primary">
                  {{ $bookmark->post->created_at->diffForHumans() }}</p>
                <div class="flex items-center justify-between border-t py-3">
                  <div class="flex items-center gap-2">
                    <div class="h-5 w-5 rounded-full bg-primary"></div>
                    <p class="text-sm text-secondary">{{ $bookmark->post->user->name }}</p>
                    <p class="rounded bg-orange-200 p-0.5 text-xs text-orange-800">
                      {{ $bookmark->post->user->roles->first()->name }}
                    </p>
                  </div>
                  <div class="flex gap-5">
                    <form action="{{ route('bookmark.store', $bookmark->post) }}" method="post">
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
