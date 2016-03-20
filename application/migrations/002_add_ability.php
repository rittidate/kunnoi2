<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_ability extends CI_Migration {
  public function up()
  {
    $this->dbforge->drop_table('ability', TRUE);

    // Table structure for table 'level group'
    $this->dbforge->add_field(array(
      'id' => array(
        'type' => 'MEDIUMINT',
        'constraint' => '8',
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'manage' => array(
        'type' => 'TINYINT',
        'constraint' => '1',
        'unsigned' => TRUE,
        'null' => TRUE
      ),
      'read' => array(
        'type' => 'TINYINT',
        'constraint' => '1',
        'unsigned' => TRUE,
        'DEFAULT' => '1',
        'null' => TRUE
      ),
      'delete' => array(
        'type' => 'TINYINT',
        'constraint' => '1',
        'unsigned' => TRUE,
        'DEFAULT' => '0',
        'null' => TRUE
      ),
      'group_id' => array(
        'type' => 'MEDIUMINT',
        'constraint' => '8',
        'unsigned' => TRUE,
        'null' => TRUE
      ),
      'user_id' => array(
        'type' => 'MEDIUMINT',
        'constraint' => '8',
        'unsigned' => TRUE,
        'null' => TRUE
      ),
      'page_id' => array(
        'type' => 'MEDIUMINT',
        'constraint' => '8',
        'unsigned' => TRUE
      )
    ));
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('ability');

    // Table structure for table 'level group'
    $this->dbforge->add_field(array(
      'id' => array(
        'type' => 'MEDIUMINT',
        'constraint' => '8',
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'name' => array(
        'type' => 'VARCHAR',
        'constraint' => '100',
      )
    ));
    $this->dbforge->add_key('id', TRUE);
    $this->dbforge->create_table('pages');

    $data = array(
      array(
        'id' => '1',
        'name' => 'home'
      ),
      array(
        'id' => '2',
        'name' => 'user'
      )
    );
    $this->db->insert_batch('pages', $data);
  }
  
  public function down()
  {
    $this->dbforge->drop_table('ability');
    $this->dbforge->drop_table('pages');
  }
}
