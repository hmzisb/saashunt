<x-master>

    <div id="main-app" class="mt-8 p-10 rounded" style="background: #fbfbfb">

    	<!-- first section -->
    	<div id="top-section" class="flex bg-white p-3 border border-gray-300 rounded">
    		<!-- left side -->
    		<div id="left" class="flex w-10/12 ml-3">
    			<div class="flex items-start ">
    				<!-- Thumb -->
    				<div class="w-32">
		    			<img src="/{{$saas->thumbnail}}" class=" rounded-full p-2" style="width: 100px;">
		    		</div>
		    		<!-- Details -->
	    			<div id="details" class="ml-2 w-9/12 flex flex-col  self-center">
		    			<h1 class="font-bold text-2xl text-gray-800 mb-0">{{$saas->name}} </h1>
		    			<p id="line" class="text-gray-700">{{$saas->one_liner}}</p>
			    	</div>
		    	</div>
    		</div>
    		<!-- Right Side -->
    		<div id="right" class="ml-16 w-2/12">
                @auth
                    <form action="/app/upvote/{{$saas->id}}" method="post">
                        @csrf
                        <button class="
                            {{currentUser()->checkIfUserUpvoted($saas) ? 'app-button-selected' : 'app-button'}}
                        ">
                         {{currentUser()->checkIfUserUpvoted($saas) ? 'Upvoted' : 'Upvote'}}

                        </button>
                    </form>	
                @endauth
    			<button class="app-button"> <a target="_blank" href="{{$saas->website}}?ref=saashunt ">Website</a> </button>
    		</div>
    	</div>

    	<!-- Second section -->
    	<div id="second-section" class="flex justify-between mt-4">

    		<!-- Second Left -->
    		<div id="left2" class="border border-gray-300 w-8/12 rounded-lg p-2 bg-white mr-4">
    			<img src="/{{$saas->screenshot}}" style="">
    		</div>

    		<!-- Second Right -->
    		<div id="right2" class="w-4/12 border border-gray-300 bg-white rounded-lg text-gray-600">
				<table class="table-auto  rounded-lg w-full">
				  <thead>
				    <tr>
				        <th class="border border-gray-200 px-4 py-2 text-left ">About</th>
				        <th class="border border-gray-200 px-4 py-2 text-left">Details</th>
				    </tr>
				  </thead>
				  <tbody>
				    <tr>
				        <td class="border border-gray-200  px-4 py-2">Name:</td>
				        <td class="border border-gray-200  px-4 py-2">{{$saas->name}}</td>
				    </tr>
				    <tr>
				        <td class="border border-gray-200  px-4 py-2">Submited By:</td>
				        <td class="border border-gray-200  px-4 py-2">
                          <a href="/profile/{{$saas->user_id}}">{{$saas->user->name}}</a>  
                        </td>
				    </tr>
				    <tr>
				        <td class="border border-gray-200  px-4 py-2">Release Date</td>
				        <td class="border border-gray-200  px-4 py-2">{{$saas->created_at->diffForHumans()}}</td>
				    </tr>
                    <tr>
                        <td class="border border-gray-200  px-4 py-2">Website</td>
                        <td class="border border-gray-200  px-4 py-2">
                        <a href="{{$saas->website}}"> Visit Website </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="border border-gray-200  px-4 py-2">Category</td>
                        <td class="border border-gray-200  px-4 py-2">
                        <a href="/category/{{$saas->category->name}}">{{$saas->category->name}}</a> 
                        </td>
                    </tr>
				  </tbody>
				</table>
    		</div>
    	</div>

    	<!-- Thir section -->
    	<div id="third-section" class="flex justify-between mt-4">
    		<div id="info" class="border border-gray-300 w-full bg-white p-5 text-gray-800">
    			<p>{{$saas->description}}</p>
    		</div>
    	</div>

    	<div id="fourth-section" class="flex justify-between mt-4 bg-white text-center text-gray-600">
    		<div id="reviews" class="border border-gray-200 w-8/12 bg-white">

                <form action="{{route('addreview') }}" method="post" class="mb-8">
                    @csrf
                    <input type="hidden" name="saas_id" value="{{$saas->id}}" >
                    <input type="text" class="w-11/12 h-32 m-4 border p-2" name="body">
                    <input type="submit" class="border hover:shadow rounded-lg text-sm p-2 w-2/12 float-left ml-8 text-gray-600 font-bold" value="Add Review">
                </form>
                <div class="clear-both"></div>

                @error('saas_id')
                {{$message}}
                @enderror
                @error('body')
                {{$message}}
                @enderror
                @error('user_id')
                {{$message}}
                @enderror

                <hr class="mt-8 mb-4 ">

                @foreach($saas->reviews as $review)

                <div class="flex flex-col p-4 ml-4 text-left">

                    <p class="font-bold"> <a href="{{route('profile',$review->user->id)}} "> {{$review->user->name}} </a> </p>
                    <p class="mb-2"> {{$review->body}} </p> 
                    <p class="text-xs text-gray-500 mb-2"> {{ $review->updated_at->diffForHumans()}} </p>
                    
                    <hr>    
                </div>
                
                @endforeach

    		</div>
    		<div id="related-side" class="border border-gray-200 w-4/12">
    			Related Apps Coming soon
    		</div>
    	</div>


        
    </div>


</x-master>
