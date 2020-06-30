<x-master>
    <div class="bg-top">
        
   

    <div class="flex my-16   items-center  flex-col" >

        <h3 class="font-bold text-4xl text-gray-800 ">Search Best SaaS Tools</h3>
        <p class="text-gray-700 mb-6 text-sm">Find best SAAS tools easily, filter down and compare to find the best one's.</p>
      

        <form class="flex border-2 border-gray-400 rounded-lg p-1 w-1/2">
            <input type="text" name="term" class="px-2 outline-none w-full border-0" placeholder="Search anything...">
            <input type="submit" name="" value="Search" class="border-0 bg-gray-800 text-white p-1 px-2 rounded-lg hover:bg-red-500 outline-none cursor-pointer">
            
        </form>
        
    </div>

 <div id="timeline-start" class="mt-24">
    <h1 class="font-bold text-gray-700 text-xl py-2">Latest Apps</h1>
</div>  

   
@include('layouts.timeline')

     </div>


</x-master>
