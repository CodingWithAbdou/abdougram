<div>
    <ul>
        @forelse ($this->PendingList as $one_pending)
        <li class="px-2 py-3 w-full flex items-center justify-between">
            <div class="flex items-center gap-2">
                <img class="rounded-full object-cover w-10 h-10 border" src="{{$one_pending->image}}" alt="{{$one_pending->username}}">
                <div >
                    <span class="font-bold text-sm block">{{$one_pending->username}}</span>
                    <span class="text-neutral-400 text-sm block">{{$one_pending->name}}</span>
                </div>
            </div>
            <div>
                <button class="py-1 px-2 border rounded-md font-bold transition-colors text-green-700 hover:text-white hover:bg-green-700 text-sm " wire:click="confirme({{$one_pending->id}})">
                    {{ __('Confirmed') }}
                </button>
                <button class="py-1 px-2 border rounded-md font-bold transition-colors text-red-700 hover:text-white hover:bg-red-700  text-sm " wire:click="deleteRequestPending({{$one_pending->id}})">
                    {{ __('Delete') }}
                </button>
            </div>
        </li>
        @empty
        <li class="p-2 w-full text-center text-neutral-500">{{__('There is No Follwing To Show')}}</li>
        @endforelse
    </ul>
</div>
