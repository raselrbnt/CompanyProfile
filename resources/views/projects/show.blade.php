<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ $project->title }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                  <div class="mb-8">
                      <img src="{{ asset('storage/' . $project->featured_image) }}" alt="{{ $project->title }}" class="w-full h-96 object-cover rounded-lg">
                  </div>

                  <div class="flex flex-col md:flex-row gap-8">
                      <div class="md:w-2/3">
                          <h1 class="text-3xl font-bold mb-4">{{ $project->title }}</h1>
                          <div class="prose max-w-none mb-6">
                              <p>{{ $project->description }}</p>
                          </div>
                      </div>
                      <div class="md:w-1/3 bg-gray-50 p-6 rounded-lg">
                          <h3 class="text-xl font-semibold mb-4">Detail Proyek</h3>
                          <div class="space-y-3">
                              <div>
                                  <span class="font-medium">Klien:</span>
                                  <span class="text-gray-600">{{ $project->client }}</span>
                              </div>
                              <div>
                                  <span class="font-medium">Lokasi:</span>
                                  <span class="text-gray-600">{{ $project->location }}</span>
                              </div>
                              <div>
                                  <span class="font-medium">Tanggal Selesai:</span>
                                  <span class="text-gray-600">{{ $project->completion_date->format('d F Y') }}</span>
                              </div>
                          </div>
                      </div>
                  </div>

                  @if($project->images->count() > 0)
                      <div class="mt-12">
                          <h3 class="text-2xl font-semibold mb-6">Galeri Proyek</h3>
                          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                              @foreach($project->images as $image)
                                  <div class="relative group">
                                      <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $image->caption }}" class="w-full h-64 object-cover rounded-lg">
                                      @if($image->caption)
                                          <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 flex items-end transition duration-300 rounded-lg">
                                              <div class="p-4 text-white">
                                                  <p>{{ $image->caption }}</p>
                                              </div>
                                          </div>
                                      @endif
                                  </div>
                              @endforeach
                          </div>
                      </div>
                  @endif

                  <div class="mt-8">
                      <a href="{{ route('projects') }}" class="inline-block bg-gray-900 text-white hover:bg-gray-800 px-6 py-3 rounded-md font-medium transition duration-300">Kembali ke Proyek</a>
                  </div>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>