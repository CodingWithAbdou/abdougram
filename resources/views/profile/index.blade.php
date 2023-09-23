<x-app-layout>
    <div class="grid grid-cols-12 ">
        <div class="order-0 col-span-4 row-span-3 flex items-center justify-center">
            <img class="md:w-32 md:h-32 w-20 h-20 rounded-full object-cover max-w-full" src="{{$user->image}}">
        </div>

        <div class="order-1 col-span-8 md:row-span-1 row-span-3 flex items-center flex-wrap gap-6">
            <h2 class="text-2xl  ">
                    {{$user->username}}
            </h2>
            @if ( auth()->user()->id == $user->id)
            <div class="flex items-center">
                <a class="mx-2 nice-btn" href="/profile">
                    {{ __("Edit profile")}}
                </a>
                <a href="/profile">
                    {!! auth()->user()->id == $user->id ? "<i class='bx bx-cog text-xl'></i>" : "" !!}
                </a>
            </div>
            @endif
        </div>

        <div class="md:order-3  order-2  col-span-8 py-2">
            <h3>
                {{$user->name}}
            </h3>

            <p>
                {!! nl2br(e($user->bio)) !!}
            </p>
        </div>

        <div class="md:order-2 order-3 md:col-span-8 col-span-12">
            <ul class="flex justify-center md:justify-start md:border-none border-y py-4 gap-6" >
                <li class="text-lg">{{ count($user->posts)  }}{{ count($user->posts) > 0 ? ' Posts' : 'post' }}</li>
                <li class="text-lg"> 0 Follwers</li>
                <li class="text-lg"> 0 Following</li>
            </ul>
        </div>
    </div>
    <div>
        {{-- @if ($user->id == auth()->user()->id)
            @if(count($user->posts) > 0  )

            @else
        @endif --}}

        <div  class="flex justify-center py-8">
            <div class="w-[78%] grid  grid-cols-3  ">
                @foreach ($user->posts as $post)
                <a class="card min-h-[16rem] max-h-[16rem] h-[16rem] bg-black overflow-hidden m-0 w-[16rem] rounded-none" href="/p/{{$post->slug}}">
                    <img class="h-screen object-cover " src="/storage/{{$post->image}}" >
                </a>
            @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
