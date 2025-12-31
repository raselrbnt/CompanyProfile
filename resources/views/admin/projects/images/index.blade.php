<x-admin-layout>
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
              <div x-data="{ show: true }" 
                   x-init="setTimeout(() => show = false, 3000)"
                   x-show="show"
                   x-transition:enter="transition ease-out duration-300"
                   x-transition:enter-start="opacity-0 transform translate-y-2"
                   x-transition:enter-end="opacity-100 transform translate-y-0"
                   x-transition:leave="transition ease-in duration-300"
                   x-transition:leave-start="opacity-100"
                   x-transition:leave-end="opacity-0"
                   @click="show = false"
                   class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4 cursor-pointer" 
                   role="alert">
                  <span class="block sm:inline">{{ session('success') }}</span>
                  <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                      <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                          <title>Close</title>
                          <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
                      </svg>
                  </span>
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
                                      <div class="flex justify-between" x-data="{ showDeleteModal: false, deleteUrl: '', deleteName: '' }">
                                          <a href="{{ route('admin.projects.images.edit', [$project, $image]) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                          <button type="button" 
                                                  @click="showDeleteModal = true; deleteUrl = '{{ route('admin.projects.images.destroy', [$project, $image]) }}'; deleteName = '{{ $image->caption ?? 'Gambar ini' }}'"
                                                  class="text-red-600 hover:text-red-900">
                                              Hapus
                                          </button>
                                          
                                          <!-- Inline Delete Modal -->
                                          <div x-show="showDeleteModal" 
                                               x-cloak
                                               class="fixed inset-0 z-50 overflow-y-auto" 
                                               style="display: none;">
                                              <div class="flex items-center justify-center min-h-screen px-4">
                                                  <div x-show="showDeleteModal" 
                                                       @click="showDeleteModal = false"
                                                       class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
                                                  
                                                  <div x-show="showDeleteModal" 
                                                       class="relative bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full max-w-md w-11/12">
                                                      <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                                          <div class="sm:flex sm:items-start">
                                                              <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                                                  <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                                                  </svg>
                                                              </div>
                                                              <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left flex-1 min-w-0">
                                                                  <h3 class="text-lg leading-6 font-medium text-gray-900 mb-2">Konfirmasi Penghapusan</h3>
                                                                  <div class="mt-2">
                                                                      <p class="text-sm text-gray-500" style="word-wrap: break-word; word-break: break-word; overflow-wrap: break-word; white-space: normal;">
                                                                          Apakah Anda yakin ingin menghapus <strong class="font-semibold" style="word-wrap: break-word; word-break: break-word;" x-text="deleteName"></strong>? Data yang sudah dihapus tidak dapat dikembalikan.
                                                                      </p>
                                                                  </div>
                                                              </div>
                                                          </div>
                                                      </div>
                                                      <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                                          <form :action="deleteUrl" method="POST" class="inline">
                                                              @csrf
                                                              @method('DELETE')
                                                              <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 sm:ml-3 sm:w-auto sm:text-sm">
                                                                  Hapus
                                                              </button>
                                                          </form>
                                                          <button @click="showDeleteModal = false" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 sm:mt-0 sm:w-auto sm:text-sm">
                                                              Batal
                                                          </button>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
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
</x-admin-layout>
