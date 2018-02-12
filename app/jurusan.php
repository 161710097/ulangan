<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jurusan extends Model
{
    protected $table = 'jurusans';
    protected $fillable = array('nama');

    public function mahasiswa(){
    	return $this->hasOne('App\mahasiswa','id_jurusan');
    }
}
