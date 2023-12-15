@extends('layouts.main')

@section('container')
  <div class="container">
    <div class="mt-32">
      <div class="mx-auto flex flex-col lg:flex-row h-full min-h-screen w-full max-w-7xl gap-5 rounded-lg border bg-white p-6">
        <div class="mb-4 w-full basis-80">
          @if ($post->media_path === 'placeholder')
            <img src="{{ asset('assets/img/poster.jpeg') }}">
          @elseif ($post->media_type === 'video')
            <video class="h-auto w-full max-w-full" controls>
              <source src="{{ \Illuminate\Support\Facades\Storage::url($post->media_path) }}" type="video/mp4">
            </video>
          @else
            <img
              src="{{ $post->media == 'placeholder' ? asset('assets/img/poster.jpeg') : \Illuminate\Support\Facades\Storage::url($post->media_path) }}"
              class="h-auto w-full max-w-full rounded-lg"
              alt="{{ \Illuminate\Support\Facades\Storage::url($post->media) }}">
          @endif
          <div class="mt-3 w-full ">
            <p class="text-lg text-white rounded bg-primary p-3 text-center mb-3">{{ $post->category }}</p>
          </div>
        </div>
        <div class="w-full flex-1 px-2">
          <div class="mb-4">
            <div class="flex justify-between items-center">
                <h1 class="text-4xl font-bold uppercase tracking-wide">{{ $post->title }}</h1>
            </div>
            <p class="my-2 text-sm font-semibold">Posted by <span class="text-primary">{{ $post->user->name }}</span>
              {{ $post->created_at->diffForHumans() }}</p>
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
