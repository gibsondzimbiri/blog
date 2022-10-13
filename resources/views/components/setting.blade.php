@props(['heading'])
<section class="py-6 max-w-4xl mx-auto">
    <h2 class="font-semibold text-lg mb-5 mt-8 bg-gradient-to-b from-gray-500 to-gray-100 py-4 px-4 rounded">{{ $heading }}</h2>

    <div class="flex flex-wrap">
     <aside class="w-1/4 bg-gray-200 rounded">


         <ul class="py-3 px-1">
             <li>
                 <x-button-setting><a href="/admin/posts" class="{{ request()->is('admin/posts') ? 'text-blue-500' : '' }}">All posts</a>
                 </x-button-setting>
             </li>
             <li>
                 <x-button-setting>
                     <a href="/admin/posts/create" class="{{ request()->is('admin/posts/create') ? 'text-blue-500' : '' }}">Create post</a>
                 </x-button-setting>
             </li>
             <li>
                 <x-button-setting>
                     <a href="/admin/category/create" class="{{ request()->is('admin/category/create') ? 'text-blue-500' : '' }}">Create Category</a>
                 </x-button-setting>
             </li>
             <li>
                 <x-button-setting>
                     <a href="/admin/category" class="{{ request()->is('admin/category') ? 'text-blue-500' : '' }}">All categories</a>
                 </x-button-setting>
             </li>
             <li>
                 <x-button-setting>
                     <a href="/admin/users" class="{{ request()->is('admin/users') ? 'text-blue-500' : '' }}">Users</a>
                 </x-button-setting>
             </li>
         </ul>
     </aside>

        <main class="w-3/4">
            <x-panel>
                {{ $slot }}
            </x-panel>

        </main>
    </div>

</section>


