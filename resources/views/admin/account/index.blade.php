@extends('layouts.main')

@section('container')
  <div class="flex">
    @include('components.sidebar')

    <div class="flex-1 p-8">
        {{-- section admin start --}}
        <section id="admin">
            <div class="w-full flex items-center justify-between gap-3">
                <button class="flex items-center gap-2">
                    <i class="fa-solid fa-caret-down text-secondary"></i>
                    <p class="text-lg font-semibold text-secondary">Admin</p>
                </button>
                <div class="w-full h-px bg-secondary"></div>
            </div>
            <div class="grid grid-cols-5 gap-5 my-5">
                @foreach ($filteredUsers['admin'] as $admin)
                  <div class="flex flex-col items-center justify-center rounded border p-4">
                    <h1 class="overflow-hidden text-ellipsis whitespace-nowrap text-base font-semibold">{{ $admin->name }}</h1>
                    <p class="my-2 text-sm text-primary">{{ $admin->roles->first()->name }}</p>
                    <p class="w-full rounded-sm bg-primary py-2 text-center text-white">ubah role</p>
                  </div>
                @endforeach
              </div>
        </section>
        {{-- section admin end --}}

        {{-- section teacher start --}}
        <section id="teacher">
            <div class="w-full flex items-center justify-between gap-3">
                <button class="flex items-center gap-2">
                    <i class="fa-solid fa-caret-down text-secondary"></i>
                    <p class="text-lg font-semibold text-secondary">Guru</p>
                </button>
                <div class="w-full h-px bg-secondary"></div>
            </div>
            <div class="grid grid-cols-5 gap-5 my-5">
                @foreach ($filteredUsers['teacher'] as $teacher)
                  <div class="flex flex-col items-center justify-center rounded border p-4">
                    <h1 class="overflow-hidden text-ellipsis whitespace-nowrap text-base font-semibold">{{ $teacher->name }}</h1>
                    <p class="my-2 text-sm text-primary">{{ $teacher->roles->first()->name }}</p>
                    <p class="w-full rounded-sm bg-primary py-2 text-center text-white">ubah role</p>
                  </div>
                @endforeach
              </div>
        </section>
        {{-- section teacher end --}}

        {{-- section studentCouncil start --}}
        <section id="studentCouncil">
            <div class="w-full flex items-center justify-between gap-3">
                <button class="flex items-center gap-2">
                    <i class="fa-solid fa-caret-down text-secondary"></i>
                    <p class="text-lg font-semibold text-secondary">Osis </p>
                </button>
                <div class="w-full h-px bg-secondary"></div>
            </div>
            <div class="grid grid-cols-5 gap-5 my-5">
                @foreach ($filteredUsers['student_council'] as $studentCouncil)
                  <div class="flex flex-col items-center justify-center rounded border p-4">
                    <h1 class="overflow-hidden text-ellipsis whitespace-nowrap text-base font-semibold">{{ $studentCouncil->name }}</h1>
                    <p class="my-2 text-sm text-primary">{{ $studentCouncil->roles->first()->name }}</p>
                    <p class="w-full rounded-sm bg-primary py-2 text-center text-white">ubah role</p>
                  </div>
                @endforeach
              </div>
        </section>
        {{-- section admin end --}}

        {{-- section admin start --}}
        <section id="admin">
            <div class="w-full flex items-center justify-between gap-3">
                <button class="flex items-center gap-2">
                    <i class="fa-solid fa-caret-down text-secondary"></i>
                    <p class="text-lg font-semibold text-secondary  whitespace-nowrap">Ketua Ekstrakulikuler</p>
                </button>
                <div class="w-full h-px bg-secondary"></div>
            </div>
            <div class="grid grid-cols-5 gap-5 my-5">
                @foreach ($filteredUsers['ekskul'] as $ekskul)
                  <div class="flex flex-col items-center justify-center rounded border p-4">
                    <h1 class="overflow-hidden text-ellipsis whitespace-nowrap text-base font-semibold">{{ $ekskul->name }}</h1>
                    <p class="my-2 text-sm text-primary">{{ $ekskul->roles->first()->name }}</p>
                    <p class="w-full rounded-sm bg-primary py-2 text-center text-white">ubah role</p>
                  </div>
                @endforeach
              </div>
        </section>
        {{-- section admin end --}}
        {{-- section admin start --}}
        <section id="students">
            <div class="w-full flex items-center justify-between gap-3">
                <button class="flex items-center gap-2">
                    <i class="fa-solid fa-caret-down text-secondary"></i>
                    <p class="text-lg font-semibold text-secondary whitespace-nowrap">Siswa Biasa</p>
                </button>
                <div class="w-full h-px bg-secondary"></div>
            </div>
            <div class="grid grid-cols-5 gap-5 my-5">
                @foreach ($filteredUsers['student'] as $student)
                  <div class="flex flex-col items-center justify-center rounded border p-4">
                    <h1 class="overflow-hidden text-ellipsis whitespace-nowrap text-base font-semibold">{{ $student->name }}</h1>
                    <p class="my-2 text-sm text-primary">{{ $student->roles->first()->name }}</p>
                    <p class="w-full rounded-sm bg-primary py-2 text-center text-white">ubah role</p>
                  </div>
                @endforeach
              </div>
        </section>
        {{-- section admin end --}}

    </div>
  </div>
@endsection
