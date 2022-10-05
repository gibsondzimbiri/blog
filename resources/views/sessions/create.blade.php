<x-layout>
    <section class="py-6 py-8">
        <main class="max-w-lg mx-auto bg-gray-100 border border-gray-200 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Login</h1>
            <form method="POST" action="/login">
                @csrf
                <x-form.input name="email"/>
                <x-form.input name="password" type="password"/>
                <x-form.button>Login</x-form.button>
            </form>
        </main>
    </section>
</x-layout>
