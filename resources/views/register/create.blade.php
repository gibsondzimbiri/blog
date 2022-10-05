<x-layout>
    <section class="py-6 py-8">
        <main class="max-w-lg mx-auto bg-gray-100 border border-gray-200 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Register</h1>
            <form method="POST" action="/register" enctype="multipart/form-data">
                @csrf
                <x-form.input name="name"/>
                <x-form.input name="username"/>
                <x-form.input name="email"/>
                <x-form.input name="thumbnail" type="file"/>
                <x-form.input name="password" type="password"/>
                <x-form.button>Register</x-form.button>
            </form>
        </main>
    </section>
</x-layout>
