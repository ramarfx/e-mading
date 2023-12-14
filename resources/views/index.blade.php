@extends('layouts.main')

@section('container')
  <!-- Informasi Sekolah -->
  <section id="jumbotron" class="pb-32 pt-32">
    <div class="container mx-auto px-4">
      <div class="flex flex-wrap-reverse items-center px-10">
        <div class="w-full lg:w-1/2">
          <h2 class="mb-6 text-center text-3xl font-bold md:text-start lg:text-5xl">Selamat Datang di Mading Digital
            <span class="text-primary">SMKN 46 Jakarta</span>
          </h2>
          <p class="w-4/5 text-base leading-relaxed text-secondary">
            Mading digital sekolah merupakan tempat untuk berbagi informasi, pengumuman, dan kegiatan sekolah secara
            online.
            Bergabunglah dengan kami untuk tetap terhubung dengan kegiatan sekolah dan komunitas.
          </p>
          <a href="" class="group mt-4 inline-block bg-primary px-5 py-2 text-base text-white">Baca selengkapnya <i
              class="fa-solid fa-arrow-right-long ml-3"></i></a>
        </div>
        <div class="mb-16 w-full self-center lg:w-1/2">
          <img src="{{ asset('assets/img/mading.png') }}" class="mx-auto h-auto w-[400px] max-w-full"
            alt="gambar mading digital">
        </div>
      </div>
    </div>
  </section>

  <!-- Daftar Posting -->
  <section class="py-12">
    <div class="container mx-auto px-4">
      <h2 class="mb-6 text-center text-2xl font-bold">Pengumuman Terbaru</h2>
      <!-- List Posting -->
      <div class="grid grid-cols-2 gap-8 md:grid-cols-2 lg:grid-cols-4">
        <!-- Contoh Posting -->
        @foreach ($posts as $post)
          <div class="flex flex-col">
            <div class="relative w-full bg-primary">
              @include('components.media')
              <div class="absolute left-4 top-3">
                @if ($post->priority_level === 'penting')
                  <span class="rounded-md bg-red-500 px-2 py-1 text-xs text-white">{{ $post->priority_level }}</span>
                @endif
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
                </div>
                <div class="flex gap-5">
                  <form action="{{ route('bookmark.store', $post) }}" method="post">
                    <button type="submit">
                      <i class="fa-regular fa-bookmark scale-150 text-primary"></i>
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
@endsection
