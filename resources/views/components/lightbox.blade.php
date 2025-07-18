@extends('Layout.layout')
<script src="https://cdn.tailwindcss.com"></script>
@section('class_uses')

<!-- Fancybox Css -->
<link rel="stylesheet" href="{{ asset('assets/css/fancybox.css') }}" />

@endsection

@section('content')

<div class="flex flex-col gap-5 min-h-[calc(100vh-188px)] sm:min-h-[calc(100vh-204px)]">
    <div class="grid grid-cols-1">
        <div>
            <ul class="flex flex-wrap items-center text-sm font-semibold space-x-2.5">
                <li class="flex items-center space-x-2.5 text-gray hover:text-dark dark:hover:text-white duration-300">
                    <a href="javaScript:;">Components</a>
                    <svg class="text-gray/50" width="8" height="10" viewBox="0 0 8 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.5" d="M1.33644 0H4.19579C4.60351 0 5.11318 0.264045 5.32903 0.589888L7.83532 4.3427C8.07516 4.70787 8.05119 5.2809 7.77538 5.6236L4.66949 9.5C4.44764 9.77528 3.96795 10 3.6022 10H1.33644C0.287156 10 -0.348385 8.92135 0.203241 8.08427L1.86409 5.59551C2.08594 5.26405 2.08594 4.72472 1.86409 4.39326L0.203241 1.90449C-0.348385 1.07865 0.293152 0 1.33644 0Z" fill="currentColor" />
                    </svg>
                </li>
                <li>Modals</li>
            </ul>
        </div>
    </div>
    <!-- <div class="grid grid-cols-1 gap-5">
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Image Lightbox</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5">
                <a href="{{ asset('assets/images/images-1.jpg') }}" data-fancybox="gallery">
                    <img src="{{ asset('assets/images/images-1.jpg') }}" class="rounded-xl" />
                </a>
                <a href="{{ asset('assets/images/images-2.jpg') }}" data-fancybox="gallery">
                    <img src="{{ asset('assets/images/images-2.jpg') }}" class="rounded-xl" />
                </a>
                <a href="{{ asset('assets/images/images-3.jpg') }}" data-fancybox="gallery">
                    <img src="{{ asset('assets/images/images-3.jpg') }}" class="rounded-xl" />
                </a>
                <a href="{{ asset('assets/images/images-4.jpg') }}" data-fancybox="gallery">
                    <img src="{{ asset('assets/images/images-4.jpg') }}" class="rounded-xl" />
                </a>
                <a href="{{ asset('assets/images/images-6.jpg') }}" data-fancybox="gallery">
                    <img src="{{ asset('assets/images/images-6.jpg') }}" class="rounded-xl" />
                </a>
                <a href="{{ asset('assets/images/images-7.jpg') }}" data-fancybox="gallery">
                    <img src="{{ asset('assets/images/images-7.jpg') }}" class="rounded-xl" />
                </a>
            </div>
        </div>
    </div> -->

    <!-- Container -->
  <div class="container mx-auto py-8">
    <!-- <h1 class="text-4xl font-bold text-center mb-10">Books Store</h1> -->

    <!-- Books Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-2">
      <!-- Book Card -->
      <div class="relative group bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
        <div class="relative overflow-hidden h-80">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcStF9nhfLdhUXYKXd2VXObtQrdDa8ahnwNkAA&s" alt="Book Image" class="object-cover w-full h-full transition-transform duration-500 transform group-hover:scale-105">
          <!--<button onclick="openModal('Book Title 1', 'This is a detailed description of Book Title 1.')" 
                  class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity">
            <span class="text-white text-xl font-semibold">View Details</span>
          </button>-->
        </div>
        <div class="p-4">
          <h3 class="text-lg font-bold truncate">Book Title 1</h3>
          <p class="text-gray-500 text-sm mb-2">Author Name</p>
          <!--<p class="text-gray-900 font-semibold">$19.99</p>-->
          <div class="mt-3">
            <button class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 transition">Read Online</button>
            <button class="ml-2 px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 transition">Download</button>
          </div>
        </div>
      </div>

      <!-- Repeat for other books -->
      <div class="relative group bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
        <div class="relative overflow-hidden h-80">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRCPrym1nBOUfnwnMCnAq8fkYTMdwANP93vE1DNc6CSTbMHyz0O598y5v4I7hPR8fU1l2Y&usqp=CAU" alt="Book Image" class="object-cover w-full h-full transition-transform duration-500 transform group-hover:scale-105">
          <!--<button onclick="openModal('Book Title 2', 'This is a detailed description of Book Title 2.')" 
                  class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity">
            <span class="text-white text-xl font-semibold">View Details</span>-->
          </button>
        </div>
        <div class="p-4">
          <h3 class="text-lg font-bold truncate">Book Title 2</h3>
          <p class="text-gray-500 text-sm mb-2">Author Name</p>
          <!--<p class="text-gray-900 font-semibold">$15.99</p>-->
          <div class="mt-3">
            <button class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 transition">Read Online</button>
            <button class="ml-2 px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 transition">Download</button>
          </div>
        </div>
      </div>

      <!-- Repeat for other books -->
      <div class="relative group bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
        <div class="relative overflow-hidden h-80">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTfDDQy7YiReV0BMrk2UwyDM5xoXRmJsBXfojl8c8QPvlK-h16pDPhnZwqItQkyNlNXYfM&usqp=CAU" alt="Book Image" class="object-cover w-full h-full transition-transform duration-500 transform group-hover:scale-105">
         <!--<button onclick="openModal('Book Title 2', 'This is a detailed description of Book Title 2.')" 
                  class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity">
            <span class="text-white text-xl font-semibold">View Details</span>--> 
          </button>
        </div>
        <div class="p-4">
          <h3 class="text-lg font-bold truncate">Premade</h3>
          <p class="text-gray-500 text-sm mb-2">Author Name</p>
          <!--<p class="text-gray-900 font-semibold">$15.99</p>-->
          <div class="mt-3">
            <button class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 transition">Read Online</button>
            <button class="ml-2 px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 transition">Download</button>
          </div>
        </div>
      </div>


      <!-- Repeat for other books -->
      <div class="relative group bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
        <div class="relative overflow-hidden h-80">
          <img src="https://lh4.googleusercontent.com/proxy/mjvsOosU4UO0yxW7FcCqm7CC9FeLSQnp5qLkU_0HqH65LeNf8oE8IEf86Kz9fmWbBHz4CV6uMQ5lTKMsBQANU2_eaIN-PXZyEOmeq0MEtz6ZIJXaVsE-" alt="Book Image" class="object-cover w-full h-full transition-transform duration-500 transform group-hover:scale-105">
          <!--<button onclick="openModal('Book Title 2', 'This is a detailed description of Book Title 2.')" 
                  class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity">
            <span class="text-white text-xl font-semibold">View Details</span>-->
          </button>
        </div>
        <div class="p-4">
          <h3 class="text-lg font-bold truncate">Book Title 2</h3>
          <p class="text-gray-500 text-sm mb-2">Author Name</p>
          <!--<p class="text-gray-900 font-semibold">$15.99</p>-->
          <div class="mt-3">
            <button class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 transition">Read Online</button>
            <button class="ml-2 px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 transition">Download</button>
          </div>
        </div>
      </div>

      <!-- Repeat for other books -->
      <div class="relative group bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
        <div class="relative overflow-hidden h-80">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ-dSwWTyJp4wMnP3hszhQ-PyXixzcWnOHTZ3srUTZxptemvareXkFgFyh0gbOImonHLeo&usqp=CAU" alt="Book Image" class="object-cover w-full h-full transition-transform duration-500 transform group-hover:scale-105">
          <!--<button onclick="openModal('Book Title 2', 'This is a detailed description of Book Title 2.')" 
                  class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity">
            <span class="text-white text-xl font-semibold">View Details</span>-->
          </button>
        </div>
        <div class="p-4">
          <h3 class="text-lg font-bold truncate">Book Title 2</h3>
          <p class="text-gray-500 text-sm mb-2">Author Name</p>
          <!--<p class="text-gray-900 font-semibold">$15.99</p>-->
          <div class="mt-3">
            <button class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 transition">Read Online</button>
            <button class="ml-2 px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 transition">Download</button>
          </div>
        </div>
      </div>


      

      <!-- Add more books in a similar structure -->
    </div>
  </div>
</div>

@endsection
@section('script')

    <!-- Facncybox Js -->
    <script src="{{ asset('assets/js/fancybox.umd.js') }}"></script>

    <script>
        Fancybox.bind('[data-fancybox="gallery"]', {
        });   
    </script>

@endsection