<x-app-layout>
  <x-slot name="header">
      <div class="flex justify-between items-center">
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              {{ __('Kelola Layanan') }}
          </h2>
          <a href="{{ route('admin.services.create') }}" class="bg-gray-800 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
              Tambah Layanan
          </a>
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
                  <div class="overflow-x-auto">
                      <table class="min-w-full divide-y divide-gray-200">
                          <thead class="bg-gray-50">
                              <tr>
                                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                      Nama
                                  </th>
                                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                      Deskripsi
                                  </th>
                                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                      Urutan
                                  </th>
                                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                      Status
                                  </th>
                                  <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                      Aksi
                                  </th>
                              </tr>
                          </thead>
                          <tbody class="bg-white divide-y divide-gray-200">
                              @forelse($services as $service)
                                  <tr>
                                      <td class="px-6 py-4 whitespace-nowrap">
                                          <div class="text-sm font-medium text-gray-900">
                                              {{ $service->name }}
                                          </div>
                                      </td>
                                      <td class="px-6 py-4">
                                          <div class="text-sm text-gray-500">
                                              {{ Str::limit($service->description, 100) }}
                                          </div>
                                      </td>
                                      <td class="px-6 py-4 whitespace-nowrap">
                                          <div class="text-sm text-gray-500">
                                              {{ $service->order }}
                                          </div>
                                      </td>
                                      <td class="px-6 py-4 whitespace-nowrap">
                                          <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $service->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                              {{ $service->is_active ? 'Aktif' : 'Tidak Aktif' }}
                                          </span>
                                      </td>
                                      <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                          <div class="flex space-x-2">
                                              <a href="{{ route('admin.services.edit', $service) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                              <form action="{{ route('admin.services.destroy', $service) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus layanan ini?');">
                                                  @csrf
                                                  @method('DELETE')
                                                  <button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
                                              </form>
                                          </div>
                                      </td>
                                  </tr>
                              @empty
                                  <tr>
                                      <td colspan="5" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                          Tidak ada layanan yang ditemukan.
                                      </td>
                                  </tr>
                              @endforelse
                          </tbody>
                      </table>
                  </div>

                  <div class="mt-4">
                      {{ $services->links() }}
                  </div>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>