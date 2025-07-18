@extends('Layout.layout')

@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="flex flex-col gap-5 min-h-[calc(100vh-188px)] sm:min-h-[calc(100vh-204px)]">
    <div class="grid grid-cols-1">
        <div>
            <ul class="flex flex-wrap items-center text-sm font-semibold space-x-2.5">
                <li class="flex items-center space-x-2.5 text-gray hover:text-dark dark:hover:text-white duration-300">
                    <a href="javaScript:;">Global Setting</a>
                    <svg class="text-gray/50" width="8" height="10" viewBox="0 0 8 10" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.5"
                            d="M1.33644 0H4.19579C4.60351 0 5.11318 0.264045 5.32903 0.589888L7.83532 4.3427C8.07516 4.70787 8.05119 5.2809 7.77538 5.6236L4.66949 9.5C4.44764 9.77528 3.96795 10 3.6022 10H1.33644C0.287156 10 -0.348385 8.92135 0.203241 8.08427L1.86409 5.59551C2.08594 5.26405 2.08594 4.72472 1.86409 4.39326L0.203241 1.90449C-0.348385 1.07865 0.293152 0 1.33644 0Z"
                            fill="currentColor" />
                    </svg>
                </li>
                <li>Student's Management</li>
            </ul>
        </div>
    </div>
    <div class="grid grid-cols-1 gap-5">
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <!-- <h2 class="text-base font-semibold mb-4">Criteria</h2> -->
            <div class="mt-16 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 p-4" style="padding-top: 15px;">
                <div class="p-1">
                    <h2 class="text-base font-semibold mb-4">Date</h2>
                    <div id="reportrange">
                        <i class="fa fa-calendar"></i>&nbsp;
                        <span id="date-range-span"></span> <i class="fa fa-caret-down"></i>
                    </div>
                </div>
                <div class="p-1">
                    <h2 class="text-base font-semibold mb-4">Program</h2>
                    <form>
                        <select id="selectOption" class="form-select">
                            <option value="" disabled selected>Select Option</option>
                            @foreach($programsData as $program)
                                <option value="{{ $program['id'] }}">
                                    {{ $program['name'] }}
                                </option>
                            @endforeach
                        </select>
                    </form>
                </div>
                <div class="p-1">
                    <h2 class="text-base font-semibold mb-4">Year</h2>
                    <form>
                        <select id="selectOption" class="form-select">
                            <option value="" disabled selected>Select Option</option>
                            @foreach($yearsData as $year)
                                <option value="{{ $year['id'] }}">
                                    {{ $year['name'] }}
                                </option>
                            @endforeach
                        </select>
                    </form>
                </div>
                <div class="p-1">
                    <h2 class="text-base font-semibold mb-4">Subject</h2>
                    <form>
                        <select id="selectOption" class="form-select">
                            <option>Select Option</option>
                            <option>Operating System</option>
                        </select>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">

        <div x-data="modals">
            <div class="flex flex-wrap items-center gap-5">
                @foreach($user->permissionss as $role)
                    @foreach($role->permissions as $permission)
                        @if($permission->name == 'can_add' && $permission->description == 'Can Add Student')
                            
                            
                            Add New-><svg style="cursor: pointer;" @click="toggle"  width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path opacity="0.5" d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z" stroke="#1C274C" stroke-width="1.5"/>
<path d="M15 12L12 12M12 12L9 12M12 12L12 9M12 12L12 15" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
</svg>

                            @break
                        @endif
                    @endforeach
                @endforeach
                Excel-><a href="{{ route('exportSurveyStats_faulty') }}" class="inline-block">           
<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-right:10px;">
<path opacity="0.5" d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12" stroke="#1C274C" stroke-width="1.5"/>
<path d="M2 14C2 11.1997 2 9.79961 2.54497 8.73005C3.02433 7.78924 3.78924 7.02433 4.73005 6.54497C5.79961 6 7.19974 6 10 6H14C16.8003 6 18.2004 6 19.27 6.54497C20.2108 7.02433 20.9757 7.78924 21.455 8.73005C22 9.79961 22 11.1997 22 14C22 16.8003 22 18.2004 21.455 19.27C20.9757 20.2108 20.2108 20.9757 19.27 21.455C18.2004 22 16.8003 22 14 22H10C7.19974 22 5.79961 22 4.73005 21.455C3.78924 20.9757 3.02433 20.2108 2.54497 19.27C2 18.2004 2 16.8003 2 14Z" stroke="#1C274C" stroke-width="1.5"/>
<path d="M12 11L12 17M12 17L14.5 14.5M12 17L9.5 14.5" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
</a>
Pdf-><a href="{{ route('exportSurveyStatsFaultyToPDF') }}" class="inline-block">           
<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-right:10px;">
<path opacity="0.5" d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12" stroke="#1C274C" stroke-width="1.5"/>
<path d="M2 14C2 11.1997 2 9.79961 2.54497 8.73005C3.02433 7.78924 3.78924 7.02433 4.73005 6.54497C5.79961 6 7.19974 6 10 6H14C16.8003 6 18.2004 6 19.27 6.54497C20.2108 7.02433 20.9757 7.78924 21.455 8.73005C22 9.79961 22 11.1997 22 14C22 16.8003 22 18.2004 21.455 19.27C20.9757 20.2108 20.2108 20.9757 19.27 21.455C18.2004 22 16.8003 22 14 22H10C7.19974 22 5.79961 22 4.73005 21.455C3.78924 20.9757 3.02433 20.2108 2.54497 19.27C2 18.2004 2 16.8003 2 14Z" stroke="#1C274C" stroke-width="1.5"/>
<path d="M12 11L12 17M12 17L14.5 14.5M12 17L9.5 14.5" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
</a>




