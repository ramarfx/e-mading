@extends('layouts.main')

@section('container')
  <div class="flex bg-gray-100 min-h-screen">

    @include('components.sidebar')

    <!-- Main Content Area -->
    <div class="flex-1 p-8">
      <h1 class="mb-4 text-2xl font-bold">Dashboard Papan Pengumuman Sekolah</h1>

      {{-- Content Area --}}
      <div class="grid grid-cols-1 gap-4">
        <div class="grid grid-cols-3 gap-10">
          <div class="flex flex-col rounded-md bg-white p-4">
            <h3 class="font-semibold">Jumlah User</h3>
            <p class="text-2xl font-medium text-primary">{{ $users }}</p>
          </div>
          <div class="flex flex-col rounded-md bg-white p-4">
            <h3 class="font-semibold">Jumlah Postingan</h3>
            <p class="text-2xl font-medium text-primary">{{ $posts }}</p>
          </div>
          <div class="flex flex-col rounded-md bg-white p-4">
            <h3 class="font-semibold">kunjungan</h3>
            <p class="text-2xl font-medium text-primary">800</p>
          </div>
        </div>

        <div class="flex rounded-md bg-white p-4">
          <h2 class="mb-2 w-full text-lg font-semibold">Statistik</h2>

          <canvas class="h-full w-full" id="statistik">
          </canvas>
          <div class="flex flex-col gap-5 border-l p-4">
            <button class="active px-5 py-2">Harian</button>
            <button class="px-5 py-2">Bulanan</button>
            <button class="px-5 py-2">Tahunan</button>
          </div>
        </div>

      </div>

    </div>
  </div>
@endsection
