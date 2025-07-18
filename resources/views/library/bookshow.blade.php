@extends('Layout.layout')
<script src="https://cdn.tailwindcss.com"></script>
@section('class_uses')

<!-- Fancybox Css -->
<link rel="stylesheet" href="{{ asset('assets/css/fancybox.css') }}" />
<style>
    .filter-btn {
    padding: 8px 16px;
    border: 1px solid #ddd;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
}
.filter-btn.active, .filter-btn:hover {
    background-color: #1c274c;
    color: white;
}
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: scale(0.95);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}

@keyframes fadeOut {
    from {
        opacity: 1;
        transform: scale(1);
    }
    to {
        opacity: 0;
        transform: scale(0.95);
    }
}

.fade-in {
    animation: fadeIn 0.3s ease-in-out;
}

.fade-out {
    animation: fadeOut 0.3s ease-in-out;
}


</style>
@endsection

@section('content')

<div class="flex flex-col gap-5 min-h-[calc(100vh-188px)] sm:min-h-[calc(100vh-204px)]">
    <div class="grid grid-cols-1">
        <div>
            <ul class="flex flex-wrap items-center text-sm font-semibold space-x-2.5">
                <li class="flex items-center space-x-2.5 text-gray hover:text-dark dark:hover:text-white duration-300">
                    <a href="javaScript:;">Book's Section</a>
                    <svg class="text-gray/50" width="8" height="10" viewBox="0 0 8 10" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.5"
                            d="M1.33644 0H4.19579C4.60351 0 5.11318 0.264045 5.32903 0.589888L7.83532 4.3427C8.07516 4.70787 8.05119 5.2809 7.77538 5.6236L4.66949 9.5C4.44764 9.77528 3.96795 10 3.6022 10H1.33644C0.287156 10 -0.348385 8.92135 0.203241 8.08427L1.86409 5.59551C2.08594 5.26405 2.08594 4.72472 1.86409 4.39326L0.203241 1.90449C-0.348385 1.07865 0.293152 0 1.33644 0Z"
                            fill="currentColor" />
                    </svg>
                </li>
                <li>All Books</li>
            </ul>
        </div>
    </div>

    <!-- Container -->
    <div class="container mx-auto py-8">
        <!-- <h1 class="text-4xl font-bold text-center mb-10">Books Store</h1> -->
        <div class="flex flex-col items-center gap-4 mb-6">
    <!-- Toggle Options -->
    <div class="flex gap-4">
        <button id="program-filter-btn" class="toggle-btn active px-6 py-2 bg-blue-600 text-white rounded-full hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 ease-in-out">
            Program-wise
        </button>
        <button id="subject-filter-btn" class="toggle-btn px-6 py-2 bg-gray-200 text-gray-800 rounded-full hover:bg-blue-600 hover:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 ease-in-out">
            Subject-wise
        </button>
    </div>

    <!-- Filter Buttons -->
    <div id="filter-buttons" class="flex gap-4">
    <button class="filter-btn active px-6 py-2 bg-blue-600 text-white rounded-full hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 ease-in-out" data-filter="all">All</button>
    <button class="filter-btn px-6 py-2 bg-gray-200 text-gray-800 rounded-full hover:bg-blue-600 hover:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 ease-in-out" data-filter="1">MBBS</button>
    <button class="filter-btn px-6 py-2 bg-gray-200 text-gray-800 rounded-full hover:bg-blue-600 hover:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 ease-in-out" data-filter="8">BDS</button>
    </div>
