@extends('layouts.main')

@section('container')
  <div class="container">
    <div class="mt-32">
      <div class="mx-auto flex h-full w-full max-w-7xl gap-5 rounded-lg border bg-white p-6">
        <div class="mb-4 w-full basis-80">
          <img src="{{ asset('assets/img/poster.jpeg') }}" class="h-auto w-full rounded-lg" alt="image post">
          <div class="mt-3 w-full rounded bg-primary p-3 text-center">
            <p class="text-lg text-white">{{ $post->category }}</p>
          </div>
        </div>
        <div class="w-full flex-1 px-2">
          <div class="mb-4">
            <h1 class="text-4xl font-bold uppercase tracking-wide">{{ $post->title }}</h1>
            <p class="my-2 text-sm font-semibold">Posted by <span class="text-primary">{{ $post->user->name }}</span>
              {{ $post->created_at->diffForHumans() }}</p>
          </div>
          <div class="mb-4">
            <h2 class="mb-5 text-2xl font-bold">Tautan</h2>
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
