<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_user_logs extends CI_Migration {
  public function up()
  {
    $this->dbforge->drop_table('user_logs', TRUE);

    // Table structure for table 'level group'
    $this->dbforge->add_field(array(
      'id' => array(
        'type' => 'MEDIUMINT',
        'constraint' => '8',
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'user_id' => array(
        'type' => 'MEDIUMINT',
        'constraint' => '8',
        'unsigned' => TRUE,
        'null' => FALSE
      ),
      'action' => array(
        'type' => 'VARCHAR',
        'constraint' => '255',
        'null' => TRUE
      ),
      'timestamp' => array(
        'type' => 'DATETIME',
        'null' => FALSE
      ),
    ));
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('user_logs');
  }
  
  public function down()
  {
    $this->dbforge->drop_table('user_logs');
  }
}
