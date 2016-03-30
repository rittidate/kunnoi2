<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_order_table extends CI_Migration {
  public function up()
  {
    $this->dbforge->drop_table('pos_order_tables', TRUE);

    // Table structure for table 'level group'
    $this->dbforge->add_field(array(
      'order_id' => array(
        'type' => 'MEDIUMINT',
        'constraint' => '8',
        'unsigned' => TRUE,
        'null' => FALSE
      ),
      'section' => array(
        'type' => 'VARCHAR',
        'constraint' => '20',
        'null' => FALSE
      ),
      'table_number' => array(
        'type' => 'INT',
        'constraint' => '11',
        'null' => FALSE
      )
    ));
    $this->dbforge->create_table('pos_order_tables');
  }
  
  public function down()
  {
    $this->dbforge->drop_table('pos_order_tables');
  }
}
