@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>{{$page->title}}</h2>
                <p>Categoria: {{$page->category->name}} | {{$page->updated_at}}</p>
                @if($page->tags->count() > 0)
                <div>
                <p>Tags: 
                @foreach ($page->tags as $tag)
                {{$tag->name . ' | '}} 
                @endforeach
                </p>
                </div>
                @endif
                <p>Autore: {{$page->user->name}}</p>
                <div>
                    <img src="{{$page->photos->first()->path}}" alt="">
                </div>
                <div>
                    {{$page->body}}
                </div>
                <br>
                <div>
                    <h4>Controlli:</h4>
                    <a class="btn btn-info" href="{{route('admin.pages.index')}}">Torna alla dashboard</a>
                    @if(Auth::id() == $page->user_id)
                    <a class="btn btn-warning" href="{{route('admin.pages.edit', $page->id)}}">Modifica</a>
                    
                    <form action="{{route('admin.pages.destroy', $page->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <br>
                    <button class="btn btn-danger" type="submit">Elimina</a>
                    @endif
                </div>
                
            </div>
        </div>
    </div>
@endsection