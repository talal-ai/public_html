<?php
if (!function_exists('formatDate')) {
    function formatDate($date)
    {
        $date = \Carbon\Carbon::parse($date);
        $day = $date->format('j');
        $month = $date->format('M');
        $year = $date->format('Y');

        // Get the suffix for the day (st, nd, rd, th)
        $suffix = '';
        if ($day == 1 || $day == 21 || $day == 31) {
            $suffix = 'st';
        } elseif ($day == 2 || $day == 22) {
            $suffix = 'nd';
        } elseif ($day == 3 || $day == 23) {
            $suffix = 'rd';
        } else {
            $suffix = 'th';
        }

        return "{$day}{$suffix} {$month}, {$year}";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Assignment Details | Rahbar LMS</title>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    </head>

    <body class="bg-gradient-to-br from-blue-50 to-blue-100 font-sans leading-relaxed tracking-normal text-gray-800">
        @foreach ($assignmentsData as $assignment)
                @php
                    // The assignment file path
                    $assignmentFilePath = $assignment['assignmentfile'];
                    $today = date('Y-m-d');
                    // Split the path into parts
                    $parts = explode('/', $assignmentFilePath);
                    // Get the year and month
                    $year = $parts[4]; // Assuming year is the 4th part
                    $month = $parts[5]; // Assuming month is the 5th part
                    $filename = $parts[6]; // Assuming month is the 5th part
                    $filename = str_replace('.pdf', '', $parts[6]);
                @endphp
                <div class="container mx-auto p-10 max-w-4xl">
                    <div class="bg-white shadow-2xl rounded-2xl p-12 relative">
                        <!-- Header Section -->
                        <div class="flex items-center justify-between mb-8 border-b-2 pb-6 border-gray-200">
                            <div class="flex items-center">
                                <div class="flex items-center justify-center w-16 h-16 bg-blue-100 rounded-full mr-6">
                                    <svg class="w-8 h-8 text-blue-500" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2zm1 15h-2v-2h2zm0-4h-2V7h2z" />
                                    </svg>
                                </div>
                                <div>
                                    <h1 class="text-4xl font-extrabold text-blue-700">
                                        {{ strtoupper(str_replace('_', ' ', $assignment['topic'])) }}
                                    </h1>
                                    <p class="text-gray-500 mt-1">Stay on top of your tasks and submit on time.</p>
                                </div>
                            </div>
                            <!-- Assignment Status -->
                            @if ($today > $assignment['end_date'])
                                <span
                                    class="inline-block px-6 py-3 text-base font-bold text-red-800 bg-red-100 rounded-full">Expired</span>

                            @else
                                <span
                                    class="inline-block px-6 py-3 text-base font-bold text-green-800 bg-green-100 rounded-full">Active</span>
                            @endif
                        </div>

                        <!-- Assignment Start and End Date -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                            <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-8 rounded-lg shadow-inner">
                                <p class="text-sm font-semibold text-gray-600 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-blue-500" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M19 3h-1V2a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1v1H5a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2zM8 2h8v1H8zm9 18H7V6h10z" />
                                    </svg> Start Date
                                </p>
                                <p class="text-2xl font-bold text-gray-800 mt-2">
                                    {{ formatDate($assignment['start_date']) }}
                                </p>
                            </div>
                            <div class="bg-gradient-to-br p-8 rounded-lg shadow-inner">
                                <p class="text-sm font-semibold text-gray-600 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-blue-500" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M19 3h-1V2a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1v1H5a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2zM8 2h8v1H8zm9 18H7V6h10z" />
                                    </svg> End Date
                                </p>
                                <p class="text-2xl font-bold text-gray-800 mt-2">
                                    {{ formatDate($assignment['end_date']) }}
                                </p>
                            </div>
                        </div>

                        <!-- Assignment Detail Paragraph -->
                        <div class="bg-gradient-to-br p-10 rounded-lg shadow-inner mb-10">
                            <p class="text-md font-semibold text-gray-900 mb-4"
                                style="background-color: #87A1EA;color:#fff;border-radius:10px;padding:10px; text-align: center;">
                                Assignment Detail</p>
                            <p class="text-lg text-gray-700 leading-relaxed">
                                {!! ($assignment['assignmentdetail']) !!}
                            </p>
                        </div>

                        <!-- Total Marks and Subject -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                            <div class="bg-gradient-to-br p-8 rounded-lg shadow-inner">
                                <p class="text-sm font-semibold text-gray-600 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-blue-500" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M5 4h4V3H5zm6 0h4V3h-4zM3 6h18v2H3zm0 3h18v13H3z" />
                                    </svg> Total Marks
                                </p>
                                <p class="text-2xl font-bold text-gray-800 mt-2">
                                    {{ $assignment['totalmarks'] }}
                                </p>
                            </div>
                            <div class="bg-gradient-to-br p-8 rounded-lg shadow-inner">
                                <p class="text-sm font-semibold text-gray-600 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-blue-500" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M2 4h20v2H2zm3 4h14v2H5zm0 4h10v2H5zm-3 4h20v2H2z" />
                                    </svg> Subject
                                </p>
                                <p class="text-2xl font-bold text-gray-800 mt-2">
                                    {{ $assignment['subjectname'] }}
                                </p>
                            </div>
                        </div>

                        <!-- Download Assignment File -->
                        <div class="flex justify-center mt-12">
                            <button
                                onclick="myComponent().handleDownload({{ $assignment['program_id'] }}, {{ $assignment['year_id'] }}, {{ $assignment['subject_id'] }},{{ $year}},{{ $month}}, '{{ $filename}}')"
                                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-12 rounded-full shadow-lg focus:outline-none focus:ring-4 focus:ring-blue-300 transition duration-300 transform hover:scale-105">
                                Download Assignment
                            </button>
                        </div>
                    </div>
                </div>
        @endforeach

        <script>
            function myComponent() {
                return {
                    handleDownload(programId, yearId, subjectId, year, month, filename) {
                        var baseUrl = '{{ env("APP_URL") }}/lms';
                        console.log('Program ID:', programId);
                        console.log('Year ID:', yearId);
                        console.log('Suject ID:', subjectId);
                        console.log('File Name:', filename);
                        console.log('Year:', year);
                        console.log('Month:', month);
                        window.location.href = baseUrl + `/downloadassignment/${programId}/${yearId}/${subjectId}/${year}/${month}/${filename}`; // Redirect to the download URL
                    }
                }
            }
        </script>

    </body>

</html>