</div>

        <!-- Books Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-2">
            @foreach($booksdata as $books)
                <!-- Book Card -->
                <div data-category="{{ $books['bookcat'] }}" data-program="{{ $books['program'] }}"
                    class="book-card relative group bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <div class="relative overflow-hidden h-80" style="height: 320px;">
                        <img src="{{ env("APP_URL") }}/public/books/{{ str_replace(' ', '_', strtolower($books['bookname'])) }}/{{ $books['cover_image'] }}"
                            class="object-cover w-full h-full transition-transform duration-500 transform group-hover:scale-105">
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-bold truncate items-center text-center">
                            {{ $books['bookname'] }}
                        </h3>
                        <p class="text-gray-500 text-sm mb-2 items-center text-center">
                            {{ $books['bookauthor'] }}
                        </p>
                        <div class="mt-3 flex gap-8 items-center justify-center">
                            <a href="{{ route('bookread', ['id' => $books['id']]) }}">

                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9 4.45962C9.91153 4.16968 10.9104 4 12 4C16.1819 4 19.028 6.49956 20.7251 8.70433C21.575 9.80853 22 10.3606 22 12C22 13.6394 21.575 14.1915 20.7251 15.2957C19.028 17.5004 16.1819 20 12 20C7.81811 20 4.97196 17.5004 3.27489 15.2957C2.42496 14.1915 2 13.6394 2 12C2 10.3606 2.42496 9.80853 3.27489 8.70433C3.75612 8.07914 4.32973 7.43025 5 6.82137"
                                        stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
                                    <path
                                        d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z"
                                        stroke="#1C274C" stroke-width="1.5" />
                                </svg>

                            </a>
                           
                        </div>
                    </div>
                </div>
            @endforeach
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
<script>
     document.addEventListener('DOMContentLoaded', () => {
        const filterButtons = document.querySelectorAll('.filter-btn');
        const bookCards = document.querySelectorAll('.book-card');

        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                const filter = button.getAttribute('data-filter');

                // Update button styles (active/inactive)
                filterButtons.forEach(btn => {
                    btn.classList.remove('active', 'bg-blue-600', 'text-white');
                    btn.classList.add('bg-gray-200', 'text-gray-800');
                });
                button.classList.add('active', 'bg-blue-600', 'text-white');
                button.classList.remove('bg-gray-200', 'text-gray-800');

                // Add filtering logic with animation
                bookCards.forEach(card => {
                    const category = card.getAttribute('data-category');
                    const program = card.getAttribute('data-program');

                    if (filter === 'all' || category === filter || program === filter) {
                            card.style.display = 'block'; // Show the card
                            card.classList.add('fade-in'); // Add animation class
                            card.classList.remove('fade-out');
                    } else {
                            card.classList.add('fade-out'); // Add fade-out animation
                            card.classList.remove('fade-in');
                            card.style.display = 'none'; // Hide after animation
                    }
                });
            });
        });
    });



    document.addEventListener('DOMContentLoaded', () => {
        const filterButtons = document.querySelectorAll('.filter-btn');

        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Remove active class from all buttons
                filterButtons.forEach(btn => {
                    btn.classList.remove('active', 'bg-blue-600', 'text-white');
                    btn.classList.add('bg-gray-200', 'text-gray-800');
                });

                // Add active class to the clicked button
                button.classList.add('active', 'bg-blue-600', 'text-white');
                button.classList.remove('bg-gray-200', 'text-gray-800');
            });
        });
    });




    document.addEventListener('DOMContentLoaded', () => {
    const programFilterBtn = document.getElementById('program-filter-btn');
    const subjectFilterBtn = document.getElementById('subject-filter-btn');
    const filterButtonsContainer = document.getElementById('filter-buttons');
    const booksContainer = document.getElementById('books-container');
    const bookCards = document.querySelectorAll('.book-card');
    const categorysdata = @json($categorysdata); 
    // Button HTML templates
    const programButtons = `
        <button class="filter-btn active px-6 py-2 bg-blue-600 text-white rounded-full hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 ease-in-out" data-filter="all">All</button>
        <button class="filter-btn px-6 py-2 bg-gray-200 text-gray-800 rounded-full hover:bg-blue-600 hover:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 ease-in-out" data-filter="1">MBBS</button>
        <button class="filter-btn px-6 py-2 bg-gray-200 text-gray-800 rounded-full hover:bg-blue-600 hover:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 ease-in-out" data-filter="8">BDS</button>
    `;

     // Dynamically generate subject buttons based on categorysdata
     let subjectButtons = `
        <button class="filter-btn active px-6 py-2 bg-blue-600 text-white rounded-full hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 ease-in-out" data-filter="all">All</button>
    `;

    categorysdata.forEach(category => {
        subjectButtons += `
            <button class="filter-btn px-6 py-2 bg-gray-200 text-gray-800 rounded-full hover:bg-blue-600 hover:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300 ease-in-out" data-filter="${category.id}">${category.catname}</button>
        `;
    });

    // Handle filter type toggle
    programFilterBtn.addEventListener('click', () => {
        programFilterBtn.classList.add('active', 'bg-blue-600', 'text-white');
        programFilterBtn.classList.remove('bg-gray-200', 'text-gray-800');
        subjectFilterBtn.classList.remove('active', 'bg-blue-600', 'text-white');
        subjectFilterBtn.classList.add('bg-gray-200', 'text-gray-800');
        

        filterButtonsContainer.innerHTML = programButtons; // Replace with program buttons
        attachFilterButtonListeners(); // Reattach listeners for new buttons
    });

    subjectFilterBtn.addEventListener('click', () => {
        subjectFilterBtn.classList.add('active', 'bg-blue-600', 'text-white');
        subjectFilterBtn.classList.remove('bg-gray-200', 'text-gray-800');
        programFilterBtn.classList.remove('active', 'bg-blue-600', 'text-white');
        programFilterBtn.classList.add('bg-gray-200', 'text-gray-800');

        filterButtonsContainer.innerHTML = subjectButtons; // Replace with subject buttons
        attachFilterButtonListeners(); // Reattach listeners for new buttons
    });

    // Function to attach listeners to filter buttons
    function attachFilterButtonListeners() {
        const filterBtns = filterButtonsContainer.querySelectorAll('.filter-btn');
        filterBtns.forEach(btn => {
            btn.addEventListener('click', (event) => {
                const filter = event.target.getAttribute('data-filter');

                // Update button styles (active/inactive)
                filterBtns.forEach(btn => btn.classList.remove('active', 'bg-blue-600', 'text-white'));
                event.target.classList.add('active', 'bg-blue-600', 'text-white');

                // Filter books
                bookCards.forEach(card => {
                    const category = card.getAttribute('data-category');
                    const program = card.getAttribute('data-program');
                    if (filter === 'all' || category === filter || program === filter) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    }

    // Initial listener attachment
    attachFilterButtonListeners();
});


</script>
@endsection