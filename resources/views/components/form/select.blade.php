@props(['name'])

<div class="mb-6">
    <select name="{{ $name }}" id="{{ $name }}">
        @php
            $categories = \App\Models\Category::all();
        @endphp
        @foreach($categories as $category)
            <option
                value="{{ $category->id }}" {{ old($name, $category->id) == $category->id ? 'selected' : ''}}>
                {{ ucwords($category->name) }}
            </option>
        @endforeach
    </select>
    <x-form.error name="{{ $name }}"/>
</div>



