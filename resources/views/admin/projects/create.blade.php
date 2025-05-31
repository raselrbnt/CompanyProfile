<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Tambah Proyek') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                  <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                      @csrf

                      <div class="mb-4">
                          <label for="title" class="block text-sm font-medium text-gray-700">Judul Proyek</label>
                          <input type="text" name="title" id="title" value="{{ old('title') }}" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                          @error('title')
                              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                          @enderror
                      </div>

                      <div class="mb-4">
                          <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                          <textarea name="description" id="description" rows="4" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ old('description') }}</textarea>
                          @error('description')
                              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                          @enderror
                      </div>

                      <div class="mb-4">
                          <label for="client" class="block text-sm font-medium text-gray-700">Klien</label>
                          <input type="text" name="client" id="client" value="{{ old('client') }}" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                          @error('client')
                              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                          @enderror
                      </div>

                      <div class="mb-4">
                          <label for="completion_date" class="block text-sm font-medium text-gray-700">Tanggal Selesai</label>
                          <input type="date" name="completion_date" id="completion_date" value="{{ old('completion_date') }}" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                          @error('completion_date')
                              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                          @enderror
                      </div>

                      <div class="mb-4">
                          <label for="location" class="block text-sm font-medium text-gray-700">Lokasi</label>
                          <input type="text" name="location" id="location" value="{{ old('location') }}" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                          @error('location')
                              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                          @enderror
                      </div>

                      <div class="mb-4">
                          <label for="featured_image" class="block text-sm font-medium text-gray-700">Gambar Utama</label>
                          <input type="file" name="featured_image" id="featured_image" class="mt-1 block w-full">
                          @error('featured_image')
                              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                          @enderror
                      </div>

                      <div class="mb-4">
                          <div class="flex items-start">
                              <div class="flex items-center h-5">
                                  <input type="checkbox" name="is_featured" id="is_featured" {{ old('is_featured') ? 'checked' : '' }} class="focus:ring-gray-500 h-4 w-4 text-gray-600 border-gray-300 rounded">
                              </div>
                              <div class="ml-3 text-sm">
                                  <label for="is_featured" class="font-medium text-gray-700">Proyek Unggulan</label>
                                  <p class="text-gray-500">Proyek akan ditampilkan di halaman beranda jika dicentang.</p>
                              </div>
                          </div>
                      </div>

                      <div class="flex justify-end">
                          <a href="{{ route('admin.projects.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded mr-2">
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