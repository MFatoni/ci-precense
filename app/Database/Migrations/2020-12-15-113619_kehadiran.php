<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kehadiran extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'kehadiran_id'          => [
					'type'           => 'INT',
					'constraint'     => 11,
					'unsigned'       => TRUE,
					'auto_increment' => TRUE
			],
			'mahasiswa_id'       => [
					'type'           => 'INT',
					'constraint'     => 11,
					'unsigned'       => TRUE,
			],
			'kelas_id'       => [
					'type'           => 'INT',
					'constraint'     => 11,
					'unsigned'       => TRUE,
			],
			'tanggal'       => [
					'type'           => 'date',
			],
			'status'       => [
					'type'           => 'boolean',
					'default' => false,
			],
		]);
		$this->forge->addKey('kehadiran_id', TRUE);
		$this->forge->addForeignKey('mahasiswa_id','mahasiswa','mahasiswa_id',true,true);
		$this->forge->addForeignKey('kelas_id','kelas','kelas_id',true,true);
		$this->forge->createTable('kehadiran');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		//
	}
}
