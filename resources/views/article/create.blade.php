@extends ('layouts.apk')


@section('content')

<h1>Bikin artikel disini</h1>

{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

{{-- jika ingin menginputkan gambar maka tambahkan enctype="multipart/form-data" di form --}}
<form action="/artikel" method="post" enctype="multipart/form-data">
    <!--kalau ada error pake expired token, tambahkan @csrf di form-->
    <!--agar data yang diinputkan tidak hilang jika ada error kita menggunakan fungsi {{old('')}}-->
    @csrf

  {{-- contoh penggunaan component berada di dalam folder componen artikel--}}
  {{-- jika tidak bisa langung x-input --}}

  <x-artikel.input field="title" label="JUDUL" type="text" placeholder="Masukan titlenya disini"/>  
  <x-artikel.textarea field="subject" label="SUBJECT" placeholder="Masukan subjectnya disini"/>
    <x-artikel.inputfile />  


  <button type="submit" class="btn btn-primary">Submit</button>
</form>




@endsection