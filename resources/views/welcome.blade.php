<x-main>
    <x-slot name="title">The Aulab Post|Home</x-slot>
    <div class="mt-2">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
    <div class="container my-5 shadow min-vh-100 ">
        <div class="row justify-content-around ">
            @foreach ($articles as $article)
                <div class="col-12 col-md-3 d-flex mt-3 ">
                    <div class="card">
                        <img src="{{ Storage::url($article->image) }}" alt="immagine non presente" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p-card-text>{{ $article->subtitle }}</p-card-text>
                            <a href="{{ route('articles.byCategory', ['category' => $article->category->id]) }}"
                                class="small text-muted fst-italic text-capitalize">{{ $article->category->name }}</a>
                        </div>
                        <div class="card-footer text-muted d-flex justify-content-between align-items-center">
                            Scritto il {{ $article->created_at->format('d/m/Y') }} da <a
                                href="{{ route('article.byUser',  $article->user->id) }}">{{ $article->user->name }}</a>
                        </div>
                        <div class="w-100 text-center my-2">
                            <a href="{{ route('articles.show', $article) }}"
                                class="btn btn-info text-white w-50">Leggi</a>
                        </div>


                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-main>
