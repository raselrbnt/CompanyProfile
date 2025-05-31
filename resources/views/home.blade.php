<x-app-layout>
  <!-- Hero Section -->
  <section class="bg-gray-900 text-white">
      <div class="max-w-7xl mx-auto py-20 px-4 sm:px-6 lg:px-8 flex flex-col items-center text-center">
          <h1 class="text-4xl md:text-5xl font-bold mb-6">Desain Interior Profesional untuk Ruang Anda</h1>
          <p class="text-xl max-w-3xl mb-8">CV Mahakarya Mandiri Interior menyediakan layanan desain interior berkualitas tinggi untuk rumah, kantor, dan ruang komersial.</p>
          <div class="flex flex-wrap justify-center gap-4">
              <a href="{{ route('services') }}" class="bg-white text-gray-900 hover:bg-gray-100 px-6 py-3 rounded-md font-medium transition duration-300">Layanan Kami</a>
              <a href="{{ route('contact') }}" class="bg-transparent border border-white text-white hover:bg-white hover:text-gray-900 px-6 py-3 rounded-md font-medium transition duration-300">Hubungi Kami</a>
          </div>
      </div>
  </section>

  <!-- Services Section -->
  <section class="py-16 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="text-center mb-12">
              <h2 class="text-3xl font-bold mb-4">Layanan Kami</h2>
              <p class="text-gray-600 max-w-3xl mx-auto">Kami menyediakan berbagai layanan desain interior untuk memenuhi kebutuhan Anda.</p>
          </div>
          
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
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
          
          <div class="text-center mt-12">
              <a href="{{ route('services') }}" class="inline-block bg-gray-900 text-white hover:bg-gray-800 px-6 py-3 rounded-md font-medium transition duration-300">Lihat Semua Layanan</a>
          </div>
      </div>
  </section>

  <!-- Featured Projects Section -->
  <section class="py-16 bg-gray-50">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="text-center mb-12">
              <h2 class="text-3xl font-bold mb-4">Proyek Terbaru</h2>
              <p class="text-gray-600 max-w-3xl mx-auto">Lihat beberapa proyek terbaru yang telah kami selesaikan.</p>
          </div>
          
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
              @foreach($featuredProjects as $project)
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
          
          <div class="text-center mt-12">
              <a href="{{ route('projects') }}" class="inline-block bg-gray-900 text-white hover:bg-gray-800 px-6 py-3 rounded-md font-medium transition duration-300">Lihat Semua Proyek</a>
          </div>
      </div>
  </section>

  <!-- Team Section -->
  <section class="py-16 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="text-center mb-12">
              <h2 class="text-3xl font-bold mb-4">Tim Kami</h2>
              <p class="text-gray-600 max-w-3xl mx-auto">Kenali tim profesional kami yang akan membantu mewujudkan ruang impian Anda.</p>
          </div>
          
          <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
              @foreach($teamMembers as $member)
                  <div class="bg-gray-50 rounded-lg p-6 text-center">
                      <img src="{{ asset('storage/' . $member->photo) }}" alt="{{ $member->name }}" class="w-32 h-32 object-cover rounded-full mx-auto mb-4">
                      <h3 class="text-xl font-semibold mb-1">{{ $member->name }}</h3>
                      <p class="text-gray-600 mb-4">{{ $member->position }}</p>
                      <p class="text-gray-600">{{ Str::limit($member->bio, 150) }}</p>
                  </div>
              @endforeach
          </div>
          
          <div class="text-center mt-12">
              <a href="{{ route('about') }}" class="inline-block bg-gray-900 text-white hover:bg-gray-800 px-6 py-3 rounded-md font-medium transition duration-300">Tentang Kami</a>
          </div>
      </div>
  </section>

  <!-- CTA Section -->
  <section class="py-16 bg-gray-900 text-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
          <h2 class="text-3xl font-bold mb-6">Siap untuk Mewujudkan Ruang Impian Anda?</h2>
          <p class="text-xl max-w-3xl mx-auto mb-8">Hubungi kami sekarang untuk konsultasi gratis dan mulai perjalanan menuju ruang yang lebih baik.</p>
          <a href="{{ route('contact') }}" class="inline-block bg-white text-gray-900 hover:bg-gray-100 px-8 py-4 rounded-md font-medium text-lg transition duration-300">Hubungi Kami</a>
      </div>
  </section>
</x-app-layout>