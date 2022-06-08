@extends('template')
    @section('content')
        <div class="bg-gray-900 px-20 py-16 rounded-lg mb-8 relative overflow-hidden">
            <!-- Informacion desctacada -->
            <span class="txt-xs uppercase text-gray-700 bg-gray-400 rounded-full px-2 py-1">Programación</span>
            <h1 class="text-3xl text-white mt-4">Blog</h1>
            <p class="text-sm text-gray-400 mt-2">Proyecto de desarrollo web para profesionales</p>
            <img src="{{ asset('images/dev.png')}}" class="absolute -right-20 -bottom-20 opacity-20">

        </div>


        <div class="px-4">   
            <!-- Informacion desctacada -->
            <h1 class="text-2xl mb-8 text-gray-900">Contenido técnico</h1>

            <div class="grid grid-cols-1 gap-4 mb-4">
                @foreach($posts as $post)

                    <a href="{{ route('post', $post->slug) }}" class="bg-gray-100 rounded-lg px-6 py-4">

                        <p class="text-xs flex items-center gap-2">
                            <span class="uppercase text-gray-700 bg-gray-200 rounded-full px-2 py-1">Titurial</span>
                            <span>{{$post->created_at->format('d/m/Y')}}</span>

                        </p>



                        <h2 class="text-lg text-gray-900 mt-2">{{$post->title}}</h2>

                        <div class="text-xs text-gray-900 opacity-75 flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
  <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
</svg>
                        {{$post->user->name}}
                        </div>



                    </a>



                @endforeach

            </div>

            {{$posts->links()}}
        </div>
    @endsection
