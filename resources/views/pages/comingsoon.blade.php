@extends('Layout.layout2')

@section('content')

<div class="relative">
    <div class="md:p-10 p-6 flex items-center justify-center sm:justify-between w-full flex-wrap gap-5">
        <a href="{{ route('index') }}" class="main-logo">
            <img src="{{ asset('assets/images/logo-dark.png') }}" class="dark-logo h-8 logo dark:hidden" alt="logo" />
            <img src="{{ asset('assets/images/logo-light.png') }}" class="light-logo h-8 logo hidden dark:block" alt="logo" />
        </a>
        <div class="flex items-center gap-5">
            <div class="text-lightgray hover:text-primary duration-300 md:block hidden">
                <a href="javascript:;" x-show="$store.app.mode === 'light'" @click="$store.app.toggleMode('dark')" style="display: none;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd" d="M22 11.9999C22 17.5228 17.5228 21.9999 12 21.9999C10.8358 21.9999 9.71801 21.801 8.67887 21.4352C8.24138 20.3767 8 19.2165 8 17.9999C8 15.7787 8.80467 13.7454 10.1384 12.1757C11.31 13.8813 13.2744 14.9999 15.5 14.9999C17.8615 14.9999 19.9289 13.7405 21.0672 11.8568C21.3065 11.4607 22 11.5372 22 11.9999Z" fill="currentColor" />
                        <path d="M2 12C2 16.3586 4.78852 20.0659 8.67887 21.4353C8.24138 20.3768 8 19.2166 8 18C8 15.7788 8.80467 13.7455 10.1384 12.1758C9.42027 11.1303 9 9.86422 9 8.5C9 6.13845 10.2594 4.07105 12.1432 2.93276C12.5392 2.69347 12.4627 2 12 2C6.47715 2 2 6.47715 2 12Z" fill="currentColor" />
                    </svg>
                </a>
                <a href="javascript:;" x-show="$store.app.mode === 'dark'" @click="$store.app.toggleMode('light')">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18 12C18 15.3137 15.3137 18 12 18C8.68629 18 6 15.3137 6 12C6 8.68629 8.68629 6 12 6C15.3137 6 18 8.68629 18 12Z" fill="currentColor" />
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12 1.25C12.4142 1.25 12.75 1.58579 12.75 2V3C12.75 3.41421 12.4142 3.75 12 3.75C11.5858 3.75 11.25 3.41421 11.25 3V2C11.25 1.58579 11.5858 1.25 12 1.25ZM1.25 12C1.25 11.5858 1.58579 11.25 2 11.25H3C3.41421 11.25 3.75 11.5858 3.75 12C3.75 12.4142 3.41421 12.75 3 12.75H2C1.58579 12.75 1.25 12.4142 1.25 12ZM20.25 12C20.25 11.5858 20.5858 11.25 21 11.25H22C22.4142 11.25 22.75 11.5858 22.75 12C22.75 12.4142 22.4142 12.75 22 12.75H21C20.5858 12.75 20.25 12.4142 20.25 12ZM12 20.25C12.4142 20.25 12.75 20.5858 12.75 21V22C12.75 22.4142 12.4142 22.75 12 22.75C11.5858 22.75 11.25 22.4142 11.25 22V21C11.25 20.5858 11.5858 20.25 12 20.25Z" fill="currentColor" />
                        <g opacity="0.3">
                            <path d="M4.39838 4.39838C4.69127 4.10549 5.16615 4.10549 5.45904 4.39838L5.85188 4.79122C6.14477 5.08411 6.14477 5.55898 5.85188 5.85188C5.55898 6.14477 5.08411 6.14477 4.79122 5.85188L4.39838 5.45904C4.10549 5.16615 4.10549 4.69127 4.39838 4.39838Z" fill="currentColor" />
                            <path d="M19.6009 4.39864C19.8938 4.69153 19.8938 5.16641 19.6009 5.4593L19.2081 5.85214C18.9152 6.14503 18.4403 6.14503 18.1474 5.85214C17.8545 5.55924 17.8545 5.08437 18.1474 4.79148L18.5402 4.39864C18.8331 4.10575 19.308 4.10575 19.6009 4.39864Z" fill="currentColor" />
                            <path d="M18.1474 18.1474C18.4403 17.8545 18.9152 17.8545 19.2081 18.1474L19.6009 18.5402C19.8938 18.8331 19.8938 19.308 19.6009 19.6009C19.308 19.8938 18.8331 19.8938 18.5402 19.6009L18.1474 19.2081C17.8545 18.9152 17.8545 18.4403 18.1474 18.1474Z" fill="currentColor" />
                            <path d="M5.85188 18.1477C6.14477 18.4406 6.14477 18.9154 5.85188 19.2083L5.45904 19.6012C5.16615 19.8941 4.69127 19.8941 4.39838 19.6012C4.10549 19.3083 4.10549 18.8334 4.39838 18.5405L4.79122 18.1477C5.08411 17.8548 5.55898 17.8548 5.85188 18.1477Z" fill="currentColor" />
                        </g>
                    </svg>
                </a>
            </div>
        </div>
    </div>
    <div class="min-h-[calc(100vh-192px)] p-7 flex justify-center items-center">
        <div class="text-center">
            <p class="text-5xl/snug font-extrabold">Coming Soon</p>
            <div class="flex justify-center items-center text-[40px]/normal font-semibold gap-7 mt-[50px]" x-data="timer(new Date().setDate(new Date().getDate() + 1))" x-init="init();">
                <div>
                    <h1 x-text="time().hours"></h1>
                    <p class="text-xl text-gray font-medium text-center">Hours</p>
                </div>
                <p class="text-gray/25">:</p>
                <div>
                    <h1 x-text="time().minutes"></h1>
                    <p class="text-xl text-gray font-medium text-center">Minutes</p>
                </div>
                <p class="text-gray/25">:</p>
                <div>
                    <h1 x-text="time().seconds"></h1>
                    <p class="text-xl text-gray font-medium text-center">Seconds</p>
                </div>
            </div>
            <div class="relative max-w-[430px] mx-auto mt-14">
                <input type="email" id="email1" class="form-input h-[66px] bg-transparent dark:bg-transparent text-base rounded-[10px] ps-5 pe-14" placeholder="Enter your email to subscribe for updates.">
                <button type="submit" class="text-success absolute right-5 top-1/2 -translate-y-1/2">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.49746 20.835L21.0072 13.4725C22.3309 12.8822 22.3309 11.1178 21.0072 10.5275L4.49746 3.16496C3.00163 2.49789 1.45006 3.97914 2.19099 5.36689L5.34302 11.2706C5.58817 11.7298 5.58818 12.2702 5.34302 12.7294L2.19099 18.6331C1.45007 20.0209 3.00163 21.5021 4.49746 20.835Z" fill="currentColor" />
                    </svg>
                </button>
            </div>
            <img src="{{ asset('assets/images/soon-light.png') }}" class="lg:mt-32 sm:mt-16 mt-14 dark:hidden" alt="">
            <img src="{{ asset('assets/images/soon-dark.png') }}" class="lg:mt-32 sm:mt-16 mt-14 hidden dark:block" alt="">
        </div>
    </div>
   
