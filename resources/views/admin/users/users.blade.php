<x-layout>
    <x-setting heading="Manage Users">
        <table class="table-auto w-full">


        @foreach($users as $user)
                <tr>
                    <td class="px-6 py-4">
                        <div class="text-sm font-medium text-gray-900">
                            <a href="/posts/{{ $user->id }}">
                                {{ $user->name }}
                            </a>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">
                            {{ $user->username }}
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">
                            <a href="/admin/users/{{$user->id}}/edit">
                                Edit
                            </a>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">
                            <a href="/admin/change-password/{{ $user->id }}/edit">
                                Edit password
                            </a>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">
                            <form method="POST" action="/admin/posts/{{ $user->id }}">
                                @csrf
                                @method('DELETE')
                                <button>Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach

        </table>{{ $users->links() }}
    </x-setting>
</x-layout>


