<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admission Form - RAHBAR MEDICAL & DENTAL COLLEGE</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <style type="text/css">
        /* Tailwind CSS Overrides */
body {
    background-color: #f8fafc;
}

/* Step Card Styling */
.step-card {
    transition: color 0.3s;
    cursor: pointer;
    position: relative;
}

.step-card.active .text-lg {
    color: #000; /* Active color */
}

.step-card .text-lg {
    color: #000; /* Default text color */
}

/* Sidebar Background Image */
aside {
    background-size: cover;
    background-position: center;
}

/* Input Field Styling */
.input-field {
    width: 100%;
    padding: 12px;
    border: 1px solid #d1d5db;
    border-radius: 8px;
    background-color: #f9fafb;
    transition: border-color 0.3s;
}

.input-field:focus {
    border-color: #007bff;
    outline: none;
    background-color: #ffffff;
}

/* Button Styling */
.btn-primary {
    background-color: #006335;
    color: white;
    padding: 12px;
    border-radius: 8px;
    font-weight: bold;
    transition: background-color 0.3s;
}

.btn-primary:hover {
    background-color: #006335;
}
.bg-blue-500 {
    background-color: #006335 !important;
}

.btn-secondary {
    background-color: #6c757d;
    color: white;
    padding: 12px;
    border-radius: 8px;
    font-weight: bold;
    transition: background-color 0.3s;
}

.btn-secondary:hover {
    background-color: #5a6268;
}

/* Progress Bar */
#progress-bar {
    transition: width 0.3s ease-in-out;
}



/* Toast Notification Styles */
.toast {
    display: flex;
    align-items: center;
    background-color: #f8d7da;
    color: #721c24;
    padding: 12px 16px;
    border-left: 4px solid #f5c6cb;
    border-radius: 8px;
    min-width: 250px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    animation: slideInRight 0.5s forwards;
}

.toast.toast-success {
    background-color: #d4edda;
    color: #155724;
    border-left-color: #c3e6cb;
}

.toast.toast-info {
    background-color: #d1ecf1;
    color: #0c5460;
    border-left-color: #bee5eb;
}

.toast.toast-warning {
    background-color: #fff3cd;
    color: #856404;
    border-left-color: #ffeeba;
}

.toast.toast-error {
    background-color: #f8d7da;
    color: #721c24;
    border-left-color: #f5c6cb;
}

@keyframes slideInRight {
    from {
        transform: translateX(100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}

.toast .close-btn {
    margin-left: auto;
    cursor: pointer;
}

    </style>
</head>