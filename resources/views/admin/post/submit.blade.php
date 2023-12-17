@extends('layouts.main')

@section('container')
  <div class="flex flex-col lg:flex-row">
    @include('components.sidebar')

    <div class="min-h-screen flex-1 bg-gray-100 p-8">
      @include('components.search')


      <form action="{{ route('submit.update.all') }}" method="post" class="flex">
        @csrf
        @method('patch')
        <button type="submit" class="mb-2 rounded-md bg-primary px-4 py-2 text-sm font-semibold text-white"
          onclick="return confirm('Apakah anda yakin ingin menyetujui semua post')">setujui semua</button>
      </form>

      <div class="grid grid-cols-2 gap-2 lg:grid-cols-4 lg:gap-4">
        @forelse ($posts as $post)
          <div class="flex flex-col">
            <div class="relative w-full bg-primary">
              @include('components.media')

              <div class="absolute left-4 top-3 flex flex-wrap gap-1">
                <span class="rounded-md bg-red-500 px-2 py-1 text-xs text-white">{{ $post->priority_level }}</span>
                <span class="top-3 rounded-md bg-primary px-2 py-1 text-xs text-white">{{ $post->category }}</span>
                @if ($post->is_accept)
                  <span class="top-3 rounded-md bg-green-500 px-2 py-1 text-xs text-white">disetujui</span>
                @else
                  <span class="top-3 rounded-md bg-yellow-300 px-2 py-1 text-xs text-yellow-900">menunggu
                    persetujuan</span>
                @endif
              </div>
            </div>
            <div class="rounded border bg-white px-4 pt-4">
              <a href="{{ route('post.show', $post) }}" class="block truncate text-base font-semibold">
                {{ $post->title }}
              </a>
              <p class="text-xs font-semibold leading-8 text-primary">
                {{ $post->created_at->diffForHumans() }}</p>
              <div class="flex items-center justify-between border-t py-3">
                <div class="flex items-center gap-2">
                  <p class="truncate text-xs text-secondary">{{ $post->user->name }}</p>
                  <p class="rounded bg-orange-200 p-0.5 text-xs text-orange-800">{{ $post->user->roles->first()->name }}
                  </p>
                </div>
                <div class="flex gap-5">
                  <a href="{{ route('post.edit', $post) }}">
                    <i class="fa-regular fa-pen-to-square cursor-pointer hover:text-primary"></i>
                  </a>
                  <form action="{{ route('post.destroy', $post) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" onclick="return confirm('Anda yakin ingin menghapus postingan ini?')">
                      <i class="fa-solid fa-trash cursor-pointer hover:text-red-500"></i>
                    </button>
                  </form>

                  @if (
                      !$post->is_accept &&
                          auth()->user()->roles->contains('name', 'admin'))
                    <form action="{{ route('submit.update', $post) }}" method="post">
                      @csrf
                      @method('patch')
                      <button type="submit"><i class="fa-solid fa-check"
                          onclick="alert('postingan telah disetujui')"></i></button>
                    </form>
                  @endif
                </div>
              </div>
            </div>
          </div>
        @empty
          <p class="col-span-4 text-center text-secondary">Tidak ada postingan yang perlu disetujui</p>
        @endforelse
      </div>
    </div>
  </div>
@endsection
