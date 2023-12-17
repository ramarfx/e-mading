{{-- search bar --}}
<div class="mb-7 w-full md:w-1/2">
  <form action="" method="get">
    <div class="relative flex items-center rounded-tl-md rounded-bl-md border bg-white">
      <span type="submit" class="px-4"><i class="fa-solid fa-magnifying-glass"></i></span>
      <input type="text" name="query" value="{{ request('query') }}" placeholder="Cari..."
        class="w-full rounded-l-md px-4 py-2 focus:outline-none" />
      <span id="searchBtn" class="cursor-pointer px-4"><i class="fa-solid fa-sliders"></i></span>

      <div id="searchBy" class="absolute right-0 top-12 z-20 hidden">
        <select name="search_by" id="search_by" class="px-3 py-2 border shadow-sm rounded-md">
          <option {{ request('search_by') == 'title' ? 'selected' : null }} value="title">Judul</option>
          <option {{ request('search_by') == 'category' ? 'selected' : null }} value="category">Kategori
          </option>
          <option {{ request('search_by') == 'author' ? 'selected' : null }} value="author">Penulis</option>
          <option {{ request('search_by') == 'date' ? 'selected' : null }} value="date">Tanggal</option>
        </select>

        <select name="category" id="category" class="px-3 py-2 border shadow-sm rounded-md">
          <option {{ request('category') == 'pengumuman' ? 'selected' : null }} value="pengumuman">pengumuman
          </option>
          <option {{ request('category') == 'event' ? 'selected' : null }} value="event">event</option>
          <option {{ request('category') == 'artikel' ? 'selected' : null }} value="artikel">artikel
          </option>
          <option {{ request('category') == 'ekstrakulikuler' ? 'selected' : null }} value="ekstrakulikuler">
            ekstrakulikuler</option>
        </select>
      </div>
      <div class="bg-primary rounded-tr-md rounded-br-md">
        <button type="submit" class="px-4 h-[40px]  text-white">Cari</button>
      </div>
    </div>
  </form>
</div>
