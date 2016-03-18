<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_mas_mp_bc extends CI_Migration {
	public function up()
	{
		$this->dbforge->drop_table('mas_mp_bc', TRUE);

		// Table structure for table 'login_attempts'
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'MEDIUMINT',
				'constraint' => '11',
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			// unique id
			'BCCode' => array(
				'type' => 'VARCHAR',
				'constraint' => '20',
				'null' => FALSE
			),
			//foreign key from mas_mp
			'MP_Id' => array(
				'type' => 'INT',
				'constraint' => '11',
				'null' => TRUE
			),
			'MUCode' => array(
				'type' => 'VARCHAR',
				'constraint' => '15',
				'null' => TRUE
			),
			'Price1' => array(
				'type' => 'DECIMAL',
				'constraint' => '15,4',
				'null' => FALSE
			),
			'Price2' => array(
				'type' => 'DECIMAL',
				'constraint' => '15,4',
				'null' => FALSE
			),
			'Price3' => array(
				'type' => 'DECIMAL',
				'constraint' => '15,4',
				'null' => FALSE
			),
			'Price4' => array(
				'type' => 'DECIMAL',
				'constraint' => '15,4',
				'null' => FALSE
			),
			'Price5' => array(
				'type' => 'DECIMAL',
				'constraint' => '15,4',
				'null' => FALSE
			),
			'Price6' => array(
				'type' => 'DECIMAL',
				'constraint' => '15,4',
				'null' => FALSE
			),
			'Price7' => array(
				'type' => 'DECIMAL',
				'constraint' => '15,4',
				'null' => FALSE
			),
			'Price8' => array(
				'type' => 'DECIMAL',
				'constraint' => '15,4',
				'null' => FALSE
			),
			'Price9' => array(
				'type' => 'DECIMAL',
				'constraint' => '15,4',
				'null' => FALSE
			),
			'Price10' => array(
				'type' => 'DECIMAL',
				'constraint' => '15,4',
				'null' => FALSE
			),
			'DPrice' => array(
				'type' => 'INT',
				'constraint' => '1',
				'null' => FALSE
			),
			// Foreign key mas_lu for unit
			'UM_Id' => array(
				'type' => 'INT',
				'constraint' => '11',
				'unsigned' => TRUE,
				'null' => FALSE
			),
			'UMRatio' => array(
				'type' => 'DECIMAL',
				'constraint' => '15,4',
				'null' => FALSE
			),
			'PriceOnSale' => array(
				'type' => 'INT',
				'constraint' => '1',
				'unsigned' => TRUE,
				'null' => FALSE,
				'DEFAULT' => 0
			),
			'Buying' => array(
				'type' => 'INT',
				'constraint' => '1',
				'unsigned' => TRUE,
				'null' => FALSE,
				'DEFAULT' => 1
			),
			'Selling' => array(
				'type' => 'INT',
				'constraint' => '1',
				'unsigned' => TRUE,
				'null' => FALSE,
				'DEFAULT' => 1
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
		$this->dbforge->create_table('mas_mp_bc');

		$this->db->query("ALTER TABLE `mas_mp_bc` ADD UNIQUE(`BCCode`)");
	}
	
	public function down()
	{
		$this->dbforge->drop_table('mas_mp_bc');
	}
}