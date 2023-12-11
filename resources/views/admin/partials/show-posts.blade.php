@extends('layouts.main')

@section('container')
  <div class="flex h-screen">
    <div class="flex-shrink-0 bg-white">
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

    <div class="flex-1 p-8">
      <div class="grid grid-cols-4 gap-5">
        {{-- card 1 --}}
        <div class="flex flex-col">
          <div class="relative w-full bg-primary">
            <img src="{{ asset('assets/img/poster.jpeg') }}"
              class="h-[150px] w-full max-w-full object-cover object-center" alt="poster infografis">
            <i class="absolute right-4 top-3 scale-150 text-white">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-three-dots" viewBox="0 0 16 16">
                <path
                  d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3" />
              </svg>
            </i>
            <span class="absolute left-4 top-3 py-1 px-2 rounded-md text-yellow-900 bg-yellow-300 text-xs">menunggu persetujuan</span>
          </div>
          <div class="rounded border px-4 pt-4">
            <h1 class="text-base font-semibold overflow-hidden whitespace-nowrap text-ellipsis">Karya infografis lomba airlangga infographic competition (aic) 2023</h1>
            <p class="text-xs font-semibold leading-8 text-primary">1 minggu yang lalu</p>
            <div class="flex items-center justify-between border-t py-3">
              <div class="flex items-center gap-2">
                <div class="h-5 w-5 rounded-full bg-primary"></div>
                <p class="text-sm text-secondary">username</p>
              </div>
              <i class="fa-regular fa-pen-to-square"></i>
            </div>
          </div>
        </div>
        {{-- card 1 --}}
        <div class="flex flex-col">
          <div class="relative w-full bg-primary">
            <img src="{{ asset('assets/img/festfun.jpg') }}"
              class="h-[150px] w-full max-w-full object-cover object-center" alt="poster infografis">
            <i class="absolute right-4 top-3 scale-150 text-white">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-three-dots" viewBox="0 0 16 16">
                <path
                  d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3" />
              </svg>
            </i>
            <span class="absolute left-4 top-3 py-1 px-2 rounded-md text-white bg-primary text-xs">disetujui</span>
          </div>
          <div class="rounded border px-4 pt-4">
            <h1 class="text-base font-semibold">FestFun clasmeet 2023</h1>
            <p class="text-xs font-semibold leading-8 text-primary">1 hari yang lalu</p>
            <div class="flex items-center justify-between border-t py-3">
              <div class="flex items-center gap-2">
                <div class="h-5 w-5 rounded-full bg-primary"></div>
                <p class="text-sm text-secondary">username</p>
              </div>
              <i class="fa-regular fa-pen-to-square"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
