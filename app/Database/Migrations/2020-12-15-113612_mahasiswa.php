<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mahasiswa extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'mahasiswa_id'          => [
					'type'           => 'INT',
					'constraint'     => 11,
					'unsigned'       => TRUE,
					'auto_increment' => TRUE
			],
			'mahasiswa_nama'       => [
					'type'           => 'VARCHAR',
					'constraint'     => '100',
			],
			'kelas_id'       => [
					'type'           => 'INT',
					'constraint'     => 11,
					'unsigned'       => TRUE,
			],
		]);
		$this->forge->addKey('mahasiswa_id', TRUE);
		$this->forge->addForeignKey('kelas_id','kelas','kelas_id',true,true);
		$this->forge->createTable('mahasiswa');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
