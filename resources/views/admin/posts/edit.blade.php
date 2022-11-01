<x-layout>
    <x-setting :heading="'Edit Post: ' . $post->title">
        <form method="POST" action="/admin/posts/{{ $post->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-forms.input name="title" :value="old('title', $post->title)" required />
            <x-forms.input name="slug" :value="old('slug', $post->slug)" required />

            <div class="flex mt-6">
                <div class="flex-1">
                    <x-forms.input name="thumbnail" type="file" :value="old('thumbnail', $post->thumbnail)" />
                </div>

                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="rounded-xl ml-6" width="100">
            </div>

            <x-forms.textarea name="excerpt" required>{{ old('excerpt', $post->excerpt) }}</x-forms.textarea>
            <x-forms.textarea name="body" required>{{ old('body', $post->body) }}</x-forms.textarea>

            <x-forms.field>
                <x-forms.label name="category"/>

                <select name="category_id" id="category_id" required>
                    @foreach (\App\Models\Category::all() as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}
                        >{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>

                <x-forms.error name="category"/>
            </x-forms.field>

            <x-forms.button>Update</x-forms.button>
        </form>
    </x-setting>
</x-layout>