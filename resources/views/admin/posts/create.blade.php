<x-layout>
    <x-setting heading="Publish new post">
        <form method="POST" action="/admin/posts" enctype="multipart/form-data">
            @csrf
            <x-form.input name="title"/>
            <x-form.input name="slug"/>
            <x-form.input name="thumbnail" type="file"/>
            <x-form.textarea name="excerpt">{{ old('excerpt') }}</x-form.textarea>
            <x-form.textarea name="body">{{ old('body') }}</x-form.textarea>
            <x-form.select name="category_id"/>
            <x-form.button>Publish</x-form.button>
        </form>

        <script>
            $(document).ready(function() {
                $('body').summernote();
            });

        </script>
    </x-setting>
</x-layout>
