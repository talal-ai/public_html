@extends('Layout.layout')

@section('content')

<div class="flex flex-col gap-5 min-h-[calc(100vh-188px)] sm:min-h-[calc(100vh-204px)]">
    <div class="grid grid-cols-1">
        <div>
            <ul class="flex flex-wrap items-center text-sm font-semibold space-x-2.5">
                <li class="flex items-center space-x-2.5 text-gray hover:text-dark dark:hover:text-white duration-300">
                    <a href="javaScript:;">Components</a>
                    <svg class="text-gray/50" width="8" height="10" viewBox="0 0 8 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.5" d="M1.33644 0H4.19579C4.60351 0 5.11318 0.264045 5.32903 0.589888L7.83532 4.3427C8.07516 4.70787 8.05119 5.2809 7.77538 5.6236L4.66949 9.5C4.44764 9.77528 3.96795 10 3.6022 10H1.33644C0.287156 10 -0.348385 8.92135 0.203241 8.08427L1.86409 5.59551C2.08594 5.26405 2.08594 4.72472 1.86409 4.39326L0.203241 1.90449C-0.348385 1.07865 0.293152 0 1.33644 0Z" fill="currentColor" />
                    </svg>
                </li>
                <li>Modals</li>
            </ul>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Basic Modal</h2>
            <div x-data="modals">
                <div class="flex items-center justify-center">
                    <button type="button" class="btn border text-primary border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-primary bg-primary/10" @click="toggle">Launch modal</button>
                </div>
                <div class="fixed inset-0 bg-dark/90 dark:bg-white/5 backdrop-blur-sm z-[99999] hidden overflow-y-auto" :class="open && '!block'">
                    <div class="flex items-start justify-center min-h-screen px-4" @click.self="open = false">
                        <div x-show="open" x-transition x-transition.duration.300 class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 rounded-lg overflow-hidden my-8 w-full max-w-lg">
                            <div class="flex bg-white dark:bg-dark items-center border-b border-lightgray/10 dark:border-gray/20 justify-between px-5 py-3">
                                <h5 class="font-semibold text-lg">Basic Modal</h5>
                                <button type="button" class="text-lightgray hover:text-primary" @click="toggle">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                                        <path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="currentColor"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="p-5 space-y-4">
                                <div class="text-lightgray text-sm font-normal">
                                    <p>Lorem Ipsum is simply and typesetting industry. Lorem Ipsum text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                </div>
                                <div class="flex justify-end items-center gap-4">
                                    <button type="button" class="btn border text-danger border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-danger bg-danger/10" @click="toggle">Discard</button>
                                    <button type="button" class="btn border text-primary border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-primary bg-primary/10">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Vertically Centered</h2>
            <div x-data="modals">
                <div class="flex items-center justify-center">
                    <button type="button" class="btn border text-primary border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-primary bg-primary/10" @click="toggle">Launch modal</button>
                </div>
                <div class="fixed inset-0 bg-dark/90 dark:bg-white/5 backdrop-blur-sm z-[99999] hidden overflow-y-auto" :class="open && '!block'">
                    <div class="flex items-center justify-center min-h-screen px-4" @click.self="open = false">
                        <div x-show="open" x-transition x-transition.duration.300 class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 rounded-lg overflow-hidden my-8 w-full max-w-lg">
                            <div class="flex bg-white dark:bg-dark items-center border-b border-lightgray/10 dark:border-gray/20 justify-between px-5 py-3">
                                <h5 class="font-semibold text-lg">Basic Modal</h5>
                                <button type="button" class="text-lightgray hover:text-primary" @click="toggle">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                                        <path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="currentColor"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="p-5 space-y-4">
                                <div class="text-lightgray text-sm font-normal">
                                    <p>Lorem Ipsum is simply and typesetting industry. Lorem Ipsum text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                </div>
                                <div class="flex justify-end items-center gap-4">
                                    <button type="button" class="btn border text-danger border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-danger bg-danger/10" @click="toggle">Discard</button>
                                    <button type="button" class="btn border text-primary border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-primary bg-primary/10">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Vertically Bottom</h2>
            <div x-data="modals">
                <div class="flex items-center justify-center">
                    <button type="button" class="btn border text-purple border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-purple bg-purple/10" @click="toggle">Launch modal</button>
                </div>
                <div class="fixed inset-0 bg-dark/90 dark:bg-white/5 backdrop-blur-sm z-[99999] hidden overflow-y-auto" :class="open && '!block'">
                    <div class="flex items-end justify-center min-h-screen px-4" @click.self="open = false">
                        <div x-show="open" x-transition x-transition.duration.300 class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 rounded-lg overflow-hidden my-8 w-full max-w-lg">
                            <div class="flex bg-white dark:bg-dark items-center border-b border-lightgray/10 dark:border-gray/20 justify-between px-5 py-3">
                                <h5 class="font-semibold text-lg">Basic Modal</h5>
                                <button type="button" class="text-lightgray hover:text-primary" @click="toggle">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                                        <path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="currentColor"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="p-5 space-y-4">
                                <div class="text-lightgray text-sm font-normal">
                                    <p>Lorem Ipsum is simply and typesetting industry. Lorem Ipsum text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                </div>
                                <div class="flex justify-end items-center gap-4">
                                    <button type="button" class="btn border text-danger border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-danger bg-danger/10" @click="toggle">Discard</button>
                                    <button type="button" class="btn border text-primary border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-primary bg-primary/10">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Static Modal</h2>
            <div x-data="modals">
                <div class="flex items-center justify-center">
                    <button type="button" class="btn border text-purple border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-purple bg-purple/10" @click="toggle">Launch modal</button>
                </div>
                <div class="fixed inset-0 bg-dark/90 dark:bg-white/5 backdrop-blur-sm z-[99999] hidden overflow-y-auto" :class="open && '!block'">
                    <div class="flex items-start justify-center min-h-screen px-4">
                        <div x-show="open" x-transition x-transition.duration.300 class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 rounded-lg overflow-hidden my-8 w-full max-w-lg">
                            <div class="flex bg-white dark:bg-dark items-center border-b border-lightgray/10 dark:border-gray/20 justify-between px-5 py-3">
                                <h5 class="font-semibold text-lg">Basic Modal</h5>
                                <button type="button" class="text-lightgray hover:text-primary" @click="toggle">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                                        <path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="currentColor"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="p-5 space-y-4">
                                <div class="text-lightgray text-sm font-normal">
                                    <p>Lorem Ipsum is simply and typesetting industry. Lorem Ipsum text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                </div>
                                <div class="flex justify-end items-center gap-4">
                                    <button type="button" class="btn border text-danger border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-danger bg-danger/10" @click="toggle">Discard</button>
                                    <button type="button" class="btn border text-primary border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-primary bg-primary/10">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Removed Animation</h2>
            <div x-data="modals">
                <div class="flex items-center justify-center">
                    <button type="button" class="btn border text-success border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-success bg-success/10" @click="toggle">Launch modal</button>
                </div>
                <div class="fixed inset-0 bg-dark/90 dark:bg-white/5 backdrop-blur-sm z-[99999] hidden overflow-y-auto" :class="open && '!block'">
                    <div class="flex items-start justify-center min-h-screen px-4" @click.self="open = false">
                        <div x-show="open" class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 rounded-lg overflow-hidden my-8 w-full max-w-lg">
                            <div class="flex bg-white dark:bg-dark items-center border-b border-lightgray/10 dark:border-gray/20 justify-between px-5 py-3">
                                <h5 class="font-semibold text-lg">Basic Modal</h5>
                                <button type="button" class="text-lightgray hover:text-primary" @click="toggle">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                                        <path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="currentColor"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="p-5 space-y-4">
                                <div class="text-lightgray text-sm font-normal">
                                    <p>Lorem Ipsum is simply and typesetting industry. Lorem Ipsum text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                </div>
                                <div class="flex justify-end items-center gap-4">
                                    <button type="button" class="btn border text-danger border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-danger bg-danger/10" @click="toggle">Discard</button>
                                    <button type="button" class="btn border text-primary border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-primary bg-primary/10">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Scorllable Modal</h2>
            <div x-data="modals">
                <div class="flex items-center justify-center">
                    <button type="button" class="btn border text-success border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-success bg-success/10" @click="toggle">Launch modal</button>
                </div>
                <div class="fixed inset-0 bg-dark/90 dark:bg-white/5 backdrop-blur-sm z-[99999] hidden overflow-y-auto" :class="open && '!block'">
                    <div class="flex items-start justify-center min-h-screen px-4" @click.self="open = false">
                        <div x-show="open" x-transition x-transition.duration.300 class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 rounded-lg overflow-hidden my-8 w-full max-w-lg">
                            <div class="flex bg-white dark:bg-dark items-center border-b border-lightgray/10 dark:border-gray/20 justify-between px-5 py-3">
                                <h5 class="font-semibold text-lg">Basic Modal</h5>
                                <button type="button" class="text-lightgray hover:text-primary" @click="toggle">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                                        <path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="currentColor"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="p-5 space-y-4">
                                <div class="text-lightgray text-sm font-normal h-48 min-h-full overflow-y-auto">
                                    <p>Lorem Ipsum is simply dummy text of the industry.</p>
                                    </br>
                                    </br>
                                    </br>
                                    </br>
                                    </br>
                                    </br>
                                    </br>
                                    </br>
                                    <p>Lorem Ipsum is simply dummy text of the industry.</p>
                                    </br>
                                    </br>
                                    </br>
                                    </br>
                                    </br>
                                    </br>
                                    </br>
                                    </br>
                                    <p>Lorem Ipsum is simply dummy text of the industry.</p>
                                </div>
                                <div class="flex justify-end items-center gap-4">
                                    <button type="button" class="btn border text-danger border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-danger bg-danger/10" @click="toggle">Discard</button>
                                    <button type="button" class="btn border text-primary border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-primary bg-primary/10">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Modal Sizes</h2>
            <div class="flex flex-wrap gap-5 justify-center">
                <div x-data="modals">
                    <div class="flex items-center justify-center">
                        <button type="button" class="btn dark:hover:bg-white border border-transparent rounded-md  transition-all duration-300 dark:hover:text-dark dark:bg-white/10 hover:text-white hover:bg-dark bg-dark/10" @click="toggle">Small modal</button>
                    </div>
                    <div class="fixed inset-0 bg-dark/90 dark:bg-white/5 backdrop-blur-sm z-[99999] hidden overflow-y-auto" :class="open && '!block'">
                        <div class="flex items-start justify-center min-h-screen px-4" @click.self="open = false">
                            <div x-show="open" x-transition x-transition.duration.300 class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 rounded-lg overflow-hidden my-8 w-full max-w-sm">
                                <div class="flex bg-white dark:bg-dark items-center border-b border-lightgray/10 dark:border-gray/20 justify-between px-5 py-3">
                                    <h5 class="font-semibold text-lg">Small Modal</h5>
                                    <button type="button" class="text-lightgray hover:text-primary" @click="toggle">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                                            <path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="currentColor"></path>
                                        </svg>
                                    </button>
                                </div>
                                <div class="p-5 space-y-4">
                                    <div class="text-lightgray text-sm font-normal">
                                        <p>Lorem Ipsum is simply and typesetting industry. Lorem Ipsum text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                    </div>
                                    <div class="flex justify-end items-center gap-4">
                                        <button type="button" class="btn border text-danger border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-danger bg-danger/10" @click="toggle">Discard</button>
                                        <button type="button" class="btn border text-primary border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-primary bg-primary/10">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div x-data="modals">
                    <div class="flex items-center justify-center">
                        <button type="button" class="btn dark:hover:bg-white border border-transparent rounded-md  transition-all duration-300 dark:hover:text-dark dark:bg-white/10 hover:text-white hover:bg-dark bg-dark/10" @click="toggle">Large modal</button>
                    </div>
                    <div class="fixed inset-0 bg-dark/90 dark:bg-white/5 backdrop-blur-sm z-[99999] hidden overflow-y-auto" :class="open && '!block'">
                        <div class="flex items-start justify-center min-h-screen px-4" @click.self="open = false">
                            <div x-show="open" x-transition x-transition.duration.300 class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 rounded-lg overflow-hidden my-8 w-full max-w-xl">
                                <div class="flex bg-white dark:bg-dark items-center border-b border-lightgray/10 dark:border-gray/20 justify-between px-5 py-3">
                                    <h5 class="font-semibold text-lg">Large Modal</h5>
                                    <button type="button" class="text-lightgray hover:text-primary" @click="toggle">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                                            <path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="currentColor"></path>
                                        </svg>
                                    </button>
                                </div>
                                <div class="p-5 space-y-4">
                                    <div class="text-lightgray text-sm font-normal">
                                        <p>Lorem Ipsum is simply and typesetting industry. Lorem Ipsum text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                    </div>
                                    <div class="flex justify-end items-center gap-4">
                                        <button type="button" class="btn border text-danger border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-danger bg-danger/10" @click="toggle">Discard</button>
                                        <button type="button" class="btn border text-primary border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-primary bg-primary/10">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div x-data="modals">
                    <div class="flex items-center justify-center">
                        <button type="button" class="btn dark:hover:bg-white border border-transparent rounded-md  transition-all duration-300 dark:hover:text-dark dark:bg-white/10 hover:text-white hover:bg-dark bg-dark/10" @click="toggle">Extra Large modal</button>
                    </div>
                    <div class="fixed inset-0 bg-dark/90 dark:bg-white/5 backdrop-blur-sm z-[99999] hidden overflow-y-auto" :class="open && '!block'">
                        <div class="flex items-start justify-center min-h-screen px-4" @click.self="open = false">
                            <div x-show="open" x-transition x-transition.duration.300 class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 rounded-lg overflow-hidden my-8 w-full max-w-5xl">
                                <div class="flex bg-white dark:bg-dark items-center border-b border-lightgray/10 dark:border-gray/20 justify-between px-5 py-3">
                                    <h5 class="font-semibold text-lg">Extra Large Modal</h5>
                                    <button type="button" class="text-lightgray hover:text-primary" @click="toggle">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-5 h-5">
                                            <path d="M12.0007 10.5865L16.9504 5.63672L18.3646 7.05093L13.4149 12.0007L18.3646 16.9504L16.9504 18.3646L12.0007 13.4149L7.05093 18.3646L5.63672 16.9504L10.5865 12.0007L5.63672 7.05093L7.05093 5.63672L12.0007 10.5865Z" fill="currentColor"></path>
                                        </svg>
                                    </button>
                                </div>
                                <div class="p-5 space-y-4">
                                    <div class="text-lightgray text-sm font-normal">
                                        <p>Lorem Ipsum is simply and typesetting industry. Lorem Ipsum text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                                    </div>
                                    <div class="flex justify-end items-center gap-4">
                                        <button type="button" class="btn border text-danger border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-danger bg-danger/10" @click="toggle">Discard</button>
                                        <button type="button" class="btn border text-primary border-transparent rounded-md transition-all duration-300 hover:text-white hover:bg-primary bg-primary/10">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
