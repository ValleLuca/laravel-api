@extends('layouts.app')

@section('addpost')
    <h1 class="text-center">Crea post</h1>  

    <form action="{{route("admin.post.store")}}" method="POST" enctype="multipart/form-data">
        
        @csrf

        <div class="form-group text-center">
            <label for="title">Titolo</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror text-center" id="title" name="title" placeholder="Inserisci il nome del post">
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group text-center">
            <label for="content">content</label>
            <textarea class="form-control text-center" id="content" name="content" placeholder="Inserisci la descrizione del post"></textarea>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="text-center">
            @foreach ($tags as $item_tag)

                <div class="form-check">
                    <input class="form-check-input" name="tags[]" type="checkbox" value="{{$item_tag->id}}" id="{{$item_tag->slug}}">
                    <label class="form-check-label" for="{{$item_tag->slug}}">
                        {{$item_tag->name}}
                    </label>
                </div>
                
            @endforeach

        </div>

        <div class="text-center">

            <select name="category_id" id="">
                <option value="">----</option>
                    @foreach ($datipost as $element)
                    @dump($datipost)
                        <option value="{{$element->id}}">{{$element->type}}</option>
                    @endforeach
            </select>

        </div>

        <div class="text-center">
            <span><a href="{{route("admin.post.index")}}"><button type="button" class="btn btn-primary">Indietro</button></a></span>
            <span><button type="submit" class="btn btn-primary">Crea</button></span>
        </div>
        
    </form>
@endsection