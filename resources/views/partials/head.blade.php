<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Premium Laravel Admin & Dashboard Template" />
    <meta name="author" content="Webonzer" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Site Tiltle -->
    <title>RAHBAR-LEARNING MANAGEMENT SYSTEM</title>

    <!-- Favicon Icon -->
    <link rel="shortcut icon" href="{{ asset('public/assets/images/favicon.ico') }}">

    <link rel="stylesheet" href="https://noorulaintrader.site/public/assets/css/loadingstyle.css">
    <link rel="stylesheet" href="https://noorulaintrader.site/public/assets/css/component.css">
    <link rel="stylesheet" href="https://noorulaintrader.site/public/assets/css/normalize.css">
    <script src="https://noorulaintrader.site/public/assets/js/modernizr.custom.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/tinymce@4.9.11/tinymce.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.6.347/pdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.6.347/pdf_viewer.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.6.347/pdf_viewer.min.css"/>



    @yield('css')
    @yield('style')

    <style>
        /* Hide the arrows in WebKit browsers (Chrome, Safari) */
        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Hide the arrows in Firefox */
        input[type="number"] {
            -moz-appearance: textfield;
        }


        /* CSS for the overlay */
        #overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.9);
            /* White color with 70% opacity */
            z-index: 9998;
            /* Set z-index lower than loader to appear behind the loader */
        }

        .lds-ring {
            display: none;
            position: fixed;
            width: 80px;
            height: 80px;
            /* margin-left: 50%; */
            top: 40%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 9999;
        }
    </style>
    <!-- Style Css -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/style.css') }}">

</head>