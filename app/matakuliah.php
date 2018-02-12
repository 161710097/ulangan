<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class matakuliah extends Model
{
    protected $table = 'matakuliahs';
    protected $fillable = array('nama_matkul','kkm');

    public function mahasiswa() {
		return $this->belongsToMany('App\mahasiswa', 'matkul_mahasiswas','id_matakuliah','id_mahasiswa' );
	}
}
