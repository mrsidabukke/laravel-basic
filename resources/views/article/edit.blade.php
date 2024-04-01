@extends ('layouts.apk')


@section('content')

<h1>ubah artikel</h1>

{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

<form action="/artikel/{{$article->id}}" method="post" enctype="multipart/form-data">
    <!--kalau ada error pake expired token, tambahkan csrf di form-->
    <!--agar data yang diinputkan tidak hilang jika ada error kita menggunakan fungsi {{old('')}}-->
    @csrf
    @method('PUT')
    
  
    <x-artikel.input field="title" label="title" type="text" placeholder="judul artikel" value="{{$article->title}}"/>
    
    <x-artikel.textarea field="subject" label="subject" placeholder="isi artikel" value="{{$article->subject}}"/>
      

        @if ($article->thumbnail)
        <img src="/image/{{$article->thumbnail}}" class="img-thumbnail" alt="thumbnail">
        @else
        <p>belum ada thumbnailmu bodo</p>
        @endif

    <x-artikel.inputfile />



  <button type="submit" class="btn btn-primary">Submit</button>
</form>




@endsection