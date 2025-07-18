@extends('Layout.layout')

@section('content')

<div class="flex flex-col gap-5 min-h-[calc(100vh-188px)] sm:min-h-[calc(100vh-204px)]">
    <div class="grid grid-cols-1">
        <div>
            <ul class="flex flex-wrap items-center text-sm font-semibold space-x-2.5">
                <li class="flex items-center space-x-2.5 text-gray hover:text-dark dark:hover:text-white duration-300">
                    <a href="javaScript:;">Forms</a>
                    <svg class="text-gray/50" width="8" height="10" viewBox="0 0 8 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.5" d="M1.33644 0H4.19579C4.60351 0 5.11318 0.264045 5.32903 0.589888L7.83532 4.3427C8.07516 4.70787 8.05119 5.2809 7.77538 5.6236L4.66949 9.5C4.44764 9.77528 3.96795 10 3.6022 10H1.33644C0.287156 10 -0.348385 8.92135 0.203241 8.08427L1.86409 5.59551C2.08594 5.26405 2.08594 4.72472 1.86409 4.39326L0.203241 1.90449C-0.348385 1.07865 0.293152 0 1.33644 0Z" fill="currentColor" />
                    </svg>
                </li>
                <li>Validation</li>
            </ul>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Validation Wrong</h2>
            <form class="space-y-4">
                <div>
                    <input id="firstName1" type="text" placeholder="First Name" class="form-input !text-danger !border-danger dark:!border-danger/60" value="William Robbie" required="">
                    <p class="text-danger mt-1 text-sm">This field is required</p>
                </div>
                <div>
                    <input id="email1" type="email" placeholder="Email Type" class="form-input" required="">
                </div>
                <div>
                    <input id="pwd1" type="password" placeholder="Password" class="form-input" required="">
                </div>
                <div>
                    <input id="verifypwd1" type="password" placeholder="Confirm Password" class="form-input" required="">
                </div>
                <div>
                    <input id="submit1" type="submit" class="btn bg-primary border border-primary rounded-md text-white transition-all duration-300 hover:bg-primary/[0.85] hover:border-primary/[0.85]" value="Submit">
                </div>
            </form>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Validation Complate</h2>
            <form class="space-y-4">
                <div>
                    <input id="firstName2" type="text" placeholder="First Name" class="form-input !text-success !border-success dark:!border-success/60" value="William Robbie" required="">
                    <p class="text-success mt-1 text-sm">Looks Good!</p>
                </div>
                <div>
                    <input id="email2" type="email" placeholder="Email Type" class="form-input" required="">
                </div>
                <div>
                    <input id="pwd2" type="password" placeholder="Password" class="form-input" required="">
                </div>
                <div>
                    <input id="verifypwd2" type="password" placeholder="Confirm Password" class="form-input" required="">
                </div>
                <div>
                    <input id="submit2" type="submit" class="btn bg-primary border border-primary rounded-md text-white transition-all duration-300 hover:bg-primary/[0.85] hover:border-primary/[0.85]" value="Submit">
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
