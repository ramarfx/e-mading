@extends('layouts.main')

@section('container')
  <div class="flex flex-col lg:flex-row">
    @include('components.sidebar')

    <div class="min-h-screen flex-1 p-8">
      <div class="overflow-x-auto">
        <table class="table w-full table-auto border-collapse rounded-md bg-white shadow-lg text-sm lg:text-base">
          <thead class="border bg-primary text-white">
            <tr>
              <th class="border border-gray-300 px-4 py-2">Username</th>
              <th class="border border-gray-300 px-4 py-2">Email</th>
              <th class="border border-gray-300 px-4 py-2">Role</th>
              <th class="border border-gray-300 px-4 py-2">Ganti role</th>
            </tr>
          </thead>
          <tbody>
            @if ($users->count())
              <tr>
                <td class="border border-gray-300 px-4 py-2">{{ $users[0]->name }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $users[0]->email }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $users[0]->roles->first()->name }}</td>
                <td class="border border-gray-300 px-4 py-2">
                  <p class="text-red-500">Role admin tidak dapat diubah</p>
                </td>
              </tr>
            @endif
            @foreach ($users->skip(1) as $user)
              <tr>
                <td class="border border-gray-300 px-4 py-2">{{ $user->name }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $user->email }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $user->roles->first()->name }}</td>
                <td class="border border-gray-300 px-4 py-2">
                  <button onclick="toggleModal({{ $user->id }})"
                    class="rounded bg-blue-500 px-2 py-1 text-white hover:bg-blue-700">Ganti</button>

                  <div id="userRoleModal-{{ $user->id }}"
                    class="modal fixed inset-0 z-50 flex hidden items-center justify-center overflow-auto bg-black bg-opacity-50">
                    <!-- Modal content -->
                    <form action="{{ route('users.update') }}" method="post" class="w-1/3 absolute rounded-lg bg-white p-6">
                        @csrf
                      <div class="mb-4">
                        <label class="mb-2 block text-sm font-bold text-gray-700" for="selectOption">
                          Pilih Opsi
                        </label>
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <select name="role_id" class="w-full rounded border border-gray-300 px-3 py-2 outline-none">
                          @foreach ($roles->skip(1) as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="flex justify-end">
                        <button type="submit" class="rounded bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-700">
                          Submit
                        </button>
                        <button type="button" class="ml-2 rounded bg-gray-300 px-4 py-2 font-bold text-gray-800 hover:bg-gray-400"
                          onclick="toggleModal({{ $user->id }})">
                          Tutup
                        </button>
                      </div>
                    </form>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

    </div>
  </div>
@endsection
