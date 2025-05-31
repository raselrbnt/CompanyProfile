<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Edit Anggota Tim') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                  <form action="{{ route('admin.team.update', $member) }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')

                      <div class="mb-4">
                          <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                          <input type="text" name="name" id="name" value="{{ old('name', $member->name) }}" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                          @error('name')
                              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                          @enderror
                      </div>

                      <div class="mb-4">
                          <label for="position" class="block text-sm font-medium text-gray-700">Posisi</label>
                          <input type="text" name="position" id="position" value="{{ old('position', $member->position) }}" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                          @error('position')
                              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                          @enderror
                      </div>

                      <div class="mb-4">
                          <label for="bio" class="block text-sm font-medium text-gray-700">Biografi</label>
                          <textarea name="bio" id="bio" rows="4" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ old('bio', $member->bio) }}</textarea>
                          @error('bio')
                              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                          @enderror
                      </div>

                      <div class="mb-4">
                          <label for="photo" class="block text-sm font-medium text-gray-700">Foto</label>
                          @if($member->photo)
                              <div class="mt-2 mb-2">
                                  <img src="{{ asset('storage/' . $member->photo) }}" alt="{{ $member->name }}" class="h-32 w-32 object-cover rounded-full">
                              </div>
                          @endif
                          <input type="file" name="photo" id="photo" class="mt-1 block w-full">
                          <p class="text-xs text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengubah foto.</p>
                          @error('photo')
                              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                          @enderror
                      </div>

                      <div class="mb-4">
                          <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                          <input type="email" name="email" id="email" value="{{ old('email', $member->email) }}" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                          @error('email')
                              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                          @enderror
                      </div>

                      <div class="mb-4">
                          <label for="phone" class="block text-sm font-medium text-gray-700">Telepon</label>
                          <input type="text" name="phone" id="phone" value="{{ old('phone', $member->phone) }}" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                          @error('phone')
                              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                          @enderror
                      </div>

                      <div class="mb-4">
                          <label for="order" class="block text-sm font-medium text-gray-700">Urutan</label>
                          <input type="number" name="order" id="order" value="{{ old('order', $member->order) }}" class="mt-1 focus:ring-gray-500 focus:border-gray-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                          @error('order')
                              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                          @enderror
                      </div>

                      <div class="mb-4">
                          <div class="flex items-start">
                              <div class="flex items-center h-5">
                                  <input type="checkbox" name="is_active" id="is_active" {{ $member->is_active ? 'checked' : '' }} class="focus:ring-gray-500 h-4 w-4 text-gray-600 border-gray-300 rounded">
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
                              Simpan Perubahan
                          </button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>