</div>
<footer class="py-7 px-3 text-center">
    <p class="font-semibold">
        &copy;
        <script>
            var year = new Date(); document.write(year.getFullYear());
        </script>
        RAHBAR MEDICAL & DENTAL COLLEGE
    </p>
</footer>

@endsection
@section('script')

<script>
    function timer(expiry) {
        return {
            expiry: expiry,
            remaining: null,
            init() {
                this.setRemaining()
                setInterval(() => {
                    this.setRemaining();
                }, 1000);
            },
            setRemaining() {

                const diff = this.expiry - new Date().getTime();
                this.remaining = parseInt(diff / 1000);
            },
            days() {
                return {
                    value: this.remaining / 86400,
                    remaining: this.remaining % 86400
                };
            },
            hours() {
                return {
                    value: this.days().remaining / 3600,
                    remaining: this.days().remaining % 3600
                };
            },
            minutes() {
                return {
                    value: this.hours().remaining / 60,
                    remaining: this.hours().remaining % 60
                };
            },
            seconds() {
                return {
                    value: this.minutes().remaining,
                };
            },
            format(value) {
                return ("0" + parseInt(value)).slice(-2)
            },
            time() {
                return {
                    days: this.format(this.days().value),
                    hours: this.format(this.hours().value),
                    minutes: this.format(this.minutes().value),
                    seconds: this.format(this.seconds().value),
                }
            },
        }
    }
</script>

@endsection