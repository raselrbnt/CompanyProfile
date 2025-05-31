<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Edit Gambar Proyek') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                  <div class="mb-6">
                      <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $image->caption }}" class="w-full max-w-md h-auto mx-auto">
                  </div>

                  <form action="{{ route('admin.projects.images.update', [$project, $image]) }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')

                      <div class="mb-4">
                          <label for="image" class="block text-sm font-medium text-gray-700">Gambar Baru</label>
                          <input type="file" name="image" id="image" class="mt-1 block w-full">
                          <p class="text-xs text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengubah gambar.</p>
                          @error('image')
                              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                          @enderror
                      </div>

                      <div class="mb-4">
                          <label for="caption" class="block text-sm font-medium text-gray-700">Keterangan</label>
                          <input type="text" name="caption" id="caption" value="{{ old('caption', $image->caption) }}" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                          @error('caption')
                              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                          @enderror
                      </div>

                      <div class="mb-4">
                          <label for="order" class="block text-sm font-medium text-gray-700">Urutan</label>
                          <input type="number" name="order" id="order" value="{{ old('order', $image->order) }}" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                          @error('order')
                              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                          @enderror
                      </div>

                      <div class="flex justify-end">
                          <a href="{{ route('admin.projects.images.index', $project) }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded mr-2">
                              Batal
                          </a>
                          <button type="submit" class="bg-gray-800 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                              Simpan Perubahan
                          </button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>