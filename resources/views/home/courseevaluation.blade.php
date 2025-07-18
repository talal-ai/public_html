@extends('Layout.layout')
@if (session('success'))
<div x-data="{ toastVisible: true, toastTimer: null }" x-init="toastTimer = setTimeout(() => toastVisible = false, 3000)">
        <div x-show="toastVisible" 
             class="bg-success text-white py-3 px-4 rounded-md max-w-[240px] fixed top-5 right-5 z-[99999]" 
             x-transition:enter="transition ease-out duration-300" 
             x-transition:enter-start="opacity-0" 
             x-transition:enter-end="opacity-100" 
             x-transition:leave="transition ease-in duration-300" 
             x-transition:leave-start="opacity-100" 
             x-transition:leave-end="opacity-0">
            <span>{{ session('success') }}</span>
        </div>
    </div>
        @endif

        @if (session('error'))
            <div x-data="{ toastVisible: true, toastTimer: null }" x-init="toastTimer = setTimeout(() => toastVisible = false, 6000)">
        <div x-show="toastVisible" 
             class="bg-danger text-white py-3 px-4 rounded-md max-w-[240px] fixed top-5 right-5 z-[99999]" 
             x-transition:enter="transition ease-out duration-300" 
             x-transition:enter-start="opacity-0" 
             x-transition:enter-end="opacity-100" 
             x-transition:leave="transition ease-in duration-300" 
             x-transition:leave-start="opacity-100" 
             x-transition:leave-end="opacity-0">
            <span>{{ session('error') }}</span>
        </div>
    </div>
        @endif
@section('content')

<div class="flex flex-col gap-5 min-h-[calc(100vh-188px)] sm:min-h-[calc(100vh-204px)]">
    <div class="grid grid-cols-1 gap-5">
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Feedback</h2>
        </div>
    </div>
    <div class="grid grid-cols-1 gap-5">
    <form action="{{ route('storeSurveyResponses') }}" method="POST">
            @csrf
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <!--<p class="text-base font-semibold mb-4" style="font-size: 2.3rem;text-align: center;line-height:30px;">-->
            <!--    </p>-->
            <p class="text-base font-semibold mb-4" style="font-size: 2.3rem;text-align: center;line-height:30px;">
                STUDENT COURSE EVALUATION FORM</p>
            <p class="text-base font-semibold mb-4" style="font-size: 1.3rem;text-align: center;line-height:30px;">PART
                1: DEMOGRAPHIC INFORMATION</p>
            <div class="flex w-full gap-4" style="padding-top: 15px;">
                <div class="flex-1">
                    <h2 class="text-base font-semibold mb-4">Name</h2>
                    <input id="name" name="name" type="text" class="form-input w-full" placeholder="Name"
                        required>
                        <input type="hidden" name="survey_type" value="{{ $surveyType }}">
                </div>
                <div class="flex-1">
                    <h2 class="text-base font-semibold mb-4">Year of study</h2>
                    <input id="year_of_study" name="year_of_study" type="number" class="form-input w-full  positive-only" min="0"
                        placeholder="Year of study" required>
                </div>
            </div>
            <div class="flex w-full gap-4" style="padding-top: 15px;">
                <div class="flex-1">
                    <h2 class="text-base font-semibold mb-4">Gender</h2>
                    <select id="gender" name="gender" class="form-select" required>
                                                <option value="" disabled selected>Select Gender</option>
                                                <option value="male">Male</option>
                                                <option value="male">Female</option>
                                            </select>
                </div>
                <div class="flex-1">
                    <h2 class="text-base font-semibold mb-4">Age</h2>
                    <input id="age" name="age" type="number" class="form-input w-full  positive-only" min="0" placeholder="Age" required>
                </div>
                <div class="flex-1">
                    <h2 class="text-base font-semibold mb-4">Date</h2>
                    <input id="date" name="date" type="date" class="form-input w-full" placeholder="Date" required>
                </div>
            </div>
            <p class="text-base font-semibold mb-4"
                style="font-size: 1.3rem;text-align: center;line-height:30px;margin-top:20px;">PART
                2: CORE QUESTION</p>
            <p class="text-base font-semibold mb-4" style="font-size: 1.3rem;text-align: left;line-height:30px;">Make
                each item according to the following scale:</p>
            <div class="flex w-full gap-4" style="padding-top: 15px;">
                <div class="flex-1">
                    <h2 class="text-base font-semibold mb-4">SD = Strongly Disagree (1)</h2>
                </div>
                <div class="flex-1">
                    <h2 class="text-base font-semibold mb-4">DG = Disagree(2)</h2>
                </div>
                <div class="flex-1">
                    <h2 class="text-base font-semibold mb-4">UC = Uncertain(3)</h2>
                </div>
                <div class="flex-1">
                    <h2 class="text-base font-semibold mb-4">AG = Agree(4)</h2>
                </div>
                <div class="flex-1">
                    <h2 class="text-base font-semibold mb-4">SA = Strongly Agree(5)</h2>
                </div>
            </div>
            <div class="overflow-auto">
           
                @foreach ($categories as $category)
                    <table class="min-w-[640px] w-full product-table mb-8">
                        <thead>
                            <tr class="text-left">
                                <th colspan="6" class="text-xl font-bold">
                                    {{ $category->name }}
                                </th>
                            </tr>
                            <tr class="text-left">
                                <th>Questions</th>
                                <!-- Radio button options -->
                                <!-- @foreach (range(1, 5) as $i)
                        <th>{{ $i }}</th>
                    @endforeach -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category->questions as $question)
                                <tr style="border-bottom-width: 2px; border-color: #7780a11a; line-height: 50px;">
                                    <td>
                                        {{ $question->question_text }}
                                    </td>
                                    @foreach ($question->options as $option)
                                        <td>
                                            <label class="inline-flex items-center">
                                                <input type="radio" name="responses[{{ $question->id }}]" value="{{ $option->id }}"
                                                    class="form-radio text-primary" required>
                                                <span class="text-sm">
                                                    {{ $option->value }}
                                                </span>
                                            </label>
                                        </td>
                                    @endforeach
                                    <!-- Fill remaining columns with empty cells if needed -->
                                    @for ($i = $question->options->count(); $i < 5; $i++)
                                        <td></td>
                                    @endfor
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endforeach
                <div class="grid grid-cols-1 gap-5">
                    <div class="space-y-4">
                        <label for="billtitle" class="text-sm">Please specify the best features of the session</label>
                        <textarea id="billtitle" name="psbfs" rows="5" class="form-input h-auto rounded-lg resize-none"
                            placeholder="Your message..." ></textarea>
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-5">
                    <div class="space-y-4">
                        <label for="billtitle" class="text-sm">The session could have been improved by:</label>
                        <textarea id="billtitle" name="sib" rows="5" class="form-input h-auto rounded-lg resize-none"
                            placeholder="Your message..." ></textarea>
                    </div>
                </div>
                <button type="submit"
                                        class="btn border text-primary border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-primary bg-primary/10">Submit</button>
</form>
            </div>
        </div>
    </div>
</div>

@endsection