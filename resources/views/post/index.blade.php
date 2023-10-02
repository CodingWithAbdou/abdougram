<x-app-layout>
    <div class="flex  md:flex-row  gap-6">

        {{-- left section --}}
        <div class="w-8/12  ">
            <div class="max-w-[65%] mx-auto">
                @forelse ($posts as $post)
                    <x-post :post="$post"></x-post>
                @empty
                    <div class="bg-yellow-400 p-2 border border-yellow-400 px-4 rounded-md text-white ">
                        {{ __('Start Follwing You Friends and Enjoy') }}
                    </div>
                @endforelse
            </div>
        </div>

        {{-- Right section --}}
        <div class="w-4/12 pt-4">
            <div class="flex items-center gap-2">
                <a href="/profile/{{auth()->user()->username}}">
                    <img class="rounded-full w-12 h-12  object-cover" src="{{auth()->user()->image}}"  alt="{{auth()->user()->name}}">
                </a>
                <div>
                    <a href="/profile/{{auth()->user()->username}}">
                        <h3>{{ auth()->user()->username }}</h3>
                    </a>
                    <p class="text-sm text-gray-600">{{ auth()->user()->name }}</p>
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
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2 my-4">
                    <a href="/profile/{{$s_user->username}}">
                        <img class="rounded-full w-10 h-10" src="{{$s_user->image}}" >
                    </a>
                    <div>
                        <div class="flex items-center gap-2">
                            <a  href="/profile/{{$s_user->username}}">
                                <h3 class="my-0">{{ $s_user->username }}</h3>
                            </a>
                            @if (auth()->user()->isFollower($s_user))
                            <span class="text-gray-400 text-sm font-bold">{{ __('Follower') }}</span>
                            @endif
                        </div>
                        <p class="text-sm text-gray-400">{{ __('Suggested for you')}}</p>
                    </div>
                </div>
                <div>
                    @livewire('follow-button', ["userId" => $s_user->id , "classes" => 'text-blue-400 font-bold'])
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-app-layout>


