@extends('Layout.layout')

@section('content')
<div class="flex flex-col gap-5 min-h-[calc(100vh-188px)] sm:min-h-[calc(100vh-204px)]">
    <div class="grid grid-cols-1">
        <div>
            <ul class="font-semibold text-lightgray flex items-center gap-4 sm:gap-[30px] gap-y-4 whitespace-nowrap overflow-auto">
                <li>
                    <a href="{{ route('listofacceptance') }}" class="hover:text-dark duration-300 dark:hover:text-white">Teacher</a>
                </li>
                <li>
                    <a href="{{ route('listofacceptancebystudent') }}" class="text-dark dark:text-white duration-300">Student</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="grid grid-cols-1 gap-5">
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-base font-semibold">List of Acceptance from Student</h2>
                <div class="flex items-center gap-2">
                    <span class="text-sm text-gray-500">Total:</span>
                    <span class="bg-primary/10 text-primary px-2 py-1 rounded text-sm">{{ $usersData->count() }}</span>
                </div>
            </div>

            @if($usersData->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="border-b border-lightgray/10">
                            <th class="text-left py-3 px-4 bg-slate-50 dark:bg-gray-800">Name</th>
                            <th class="text-left py-3 px-4 bg-slate-50 dark:bg-gray-800">Email</th>
                            <th class="text-left py-3 px-4 bg-slate-50 dark:bg-gray-800">Acceptance Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($usersData as $userData)
                        <tr class="border-b border-lightgray/10 hover:bg-slate-50 dark:hover:bg-gray-800 transition-colors">
                            <td class="py-3 px-4">
                                <div class="flex items-center gap-3">
                                    <span>{{ $userData->name }}</span>
                                </div>
                            </td>
                            <td class="py-3 px-4">{{ $userData->email }}</td>
                            <td class="py-3 px-4">{{ \Carbon\Carbon::parse($userData->acceptance_date)->format('M d, Y') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="text-center py-8">
                <div class="mb-4">
                    <svg class="w-12 h-12 mx-auto text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">No Agreements Found</h3>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">There are no mentorship agreements submitted by Students yet.</p>
            </div>
            @endif
        </div>
    </div>
</div>

<script>
    function editAgreement(userId) {
        // This function will be implemented later as per your requirements
        console.log('Edit agreement for user:', userId);
    }
</script>
@endsection