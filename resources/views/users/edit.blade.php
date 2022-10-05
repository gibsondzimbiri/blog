<x-layout>
    <x-setting :heading="'Edit use: ' . $users->name ">
        <main class="max-w-lg mx-auto bg-gray-100 border border-gray-200 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Edit</h1>
            <form method="POST" action="/admin/users/{{ $users->id }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <x-form.input name="name" value="{{ old('name', $users->name) }}"/>
                <x-form.input name="username" value="{{ old('username', $users->username) }}"/>
                <x-form.input name="email" value="{{ old('email', $users->email) }}"/>
                <div class="flex">
                    <x-form.input name="thumbnail" type="file" value="{{ old('thumbnail', $users->thumbnail) }}"/>
                    <img src="{{ asset('storage/' . $users->thumbnail) }}" class="rounded ml-7" width="100"/>
                </div>
                <x-form.button>Update</x-form.button>
            </form>
            <div class="mt-10 ">
                <a href="/admin/users/password/{{ auth()->user()->id}}/edit"
                   class="bg-blue-400 hover:bg-blue-500 rounded-2xl tex-white py-2 px-4 w-30">Reset password</a>
            </div>
        </main>
    </x-setting>
</x-layout>