Import->
<div x-data="modals">
               <a  class="inline-block" style="cursor:pointer; margin-top: 6px;">           
              <svg @click="toggle" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M12 17L12 10M12 10L15 13M12 10L9 13" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M16 7H12H8" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
<path opacity="0.5" d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z" stroke="#1C274C" stroke-width="1.5"/>
</svg>
</a>
<!-- min-h-screen -->
                <div class="fixed inset-0 bg-dark/90 dark:bg-white/5 backdrop-blur-sm z-[99999] hidden overflow-y-auto" :class="open && '!block'">
                    <div class="flex items-start justify-center  px-4" @click.self="open = false">
                        <div x-show="open" x-transition x-transition.duration.300 class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 rounded-lg overflow-hidden my-8 w-full max-w-lg">
                            <div class="flex bg-white dark:bg-dark items-center border-b border-lightgray/10 dark:border-gray/20 justify-between px-5 py-3">
                                <h5 class="font-semibold text-lg">Import Student's</h5>
                                <button type="button" class="text-lightgray hover:text-primary" @click="toggle">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                                        <path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="currentColor"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="p-5 space-y-4">
                            <form action="{{ route('csvupload') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                                <div class="text-lightgray text-sm font-normal">
                                <div class="grid grid-cols-1 gap-5">
                     <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
                         <!-- <h2 class="text-base font-semibold mb-4">Criteria</h2> -->
                                        <div class="mt-16 grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4 p-4" style="padding-top: 15px;">
                                        
                                        <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Session</h2>
                                                    <select id="selectSession" name="selectSession" class="form-select" required>
                                                    <option value="" disabled selected>Select Option</option>
                                                    @foreach($sessionsData as $sessions)
                                                        <option value="{{ $sessions['id'] }}">
                                                            {{ $sessions['name'] }}
                                                        </option>
                                                    @endforeach
                                                    </select>
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Program</h2>
                                                    <select id="selectprogram" name="selectprogram" class="form-select" required>
                                                    <option value="" disabled selected>Select Option</option>
                                                    @foreach($programsData as $program)
                                                        <option value="{{ $program['id'] }}">
                                                            {{ $program['name'] }}
                                                        </option>
                                                    @endforeach
                                                    </select>
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Year</h2>
                                                    <select id="selectyear" name="selectyear" class="form-select" required>
                                                    <option value="" disabled selected>Select Program First</option>
                                                    </select>
                                            </div>
                                            
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Batch</h2>
                                                    <select id="selectBatch" name="selectBatch" class="form-select" required>
                                                    <option value="" disabled selected>Select Year First</option>
                                                    @foreach($batchesData as $batches)
                                                        <option value="{{ $batches['id'] }}">
                                                            {{ $batches['name'] }}
                                                        </option>
                                                    @endforeach
                                                    </select>
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Import Type</h2>
                                                    <select id="selectOption" class="form-select" required>
                                                        <option>Select Option</option>
                                                        <option>New Student</option>
                                                        <option>Update Student</option>
                                                    </select>
                                            </div>
                                            <div class="p-1">
                                                <h2 class="text-base font-semibold mb-4">Upload File</h2>
                                                <input type="hidden" name="password" id="password" value="12345678">
                                                <input type="file" name="upload_xlsx" id="upload_xlsx" required accept=".xlsx">
                                            </div>
                                            <div class="p-1">
                                            Download Sample-><a href="{{ route('downloadstudentSampleCSV') }}" class="inline-block">           
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" style="margin-right:10px;">
                                            <path opacity="0.5" d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12" stroke="#1C274C" stroke-width="1.5"/>
                                            <path d="M2 14C2 11.1997 2 9.79961 2.54497 8.73005C3.02433 7.78924 3.78924 7.02433 4.73005 6.54497C5.79961 6 7.19974 6 10 6H14C16.8003 6 18.2004 6 19.27 6.54497C20.2108 7.02433 20.9757 7.78924 21.455 8.73005C22 9.79961 22 11.1997 22 14C22 16.8003 22 18.2004 21.455 19.27C20.9757 20.2108 20.2108 20.9757 19.27 21.455C18.2004 22 16.8003 22 14 22H10C7.19974 22 5.79961 22 4.73005 21.455C3.78924 20.9757 3.02433 20.2108 2.54497 19.27C2 18.2004 2 16.8003 2 14Z" stroke="#1C274C" stroke-width="1.5"/>
                                            <path d="M12 11L12 17M12 17L14.5 14.5M12 17L9.5 14.5" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>

                                            </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="flex justify-end items-center gap-4">
                                    <button type="button" class="btn border text-danger border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-danger bg-danger/10" @click="toggle">Discard</button>
                                    <button type="submit" class="btn border text-primary border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-primary bg-primary/10">Save</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>





            


            </div>
            <div class="fixed inset-0 bg-dark/90 dark:bg-white/5 backdrop-blur-sm z-[99999] hidden overflow-y-auto"
                :class="open && '!block'">
                <div class="flex items-start justify-center min-h-screen " @click.self="open = false">
                    <div x-show="open" x-transition x-transition.duration.300
                        class="bg-white dark:bg-dark dark:border-gray/20  border-lightgray/10  overflow-hidden  w-full max-w-5xl">
                        <div
                            class="flex bg-white dark:bg-dark items-center border-b border-lightgray/10 dark:border-gray/20 justify-between px-5 py-3">
                            <h5 class="font-semibold text-lg">Add Student</h5>
                            <button type="button" class="text-lightgray hover:text-primary" @click="toggle">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                                    <path
                                        d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z"
                                        fill="currentColor"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="p-5 space-y-4">
                            <form action="{{ route('createstudent') }}" method="POST">
                                @csrf
                               
                                <!-- Starts component -->
   <div x-data="{ openIndex: null }">
    <div class="border rounded-md overflow-hidden">
     <!-- Accordion Item 1 -->
     <div class="border-b"> <button type="button" @click="openIndex === 0 ? openIndex = null : openIndex = 0" class="w-full flex justify-between items-center p-4 focus:outline-none text-gray-500 focus:text-orange-500"> <span>Student Information</span> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 transform transition-transform" :class="{ 'rotate-45': openIndex === 0 }">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"></path>
       </svg> </button>
      <div x-show="openIndex === 0" class="p-4 border-t text-sm bg-gray-50 text-gray-500" style="display: none;">
      <div class="text-lightgray text-sm font-normal">
                                    <div class="mt-16 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 p-4">
                                        <div class="p-1">
                                            <h2 class="text-base font-semibold mb-4">Roles</h2>
                                            <select id="rolename" name="rolename" class="form-select" required>
                                                <option value="" disabled selected>Select Option</option>
                                                @foreach($rolesData as $role)
                                                    <option value="{{ $role['id'] }}">
                                                        {{ $role['name'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="p-1">
                                            <h2 class="text-base font-semibold mb-4">Program</h2>
                                            <select id="program" name="program" class="form-select">
                                            <option value="" disabled selected>Select Option</option>
                                                @foreach($programsData as $programs)
                                                    <option value="{{ $programs['id'] }}">
                                                        {{ $programs['name'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="p-1">
                                            <h2 class="text-base font-semibold mb-4">Session</h2>
                                            <select id="session" name="session" class="form-select">
                                            <option value="" disabled selected>Select Option</option>
                                                @foreach($sessionsData as $sessions)
                                                    <option value="{{ $sessions['id'] }}">
                                                        {{ $sessions['name'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="p-1">
                                            <h2 class="text-base font-semibold mb-4">Year</h2>
                                            <select id="year" name="year" class="form-select">
                                            <option value="" disabled selected>Select Option</option>
                                                @foreach($yearsData as $years)
                                                    <option value="{{ $years['id'] }}">
                                                        {{ $years['name'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="p-1">
                                            <h2 class="text-base font-semibold mb-4">Batch</h2>
                                            <select id="batch" name="batch" class="form-select">
                                            <option value="" disabled selected>Select Option</option>
                                                @foreach($batchesData as $batches)
                                                    <option value="{{ $batches['id'] }}">
                                                        {{ $batches['name'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="p-1">
                                            <h2 class="text-base font-semibold mb-4">Gender</h2>
                                            <select id="gender" name="gender" class="form-select">
                                                <option value="" disabled selected>Select Option</option>
                                                <option value="male">Male</option>
                                                <option value="female">FeMale</option>
                                            </select>
                                        </div>
                                        <div class="p-1">
                                            <h2 class="text-base font-semibold mb-4">Class Roll No</h2>
                                            <input id="classrollno" name="classrollno" type="text"
                                                class="form-input w-full" placeholder="Class Roll No">
                                        </div>
                                        <div class="p-1">
                                            <h2 class="text-base font-semibold mb-4">Full Name</h2>
                                            <input id="name" name="name" type="text"
                                                class="form-input w-full" placeholder="Full Name">
                                        </div>
                                        <div class="p-1">
                                            <h2 class="text-base font-semibold mb-4">Studnet CNIC</h2>
                                            <input id="studnetcnic" name="studnetcnic" type="text"
                                                class="form-input w-full" placeholder="XXXXX-XXXXXXX-X"  pattern="\d{5}-\d{7}-\d{1}"  maxlength="15">
                                        </div>
                                        <div class="p-1">
                                            <h2 class="text-base font-semibold mb-4">Email</h2>
                                            <input id="email" name="email" type="email" class="form-input w-full"
                                                placeholder="Email" required>
                                        </div>
                                        <div class="p-1">
                                            <h2 class="text-base font-semibold mb-4">Password</h2>
                                            <input id="password" name="password" type="text"
                                                class="form-input w-full"
                                                placeholder="Password" required>
                                        </div>
                                        <div class="p-1">
                                            <h2 class="text-base font-semibold mb-4">Whatsapp Number</h2>
                                            <input id="whatsapp" name="whatsapp" type="number"
                                                class="form-input w-full positive-only" min="0"
                                                placeholder="Whatsapp Number" >
                                        </div>
                                        <div class="p-1">
                                            <h2 class="text-base font-semibold mb-4">D.O.B</h2>
                                            <input id="studnetdob" name="studnetdob" type="date"
                                                class="form-input w-full" 
                                                placeholder="D.O.B" >
                                        </div>
                                        <div class="p-1">
                                            <h2 class="text-base font-semibold mb-4">Date of Enty to College</h2>
                                            <input id="datetojoin" name="datetojoin" type="date"
                                                class="form-input w-full" 
                                                placeholder="Date of Enty to College" >
                                        </div>
                                        <div class="p-1">
                                            <h2 class="text-base font-semibold mb-4">Domicile / Nationality</h2>
                                            <input id="domicile" name="domicile" type="file"
                                                class="form-input w-full" 
                                                placeholder="Domicile / Nationality" >
                                        </div>
                                        <div class="p-1">
                                            <h2 class="text-base font-semibold mb-4">Migration (Between Medical College)</h2>
                                            <input id="migrationcollege" name="migrationcollege" type="text"
                                                class="form-input w-full" 
                                                placeholder="Migration (Between Medical College)" >
                                        </div>
                                        <div class="p-1">
                                            <h2 class="text-base font-semibold mb-4">Permanent Address</h2>
                                            <input id="studentaddress" name="studentaddress" type="text"
                                                class="form-input w-full" 
                                                placeholder="Permanent Address">
                                        </div>
                                        
                                    </div>
                                </div>
      </div>
     </div> 
     <!-- Accordion Item 2 -->
     <div class="border-b"> <button type="button" @click="openIndex === 1 ? openIndex = null : openIndex = 1" class="w-full flex justify-between items-center p-4 focus:outline-none text-gray-500 focus:text-orange-500"> <span>Parent Information</span> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 transform transition-transform" :class="{ 'rotate-45': openIndex === 1 }">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"></path>
       </svg> </button>
      <div x-show="openIndex === 1" class="p-4 text-gray-500 bg-gray-50 text-sm border-t" style="display: none;">
      <div class="text-lightgray text-sm font-normal">
                                    <div class="mt-16 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 p-4">
                                       
                                        <div class="p-1">
                                            <h2 class="text-base font-semibold mb-4">Father Name</h2>
                                            <input id="fathername" name="fathername" type="text"
                                                class="form-input w-full" placeholder="Father Name" required>
                                        </div>
                                        <div class="p-1">
                                            <h2 class="text-base font-semibold mb-4">Father CNIC</h2>
                                            <input id="fathercnic" name="fathercnic" type="text"  placeholder="XXXXX-XXXXXXX-X"  pattern="\d{5}-\d{7}-\d{1}"  maxlength="15" class="form-input w-full" required>
                                        </div>
                                        <div class="p-1">
                                            <h2 class="text-base font-semibold mb-4">Father Whatsapp Number</h2>
                                            <input id="fatherwhatsapp" name="fatherwhatsapp" type="number"
                                                class="form-input w-full positive-only" min="0"
                                                placeholder="Whatsapp Number" required>
                                        </div>
                                        
                                    </div>
                                </div>
      </div>
     </div>

     <!-- Accordion Item 3 -->
     <div class="border-b"> <button type="button" @click="openIndex === 2 ? openIndex = null : openIndex = 2" class="w-full flex justify-between items-center p-4 focus:outline-none text-gray-500 focus:text-orange-500"> <span>Academic Information</span> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 transform transition-transform" :class="{ 'rotate-45': openIndex === 2 }">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"></path>
       </svg> </button>
      <div x-show="openIndex === 2" class="p-4 text-gray-500 bg-gray-50 text-sm border-t" style="display: none;">
      <div class="text-lightgray text-sm font-normal">
      <h2 class="font-bold">Matric / Equivalent</h2>
                                    <div class="mt-16 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 p-4">
                                        <div class="p-1">
                                            <h2 class="text-base font-semibold mb-4">SSC or Equivalent Degree Title</h2>
                                            <input id="ssctitle" name="ssctitle" type="text"
                                                class="form-input w-full positive-only" min="0" placeholder="SSC or Equivalent Degree Title" >
                                        </div>
                                        <div class="p-1">
                                            <h2 class="text-base font-semibold mb-4">Matric / Equal Roll No</h2>
                                            <input id="matricrollno" name="matricrollno" type="number" class="form-input w-full positive-only" min="0"
                                                placeholder="Matric / Equal Roll No" >
                                        </div>
                                        <div class="p-1">
                                            <h2 class="text-base font-semibold mb-4">Matric / Equal Year</h2>
                                            <input id="matricyear" name="matricyear" type="number"
                                                class="form-input w-full positive-only" min="0"
                                                placeholder="Matric / Equal Year">
                                        </div>
                                        <div class="p-1">
                                            <h2 class="text-base font-semibold mb-4">Matric / Equal Registration No</h2>
                                            <input id="matricregisno" name="matricregisno" type="number"
                                                class="form-input w-full positive-only" min="0"
                                                placeholder="Matric / Equal Registration No">
                                        </div>
                                        <div class="p-1">
                                            <h2 class="text-base font-semibold mb-4">Matric / Equal Total Marks</h2>
                                            <input id="matrictotalmarks" name="matrictotalmarks" type="number"
                                                class="form-input w-full positive-only" min="0"
                                                placeholder="Matric / Equal Total Marks">
                                        </div>
                                        <div class="p-1">
                                            <h2 class="text-base font-semibold mb-4">Matric / Equal Obtained Marks</h2>
                                            <input id="matricobtainmarks" name="matricobtainmarks" type="number"
                                                class="form-input w-full positive-only" min="0"
                                                placeholder="Matric / Equal Obtained Marks">
                                        </div>
                                        <div class="p-1">
                                            <h2 class="text-base font-semibold mb-4">Matric / Equal Board</h2>
                                            <input id="matricboard" name="matricboard" type="text"
                                                class="form-input w-full"
                                                placeholder="Matric / Equal Board">
                                        </div>
                                    </div>
                                    <div class=" w-full h-px max-w-6xl mx-auto py-1"
        style="background-image: linear-gradient(90deg, rgba(149, 131, 198, 0) 1.46%, rgba(149, 131, 198, 0.6) 40.83%, rgba(149, 131, 198, 0.3) 65.57%, rgba(149, 131, 198, 0) 107.92%);">
    </div>
    <h2 class="font-bold">HSSC / Equivalent Degree</h2>
                                    <div class="mt-16 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 p-4">
                                        <div class="p-1">
                                            <h2 class="text-base font-semibold mb-4">HSSC or Equivalent Degree Title</h2>
                                            <input id="hssctitle" name="hssctitle" type="text"
                                                class="form-input w-full positive-only" min="0" placeholder="HSSC or Equivalent Degree Title" >
                                        </div>
                                        <div class="p-1">
                                            <h2 class="text-base font-semibold mb-4">Inter / Equal Roll no</h2>
                                            <input id="interrollno" name="interrollno" type="number" class="form-input w-full positive-only" min="0"
                                                placeholder="Inter / Equal Roll no" >
                                        </div>
                                        <div class="p-1">
                                            <h2 class="text-base font-semibold mb-4">Inter / Equal Year</h2>
                                            <input id="interyear" name="interyear" type="number"
                                                class="form-input w-full positive-only" min="0"
                                                placeholder="Inter / Equal Year">
                                        </div>
                                        <div class="p-1">
                                            <h2 class="text-base font-semibold mb-4">Inter / Equal Registration No</h2>
                                            <input id="interregisno" name="interregisno" type="number"
                                                class="form-input w-full positive-only" min="0"
                                                placeholder="Inter / Equal Registration No">
                                        </div>
                                        <div class="p-1">
                                            <h2 class="text-base font-semibold mb-4">Inter / Equal Total Marks</h2>
                                            <input id="intertotalmarks" name="intertotalmarks" type="number"
                                                class="form-input w-full positive-only" min="0"
                                                placeholder="Inter / Equal Total Marks">
                                        </div>
                                        <div class="p-1">
                                            <h2 class="text-base font-semibold mb-4">Inter / Equal Obtained Marks</h2>
                                            <input id="interobtainmarks" name="interobtainmarks" type="number"
                                                class="form-input w-full positive-only" min="0"
                                                placeholder="Inter / Equal Obtained Marks">
                                        </div>
                                        <div class="p-1">
                                            <h2 class="text-base font-semibold mb-4">Inter / Equal Board</h2>
                                            <input id="interboard" name="interboard" type="text"
                                                class="form-input w-full"
                                                placeholder="Inter / Equal Board">
                                        </div>                                       
                                    </div>
                                    <div class=" w-full h-px max-w-6xl mx-auto py-1"
        style="background-image: linear-gradient(90deg, rgba(149, 131, 198, 0) 1.46%, rgba(149, 131, 198, 0.6) 40.83%, rgba(149, 131, 198, 0.3) 65.57%, rgba(149, 131, 198, 0) 107.92%);">
    </div>
    <h2 class="font-bold">Entry Test</h2>
                                    <div class="mt-16 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 p-4">
                                        <div class="p-1">
                                            <h2 class="text-base font-semibold mb-4">Entry Test Obtained Marks</h2>
                                            <input id="entrytestobtmarks" name="entrytestobtmarks" type="number"
                                                class="form-input w-full positive-only" min="0" placeholder="Entry Test Obtained Marks" >
                                        </div>
                                        <div class="p-1">
                                            <h2 class="text-base font-semibold mb-4">Entry Test Type</h2>
                                            <input id="entrytesttype" name="entrytesttype" type="text" class="form-input w-full"
                                                placeholder="Entry Test Type" >
                                        </div>
                                        <div class="p-1">
                                            <h2 class="text-base font-semibold mb-4">Test Passing Year</h2>
                                            <input id="entrytestpassyear" name="entrytestpassyear" type="number"
                                                class="form-input w-full positive-only" min="0"
                                                placeholder="Test Passing Year">
                                        </div>
                                        <div class="p-1">
                                            <h2 class="text-base font-semibold mb-4">Testing Body</h2>
                                            <input id="testbody" name="testbody" type="text"
                                                class="form-input w-full"
                                                placeholder="Testing Body">
                                        </div>                                       
                                    </div>
                                    <div class=" w-full h-px max-w-6xl mx-auto py-1"
        style="background-image: linear-gradient(90deg, rgba(149, 131, 198, 0) 1.46%, rgba(149, 131, 198, 0.6) 40.83%, rgba(149, 131, 198, 0.3) 65.57%, rgba(149, 131, 198, 0) 107.92%);">
    </div>
                                </div>
      </div>
     </div>
    </div>
   </div> <!--  Ends component -->
                                <div
                                    class="left-0 right-0 flex justify-end items-center gap-4 p-4 bg-white border-t border-gray/20 dark:bg-dark dark:border-gray/50">
                                    <button type="button"
                                        class="btn border text-danger border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-danger bg-danger/10"
                                        @click="toggle">Discard</button>
                                    <button type="submit"
                                        class="btn border text-primary border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-primary bg-primary/10">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 gap-5">
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Data</h2>
            <div class="overflow-auto space-y-4" x-data="dataTable()" x-init="
            initData()
            $watch('searchInput', value => {
            search(value)
            })">
                <div class="flex justify-between items-center gap-3">
                    <div class="flex space-x-2 items-center">
                        <p>Show</p>
                        <select id="filter" class="form-select !w-20" x-model="view" @change="changeView()">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                    <div>
                        <input id="search" x-model="searchInput" type="text" class="form-input" placeholder="Search...">
                    </div>
                </div>
                <div class="overflow-auto">
                    <table class="min-w-[640px] w-full">
                        <thead>
                            <th width="20%">
                                <div class="flex items-center justify-between gap-2">
                                    <p>Name</p>
                                    <div class="flex flex-col">
                                        <svg @click="sort('name', 'asc')" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24"
                                            stroke="currentColor" class="h-3 w-3 cursor-pointer text-muted fill-current"
                                            x-bind:class="{'!text-black': sorted.field === 'name' && sorted.rule === 'asc'}">
                                            <path d="M5 15l7-7 7 7"></path>
                                        </svg>
                                        <svg @click="sort('name', 'desc')" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24"
                                            stroke="currentColor" class="h-3 w-3 cursor-pointer text-muted fill-current"
                                            x-bind:class="{'!text-black': sorted.field === 'name' && sorted.rule === 'desc'}">
                                            <path d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                </div>
                            </th>
                            <th width="20%">
                                <div class="flex items-center justify-between gap-2">
                                    <p>Email</p>
                                    <div class="flex flex-col">
                                        <svg @click="sort('name', 'asc')" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24"
                                            stroke="currentColor" class="h-3 w-3 cursor-pointer text-muted fill-current"
                                            x-bind:class="{'!text-black': sorted.field === 'name' && sorted.rule === 'asc'}">
                                            <path d="M5 15l7-7 7 7"></path>
                                        </svg>
                                        <svg @click="sort('name', 'desc')" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24"
                                            stroke="currentColor" class="h-3 w-3 cursor-pointer text-muted fill-current"
                                            x-bind:class="{'!text-black': sorted.field === 'name' && sorted.rule === 'desc'}">
                                            <path d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                </div>
                            </th>  
                            <th width="20%">
                                <div class="flex items-center justify-between gap-2">
                                    <p>Whatsapp</p>
                                    <div class="flex flex-col">
                                        <svg @click="sort('name', 'asc')" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24"
                                            stroke="currentColor" class="h-3 w-3 cursor-pointer text-muted fill-current"
                                            x-bind:class="{'!text-black': sorted.field === 'name' && sorted.rule === 'asc'}">
                                            <path d="M5 15l7-7 7 7"></path>
                                        </svg>
                                        <svg @click="sort('name', 'desc')" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24"
                                            stroke="currentColor" class="h-3 w-3 cursor-pointer text-muted fill-current"
                                            x-bind:class="{'!text-black': sorted.field === 'name' && sorted.rule === 'desc'}">
                                            <path d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                </div>
                            </th>                       
                            <th width="15%">
                                <div class="flex items-center justify-between gap-2">
                                    <span class="">
                                        Action
                                    </span>
                                    <div class="flex flex-col">
                                        <svg @click="sort('country', 'asc')" fill="none" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round" stroke-width="4"
                                            viewBox="0 0 24 24" stroke="currentColor"
                                            class="text-muted h-3 w-3 cursor-pointer fill-current"
                                            x-bind:class="{'!text-black': sorted.field === 'country' && sorted.rule === 'asc'}">
                                            <path d="M5 15l7-7 7 7"></path>
                                        </svg>
                                        <svg @click="sort('country', 'desc')" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="4" viewBox="0 0 24 24"
                                            stroke="currentColor" class="text-muted h-3 w-3 cursor-pointer fill-current"
                                            x-bind:class="{'!text-black': sorted.field === 'country' && sorted.rule === 'desc'}">
                                            <path d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                </div>
                            </th>
                        </thead>
                        <tbody>
                            <template x-for="(item, index) in items" :key="index">
                                <tr x-show="checkView(index + 1)" class="">
                                    <td>
                                        <span x-text="item.name"></span>
                                    </td>
                                    <td>
                                        <span x-text="item.email"></span>
                                    </td>
                                    <td>
                                        <span x-text="item.whatsapp"></span>
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                            </template>
                            <tr x-show="isEmpty()">
                                <td colspan="5" class="text-center py-3 text-black">No matching records found.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <ul class="inline-flex items-center gap-1">
                    <li><button type="button" @click.prevent="changePage(1)"
                            class="flex justify-center px-2 h-9 items-center rounded transition border border-gray/20 hover:border-gray/60">First</button>
                    </li>
                    <li><button type="button" @click="changePage(currentPage - 1)"
                            class="flex justify-center px-2 h-9 items-center rounded transition border border-gray/20 hover:border-gray/60">Prev</button>
                    </li>
                    <template x-for="item in pages">
                        <li><button @click="changePage(item)" type="button"
                                class="flex justify-center h-9 w-9 items-center rounded transition border border-gray/20 hover:border-gray/60"
                                x-bind:class="{ 'border-primary text-primary': currentPage === item }"><span
                                    x-text="item"></span></button></li>
                    </template>
                    <li><button @click="changePage(currentPage + 1)" type="button"
                            class="flex justify-center px-2 h-9 items-center rounded transition border border-gray/20 hover:border-gray/60">Next</button>
                    </li>
                    <li><button @click.prevent="changePage(pagination.lastPage)" type="button"
                            class="flex justify-center px-2 h-9 items-center rounded transition border border-gray/20 hover:border-gray/60">Last</button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<!-- Pass the teachers data to JavaScript -->
<script>
    window.mergedData = @json($studentData);
    console.log(window.mergedData); // Debug to ensure data is being passed correctly
</script>

<!-- Datatables Js -->
<script src="{{ asset('public/assets/js/gernelsettingdata/datatablestudent.js') }}"></script>
<script src="{{ asset('public/assets/js/data-search.js') }}"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css">
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>


<script type="text/javascript">

document.getElementById('selectprogram').addEventListener('change', function() {
    var programId = this.value;
    var baseUrl = '{{ env("APP_URL") }}/Studentsetting'; // Get the base URL dynamically
    console.log(programId);
    if (programId) {
        fetch(`${baseUrl}/get-years/${programId}`)
            .then(response => response.json())
            .then(data => {
                var yearSelect = document.getElementById('selectyear');
                yearSelect.innerHTML = '<option value="" disabled selected>Select Year</option>';

                data.years.forEach(function(year) {
                    var option = document.createElement('option');
                    option.value = year.id;
                    option.textContent = year.name;
                    yearSelect.appendChild(option);
                });
            });
    } else {
        document.getElementById('selectyear').innerHTML = '<option value="" disabled selected>Select Year</option>';
    }
});


document.getElementById('selectyear').addEventListener('change', function() {
    var yearId = this.value;
    var baseUrl = '{{ env("APP_URL") }}/Studentsetting'; // Get the base URL dynamically
    console.log(yearId);
    if (yearId) {
        fetch(`${baseUrl}/getBatch/${yearId}`)
            .then(response => response.json())
            .then(data => {
                var selectBatch = document.getElementById('selectBatch');
                selectBatch.innerHTML = '<option value="" disabled selected>Select Batches</option>';

                data.batches.forEach(function(batch) {
                    var option = document.createElement('option');
                    option.value = batch.id;
                    option.textContent = batch.name;
                    selectBatch.appendChild(option);
                });
            });
    } else {
        document.getElementById('selectBatch').innerHTML = '<option value="" disabled selected>Frist Create Batches</option>';
    }
});















    $(function () {
        // .subtract(1, 'days')
        var start = moment();
        var end = moment();

        function cb(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }

        $('#reportrange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, cb);

        cb(start, end);

    });

    // $('body').on('click', '.ranges li', function () {
    //     console.log('adil');
    //     var date = $('#date-range-span').text();
    //     console.log(date);
    // });

    $('body').on('click', '.ranges li', function () {
        var date = $(this).text();
        if (date !== 'Custom Range') {
            console.log('adil');
            var dateString = $('#date-range-span').text();
            var dates = dateString.split(' - ');
            var startDate = dates[0];
            var endDate = dates[1];

            // Format dates as DD-MM-YYYY
            var startMonth = startDate.split(' ')[0];
            var startDay = startDate.split(' ')[1].replace(',', '');
            var startYear = startDate.split(', ')[1];

            var endMonth = endDate.split(' ')[0];
            var endDay = endDate.split(' ')[1].replace(',', '');
            var endYear = endDate.split(', ')[1];

            // Map month names to numbers
            var monthMap = {
                'January': '01',
                'February': '02',
                'March': '03',
                'April': '04',
                'May': '05',
                'June': '06',
                'July': '07',
                'August': '08',
                'September': '09',
                'October': '10',
                'November': '11',
                'December': '12'
            };

            var formattedStartDate = `${startDay}-${monthMap[startMonth]}-${startYear}`;
            var formattedEndDate = `${endDay}-${monthMap[endMonth]}-${endYear}`;

            console.log('Start Date:', formattedStartDate);
            console.log('End Date:', formattedEndDate);
        }
    });

    $('body').on('click', '.drp-buttons', function () {
        console.log('adil1');
        var dateString = $('#date-range-span').text();
        var dates = dateString.split(' - ');
        var startDate = dates[0];
        var endDate = dates[1];

        // Format dates as DD-MM-YYYY
        var startMonth = startDate.split(' ')[0];
        var startDay = startDate.split(' ')[1].replace(',', '');
        var startYear = startDate.split(', ')[1];

        var endMonth = endDate.split(' ')[0];
        var endDay = endDate.split(' ')[1].replace(',', '');
        var endYear = endDate.split(', ')[1];

        // Map month names to numbers
        var monthMap = {
            'January': '01',
            'February': '02',
            'March': '03',
            'April': '04',
            'May': '05',
            'June': '06',
            'July': '07',
            'August': '08',
            'September': '09',
            'October': '10',
            'November': '11',
            'December': '12'
        };

        var formattedStartDate = `${startDay}-${monthMap[startMonth]}-${startYear}`;
        var formattedEndDate = `${endDay}-${monthMap[endMonth]}-${endYear}`;

        console.log('Start Date:', formattedStartDate);
        console.log('End Date:', formattedEndDate);
    });


</script>

@endsection