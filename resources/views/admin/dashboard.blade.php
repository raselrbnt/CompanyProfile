<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Dashboard') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                      <div class="bg-gray-50 p-6 rounded-lg">
                          <h3 class="text-lg font-semibold mb-2">Layanan</h3>
                          <p class="text-3xl font-bold">{{ $servicesCount }}</p>
                          <a href="{{ route('admin.services.index') }}" class="text-gray-600 hover:text-gray-900 text-sm">Lihat Semua</a>
                      </div>
                      
                      <div class="bg-gray-50 p-6 rounded-lg">
                          <h3 class="text-lg font-semibold mb-2">Proyek</h3>
                          <p class="text-3xl font-bold">{{ $projectsCount }}</p>
                          <a href="{{ route('admin.projects.index') }}" class="text-gray-600 hover:text-gray-900 text-sm">Lihat Semua</a>
                      </div>
                      
                      <div class="bg-gray-50 p-6 rounded-lg">
                          <h3 class="text-lg font-semibold mb-2">Tim</h3>
                          <p class="text-3xl font-bold">{{ $teamMembersCount }}</p>
                          <a href="{{ route('admin.team.index') }}" class="text-gray-600 hover:text-gray-900 text-sm">Lihat Semua</a>
                      </div>
                      
                      <div class="bg-gray-50 p-6 rounded-lg">
                          <h3 class="text-lg font-semibold mb-2">Pesan Belum Dibaca</h3>
                          <p class="text-3xl font-bold">{{ $unreadMessagesCount }}</p>
                          <a href="{{ route('admin.messages.index') }}" class="text-gray-600 hover:text-gray-900 text-sm">Lihat Semua</a>
                      </div>
                  </div>
                  
                  <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                      <div>
                          <h3 class="text-lg font-semibold mb-4">Proyek Terbaru</h3>
                          <div class="bg-gray-50 rounded-lg overflow-hidden">
                              <table class="min-w-full divide-y divide-gray-200">
                                  <thead class="bg-gray-100">
                                      <tr>
                                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul</th>
                                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Klien</th>
                                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                                      </tr>
                                  </thead>
                                  <tbody class="bg-white divide-y divide-gray-200">
                                      @foreach($latestProjects as $project)
                                          <tr>
                                              <td class="px-6 py-4 whitespace-nowrap">
                                                  <a href="{{ route('admin.projects.edit', $project) }}" class="text-gray-900 hover:text-gray-600">{{ $project->title }}</a>
                                              </td>
                                              <td class="px-6 py-4 whitespace-nowrap text-gray-500">{{ $project->client }}</td>
                                              <td class="px-6 py-4 whitespace-nowrap text-gray-500">{{ $project->completion_date->format('d/m/Y') }}</td>
                                          </tr>
                                      @endforeach
                                  </tbody>
                              </table>
                          </div>
                      </div>
                      
                      <div>
                          <h3 class="text-lg font-semibold mb-4">Pesan Terbaru</h3>
                          <div class="bg-gray-50 rounded-lg overflow-hidden">
                              <table class="min-w-full divide-y divide-gray-200">
                                  <thead class="bg-gray-100">
                                      <tr>
                                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subjek</th>
                                          <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                                      </tr>
                                  </thead>
                                  <tbody class="bg-white divide-y divide-gray-200">
                                      @foreach($latestMessages as $message)
                                          <tr>
                                              <td class="px-6 py-4 whitespace-nowrap">
                                                  <a href="{{ route('admin.messages.show', $message) }}" class="text-gray-900 hover:text-gray-600 {{ $message->is_read ? '' : 'font-semibold' }}">{{ $message->name }}</a>
                                              </td>
                                              <td class="px-6 py-4 whitespace-nowrap text-gray-500 {{ $message->is_read ? '' : 'font-semibold' }}">{{ $message->subject }}</td>
                                              <td class="px-6 py-4 whitespace-nowrap text-gray-500">{{ $message->created_at->format('d/m/Y H:i') }}</td>
                                          </tr>
                                      @endforeach
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>