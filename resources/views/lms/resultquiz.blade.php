<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Quiz Reuslt</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <style>
            body,
            html {
                margin: 0;
                padding: 0;
                height: 100%;
                font-family: 'Inter', sans-serif;
            }

            /* Import custom font */
            @import url('https://fonts.googleapis.com/css2?family=Orbitron:wght@500&display=swap');
        </style>
    </head>

    <body class="bg-gradient-to-br from-blue-100 to-blue-200">
        <!-- Full-Screen Quiz Container -->
        <div id="quiz-container" class="flex items-center justify-center h-screen">
            <div class="w-full max-w-3xl bg-white shadow-xl rounded-lg p-8 relative">
                <div class="text-2xl font-semibold mb-6 text-gray-800">
                    {{$message}}
                </div>
                <div class="mt-8 flex justify-center">
                    <button type="button" onclick="window.history.back()"
                        class="flex items-center bg-blue-500 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-600 transition duration-300">
                        Back To Quiz List
                    </button>
                </div>
            </div>
        </div>
    </body>

</html>