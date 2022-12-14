@props(['categories','trigger'])
<div x-data="{show:false}" @click.away="show=false" style="display:inline-block;" class="relative">
    {{--Trigger--}}
    <div @click="show=!show">
        {{$trigger}}
    </div>
    {{--Links--}}
    <div x-show="show" class="py-2 absolute bg-gray-100 w-full mt-2 rounded-xl w-full z-50 overflow-auto max-h-40" style="display:none;">
        {{$slot}}
    </div>
</div>