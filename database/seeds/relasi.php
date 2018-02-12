<?php

use Illuminate\Database\Seeder;
use App\mahasiswa;
use App\dosen;
use App\wali;
use App\jurusan;
use App\matakuliah;
class relasi extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dosens')->delete();
        DB::table('jurusans')->delete();
        DB::table('mahasiswas')->delete();
        DB::table('walis')->delete();
        DB::table('matakuliahs')->delete();
		DB::table('matkul_mahasiswas')->delete();

		$dosen = dosen::create(array(
			'nama' => 'markus',
			'nipd' => '45678',
			'alamat' => 'dogdog',			
			'mata_kuliah' =>'biologi'));
		$dosen1 = dosen::create(array(
			'nama' => 'horizon',
			'nipd' => '23456789',
			'alamat' => 'nah',			
			'mata_kuliah' =>'kwu'));
		$dosen2 = dosen::create(array(
			'nama' => 'tal',
			'nipd' => '9876543',
			'alamat' => 'loh',			
			'mata_kuliah' =>'teknik'));
		$this->command->info('dosen telah diisi!');

		$biologi = jurusan::create(array(
			'nama' => 'biologi'
		));
		$wirausaha = jurusan::create(array(
			'nama' => 'usahawan'
		));
		$teknik = jurusan::create(array(
			'nama' => 'TKR'
		));
		$this->command->info('jurusan telah diisi!');

		$a = mahasiswa::create(array(
			'nama' => 'Rahmat',
			'nim'  => '345678',
			'id_dosen' => $dosen->id,
			'id_jurusan' => $wirausaha->id));
		
		$b = mahasiswa::create(array(
			'nama' => 'Dadang',
			'nim'  => '23456789',
			'id_dosen' => $dosen1->id,
			'id_jurusan' => $biologi->id));

		$c = mahasiswa::create(array(
			'nama' => 'Putra',
			'nim'  => '4567890',
			'id_dosen' => $dosen2->id,
			'id_jurusan' => $teknik->id));
		$this->command->info('Mahasiswa telah diisi!');

		wali::create(array(
			'nama'  => 'Ukos',
			'alamat' =>'junti',
			'id_mahasiswa' =>$a->id));

		wali::create(array(
			'nama'  => 'Ujang',
			'alamat' =>'junti',
			'id_mahasiswa' => $b->id));	

		wali::create(array(
			'nama'  => 'Koswara',
			'alamat' =>'junti',
			'id_mahasiswa' => $c->id ));	

		$this->command->info('Data mahasiswa dan wali telah diisi!');

		$fis = matakuliah::create(array(
			'nama_matkul'=>'fisika',
			'kkm'=>'80'));
		$mtk = matakuliah::create(array(
			'nama_matkul'=>'matematika',
			'kkm'=>'85'));

		$a->matakuliah()->attach($mtk->id);
		$b->matakuliah()->attach($fis->id);
		$c->matakuliah()->attach($mtk->id);

		$this->command->info('mahasiswa dan matkul telah diisi');

    }
}
