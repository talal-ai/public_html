@extends('Layout.layout')

@section('content')
<div class="flex flex-col gap-5 min-h-[calc(100vh-188px)] sm:min-h-[calc(100vh-204px)]">
    @if(isset($message))
        <div class="bg-warning-light p-6 rounded-lg shadow-sm">
            <h2 class="text-xl font-semibold text-warning-dark mb-3">Agreement Required</h2>
            <p class="text-warning-dark">{{ $message }}</p>
           
        </div>
    @endif

    @if(!isset($message))
    <div class="grid grid-cols-1 gap-5">
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Students List</h2>

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white dark:bg-dark border border-gray-300 dark:border-gray-700">
                    <thead>
                        <tr class="bg-gray-100 dark:bg-gray-800">
                            <th class="py-2 px-4 border-b text-left">Name</th>
                            <th class="py-2 px-4 border-b text-left">Email</th>
                            <th class="py-2 px-4 border-b text-left">Request Status</th>
                            <th class="py-2 px-4 border-b text-left">Acceptances Date</th>
                            <th class="py-2 px-4 border-b text-left">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                <td class="py-2 px-4 border-b">{{ $student->name }}</td>
                                <td class="py-2 px-4 border-b">{{ $student->email }}</td>
                                <td class="py-2 px-4 border-b">
                                    @if($student->request_status === 'Accepted')
                                        <span class="px-2 py-1 rounded text-sm bg-success-light text-success-dark">
                                            {{ $student->request_status }}
                                        </span>
                                    @elseif($student->request_status === 'Pending')
                                        <span class="px-2 py-1 rounded text-sm bg-warning-light text-warning-dark">
                                            {{ $student->request_status }}
                                        </span>
                                    @elseif($student->request_status === 'Rejected')
                                        <span class="px-2 py-1 rounded text-sm bg-error-light text-error-dark">
                                            {{ $student->request_status }}
                                        </span>
                                    @else
                                        <span class="px-2 py-1 rounded text-sm bg-neutral-light text-neutral-dark">
                                            {{ $student->request_status }}
                                        </span>
                                    @endif
                                </td>
                                <td class="py-2 px-4 border-b">
                                    @if($student->request_date)
                                        @if($student->request_status === 'Accepted')
                                            Accepted on {{ \Carbon\Carbon::parse($student->request_date)->format('M d, Y') }}
                                        @elseif($student->request_status === 'Pending')
                                            Pending since {{ \Carbon\Carbon::parse($student->request_date)->format('M d, Y') }}
                                        @elseif($student->request_status === 'Rejected')
                                            Rejected on {{ \Carbon\Carbon::parse($student->request_date)->format('M d, Y') }}
                                        @endif
                                    @else
                                        Not Requested
                                    @endif
                                </td>
                                <td class="py-2 px-4 border-b">
                                    @if(($student->request_status === 'Not Sent' || $student->request_status === 'Rejected') && $student->is_linked)
                                        <a href="{{ route('show.send.request', $student->id) }}" 
                                           class="text-blue-500 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z" />
                                            </svg>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if(count($students) === 0)
                <p class="text-center py-4 text-gray-500 dark:text-gray-400">No eligible students found.</p>
            @endif
        </div>
    </div>
    @endif
</div>

<style>
    .bg-success-light { background-color: #d1fae5; }
    .text-success-dark { color: #047857; }
    .bg-warning-light { background-color: #fef3c7; }
    .text-warning-dark { color: #b45309; }
    .bg-error-light { background-color: #fee2e2; }
    .text-error-dark { color: #b91c1c; }
    .bg-neutral-light { background-color: #f3f4f6; }
    .text-neutral-dark { color: #374151; }
</style>
@endsection