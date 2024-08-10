<x-layouts.layout title="{{ substr($post->title, 0, 20) }}">
    <x-page-header title="{{ substr($post->title, 0, 27) }}" />

    <!-- Detail Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @auth
                        @canany(['update', 'delete'], $post)
                            <div class="row justify-content-end">
                                <a class="btn btn-sm btn-outline-light bg-dark"
                                    href="{{ route('posts.edit', ['post' => $post->id]) }}">O'zgartirish</a>
                                <form action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="POST" class="mb-0"
                                    onsubmit="return confirm('O\'chirishni hohlaysizmi?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-light bg-danger">O'chirish</button>
                                </form>
                            </div>
                        @endcanany
                    @endauth
                    <div class="mb-5">
                        <div class="d-flex mb-2">
                            @foreach ($post->tags as $tag)
                                <span
                                    class="text-secondary text-uppercase font-weight-medium">{{ $tag->name }}</span>
                                <span class="text-primary px-2">|</span>
                            @endforeach
                            <span
                                class="text-secondary text-uppercase font-weight-medium">{{ date('M d, Y', strtotime($post->created_at)) }}</span>
                        </div>
                        <div class="d-flex mb-2">
                            <span
                                class="bg-secondary rounded text-white p-2 text-uppercase font-weight-medium">{{ $post->category->name }}</span>
                        </div>
                        <h1 class="section-title mb-3">{{ $post->title }}</h1>
                    </div>

                    <div class="mb-5">

                        <img class="img-fluid rounded w-100 mb-4" src="{{ asset('storage/' . $post->image) }}"
                            alt="Image">
                        <h4>{{ $post->description }}</h4>
                        <p>{{ $post->content }}</p>
                    </div>

                    {{-- comment section start --}}
                    <div class="mb-5">
                        <h3 class="mb-4 section-title">{{ $post->comments()->count() }} Comments</h3>
                        @foreach ($post->comments as $comment)
                            <div class="media mb-4">
                                <img src="/img/user.jpg" alt="Image" class="img-fluid rounded-circle mr-3 mt-1"
                                    style="width: 45px;">
                                <div class="media-body">
                                    <h6>{{ $comment->user->name }} <small><i>{{ $comment->created_at }}</i></small>
                                    </h6>
                                    <p>{{ $comment->content }}</p>
                                    {{-- <button class="btn btn-sm btn-light">Reply</button> --}}
                                </div>
                            </div>
                        @endforeach
                    </div>


                    <div class="bg-light rounded p-5">
                        <h3 class="mb-4 section-title">Komment qoldirish</h3>
                        @auth
                            <form action="{{ route('comments.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="message">Komment</label>
                                    <textarea name="comment" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                <div class="form-group mb-0">
                                    <input type="submit" value="Yuborish" class="btn btn-primary">
                                </div>
                            </form>
                        @else
                            <p>Komment qoldirish uchun <a href="{{ route('login') }}">kiring</a> yoki <a
                                    href="{{ route('register') }}">ro'yxatdan o'ting</a></p>
                        @endauth
                    </div>
                    {{-- comment section end --}}
                </div>

                <div class="col-lg-4 mt-5 mt-lg-0">
                    <div class="d-flex flex-column text-center bg-secondary rounded mb-5 py-5 px-4">
                        <img src="/img/user.jpg" class="img-fluid rounded-circle mx-auto mb-3" style="width: 100px;">
                        <h3 class="text-white mb-3">{{ $post->user->name }}</h3>
                        <p class="text-white m-0">Conset elitr erat vero dolor ipsum et diam, eos dolor lorem ipsum,
                            ipsum
                            ipsum sit no ut est. Guber ea ipsum erat kasd amet est elitr ea sit.</p>
                    </div>
                    <div class="mb-5">
                        <div class="w-100">
                            <div class="input-group">
                                <input type="text" class="form-control" style="padding: 25px;" placeholder="Keyword">
                                <div class="input-group-append">
                                    <button class="btn btn-primary px-4">Search</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-5">
                        <h3 class="mb-4 section-title">Categories</h3>
                        <ul class="list-inline m-0">
                            @foreach ($categories as $category)
                                <li class="mb-1 py-2 px-3 bg-light d-flex justify-content-between align-items-center">
                                    <a class="text-dark" href="#"><i
                                            class="fa fa-angle-right text-secondary mr-2"></i>{{ $category->name }}</a>
                                    <span
                                        class="badge badge-primary badge-pill">{{ $category->posts()->count() }}</span>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                    {{-- <div class="mb-5">
                        <img src="/img/blog-1.jpg" alt="" class="img-fluid rounded">
                    </div> --}}
                    <div class="mb-5">
                        <h3 class="mb-4 section-title">Recent Post</h3>
                        @foreach ($recent_posts as $r_post)
                            <div class="d-flex align-items-center border-bottom mb-3 pb-3">
                                <img class="img-fluid rounded" src="{{ asset('storage/' . $r_post->image) }}"
                                    style="width: 80px; height: 80px; object-fit: cover;" alt="">
                                <div class="d-flex flex-column pl-3">
                                    <a class="text-dark mb-2"
                                        href="{{ route('posts.show', ['post' => $r_post->id]) }}">{{ $r_post->title }}</a>
                                    <div class="d-flex">
                                        <small><a class="text-secondary text-uppercase font-weight-medium"
                                                href="">Admin</a></small>
                                        <small class="text-primary px-2">|</small>
                                        <small><a class="text-secondary text-uppercase font-weight-medium"
                                                href="">Cleaning</a></small>
                                        <small class="text-primary px-2">|</small>
                                        <small><a class="text-secondary text-uppercase font-weight-medium"
                                                href="">{{ date('M d, Y', strtotime($post->created_at)) }}</a></small>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    {{-- <div class="mb-5">
                        <img src="/img/blog-2.jpg" alt="" class="img-fluid rounded">
                    </div> --}}
                    <div class="mb-5">
                        <h3 class="mb-4 section-title">Tag Cloud</h3>
                        <div class="d-flex flex-wrap m-n1">
                            @foreach ($tags as $tag)
                                <a href="" class="btn btn-outline-secondary m-1">{{ $tag->name }}</a>
                            @endforeach
                        </div>
                    </div>
                    {{-- <div class="mb-5">
                        <img src="/img/blog-3.jpg" alt="" class="img-fluid rounded">
                    </div> --}}
                    {{-- <div>
                        <h3 class="mb-4 section-title">Plain Text</h3>
                        Aliquyam sed lorem stet diam dolor sed ut sit. Ut sanctus erat ea est aliquyam dolor et. Et no
                        consetetur eos labore ea erat voluptua et. Et aliquyam dolore sed erat. Magna sanctus sed eos
                        tempor
                        rebum dolor, tempor takimata clita sit et elitr ut eirmod.
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- Detail End -->
</x-layouts.layout>
