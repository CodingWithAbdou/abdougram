<div>
    @if($follow_state == 'Pending')
    <span class="text-sm text-gray-400">{{ __('Pending') }}</span>
    @else
    <a class="cursor-pointer {{$classes}}" wire:click="toggle_follow">
        {{ __($follow_state)}}
    </a>
    @endif
</div>
