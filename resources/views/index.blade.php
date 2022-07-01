@extends('layouts.app')
<script src="https://cdn.tailwindcss.com"></script>

@section('content')
<div class="background-image grid grid-cols-1 m-auto">
    <div class="flex text-gray-100 pt-10">
        <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block text-center">
            <h1 class="sm:text-white text-5xl uppercase font-bold text-shadow-md pb-14">
                Des and Dev
            </h1>
            <a href="/all-posts" class="text-center bg-gray-50 text-gray-700 py-2 px-4 font-bold text-xl uppercase">
                View Blog
            </a>
        </div>
    </div>
</div>

@endsection