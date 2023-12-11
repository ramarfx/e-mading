@extends('layouts.main')

@section('container')
  <div class="flex bg-[#F8F8F8]">

    <div class="w-52 flex-shrink-0 bg-white">
      <div class="p-4">
        <h2 class="mb-4 text-2xl font-bold">Dashboard</h2>
        <ul class="space-y-2">
          <li><a href="#" class="flex items-center gap-3 px-4 py-2 hover:text-primary"><i
                class="fa-solid fa-table-columns"></i>
              Dashboard</a></li>
          <li><a href="#" class="flex items-center gap-3 px-4 py-2 hover:text-primary"><i
                class="fa-regular fa-user"></i> List User</a>
          </li>
          <li><a href="#" class="flex items-center gap-3 px-4 py-2 hover:text-primary"><i
                class="fa-regular fa-square-check"></i> submit post</a></li>
        </ul>

        <a href="/post/create"
          class="mt-5 flex items-center gap-3 rounded-xl border border-primary border-opacity-50 bg-primary bg-opacity-20 px-4 py-2 text-primary">
          <i class="fa-solid fa-plus"></i> Tambah post
        </a>
      </div>
    </div>

    <!-- Main Content Area -->
    <div class="flex-1 p-8">
      <h1 class="mb-4 text-2xl font-bold">Dashboard Papan Pengumuman Sekolah</h1>

      <!-- Content Area -->
      <div class="grid grid-cols-1 gap-4">
        <div class="grid grid-cols-3 gap-10">
          <div class="flex flex-col rounded-md bg-white p-4">
            <h3 class="font-semibold">Jumlah User</h3>
            <p class="text-2xl font-medium text-primary">150</p>
          </div>
          <div class="flex flex-col rounded-md bg-white p-4">
            <h3 class="font-semibold">Jumlah Postingan</h3>
            <p class="text-2xl font-medium text-primary">100</p>
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

        <!-- List of Posts -->
        <div class="rounded-md bg-white p-4">
          <h2 class="mb-2 text-lg font-semibold">Postingan menunggu persetujuan</h2>
          <ul>
            <li class="border-b border-gray-300 py-2">
              <div class="mt-2 flex items-center justify-between px-4">
                <p>Judul</p>
                <div class="flex gap-5">
                  <form action="" method="post">
                    <button type="submit" class="mr-2 text-blue-500">Setujui</button>
                  </form>
                  <form action="" method="post">
                    <button class="text-red-500">Delete</button>
                  </form>
                </div>
              </div>
            </li>
            <li class="border-b border-gray-300 py-2">
              <div class="mt-2 flex items-center justify-between px-4">
                <p>Judul</p>
                <div class="flex gap-5">
                  <form action="" method="post">
                    <button type="submit" class="mr-2 text-blue-500">Setujui</button>
                  </form>
                  <form action="" method="post">
                    <button class="text-red-500">Delete</button>
                  </form>
                </div>
              </div>
            </li>
            <li class="border-b border-gray-300 py-2">
              <div class="mt-2 flex items-center justify-between px-4">
                <p>Judul</p>
                <div class="flex gap-5">
                  <form action="" method="post">
                    <button type="submit" class="mr-2 text-blue-500">Setujui</button>
                  </form>
                  <form action="" method="post">
                    <button class="text-red-500">Delete</button>
                  </form>
                </div>
              </div>
            </li>
          </ul>
        </div>

        <div class="rounded-md bg-white p-4">
          <h2 class="mb-2 text-lg font-semibold">Postingan Terbaru</h2>
          <ul>
            <li class="border-b border-gray-300 py-2">
              <div class="mt-2 flex items-center">
                <button class="mr-2 text-blue-500">Edit</button>
                <button class="text-red-500">Delete</button>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
@endsection
