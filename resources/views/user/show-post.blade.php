@extends('layouts.main')

@section('container')
  <div class="flex h-screen">
    <div class="flex-shrink-0 bg-white">
      <div class="p-4">
        <h2 class="mb-4 text-2xl font-bold">Mading Digital</h2>
        <ul class="space-y-2">
          <li><a href="/home" class="flex items-center gap-3 px-4 py-2 hover:text-primary"><i class="fa-solid fa-house"></i>
              Home</a></li>
          <li><a href="/user" class="flex items-center gap-3 px-4 py-2 hover:text-primary"><i
                class="fa-regular fa-user"></i> List User</a>
          </li>
          <li><a href="#" class="flex items-center gap-3 px-4 py-2 hover:text-primary"><i
                class="fa-regular fa-bookmark"></i>Favorit saya</a></li>
        </ul>
      </div>
    </div>

    <div class="flex-1 p-8">
      @include('components.search')

      <div class="grid grid-cols-4 gap-5">
        {{-- card 1 --}}
        <div class="flex flex-col">
          <div class="relative w-full bg-primary">
            <img src="{{ asset('assets/img/poster.jpeg') }}"
              class="h-[150px] w-full max-w-full object-cover object-center" alt="poster infografis">
              <span class="absolute left-4 top-3 rounded-md bg-red-500 px-2 py-1 text-xs text-red-100">Penting</span>
          </div>
          <div class="rounded border px-4 pt-4">
            <h1 class="overflow-hidden text-ellipsis whitespace-nowrap text-base font-semibold">Karya infografis lomba
              airlangga infographic competition (aic) 2023</h1>
            <p class="text-xs font-semibold leading-8 text-primary">1 minggu yang lalu</p>
            <div class="flex items-center justify-between border-t py-3">
              <div class="flex items-center gap-2">
                <div class="h-5 w-5 rounded-full bg-primary"></div>
                <p class="text-sm text-secondary">username</p>
              </div>
              <i class="fa-regular fa-bookmark text-primary scale-150"></i>
            </div>
          </div>
        </div>
        {{-- card 1 --}}
        <div class="flex flex-col">
          <div class="relative w-full bg-primary">
            <img src="{{ asset('assets/img/festfun.jpg') }}"
              class="h-[150px] w-full max-w-full object-cover object-center" alt="poster infografis">
              <span class="absolute left-4 top-3 rounded-md bg-primary px-2 py-1 text-xs text-white">Biasa</span>
          </div>
          <div class="rounded border px-4 pt-4">
            <h1 class="text-base font-semibold">FestFun clasmeet 2023</h1>
            <p class="text-xs font-semibold leading-8 text-primary">1 hari yang lalu</p>
            <div class="flex items-center justify-between border-t py-3">
              <div class="flex items-center gap-2">
                <div class="h-5 w-5 rounded-full bg-primary"></div>
                <p class="text-sm text-secondary">username</p>
              </div>
              <i class="fa-regular fa-bookmark text-primary scale-150"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
