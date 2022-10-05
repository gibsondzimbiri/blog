<x-layout>
    <x-setting heading="Edit Category">
        <form method="POST" action="/admin/category/{{ $categories->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <x-form.input name="name" value="{{ old('name', $categories->name) }}"/>
            <x-form.input name="slug" value="{{ old('slug', $categories->slug) }}"/>
            <x-form.input name="thumbnail" type="file"/>
            <x-form.button>Submit</x-form.button>
        </form>
    </x-setting>
</x-layout>
