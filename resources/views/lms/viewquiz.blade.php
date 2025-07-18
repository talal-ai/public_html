<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Quiz Attempt</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <style>
            body,
            html {
                margin: 0;
                padding: 0;
                height: 100%;
                font-family: 'Inter', sans-serif;
            }

            /* Neon Timer Styling */
            .timer {
                font-family: 'Orbitron', sans-serif;
                color: #ff4b4b;
                text-shadow: 0 0 10px #ff4b4b, 0 0 20px #ff4b4b, 0 0 30px #ff4b4b;
                animation: blink 1s infinite;
            }

            @keyframes blink {
                50% {
                    opacity: 0.7;
                }
            }

            /* Import custom font */
            @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@500&display=swap');
        </style>
    </head>
    <body class="bg-gradient-to-br from-blue-100 to-blue-200">
        <form id="quiz-form">
            @csrf
            <!-- Hidden inputs to store quiz and user information -->
            <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">
            <input type="hidden" name="user_id" value="{{ $user->id }}">
            <input type="hidden" name="start_date" value="{{ $quiz->start_date }}">
            <input type="hidden" name="end_date" value="{{ $quiz->end_date }}">
            <input type="hidden" name="percentage" value="{{ $quiz->percentage }}">
            <input type="hidden" name="quiztime" value="{{ $quiz->quiztime }}">
            <input type="hidden" name="totalquestion_number" value="{{ $quiz->totalquestion_number }}">
            @foreach($quizData as $index => $question)
                <input type="hidden" id="questiondata-{{ $question['questionid'] }}"
                    name="questions[{{ $index }}][questionid]" value="{{ $question['questionid'] }}">
                <input type="hidden" name="questions[{{ $index }}][selectedoptionid]"
                    value="{{ $question['selectedAnswer'] == 0 ? '' : $question['selectedAnswer'] }}">
                <!-- This will be dynamically set -->
                <input type="hidden" name="questions[{{ $index }}][correctoptionid]"
                    value="{{ $question['correctAnswerId'] }}">
                <input type="hidden" name="questions[{{ $index }}][questionmarks]" value="{{ $question['marks'] }}">
            @endforeach
            <!-- Full-Screen Quiz Container -->
            <div id="quiz-container" class="flex items-center justify-center h-screen">
                <div class="w-full max-w-3xl bg-white shadow-xl rounded-lg p-8 relative">
                    <!-- Timer -->
                    <div class="absolute top-5 right-5">
                        <div class="text-2xl font-bold timer" id="timer"></div>
                    </div>

                    <!-- Question -->
                    <div class="text-2xl font-semibold mb-6 text-gray-800" id="question-text"></div>

                    <!-- Options -->
                    <div id="options-container" class="space-y-4 mb-8"></div>

                    <!-- Navigation Buttons -->
                    <div class="flex justify-between">
                        <button type="button" style="display:none;"
                            class="flex items-center bg-blue-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-600 transition duration-300"
                            id="previous">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7">
                                </path>
                            </svg>
                            Previous
                        </button>
                        <button type="button"
                            class="flex items-center bg-blue-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-600 transition duration-300"
                            id="next">
                            Save and Next
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </button>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-center mt-8">
                        <button type="button"
                            class="bg-green-500 text-white px-8 py-3 rounded-lg font-semibold hover:bg-green-600 transition duration-300"
                            id="submit">
                            Submit Quiz
                        </button>
                    </div>
                </div>
            </div>
        </form>
        <!-- Modal for Unanswered Questions -->
        <div id="modal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex justify-center items-center hidden">
            <div class="bg-white p-8 rounded-lg shadow-lg text-center">
                <h2 class="text-xl font-bold mb-4">Unanswered Questions</h2>
                <p id="modal-text" class="text-gray-600 mb-6">You have X unanswered questions. Do you want to submit the
                    quiz anyway?</p>
                <div class="flex justify-center space-x-4">
                    <button id="modal-confirm"
                        class="bg-green-500 text-white px-6 py-2 rounded-lg hover:bg-green-600">Yes, Submit</button>
                    <button id="modal-cancel"
                        class="bg-red-500 text-white px-6 py-2 rounded-lg hover:bg-red-600">Cancel</button>
                </div>
            </div>
        </div>

        <script>
            // Pass PHP data to JavaScript in the desired format
            const quizData = @json($quizData); // Passing the quiz data as is
            function shuffle(array) {
                for (let i = array.length - 1; i > 0; i--) {
                    const j = Math.floor(Math.random() * (i + 1));
                    [array[i], array[j]] = [array[j], array[i]]; // Swap
                }
                return array;
            }

            // // Check the structure of the quizData
            // console.log(quizData); // This should show your structured data in the console

            // quizData.forEach(item => {
            //     console.log(item.question);  // Log the real question
            //     console.log(item.options);   // Log the real options
            //     console.log(item.correctAnswer); // Log the correct answer
            // });

            // Pass the quiz start time to JavaScript

            let currentQuestionIndex = 0;
            let userAnswers = new Array(quizData.length).fill(null);
            let timeLeft = {{ $quiz->quiztime }} * 60;
            const totalQuestions = quizData.length;


            const optionsContainer = document.getElementById('options-container');
            const questionText = document.getElementById('question-text');
            const modal = document.getElementById('modal');
            const modalText = document.getElementById('modal-text');

            // Get the quiz start time and current time from the server
            let quizStartTime = '{{ $quizstartTime }}'; // Format: 'H:i:s'
            let currentTime = '{{ $currentTime }}'; // Format: 'H:i:s'

            // Function to convert time string (H:i:s) to seconds
            function timeStringToSeconds(timeString) {
                const [hours, minutes, seconds] = timeString.split(':').map(Number);
                return hours * 3600 + minutes * 60 + seconds; // Convert to total seconds
            }

            // Convert quiz start time and current time to seconds
            const quizStartTimeInSeconds = timeStringToSeconds(quizStartTime);
            const currentTimeInSeconds = timeStringToSeconds(currentTime);

            // Get the quiz time duration (in seconds)
            let quizDurationInSeconds = {{ $quiz->quiztime }} * 60; // Convert minutes to seconds

            // Calculate the elapsed time since the quiz started
            let elapsedTimeInSeconds = currentTimeInSeconds - quizStartTimeInSeconds;

            // Calculate remaining time for the quiz
            let timeLeftInSeconds = quizDurationInSeconds - elapsedTimeInSeconds;

            // Ensure time left is not negative
            timeLeftInSeconds = Math.max(0, timeLeftInSeconds);

            // Function to format time from seconds to MM:SS
            function formatTime(seconds) {
                const minutes = Math.floor(seconds / 60);
                const remainingSeconds = seconds % 60;

                // Format to MM:SS
                const formattedMinutes = String(minutes).padStart(2, '0'); // Ensure two digits
                const formattedSeconds = String(remainingSeconds).padStart(2, '0'); // Ensure two digits

                return `Time Left: ${formattedMinutes}:${formattedSeconds}`;
            }

            // Initialize timer display
            const timerDisplay = document.getElementById('timer');
            timerDisplay.textContent = formatTime(timeLeftInSeconds); // Show initial remaining time

            // Timer Logic
            const countdown = setInterval(() => {
                timeLeftInSeconds--; // Decrease remaining time by 1 second
                timerDisplay.textContent = formatTime(timeLeftInSeconds); // Update timer display

                // Stop the timer when time is up
                if (timeLeftInSeconds <= 0) {
                    clearInterval(countdown); // Clear the interval to stop the countdown
                    submitQuiztimeexpire(false); // Auto-submit when time is up
                }
            }, 1000);



            function loadQuestion(index) {
                const currentQuestion = quizData[index];
                questionText.innerHTML = `Question ${index + 1}: ${currentQuestion.question}`;
                optionsContainer.innerHTML = '';

                // Shuffle options if shuffleAnswer is enabled
                let optionsToDisplay = currentQuestion.options;


                // Loop through each option
                optionsToDisplay.forEach((option, optionIndex) => {
                    const optionLabel = document.createElement('label');
                    optionLabel.classList.add('block', 'bg-gray-100', 'rounded-lg', 'p-4', 'cursor-pointer', 'hover:bg-gray-200', 'transition', 'duration-300', 'flex', 'items-center');

                    const optionInput = document.createElement('input');
                    optionInput.type = 'radio';
                    optionInput.name = `questions[${index}][selectedoptionid]`; // Unique name for each question
                    optionInput.value = currentQuestion.optionsquestionid[optionIndex]; // Set value to option ID
                    optionInput.classList.add('mr-3');


                    // Check if the option's ID matches the previously selected answer ID
                    if (
                        (userAnswers[index] && userAnswers[index].selectedAnswerId === optionInput.value) ||
                        (currentQuestion.selectedAnswer && currentQuestion.selectedAnswer === optionInput.value)
                    ) {
                        optionInput.checked = true;

                        // Store the checked answer in userAnswers array on load
                        userAnswers[index] = { selectedAnswerId: optionInput.value };
                        console.log(userAnswers);
                    }

                    // Add data attributes for question ID
                    optionInput.setAttribute('data-questionid', currentQuestion.questionid);

                    optionInput.addEventListener('change', () => {
                        // Get the question ID directly from currentQuestion
                        const questionId = currentQuestion.questionid;
                        const selectedOptionId = optionInput.value; // Get the selected answer ID (which is the option ID)

                        // Store the selected option in userAnswers by its ID
                        userAnswers[index] = { selectedAnswerId: selectedOptionId };

                        // Update the corresponding hidden input for selected option ID
                        const hiddenInput = document.querySelector(`input[name="questions[${index}][selectedoptionid]"]`);
                        if (hiddenInput) {
                            hiddenInput.value = selectedOptionId; // Set the selected option ID
                            console.log(`Updated selectedoptionid for question ${questionId} to ${selectedOptionId}`);
                        } else {
                            console.error(`Hidden input for selected option ID not found.`);
                        }
                    });

                    const optionText = document.createElement('span');
                    optionText.classList.add('text-lg');
                    optionText.textContent = option.name; // Display the option text

                    optionLabel.appendChild(optionInput);
                    optionLabel.appendChild(optionText);
                    optionsContainer.appendChild(optionLabel);
                });
            }





            // Load the first question
            loadQuestion(currentQuestionIndex);
            const nextButton = document.getElementById('next');
            const previousButton = document.getElementById('previous');

            function updateButtons() {
                // Hide previous button on the first question, show it otherwise
                if (currentQuestionIndex === 0) {
                    previousButton.style.display = 'none';
                } else {
                    previousButton.style.display = 'flex';
                }

                // Show next button on non-final question or handle custom display logic as needed
                nextButton.style.display = 'flex';
            }

            // Initial call to set button visibility based on the first question
            updateButtons();
            document.getElementById('previous').addEventListener('click', function () {
                if (currentQuestionIndex > 0) {
                    currentQuestionIndex--;
                    loadQuestion(currentQuestionIndex);
                    updateButtons(); // Update buttons based on the new question index
                }
            });


            document.getElementById('next').addEventListener('click', function () {
                const nextButton = document.getElementById('next');
                const previousButton = document.getElementById('previous');
                const quizForm = document.getElementById('quiz-form');
                const formData = new FormData(quizForm);

                // Hide the button by setting display to none
                previousButton.style.display = 'flex';
                const baseUrl = '{{ env("APP_URL") }}/quiz';

                // AJAX request to submit the current question’s data only
                fetch(`${baseUrl}/submitquestion`, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                    .then(response => response.json())
                    .then(data => {
                        console.log(data);
                        if (currentQuestionIndex < totalQuestions - 1) {
                            currentQuestionIndex++;
                            loadQuestion(currentQuestionIndex); // Load the next question

                            // Update button text to "Save and Next" if there are more questions
                            nextButton.innerHTML = `
                                Save and Next
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            `;
                        } else {
                            console.log("Quiz completed.");

                            // Hide the button by setting display to none
                            nextButton.style.display = 'none';
                        }
                    })
                    .catch(error => {
                        console.error('Error submitting quiz question:', error);
                    });
            });



            // Prevent the user from navigating away without submitting
            // window.addEventListener('beforeunload', function (e) {
            //     // Show the default browser dialog
            //     e.preventDefault();
            //     modalText.textContent = `You have unsaved progress. If you reload, your quiz progress will be lost.`;
            //     modal.classList.remove('hidden');
            //     // Page reload ko rokne ke liye
            //     e.stopPropagation();
            //     e.cancelBubble = true;
            // });

            // window.onkeydown = function (e) {
            //     if (e.keyCode === 116 || (e.ctrlKey && e.keyCode === 82)) {
            //         e.preventDefault(); // Prevent default F5 or Ctrl+R
            //     }
            // };

            // window.addEventListener('popstate', function (e) {
            //     // Show custom modal for back navigation
            //     modalText.textContent = 'Are you sure you want to navigate away from this page?';
            //     modal.classList.remove('hidden');
            // });

            document.getElementById('submit').addEventListener('click', function () {
                const remainingQuestions = userAnswers.filter(answer => answer === null).length;

                if (remainingQuestions > 0) {
                    // Show the modal instead of alert
                    modalText.textContent = `You have ${remainingQuestions} unanswered questions. Do you want to submit the quiz anyway?`;
                    modal.classList.remove('hidden');
                } else {
                    submitQuiz(true);
                }
            });



            document.getElementById('modal-confirm').addEventListener('click', function () {
                modal.classList.add('hidden');
                submitQuiz(true); // User confirmed to submit
            });

            document.getElementById('modal-cancel').addEventListener('click', function () {
                modal.classList.add('hidden'); // User canceled submission
            });

            function submitQuiz(isManualSubmit) {
                if (isManualSubmit) clearInterval(countdown);
                // Prepare the form data to submit
                const quizForm = document.getElementById('quiz-form');
                const formData = new FormData(quizForm);

                let correctAnswers = 0;
                let attempted = 0;
                let totalQuestions = {{ count($quizData) }}; // You may need to replace this with the actual count of questions
                console.log('totalQuestions:', totalQuestions);
                // Loop through each question to compare selectedoptionid with correctoptionid
                for (let index = 0; index < totalQuestions; index++) {
                    const selectedOptionId = formData.get(`questions[${index}][selectedoptionid]`); // Get the selected option ID
                    const correctOptionId = formData.get(`questions[${index}][correctoptionid]`); // Get the correct option ID
                    console.log('selected id:', selectedOptionId);
                    console.log('correct id:', correctOptionId);
                    // Check if the question has been attempted (i.e., selectedOptionId is not empty)
                    if (selectedOptionId) {
                        attempted++;

                        // Compare selectedOptionId with correctOptionId
                        if (selectedOptionId === correctOptionId) {
                            correctAnswers++; // Increment correct answers count if they match
                        }
                    }
                }
                const incorrectAnswers = attempted - correctAnswers;



                // // Append user answers to form data
                // userAnswers.forEach((answer, index) => {
                //     formData.append(`userAnswers[${index}]`, answer !== null ? answer : '');
                // });

                // Log the form data for debugging
                // for (let pair of formData.entries()) {
                //     console.log(pair[0] + ': ' + pair[1]);
                // }

                var baseUrl = '{{ env("APP_URL") }}/quiz'; // Get the base URL dynamically

                // Send the form data via AJAX
                fetch(`${baseUrl}/submitquiz`, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                    .then(response => response.json())
                    .then(data => {
                        console.log(data);
                        // After successful submission, display the results
                        document.getElementById('quiz-container').innerHTML = `
                <div class="w-full max-w-xl mx-auto bg-white shadow-lg rounded-lg p-10 text-center">
                    ${timeLeft === 0 && !isManualSubmit ?
                                `<div class="text-red-600 font-bold text-3xl mb-6">Time's Up!</div>
                         <div class="text-gray-500 text-lg mb-6">Your quiz was auto-submitted.</div>` :
                                `<div class="text-green-600 font-bold text-3xl mb-6">Quiz Submitted!</div>
                         <div class="text-gray-500 text-lg mb-6">Here are your results.</div>`}
                    
                    <div class="flex justify-between bg-gray-100 p-4 rounded-lg mb-4">
                        <span class="font-semibold text-lg">Total Questions:</span>
                        <span class="text-xl">${totalQuestions}</span>
                    </div>
                    <div class="flex justify-between bg-gray-100 p-4 rounded-lg mb-4">
                        <span class="font-semibold text-lg">Attempted:</span>
                        <span class="text-xl">${attempted}</span>
                    </div>
                    <div class="flex justify-between bg-gray-100 p-4 rounded-lg mb-4">
                        <span class="font-semibold text-lg">Correct Answers:</span>
                        <span class="text-xl text-green-600">${correctAnswers}</span>
                    </div>
                    <div class="flex justify-between bg-gray-100 p-4 rounded-lg mb-4">
                        <span class="font-semibold text-lg">Incorrect Answers:</span>
                        <span class="text-xl text-red-600">${incorrectAnswers}</span>
                    </div>

                    <div class="mt-8">
                        <div class="text-2xl font-bold text-gray-800 mb-2">Your Score</div>
                        <div class="text-4xl font-extrabold text-blue-600">${correctAnswers} / ${totalQuestions}</div>
                    </div>
                    <div class="mt-8 flex justify-center">
                    <button type="button" 
                    onclick="window.history.back()"
                            class="flex items-center bg-blue-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-600 transition duration-300">
                            Back To Quiz List
                        </button>
                    </div>

                    ${timeLeft === 0 && !isManualSubmit ?
                                `<div class="mt-8">
                            <div class="text-red-500 font-bold">You couldn't complete the quiz in time.</div>
                            <p class="text-gray-600 text-sm">Better luck next time!</p>
                        </div>` : ''}
                </div>
            `;
                    })
                    .catch(error => {
                        console.error('Error submitting quiz:', error);
                    });
            }

            function submitQuiztimeexpire(isManualSubmit) {
                if (isManualSubmit) clearInterval(countdown);
                // Prepare the form data to submit
                const quizForm = document.getElementById('quiz-form');
                const formData = new FormData(quizForm);

                let correctAnswers = 0;
                let attempted = 0;
                let totalQuestions = {{ count($quizData) }}; // You may need to replace this with the actual count of questions

                // Loop through each question to compare selectedoptionid with correctoptionid
                for (let index = 0; index < totalQuestions; index++) {
                    const selectedOptionId = formData.get(`questions[${index}][selectedoptionid]`); // Get the selected option ID
                    const correctOptionId = formData.get(`questions[${index}][correctoptionid]`); // Get the correct option ID

                    // Check if the question has been attempted (i.e., selectedOptionId is not empty)
                    if (selectedOptionId) {
                        attempted++;

                        // Compare selectedOptionId with correctOptionId
                        if (selectedOptionId === correctOptionId) {
                            correctAnswers++; // Increment correct answers count if they match
                        }
                    }
                }
                const incorrectAnswers = attempted - correctAnswers;



                // // Append user answers to form data
                // userAnswers.forEach((answer, index) => {
                //     formData.append(`userAnswers[${index}]`, answer !== null ? answer : '');
                // });

                // Log the form data for debugging
                // for (let pair of formData.entries()) {
                //     console.log(pair[0] + ': ' + pair[1]);
                // }

                var baseUrl = '{{ env("APP_URL") }}/quiz'; // Get the base URL dynamically

                // Send the form data via AJAX
                fetch(`${baseUrl}/submitquiztimeexpire`, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                    .then(response => response.json())
                    .then(data => {
                        console.log(data);
                        // After successful submission, display the results
                        document.getElementById('quiz-container').innerHTML = `
                <div class="w-full max-w-xl mx-auto bg-white shadow-lg rounded-lg p-10 text-center">
                    ${timeLeft === 0 && !isManualSubmit ?
                                `<div class="text-red-600 font-bold text-3xl mb-6">Time's Up!</div>
                         <div class="text-gray-500 text-lg mb-6">Your quiz was auto-submitted.</div>` :
                                `<div class="text-green-600 font-bold text-3xl mb-6">Quiz Submitted!</div>
                         <div class="text-gray-500 text-lg mb-6">Here are your results.</div>`}
                    
                    <div class="flex justify-between bg-gray-100 p-4 rounded-lg mb-4">
                        <span class="font-semibold text-lg">Total Questions:</span>
                        <span class="text-xl">${totalQuestions}</span>
                    </div>
                    <div class="flex justify-between bg-gray-100 p-4 rounded-lg mb-4">
                        <span class="font-semibold text-lg">Attempted:</span>
                        <span class="text-xl">${attempted}</span>
                    </div>
                    <div class="flex justify-between bg-gray-100 p-4 rounded-lg mb-4">
                        <span class="font-semibold text-lg">Correct Answers:</span>
                        <span class="text-xl text-green-600">${correctAnswers}</span>
                    </div>
                    <div class="flex justify-between bg-gray-100 p-4 rounded-lg mb-4">
                        <span class="font-semibold text-lg">Incorrect Answers:</span>
                        <span class="text-xl text-red-600">${incorrectAnswers}</span>
                    </div>

                    <div class="mt-8">
                        <div class="text-2xl font-bold text-gray-800 mb-2">Your Score</div>
                        <div class="text-4xl font-extrabold text-blue-600">${correctAnswers} / ${totalQuestions}</div>
                    </div>
                    <div class="mt-8 flex justify-center">
                    <button type="button" 
                    onclick="window.history.back()"
                            class="flex items-center bg-blue-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-600 transition duration-300">
                            Back To Quiz List
                        </button>
                    </div>

                    ${timeLeft === 0 && !isManualSubmit ?
                                `<div class="mt-8">
                            <div class="text-red-500 font-bold">You couldn't complete the quiz in time.</div>
                            <p class="text-gray-600 text-sm">Better luck next time!</p>
                        </div>` : ''}
                </div>
            `;
                    })
                    .catch(error => {
                        console.error('Error submitting quiz:', error);
                    });
            }

        </script>
    </body>

</html>