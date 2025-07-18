@extends('Layout.layout')

@section('content')
<div class="flex flex-col gap-5 min-h-[calc(100vh-188px)] sm:min-h-[calc(100vh-204px)]">
    <div class="grid grid-cols-1 gap-5">
        <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
            <h2 class="text-base font-semibold mb-4">Changelog</h2>
            <div class="griod grid-cols-1">
                <div class="space-y-5">
                    <div>
                        <p class="font-semibold">v1.0.0 (18 May, 2024)</p>
                        <div class="space-y-2 mt-3">
                            <p class="text-gray text-sm">- Initial Released</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
