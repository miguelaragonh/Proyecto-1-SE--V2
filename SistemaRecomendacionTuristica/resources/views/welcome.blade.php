@extends('layouts.sideBar')
@section('title', 'Home')
@section('content')
   
    <a href="{{ url('/logout') }}"
        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">logout</a>

@endsection
