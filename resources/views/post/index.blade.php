<x-app-layout>
    <div class="flex  md:flex-row  gap-6">

        {{-- left section --}}
        <div class="w-8/12  ">
            <div class="max-w-[65%] mx-auto">
                @forelse ($posts as $post)
                    <x-post :post="$post"></x-post>
                @empty
                    <div class="bg-orange-400 p-2 border-orange-800 rounded-md ">
                        {{ __('There Are No Post To Show') }}
                    </div>
                @endforelse
            </div>
        </div>

        {{-- Right section --}}
        <div class="w-4/12 pt-4">
            <div class="flex items-center gap-2">
                <a href="/profile/{{$post->owner->id}}">
                    <img class="rounded-full w-10 h-10" src="{{$post->owner->image}}" >
                </a>
                <div>
                    <a href="/profile/{{$post->owner->id}}">
                        <h3>{{ $post->owner->username }}</h3>
                    </a>
                    <p class="text-sm text-gray-600">{{ $post->owner->name }}</p>
                </div>
            </div>
            {{-- here will add link show all users --}}
            <div class="flex justify-between py-6">
                <p class="text-gray-400">{{ __('Suggested for you') }}</p>

                <a href="/">
                    {{ __("See All")}}
                </a>
            </div>
            {{-- change Posts to suggested users --}}
            @foreach ($suggested_users as $s_user)
            <div class="flex items-center gap-2 my-4">
                <a href="/profile/{{$s_user->id}}">
                    <img class="rounded-full w-10 h-10" src="{{$s_user->image}}" >
                </a>
                <div>
                    <a href="/profile/{{$s_user->id}}">
                        <h3>{{ $s_user->username }}</h3>
                    </a>
                    <p class="text-sm text-gray-400">{{ __('Suggested for you')}}</p>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</x-app-layout>

