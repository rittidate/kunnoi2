<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_mas_mp extends CI_Migration {
	public function up()
	{
		$this->dbforge->drop_table('mas_mp', TRUE);

		// Table structure for table 'login_attempts'
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'MEDIUMINT',
				'constraint' => '11',
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'MPCode' => array(
				'type' => 'VARCHAR',
				'constraint' => '20',
				'null' => FALSE
			),
			'AbbName' => array(
				'type' => 'VARCHAR',
				'constraint' => '40',
				'null' => TRUE
			),
			'TMPName' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => FALSE
			),
			'EMPName' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => FALSE
			),
			'Description' => array(
				'type' => 'VARCHAR',
				'constraint' => '400',
				'null' => TRUE
			),
			'MPType' => array(
				'type' => 'INT',
				'constraint' => '11',
				'unsigned' => TRUE,
				'DEFAULT' => '0',
				'null' => FALSE
			),
			'AG_Id' => array(
				'type' => 'INT',
				'constraint' => '11',
				'unsigned' => TRUE,
				'null' => TRUE
			),
			'BC_Id_DF' => array(
				'type' => 'INT',
				'constraint' => '11',
				'unsigned' => TRUE,
				'null' => TRUE
			),
			'SP_Id' => array(
				'type' => 'INT',
				'constraint' => '11',
				'unsigned' => TRUE,
				'null' => TRUE
			),
			// Foreign key from mas_lu
			'UM_Id_SU' => array(
				'type' => 'INT',
				'constraint' => '11',
				'unsigned' => TRUE,
				'null' => TRUE
			),
			'UM_Id_BU' => array(
				'type' => 'INT',
				'constraint' => '11',
				'unsigned' => TRUE,
				'null' => TRUE
			),
			'UM_Id_BU_UMRatio' => array(
				'type' => 'DECIMAL',
				'constraint' => '15,4',
				'null' => TRUE
			),
			'UM_Id_RW' => array(
				'type' => 'INT',
				'constraint' => '11',
				'unsigned' => TRUE,
				'null' => TRUE
			),
			'UM_Id_RW_UMRatio' => array(
				'type' => 'DECIMAL',
				'constraint' => '15,4',
				'null' => TRUE
			),
			'FXCode' => array(
				'type' => 'VARCHAR',
				'constraint' => '40',
				'null' => TRUE
			),
			'Vatable' => array(
				'type' => 'INT',
				'constraint' => '1',
				'null' => FALSE,
				'DEFAULT' => '1'
			),
			'AllowMinus' => array(
				'type' => 'INT',
				'constraint' => '1',
				'null' => FALSE,
				'DEFAULT' => '1'
			),
			'Discontinue' => array(
				'type' => 'INT',
				'constraint' => '1',
				'null' => FALSE,
				'DEFAULT' => '0'
			),
			'ControlSN' => array(
				'type' => 'INT',
				'constraint' => '1',
				'null' => FALSE,
				'DEFAULT' => '0'
			),
			'Memo' => array(
				'type' => 'VARCHAR',
				'constraint' => '1000',
				'null' => TRUE
			),
			'AlertMsg' => array(
				'type' => 'VARCHAR',
				'constraint' => '1000',
				'null' => TRUE
			),
			'Active' => array(
				'type' => 'INT',
				'constraint' => '1',
				'null' => FALSE,
				'DEFAULT' => '1'
			),
			'StandardCost' => array(
				'type' => 'DECIMAL',
				'constraint' => '15,4',
				'null' => FALSE
			),
			'LaunchDate' => array(
				'type' => 'DATETIME',
				'null' => TRUE
			),
			'CB_ExpType' => array(
				'type' => 'INT',
				'null' => TRUE
			),
			'CB_ExpNMonth' => array(
				'type' => 'INT',
				'null' => TRUE
			),
			'CB_ExpDate' => array(
				'type' => 'DATE',
				'null' => TRUE
			),
			'DrugLabel' => array(
				'type' => 'VARCHAR',
				'constraint' => '1000',
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
		$this->dbforge->create_table('mas_mp');

		$this->db->query("ALTER TABLE `mas_mp` ADD UNIQUE(`MPCode`)");
	}
	
	public function down()
	{
		$this->dbforge->drop_table('mas_mp');
	}
}