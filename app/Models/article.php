<?php

namespace App\Models;

//agar dapat menggunakan soft delete
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class article extends Model
{
    use HasFactory;
    //agar dapat menggunakan soft delete
    use SoftDeletes;
         







    // cara menggunakan nama table yang berbeda
    // protected $table = 'articles';

    //agar tidak ada kolom created_at dan updated_at
    //public $timestamps = false;

      //untuk menentukan kolom yang boleh diisi pada mass assignment
      //  protected $fillable = ['title', 'subject']; 
    protected $guarded = ['id']; //untuk menentukan kolom yang tidak boleh diisi pada mass assignment
}
