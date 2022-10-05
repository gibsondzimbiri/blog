@props(['comment'])
<x-panel class="bg-gray-100">
    <article class="flex py-2 px-4">
        <div class="py-2"><img src="https://i.pravatar.cc/300?u={{ $comment->id }}" width="60" hieght="60" class="rounded-full"></div>
        <div class="ml-6">
            <header class="py-2">
                <h3 class="font-bold">{{ $comment->author->username }}</h3>
                <p class="text-sm">Posted
                    <time>{{ $comment->created_at->format('F j, Y, g:i a') }}</time>
                </p>
            </header>
            {{ $comment->body }}
        </div>
    </article>
</x-panel>

