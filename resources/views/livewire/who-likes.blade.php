<div class="">
    @if ($this->likes == 0)
    <span class="text-gray-500">{{ __('Be the first to Like This') }}</span>
    @elseif ($this->likes == 1)
    <span class="text-gray-500">  {{ $this->firstusername }} <strong >{{ __('like') }}</strong></span>
    @else
    <span class="text-gray-500">  {{ $this->firstusername  . ' ' .  __('and')}}  {{ $this->likes - 1}} <strong> {{ __('others Likes') }}</strong> </span>
    @endif
</div>
