<?php

namespace App\Http\Controllers;
use App\Models\article;

//menggunakan class Str agar dapat menggunakan fungsi slug
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    

//operan dari web.php
public function index()
{
    //cara meloop data dari controller ke extra.blade.php
    // $articles = [
    //     ['title' => 'Judul Artikel Pertama', 'subject' => 'ini isi pertama'],
    //     ['title' => 'Judul Artikel kedua', 'subject' => 'ini isi kedua'],
    //     ['title' => 'Judul Artikel ketiga', 'subject' => 'ini isi ketiga'],     
    // ];

    //cara mengambil semua data dari database
    //$articles = article::all();

    //cara mengambil data berdasarkan id
    //$articles = article::find(1);

    // cara membagi data berdasarkan jumlah
    $articles = article::orderby('id','desc')-> paginate(9);


    return view('article.extra', compact('articles'));
}


//variable slug tidak harus sama dengan yang di web.php
public function contoh($slug)
{

   // cara mengoper data ke view
   //return view('contoh', ['slug' => $slug]);
   //setiap variable yang dikirim harus dibuat ke return

  // jika nama variable sama dengan nama variable di web.php
  
  // where('slug', $slug) berfungsi untuk mencari data berdasarkan slug
  $article = article::where('slug', $slug)->first();

  // jika link tidak ditemukan maka akan menampilkan error 404
  if($article == null)
        abort(404);

     return view('article.contoh', compact('article'));  

}

public function create()
{
    
    return view('article.create');

}

public function store(Request $request)
{
 
   

    $request->validate(
 [
    'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    'title' => 'required|max:255',
    'subject' => 'required|min:10',
]
);
$imgName=null;
if($request->thumbnail){
// cara membuat nama gambar agar tidak sama
$imgName = $request->thumbnail->getClientOriginalName() . '-' . time() . '.' . $request->thumbnail->extension();

    // cara menyimpan gambar ke folder public/image
    $request->thumbnail->move(public_path('image'),$imgName);
}
  
  // cara menyimpan data ke database
    //
$article = new article;

    // $article->title = $request->title;
    // $article->subject = $request->subject;
    // $article->save();

    // cara lain menyimpan data dengan mass assignment
    Article::create([
        'title' => $request->title,
        'slug' => Str::slug($request->title,'-'), //membuat slug dari title
        'subject' => $request->subject,
        'thumbnail' => $imgName,

    ]);

    return redirect('/artikel');



   // dd($request);


    // cara mengambil data dari form
    // $title = $request->title;
    // $subject = $request->subject;

    // cara lain mengambil data dari form
    // $title = $request['title'];
    // $subject = $request['subject'];

    // cara lain mengambil data dari form
    // $title = request('title');
    // $subject = request('subject');

    // cara lain mengambil data dari form
    // $title = $request->input('title');
    // $subject = $request->input('subject');

    // cara lain mengambil data dari form
    // $title = $request->only('title', 'subject');
    // $subject = $request->only('title', 'subject');

    // cara lain mengambil data dari form
    // $title = $request->except('_token');
    // $subject = $request->except('_token');

    // cara lain mengambil data dari form
    // $title = $request->all();
    // $subject = $request->all();

    // cara lain mengambil data dari form
    // $title = $request->title;
    // $subject = $request->subject;

    // cara lain mengambil data dari form
    // $title = $request->title;
    // $subject = $request->subject;

    // cara lain mengambil data dari form
    // $title = $request->title;
    // $subject = $request->subject;

    // cara lain mengambil data dari form
    // $title = $request->title;
    // $subject = $request->subject;

    // cara lain mengambil data dari form
    // $title = $request->title;
    // $subject = $request->subject;

    // cara lain mengambil data dari form
    // $title = $request->title;
    // $subject = $request->subject;

    // cara lain mengambil data dari form
    // $title = $request->title;
    // $subject = $request->subject;

    // cara lain mengambil data dari form
    // $title = $request->title;
    // $subject = $request->subject;
}
//gunakan fungsi find untuk mengambil data 
public function edit($id)
{
    $article = article::find($id);
    return view('article.edit', compact('article'));

}

public function update(Request $request, $id)
{
        
    $request->validate(
        [
           'title' => 'required|max:255',
           'subject' => 'required|min:10',

       ]);
         
       $imgName=null;
       if($request->thumbnail){
         
        $imgName = $request->thumbnail->getClientOriginalName() . '-' . time() . '.' . $request->thumbnail->extension();
        $request->thumbnail->move(public_path('image'),$imgName);
        
           
        }
       Article::find($id)->update ([
           'title' => $request->title,
           'subject' => $request->subject,
           'thumbnail' => $imgName,
           //jika thumbnaiil wajib diisi
        //    'thumbnail' => $request->thumbnail,
       ]);
     
  

return redirect('/artikel');
}
public function destroy($id)
{
    // Article::destroy($id);

    Article::find($id)->delete();

    return redirect('/artikel');                                                                                                                                                    



}

}