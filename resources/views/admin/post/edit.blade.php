@extends('layouts.main')

@section('container')
  <div class="container mx-auto flex-col lg:flex-row">
    <div class="mt-32 flex items-center justify-center">
      <div class="mx-auto w-full max-w-3xl">
        <form action="{{ route('post.update', $post) }}" method="post" enctype="multipart/form-data"
          class="mb-4 rounded bg-white px-8 pb-8 pt-6 shadow-lg">
          @csrf
          @method('patch')
          <h1 class="mb-5 text-center text-lg font-semibold">Tambahkan Post</h1>
          <div class="mb-4">
            <label for="title" class="mb-2 block text-sm font-bold text-gray-700">Judul</label>
            <input type="text" id="title" name="title" required
              class="w-full rounded border px-3 py-2 leading-tight text-gray-700" value="{{ old('title', $post->title) }}">
          </div>
          <div class="mb-4">
            <label for="description" class="mb-2 block text-sm font-bold text-gray-700">Description</label>
            <textarea type="" id="description" name="description" required
              class="h-96 w-full rounded border px-3 py-2 leading-tight text-gray-700">
              {{ old('description', $post->description) }}
            </textarea>
          </div>

          <div class="mb-4">
            <label for="category" class="mb-2 block text-sm font-bold text-gray-700">Kategori</label>
            <select id="category" name="category" required
              class="w-full rounded border px-3 py-2 leading-tight text-gray-700">
              <option {{ old('category') == 'pengumuman' ? 'selected' : null }} value="pengumuman">Pengumuman</option>
              <option {{ old('category') == 'event' ? 'selected' : null }} value="event">Event</option>
              <option {{ old('category') == 'berita' ? 'selected' : null }} value="berita">Berita</option>
              <option {{ old('category') == 'ekstrakulikuler' ? 'selected' : null }} value="ekstrakulikuler">
                Ekstrakulikuler</option>
            </select>
          </div>

          <div class="mb-4">
            <label for="priority_level" class="mb-2 block text-sm font-bold text-gray-700">Tingkat Prioritas</label>
            <select id="priority_level" name="priority_level" required
              class="w-full rounded border px-3 py-2 leading-tight text-gray-700">
              <option {{ old('priority_level') == 'biasa' ? 'selected' : null }} value="biasa">Biasa</option>
              <option {{ old('priority_level') == 'penting' ? 'selected' : null }} value="penting">Penting</option>
            </select>
          </div>

          <div class="mb-4">
            <label for="media" class="mb-2 block text-sm font-bold text-gray-700">Upload Gambar/Video</label>
            <input type="file" id="media" name="media"
              class="w-full rounded border px-3 py-2 leading-tight text-gray-700">
          </div>

          <div class="mb-4">
            <label for="link" class="mb-2 block text-sm font-bold text-gray-700">Tautan (opsional)</label>
            <input type="text" id="link" name="link" min="1" max="10" value="{{ $post->link }}"
              class="w-full rounded border px-3 py-2 leading-tight text-gray-700">
          </div>
          <div class="mb-4">
            <label for="publish_at" class="mb-2 block text-sm font-bold text-gray-700">Atur jadwal (opsional)</label>
            <input type="datetime-local" name="publish_at" id="publish_at" value="{{ $post->publish_at}}"
              class="w-full rounded border px-3 py-2 text-gray-700">
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
