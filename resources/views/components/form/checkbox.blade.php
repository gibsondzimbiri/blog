@props(['name', 'type' => 'checkbox'])

<div class="mb-6">

    <input class="border border-gray-400 rounded"
           type="{{$type}}"
           name="{{$name}}"
           id="{{$name}}"
    >
    <span class="ml-2">Are you the author of this work?</span>
    <x-form.error name="{{ $name}}"/>
</div>
