<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_order extends CI_Migration {
  public function up()
  {
    $this->dbforge->drop_table('pos_orders', TRUE);

    // Table structure for table 'level group'
    $this->dbforge->add_field(array(
      'id' => array(
        'type' => 'MEDIUMINT',
        'constraint' => '8',
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'date' => array(
        'type' => 'DATE',
        'null' => FALSE
      ),
      'year' => array(
        'type' => 'INT',
        'constraint' => '6',
        'null' => FALSE
      ),
      'timestamp' => array(
        'type' => 'DATETIME',
        'null' => FALSE
      ),
      // s
      'type' => array(
        'type' => 'VARCHAR',
        'constraint' => '1',
        'null' => FALSE
      ),
      // c,o,n
      'status' => array(
        'type' => 'VARCHAR',
        'constraint' => '1',
        'null' => FALSE
      ),
      'cashier_id' => array(
        'type' => 'MEDIUMINT',
        'constraint' => '8',
        'unsigned' => TRUE,
        'null' => FALSE
      ),
      'member_id' => array(
        'type' => 'MEDIUMINT',
        'constraint' => '8',
        'unsigned' => TRUE,
        'null' => TRUE
      ),
      'use_point' => array(
        'type' => 'INT',
        'constraint' => '15',
        'unsigned' => TRUE,
        'DEFAULT' => '0',
        'null' => FALSE
      ),
      'vat_rate' => array(
        'type' => 'INT',
        'constraint' => '11',
        'null' => FALSE
      ),
      'vat_amount' => array(
        'type' => 'INT',
        'constraint' => '15',
        'unsigned' => TRUE,
        'null' => FALSE
      ),
      'qty' => array(
        'type' => 'INT',
        'constraint' => '11',
        'unsigned' => TRUE,
        'null' => FALSE
      ),
      'deleted_qty' => array(
        'type' => 'INT',
        'constraint' => '11',
        'unsigned' => TRUE,
        'DEFAULT' => '0',
        'null' => FALSE
      ),
      'discount_amount' => array(
        'type' => 'INT',
        'constraint' => '15',
        'unsigned' => TRUE,
        'DEFAULT' => '0',
        'null' => FALSE
      ),
      'subtotal' => array(
        'type' => 'INT',
        'constraint' => '15',
        'unsigned' => TRUE,
        'null' => FALSE
      ),
      'value' => array(
        'type' => 'INT',
        'constraint' => '15',
        'unsigned' => TRUE,
        'null' => FALSE
      ),
      'total' => array(
        'type' => 'INT',
        'constraint' => '15',
        'unsigned' => TRUE,
        'null' => FALSE
      ),
      'charge_rate' => array(
        'type' => 'INT',
        'constraint' => '11',
        'null' => FALSE
      ),
      'charge_amount' => array(
        'type' => 'INT',
        'constraint' => '15',
        'unsigned' => TRUE,
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
    $this->dbforge->create_table('pos_orders');

    $this->dbforge->drop_table('pos_order_details', TRUE);
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
        'constraint' => '8',
        'unsigned' => TRUE,
        'DEFAULT' => '1',
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
    $this->dbforge->create_table('pos_order_details');

    $this->dbforge->drop_table('pos_order_payments', TRUE);
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
        'constraint' => '8',
        'unsigned' => TRUE,
        'DEFAULT' => '1',
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
    $this->dbforge->create_table('pos_order_payments');
  }
  
  public function down()
  {
    $this->dbforge->drop_table('pos_orders');
    $this->dbforge->drop_table('pos_order_details');
    $this->dbforge->drop_table('pos_order_payments');
  }
}
