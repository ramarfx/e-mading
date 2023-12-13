@extends('layouts.main')

@section('container')
  <!-- Informasi Sekolah -->
  <section id="jumbotron" class="pb-32 pt-32">
    <div class="container mx-auto px-4">
      <div class="flex flex-wrap-reverse items-center px-10">
        <div class="w-full lg:w-1/2">
          <h2 class="mb-6 text-3xl text-center md:text-start lg:text-5xl font-bold">Selamat Datang di Mading Digital Sekolah</h2>
          <p class="text-base leading-relaxed text-secondary w-4/5">
            Mading digital sekolah merupakan tempat untuk berbagi informasi, pengumuman, dan kegiatan sekolah secara
            online.
            Bergabunglah dengan kami untuk tetap terhubung dengan kegiatan sekolah dan komunitas.
          </p>
          <a href="" class="text-base inline-block mt-4 py-2 px-5 bg-primary text-white group">Baca selengkapnya <i class="fa-solid fa-arrow-right-long ml-3 "></i></a>
        </div>
        <div class="w-full self-center lg:w-1/2 mb-16">
            <img src="{{ asset('assets/img/mading.png') }}" class="max-w-full w-[400px] h-auto mx-auto" alt="gambar mading digital">
        </div>
      </div>
    </div>
  </section>

  <!-- Daftar Posting -->
  <section class="py-12">
    <div class="container mx-auto px-4">
      <h2 class="mb-6 text-2xl font-bold text-center">Pengumuman Terbaru</h2>
      <!-- List Posting -->
      <div class="grid grid-cols-2 gap-8 md:grid-cols-2 lg:grid-cols-4">
        <!-- Contoh Posting -->
        @foreach ($posts as $post)
        <div class="flex flex-col">
            <div class="relative w-full bg-primary">
              <img
                src="{{ $post->media == 'placeholder' ? asset('assets/img/poster.jpeg') : \Illuminate\Support\Facades\Storage::url($post->media) }}"
                class="h-[150px] w-full max-w-full object-cover object-center" alt="poster infografis">

              @if ($post->is_accept)
                <span class="absolute left-4 top-3 rounded-md bg-primary px-2 py-1 text-xs text-white">disetujui</span>
              @else
                <span class="absolute left-4 top-3 rounded-md bg-yellow-300 px-2 py-1 text-xs text-yellow-900">menunggu
                  persetujuan</span>
              @endif

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
                  <a href="{{ route('post.edit', $post) }}">
                    <i class="fa-regular fa-bookmark text-primary scale-150"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
@endsection
