@extends('Layout.layout')

@section('content')
<div class="flex flex-col gap-5 min-h-[calc(100vh-188px)] sm:min-h-[calc(100vh-204px)]">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        <!-- Left Box - Assignable Students -->
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold">Assignable Students for {{ $teacher->name }}</h2>
                <a href="{{ route('listofacceptance') }}" 
                   class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Back
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white dark:bg-dark border border-gray-300 dark:border-gray-700">
                    <thead>
                        <tr class="bg-gray-100 dark:bg-gray-800">
                            <th class="py-2 px-4 border-b text-left">Name</th>
                            <th class="py-2 px-4 border-b text-left">Email</th>
                            <th class="py-2 px-4 border-b text-left">Status</th>
                            <th class="py-2 px-4 border-b text-left">Action</th>
                        </tr>
                    </thead>
                    <tbody id="assignableStudents">
                        @if(count($assignableStudents) > 0)
                            @foreach($assignableStudents as $student)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700" 
                                    data-student-id="{{ $student->id }}" 
                                    data-student-name="{{ $student->name }}" 
                                    data-student-email="{{ $student->email }}">
                                    <td class="py-2 px-4 border-b">{{ $student->name }}</td>
                                    <td class="py-2 px-4 border-b">{{ $student->email }}</td>
                                    <td class="py-2 px-4 border-b">
                                        <span class="px-2 py-1 rounded-full text-sm bg-success-light text-success-dark">
                                            Accepted
                                        </span>
                                    </td>
                                    <td class="py-2 px-4 border-b">
                                        <button onclick="moveToAssigned(this)" class="text-blue-600 hover:text-blue-800">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4" class="text-center py-4 text-gray-500">
                                    No more students available to assign.
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Right Box - Assigned Students -->
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-xl font-semibold mb-4">Assigned Students</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white dark:bg-dark border border-gray-300 dark:border-gray-700">
                    <thead>
                        <tr class="bg-gray-100 dark:bg-gray-800">
                            <th class="py-2 px-4 border-b text-left">Name</th>
                            <th class="py-2 px-4 border-b text-left">Email</th>
                            <th class="py-2 px-4 border-b text-left">Status</th>
                            <th class="py-2 px-4 border-b text-left">Action</th>
                        </tr>
                    </thead>
                    <tbody id="assignedStudents">
                        @if(count($assignedStudents) > 0)
                            @foreach($assignedStudents as $student)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700" 
                                    data-student-id="{{ $student->id }}" 
                                    data-student-name="{{ $student->name }}" 
                                    data-student-email="{{ $student->email }}">
                                    <td class="py-2 px-4 border-b">{{ $student->name }}</td>
                                    <td class="py-2 px-4 border-b">{{ $student->email }}</td>
                                    <td class="py-2 px-4 border-b">
                                        <span class="px-2 py-1 rounded-full text-sm bg-success-light text-success-dark">
                                            Assigned
                                        </span>
                                    </td>
                                    <td class="py-2 px-4 border-b">
                                        <button onclick="moveBackToAssignable(this)" class="text-blue-600 hover:text-blue-800">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr id="noAssignedMessage">
                                <td colspan="4" class="text-center py-4 text-gray-500">
                                    No students assigned yet.
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>

            <!-- Warning Message -->
            <div id="warningMessage" class="hidden mt-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                Please assign at least one student before saving.
            </div>
            <div id="unlinkMessages" class="hidden mt-4 p-4 bg-yellow-100 border border-yellow-400 text-yellow-700 rounded"></div>

            <!-- Save Button -->
            <div class="mt-6 flex justify-end">
                <button onclick="saveAssignments()" class="px-4 py-2 bg-blue-600 text-black rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Assigned Student's
                </button>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-success-light { background-color: #d1fae5; }
    .text-success-dark { color: #047857; }
</style>

<script>
window.moveToAssigned = function(button) {
    const row = button.closest('tr');
    const studentId = row.dataset.studentId;
    const studentName = row.dataset.studentName;
    const studentEmail = row.dataset.studentEmail;
    
    // Create new row for assigned students table
    const newRow = document.createElement('tr');
    newRow.className = 'hover:bg-gray-50 dark:hover:bg-gray-700';
    newRow.dataset.studentId = studentId;
    newRow.dataset.studentName = studentName;
    newRow.dataset.studentEmail = studentEmail;
    newRow.innerHTML = `
        <td class="py-2 px-4 border-b">${studentName}</td>
        <td class="py-2 px-4 border-b">${studentEmail}</td>
        <td class="py-2 px-4 border-b">
            <span class="px-2 py-1 rounded-full text-sm bg-success-light text-success-dark">
                Assigned
            </span>
        </td>
        <td class="py-2 px-4 border-b">
            <button onclick="moveBackToAssignable(this)" class="text-blue-600 hover:text-blue-800">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
                </svg>
            </button>
        </td>
    `;

    // Remove from assignable students
    row.remove();
    
    // Add to assigned students
    const assignedTable = document.getElementById('assignedStudents');
    if (!assignedTable) return;

    // Remove "no students assigned" message if it exists
    const noAssignedMessage = assignedTable.querySelector('#noAssignedMessage');
    if (noAssignedMessage) {
        noAssignedMessage.remove();
    }
    
    assignedTable.appendChild(newRow);
    
    // Show "no assignable" message if there are no more assignable students
    const assignableTable = document.getElementById('assignableStudents');
    if (!assignableTable) return;
    
    if (assignableTable.children.length === 0) {
        const noStudentsRow = document.createElement('tr');
        noStudentsRow.innerHTML = `
            <td colspan="4" class="text-center py-4 text-gray-500">
                No more students available to assign.
            </td>
        `;
        assignableTable.appendChild(noStudentsRow);
    }
};

window.moveBackToAssignable = function(button) {
    const row = button.closest('tr');
    const studentId = row.dataset.studentId;
    const studentName = row.dataset.studentName;
    const studentEmail = row.dataset.studentEmail;
    
    // Create new row for assignable students table
    const newRow = document.createElement('tr');
    newRow.className = 'hover:bg-gray-50 dark:hover:bg-gray-700';
    newRow.dataset.studentId = studentId;
    newRow.dataset.studentName = studentName;
    newRow.dataset.studentEmail = studentEmail;
    newRow.innerHTML = `
        <td class="py-2 px-4 border-b">${studentName}</td>
        <td class="py-2 px-4 border-b">${studentEmail}</td>
        <td class="py-2 px-4 border-b">
            <span class="px-2 py-1 rounded-full text-sm bg-success-light text-success-dark">
                Accepted
            </span>
        </td>
        <td class="py-2 px-4 border-b">
            <button onclick="moveToAssigned(this)" class="text-blue-600 hover:text-blue-800">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                </svg>
            </button>
        </td>
    `;

    // Remove from assigned students
    row.remove();
    
    // Add to assignable students
    const assignableTable = document.getElementById('assignableStudents');
    if (!assignableTable) return;

    // Remove "no more students" message if it exists
    const emptyMessage = assignableTable.querySelector('td[colspan="4"]')?.closest('tr');
    if (emptyMessage) {
        emptyMessage.remove();
    }
    
    // Add the student to assignable table
    assignableTable.appendChild(newRow);
    
    // Show "no assigned" message if there are no assigned students
    const assignedTable = document.getElementById('assignedStudents');
    if (!assignedTable) return;
    
    if (assignedTable.children.length === 0) {
        const noAssignedRow = document.createElement('tr');
        noAssignedRow.id = 'noAssignedMessage';
        noAssignedRow.innerHTML = `
            <td colspan="4" class="text-center py-4 text-gray-500">
                No students assigned yet.
            </td>
        `;
        assignedTable.appendChild(noAssignedRow);
    }
};

window.saveAssignments = function() {
    const assignedTable = document.getElementById('assignedStudents');
    const warningMessage = document.getElementById('warningMessage');
    const unlinkMessages = document.getElementById('unlinkMessages');
    
    if (!assignedTable || !warningMessage || !unlinkMessages) return;
    
    // Get all assigned students
    const assignedRows = Array.from(assignedTable.getElementsByTagName('tr'))
        .filter(row => !row.id || row.id !== 'noAssignedMessage');
    
    if (assignedRows.length === 0) {
        warningMessage.style.display = 'block';
        return;
    }
    
    // Hide warning if shown
    warningMessage.style.display = 'none';
    unlinkMessages.style.display = 'none';
    
    // Collect assigned student IDs
    const assignments = [];
    for (const row of assignedRows) {
        assignments.push({
            student_id: row.dataset.studentId
        });
    }
    
    // Send data to server
    fetch('{{ route("teacher.save.assignments", $teacher->id) }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ assignments: assignments })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            if (data.unableToUnlink && data.unableToUnlink.length > 0) {
                unlinkMessages.innerHTML = data.unableToUnlink.join('<br>');
                unlinkMessages.style.display = 'block';
                return;
            }
            alert('Assignments saved successfully!');
            window.location.href = '{{ route("listofacceptance") }}';
        } else {
            alert('Error saving assignments: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error saving assignments. Please try again.');
    });
};
</script>
@endsection
