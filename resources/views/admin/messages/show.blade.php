<x-app-layout>
  <x-slot name="header">
      <div class="flex justify-between items-center">
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              {{ __('Detail Pesan') }}
          </h2>
          <a href="{{ route('admin.messages.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded">
              Kembali
          </a>
      </div>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                  <div class="mb-6">
                      <div class="flex justify-between items-center mb-4">
                          <h3 class="text-lg font-semibold">{{ $message->subject }}</h3>
                          <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $message->is_read ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' }}">
                              {{ $message->is_read ? 'Dibaca' : 'Belum Dibaca' }}
                          </span>
                      </div>
                      <div class="bg-gray-50 p-4 rounded-lg mb-4">
                          <div class="mb-2">
                              <span class="font-medium">Dari:</span> {{ $message->name }} ({{ $message->email }})
                          </div>
                          @if($message->phone)
                              <div class="mb-2">
                                  <span class="font-medium">Telepon:</span> {{ $message->phone }}
                              </div>
                          @endif
                          <div>
                              <span class="font-medium">Tanggal:</span> {{ $message->created_at->format('d F Y, H:i') }}
                          </div>
                      </div>
                      <div class="bg-white p-4 rounded-lg border border-gray-200">
                          <p class="whitespace-pre-line">{{ $message->message }}</p>
                      </div>
                  </div>

                  <div class="flex justify-between">
                      <a href="mailto:{{ $message->email }}" class="bg-gray-800 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                          Balas via Email
                      </a>
                      <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesan ini?');">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                              Hapus Pesan
                          </button>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>