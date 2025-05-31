<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Tentang Kami') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                  <div class="flex flex-col md:flex-row gap-8 mb-12">
                      <div class="md:w-1/2">
                          <h1 class="text-3xl font-bold mb-4">CV Mahakarya Mandiri Interior</h1>
                          <div class="prose max-w-none">
                              <p class="mb-4">CV Mahakarya Mandiri Interior adalah perusahaan desain interior profesional yang berdedikasi untuk menciptakan ruang yang indah, fungsional, dan sesuai dengan kebutuhan klien.</p>
                              <p class="mb-4">Didirikan pada tahun 2010, kami telah menyelesaikan berbagai proyek desain interior untuk rumah, kantor, restoran, hotel, dan berbagai ruang komersial lainnya. Kami bangga dengan reputasi kami dalam memberikan layanan berkualitas tinggi dan hasil yang memuaskan bagi klien kami.</p>
                              <p class="mb-4">Visi kami adalah menjadi perusahaan desain interior terkemuka yang dikenal karena kreativitas, kualitas, dan kepuasan pelanggan. Misi kami adalah menciptakan ruang yang tidak hanya indah secara estetika tetapi juga fungsional dan mencerminkan kepribadian serta kebutuhan klien kami.</p>
                          </div>
                      </div>
                      <div class="md:w-1/2">
                          <img src="{{ asset('storage/about/office.jpg') }}" alt="CV Mahakarya Mandiri Interior Office" class="w-full h-auto rounded-lg shadow-md">
                      </div>
                  </div>

                  <div class="mb-12">
                      <h2 class="text-2xl font-bold mb-6">Nilai-Nilai Kami</h2>
                      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                          <div class="bg-gray-50 p-6 rounded-lg">
                              <h3 class="text-xl font-semibold mb-2">Kualitas</h3>
                              <p class="text-gray-600">Kami berkomitmen untuk memberikan kualitas terbaik dalam setiap aspek pekerjaan kami, dari desain hingga implementasi.</p>
                          </div>
                          <div class="bg-gray-50 p-6 rounded-lg">
                              <h3 class="text-xl font-semibold mb-2">Kreativitas</h3>
                              <p class="text-gray-600">Kami selalu mencari solusi kreatif dan inovatif untuk memenuhi kebutuhan dan harapan klien kami.</p>
                          </div>
                          <div class="bg-gray-50 p-6 rounded-lg">
                              <h3 class="text-xl font-semibold mb-2">Integritas</h3>
                              <p class="text-gray-600">Kami menjalankan bisnis kami dengan kejujuran, transparansi, dan etika yang tinggi.</p>
                          </div>
                      </div>
                  </div>

                  <div>
                      <h2 class="text-2xl font-bold mb-6">Tim Kami</h2>
                      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                          @foreach($teamMembers as $member)
                              <div class="bg-gray-50 rounded-lg p-6 text-center">
                                  <img src="{{ asset('storage/' . $member->photo) }}" alt="{{ $member->name }}" class="w-32 h-32 object-cover rounded-full mx-auto mb-4">
                                  <h3 class="text-xl font-semibold mb-1">{{ $member->name }}</h3>
                                  <p class="text-gray-600 mb-4">{{ $member->position }}</p>
                                  <p class="text-gray-600">{{ $member->bio }}</p>
                                  <div class="mt-4 flex justify-center space-x-4">
                                      @if($member->email)
                                          <a href="mailto:{{ $member->email }}" class="text-gray-600 hover:text-gray-900">
                                              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                  <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                                  <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                                              </svg>
                                          </a>
                                      @endif
                                      @if($member->phone)
                                          <a href="tel:{{ $member->phone }}" class="text-gray-600 hover:text-gray-900">
                                              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                  <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                                              </svg>
                                          </a>
                                      @endif
                                  </div>
                              </div>
                          @endforeach
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>