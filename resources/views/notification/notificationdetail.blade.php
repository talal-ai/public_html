@extends('Layout.layout')

@section('content')
    @if (session('success') || session('error'))
        <div x-data="{ toastVisible: true, toastTimer: null }"
            x-init="toastTimer = setTimeout(() => toastVisible = false, 6000)">
            <div x-show="toastVisible"
                class="{{ session('error') ? 'bg-danger' : 'bg-success' }} text-white py-3 px-4 rounded-md max-w-[240px] fixed top-5 right-5 z-[99999]"
                x-transition:enter="transition ease-out duration-300" 
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" 
                x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100" 
                x-transition:leave-end="opacity-0">
                <span>{{ session('error') ?? session('success') }}</span>
            </div>
        </div>
    @endif

    <div class="flex flex-col gap-5 min-h-[calc(100vh-188px)] sm:min-h-[calc(100vh-204px)]">
        <div class="grid grid-cols-1 gap-5">
            <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
                <div class="flex justify-between items-center mb-4">
                    <h4 class="card-title">Mentorship Agreement</h4>
                    <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                </div>

                <!-- PDF Viewer -->
                <iframe src="{{ env('APP_URL') }}/public/mentorshipagreement/mentorshipagreement.pdf" width="100%"
                    height="800px">
                </iframe>

                <!-- Checkbox and Button Container -->
                <form id="agreementForm" class="mt-6 space-y-4">
                    <div class="flex flex-col">
                        <div class="flex items-center">
                            <input type="checkbox" name="agreement" id="agreementCheckbox"
                                class="form-checkbox h-4 w-4 text-primary">
                            <label for="agreementCheckbox" class="ml-2 text-gray-700 dark:text-gray-300">
                                I have read and agree to the terms and conditions
                            </label>
                        </div>
                        <div id="errorMessage"
                            class="flex items-center text-red-600 font-medium bg-red-50 border border-red-200 rounded-md p-2 mt-2"
                            style="display: none;">
                            <svg class="w-5 h-5 mr-2 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                    clip-rule="evenodd" />
                            </svg>
                            Please agree to the terms and conditions before proceeding
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary w-full">
                            Submit Agreement
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('agreementForm');
            const checkbox = document.getElementById('agreementCheckbox');
            const errorMessage = document.getElementById('errorMessage');

            form.addEventListener('submit', function (e) {
                e.preventDefault();

                if (!checkbox.checked) {
                    errorMessage.style.display = 'flex';
                    errorMessage.style.opacity = '0';
                    setTimeout(() => {
                        errorMessage.style.opacity = '1';
                        errorMessage.style.transition = 'opacity 0.3s ease-in-out';
                    }, 10);
                    return false;
                }

                errorMessage.style.display = 'none';

                fetch("{{ route('mentorship.store') }}", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        "Content-Type": "application/json",
                        "Accept": "application/json"
                    },
                    body: JSON.stringify({
                        agreement: 1
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success && data.reload) {
                        window.location.href = window.location.href;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            });

            checkbox.addEventListener('change', function() {
                if (this.checked) {
                    errorMessage.style.display = 'none';
                }
            });
        });
    </script>
@endsection