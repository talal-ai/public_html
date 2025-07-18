<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Upload Assignment</title>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    </head>

    <body class="bg-gradient-to-br from-blue-50 to-blue-100 font-sans leading-relaxed tracking-normal text-gray-800">

        <div class="container mx-auto p-10 max-w-3xl">
            <div id="uploadContainer" class="bg-white shadow-2xl rounded-2xl p-12">
                <!-- Header Section -->
                <form action="{{ route('uploadassignmentbystudent') }}" method="post" enctype="multipart/form-data"
                    id="uploadassignment">
                    @csrf
                    <div class="text-center mb-8">
                        <h1 class="text-4xl font-extrabold text-blue-700">Upload Your Assignment</h1>
                        <p class="text-gray-500 mt-2">Submit your work here and make sure everything is in order.</p>
                    </div>
                    @auth
                                        @php
                                            $user = auth()->user();
                                            $userid = $user->id;
                                        @endphp
                    @endauth
                    @foreach ($assignmentsData as $assignment)
                                        @php
                                            $totalmarks = $assignment['totalmarks'];
                                            $assignment_id = $assignment['assignment_id'];
                                            $program_id = $assignment['program_id'];
                                            $year_id = $assignment['year_id'];
                                            $subject_id = $assignment['subject_id'];
                                            $classrollno = $assignment['classrollno'];
                                        @endphp
                                        <!-- Upload Section -->
                                        <div id="uploadArea"
                                            class="bg-blue-50 border-4 border-dashed border-blue-300 p-10 rounded-lg shadow-inner mb-10 flex flex-col items-center justify-center relative">
                                            <input id="assignmentpdf" type="file" name="assignmentpdf"
                                                class="opacity-0 absolute inset-0 w-full h-full cursor-pointer z-10" multiple>
                                            <input id="userid" type="hidden" name="userid" value="{{ $userid  }}">
                                            <input id="studentrollno" type="hidden" name="studentrollno" value="{{ $classrollno  }}">
                                            <input id="totalmarks" type="hidden" name="totalmarks" value="{{ $totalmarks }}">
                                            <input id="assignment_id" type="hidden" name="assignment_id" value="{{ $assignment_id  }}">
                                            <input id="program_id" type="hidden" name="program_id" value="{{ $program_id  }}">
                                            <input id="year_id" type="hidden" name="year_id" value="{{ $year_id  }}">
                                            <input id="subject_id" type="hidden" name="subject_id" value="{{ $subject_id  }}">
                                            <div id="placeholder" class="text-center z-0">
                                                <p class="text-lg font-semibold text-gray-600 mb-4">Drag and drop your file here</p>
                                                <p class="text-sm text-gray-500 mb-4">or click to browse</p>
                                                <svg class="w-12 h-12 text-blue-400 mx-auto" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2zm1 15h-2v-2h2zm0-4h-2V7h2z" />
                                                </svg>
                                            </div>
                                            <!-- Selected File Preview Inside the Upload Area -->
                                            <div id="filePreview" class=" flex flex-col items-center mt-4" style="hidden">
                                                <svg class="w-16 h-16 text-red-400 mb-2" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M3 3v18h18V7.83L15.17 3H3zm12 7H9v2h6v-2zm0 4H9v2h6v-2zm-6-6h4V4.5L9 7.5V8z" />
                                                </svg>
                                                <p id="fileName" class="text-lg font-semibold text-gray-700"></p>
                                                <p class="text-sm text-gray-500">Only PDF File Accepted</p>
                                            </div>
                                        </div>
                    @endforeach

                    <!-- Upload Progress -->
                    <div id="uploadProgress" class="hidden bg-blue-100 rounded-lg shadow-inner mb-8 p-6">
                        <p class="text-sm font-semibold text-gray-600">Uploading File:</p>
                        <div class="relative pt-1">
                            <div class="overflow-hidden h-4 mb-4 text-xs flex rounded bg-blue-200">
                                <div id="progressBar" style="width: 0%"
                                    class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-600">
                                </div>
                            </div>
                        </div>
                        <p id="uploadStatus" class="text-gray-700 text-sm">0% completed...</p>
                    </div>

                    <!-- Success Notification -->
                    <div id="successMessage" class="hidden text-center">
                        <p class="text-xl font-bold text-green-600">Your assignment is uploaded!</p>
                        <div class="flex justify-center items-center mt-4">
                            <button id="backButton"
                                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow-lg focus:outline-none focus:ring-4 focus:ring-blue-300 transition duration-300 transform hover:scale-105">
                                Back to Assignment List
                            </button>
                        </div>
                        <p class="text-gray-700 mt-4">Redirecting in <span id="timer">10</span> seconds...</p>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-center mt-12">
                        <button id="uploadButton" type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-12 rounded-full shadow-lg focus:outline-none focus:ring-4 focus:ring-blue-300 transition duration-300 transform hover:scale-105">
                            Upload Assignment
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <script>
            const fileInput = document.getElementById('assignmentpdf');
            const uploadButton = document.getElementById('uploadButton');
            const uploadProgress = document.getElementById('uploadProgress');
            const progressBar = document.getElementById('progressBar');
            const uploadStatus = document.getElementById('uploadStatus');
            const filePreview = document.getElementById('filePreview');
            const fileName = document.getElementById('fileName');
            const placeholder = document.getElementById('placeholder');
            const successMessage = document.getElementById('successMessage');
            const timerDisplay = document.getElementById('timer');
            const backButton = document.getElementById('backButton');

            let countdownInterval;

            fileInput.addEventListener('change', () => {
                if (fileInput.files.length > 0) {
                    const file = fileInput.files[0];
                    if (file.type === 'application/pdf') {
                        // Hide placeholder and show file preview inside the upload area
                        placeholder.classList.add('hidden');
                        filePreview.classList.remove('hidden');
                        fileName.textContent = file.name;
                    } else {
                        alert('Please select a PDF file.');
                        fileInput.value = '';
                        placeholder.classList.remove('hidden');
                        filePreview.classList.add('hidden');
                    }
                }
            });

            uploadButton.addEventListener('click', (e) => {
                e.preventDefault(); // Prevent the default button click behavior

                if (fileInput.files.length > 0) {
                    // After form submission, start the upload progress
                    uploadProgress.classList.remove('hidden');
                    let progress = 0;

                    // Mock upload progress
                    const uploadInterval = setInterval(() => {
                        if (progress < 100) {
                            progress += 10;
                            progressBar.style.width = progress + '%';
                            uploadStatus.textContent = `${progress}% completed...`;
                        } else {
                            clearInterval(uploadInterval);
                            uploadStatus.textContent = `Upload completed successfully!`;

                            // Show success message and hide upload area
                            showSuccessMessage();

                            // Start countdown timer
                            startCountdown();

                            // Reset form after 10 seconds
                            setTimeout(() => {
                                document.getElementById('uploadassignment').submit();
                            }, 10000);
                        }
                    }, 1000); // Update every second
                } else {
                    alert('Please select a file to upload.');
                }
            });

            function showSuccessMessage() {
                uploadProgress.classList.add('hidden');
                document.getElementById('uploadArea').classList.add('hidden');
                successMessage.classList.remove('hidden');
            }

            function startCountdown() {
                let countdown = 10;
                timerDisplay.textContent = countdown;

                countdownInterval = setInterval(() => {
                    countdown--;
                    timerDisplay.textContent = countdown;

                    if (countdown <= 0) {
                        clearInterval(countdownInterval);
                        // Redirect to assignment list after countdown ends
                        var baseUrl = '{{ env("APP_URL") }}'; // Get the base URL dynamically
                        window.location.href = `${baseUrl}/students/studentassignment`;
                    }
                }, 1000);
            }

            // Back button click event
            backButton.addEventListener('click', () => {
                // Redirect to the main assignment list
                var baseUrl = '{{ env("APP_URL") }}';
                window.location.href = `${baseUrl}/students/studentassignment`;
            });

            function resetForm() {
                // Reset file input
                fileInput.value = '';
                // Hide file preview
                filePreview.classList.add('hidden');
                // Show placeholder again
                placeholder.classList.remove('hidden');
                // Reset progress bar
                progressBar.style.width = '0%';
                uploadStatus.textContent = '0% completed...';
                // Hide success message
                successMessage.classList.add('hidden');
                // Show upload area again
                document.getElementById('uploadArea').classList.remove('hidden');
                uploadProgress.classList.add('hidden');
            }
        </script>

    </body>

</html>