<x-layout>
    <x-setting :heading="'Edit post: ' . $posts->title">
        <form method="POST" action="/admin/posts/{{ $posts->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <x-form.input name="title" value="{{ old('title', $posts->title) }}"/>
            <x-form.input name="slug" value="{{ old('title', $posts->slug) }}"/>
            <div class="flex">
                <x-form.input name="thumbnail" type="file" value="{{ old('thumbnail', $posts->thumbnail) }}"/>
                <img src="{{ asset('storage/' . $posts->thumbnail) }}" class="rounded ml-7" width="100"/>
            </div>

            <x-form.textarea name="excerpt">{{ old('excerpt', $posts->excerpt) }}</x-form.textarea>
            <x-form.textarea name="body">{{ old('body', $posts->body) }}</x-form.textarea>
            <x-form.label name="Category"/>
            <x-form.select name="category_id" id="category-id"/>
            <x-form.label name="Satus"/>
            <select name="status" id="status" class="mb-6">
                <option value="{{ $posts->status }}">{{ ucwords($posts->status) }}</option>
                <option value="published">Publish</option>
                <option value="unpublished">Unpublish</option>
            </select>
            <x-form.checkbox name="user_id"/>
            <x-form.button>Update</x-form.button>
        </form>
    </x-setting>
</x-layout>
