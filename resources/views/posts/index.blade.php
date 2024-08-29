<x-layouts.layout title="Blog">
    <x-page-header title="Blog" />

    <!-- Blog Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row align-items-end mb-4">
                <div class="col-lg-6">
                    <h6 class="text-secondary font-weight-semi-bold text-uppercase mb-3">Eng so'nggi blog</h6>
                    <h1 class="section-title mb-3">Bizning blog postimizdan eng so'nggi maqolalar</h1>
                </div>
                <div class="col-lg-6">
                    <h4 class="font-weight-normal text-muted mb-3">Eirmod kasd duo eos et magna, diam dolore stet sea
                        clita sit ea erat lorem. Ipsum eos ipsum magna lorem stet</h4>
                </div>
            </div>
            <div class="row">

                @foreach ($posts as $post)
                    <div class="col-lg-4 col-md-6 mb-5">
                        <div class="position-relative mb-4">
                            <img class="img-fluid rounded w-100"
                                src="{{ $post->image ? asset('storage/' . $post->image) : '/img/blog-1.jpg' }}"
                                alt="{{ $post->title }}">
                            <div class="blog-date">
                                <h4 class="font-weight-bold mb-n1">{{ date('d', strtotime($post->created_at)) }}</h4>
                                <small
                                    class="text-white text-uppercase">{{ date('M', strtotime($post->created_at)) }}</small>
                            </div>
                        </div>
                        <div class="d-flex mb-2">
                            @foreach ($post->tags as $index => $tag)
                                <span
                                    class="text-secondary text-uppercase font-weight-medium">{{ $tag->name }}</span>
                                @if ($index < count($post->tags) - 1)
                                    <span class="text-primary px-2">|</span>
                                @endif
                            @endforeach
                        </div>
                        <div class="d-flex mb-2">
                            <span
                                class="bg-secondary rounded text-white p-2 text-uppercase font-weight-medium">{{ $post->category->name }}</span>
                        </div>
                        <h5 class="font-weight-medium mb-2">{{ $post->title }}</h5>
                        <p class="mb-4">{{ substr($post->description, 0, 50) }}</p>
                        <a class="btn btn-sm btn-primary py-2"
                            href="{{ route('posts.show', ['post' => $post->id]) }}">Ko'proq o'qish</a>
                    </div>
                @endforeach

                {{-- Pagination --}}
                <div class="col-12">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->

</x-layouts.layout>
