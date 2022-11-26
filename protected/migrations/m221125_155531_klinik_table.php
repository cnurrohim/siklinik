<?php

class m221125_155531_klinik_table extends CDbMigration
{
	protected $options = 'ENGINE=innoDB DEFAULT CHARSET=utf8';
	public function up()
	{
		$this->createTable('kota', array(
			'id' => 'pk',
			'nama' => 'varchar(100) NOT NULL',
		), $this->options);

		$this->createTable('dokter', array(
			'id' => 'pk',
			'nama' => 'varchar(100) NOT NULL',
			'hp' => 'varchar(30) NOT NULL',
			'tgllahir' => 'DATE',
			'alamat' => 'varchar(255)',
			'jenis_kelamin' => 'CHAR(1)',
			'kota_id' => 'integer NOT NULL',
		), $this->options);
		$this->addForeignKey('fk_kota_dokter','dokter','kota_id','kota','id','CASCADE','CASCADE');

		$this->createTable('pasien', array(
			'id' => 'pk',
			'nama' => 'varchar(100) NOT NULL',
			'hp' => 'varchar(20) NOT NULL',
			'tgllahir' => 'DATE NOT NULL',
			'alamat' => 'varchar(255)',
			'jenis_kelamin' => 'CHAR(1)',
			'kota_id' => 'integer NOT NULL',
		), $this->options);
		
		$this->addForeignKey('fk_kota_pasien','pasien','kota_id','kota','id','CASCADE','CASCADE');

		$this->createTable('rekam_medik', array(
			'id' => 'pk',
			'keluhan' => 'varchar(255) NOT NULL',
			'diagnosis' => 'varchar(100) NOT NULL',
			'dokter_id' => 'integer NOT NULL',
			'pasien_id' => 'integer NOT NULL',
			'user_id' => 'integer NOT NULL',
			'tanggal_periksa' => 'DATE NOT NULL',
			'terapi' => 'varchar(100) NOT NULL',
		), $this->options);

		$this->addForeignKey('fk_rekam_medik_pasien','rekam_medik','pasien_id','pasien','id','CASCADE','CASCADE');
		$this->addForeignKey('fk_rekam_medik_dokter','rekam_medik','dokter_id','dokter','id','CASCADE','CASCADE');
		$this->addForeignKey('fk_rekam_medik_user','rekam_medik','user_id','users','id','CASCADE','CASCADE');
		
		$this->createTable('obat', array(
			'id' => 'pk',
			'nama' => 'varchar(100) NOT NULL',
			'satuan' => 'char(10) NOT NULL',
			'harga' => 'DECIMAL(10,2) NOT NULL',
		), $this->options);
		
		$this->createTable('resep', array(
			'id' => 'pk',
			'rekammedik_id' => 'integer NOT NULL',
			'tanggal' => 'DATE NOT NULL',
		), $this->options);
		
		$this->addForeignKey('fk_resep_rekam_medik','resep','rekammedik_id','rekam_medik','id','CASCADE','CASCADE');

		$this->createTable('detil_resep', array(
			'id' => 'pk',
			'obat_id' => 'integer',
			'resep_id' => 'integer',
			'jumlah' => 'integer',
			'harga' => 'DECIMAL(10,2) NOT NULL',
		), $this->options);

		$this->addForeignKey('fk_detil_resep_obat','detil_resep','obat_id','obat','id','CASCADE','CASCADE');
		$this->addForeignKey('fk_detil_resep_resep','detil_resep','resep_id','resep','id','CASCADE','CASCADE');
		
		$this->createTable('bayar', array(
			'id' => 'pk',
			'resep_id' => 'integer',
			'biaya_obat' => 'DECIMAL(10,2) NOT NULL',
			'biaya_jasa' => 'DECIMAL(10,2) NOT NULL',
			'bayar' => 'DECIMAL(10,2) NOT NULL',
			'tanggal' => 'DATE',
			'user_id' => 'integer NOT NULL',
		), $this->options);
		$this->addForeignKey('fk_bayar_resep','bayar','resep_id','resep','id','CASCADE','CASCADE');
		$this->addForeignKey('fk_bayar_user','bayar','user_id','users','id','CASCADE','CASCADE');
		
	}

	public function down()
	{
		$this->dropTable('bayar');
		$this->dropTable('detil_resep');
		$this->dropTable('resep');
		$this->dropTable('obat');
		$this->dropTable('rekam_medik');
		$this->dropTable('pasien');
		$this->dropTable('dokter');
		$this->dropTable('kota');
		return false;
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}