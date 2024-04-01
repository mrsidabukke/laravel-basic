<!-- Menghubungkan dengan view template master -->
@extends('layouts.apk')

<!-- jika hanya berisi string biasa dan tidak ada baris php bisa langsung seperti ini -->
@section('title','halaman artikel')
    
<!-- untuk pengguna dari layout menggunakan kata kunci section -->
@section('content')

<h1> ini adalah halaman artikel </h1>
<a href="/artikel/create" class="btn btn-primary my-3">bikin artikel</a>

<!-- chunk(3) berarti membagi data menjadi 3 bagian -->
@foreach ($articles->chunk(3) as $articlechunk)
<div class="row">

<!-- cara untuk meloop data dari controller ke extra -->
@foreach ($articlechunk as $article)
<div class="col card card mb-1 ml-1 mr-1">
    <img class "card-img-top" src="/image/{{$article->thumbnail}}" alt="Card image cap">
    <div class=" card-body">
<!-- gunakan $article->id untuk mengambil data langsung dari database -->
    <p> <strong> {{ ucfirst ($article->title) }} </strong> </p>
    <p>  {{ $article->subject }} </p>
    <a href="/artikel/{{$article->slug}}" class="btn btn-primary my-3 stretched-link" >
        baca
    </a >

   


    </div>
</div>
@endforeach
</div>
@endforeach

<div>
<!-- cara untuk membagi data berdasarkan jumlah(membuat halaman) -->
{{ $articles->links() }}
</div>

@include('layouts.footer')

@endsection