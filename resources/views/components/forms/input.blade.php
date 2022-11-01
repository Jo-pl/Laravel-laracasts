@props(['name'])
<x-forms.field>
    <x-forms.label name="{{$name}}"></x-forms.label>
        <input class="border border-gray-200 p-2 w-full rounded" name="{{$name}}" id="{{$name}}" value="{{old($name)}}" required {{$attributes}}>
    <x-forms.error name="{{$name}}"></x-forms.error>
</x-forms.field>