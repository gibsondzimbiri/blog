<x-layout>
    <x-setting heading="Insert Category">
        <form method="POST" action="/admin/category" enctype="multipart/form-data">
            @csrf
            <x-form.input name="name"/>
            <x-form.input name="slug"/>
            <x-form.input name="thumbnail" type="file"/>
            <x-form.button>Submit</x-form.button>
        </form>
    </x-setting>
</x-layout>
