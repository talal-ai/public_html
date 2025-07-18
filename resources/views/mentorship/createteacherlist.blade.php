@extends('Layout.layout')

@section('content')
    <div class="flex flex-col gap-5 min-h-[calc(100vh-188px)] sm:min-h-[calc(100vh-204px)]">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
            <!-- Left Box - Non-Mentorship Teachers -->
            <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-semibold">Teacher List for Non-Mentorship Program</h2>
                    <div class="relative">
                        <input type="text" id="searchInput" placeholder="Search teachers..."
                            class="px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <span class="absolute right-3 top-2.5 text-gray-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white dark:bg-dark border border-gray-300 dark:border-gray-700">
                        <thead>
                            <tr class="bg-gray-100 dark:bg-gray-800">
                                <th class="py-2 px-4 border-b text-left">Name</th>
                                <th class="py-2 px-4 border-b text-left">Email</th>
                                <th class="py-2 px-4 border-b text-left">Action</th>
                            </tr>
                        </thead>
                        <tbody id="nonMentorshipTeachers">
                            @if(count($nonMentorshipTeachers) > 0)
                                @foreach($nonMentorshipTeachers as $teacher)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700" data-teacher-id="{{ $teacher->id }}"
                                        data-teacher-name="{{ $teacher->name }}" data-teacher-email="{{ $teacher->email }}">
                                        <td class="py-2 px-4 border-b">{{ $teacher->name }}</td>
                                        <td class="py-2 px-4 border-b">{{ $teacher->email }}</td>
                                        <td class="py-2 px-4 border-b">
                                            <button onclick="moveToMentorship(this)" class="text-blue-600 hover:text-blue-800">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3" class="text-center py-4 text-gray-500">
                                        No teachers available in non-mentorship program.
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Right Box - Mentorship Teachers -->
            <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-semibold mb-4">Teacher List for Mentorship Program</h2>
                    <div class="relative">
                        <!-- Save Button -->
                        <div class="flex justify-end mt-4">
                            <button onclick="saveTeacherAssignments()"
                                class="inline-flex items-center px-4 py-2 bg-blue-600 text-black rounded-md hover:bg-blue-700">
                                Save Changes
                            </button>
                        </div>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white dark:bg-dark border border-gray-300 dark:border-gray-700">
                        <thead>
                            <tr class="bg-gray-100 dark:bg-gray-800">
                                <th class="py-2 px-4 border-b text-left">Name</th>
                                <th class="py-2 px-4 border-b text-left">Email</th>
                                <th class="py-2 px-4 border-b text-left">Action</th>
                            </tr>
                        </thead>
                        <tbody id="mentorshipTeachers">
                            @if(count($mentorshipTeachers) > 0)
                                @foreach($mentorshipTeachers as $teacher)
                                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700" data-teacher-id="{{ $teacher->id }}"
                                        data-teacher-name="{{ $teacher->name }}" data-teacher-email="{{ $teacher->email }}">
                                        <td class="py-2 px-4 border-b">{{ $teacher->name }}</td>
                                        <td class="py-2 px-4 border-b">{{ $teacher->email }}</td>
                                        <td class="py-2 px-4 border-b">
                                            <button onclick="removeFromMentorship(this)" class="text-red-600 hover:text-red-800">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M11 17l-5-5m0 0l5-5m-5 5h12" />
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3" class="text-center py-4 text-gray-500">
                                        No teachers assigned to mentorship program.
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>

    <script>
        document.getElementById('searchInput').addEventListener('keyup', function () {
            let searchText = this.value.toLowerCase();
            let rows = document.getElementById('nonMentorshipTeachers').getElementsByTagName('tr');

            for (let row of rows) {
                if (row.cells && row.cells.length > 1) {
                    let name = row.cells[0].textContent.toLowerCase();
                    let email = row.cells[1].textContent.toLowerCase();

                    if (name.includes(searchText) || email.includes(searchText)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                }
            }
        });

        function checkEmptyTable(tableId) {
            const tbody = document.getElementById(tableId);
            const rows = tbody.getElementsByTagName('tr');
            let hasTeachers = false;
            let emptyMessageRow = null;

            // Find if there are any teacher rows and locate empty message row
            for (let row of rows) {
                if (row.cells.length === 3) { // Teacher row has 3 cells
                    hasTeachers = true;
                } else if (row.cells.length === 1) { // Empty message row has 1 cell
                    emptyMessageRow = row;
                }
            }

            // Show/hide empty message based on whether there are teachers
            if (emptyMessageRow) {
                emptyMessageRow.style.display = hasTeachers ? 'none' : '';
            }
        }

        function moveToMentorship(button) {
            const row = button.closest('tr');
            const mentorshipTable = document.getElementById('mentorshipTeachers');
            mentorshipTable.appendChild(row);
            button.outerHTML = `
                <button onclick="removeFromMentorship(this)" class="text-red-600 hover:text-red-800">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
                    </svg>
                </button>
            `;

            // Check both tables and update empty messages
            checkEmptyTable('nonMentorshipTeachers');
            checkEmptyTable('mentorshipTeachers');
        }

        function removeFromMentorship(button) {
            const row = button.closest('tr');
            const nonMentorshipTable = document.getElementById('nonMentorshipTeachers');
            nonMentorshipTable.appendChild(row);
            button.outerHTML = `
                <button onclick="moveToMentorship(this)" class="text-blue-600 hover:text-blue-800">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </button>
            `;

            // Check both tables and update empty messages
            checkEmptyTable('nonMentorshipTeachers');
            checkEmptyTable('mentorshipTeachers');
        }

        function saveTeacherAssignments() {
            const mentorshipTeachers = Array.from(document.getElementById('mentorshipTeachers').getElementsByTagName('tr'))
                .filter(row => row.getAttribute('data-teacher-id'))
                .map(row => row.getAttribute('data-teacher-id'));

            fetch('{{ url("/mentorship/save-teacher-list") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ teachers: mentorshipTeachers })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Teachers saved successfully!');
                        location.reload();
                    } else {
                        throw new Error(data.error || 'Failed to save');
                    }
                })
                .catch(error => {
                    console.error('Save error:', error);
                    alert(error.message || 'Error saving. Please try again.');
                });
        }
    </script>

@endsection