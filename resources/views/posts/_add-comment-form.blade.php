@auth
    <x-panel>
        <form method="POST" action="/posts/{{ $post->slug }}/comments">
            @csrf
            <header class="flex text-center">
                <img src="https://i.pravatar.cc/300?u={{ auth()->id() }}" width="60" hieght="60"
                     class="rounded-full">
                <h2 class="ml-4">Do you want to comment?</h2></header>
            <div class="mt-10">
                                <textarea class="w-full text-sm focus:outline-none focus:ring" cols="25"
                                          rows="5"
                                          name="body"
                                          placeholder="Write up something"></textarea>
            </div>
            <div class="flex justify-end mt-5  pt-6 border-t border-gray-200">
                <button type="submit"
                        class="bg-blue-500 text-white text-xs font-semibold py-2 px-10 rounded-2xl hover:bg-blue-800">
                    Post
                </button>
            </div>
        </form>
    </x-panel>
@else
    <p class="font-semibold text-sm">
        <a href="/register" class="hover:underline">Register</a> or <a href="/login" class="hover:underline">login </a>
        to post a comment.
    </p>
@endauth
