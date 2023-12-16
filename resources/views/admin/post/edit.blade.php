@extends('layouts.main')

@section('container')
  <div class="container mx-auto flex-col lg:flex-row">
    <div class="mt-32 flex items-center justify-center">
      <div class="mx-auto w-full max-w-3xl">
        <form action="{{ route('post.update', $post) }}" method="post" enctype="multipart/form-data"
          class="mb-4 rounded bg-white px-8 pb-8 pt-6 shadow-lg">
          @csrf
          @method('patch')
          <h1 class="mb-5 text-center text-lg font-semibold">Edit Post</h1>
          <div class="mb-4">
            <label for="title" class="mb-2 block text-sm font-bold text-gray-700">Judul</label>
            <input type="text" id="title" name="title" required
              class="w-full rounded border px-3 py-2 leading-tight text-gray-700"
              value="{{ old('title', $post->title) }}">
            @error('title')
              <p class="mt-0.5 text-sm text-red-500">{{ $message }}</p>
            @enderror
          </div>
          <div class="mb-4">
            <label for="description" class="mb-2 block text-sm font-bold text-gray-700">Description</label>
            <textarea type="" id="description" name="description" required
              class="h-96 w-full rounded border px-3 py-2 leading-tight text-gray-700">
              {{ old('description', $post->description) }}
            </textarea>
            @error('description')
              <p class="mt-0.5 text-sm text-red-500">{{ $message }}</p>
            @enderror
          </div>

          <div class="mb-4">
            <label for="category" class="mb-2 block text-sm font-bold text-gray-700">Kategori</label>
            <select id="category" name="category" required
              class="w-full rounded border px-3 py-2 leading-tight text-gray-700">
              <option {{ old('category', $post->category) == 'pengumuman' ? 'selected' : null }} value="pengumuman">
                Pengumuman</option>
              <option {{ old('category', $post->category) == 'event' ? 'selected' : null }} value="event">Event</option>
              <option {{ old('category', $post->category) == 'artikel' ? 'selected' : null }} value="artikel">artikel
              </option>
              <option {{ old('category', $post->category) == 'ekstrakulikuler' ? 'selected' : null }}
                value="ekstrakulikuler">
                Ekstrakulikuler</option>
            </select>
            @error('category')
              <p class="mt-0.5 text-sm text-red-500">{{ $message }}</p>
            @enderror
          </div>

          <div class="mb-4">
            <label for="priority_level" class="mb-2 block text-sm font-bold text-gray-700">Tingkat Prioritas</label>
            <select id="priority_level" name="priority_level" required
              class="w-full rounded border px-3 py-2 leading-tight text-gray-700">
              <option {{ old('priority_level', $post->priority_level) == 'biasa' ? 'selected' : null }} value="biasa">
                Biasa</option>
              <option {{ old('priority_level', $post->priority_level) == 'penting' ? 'selected' : null }}
                value="penting">Penting</option>
            </select>
            @error('priority_level')
              <p class="mt-0.5 text-sm text-red-500">{{ $message }}</p>
            @enderror
          </div>

          <div class="mb-4">
            <label for="media" class="mb-2 block text-sm font-bold text-gray-700">Upload Gambar/Video</label>
            <input type="file" id="media" name="media" accept="image/*, video/*" min="{{ now() }}"
              class="w-full rounded border px-3 py-2 leading-tight text-gray-700" value="{{ $post->media_path }} ">
            @error('media')
              <p class="mt-0.5 text-sm text-red-500">{{ $message }}</p>
            @enderror
          </div>

          <div class="mb-4">
            <label for="link" class="mb-2 block text-sm font-bold text-gray-700">Tautan (opsional)</label>
            <input type="text" id="link" name="link" min="1" max="10" value="{{ old('link', $post->link) }}"
              class="w-full rounded border px-3 py-2 leading-tight text-gray-700">
            @error('link')
              <p class="mt-0.5 text-sm text-red-500">{{ $message }}</p>
            @enderror
          </div>
          <div class="mb-4">
            @if ($post->published_at >= now())
              <label for="published_at" class="mb-2 block text-sm font-bold text-gray-700">Atur jadwal (opsional)</label>
              <input type="datetime-local" name="published_at" id="published_at" value="{{ old('published_at', $post->published_at) }}"
                class="w-full rounded border px-3 py-2 text-gray-700">
              @error('published_at')
                <p class="mt-0.5 text-sm text-red-500">{{ $message }}</p>
              @enderror
            @endif
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
