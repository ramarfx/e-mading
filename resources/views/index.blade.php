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
      <h2 class="mb-6 text-2xl font-bold">Posting Terbaru</h2>
      <!-- List Posting -->
      <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
        <!-- Contoh Posting -->
        <div class="rounded-lg bg-white p-6 shadow-md">
          <h3 class="mb-2 text-lg font-semibold">Judul Posting</h3>
          <p class="mb-4 text-gray-700">Deskripsi singkat mengenai posting ini.</p>
          <a href="#" class="text-blue-500 hover:underline">Baca Selengkapnya</a>
        </div>
      </div>
    </div>
  </section>
@endsection
