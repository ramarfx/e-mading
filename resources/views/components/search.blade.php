{{-- search bar --}}
<div class="mb-7 w-full md:w-1/2">
  <form action="" method="get">
    <div class="relative flex items-center rounded-md border">
      <button type="submit" class="px-4"><i class="fa-solid fa-magnifying-glass"></i></button>
      <input type="text" name="query" placeholder="Cari..."
        class="w-full rounded-l-md px-4 py-2 focus:outline-none" />
      <span id="searchBtn" class="px-4 cursor-pointer"><i class="fa-solid fa-sliders"></i></span>

      <div id="searchBy" class="absolute z-20 hidden border top-12 right-0">
        <select name="search_by" id="search_by">
          <option value="title">Judul</option>
          <option value="category">Kategori</option>
          <option value="author">Penulis</option>
          <option value="date">Tanggal</option>
        </select>

        <select name="category" id="category">
          <option value="pengumuman">pengumuman</option>
          <option value="event">event</option>
          <option value="berita">berita</option>
          <option value="ekstrakulikuler">ekstrakulikuler</option>
        </select>
      </div>
    </div>
  </form>
</div>
