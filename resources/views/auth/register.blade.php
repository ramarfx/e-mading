@extends('layouts.main')

@section('container')
  <div class="container">
    <div class="flex min-h-screen w-full flex-col items-center justify-center">
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
          <div class="mb-4 flex justify-between gap-3">
            <div class="line flex-1"></div>
            <span class="text-sm text-secondary">atau</span>
            <div class="line flex-1"></div>
          </div>
          <div class="mb-4">
            <div class="flex w-full items-center justify-center">
              <a href="{{ route('google.redirect') }}"
                class="relative flex w-full justify-center rounded-lg border border-slate-200 px-4 py-2 text-slate-700">
                <img class="absolute left-6 h-6 w-6" src="{{ asset('assets/img/auth/google.svg') }}" loading="lazy"
                  alt="google logo">
                <span>Login dengan Google</span>
              </a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
