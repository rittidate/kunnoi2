<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_mas_group extends CI_Migration {
	public function up()
	{
		$this->dbforge->drop_table('mas_mp_gx', TRUE);

		// Table structure for table 'level group'
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'MEDIUMINT',
				'constraint' => '5',
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			// unique id
			'GXName' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => FALSE
			),
			//foreign key from mas_mp
			'GXLevel' => array(
				'type' => 'INT',
				'constraint' => '5',
				'null' => FALSE
			),
			// foreign key it self
			'ParentId' => array(
				'type' => 'INT',
				'constraint' => '5',
				'null' => TRUE
			),
			'RootId' => array(
				'type' => 'INT',
				'constraint' => '5',
				'null' => TRUE
			),
			'CreateDt' => array(
				'type' => 'DATETIME',
				'null' => FALSE
			),
			'UpdateDt' => array(
				'type' => 'DATETIME',
				'null' => FALSE
			)
		));
		$this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('mas_mp_gx');

		$this->dbforge->drop_table('mas_mp_gm', TRUE);

		// Table structure for table 'level group'
		$this->dbforge->add_field(array(
			'MP_Id' => array(
				'type' => 'INT',
				'constraint' => '11',
				'null' => FALSE
			),
			'GX_Id' => array(
				'type' => 'INT',
				'constraint' => '5',
				'null' => FALSE
			),
			'CreateDt' => array(
				'type' => 'DATETIME',
				'null' => FALSE
			),
			'UpdateDt' => array(
				'type' => 'DATETIME',
				'null' => FALSE
			)
		));
		$this->dbforge->add_key('MP_Id', TRUE);
		$this->dbforge->add_key('GX_Id', TRUE);
		$this->dbforge->create_table('mas_mp_gm');

	}
	
	public function down()
	{
		$this->dbforge->drop_table('mas_mp_gx');
		$this->dbforge->drop_table('mas_mp_gm');
	}
}