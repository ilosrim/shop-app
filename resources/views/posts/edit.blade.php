<x-layouts.layout title="O'zgartirilayotgan post ID: {{ $post->id }}">
    <x-page-header title="O'zgartirilayotgan post ID: {{ $post->id }}" />
    <div class="container">

        <div class="row">
            <div class="col-lg-12 mb-5 mb-lg-0">

                <div class="contact-form">

                    <div id="success"></div>
                    <form action="{{ route('posts.update', ['post' => $post->id]) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="control-group mb-2">
                            <input type="text" class="form-control p-4" name="title"
                                placeholder="Sarlavha kiriting..." value="{{ $post->title }}" />
                            @error('title')
                                <p class="help-block text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="control-group mb-2">
                            <input type="file" class="form-control p-4" name="image"
                                placeholder="Rasm qo'shing.." />
                            @error('image')
                                <p class="help-block text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="control-group mb-2">
                            <textarea class="form-control p-4" rows="3" name="description" placeholder="Qisqacha mazmunini yozing...">{{ $post->description }}</textarea>
                            @error('description')
                                <p class="help-block text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="control-group mb-2">
                            <textarea class="form-control p-4" rows="6" name="content" placeholder="Post matnini kiriting...">{{ $post->content }}</textarea>
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
