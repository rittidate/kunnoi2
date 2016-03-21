<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_product extends CI_Migration {
  public function up()
  {
    $this->dbforge->drop_table('mp_products', TRUE);

    // Table structure for table 'level group'
    $this->dbforge->add_field(array(
      'id' => array(
        'type' => 'MEDIUMINT',
        'constraint' => '8',
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'code' => array(
        'type' => 'VARCHAR',
        'constraint' => '20',
        'null' => FALSE
      ),
      't_abb_name' => array(
        'type' => 'VARCHAR',
        'constraint' => '40',
        'null' => TRUE
      ),
      't_full_name' => array(
        'type' => 'VARCHAR',
        'constraint' => '100',
        'null' => TRUE
      ),
      'e_abb_name' => array(
        'type' => 'VARCHAR',
        'constraint' => '40',
        'null' => TRUE
      ),
      'e_full_name' => array(
        'type' => 'VARCHAR',
        'constraint' => '100',
        'null' => TRUE
      ),
      'vatable' => array(
        'type' => 'TINYINT',
        'constraint' => '1',
        'unsigned' => TRUE,
        'DEFAULT' => '1',
        'null' => TRUE
      ),
      'allow_minus' => array(
        'type' => 'TINYINT',
        'constraint' => '1',
        'unsigned' => TRUE,
        'DEFAULT' => '1',
        'null' => TRUE
      ),
      'discontinue' => array(
        'type' => 'TINYINT',
        'constraint' => '1',
        'unsigned' => TRUE,
        'DEFAULT' => '0',
        'null' => TRUE
      ),
      'active' => array(
        'type' => 'TINYINT',
        'constraint' => '1',
        'unsigned' => TRUE,
        'DEFAULT' => '1',
        'null' => TRUE
      ),
      'cost' => array(
        'type' => 'INT',
        'constraint' => '15',
        'unsigned' => TRUE,
        'DEFAULT' => '0',
        'null' => TRUE
      ),
      'unit_id' => array(
        'type' => 'MEDIUMINT',
        'constraint' => '8',
        'unsigned' => TRUE
      ),
      'created_on' => array(
        'type' => 'INT',
        'constraint' => '11',
        'unsigned' => TRUE,
      ),
      'updated_on' => array(
        'type' => 'INT',
        'constraint' => '11',
        'unsigned' => TRUE,
      )
    ));
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('mp_products');

    $this->dbforge->drop_table('mp_barcodes', TRUE);
    // Table structure for table 'level group'
    $this->dbforge->add_field(array(
      'id' => array(
        'type' => 'MEDIUMINT',
        'constraint' => '8',
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'mp_id' => array(
        'type' => 'MEDIUMINT',
        'constraint' => '8',
        'unsigned' => TRUE,
        'null' => FALSE
      ),
      'barcode' => array(
        'type' => 'VARCHAR',
        'constraint' => '20',
        'null' => FALSE
      ),
      'price1' => array(
        'type' => 'INT',
        'constraint' => '15',
        'unsigned' => TRUE,
        'DEFAULT' => '0',
        'null' => FALSE
      ),
      'price2' => array(
        'type' => 'INT',
        'constraint' => '15',
        'unsigned' => TRUE,
        'DEFAULT' => '0',
        'null' => FALSE
      ),
      'price3' => array(
        'type' => 'INT',
        'constraint' => '15',
        'unsigned' => TRUE,
        'DEFAULT' => '0',
        'null' => FALSE
      ),
      'price4' => array(
        'type' => 'INT',
        'constraint' => '15',
        'unsigned' => TRUE,
        'DEFAULT' => '0',
        'null' => FALSE
      ),
      'unit_id' => array(
        'type' => 'MEDIUMINT',
        'constraint' => '8',
        'unsigned' => TRUE,
        'null' => FALSE
      ),
      'unit_ratio' => array(
        'type' => 'MEDIUMINT',
        'constraint' => '11',
        'unsigned' => TRUE,
        'DEFAULT' => '100',
        'null' => FALSE
      ),
      'created_on' => array(
        'type' => 'INT',
        'constraint' => '11',
        'unsigned' => TRUE,
      ),
      'updated_on' => array(
        'type' => 'INT',
        'constraint' => '11',
        'unsigned' => TRUE,
      )
    ));
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('mp_barcodes');
  }
  
  public function down()
  {
    $this->dbforge->drop_table('mp_products');
    $this->dbforge->drop_table('mp_barcodes');
  }
}
