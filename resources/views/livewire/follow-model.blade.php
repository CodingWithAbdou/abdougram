<div class="max-h-96  p-2 flex flex-col relative">
    <h2 class="text-center py-2 border-b font-bold">{{ __('Folloing List') }}</h2>
    <button class=" absolute top-3 right-3 text-2xl" wire:click="$emit('closeModal')"><i class="bx bx-x"></i></button>
    <ul class="overflow-y-auto">
    @forelse ($this->FollowingList as $one_following)
        <li class="px-2 py-3 w-full flex items-center justify-between">
            <div class="flex items-center gap-2">
                <img class="rounded-full object-cover w-10 h-10 border" src="{{$one_following->image}}" alt="{{$one_following->username}}">
                <div >
                    <span class="font-bold text-sm block">{{$one_following->username}}</span>
                    <span class="text-neutral-400 text-sm block">{{$one_following->name}}</span>
                </div>
            </div>
            @auth
            <button class="py-1 px-2 border rounded-md text-neutral-700 text-sm " wire:click="unFollow({{$one_following->id}})">
                {{ __('Unfollow') }}
            </button>
            @endauth
        </li>
        @empty
        <li class="p-2 w-full text-center text-neutral-500">{{__('There is No Follwing To Show')}}</li>
    @endforelse
    </ul>
</div>
