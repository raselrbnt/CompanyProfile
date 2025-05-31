<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Proyek') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                      @foreach($projects as $project)
                          <div class="bg-white rounded-lg overflow-hidden shadow-md transition duration-300 hover:shadow-xl">
                              <img src="{{ asset('storage/' . $project->featured_image) }}" alt="{{ $project->title }}" class="w-full h-64 object-cover">
                              <div class="p-6">
                                  <h3 class="text-xl font-semibold mb-2">{{ $project->title }}</h3>
                                  <p class="text-gray-600 mb-4">{{ Str::limit($project->description, 100) }}</p>
                                  <div class="flex justify-between items-center">
                                      <span class="text-gray-500">{{ $project->client }}</span>
                                      <a href="{{ route('projects.show', $project->id) }}" class="text-gray-900 font-medium hover:underline">Lihat Detail</a>
                                  </div>
                              </div>
                          </div>
                      @endforeach
                  </div>

                  <div class="mt-8">
                      {{ $projects->links() }}
                  </div>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>