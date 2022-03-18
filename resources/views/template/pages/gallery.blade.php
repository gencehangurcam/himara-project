@extends("template.layouts.index")

@section('content')
    <!-- ========== PAGE TITLE ========== -->
    <div class="page-title gradient-overlay op6" style="background: url(images/breadcrumb.jpg); background-repeat: no-repeat;
        background-size: cover;">
        <div class="container">
            <div class="inner">
                <h1>GALLERY</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li>Gallery</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- ========== MAIN ========== -->
    <main class="gallery-page">
        <!-- FILTERS -->
        <div class="container">
            <div class="gallery-filters">
                <a href="#" data-filter="*" class="filter active">ALL</a>
                <a href="#" data-filter=".filter-restaurnat" class="filter">RESTAURANT</a>
                <a href="#" data-filter=".filter-swimmingpool" class="filter">SWIMMING POOL</a>
                <a href="#" data-filter=".filter-spa" class="filter">SPA</a>
                <a href="#" data-filter=".filter-roomview" class="filter">ROOM VIEW</a>
            </div>
        </div>
        <!-- GALLERY -->
        <div class="container">
            <div class="grid image-gallery row">
                @foreach ($gallery as $gallery)
                <!-- ITEM -->
                <div class="gallery-item {{ $gallery->category->filter }} col-md-3">
                <figure class="gradient-overlay image-icon">
                    <a href="{{ asset('/images/gallery/' . $gallery->src) }}">
                        <img src="{{ asset('/images/gallery/' . $gallery->src) }}" class="img-fluid" alt="Image">
                    </a>
                    <figcaption>{{ $gallery->name }}</figcaption>
                </figure>
                </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection
