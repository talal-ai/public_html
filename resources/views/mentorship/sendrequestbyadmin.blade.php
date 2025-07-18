@extends('Layout.layout')
@section('style')
    <style>
        .side-menu {
            display: none;
        }

        .show-menu {
            display: block;
        }

        .hide-menu {
            display: none;
        }
    </style>
@endsection
@section('content')

    <div class="flex flex-col gap-5 min-h-[calc(100vh-188px)] sm:min-h-[calc(100vh-204px)]">
        <div class="grid grid-cols-1 gap-4 flex-1" x-data="email">
            <div class="flex gap-5 items-stretch relative overflow-hidden" x-data="{activeTab:'profile'}">
                <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 rounded-lg p-5 absolute w-[240px] z-20 flex-none -left-[410px] xl:static overflow-hidden overflow-y-auto h-[calc(100vh-188px)] sm:h-[calc(100vh-204px)]"
                    :class="isShowChatMenu && '!left-0'">
                    <div class="flex flex-col space-y-5">
                        <!-- Main Menu -->
                        <div id="layer1" class="side-menu show-menu p-1 bg-white shadow-lg rounded-lg w-64">
                            <button id="teachersBtn" class="w-full text-left py-2 px-4 rounded-lg mb-2"
                                data-userid="{{ $user->id }}"
                                style="margin-top: 10px; color: #5B6484;background-color: #E7E9EF;"><span>Teacher's</span></button>
                           
                            <div id="programButtonsContainer">
                                <!-- Programs will be loaded here -->
                            </div>
                        </div>

                        <!-- Layer 2 - About Us Submenu -->
                        <div id="layer2" class="side-menu p-1 bg-white shadow-lg rounded-lg w-64"
                            style="margin-top: 0 !important;">
                            <button id="backBtn" class="w-full text-left py-2 px-4 rounded-lg mb-2"
                                style="margin-top: 10px; color: #5B6484;background-color: #E7E9EF;">
                                <span>Back</span>
                            </button>
                            <!-- Container for dynamic buttons -->
                            <div id="programButtonsContainer1">
                                <!-- Dynamic buttons will be added here -->
                            </div>
                        </div>

                        <!-- Layer 3 - Get Involved Submenu -->
                        <div id="layer4" class="side-menu p-1 bg-white shadow-lg rounded-lg w-64"
                            style="margin-top: 0 !important;">
                            <button class="w-full flex items-center gap-2 text-left py-2 px-4 rounded-lg mb-2"
                                onclick="goBack(1)" style="margin-top: 10px; color: #5B6484;background-color: #E7E9EF;">

                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.5"
                                        d="M20 12.75C20.4142 12.75 20.75 12.4142 20.75 12C20.75 11.5858 20.4142 11.25 20 11.25V12.75ZM20 11.25H4V12.75H20V11.25Z"
                                        fill="#1C274C" />
                                    <path d="M10 6L4 12L10 18" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>

                                <span>Back</span>
                            </button>
                            <!-- <h2 class="text-lg font-semibold mb-4">Get Involved</h2> -->
                            <button class="w-full text-left py-2 px-4 rounded-lg mb-2"
                                style="margin-top: 10px; color: #5B6484;background-color: #E7E9EF;">Donate</button>
                            <button class="w-full text-left py-2 px-4 rounded-lg mb-2"
                                style="margin-top: 10px; color: #5B6484;background-color: #E7E9EF;">Partnerships</button>
                            <button class="w-full text-left py-2 px-4 rounded-lg mb-2"
                                style="margin-top: 10px; color: #5B6484;background-color: #E7E9EF;">Share this
                                Site</button>
                        </div>
                        <!-- Layer 3 - Get Involved Submenu -->
                        <div id="layer5" class="side-menu p-1 bg-white shadow-lg rounded-lg w-64"
                            style="margin-top: 0 !important;">
                            <button class="w-full flex items-center gap-2 text-left py-2 px-4 rounded-lg mb-2"
                                onclick="goBack(1)" style="margin-top: 10px; color: #5B6484;background-color: #E7E9EF;">

                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.5"
                                        d="M20 12.75C20.4142 12.75 20.75 12.4142 20.75 12C20.75 11.5858 20.4142 11.25 20 11.25V12.75ZM20 11.25H4V12.75H20V11.25Z"
                                        fill="#1C274C" />
                                    <path d="M10 6L4 12L10 18" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>

                                <span>Back</span>
                            </button>
                        </div>
                    </div>

                </div>
                <div class="bg-transparent lg:hidden z-[5] w-full h-full absolute hidden" :class="isShowChatMenu && '!block xl:!hidden'" @click="isShowChatMenu = !isShowChatMenu"></div>
                <div x-show="activeTab === 'profile'" class="flex flex-row items-start gap-4 relative w-full">
                    <div
                        class="w-full flex flex-col flex-1 rounded-lg overflow-y-auto h-[calc(100vh-188px)] sm:h-[calc(100vh-204px)]">
                        <div class="flex items-center gap-5">
                            <button type="button" class="xl:hidden hover:text-primary duration-300"
                                @click="isShowChatMenu = !isShowChatMenu">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.3" x="3" y="17.2" width="18" height="1.6" rx="0.8" fill="currentColor">
                                    </rect>
                                    <rect opacity="0.5" x="3" y="11.6" width="18" height="1.6" rx="0.8" fill="currentColor">
                                    </rect>
                                    <rect x="3" y="6" width="18" height="1.6" rx="0.8" fill="currentColor"></rect>
                                </svg>
                            </button>
                        </div>
                        <div class="mt-[30px]">
                            <div class="flex flex-row items-center justify-center gap-4 relative w-full">
                                <div id="contentshow"
                                    class="w-full flex flex-col items-center justify-center rounded-lg overflow-y-auto h-[calc(100vh-188px)] sm:h-[calc(100vh-204px)]">
                                    <div class="flex items-center justify-center gap-5">
                                        <img src="{{ asset('public/assets/images/selectoption.png') }}" alt=""
                                            style="width: 450px; opacity: 0.3;">
                                    </div>
                                    <h3 style="opacity: 0.3;">Select an option</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')

    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("email", () => ({
                isShowChatMenu: false,
                selectMail: false,
            }));
        });

        // Load programs automatically when page loads
        document.addEventListener('DOMContentLoaded', function() {
            var userId = document.getElementById('teachersBtn').getAttribute('data-userid');
           // var baseUrl = '{{ env("APP_URL") }}/mentorship';
             var baseUrl = window.location.origin + '/mentorship';
            
            if (userId) {
                fetch(`${baseUrl}/get-programs/${userId}`)
                    .then(response => response.json())
                    .then(data => {
                        console.log(data);
                        const programListDiv = document.getElementById('programButtonsContainer');
                        programListDiv.innerHTML = ''; // Clear existing content

                        data.programs.forEach(program => {
                            const button = document.createElement('button');
                            button.className = 'w-full flex items-center justify-between text-left py-2 px-4 rounded-lg mb-2';
                            button.style = "color: #5B6484; background-color: #E7E9EF; margin-top: 10px;";
                            button.value = program.program_id;
                            button.innerHTML = `<span>${program.program_details.name}</span>`;
                            button.id = `program-button-${program.program_id}`;
                            button.onclick = () => fetchYearsForProgram(program.program_id);

                            programListDiv.appendChild(button);
                        });
                    })
                    .catch(error => console.error('Error fetching programs:', error));
            }
        });

        // Event listener for the "Specific Year" button

        document.getElementById('teachersBtn').addEventListener('click', function () {
            var userId = this.getAttribute('data-userid');
           // var baseUrl = '{{ env("APP_URL") }}/mentorship'; // Get the base URL dynamically
             var baseUrl = window.location.origin + '/mentorship';
            console.log(userId);
            if (userId) {
                console.log('another' + userId);
                fetch(`${baseUrl}/get-programs/${userId}`)
                    .then(response => response.json())
                    .then(data => {
                        console.log(data);
                        const programListDiv = document.getElementById('programButtonsContainer1');
                        programListDiv.innerHTML = ''; // Clear existing content

                        data.programs.forEach(program => {
                            const button = document.createElement('button');
                            button.className = 'w-full flex items-center justify-between text-left py-2 px-4 rounded-lg mb-2';
                            button.style = "color: #5B6484; background-color: #E7E9EF; margin-top: 10px;";
                            button.value = program.program_id; // Use program_id for the button value
                            button.innerHTML = `<span>${program.program_details.name}</span> <!-- Access program_details.name -->
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.5" d="M4 11.25C3.58579 11.25 3.25 11.5858 3.25 12C3.25 12.4142 3.58579 12.75 4 12.75V11.25ZM4 12.75H20V11.25H4V12.75Z" fill="#1C274C"/>
                                <path d="M14 6L20 12L14 18" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>`;

                            button.onclick = () => fetchYearsForProgram(program.program_id); // Use program_id in the click handler

                            programListDiv.appendChild(button);
                        });

                        // document.getElementById('layer1').style.display = 'none';
                        // document.getElementById('layer2').style.display = 'block';
                    })
                    .catch(error => console.error('Error fetching programs:', error));
            } else {
                // Clear the year checkbox list if no program is selected
                //-left- document.getElementById('yearcheckboxList').innerHTML = '';
            }
        });

        function fetchYearsForProgram(program_id) {
            console.log("Program ID received:", program_id);
            //var baseUrl = '{{ env("APP_URL") }}/mentorship'; // Get the base URL dynamically
            var baseUrl = window.location.origin + '/mentorship';
            const contentShowDiv = document.getElementById('contentshow');

            // Create and show the loader
            const loaderDiv = document.createElement('div');
            loaderDiv.className = 'flex items-center justify-center h-full';
            loaderDiv.innerHTML = `<div class="loader" style="border: 4px solid #f3f3f3; border-top: 4px solid #3498db; border-radius: 50%; width: 40px; height: 40px; animation: spin 2s linear infinite;"></div>`;
            contentShowDiv.innerHTML = ''; // Clear existing content
            contentShowDiv.appendChild(loaderDiv); // Add loader to the contentShowDiv

            fetch(`${baseUrl}/get-years/${program_id}`)
                .then(response => response.json())
                .then(data => {
                    console.log(data);

                    // Remove the loader
                    contentShowDiv.innerHTML = ''; // Clear loader

                    // Loop through each year in the fetched data
                    data.years.forEach(year => {
                        // Create a div for each year with specified styles
                        const yearDiv = document.createElement('div');
                        yearDiv.className = 'flex items-center justify-between p-4 rounded-lg shadow-md mb-3';
                        yearDiv.style.margin = '10px';
                        yearDiv.style.backgroundColor = 'aliceblue';
                        yearDiv.classList.add('w-full', 'max-w-lg');

                        // Left part: year name and description
                        const leftDiv = document.createElement('div');
                        leftDiv.className = 'flex flex-col';

                        const yearName = document.createElement('h3');
                        yearName.textContent = year.name;
                        yearName.className = 'text-lg font-bold';

                        const yearDescription = document.createElement('p');
                        yearDescription.textContent = year.description;
                        yearDescription.className = 'text-sm text-gray-600';

                        leftDiv.appendChild(yearName);
                        leftDiv.appendChild(yearDescription);

                        // Right part: button with year ID
                        const button = document.createElement('button');
                        button.className = 'px-4 py-2 rounded';
                        button.style.color = 'black'; // Set text color to black
                        button.style.backgroundColor = 'revert'; // Reset background color
                        button.textContent = 'Send';
                        button.id = `data-yearid-${year.id}`; // Assign year ID to button

                        // Add click handler for notification
                        button.addEventListener('click', function () {
                            const yearId = year.id;
                            var baseUrl = '{{ env("APP_URL") }}/mentorship'; // Get the base URL dynamically
                            console.log('Sending notification for year:', yearId);

                            // Get CSRF token
                            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                            // Send notification request with the correct URL format
                            const notificationUrl = `${baseUrl}/notifications/send/${yearId}`;
                            console.log('Notification URL:', notificationUrl);

                            fetch(notificationUrl, {
                                method: 'GET',
                                headers: {
                                    'Accept': 'application/json',
                                    'X-CSRF-TOKEN': token
                                },
                                credentials: 'same-origin' // Include cookies
                            })
                                .then(response => {
                                    console.log('Response status:', response.status);
                                    return response.json();
                                })
                                .then(data => {
                                    console.log('Response data:', data);
                                    showToast(data.message, data.type || (data.success ? 'success' : 'error'));
                                })
                                .catch(error => {
                                    console.error('Detailed error:', error);
                                    showToast('Error sending notification. Check console for details.', 'error');
                                });
                        });

                        // Append left and right parts to the yearDiv
                        yearDiv.appendChild(leftDiv);
                        yearDiv.appendChild(button);

                        // Append yearDiv to contentshow
                        contentShowDiv.appendChild(yearDiv);
                    });
                })
                .catch(error => {
                    console.error('Error fetching years:', error);
                    // Remove the loader and show an error message if necessary
                    contentShowDiv.innerHTML = 'Error fetching years, please try again later.';
                });
        }

        // CSS for loader animation
        const style = document.createElement('style');
        style.innerHTML = `
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        `;
        document.head.appendChild(style);

        // Event listener for the Teachers button
        document.getElementById('teachersBtn').addEventListener('click', function () {
            var userId = this.getAttribute('data-userid');
            fetchTeachersList();
        });

        function fetchTeachersList() {
            const contentShowDiv = document.getElementById('contentshow');
            contentShowDiv.innerHTML = '<div class="loader"></div>'; // Show loading animation

            fetch('/mentorship/get-teachers-list')
                .then(response => response.json())
                .then(data => {
                    let html = '<div class="overflow-y-auto max-h-[calc(100vh-300px)] p-4">';
                    html += '<div class="grid grid-cols-1 gap-4">';
                    data.forEach(teacher => {
                        html += `
                            <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 rounded-lg p-4">
                                <div class="flex items-center justify-between">
                                    <div class="flex-1">
                                        <div class="flex items-center gap-2">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 12C14.7614 12 17 9.76142 17 7C17 4.23858 14.7614 2 12 2C9.23858 2 7 4.23858 7 7C7 9.76142 9.23858 12 12 12Z" stroke="#5B6484" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M20.5899 22C20.5899 18.13 16.7399 15 11.9999 15C7.25991 15 3.40991 18.13 3.40991 22" stroke="#5B6484" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                            <span class="text-lg font-semibold text-[#5B6484]">${teacher.name}</span>
                                        </div>
                                        <p class="text-gray-600 ml-8">${teacher.email}</p>
                                    </div>
                                    <button onclick="sendTeacherRequest(${teacher.id})" 
                                        class="flex items-center gap-2 bg-[#E7E9EF] hover:bg-[#DDE0E8] text-[#5B6484] px-4 py-2 rounded-lg transition-colors">
                                        <span>Send Request</span>
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M14 6L20 12L14 18" stroke="#5B6484" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path opacity="0.5" d="M4 11.25C3.58579 11.25 3.25 11.5858 3.25 12C3.25 12.4142 3.58579 12.75 4 12.75V11.25ZM4 12.75H20V11.25H4V12.75Z" fill="#5B6484"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        `;
                    });
                    html += '</div></div>';
                    contentShowDiv.innerHTML = html;
                })
                .catch(error => {
                    console.error('Error:', error);
                    contentShowDiv.innerHTML = '<p class="text-red-500">Error loading teachers list</p>';
                });
        }

        function sendTeacherRequest(teacherId) {
            var userId = document.getElementById('teachersBtn').getAttribute('data-userid');

            fetch('/mentorship/send-teacher-request', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    teacher_id: teacherId,
                    user_id: userId
                })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        showToast('Request sent successfully!', 'success');
                    } else {
                        showToast(data.message || 'Failed to send request', 'error');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showToast('Failed to send request', 'error');
                });
        }
    </script>
    <script>
        function showToast(message, type = 'success') {
            // Create the toast HTML
            const toastHtml = `
                <div x-data="{ toastVisible: true, toastTimer: null }"
                    x-init="toastTimer = setTimeout(() => { 
                        toastVisible = false;
                        setTimeout(() => $el.remove(), 300); // Remove after fade out
                    }, 6000)">
                    <div x-show="toastVisible"
                        class="bg-${type === 'success' ? 'success' : 'danger'} text-white py-3 px-4 rounded-md max-w-[240px] fixed top-5 right-5 z-[99999]"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        x-transition:leave="transition ease-in duration-300"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0">
                        <span>${message}</span>
                    </div>
                </div>
            `;

            // Add the toast to the document
            document.body.insertAdjacentHTML('beforeend', toastHtml);
        }

        document.addEventListener('DOMContentLoaded', function () {
            const buttons = document.querySelectorAll('[data-notification-button]');

            buttons.forEach(button => {
                button.addEventListener('click', function () {
                    const yearId = this.closest('tr').getAttribute('data-year-id');
                    console.log('Sending notification for year:', yearId);

                    // Get CSRF token
                    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                    // Send notification request
                    const notificationUrl = `/mentorship/notifications/send/${yearId}`;
                    console.log('Notification URL:', notificationUrl);

                    fetch(notificationUrl, {
                        method: 'GET',
                        headers: {
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': token
                        },
                        credentials: 'same-origin'
                    })
                        .then(response => {
                            console.log('Response status:', response.status);
                            return response.json();
                        })
                        .then(data => {
                            console.log('Response data:', data);
                            showToast(data.message, data.type || (data.success ? 'success' : 'error'));
                        })
                        .catch(error => {
                            console.error('Detailed error:', error);
                            showToast('Error sending notification. Check console for details.', 'error');
                        });
                });
            });
        });
    </script>
    <script>
        // Show the next layer based on button value
        document.querySelectorAll('.side-menu button[value]').forEach(button => {
            button.addEventListener('click', function () {
                const nextLayerId = 'layer' + this.getAttribute('value');
                document.querySelectorAll('.side-menu').forEach(layer => layer.classList.remove('show-menu'));
                document.getElementById(nextLayerId).classList.add('show-menu');
            });
        });

        // Go back to previous layer
        function goBack(layerNum) {
            console.log(layerNum);
            document.querySelectorAll('.side-menu').forEach(layer => layer.classList.remove('show-menu'));
            document.getElementById('layer' + layerNum).classList.add('show-menu');
        }
    </script>
@endsection