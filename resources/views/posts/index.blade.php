<x-layout>
    @include('posts._header')
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
    @if($posts->count())
        <x-post-featured-card :post="$posts[0]" />

        @if($posts->count()>1)
            <x-posts-grid :posts="$posts"/>

            {{$posts->links()}}
        @endIf
        <!--<div class="lg:grid lg:grid-cols-3">
        </div>-->
    </main>
    @else
        <p>
            No posts yet, please check back later.
        </p>
    @endIf    
</x-layout>