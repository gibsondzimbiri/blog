<x-layout>
    <x-setting heading="Manage categories">
        <table class="table-auto w-full">
            @foreach($categories as $category)
                <tr>
                    <td class="px-6 py-4">
                        <div class="text-sm font-medium text-gray-900">
                            <a href="/posts/{{ $category->slug }}">
                                {{ $category->name }}
                            </a>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">
                            <a href="/admin/category/{{ $category->id }}/edit">
                                Edit
                            </a>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">
                            <form method="POST" action="/admin/category/{{ $category->id }}">
                                @csrf
                                @method('DELETE')
                                <button>Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach

            {{ $categories->links() }}
        </table>
    </x-setting>
</x-layout>
