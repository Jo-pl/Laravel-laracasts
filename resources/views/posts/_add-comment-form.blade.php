@auth
                    <x-panel>
                    <form method="POST" action="/posts/{{$post->slug}}/comments">
                        @csrf
                        <header class="flex items-center">
                            <img src="https://i.pravatar.cc/100?u={{auth()->id()}}" alt="" width="40" height="40" class="rounded-full">
                            <h2 class="ml-4">Want to participate?</h2>
                        </header>
                        <div class="mt-6">
                            <textarea name="body" 
                            class="w-full text-sm focus:outline-none focus:ring" 
                            rows="5" 
                            placeholder="Add comment"
                            required></textarea>

                            @error('body')
                            <span class="text-xs text-red-500">{{$message}}</span>
                            @enderror
                        </div>
    
                        <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
                            <x-forms.button>Post</x-forms.button>
                        </div>
                    </form>
                    </x-panel>                      
                    @else
                    <p class="font-semibold">
                        <a href="/login" class="hover:underline">Login to leave a comment</a>
                    </p>
                   @endauth