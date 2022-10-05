<x-layout>
    <main class="max-w-lg mx-auto bg-gray-100 border border-gray-200 p-6 rounded-xl mt-10">
        <h1 class="text-center font-bold text-xl mb-6">Change password</h1>
        <form method="POST" action="/admin/users/password/{{ $users->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs font-xl text-gray-700" for="current_password">
                    New password
                </label>
                <input class="border border-gray-400 p-2 rounded w-full"
                       type="password"
                       name="password"
                       id="password"
                >
                <x-form.error name="password"/>
            </div>

            <div class="mb-6">
                <label class="block mb-2 uppercase font-bold text-xs font-xl text-gray-700" for="new_password_confirm">
                    New password confirm
                </label>
                <input class="border border-gray-400 p-2 rounded w-full"
                       type="password"
                       name="new_password_confirm"
                       id="new_password_confirm"
                >
                <x-form.error name="new_password_confirm"/>
            </div>
            <x-form.button>Register</x-form.button>
        </form>
        {{ $users->id }}
    </main>
</x-layout>
