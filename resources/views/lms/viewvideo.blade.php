@extends('Layout.layout')
@section('css')
<style>
    a:hover>.clearfix {
        background-color: rgba(0, 0, 0, 0.05);
        /* Light gray on hover */
    }

    a:hover {
        cursor: pointer;
        /* Ensure pointer shows for the entire clickable area */
    }

    a:active>.clearfix {
        background-color: rgba(0, 0, 0, 0.1);
        /* Slightly darker gray when active */
    }
</style>
<style>
    /* Mobile styles */
    @media (max-width: 768px) {
        iframe {
            height: 250px;
            /* Set iframe height to 50% of the viewport */
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
        }

        .responsive-div {
            height: 250px;
            /* Set height to 50% of the viewport */
            top: 0;
            left: 0;
            right: 0;
        }

        .video-list {
            margin-top: 55%;
            /* Adjust margin to avoid overlap with iframe */
        }

        .video-item {
            display: block;
            /* Ensure videos are visible on mobile */
        }
    }

    /* Desktop styles */
    @media (min-width: 769px) {
        iframe {
            height: 100%;
            /* Full height on larger screens */
        }

        .video-list {
            display: none;
            /* Hide the video list on larger screens */
        }
    }
</style>
@endsection
@section('content')
<div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
    <div class="flex flex-wrap gap-5 ">
        <div x-data="modals">
            @foreach($user->permissionss as $role)
                @foreach($role->permissions as $permission)
                    @if($permission->name == 'can_add' && $permission->description == 'Can Add Videolecture')
                        <div class="flex flex-wrap items-center gap-5">
                            Add New-><svg style="cursor: pointer;" @click="toggle" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.5"
                                    d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z"
                                    stroke="#1C274C" stroke-width="1.5" />
                                <path d="M15 12L12 12M12 12L9 12M12 12L12 9M12 12L12 15" stroke="#1C274C" stroke-width="1.5"
                                    stroke-linecap="round" />
                            </svg>
                        </div>
                        @break
                    @endif
                @endforeach
            @endforeach
            <div class="fixed inset-0 bg-dark/90 dark:bg-white/5 backdrop-blur-sm z-[99999] hidden overflow-y-auto"
                :class="open && '!block'">
                <div class="flex items-start justify-center min-h-screen " @click.self="open = false">
                    <div x-show="open" x-transition x-transition.duration.300
                        class="bg-white dark:bg-dark dark:border-gray/20  border-lightgray/10  overflow-hidden  w-full max-w-5xl">
                        <div
                            class="flex bg-white dark:bg-dark items-center border-b border-lightgray/10 dark:border-gray/20 justify-between px-5 py-3">
                            <h5 class="font-semibold text-lg">Add New Video</h5>
                            <button type="button" class="text-lightgray hover:text-primary" @click="toggle">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                                    <path
                                        d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z"
                                        fill="currentColor"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="p-5 space-y-4">
                            <form action="{{ route('videocreate') }}" method="POST">
                                @csrf
                                <div class="text-lightgray text-sm font-normal">
                                    <input id="created_by" name="created_by" type="hidden" class="form-input w-full"
                                        value="{{ $user->id }}">
                                    <div
                                        class="mt-16 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 p-4">
                                        <div class="p-1">
                                            <h2 class="text-base font-semibold mb-4">Video Title</h2>
                                            <input id="videotitle" name="videotitle" type="text"
                                                class="form-input w-full" placeholder="Video Titile" required>
                                        </div>
                                        <div class="p-1">
                                            <h2 class="text-base font-semibold mb-4">Video Id</h2>
                                            <input id="video_id" name="video_id" type="text" class="form-input w-full"
                                                placeholder="Video ID" required>
                                        </div>
                                        <div class="p-1">
                                            <h2 class="text-base font-semibold mb-4">Program</h2>
                                            <select id="program_id" name="program_id" class="form-select">
                                                <option value="" disabled selected>Select Option</option>
                                                @foreach($programsData as $programs)
                                                    <option value="{{ $programs['id'] }}">
                                                        {{ $programs['name'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="p-1">
                                            <h2 class="text-base font-semibold mb-4">Year</h2>
                                            <select id="year_id" name="year_id" class="form-select">
                                                <option value="" disabled selected>Select Option</option>
                                                @foreach($yearsData as $years)
                                                    <option value="{{ $years['id'] }}">
                                                        {{ $years['name'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="p-1">
                                            <h2 class="text-base font-semibold mb-4">Teacher's</h2>
                                            <select id="teacher_id" name="teacher_id" class="form-select">
                                                <option value="" disabled selected>Select Option</option>
                                                @foreach ($userWithTeacherData as $teacher)
                                                    <option value="{{ $teacher['id'] }}">
                                                        {{ $teacher['name'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="p-1">
                                            <h2 class="text-base font-semibold mb-4">Description</h2>
                                            <textarea name="description" id="description" cols="30" rows="10"
                                                class="form-input w-full" rows="10"
                                                placeholder="Description"></textarea>
                                        </div>
                                        <div class="p-1">
                                            <h2 class="text-base font-semibold mb-4">Status</h2>
                                            <label class="inline-flex items-center">
                                                <input type="radio" name="status" id="status" value="1"
                                                    class="form-radio text-primary" checked="">
                                                <span class="text-sm">Active</span>
                                            </label>
                                            <label class="inline-flex items-center">
                                                <input type="radio" name="status" id="status" value="0"
                                                    class="form-radio text-primary" checked="">
                                                <span class="text-sm">Inactive</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
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
</div>
<div class="flex flex-col gap-5 min-h-[calc(100vh-188px)] sm:min-h-[calc(100vh-204px)]">
    <div class="grid grid-cols-1 gap-4" x-data="chat">
        <div class="flex gap-5 relative overflow-hidden">
            <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 rounded-l-lg xl:rounded-lg py-5 absolute w-72 sm:w-[410px] z-20 flex-none -left-[410px] xl:static overflow-hidden"
                :class="isShowChatMenu && '!left-0'">
                <div class="px-5">
                    <div class="flex items-center gap-5">
                        <form class="w-full">
                            <div class="relative">
                                <input type="text" id="search"
                                    class="form-input ps-10 h-[42px] dark:border-lightgray/20 dark:text-white dark:bg-lightgray/10 border-2 border-gray/10 bg-gray/[8%] rounded-full text-sm text-dark placeholder:text-lightgray/80 focus:ring-0 focus:border-primary/80 focus:outline-0"
                                    placeholder="Search..." required="">
                                <button type="button" class="absolute inset-y-0 left-3 flex items-center">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_87_857)">
                                            <circle cx="8.625" cy="8.625" r="7.125" stroke="#267DFF" stroke-width="2">
                                            </circle>
                                            <path opacity="0.3" d="M15 15L16.5 16.5" stroke="#267DFF" stroke-width="2"
                                                stroke-linecap="round"></path>
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_87_857">
                                                <rect width="18" height="18" fill="white"></rect>
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="my-5 bg-gray/10 h-[2px] block mx-5"></div>
                <div class=" overflow-auto space-y-5 px-5" style="height: calc(110vh - 440px);">
                    @foreach ($videosData as $video)
                        <div class="relative flex items-center gap-4"
                            style="height: 100px; background-color: transparent; transition: background-color 0.3s;">
                            <a href="{{ route('viewvideo', ['video_id' => $video['video_id']]) }}"
                                style="text-decoration: none; color: inherit; cursor: pointer;">
                                <div class="clearfix"
                                    style="height: 100px; background-color: transparent; transition: background-color 0.3s;">
                                    <!-- Image Section -->
                                    <div style="width: 30%; height: 100%;float: left;">
                                        <img src="https://img.youtube.com/vi/{{ $video['video_id'] }}/hqdefault.jpg"
                                            style="width: 100%; height: 100%; object-fit: cover; border-radius: 4px;"
                                            alt="{{ $video['name'] }}">
                                    </div>

                                    <!-- Text Section -->
                                    <div style="height: 100%;width: 70%;padding-left: 10px;padding-top: 10px;float: left;">
                                        <p style="margin: 0; font-size: 14px; font-weight: bold; line-height: 1.4em; 
                                  overflow: hidden; text-overflow: ellipsis; display: -webkit-box; 
                                  -webkit-line-clamp: 4; -webkit-box-orient: vertical; height: 100%;">
                                            {{ $video['name'] }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <div x-data="{ dropdown: false }" class="absolute top-0 right-0">
                                <a href="javascript:;" class="text-lightgray flex items-center justify-center"
                                    @click="dropdown = !dropdown" @keydown.escape="dropdown = false">
                                    <svg width="18" height="4" viewBox="0 0 18 4" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="2" cy="2" r="2" fill="currentColor" />
                                        <circle cx="9" cy="2" r="2" fill="currentColor" />
                                        <circle cx="16" cy="2" r="2" fill="currentColor" />
                                    </svg>
                                </a>
                                <ul x-show="dropdown" @click.away="dropdown = false" x-transition=""
                                    x-transition.duration.300ms=""
                                    class="absolute bg-white shadow-lg rounded border mt-2 w-32 text-sm right-0">
                                    <li class="px-4 py-2 hover:bg-gray-100"><a href="javascript:;">Edit</a></li>
                                    <li class="px-4 py-2 hover:bg-gray-100"><a href="javascript:;">Delete</a></li>
                                </ul>
                            </div>
                        </div>

                        <div style="margin: 20px 0; height: 1px; background-color: rgba(0, 0, 0, 0.1);"></div>
                    @endforeach



                </div>

            </div>
            <div class="bg-dark/90 dark:bg-white/5 backdrop-blur-sm lg:hidden z-[5] w-full h-full absolute rounded-md hidden"
                :class="isShowChatMenu && '!block xl:!hidden'" @click="isShowChatMenu = !isShowChatMenu"></div>
            <div
                class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 rounded-lg flex-grow min-h-[calc(100vh-188px)] sm:min-h-[calc(100vh-204px)]">
                <!-- <div class="p-5 dark:border-gray/20 border-b-2 border-lightgray/10">
                    <div class="flex items-center gap-5">
                        <button type="button" class="xl:hidden hover:text-primary duration-300"
                            @click="isShowChatMenu = !isShowChatMenu">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.3" x="3" y="17.2" width="18" height="1.6" rx="0.8" fill="currentColor">
                                </rect>
                                <rect opacity="0.5" x="3" y="11.6" width="18" height="1.6" rx="0.8" fill="currentColor">
                                </rect>
                                <rect x="3" y="6" width="18" height="1.6" rx="0.8" fill="currentColor"></rect>
                            </svg>
                        </button>
                        <p class="font-semibold text-sm flex-1">All Video's</p>
                    </div>
                </div> -->
                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/{{ $selectedVideo['video_id'] }}"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                <div class="overflow-y-auto max-h-[50vh] p-5 block lg:hidden">
                    @foreach ($videosData as $video)
                        <a href="{{ route('viewvideo', ['video_id' => $video['video_id']]) }}"
                            style="text-decoration: none; color: inherit; cursor: pointer;">
                            <div class="clearfix"
                                style="height: 100px; background-color: transparent; transition: background-color 0.3s;">
                                <!-- Image Section -->
                                <div style="float: left; width: 30%; height: 100%;">
                                    <img src="https://img.youtube.com/vi/{{ $video['video_id'] }}/hqdefault.jpg"
                                        style="width: 100%; height: 100%; object-fit: cover; border-radius: 4px;"
                                        alt="{{ $video['name'] }}">
                                </div>

                                <!-- Text Section -->
                                <div style="float: left; width: 70%; padding-left: 15px; height: 100%;">
                                    <p style="margin: 0; font-size: 14px; font-weight: bold; line-height: 1.4em; 
                                                  overflow: hidden; text-overflow: ellipsis; display: -webkit-box; 
                                                  -webkit-line-clamp: 4; -webkit-box-orient: vertical; height: 100%;">
                                        {{ $video['name'] }}
                                    </p>
                                </div>
                            </div>
                        </a>
                        <div style="margin: 20px 0; height: 1px; background-color: rgba(0, 0, 0, 0.1);"></div>
                    @endforeach
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
@section('script')

<script>
    document.addEventListener("alpine:init", () => {
        Alpine.data("chat", () => ({
            isShowChatMenu: false,
        }));
    });
</script>

@endsection