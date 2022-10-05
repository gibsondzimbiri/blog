@props(['name'])

<label class="block mb-2 uppercase font-bold text-xs font-xl text-gray-700" for="{{$name}}">
    {{ucwords($name)}}
</label>
