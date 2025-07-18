@extends('Layout.layout')
<script src="https://cdn.tailwindcss.com"></script>
@section('class_uses')

<!-- Fancybox Css -->
<link rel="stylesheet" href="{{ asset('assets/css/fancybox.css') }}" />

@endsection

@section('content')
<div>
    <div class="flex flex-col gap-5 min-h-[calc(100vh-188px)] sm:min-h-[calc(100vh-204px)]">
        <div class="grid grid-cols-1">
            <div>
                <ul class="flex flex-wrap items-center text-sm font-semibold space-x-2.5">
                    <li
                        class="flex items-center space-x-2.5 text-gray hover:text-dark dark:hover:text-white duration-300">
                        <a href="javaScript:;">Book's Section</a>
                        <svg class="text-gray/50" width="8" height="10" viewBox="0 0 8 10" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path opacity="0.5"
                                d="M1.33644 0H4.19579C4.60351 0 5.11318 0.264045 5.32903 0.589888L7.83532 4.3427C8.07516 4.70787 8.05119 5.2809 7.77538 5.6236L4.66949 9.5C4.44764 9.77528 3.96795 10 3.6022 10H1.33644C0.287156 10 -0.348385 8.92135 0.203241 8.08427L1.86409 5.59551C2.08594 5.26405 2.08594 4.72472 1.86409 4.39326L0.203241 1.90449C-0.348385 1.07865 0.293152 0 1.33644 0Z"
                                fill="currentColor" />
                        </svg>
                    </li>
                    <li>All Users</li>
                </ul>
            </div>
        </div>

        <!-- Container -->
        <div class="container mx-auto py-8">
            <!-- <h1 class="text-4xl font-bold text-center mb-10">Books Store</h1> -->

            <!-- Books Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-2">
                @foreach ($users as $key => $user)
                    <!-- Book Card -->
                    <div class="flex flex-col items-center pb-10">
                        <!-- style="height: 320px;" -->
                        <div class="relative overflow-hidden h-80">
                            <img src="https://ui-avatars.com/api/?name=User+{{$key}}" alt="Avatar"
                                class="w-24 h-24 mb-2 5 rounded-full shadow-lg">
                        </div>
                        <div class="p-4">
                            <h3 class="text-lg font-bold truncate items-center text-center">
                                {{$user->name}}
                            </h3>
                            <p class="text-gray-500 text-sm mb-2 items-center text-center">

                            </p>
                            <div class="mt-3 flex gap-8 items-center justify-center" style="background-color: black;">
                                <form action="{{ route('messenger', ['userId' => $user->id]) }}" method="GET">
                                    @csrf
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                                        Message
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                @endforeach
                <!-- Add more books in a similar structure -->
            </div>


        </div>

    </div>
</div>
@endsection
@section('script')

<!-- Facncybox Js -->
<script src="{{ asset('public/assets/js/fancybox.umd.js') }}"></script>

<script>
    Fancybox.bind('[data-fancybox="gallery"]', {
    });   
</script>

@endsection