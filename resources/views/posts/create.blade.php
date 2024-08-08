<x-layouts.layout title="Post qo'shish">
    <x-page-header title="Post qo'shish" />

    <div class="container">

        <div class="row">
            <div class="col-lg-12 mb-5 mb-lg-0">
                <div class="contact-form">

                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="control-group mb-2">
                            <label for="category">Kategoriya</label>
                            <select id="category" name="category_id" class="form-control px-4">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="control-group mb-2">
                            <label for="tags">Teglar</label>
                            <select id="tags" name="tags[]" class="form-control px-4 " multiple>
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="control-group mb-2">
                            <label for="title">Sarlavha</label>
                            <input id="title" type="text" class="form-control p-4" name="title"
                                placeholder="Sarlavha kiriting..." value="{{ old('title') }}" />
                            @error('title')
                                <p class="help-block text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="control-group mb-2">
                            <label for="image">Rasm</label>
                            <input id="image" type="file" class="form-control px-4" name="image"
                                placeholder="Rasm qo'shing.." value="{{ old('title') }}" />
                            @error('image')
                                <p class="help-block text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="control-group mb-2">
                            <label for="description">Qisqacha</label>
                            <textarea id="description" class="form-control p-4" rows="3" name="description"
                                placeholder="Qisqacha mazmunini yozing...">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="help-block text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="control-group mb-2">
                            <label for="content">Kontent</label>
                            <textarea id="content" class="form-control p-4" rows="6" name="content" placeholder="Post matnini kiriting...">{{ old('content') }}</textarea>
                            @error('content')
                                <p class="help-block text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <button class="btn btn-primary btn-block py-3 px-5" type="submit">Saqlash</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.layout>
