@extends('layouts.main')



@section('container')
  <div class="flex bg-gray-100 min-h-screen flex-col lg:flex-row">

    @include('components.sidebar')

    <!-- Main Content Area -->
    <div class="flex-1 p-8">
      <h1 class="mb-4 text-2xl font-bold">Dashboard Papan Pengumuman Sekolah</h1>

      {{-- Content Area --}}
      <div class="grid grid-cols-1 gap-2 lg:gap-5">
        <div class="grid grid-cols-3 gap-6 lg:gap-10">
          <div class="flex flex-col justify-center items-center rounded-md bg-white p-4">
            <h3 class="font-semibold text-xs lg:text-lg text-center">Jumlah User</h3>
            <p class="text-base lg:text-2xl font-medium text-primary text-center">{{ $users }}</p>
          </div>
          <div class="flex flex-col rounded-md bg-white p-4">
            <h3 class="font-semibold text-xs lg:text-lg text-center">Jumlah Postingan</h3>
            <p class="text-base lg:text-2xl font-medium text-primary text-center">{{ $posts }}</p>
          </div>
          <div class="flex flex-col rounded-md bg-white p-4">
            <h3 class="font-semibold text-xs lg:text-lg text-center">kunjungan</h3>
            <p class="text-base lg:text-2xl font-medium text-primary text-center">800</p>
          </div>
        </div>

        <div class="flex w-full flex-col rounded-md bg-white p-4">
          <h2 class="mb-2 w-full h-full text-lg font-semibold">Statistik</h2>

          <canvas class="max-w-full" id="myChart">
          </canvas>
        </div>

      </div>

    </div>
  </div>
@endsection
