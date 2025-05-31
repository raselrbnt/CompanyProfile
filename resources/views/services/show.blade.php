<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ $service->name }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                  <div class="flex flex-col md:flex-row gap-8">
                      <div class="md:w-1/3">
                          @if($service->image)
                              <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->name }}" class="w-full h-auto rounded-lg">
                          @else
                              <div class="bg-gray-200 rounded-lg p-12 flex items-center justify-center">
                                  <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                  </svg>
                              </div>
                          @endif
                      </div>
                      <div class="md:w-2/3">
                          <h1 class="text-3xl font-bold mb-4">{{ $service->name }}</h1>
                          <div class="prose max-w-none">
                              <p>{{ $service->description }}</p>
                          </div>
                          <div class="mt-8">
                              <a href="{{ route('contact') }}" class="inline-block bg-gray-900 text-white hover:bg-gray-800 px-6 py-3 rounded-md font-medium transition duration-300">Hubungi Kami untuk Konsultasi</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>