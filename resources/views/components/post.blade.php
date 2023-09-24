<div class="card">
    {{-- card  head --}}
    <div class="card-header gap-2">
        <a href="/profile/{{$post->owner->username}}">
            <img class="w-9 h-9 rounded-full border-gray-400" src="{{$post->owner->image}}" >
        </a>
        <a href="/profile/{{$post->owner->username}}">
            {{$post->owner->username}}
        </a>
    </div>

    {{-- body card --}}
    <div class="card-body">

        <div class="bg-black overflow-hidden min-h-[25rem] flex items-center"  >
            <a class="w-full" href="/p/{{$post->slug}}">
                <img class="max-h-full w-full" src="/storage/{{ $post->image }}">
            </a>
        </div>

        <div class="px-5 py-2 flex ">
            <div class="flex-grow">
                <a href="/p/{{$post->slug}}/like">
                    @if($post->liked(auth()->user()))
                    <i class='bx bxs-heart text-2xl text-red-600 hover:text-gray-400 transition'></i>
                    @else
                    <i class="bx bx-heart text-2xl hover:text-gray-300 transition"></i>
                    @endif
                </a>
                <i class="bx bx-message-square-dots"></i>
                <i class='bx bx-share-alt'></i>
            </div>
            <div>
                <i class='bx bx-save' ></i>
            </div>
        </div>

        <div class="px-5  text-sm">
            likes ...
        </div>

        <div  class="px-5 py-2">
            <a class="mr-2" href="/profile/{{$post->owner->id}}">{{$post->owner->username}}</a>
            <span class="text-sm text-gray-500">{{ $post->description }}</span>
        </div>

        <div class=" px-5 py-2" >
            @if (count($post->comments) > 0)
            <a class="text-sm text-gray-600" href="/p/{{$post->slug}}">
                {{ __('View all ') }} {{count($post->comments)}}  {{__('comments')}}
            </a>
            @else
            <p class="text-sm text-gray-400">{{ __('No Commnets for show')}}</p>
            @endif
        </div>

        <div class="border-t p-5">
            <form action="/p/{{$post->slug}}/comment" method="POST">
                @csrf
                <div class="flex flex-row">
                    <textarea class="h-5 grow resize-none overflow-hidden border-none bg-none p-0 placeholder-gray-400 outline-0 focus:ring-0" name="body" id="body-comment" placeholder="{{ __('Add a comment ..') }}"></textarea>
                    <button class="ltr:ml-5 rtl:mr-5 border-none bg-white text-blue-500" type="submit">{{ __('Post') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

