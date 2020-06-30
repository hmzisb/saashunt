<x-master>

<div class="flex mt-16">
	<div class="bg-gray-200 rounded p-4 w-8/12">
		<h2 class="mb-4">Notifications</h2>
		@foreach($usernotifications as $notify)
			<p>- {{$notify}}. </p>
		@endforeach
		
	</div>
	

</div>

</x-master>