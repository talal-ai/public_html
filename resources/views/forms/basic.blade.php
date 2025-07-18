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
                <li>Forms Input</li>
            </ul>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Basic Input Text</h2>
            <form class="space-y-4">
                <input id="user1" type="text" class="form-input" placeholder="Username" required="">
                <input id="inputuser1" type="button" class="btn border text-primary border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-primary bg-primary/10" value="Submit">
            </form>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Email Text</h2>
            <form class="space-y-4">
                <input id="inputemail11" type="email" class="form-input" placeholder="Email Type" required="">
                <input id="submitemail11" type="button" class="btn border text-primary border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-primary bg-primary/10" value="Submit">
            </form>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Lable Text</h2>
            <form class="space-y-4">
                <div class="space-y-2">
                    <label for="username1" class="text-sm text-lightgray">Type Username:</label>
                    <input id="username1" type="text" class="form-input" placeholder="Username" required="">
                </div>
                <input id="submitform" type="button" class="btn border text-primary border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-primary bg-primary/10" value="Submit">
            </form>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Password Input</h2>
            <form class="space-y-4">
                <input id="password1 type="password" class="form-input" placeholder="Type Password" required="">
                <input id="submitpassword1" type="button" class="btn border text-primary border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-primary bg-primary/10" value="Submit">
            </form>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Url Input</h2>
            <form class="space-y-4">
                <input id="url1" type="url" class="form-input" placeholder="https://dummyurl.com" required="">
                <input id="submiturl1" type="button" class="btn border text-primary border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-primary bg-primary/10" value="Submit">
            </form>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Search Input</h2>
            <form class="space-y-4">
                <input id="search1" type="search" class="form-input" placeholder="Search..." required="">
                <input id="submitsearch1" type="button" class="btn border text-primary border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-primary bg-primary/10" value="Submit">
            </form>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Telephone Input</h2>
            <form class="space-y-4">
                <input id="tele1" type="tel" class="form-input" placeholder="0-(000)-111-1111" required="">
                <input id="submittele1" type="button" class="btn border text-primary border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-primary bg-primary/10" value="Submit">
            </form>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Rounded Input</h2>
            <form class="space-y-4">
                <input id="rounding1" type="text" class="form-input rounded-full" placeholder="Type Username" required="">
                <input id="submitrounding1" type="button" class="btn border text-primary border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-primary bg-primary/10" value="Submit">
            </form>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Fields Size</h2>
            <form class="space-y-4">
                <div class="space-y-2">
                    <label for="largeinput1" class="text-sm text-lightgray">Large Input</label>
                    <input id="largeinput1" type="text" class="form-input h-14" placeholder="Username" required="">
                </div>
                <div class="space-y-2">
                    <label for="defaultinput" class="text-sm text-lightgray">Default Input</label>
                    <input id="defaultinput" type="text" class="form-input" placeholder="Username" required="">
                </div>
                <div class="space-y-2">
                    <label for="smallinput" class="text-sm text-lightgray">Small Input</label>
                    <input id="smallinput" type="text" class="form-input h-10" placeholder="Username" required="">
                </div>
            </form>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Fields Size</h2>
            <form class="space-y-4">
                <div class="space-y-2 sm:flex justify-between items-center gap-4">
                    <label for="largeinput1" class="shrink-0 w-24 text-sm text-lightgray">Large Input</label>
                    <input id="largeinput1" type="text" class="form-input h-14" placeholder="Username" required="">
                </div>
                <div class="space-y-2 sm:flex justify-between items-center gap-4">
                    <label for="defaultinput1" class="shrink-0 w-24 text-sm text-lightgray">Default Input</label>
                    <input id="defaultinput1" type="text" class="form-input" placeholder="Username" required="">
                </div>
                <div class="space-y-2 sm:flex justify-between items-center gap-4">
                    <label for="smallinput1" class="shrink-0 w-24 text-sm text-lightgray">Small Input</label>
                    <input id="smallinput1" type="text" class="form-input h-10" placeholder="Username" required="">
                </div>
            </form>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Select Menu</h2>
            <form>
                <select id="selectOption" class="form-select">
                    <option>Select Option</option>
                    <option>One</option>
                    <option>Two</option>
                    <option>Three</option>
                </select>
            </form>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Multiselect input</h2>
            <form>
                <select id="selectMenu" size="4" multiple="multiple" class="form-multiselect h-auto">
                    <option>Select menu</option>
                    <option>One</option>
                    <option>Two</option>
                    <option>Three</option>
                    <option>Four</option>
                    <option>Five</option>
                    <option>Six</option>
                </select>
            </form>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Checkbox</h2>
            <form class="space-y-1">
                <label class="flex items-center cursor-pointer">
                    <input id="checkbox1" type="checkbox" class="form-checkbox" checked>
                    <span>Checkbox</span>
                </label>
                <label class="flex items-center cursor-pointer">
                    <input id="checkbox2" type="checkbox" class="form-checkbox" checked>
                    <span>Checkbox</span>
                </label>
            </form>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Radio</h2>
            <form class="space-y-1">
                <label class="flex items-center cursor-pointer">
                    <input id="radio1" type="radio" name="radio-one" class="form-radio rounded-full" checked>
                    <span>One</span>
                </label>
                <label class="flex items-center cursor-pointer">
                    <input id="radio2" type="radio" name="radio-one" class="form-radio rounded-full">
                    <span>Two</span>
                </label>
            </form>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Disabled Radio & Checkbox</h2>
            <form class="space-y-1">
                <label class="flex items-center cursor-pointer">
                    <input id="radio3" type="radio" name="radio-one" disabled="" class="form-radio rounded-full">
                    <span>One</span>
                </label>
                <label class="flex items-center cursor-pointer">
                    <input id="checkbox3" type="checkbox" class="form-checkbox" disabled checked>
                    <span>Checkbox</span>
                </label>
            </form>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Disabled Input</h2>
            <form>
                <input id="disabled" type="text" class="form-input cursor-not-allowed" placeholder="Username" required="" disabled="">
            </form>
        </div>
    </div>
</div>

@endsection
