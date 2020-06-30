<x-master>

<div>
	

<table class="table-auto  rounded-lg w-full mt-16">
  <tbody>
    <tr>
        <td class="border border-gray-200  px-4 py-2">Name:</td>
        <td class="border border-gray-200  px-4 py-2">{{$user->name}}</td>
    </tr>

    <tr>
        <td class="border border-gray-200  px-4 py-2">Joined:</td>
        <td class="border border-gray-200  px-4 py-2">{{$user->created_at->diffForHumans()}}</td>
    </tr>

  </tbody>
</table>

<div id="timeline-start" class="mt-12">
    <h1 class="font-bold text-gray-700 text-xl py-2">Apps Submitted by {{$user->name}}</h1>
</div>

@include('layouts.timeline')



</div>

</x-master>