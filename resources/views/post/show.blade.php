<x-app-layout>
    <div class="h-screen md:flex flex-row">
        {{-- image side left side--}}
        <div class="flex h-full items-center overflow-hidden bg-black md:w-7/12">
            <img class="h-auto w-full" src="/storage/{{ $post->image }}" alt="{{ $post->description }}">
        </div>

        {{-- informaion side right side --}}
        <div class="flex w-full flex-col bg-white md:w-5/12 md:rounded-r-lg">

            {{-- Head --}}
            <div class="border-b-2 flex items-center gap-2 p-5">
                <img class="ltr:mr-5 rtl:ml-5 h-10 w-10 rounded-full"  src="{{ $post->owner->image }}" alt="{{ $post->owner->username }}">
                <div class="grow">
                    <a class="font-bold" href="/{{ $post->owner->username }}" >{{ $post->owner->username }}</a>
                </div>
                @if ($post->owner->id === auth()->user()->id)
                <div class="flex gap-1 items-center">
                    <form action="/p/{{$post->slug}}/edit" method="POST">
                        @csrf
                        <button>
                            <i class='bx bx-message-square-edit text-xl text-green-400'></i>
                        </button>
                    </form>
                    <form action="/p/{{$post->slug}}/delete" method="POST">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('{{__('Are You Sure')}}')">
                            <i class='bx bx bx-message-square-x text-xl text-red-600'></i>
                        </button>
                    </form>
                </div>
                @endif
            </div>

            {{-- discription And Tags  --}}
            <div class="flex flex-col grow overflow-y-auto">
                <div class="flex items-center p-5 gap-2">
                    <img src="{{ $post->owner->image }}" class="ltr:mr-5 rtl:ml-5 h-10 w-10 rounded-full">
                    <div>
                        <a href="{{ $post->owner->username }}" class="font-bold">{{ $post->owner->username }}</a>
                        {{ $post->description }}
                    </div>
                </div>

                {{-- Comments --}}
                <div class="grow">
                    @foreach ($post->comments as $comment)
                        <div class="flex items-center px-5 py-2 gap-2 " >
                            <img src="{{ $comment->owner->image }}" alt="" class="h-100 ltr:mr-5 rtl:ml-5 w-10 rounded-full">
                            <div class="flex flex-col">
                                <div>
                                    <a href="/{{ $comment->owner->username }}" class="font-bold">{{ $comment->owner->username }}</a>
                                    {{ $comment->body }}
                                </div>
                                <div class="mt-1 text-sm font-bold text-gray-400">
                                    {{ $comment->created_at->diffForHumans(null, true, true) }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="border-b-2 ">
                {{-- <p>section like comment</p> --}}
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
</x-app-layout>

