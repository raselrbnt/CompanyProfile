<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Kontak') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                  <div class="flex flex-col md:flex-row gap-8">
                      <div class="md:w-1/2">
                          <h1 class="text-3xl font-bold mb-6">Hubungi Kami</h1>
                          <p class="text-gray-600 mb-8">Jika Anda memiliki pertanyaan atau ingin berkonsultasi tentang proyek Anda, silakan hubungi kami melalui formulir di bawah ini atau menggunakan informasi kontak yang tersedia.</p>
                          
                          <div class="space-y-4 mb-8">
                              <div class="flex items-start">
                                  <div class="flex-shrink-0 mt-1">
                                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                      </svg>
                                  </div>
                                  <div class="ml-3">
                                      <h3 class="text-lg font-medium">Alamat</h3>
                                      <p class="text-gray-600">Jl. Contoh No. 123, Jakarta, Indonesia</p>
                                  </div>
                              </div>
                              
                              <div class="flex items-start">
                                  <div class="flex-shrink-0 mt-1">
                                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                      </svg>
                                  </div>
                                  <div class="ml-3">
                                      <h3 class="text-lg font-medium">Email</h3>
                                      <p class="text-gray-600">info@mahakaryamandiri.com</p>
                                  </div>
                              </div>
                              
                              <div class="flex items-start">
                                  <div class="flex-shrink-0 mt-1">
                                      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                      </svg>
                                  </div>
                                  <div class="ml-3">
                                      <h3 class="text-lg font-medium">Telepon</h3>
                                      <p class="text-gray-600">(021) 1234-5678</p>
                                  </div>
                              </div>
                          </div>
                          
                          <div class="bg-gray-50 p-6 rounded-lg">
                              <h3 class="text-lg font-medium mb-4">Jam Operasional</h3>
                              <div class="space-y-2">
                                  <div class="flex justify-between">
                                      <span>Senin - Jumat</span>
                                      <span>09:00 - 17:00</span>
                                  </div>
                                  <div class="flex justify-between">
                                      <span>Sabtu</span>
                                      <span>09:00 - 14:00</span>
                                  </div>
                                  <div class="flex justify-between">
                                      <span>Minggu</span>
                                      <span>Tutup</span>
                                  </div>
                              </div>
                          </div>
                      </div>
                      
                      <div class="md:w-1/2">
                          <div class="bg-gray-50 p-6 rounded-lg">
                              <h2 class="text-2xl font-bold mb-6">Kirim Pesan</h2>
                              
                              @if(session('success'))
                                  <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
                                      <span class="block sm:inline">{{ session('success') }}</span>
                                  </div>
                              @endif
                              
                              <form action="{{ route('contact.store') }}" method="POST">
                                  @csrf
                                  <div class="mb-4">
                                      <label for="name" class="block text-gray-700 font-medium mb-2">Nama</label>
                                      <input type="text" name="name" id="name" value="{{ old('name') }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent" required>
                                      @error('name')
                                          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                      @enderror
                                  </div>
                                  
                                  <div class="mb-4">
                                      <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                                      <input type="email" name="email" id="email" value="{{ old('email') }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent" required>
                                      @error('email')
                                          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                      @enderror
                                  </div>
                                  
                                  <div class="mb-4">
                                      <label for="phone" class="block text-gray-700 font-medium mb-2">Telepon (Opsional)</label>
                                      <input type="text" name="phone" id="phone" value="{{ old('phone') }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent">
                                      @error('phone')
                                          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                      @enderror
                                  </div>
                                  
                                  <div class="mb-4">
                                      <label for="subject" class="block text-gray-700 font-medium mb-2">Subjek</label>
                                      <input type="text" name="subject" id="subject" value="{{ old('subject') }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent" required>
                                      @error('subject')
                                          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                      @enderror
                                  </div>
                                  
                                  <div class="mb-6">
                                      <label for="message" class="block text-gray-700 font-medium mb-2">Pesan</label>
                                      <textarea name="message" id="message" rows="5" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent" required>{{ old('message') }}</textarea>
                                      @error('message')
                                          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                      @enderror
                                  </div>
                                  
                                  <button type="submit" class="w-full bg-gray-900 text-white hover:bg-gray-800 px-6 py-3 rounded-md font-medium transition duration-300">Kirim Pesan</button>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>