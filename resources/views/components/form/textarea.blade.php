@props(['name'])
<div class="mb-6">
    <label class="block mb-2 uppercase font-bold text-sm font-xl text-gray-700" for="{{ $name }}">
        {{ ucwords($name) }}
    </label>

    <textarea class="ckeditor border border-gray-400 p-2 rounded w-full"
              name="{{ $name }}"
              id="{{ $name }}"
              value="{{ $attributes }}"
    > {{$slot ?? old($name) }}</textarea>
  <x-form.error name="{{ $name}}"/>
</div>

