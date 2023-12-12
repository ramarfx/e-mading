@extends('layouts.main')

@section('container')
  <div class="container">
    <div class="flex w-full flex-col items-center justify-center">
      {{-- <div class="w-20">
                <img src="{{ asset('assets/img/mading.png') }}" alt="logo e-mading">
            </div> --}}
      <div class="my-20 flex w-full max-w-md flex-col border p-4">
        <h1 class="mb-5 text-center text-xl font-bold">Register</h1>

        <form action="{{ route('register.store') }}" method="post">
          @csrf
          <div class="mb-4">
            <label for="name" class="mb-2 block text-sm font-bold text-gray-700">Name</label>
            <input type="text" id="name" name="name" required value="{{ old('name') }}"
              class="w-full rounded border px-3 py-2 leading-tight text-gray-700">
            @error('name')
              <p class="mt-0.5 text-sm text-red-500">{{ $message }}</p>
            @enderror
          </div>
          <div class="mb-4">
            <label for="email" class="mb-2 block text-sm font-bold text-gray-700">Email</label>
            <input type="email" id="email" name="email" required value="{{ old('email') }}"
              class="w-full rounded border px-3 py-2 leading-tight text-gray-700">
            @error('email')
              <p class="mt-0.5 text-sm text-red-500">{{ $message }}</p>
            @enderror
          </div>
          <div class="mb-4">
            <label for="nis" class="mb-2 block text-sm font-bold text-gray-700">NIS</label>
            <input type="text" id="nis" name="nis" required value="{{ old('nis') }}"
              class="w-full rounded border px-3 py-2 leading-tight text-gray-700">
            @error('nis')
              <p class="mt-0.5 text-sm text-red-500">{{ $message }}</p>
            @enderror
          </div>
          <div class="mb-4">
            <label for="nip" class="mb-2 block text-sm font-bold text-gray-700">NIP</label>
            <input type="text" id="nip" name="nip" required value="{{ old('nip') }}"
              class="w-full rounded border px-3 py-2 leading-tight text-gray-700">
            @error('nip')
              <p class="mt-0.5 text-sm text-red-500">{{ $message }}</p>
            @enderror
          </div>
          <div class="mb-4">
            <label for="password" class="mb-2 block text-sm font-bold text-gray-700">Password</label>
            <input type="password" id="password" name="password" required
              class="w-full rounded border px-3 py-2 leading-tight text-gray-700">
            @error('password')
              <p class="mt-0.5 text-sm text-red-500">{{ $message }}</p>
            @enderror
          </div>
          <div class="mb-4">
            <button type="submit" class="w-full rounded-sm bg-primary px-3 py-2 text-base text-white">Register</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
