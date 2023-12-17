@extends('layouts.main')



@section('container')
  <div class="flex min-h-screen flex-col bg-gray-100 lg:flex-row">

    @include('components.sidebar')

    <!-- Main Content Area -->
    <div class="flex-1 p-8">
      <h1 class="mb-4 text-2xl font-bold">Dashboard Papan Pengumuman Sekolah</h1>

      {{-- Content Area --}}
      <div class="grid grid-cols-1 gap-2 lg:gap-5">
        <div class="w-full bg-white p-4 rounded-md">
            {!! $postViewChart->container() !!}
        </div>
        <div class="flex w-full flex-col rounded-md bg-white p-4">
          <a href="{{ route('dashboard.print', $period) }}" class="flex items-center justify-center gap-3"><i
              class="fa-solid fa-file-pdf"></i> Cetak
            PDF</a>
        </div>
        <div class="relative flex w-full flex-col rounded-md bg-white p-4">
            <h2 class="mb-2 h-full w-full text-lg font-semibold">Statistik</h2>
            <div class="group absolute right-5 top-3 text-xl">
                <button id="periodBtn" type="button">
                    <i class="fa-solid fa-ellipsis group-hover:text-primary"></i>
                </button>

                <div id="periodContent" class="hidden">
              <form method="GET" class="absolute right-0 top-4 z-10 border bg-white">
                <select name="period" id="period" class="text-sm">
                    <option value="all" selected disabled>Periode :</option>
                    <option value="daily">Hari ini</option>
                    <option value="weekly">minggu ini</option>
                    <option value="monthly">bulan ini</option>
                    <option value="yearly">tahun ini</option>
                </select>
              </form>
            </div>
        </div>
        <div class="flex justify-between border-b">
            <p class="font-semibold">Judul post</p>
            <p class="font-semibold">Views</p>
        </div>
        @foreach ($periodViews as $post)
        <div class="flex w-[99%] justify-between border-b py-2">
            <p>{{ $post->title }}</p>
            <p>{{ $post->viewed_by_count }}</p>
            </div>
          @endforeach
        </div>

      </div>

    </div>
  </div>
@endsection

@section('scripts')
  <script src="{{ $postViewChart->cdn() }}"></script>

  {{ $postViewChart->script() }}
@endsection
