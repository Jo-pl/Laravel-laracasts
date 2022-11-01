@props(['name','type'=>'text'])
<x-forms.field>
    <x-forms.label name="{{$name}}"></x-forms.label>
        <textarea class="border border-gray-200 p-2 w-full rounded" type="text" name="{{$name}}" id="{{$name}}" required> {{old($name)}}</textarea>
    <x-forms.error name="{{$name}}"></x-forms.error>
</x-forms.field>