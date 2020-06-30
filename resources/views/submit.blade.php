<x-master>


<div class="flex bg-gray-100 mt-16 py-12 px-8 rounded-lg h-auto flex-col pl-12">

    <div class=" w-full mb-8">
        <h1 class="">Submit A Saas App</h1>
        <p class="0">Submit a Saas app on SAAShunt to make it easier for other people to discover and use.</p>
    </div>

    <div class="flex">
        <form class="mt-4 w-full" method="post" action="{{route('submit')}} " enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="">App Name</label>
                <input class="w-2/3" type="text" name="name" placeholder="Name" value="{{old('name')}}">
                @error('name')
                    <div class="text-xs font-bold text-red-500 mb-4 py-2 right">
                        {{$message}}
                    </div>
                @enderror   
                
            </div>

            <div class="mb-4">
                <label class="">One Liner</label>
                <input class="w-2/3" type="text" name="one_liner" value="{{old('one_liner')}}" placeholder="One line description." >
                @error('one_liner')
                    <div class="text-xs font-bold text-red-500 mb-4 py-2 right">
                        {{$message}}
                    </div>
                @enderror   
            </div>

            <div class="mb-4">
                <label class="">Description</label>
                <textarea class="w-2/3" type="text" name="description" placeholder="Details about the app.">{{old('description')}}</textarea>
                @error('description')
                    <div class="text-xs font-bold text-red-500 mb-4 py-2 right">
                        {{$message}}
                    </div>
                @enderror  
            </div>

            <div class="mb-4">
                <label class="">Category</label>
                <select class="w-2/3 bg-white border-2 text-gray-700 border-gray-400 p-2 rounded w-64" name="category_id">
                @foreach($categories as $category)
                    <option class="p-2 m-2 font-bold" value="{{$category->id}}">{{$category->name}} </option>
                @endforeach
                </select>

                @error('category_id')
                    <div class="text-xs font-bold text-red-500 mb-4 py-2 right">
                        {{$message}}
                    </div>
                @enderror  
            </div>

            <div class="mb-4">
                <label class="">Website</label>
                <input class="w-2/3" type="text" name="website" value="{{old('website')}}" placeholder="Website URL">
                @error('website')
                    <div class="text-xs font-bold text-red-500 mb-4 py-2 right">
                        {{$message}}
                    </div>
                @enderror  
            </div>


            <div class="mb-4">
                <label class="">Thumbnail</label>
                <input class="w-2/3" type="file" name="thumbnail">
                @error('thumbnail')
                    <div class="text-xs font-bold text-red-500 mb-4 py-2 right">
                        {{$message}}
                    </div>
                @enderror  
            </div>


            <div class="mb-4">
                <label class="">Screenshot </label>
                <input class="w-2/3" type="file"  name="screenshot">
                @error('screenshot')
                    <div class="text-xs font-bold text-red-500 mb-4 py-2 right">
                        {{$message}}
                    </div>
                @enderror  
            </div>


            <div class="mb-4">
               
                <input class="w-2/3 bg-red-600 border-0 text-white font-bold text-xl mt-4 rounded-lg" type="submit" name="" style="" value="Submit App" >
            </div>

        </form>
    </div>
    
</div>


</x-master>
