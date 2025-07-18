@extends('Layout.layout')

@section('content')
<div class="flex flex-col gap-5 min-h-[calc(100vh-188px)] sm:min-h-[calc(100vh-204px)]">
    <div class="grid grid-cols-1 gap-5">
        <!-- Request Form -->
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-6 rounded-lg shadow-sm">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Send Request Form</h2>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                        Sending request to {{ $student->name }}
                    </p>
                </div>
                <a href="{{ route('sendrequestbyteacher') }}" 
                   class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-gray-700 bg-white dark:bg-gray-800 dark:text-gray-200 border border-gray-300 rounded-md hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
                    </svg>
                    Back to List
                </a>
            </div>

            <form action="{{ route('store.send.request') }}" method="POST" class="max-w-4xl mx-auto">
                @csrf
                <input type="hidden" name="userid" value="{{ $student->id }}">

                <!-- Form Content -->
                <div class="space-y-6">
                    <!-- Duration Selection -->
                    <section>
                        <h3 class="text-lg font-semibold mb-4">1. Mentorship Duration</h3>
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <label for="from_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    From Date <span class="text-red-500">*</span>
                                </label>
                                <input 
                                    type="date" 
                                    name="from_date" 
                                    id="from_date" 
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                    min="{{ date('Y-m-d') }}"
                                    required
                                >
                                @error('from_date')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="to_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    To Date <span class="text-red-500">*</span>
                                </label>
                                <input 
                                    type="date" 
                                    name="to_date" 
                                    id="to_date" 
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                    min="{{ date('Y-m-d') }}"
                                    required
                                >
                                @error('to_date')
                                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </section>

                    <!-- Message Section -->
                    <section>
                        <h3 class="text-lg font-semibold mb-4">2. Request Message</h3>
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Message <span class="text-red-500">*</span>
                            </label>
                            <textarea 
                                name="message" 
                                id="message" 
                                rows="4" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                placeholder="Enter your message here..."
                                required
                            ></textarea>
                            @error('message')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex justify-end space-x-3">
                    <a href="{{ route('sendrequestbyteacher') }}" 
                       class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">
                        Cancel
                    </a>
                    <button type="submit" 
                            class="px-4 py-2 bg-blue-500 text-black rounded-md hover:bg-blue-600 dark:hover:bg-blue-700">
                        Send Request
                    </button>
                </div>
                    </section>
                </div>
            </form>
        </div>

        <!-- Agreement Form Section with Margins -->
    <div class="mx-[10%] mt-8">
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-6 rounded-lg shadow-sm">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-8">Mentor-Mentee Agreement Form</h2>
            
            <!-- Header Information -->
            <div class="grid grid-cols-2 gap-6 mb-8">
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Date:</label>
                    <p class="text-gray-900 dark:text-white">{{ date('M d, Y') }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Mentee Name:</label>
                    <p class="text-gray-900 dark:text-white">{{ $student->name }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Mentor Name:</label>
                    <p class="text-gray-900 dark:text-white">{{ auth()->user()->name }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Mentorship Duration:</label>
                    <p class="text-gray-900 dark:text-white">To be determined</p>
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
                        <p class="text-gray-900 dark:text-white mt-1">{{ auth()->user()->name }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Date:</label>
                        <p class="text-gray-900 dark:text-white mt-1">{{ date('M d, Y') }}</p>
                    </div>
                </div>
                <div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Mentee Signature:</label>
                        <p class="text-gray-900 dark:text-white mt-1">{{ $student->name }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Date:</label>
                        <p class="text-gray-900 dark:text-white mt-1">{{ date('M d, Y') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const fromDateInput = document.getElementById('from_date');
    const toDateInput = document.getElementById('to_date');

    // Set minimum date for both inputs to today
    const today = new Date().toISOString().split('T')[0];
    fromDateInput.min = today;
    toDateInput.min = today;

    // When from_date changes, update to_date min
    fromDateInput.addEventListener('change', function() {
        if (fromDateInput.value) {
            toDateInput.min = fromDateInput.value;
            // If to_date is earlier than from_date, reset it
            if (toDateInput.value && toDateInput.value < fromDateInput.value) {
                toDateInput.value = fromDateInput.value;
            }
        }
    });

    // When to_date changes, update from_date max
    toDateInput.addEventListener('change', function() {
        if (toDateInput.value) {
            fromDateInput.max = toDateInput.value;
            // If from_date is later than to_date, reset it
            if (fromDateInput.value && fromDateInput.value > toDateInput.value) {
                fromDateInput.value = toDateInput.value;
            }
        }
    });
});
</script>
<style>
    .bg-success-light { background-color: #d1fae5; }
    .text-success-dark { color: #047857; }
    .bg-warning-light { background-color: #fef3c7; }
    .text-warning-dark { color: #b45309; }
    .bg-error-light { background-color: #fee2e2; }
    .text-error-dark { color: #b91c1c; }
</style>
@endsection