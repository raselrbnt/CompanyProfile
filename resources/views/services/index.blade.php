<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Layanan') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                      @foreach($services as $service)
                          <div class="bg-gray-50 p-6 rounded-lg transition duration-300 hover:shadow-lg">
                              <div class="text-gray-900 mb-4">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                  </svg>
                              </div>
                              <h3 class="text-xl font-semibold mb-2">{{ $service->name }}</h3>
                              <p class="text-gray-600 mb-4">{{ $service->description }}</p>
                              <a href="{{ route('services.show', $service->id) }}" class="text-gray-900 font-medium hover:underline">Pelajari Lebih Lanjut</a>
                          </div>
                      @endforeach
                  </div>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>