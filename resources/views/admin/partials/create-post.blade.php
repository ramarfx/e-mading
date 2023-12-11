@extends('layouts.main')

@section('container')
  <div class="container mx-auto">
    <div class="mt-32 flex items-center justify-center">
      <div class="mx-auto max-w-lg">
        <form action="/post" method="post" enctype="multipart/form-data"
          class="mb-4 rounded bg-white px-8 pb-8 pt-6 shadow-md">
          <h1 class="text-lg font-semibold mb-5 text-center">Tambahkan Post</h1>
          <div class="mb-4">
            <label for="title" class="mb-2 block text-sm font-bold text-gray-700">Judul</label>
            <input type="text" id="title" name="title" required
              class="w-full rounded border px-3 py-2 leading-tight text-gray-700">
          </div>

          <div class="mb-4">
            <label for="category" class="mb-2 block text-sm font-bold text-gray-700">Kategori</label>
            <select id="category" name="category" required
              class="w-full rounded border px-3 py-2 leading-tight text-gray-700">
              <option value="teknologi">Pengumuman</option>
              <option value="fashion">Event</option>
              <option value="travel">Berita</option>
            </select>
          </div>

          <div class="mb-4">
            <label for="priority" class="mb-2 block text-sm font-bold text-gray-700">Tingkat Prioritas</label>
            <input type="number" id="priority" name="priority" min="1" max="10" required
              class="w-full rounded border px-3 py-2 leading-tight text-gray-700">
          </div>

          <div class="mb-4">
            <label for="media" class="mb-2 block text-sm font-bold text-gray-700">Upload Gambar/Video</label>
            <input type="file" id="media" name="media"
              class="w-full rounded border px-3 py-2 leading-tight text-gray-700">
          </div>

          <div class="mb-4">
            <label for="link" class="mb-2 block text-sm font-bold text-gray-700">Tautan (opsional)</label>
            <input type="number" id="link" name="link" min="1" max="10"
              class="w-full rounded border px-3 py-2 leading-tight text-gray-700">
          </div>

          <div class="mb-6 text-center">
            <button type="submit"
              class="rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700 focus:outline-none">
              Posting</button>
          </div>
        </form>
      </div>

    </div>
  </div>
@endsection
