<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SAASHunt Homepage</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-white h-full antialiased leading-relaxed ">

<div id="content" class="mx-32 mt-8"> 
	<!-- Menu !-->
	<div id="menu" class="flex justify-between mb-4">
		<a href="{{route('home')}} ">
		    <div id="logo" class="text-red-500 font-black text-2xl font-sans">
		        SaasHunt
		    </div>
	   </a>

	  
	        <div class="">
	            @auth
	          		<a href=" {{ route('notifications') }} " class="menu-link">Notifications</a>
	           		<a href=" {{ route('myupvotes') }} " class="menu-link">Upvotes</a>
	            	<a href=" {{ route('profile', currentUser()->id) }} " class="menu-link mr-4">Profile</a>
	                <a href="{{ url('/logout') }}" class="btn-outline ml-2" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
	                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                {{ csrf_field() }}
                    </form>
	            @else
	                <a href="{{ route('login') }}" class="btn-outline">{{ __('Login') }}</a>
	                @if (Route::has('register'))
	                    <a href="{{ route('register') }}" class="bg-red-500 font-bold no-underline text-sm font-normal uppercase border-2 border-red-500 px-2 py-1 rounded py-1 hover:bg-gray-800 hover:border-gray-800" style="color: white!important;">{{ __('Register') }}</a>
	                @endif
	            @endauth
	             <a href=" {{ route('submit') }} " class="btn-outline ml-2">Submit App</a>
	        </div>

	</div>

<!-- Main Boy -->
<div class="min-h-screen">
  
       
       {{$slot}}

</div>

</div>

<!-- footer section -->
<div id="footer" class="flex mt-16 p-8 bg-gray-100 w-full rounded-lg text-center content-center items-center justify-center">
    <p class="text-sm text-gray-600">Copyright (c) 2020 - All Rights Reserved</p>
</div>

</body>
</html>
