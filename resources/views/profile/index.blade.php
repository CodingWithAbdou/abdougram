<x-app-layout>
    <div id="alert" class="{{ session('success') ? '' : 'hidden' }} absolute top-16 right-2  mx-8 bg-green-400 border rounded-lg shadow-sm text-white font-bold p-4 ">
        <span>{{ session('success')}}</span>
    </div>

    <div class="grid grid-cols-12 ">
        <div class="order-0 col-span-4 row-span-3 flex items-center justify-center">
            <img class="md:w-32 md:h-32 w-20 h-20 rounded-full object-cover max-w-full" src="{{$user->image}}">
        </div>

        <div class="order-1 col-span-8 md:row-span-1 row-span-3 flex items-center flex-wrap gap-6">
            <h2 class="text-2xl  ">
                    {{$user->username}}
            </h2>
            <div class="flex items-center">
                @auth
                @livewire('follow', ["userId" => $user->id])
                @endauth
                @guest
                <a class="mx-2 nice-btn  bg-blue-400 hover:bg-blue-500" href="/{{$user->username}}/follow">
                    {{ __("Follow")}}
                </a>
                @endguest
            </div>
        </div>

        <div class="md:order-3  order-2  col-span-8 py-2">
            <h3>
                {{$user->name}}
            </h3>

            <p class="font-bold">
                {!! nl2br(e($user->bio)) !!}
            </p>
        </div>

        <div class="md:order-2 order-3 md:col-span-8 col-span-12">
            <ul class="flex justify-center md:justify-start md:border-none border-y py-4 gap-6" >
                <li class="text-lg">{{ count($user->posts)  }}{{ count($user->posts) > 0 ? ' Posts' : 'post' }}</li>
                <li class="text-lg"> {{$user->followers()->count()}} {{ __('Follwers')}}</li>
                <li class="text-lg"> {{count($user->following)}} {{ __('Following') }}</li>
            </ul>
        </div>
    </div>
    <div>
        @auth

        @if (count($user->posts) > 0 && ($user->id == auth()->user()->id || auth()->user()->isFollowing($user) || $user->private_account == false) )
        <div  class="flex justify-center py-8">
            <div class="w-[78%] grid  grid-cols-3  ">
                @foreach ($user->posts as $post)
                <a class="card min-h-[16rem] max-h-[16rem] h-[16rem] bg-black overflow-hidden m-0 w-[16rem] rounded-none" href="/p/{{$post->slug}}">
                    <img class="h-screen object-cover " src="/storage/{{$post->image}}" >
                </a>
                @endforeach
            </div>
        </div>
        @elseif (count($user->posts) ==  0  && $user->id == auth()->user()->id)
        <div class="text-center w-full mt-8 p-4 rounded-e-md ">{{ __('You Don\'t Have any Posts')}}</div>
        @elseif (auth()->user()->isPending($user))
        <div class="text-center w-full mt-8 p-4 rounded-e-md ">{{ __('After Owner This Page Accept Your Invite You Can See Posts')}}</div>
        @else
        @endauth
        @elseif (count($user->posts) ==  0)
        <div class="text-center w-full mt-8 p-4 rounded-e-md ">{{ __('This User Does\'t Have any Posts')}}</div>
        <div class="text-center w-full mt-8 p-4 rounded-e-md ">{{ __('This Acoount Is Private ,  Follow This account For See All Posts')}}</div>
        @endif


    </div>
</x-app-layout>
<style>
    #alert.hide {
        transition: all .5s;
        display: none;
    }
</style>

<script>

window.addEventListener('load' , hidNotify)
    function hidNotify() {
        setTimeout(() => {
            if(document.querySelector('#alert')) {
                document.querySelector('#alert').classList.add('hide')
            }
        }, 3000);
    }
</script>
