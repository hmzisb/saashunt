<x-master>
    <div class="bg-top">
        

    @if (session('status'))
    <div id="status" class="font-bold text-red-500 text-lg text-center bg-gray-200 p-2 border border-red-500">
        {{ session('status') }}
    </div>
    @endif

     <div id="timeline-start" class="mt-24">
        <h1 class="font-bold text-gray-700 text-xl py-2">
            Upvoted Apps
        </h1>
    </div>

   
@include('layouts.timeline')

     </div>


</x-master>
