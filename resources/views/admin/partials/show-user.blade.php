@extends('layouts.main')

@section('container')
  <div class="flex h-screen">
    @include('components.sidebar')

    <div class="flex-1 p-8">
      <div class="grid grid-cols-5 gap-5">
        {{-- card 1 --}}
        <div class="flex flex-col items-center justify-center rounded border p-4">
          <div class="h-20 w-20 overflow-hidden rounded-full">
            <img src="{{ asset('assets/img/poster.jpeg') }}" class="h-auto max-w-full object-cover" alt="gambar orang">
          </div>
          <h1 class="overflow-hidden text-ellipsis whitespace-nowrap text-base font-semibold">Ujang Supriadi</h1>
            <p class="text-sm text-primary my-2">Moderator</p>
            <p class="w-full py-2 bg-primary text-center text-white rounded-sm">ubah role</p>
        </div>
      </div>
    </div>
  </div>
@endsection
