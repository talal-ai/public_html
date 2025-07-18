@extends('Layout.layout')

@section('content')
<div class="flex flex-col gap-5 min-h-[calc(100vh-188px)] sm:min-h-[calc(100vh-204px)]">
    <!-- Request Details Section -->
    <div class="grid grid-cols-1 gap-5">
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-6 rounded-lg shadow-sm">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Request Details</h2>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                        Submitted on {{ \Carbon\Carbon::parse($request->created_at)->format('M d, Y h:i A') }}
                    </p>
                </div>
                <a href="{{ route('receivedrequestfromteacher') }}" 
                   class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 bg-white dark:bg-gray-800 dark:text-gray-200 border border-gray-300 rounded-md hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
                    </svg>
                    Back to List
                </a>
            </div>

            <!-- Status Badge -->
            <div class="mb-8">
                @if($request->accepted == 1)
                    <span class="inline-flex items-center px-3 py-1.5 rounded-full text-sm font-medium bg-success-light text-success-dark">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        Accepted
                    </span>
                @elseif($request->rejected == 1)
                    <span class="inline-flex items-center px-3 py-1.5 rounded-full text-sm font-medium bg-error-light text-error-dark">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                        Rejected
                    </span>
                @else
                    <span class="inline-flex items-center px-3 py-1.5 rounded-full text-sm font-medium bg-warning-light text-warning-dark">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                        </svg>
                        Pending
                    </span>
                @endif
            </div>

            <!-- Content Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Teacher Information -->
                <div class="col-span-1 space-y-6">
                    <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-lg">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Teacher Information</h3>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Name</label>
                                <p class="mt-1 text-sm text-gray-900 dark:text-white">{{ $request->teacher_name }}</p>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">Email</label>
                                <p class="mt-1 text-sm text-gray-900 dark:text-white break-all">{{ $request->teacher_email }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Message Section -->
                <div class="col-span-2">
                    <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-lg h-full">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Message</h3>
                        <div class="prose dark:prose-invert max-w-none">
                            <p class="text-gray-700 dark:text-gray-300 whitespace-pre-wrap">{{ $request->message }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Agreement Form Section with Margins -->
    <div class="mx-[10%] mt-8">
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-6 rounded-lg shadow-sm">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-8">Mentor-Mentee Agreement Form</h2>
            
            <!-- Header Information -->
            <div class="grid grid-cols-2 gap-6 mb-8">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Date:</label>
                    <p class="text-gray-900 dark:text-white">{{ \Carbon\Carbon::parse($request->created_at)->format('M d, Y') }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Mentee Name:</label>
                    <p class="text-gray-900 dark:text-white">{{ $user->name }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Mentor Name:</label>
                    <p class="text-gray-900 dark:text-white">{{ $request->teacher_name }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Mentorship Duration:</label>
                    <p class="text-gray-900 dark:text-white">From {{ \Carbon\Carbon::parse($request->fromdate)->format('M d, Y') }} to {{ \Carbon\Carbon::parse($request->todate)->format('M d, Y') }}</p>
                </div>
            </div>

            <!-- Agreement Content -->
            <div class="space-y-6">
                <section>
                    <h3 class="text-lg font-semibold mb-3">1. Purpose of Mentorship</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">The purpose of this mentorship is to support the mentee's career development, enhance specific skills, and offer guidance in achieving personal or professional goals. This agreement outlines the expectations and commitments from both the mentor and the mentee to ensure a productive and mutually beneficial relationship.</p>
                </section>

                <section>
                    <h3 class="text-lg font-semibold mb-3">2. Roles and Responsibilities</h3>
                    <div class="space-y-4">
                        <div>
                            <h4 class="font-medium mb-2">Mentor:</h4>
                            <ul class="list-disc list-inside text-sm text-gray-600 dark:text-gray-400 space-y-1">
                                <li>Guidance: Provide expert advice and support relevant to the mentee's goals.</li>
                                <li>Support: Offer encouragement and motivation to help the mentee tackle challenges.</li>
                                <li>Feedback: Deliver constructive feedback and recognize achievements.</li>
                                <li>Availability: Maintain regular contact and be available for scheduled meetings.</li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="font-medium mb-2">Mentee:</h4>
                            <ul class="list-disc list-inside text-sm text-gray-600 dark:text-gray-400 space-y-1">
                                <li>Preparation: Come prepared for each meeting with questions, topics, or issues to discuss.</li>
                                <li>Engagement: Actively participate in discussions and activities.</li>
                                <li>Action: Follow through on agreed-upon action items and make use of the mentor's advice.</li>
                                <li>Communication: Keep the mentor informed about progress and challenges.</li>
                            </ul>
                        </div>
                    </div>
                </section>

                <section>
                    <h3 class="text-lg font-semibold mb-3">3. Meeting Schedule</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Meetings will occur at least once every 3 months, last 15-60 minutes, and be held in person or online as needed. Both parties will prepare an agenda and share relevant materials in advance.</p>
                </section>

                <section>
                    <h3 class="text-lg font-semibold mb-3">4. Confidentiality and Respect</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">All information shared during the mentorship will be kept confidential. Neither party will disclose sensitive or personal information without consent. Both parties agree to engage respectfully and professionally.</p>
                </section>

                <section>
                    <h3 class="text-lg font-semibold mb-3">5. Feedback and Evaluation</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Both parties will provide feedback on the mentoring process regularly to ensure alignment with goals and expectations.</p>
                </section>

                <section>
                    <h3 class="text-lg font-semibold mb-3">6. Termination of Mentorship</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400">While the duration of mentoring relationships can vary based on individual circumstances, we aim to sustain our mentoring relationship for at least one year. However, either party may terminate the mentorship with prior notice if the arrangement is no longer meeting expectations or if unforeseen circumstances arise.</p>
                </section>
            </div>

            <!-- Signatures -->
            <div class="grid grid-cols-2 gap-6 mt-8 pt-8 border-t border-gray-200 dark:border-gray-700">
                <div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Mentor Signature:</label>
                        <p class="text-gray-900 dark:text-white mt-1">{{ $request->teacher_name }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Date:</label>
                        <p class="text-gray-900 dark:text-white mt-1">{{ \Carbon\Carbon::parse($request->created_at)->format('M d, Y') }}</p>
                    </div>
                </div>
                <div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Mentee Signature:</label>
                        <p class="text-gray-900 dark:text-white mt-1">{{ $user->name }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Date:</label>
                        <p class="text-gray-900 dark:text-white mt-1">{{ \Carbon\Carbon::now()->format('M d, Y') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
</div>
 <!-- Action Buttons -->
 @if($request->accepted == 0 && $request->rejected == 0)
                <form action="{{ route('update.request.status', $request->id) }}" method="POST" class="mt-8 pt-6 border-t border-gray-200 dark:border-gray-700">
                    @csrf
                    <div class="flex justify-end space-x-3">
                        <button type="submit" name="reject" value="1" 
                                class="px-4 py-2 bg-red-500 text-black rounded-md hover:bg-red-600">
                            Reject Request
                        </button>
                        <button type="submit" name="accept" value="1" 
                                class="px-4 py-2 bg-green-500 text-black rounded-md hover:bg-green-600">
                            Accept Request
                        </button>
                    </div>
                </form>
            @else
                <div class="mt-8 pt-6 border-t border-gray-200 dark:border-gray-700">
                    <div class="flex justify-end">
                        @if($request->accepted == 1)
                            <div class="px-4 py-2 bg-success-light text-success-dark rounded-md">
                                Request Accepted
                            </div>
                        @elseif($request->rejected == 1)
                            <div class="px-4 py-2 bg-error-light text-error-dark rounded-md">
                                Request Rejected
                            </div>
                        @endif
                    </div>
                </div>
            @endif
<style>
    .bg-success-light { background-color: #d1fae5; }
    .text-success-dark { color: #047857; }
    .bg-warning-light { background-color: #fef3c7; }
    .text-warning-dark { color: #b45309; }
    .bg-error-light { background-color: #fee2e2; }
    .text-error-dark { color: #b91c1c; }
</style>
@endsection