@extends ('layouts.apk')


@section('content')

<h1> {{ $article -> title }} </h1>

<p> {{ $article -> subject }} </p>

<div class="row mb-1">
    <a href="/artikel/{{$article->id}}/edit" class="btn btn-primary my-3">edit</a>
    <form action="/artikel/{{$article->id}}" method="POST" >
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">delete</button>
    </form>


</div>

<a href="/artikel" class="btn btn-primary my-3">kembali</a>

@include('layouts.footer')

@endsection