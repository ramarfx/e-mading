@extends('layouts.main')

@section('container')
  <div class="container">
    <div class="flex w-full flex-col items-center justify-center">
      {{-- <div class="w-20">
                <img src="{{ asset('assets/img/mading.png') }}" alt="logo e-mading">
            </div> --}}
      <div class="my-44 flex w-full max-w-md flex-col border p-4">
        <h1 class="mb-5 text-center text-xl font-bold">Login</h1>

        <form action="{{ route('login.store') }}" method="post">
          @csrf
          <div class="mb-4">
            <label for="email" class="mb-2 block text-sm font-bold text-gray-700">Email</label>
            <input type="email" id="email" name="email" required value="{{ old('email') }}"
              class="w-full rounded border px-3 py-2 leading-tight text-gray-700" autofocus>
            @error('email')
              <p class="mt-0.5 text-sm text-red-500">{{ $message }}</p>
            @enderror
          </div>
          <div class="mb-4">
            <label for="password" class="mb-2 block text-sm font-bold text-gray-700">Password</label>
            <input type="password" id="password" name="password" required
              class="w-full rounded border px-3 py-2 leading-tight text-gray-700">
          </div>
          <div class="mb-4">
            <button type="submit" class="w-full rounded-sm bg-primary px-3 py-2 text-base text-white">Login </button>
          </div>
          <div class="mb-4 flex justify-between gap-3">
            <div class="line flex-1"></div>
            <span class="text-sm text-secondary">atau</span>
            <div class="line flex-1"></div>
          </div>
          <div class="mb-4">
            <div class="flex w-full items-center justify-center">
              <button
                class="relative flex w-full justify-center rounded-lg border border-slate-200 px-4 py-2 text-slate-700">
                <img class="absolute left-6 h-6 w-6" src="{{ asset('assets/img/auth/google.svg') }}" loading="lazy"
                  alt="google logo">
                <span>Login dengan Google</span>
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
