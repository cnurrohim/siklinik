<?php

class m221124_074547_users_table extends CDbMigration
{
	protected $options = 'ENGINE=innoDB DEFAULT CHARSET=utf8';
	public function up()
	{
		$this->createTable('roles', array(
			'id' => 'pk',
			'description' => 'varchar(45) UNIQUE NOT NULL',
			'DateCreated' => 'datetime NOT NULL',
			'LastUpdate' => 'TIMESTAMP NOT NULL',
		), $this->options);

		$this->createTable('users', array(
			'id' => 'pk',
			'username' => 'VARCHAR(255) UNIQUE NOT NULL',
			'password' => 'VARCHAR(255) NOT NULL',
			'DateCreated' => 'datetime NOT NULL',
			'LastUpdate' => 'timestamp NOT NULL',
			'roles_id' =>'integer'
		),$this->options);

		$this->addForeignKey('fk_user_role','users','roles_id','roles','id','CASCADE','RESTRICT');
	}

	public function down()
	{
		//echo "m221124_074547_users_table does not support migration down.\n";
		$this->dropTable('roles');
		$this->dropTable('users');
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