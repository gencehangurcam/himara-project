@extends('layouts.app')

@section('content')

<div class="d-flex p-2 m-2">
    <h1>Partie Admin Gallery</h1>
    <a class="btn btn-primary m-auto" href="{{ route("gallery.create") }}">create</a>
</div>

<section id="content-types">
    <div class="row">
        @foreach ($imageAll as $item)
        <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="card">
                <div class="card-content">
                    {{-- <img class="card-img-top img-fluid" src="{{ asset('/images/gallery/'. $item->url) }}" alt="Card image cap" style="height: 20rem"> --}}
                    <img class="card-img-top img-fluid" src="{{ asset('/storage/images/'. $item->url) }}" alt="Card image cap" style="height: 20rem">
                    <div class="card-body">
                        <h4 class="card-title">{{ $item->nom }}</h4>
                        <p class="card-text">
                          {{ $item->nom}}
                        </p>
                        <p class="card-text">
                           {{ $item->url}}
                        </p>
                        <form action="{{ route('gallery.destroy', $item->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger block">Delete</button>
                        </form>
                        {{-- <button class="btn btn-primary block" href="{{ route("images.create") }}">create</button> --}}
                        {{-- <button class="btn btn-warning block" href="{{ route("images.create") }}">Update now</button> --}}
                    </div>
                </div>
            </div>
        </div>

        @endforeach
    </div>
</section>


@endsection



