<x-layout>
    <x-setting heading="Publish new post" heading="Publish new post">
        <form action="/admin/posts" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Title -->
            <x-forms.input name="title"></x-forms.input>
            <!-- Slug -->
            <x-forms.input name="slug"></x-forms.input>
            <!-- thumbnail -->
            <x-forms.input name="thumbnail" type="file"></x-forms.input>
            <!-- Excerpt -->
            <x-forms.textarea name="excerpt"></x-forms.textarea>
            <!-- Body -->
            <x-forms.textarea name="body"></x-forms.textarea>
            <!-- Category -->
            <x-forms.field>
                <x-forms.label name="category"></x-forms-label>
                    <select name="category_id" id="category_id">
                        @php
                        $categories = \App\Models\Category::all();
                        @endphp
    
                        @foreach($categories as $category)
                        <option 
                        value="{{$category->id}}" 
                        {{old('category_id') == $category->id ? 'selected' : ''}}
                        >{{ucwords($category->name)}}</option>
                        @endforeach
                    </select>
                    <x-forms.error name="category"></x-forms.error>
            </x-forms.field>
        <x-forms.button>Publish</x-forms.button>
        </form>
    </x-setting>
</x-layout>