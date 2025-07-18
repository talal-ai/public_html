@extends('Layout.layout')

@section('content')

<div class="flex flex-col gap-5 min-h-[calc(100vh-188px)] sm:min-h-[calc(100vh-204px)]">
    <div class="grid grid-cols-1">
        <div>
            <ul class="flex flex-wrap items-center text-sm font-semibold space-x-2.5">
                <li class="flex items-center space-x-2.5 text-gray hover:text-dark dark:hover:text-white duration-300">
                    <a href="javaScript:;">Admission</a>
                    <svg class="text-gray/50" width="8" height="10" viewBox="0 0 8 10" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.5"
                            d="M1.33644 0H4.19579C4.60351 0 5.11318 0.264045 5.32903 0.589888L7.83532 4.3427C8.07516 4.70787 8.05119 5.2809 7.77538 5.6236L4.66949 9.5C4.44764 9.77528 3.96795 10 3.6022 10H1.33644C0.287156 10 -0.348385 8.92135 0.203241 8.08427L1.86409 5.59551C2.08594 5.26405 2.08594 4.72472 1.86409 4.39326L0.203241 1.90449C-0.348385 1.07865 0.293152 0 1.33644 0Z"
                            fill="currentColor" />
                    </svg>
                </li>
                <li>Application Forms</li>
            </ul>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-1 gap-5">
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg" style="width: 65%; margin:0 auto;">
            <h2 class="text-base font-semibold mb-4">Basic Information</h2>
            <form class="space-y-4" action="{{ route('submitapplication') }}" method="POST">
            @csrf
                <div class="space-y-2">
                    <label for="username1" class="text-sm text-lightgray">Name:</label>
                    <input id="firstname" name="firstname" type="text" class="form-input" placeholder="Name"
                        required="">
                </div>
                <div class="space-y-2">
                    <label for="username1" class="text-sm text-lightgray">Father Name:</label>
                    <input id="fathername" name="fathername" type="text" class="form-input" placeholder="Father Name"
                        required="">
                </div>
                <div class="space-y-2">
                    <label for="username1" class="text-sm text-lightgray">Father Phone Number:</label>
                    <input id="fatherphonenumber" name="fatherphonenumber" type="number" class="form-input" placeholder="Father Phone Number"
                        required="">
                </div>
                <div class="space-y-2">
                    <label for="username1" class="text-sm text-lightgray">Phone Number:</label>
                    <input id="phonenumber" name="phonenumber" type="number" class="form-input"
                        placeholder="Phone Number" required="">
                </div>
                <div class="space-y-2">
                    <label for="username1" class="text-sm text-lightgray">Email:</label>
                    <input id="email" name="email" type="email" class="form-input" placeholder="Email" required="">
                </div>
                <div class="space-y-2">
                    <label for="username1" class="text-sm text-lightgray">Address:</label>
                    <input id="address" name="address" type="text" class="form-input" placeholder="Address" required="">
                </div>
                <div class="space-y-2">
                    <label for="username1" class="text-sm text-lightgray">City:</label>
                    <input id="city" name="city" type="text" class="form-input" placeholder="City" required="">
                </div>

                <h2 class="text-base font-semibold mb-4">Acadamic Information</h2>
                <div class="space-y-2">
                    <label for="username1" class="text-sm text-lightgray">Matric / O level Obtained Marks:</label>
                    <input id="matrictotalnumber" name="matrictotalnumber" type="number" class="form-input"
                        placeholder="Matric / O level Obtained Marks" required="">
                </div>
                <div class="space-y-2">
                    <label for="username1" class="text-sm text-lightgray">FSC / A level Obtained Marks:</label>
                    <input id="fsctotalnumber" name="fsctotalnumber" type="number" class="form-input"
                        placeholder="FSC / A level Obtained Marks" required="">
                </div>
                <div class="space-y-2">
                    <label for="username1" class="text-sm text-lightgray">MCAT / SAT 2 Obtained Marks:</label>
                    <input id="mcattotalnumber" name="mcattotalnumber" type="number" class="form-input"
                        placeholder="MCAT / SAT 2 Obtained Marks" required="">
                </div>

                <input id="inputuser1" type="submit"
                    class="btn border text-primary border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-primary bg-primary/10"
                    value="Submit">
            </form>
        </div>

    </div>

</div>

@endsection