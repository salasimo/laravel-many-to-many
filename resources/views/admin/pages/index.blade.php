@extends('layouts.app')
@section('content')
    <div class="container">
      <div class="row">
        <div class="col-12">
        {{$pages->links()}}
          <ul class="nav justify-content-center">
            <li class="nav-item">
               <a class="nav-link active" href="{{route('home')}}">Torna alla home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="{{route('admin.pages.create')}}">Aggiungi Pagina</a>
            </li>
          </ul>
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th>Id</th>
                <th>Titolo</th>
                <th>Categoria</th>
                <th>Tags</th>
                <th>Data Creazione</th>
                <th>Data Update</th>
                <th colspan="3">Azioni</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($pages as $page)
                  <tr>
                    <td>{{$page->id}}</td>
                    <td>{{$page->title}}</td>
                    <td>{{$page->category->name}}</td>
                    <td>
                      @foreach ($page->tags as $tag)
                          {{$tag->name}} <br>
                      @endforeach
                    </td>
                    <td>{{$page->created_at}}</td>
                    <td>{{$page->updated_at}}</td>
                    <td><a class="btn btn-primary" href="{{route('admin.pages.show', $page->id)}}">Visualizza</a></td>
                    @if(Auth::id() == $page->user_id)
                    <td><a class="btn btn-secondary" href="{{route('admin.pages.edit', $page->id)}}">Modifica</a></td>
                    <td>
                      <form action="{{route('admin.pages.destroy', $page->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input class="btn btn-danger" type="submit" value="Elimina">
                      </form>
                      @endif
                    </td>
                  </tr>
              @endforeach
            </tbody>
          </table>
          {{$pages->links()}}
        </div>
      </div>
    </div>
@endsection