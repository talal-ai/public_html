@extends('Layout.layout')

@section('content')

<div class="flex flex-col gap-5 min-h-[calc(100vh-188px)] sm:min-h-[calc(100vh-204px)]">
  <div class="grid grid-cols-1 gap-5">
    <div class="bg-white dark:bg-dark dark:border-gray/20 border-2 border-lightgray/10 p-5 rounded-lg">
      <div class="mt-3 flex gap-8 items-center justify-center">

      </div>
      <iframe
        src="{{ env('APP_URL') }}/public/mentorshipagreement/mentorshipagreement.pdf"
        width="100%" height="800px"></iframe>

    </div>
  </div>
</div>
@endsection
@section('script')
@endsection