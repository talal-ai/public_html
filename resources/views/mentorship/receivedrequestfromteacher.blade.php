@extends('Layout.layout')

@section('content')
<div class="flex flex-col gap-5 min-h-[calc(100vh-188px)] sm:min-h-[calc(100vh-204px)]">
    <div class="grid grid-cols-1 gap-5">
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Requests From Teachers</h2>

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white dark:bg-dark border border-gray-300 dark:border-gray-700">
                    <thead>
                        <tr class="bg-gray-100 dark:bg-gray-800">
                            <th class="py-2 px-4 border-b text-left">Teacher Name</th>
                            <th class="py-2 px-4 border-b text-left">Teacher Email</th>
                            <th class="py-2 px-4 border-b text-left">Message</th>
                            <th class="py-2 px-4 border-b text-left">Status</th>
                            <th class="py-2 px-4 border-b text-left">Request Date</th>
                            <th class="py-2 px-4 border-b text-left">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($requests as $request)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                <td class="py-2 px-4 border-b">{{ $request->teacher_name }}</td>
                                <td class="py-2 px-4 border-b">{{ $request->teacher_email }}</td>
                                <td class="py-2 px-4 border-b">{{ $request->message }}</td>
                                <td class="py-2 px-4 border-b">
                                    @if($request->accepted == 1)
                                        <span class="px-2 py-1 rounded text-sm bg-success-light text-success-dark">
                                            Accepted
                                        </span>
                                    @elseif($request->rejected == 1)
                                        <span class="px-2 py-1 rounded text-sm bg-error-light text-error-dark">
                                            Rejected
                                        </span>
                                    @else
                                        <span class="px-2 py-1 rounded text-sm bg-warning-light text-warning-dark">
                                            Pending
                                        </span>
                                    @endif
                                </td>
                                <td class="py-2 px-4 border-b">
                                    {{ \Carbon\Carbon::parse($request->created_at)->format('M d, Y') }}
                                </td>
                                <td class="py-2 px-4 border-b">
                                    @if($request->rejected != 1)
                                        <a href="{{ route('view.request', $request->id) }}" 
                                           class="text-blue-500 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if(count($requests) === 0)
                <p class="text-center py-4 text-gray-500 dark:text-gray-400">No requests found.</p>
            @endif
        </div>
    </div>
</div>

<style>
    .bg-success-light { background-color: #d1fae5; }
    .text-success-dark { color: #047857; }
    .bg-warning-light { background-color: #fef3c7; }
    .text-warning-dark { color: #b45309; }
    .bg-error-light { background-color: #fee2e2; }
    .text-error-dark { color: #b91c1c; }
</style>
@endsection