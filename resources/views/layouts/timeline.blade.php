


    <div id="timeline" class="flex mt-2 w-5/6 bg-gray-200 p-8 rounded flex-col">

        <!-- single product start -->

        @forelse($saas as $sas)
        <a href="/app/{{$sas->slug}}">
            <div id="product" class="flex py-3 border border-gray-400  rounded-lg bg-white w-full mb-6">

                <div id="thumb" class="w-2/12 justify-center flex self-center">
                    <img 
                        src="/{{$sas->thumbnail}}"
                        style="width: 80px; height: 80px;" 
                        class="rounded-full object-cover" 
                    >
                </div>

                <div id="data" class="ml-1 w-8/12 pr-4 self-center justify-center">
                    <h2 class="font-bold text-gray-800 text-xl">{{$sas->name}} </h2>
                    <p class="text-gray-700 text-sm " style="max-height: 40px; overflow: hidden;">{{$sas->one_liner}}</p>
                </div>

                <div id="actions" class="flex flex-col w-2/12 self-center justify-center h-auto mt-2">
                    <button class="secondary-button w-32">More Details</button>
                    <button class="secondary-button w-32">Visit Website</button>
    
                    @can('delete-saas', $sas)
                        <form action="/app/delete/{{$sas->id}}" method="post">
                            @csrf
                            <button type="submit" class=" w-32 text-xs rounded text-red-900 hover:bg-red-700 hover:text-white">Delete App</button>
                        </form>
                    @endcan

                </div>

            </div>
        </a>
        @empty
        <p>Nothing here right now.</p>

            
        @endforelse

         <!-- single product End -->

    </div>
