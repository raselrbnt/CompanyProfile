<x-app-layout>
  <x-slot name="header">
      <div class="flex justify-between items-center">
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              {{ __('Galeri Proyek: ') }} {{ $project->title }}
          </h2>
          <div class="flex space-x-2">
              <a href="{{ route('admin.projects.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded">
                  Kembali
              </a>
              <a href="{{ route('admin.projects.images.create', $project) }}" class="bg-gray-800 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                  Tambah Gambar
              </a>
          </div>
      </div>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          @if(session('success'))
              <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                  <span class="block sm:inline">{{ session('success') }}</span>
              </div>
          @endif

          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                  @if($images->count() > 0)
                      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                          @foreach($images as $image)
                              <div class="bg-gray-50 rounded-lg overflow-hidden shadow">
                                  <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $image->caption }}" class="w-full h-48 object-cover">
                                  <div class="p-4">
                                      <p class="text-gray-600 mb-2">{{ $image->caption ?? 'Tidak ada keterangan' }}</p>
                                      <p class="text-sm text-gray-500 mb-4">Urutan: {{ $image->order }}</p>
                                      <div class="flex justify-between">
                                          <a href="{{ route('admin.projects.images.edit', [$project, $image]) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                          <form action="{{ route('admin.projects.images.destroy', [$project, $image]) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus gambar ini?');">
                                              @csrf
                                              @method('DELETE')
                                              <button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
                                          </form>
                                      </div>
                                  </div>
                              </div>
                          @endforeach
                      </div>
                  @else
                      <div class="text-center py-8">
                          <p class="text-gray-500">Belum ada gambar untuk proyek ini.</p>
                          <a href="{{ route('admin.projects.images.create', $project) }}" class="mt-4 inline-block bg-gray-800 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                              Tambah Gambar Pertama
                          </a>
                      </div>
                  @endif
              </div>
          </div>
      </div>
  </div>
</x-app-layout>