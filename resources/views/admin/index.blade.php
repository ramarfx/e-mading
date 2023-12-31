@extends('layouts.main')



@section('container')
  <div class="flex min-h-screen flex-col bg-gray-100 lg:flex-row">

    @include('components.sidebar')


    <div class="flex-1 p-8">
      <h1 class="mb-4 text-2xl font-bold">Dashboard Papan Pengumuman Sekolah</h1>

      <div class="grid grid-cols-1 gap-2 lg:gap-5">
        <div class="grid grid-cols-3 gap-2 lg:gap-10">
          @if ($isAdmin)
            <div class="flex flex-col items-center justify-center rounded-md bg-white p-4">
              <h3 class="text-center text-xs font-semibold lg:text-lg">Jumlah User</h3>
              <p class="text-center text-base font-medium text-primary lg:text-2xl">{{ $users }}</p>
            </div>
          @endif
          <div class="flex flex-col rounded-md bg-white p-4">
            <h3 class="text-center text-xs font-semibold lg:text-lg">Jumlah Postingan</h3>
            <p class="text-center text-base font-medium text-primary lg:text-2xl">{{ $posts }}</p>
          </div>
          <div class="flex flex-col rounded-md bg-white p-4">
            <h3 class="text-center text-xs font-semibold lg:text-lg">Jumlah kunjungan</h3>
            <p class="text-center text-base font-medium text-primary lg:text-2xl">{{ $totalViews }}</p>
          </div>
        </div>
        <div class="relative flex w-full flex-col rounded-md bg-white p-4">
          <h2 class="mb-2 h-full w-full text-lg font-semibold">Top Kunjungan</h2>

          @foreach ($topViews as $post)
            @if ($post->viewed_by_count > 0)
              <div class="flex w-[99%] justify-between border-b py-2">
                <a href="{{ route('post.show', $post) }}" class="hover:text-primary">{{ $post->title }}</a>
                <p>{{ $post->viewed_by_count }}</p>
              </div>
            @endif
          @endforeach
        </div>

      </div>

    </div>
  </div>
@endsection
