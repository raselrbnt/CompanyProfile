<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Tambah Anggota Tim') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                  <form action="{{ route('admin.team.store') }}" method="POST" enctype="multipart/form-data">
                      @csrf

                      <div class="mb-4">
                          <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                          <input type="text" name="name" id="name" value="{{ old('name') }}" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                          @error('name')
                              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                          @enderror
                      </div>

                      <div class="mb-4">
                          <label for="position" class="block text-sm font-medium text-gray-700">Posisi</label>
                          <input type="text" name="position" id="position" value="{{ old('position') }}" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                          @error('position')
                              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                          @enderror
                      </div>

                      <div class="mb-4">
                          <label for="bio" class="block text-sm font-medium text-gray-700">Biografi</label>
                          <textarea name="bio" id="bio" rows="4" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ old('bio') }}</textarea>
                          @error('bio')
                              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                          @enderror
                      </div>

                      <div class="mb-4">
                          <label for="photo" class="block text-sm font-medium text-gray-700">Foto</label>
                          <input type="file" name="photo" id="photo" class="mt-1 block w-full">
                          @error('photo')
                              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                          @enderror
                      </div>

                      <div class="mb-4">
                          <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                          <input type="email" name="email" id="email" value="{{ old('email') }}" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                          @error('email')
                              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                          @enderror
                      </div>

                      <div class="mb-4">
                          <label for="phone" class="block text-sm font-medium text-gray-700">Telepon</label>
                          <input type="text" name="phone" id="phone" value="{{ old('phone') }}" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                          @error('phone')
                              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                          @enderror
                      </div>

                      <div class="mb-4">
                          <label for="order" class="block text-sm font-medium text-gray-700">Urutan</label>
                          <input type="number" name="order" id="order" value="{{ old('order', 0) }}" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                          @error('order')
                              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                          @enderror
                      </div>

                      <div class="mb-4">
                          <div class="flex items-start">
                              <div class="flex items-center h-5">
                                  <input type="checkbox" name="is_active" id="is_active" checked class="focus:ring-gray-500 h-4 w-4 text-gray-600 border-gray-300 rounded">
                              </div>
                              <div class="ml-3 text-sm">
                                  <label for="is_active" class="font-medium text-gray-700">Aktif</label>
                                  <p class="text-gray-500">Anggota tim akan ditampilkan di website jika diaktifkan.</p>
                              </div>
                          </div>
                      </div>

                      <div class="flex justify-end">
                          <a href="{{ route('admin.team.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded mr-2">
                              Batal
                          </a>
                          <button type="submit" class="bg-gray-800 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                              Simpan
                          </button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>