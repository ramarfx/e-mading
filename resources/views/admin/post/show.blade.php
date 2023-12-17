@extends('layouts.main')

@section('container')
  <div class="container">
    <div class="mt-32">
      <div
        class="mx-auto flex h-full min-h-screen w-full max-w-7xl flex-col gap-5 rounded-lg border bg-white p-6 lg:flex-row">
        <div class="mb-4 w-full basis-80">
          {{-- media --}}
          @if ($post->media_path === 'placeholder')
            <img src="{{ asset('assets/img/nomedia.png') }}">
          @elseif ($post->media_type === 'video')
            <video class="h-auto w-full max-w-full" controls>
              <source src="{{ \Illuminate\Support\Facades\Storage::url($post->media_path) }}" type="video/mp4">
            </video>
          @else
            <img
              src="{{ $post->media == 'placeholder' ? asset('assets/img/nomedia.png') : \Illuminate\Support\Facades\Storage::url($post->media_path) }}"
              class="h-auto w-full max-w-full rounded-lg"
              alt="{{ \Illuminate\Support\Facades\Storage::url($post->media) }}">
          @endif
          {{-- media --}}

          @if ($post->priority_level === 'penting')
            <div class="mt-3 w-full">
              <p class="mb-3 rounded bg-red-500 py-3 text-center text-base text-white">{{ $post->priority_level }}</p>
            </div>
          @endif


          {{-- bookmark --}}
          @if ($post->bookmarks->isNotEmpty())
            <div class="mt-2 flex w-full justify-center rounded-md bg-sky-200 py-3">
              <form action="{{ route('bookmark.destroy', $post) }}" method="post">
                @csrf
                @method('delete')
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <button type="submit" class="flex items-center justify-center gap-3">
                  <i class="fa-solid fa-bookmark scale-150 text-primary"></i>
                  Tersimpan
                </button>
              </form>
            </div>
          @else
            <div class="mt-2 flex w-full justify-center rounded-md bg-primary py-3">
              <form action="{{ route('bookmark.store', $post) }}" method="post">
                @csrf
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <button type="submit" class="flex items-center justify-center gap-3 text-white">
                  <i class="fa-regular fa-bookmark scale-150 text-white"></i>
                  Bookmark
                </button>
              </form>
            </div>
          @endif
          {{-- bookmark --}}
        </div>

        <div class="w-full flex-1 px-2">
          <div class="mb-4">
            <div class="flex items-center justify-between">
              <h1 class="text-4xl font-bold uppercase tracking-wide">{{ $post->title }}</h1>
            </div>
            <p class="my-2 text-sm font-semibold">Diposting oleh <span
                class="text-primary">{{ $post->user->name }}</span>
              {{ $post->created_at->diffForHumans() }}</p>
            <p class="text-sm font-semibold">Kategori: <span class="text-primary">{{ $post->category }}</span></p>
          </div>
          <div class="mb-4">
            <h2 class="mb-5 text-2xl font-bold">Tautan</h2>
            @if (!$post->link)
              <p class="text-sm text-secondary">Tidak ada tautan</p>
            @endif
            <a href="{{ $post->link }}"
              class="text-sm text-primary hover:underline hover:underline-offset-2">{!! $post->link !!}</a>
          </div>
          <div class="mb-4">
            <h2 class="mb-5 text-2xl font-bold">Deskripsi</h2>
            <p class="text-sm text-secondary">{!! nl2br($post->description) !!}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
