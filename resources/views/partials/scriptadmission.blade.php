<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', () => {
        // Sabhi forms ko same action attribute de
        const forms = document.querySelectorAll('.forms-to-submit');
        forms.forEach((form) => {
            console.log(form);
            form.action = "{{ route('submitapplication') }}";
        });


        const steps = document.querySelectorAll('.step-card');
        const contents = document.querySelectorAll('.content');
        const progressBar = document.getElementById('progress-bar');
        const signupForm = document.getElementById('signup-form');
        const nextToPersonalButton = document.getElementById('next-to-personal');
        const nextToTypeButton = document.getElementById('next-to-type');
        const nextToProgramButton = document.getElementById('next-to-program');
        const nextToParentButton = document.getElementById('next-to-parent');
        const nextToAcademicButton = document.getElementById('next-to-academic');
        const nextToAcademicInterButton = document.getElementById('next-to-academic-inter');
        const nextToAcademicTestButton = document.getElementById('next-to-academic-test');
        const nextToPaymentButton = document.getElementById('next-to-payment');
        const userForm = document.getElementById('user-form');
        const logoutButton = document.getElementById('logout-button');
        const programItems = document.querySelectorAll('.program-item');
        const typeItems = document.querySelectorAll('.type-item');
        const backToSignupButton = document.getElementById('back-to-signup');
        const backToProgramButton = document.getElementById('back-to-program');
        const backToTypeButton = document.getElementById('back-to-type');
        const backToPersonalButton = document.getElementById('back-to-personal');
        const backToParentButton = document.getElementById('back-to-parent');
        const backToAcademicButton = document.getElementById('back-to-academic');
        const backToAcademicInterButton = document.getElementById('back-to-academic-inter');
        const backToAcademicTestButton = document.getElementById('back-to-academic-test');

        // Function to switch between steps
        function showStep(stepNumber) {
            steps.forEach((step, index) => {
                step.classList.toggle('active', index === stepNumber - 1);
                if (index < stepNumber - 1) {
                    step.querySelector('svg').classList.replace('text-gray-300', 'text-blue-500');
                }
            });

            contents.forEach((content, index) => {
                content.classList.toggle('hidden', index !== stepNumber - 1);
            });

            // Update progress bar width
            progressBar.style.width = `${(stepNumber - 1) * 12.50}%`;

            // Show or hide back buttons
            backToSignupButton.classList.toggle('hidden', stepNumber === 1);
            backToProgramButton.classList.toggle('hidden', stepNumber === 2);
            backToTypeButton.classList.toggle('hidden', stepNumber === 3);
            backToPersonalButton.classList.toggle('hidden', stepNumber === 4);
            backToParentButton.classList.toggle('hidden', stepNumber === 5);
            backToAcademicButton.classList.toggle('hidden', stepNumber === 6);
            backToAcademicInterButton.classList.toggle('hidden', stepNumber === 7);
            backToAcademicTestButton.classList.toggle('hidden', stepNumber === 8);
        }


        const selectedProgramInput = document.getElementById('selected_program');
        // Handle program selection
        programItems.forEach(item => {
            item.addEventListener('click', function () {
                // Clear previously selected items
                programItems.forEach(el => el.classList.remove('bg-blue-500', 'text-white'));
                // Add active class to the clicked item
                this.classList.add('bg-blue-500', 'text-white');

                // Update the hidden input value with the selected program
                selectedProgramInput.value = this.getAttribute('data-program');
            });
        });

        const selectedTypeInput = document.getElementById('selected_type');
        // Handle program selection
        typeItems.forEach(item => {
            item.addEventListener('click', function () {
                typeItems.forEach(el => el.classList.remove('bg-blue-500', 'text-white'));
                this.classList.add('bg-blue-500', 'text-white');
                // Update the hidden input value with the selected program
                selectedTypeInput.value = this.getAttribute('data-type');
            });
        });

        // // Handle signup form submission
        // signupForm.addEventListener('submit', (e) => {
        //     e.preventDefault();
        //     showStep(2);
        // });
        // Handle next button click after selecting a program
        nextToProgramButton.addEventListener('click', (e) => {
            e.preventDefault();

            // Hide all previous error messages
            document.querySelectorAll('.text-red-500').forEach(el => el.classList.add('hidden'));

            let isValid = true;

            // Check each field
            const fields = [
                { id: 'email', helpId: 'email-help', message: 'Email is required' },
                { id: 'password', helpId: 'password-help', message: 'Password is required' },
            ];

            fields.forEach(field => {
                const input = document.getElementById(field.id);
                const helpText = document.getElementById(field.helpId);

                if (field.id === 'email') {
                    // Validate email format
                    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailPattern.test(input.value.trim())) {
                        helpText.textContent = 'Enter a valid email address';
                        helpText.classList.remove('hidden');
                        isValid = false;
                    }
                } else if (input.value.trim() === '') {
                    helpText.textContent = field.message; // Set error message
                    helpText.classList.remove('hidden'); // Show error message
                    isValid = false;
                }
            });

            if (isValid) {
                const email = document.getElementById('email').value;
                const csrfToken = document.querySelector('input[name="_token"]').value;

                // AJAX request
                const xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('checkEmail') }}', true);
                xhr.setRequestHeader('Content-Type', 'application/json');
                xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);

                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4) {
                        if (xhr.status === 200) {
                            const response = JSON.parse(xhr.responseText);
                            if (response.success) {
                                // Proceed to the next step
                                showStep(2);
                            } else {
                                // Show error if email exists
                                const emailHelp = document.getElementById('email-help');
                                emailHelp.textContent = response.message || 'This email is already registered.';
                                emailHelp.classList.remove('hidden');
                            }
                        } else {
                            console.error('Error during the AJAX request:', xhr.statusText);
                        }
                    }
                };

                // Send data
                xhr.send(JSON.stringify({ email }));
            }
        });


        // Handle next button click after selecting a program
        nextToTypeButton.addEventListener('click', (e) => {
            if (document.querySelector('.program-item.bg-blue-500')) {
                e.preventDefault();
                showStep(3);
                console.log(selectedProgramInput);
            } else {
                e.preventDefault();
                // alert('Please select a Program.');
                showToast('Please select a Program.', 'error');
            }
        });

        // Handle next button click after selecting a program
        nextToPersonalButton.addEventListener('click', (e) => {
            if (document.querySelector('.type-item.bg-blue-500')) {
                e.preventDefault();
                showStep(4);
                console.log(selectedTypeInput);
            } else {
                e.preventDefault();
                // alert('Please select a Type.');
                showToast('Please select a Type.', 'error');
            }
        });

        // Handle next button click after selecting a program
        nextToParentButton.addEventListener('click', (e) => {
            e.preventDefault();
            // Hide all previous error messages
            document.querySelectorAll('.text-red-500').forEach(el => el.classList.add('hidden'));

            let isValid = true;

            // Check each field
            const fields = [
                { id: 'name', helpId: 'name-help', message: 'Name is required' },
                { id: 'phone', helpId: 'phone-help', message: 'Phone number is required' },
                { id: 'cnic', helpId: 'cnic-help', message: 'CNIC is required' },
                { id: 'city', helpId: 'city-help', message: 'City is required' },
                { id: 'address', helpId: 'address-help', message: 'Address is required' }
            ];

            fields.forEach(field => {
                const input = document.getElementById(field.id);
                const helpText = document.getElementById(field.helpId);

                if (input.value.trim() === '') {
                    helpText.textContent = field.message; // Set error message
                    helpText.classList.remove('hidden'); // Show error message
                    isValid = false;
                }
            });

            if (isValid) {
                showStep(5); // Proceed to the next step if all fields are valid
            }
        });

        // Handle next button click after selecting a program
        nextToAcademicButton.addEventListener('click', (e) => {
            e.preventDefault();
            // Hide all previous error messages
            document.querySelectorAll('.text-red-500').forEach(el => el.classList.add('hidden'));

            let isValid = true;

            // Check each field
            const fields = [
                { id: 'fathername', helpId: 'fathername-help', message: 'Name is required' },
                { id: 'fatherphone', helpId: 'fatherphone-help', message: 'Phone number is required' },
                 // { id: 'fathercnic', helpId: 'fathercnic-help', message: 'CNIC is required' },
                // { id: 'fatheremail', helpId: 'fatheremail-help', message: 'Email is required' },
            ];

            fields.forEach(field => {
                const input = document.getElementById(field.id);
                const helpText = document.getElementById(field.helpId);

                if (field.id === 'fatheremail') {
                    // Validate email format
                    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailPattern.test(input.value.trim())) {
                        helpText.textContent = 'Enter a valid email address';
                        helpText.classList.remove('hidden');
                        isValid = false;
                    }
                } else if (input.value.trim() === '') {
                    helpText.textContent = field.message; // Set error message
                    helpText.classList.remove('hidden'); // Show error message
                    isValid = false;
                }
            });
            if (isValid) {
                showStep(6);
            }
        });

        // Handle next button click after selecting a program
        nextToAcademicInterButton.addEventListener('click', (e) => {
            e.preventDefault();
            // Hide all previous error messages
            document.querySelectorAll('.text-red-500').forEach(el => el.classList.add('hidden'));

            let isValid = true;

            // Check each field
            const fields = [
                { id: 'totalmarks', helpId: 'totalmarks-help', message: 'Totalmarks is required' },
                { id: 'obtainmarks', helpId: 'obtainmarks-help', message: 'Obtainmarks number is required' },
                { id: 'year', helpId: 'year-help', message: 'Year is required' },
                { id: 'board', helpId: 'board-help', message: 'Board is required' },
            ];

            fields.forEach(field => {
                const input = document.getElementById(field.id);
                const helpText = document.getElementById(field.helpId);

                if (input.value.trim() === '') {
                    helpText.textContent = field.message; // Set error message
                    helpText.classList.remove('hidden'); // Show error message
                    isValid = false;
                }
            });

            if (isValid) {
                showStep(7);
            }
        });

       // Handle next button click after selecting a program
        nextToAcademicTestButton.addEventListener('click', (e) => {
            e.preventDefault();
            // Hide all previous error messages
            document.querySelectorAll('.text-red-500').forEach(el => el.classList.add('hidden'));

            let isValid = true;

            // Check each field
            const fields = [
                { id: 'fsctotalmarks', helpId: 'fsctotalmarks-help', message: 'Totalmarks is required' },
                { id: 'fscobtainmarks', helpId: 'fscobtainmarks-help', message: 'Obtainmarks number is required' },
                { id: 'fscbiomarks', helpId: 'fscbiomarks-help', message: 'Bio Marks is required' },
                { id: 'fscchemistrymarks', helpId: 'fscchemistrymarks-help', message: 'Chemistry Marks is required' },
                { id: 'fscphymarks', helpId: 'fscphymarks-help', message: 'Physic Marks is required' },
                { id: 'fscyear', helpId: 'fscyear-help', message: 'Year is required' },
                { id: 'fscboard', helpId: 'fscboard-help', message: 'Board is required' },
            ];

            fields.forEach(field => {
                const input = document.getElementById(field.id);
                const helpText = document.getElementById(field.helpId);

                if (input.value.trim() === '') {
                    helpText.textContent = field.message; // Set error message
                    helpText.classList.remove('hidden'); // Show error message
                    isValid = false;
                }
            });

            if (isValid) {
                showStep(8);
            }
        });

        // Array to hold all form data
        let allFormData = [];

        // Flag to track if all forms have been submitted
        let allFormsSubmitted = false;

        // Event listener on the button
        nextToPaymentButton.addEventListener('click', (e) => {
            e.preventDefault();

            // Hide all previous error messages
            document.querySelectorAll('.text-red-500').forEach(el => el.classList.add('hidden'));

            let isValid = true;
            let currentFormData = {}; // Object to hold the current form's data

            // Loop over each form
            forms.forEach((form, index) => {
                let formIsValid = true;

                // Collect data from each input in the form
                const inputs = form.querySelectorAll('input');
                inputs.forEach(input => {
                    // if (input.value.trim() === '') {
                    //     const helpText = document.getElementById(`${input.id}-help`);
                    //     helpText.textContent = `${input.name} is required`; // Show an error message if empty
                    //     helpText.classList.remove('hidden');
                    //     formIsValid = false;
                    // } else {
                        currentFormData[input.name] = input.value.trim(); // Store valid input data
                    // }
                });

                if (formIsValid) {
                    allFormData.push(currentFormData); // Store current form data into global array
                    currentFormData = {}; // Reset for next form
                } else {
                    isValid = false; // Stop if any form is invalid
                }
            });

            if (isValid) {
                // Check if this is the last form being processed
                if (forms.length === allFormData.length) {
                    allFormsSubmitted = true; // All forms processed successfully
                }

                // Display data in the console for now (you can use it later in your fetch call)
                console.log("All form data collected:", allFormData);
                fetch('{{ route('submitapplication') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify(allFormData) // Send all form data
                })
                    .then(response => response.json())
                    .then(data => {
                        console.log('Success:', data);
                        showStep(9);
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });

            }
        });





        // Handle form submission
        userForm.addEventListener('submit', (e) => {
            e.preventDefault();
            showStep(4);
        });

        // Handle logout
        logoutButton.addEventListener('click', () => {
            window.location.href = '/logout'; // Adjust the URL to your logout route
        });

        // Handle back button to go to previous step
        backToSignupButton.addEventListener('click', (e) => {
            e.preventDefault();
            showStep(1);
        });

        backToProgramButton.addEventListener('click', (e) => {
            e.preventDefault();
            showStep(2);
        });

        backToTypeButton.addEventListener('click', (e) => {
            e.preventDefault();
            showStep(3);
        });

        backToPersonalButton.addEventListener('click', (e) => {
            e.preventDefault();
            showStep(4);
        });

        backToParentButton.addEventListener('click', (e) => {
            e.preventDefault();
            showStep(5);
        });

        backToAcademicButton.addEventListener('click', (e) => {
            e.preventDefault();
            showStep(6);
        });

        backToAcademicInterButton.addEventListener('click', (e) => {
            e.preventDefault();
            showStep(7);
        });


    //    // Initial display setup
    //     showStep(5);






        function showToast(message, type = 'error') {
            const toastContainer = document.getElementById('toast-container');
            const toast = document.createElement('div');
            toast.className = `toast toast-${type}`;
            toast.innerHTML = `
        <span>${message}</span>
        <span class="close-btn">&times;</span>
    `;

            // Append toast to container
            toastContainer.appendChild(toast);

            // Remove toast after 3 seconds
            setTimeout(() => {
                toast.classList.add('opacity-0');
                setTimeout(() => {
                    toast.remove();
                }, 500);
            }, 3000);

            // Close button functionality
            toast.querySelector('.close-btn').addEventListener('click', () => {
                toast.remove();
            });
        }


        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {}
            }
        }

    });





    // Function to update progress bar and handle text changes
    function updateProgress() {
        let progressBar = document.getElementById('progressBar');
        let progressText = document.getElementById('progressText');
        let successIcon = document.getElementById('successIcon');
        let reviewMessage = document.getElementById('reviewMessage');
        let statusMessage = document.getElementById('statusMessage');
        let paymentmethod = document.getElementById('paymentmethod');
        let statusMessage2 = document.getElementById('statusMessage2');
        let width = 0;

        // Simulate progress increase
        let progressInterval = setInterval(function () {
            if (width >= 100) {
                clearInterval(progressInterval);
                // Show success icon when complete
                successIcon.style.display = 'block';
                paymentmethod.style.display = 'block';
                statusMessage2.style.display = 'block';
                reviewMessage.innerHTML = "Your Application is Submitted!";
                statusMessage.innerHTML = "Thank you for submitting your application. Our team is reviewing it, and we will notify you soon.";
            } else {
                width++;
                progressBar.style.width = width + '%';
                progressText.innerHTML = width + '% Complete';
            }
        }, 50); // Adjust the interval speed as needed
    }

    // Start progress when page loads
    window.onload = updateProgress;

</script>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>