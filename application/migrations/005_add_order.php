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
      'date' => array(
        'type' => 'DATE',
        'null' => FALSE
      ),
      'order_id' => array(
        'type' => 'MEDIUMINT',
        'constraint' => '8',
        'unsigned' => TRUE,
        'null' => FALSE
      ),
      'item_no' => array(
        'type' => 'INT',
        'constraint' => '8',
        'unsigned' => TRUE,
        'null' => FALSE
      ),
      // s
      'type' => array(
        'type' => 'VARCHAR',
        'constraint' => '1',
        'null' => FALSE
      ),
      // n, c
      'status' => array(
        'type' => 'VARCHAR',
        'constraint' => '1',
        'null' => FALSE
      ),
      'mp_id' => array(
        'type' => 'MEDIUMINT',
        'constraint' => '8',
        'unsigned' => TRUE,
        'null' => FALSE
      ),
      'bc_id' => array(
        'type' => 'MEDIUMINT',
        'constraint' => '8',
        'unsigned' => TRUE,
        'null' => FALSE
      ),
      'vatable' => array(
        'type' => 'TINYINT',
        'constraint' => '1',
        'unsigned' => TRUE,
        'DEFAULT' => '1',
        'null' => FALSE
      ),
      'price_no' => array(
        'type' => 'INT',
        'constraint' => '4',
        'unsigned' => TRUE,
        'DEFAULT' => '1',
        'null' => FALSE
      ),
      'price' => array(
        'type' => 'INT',
        'constraint' => '15',
        'unsigned' => TRUE,
        'null' => FALSE
      ),
      'unit_id' => array(
        'type' => 'MEDIUMINT',
        'constraint' => '8',
        'unsigned' => TRUE,
        'null' => FALSE
      ),
      'unit_ratio' => array(
        'type' => 'INT',
        'constraint' => '11',
        'unsigned' => TRUE,
        'DEFAULT' => '100',
        'null' => FALSE
      ),
      'qty' => array(
        'type' => 'INT',
        'constraint' => '11',
        'unsigned' => TRUE,
        'DEFAULT' => '100',
        'null' => FALSE
      ),
      'discount_amount' => array(
        'type' => 'INT',
        'constraint' => '15',
        'unsigned' => TRUE,
        'DEFAULT' => '0',
        'null' => FALSE
      ),
      'total' => array(
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
      'order_id' => array(
        'type' => 'MEDIUMINT',
        'constraint' => '8',
        'unsigned' => TRUE,
        'null' => FALSE
      ),
      'date' => array(
        'type' => 'DATE',
        'null' => FALSE
      ),
      'item' => array(
        'type' => 'INT',
        'constraint' => '8',
        'null' => FALSE
      ),
      'payment_type' => array(
        'type' => 'INT',
        'constraint' => '8',
        'null' => FALSE
      ),
      'currency' => array(
        'type' => 'VARCHAR',
        'constraint' => '4',
        'null' => FALSE
      ),
      'pay_amount' => array(
        'type' => 'INT',
        'constraint' => '15',
        'unsigned' => TRUE,
        'null' => FALSE
      ),
      'cash_tender' => array(
        'type' => 'INT',
        'constraint' => '15',
        'unsigned' => TRUE,
        'null' => FALSE
      ),
      'creditcard_cr_id' => array(
        'type' => 'MEDIUMINT',
        'constraint' => '8',
        'unsigned' => TRUE,
        'null' => TRUE
      ),
      'creditcard_cr_hn' => array(
        'type' => 'VARCHAR',
        'constraint' => '100',
        'null' => TRUE
      ),
      'creditcard_cr_no' => array(
        'type' => 'VARCHAR',
        'constraint' => '20',
        'null' => TRUE
      ),
      'creditcard_approval_text' => array(
        'type' => 'VARCHAR',
        'constraint' => '100',
        'null' => TRUE
      ),
      'creditcard_approval_code' => array(
        'type' => 'VARCHAR',
        'constraint' => '20',
        'null' => TRUE
      ),
      'creditcard_invoice_number' => array(
        'type' => 'VARCHAR',
        'constraint' => '20',
        'null' => TRUE
      ),
      'creditcard_terminal_id' => array(
        'type' => 'VARCHAR',
        'constraint' => '20',
        'null' => TRUE
      ),
      'creditcard_merchant_number' => array(
        'type' => 'VARCHAR',
        'constraint' => '20',
        'null' => TRUE
      ),
      'creditcard_card_issue_name' => array(
        'type' => 'VARCHAR',
        'constraint' => '20',
        'null' => TRUE
      ),
      'creditcard_card_number' => array(
        'type' => 'VARCHAR',
        'constraint' => '20',
        'null' => TRUE
      ),
      'creditcard_card_expiry' => array(
        'type' => 'VARCHAR',
        'constraint' => '20',
        'null' => TRUE
      ),  
      'creditcard_batch_number' => array(
        'type' => 'VARCHAR',
        'constraint' => '20',
        'null' => TRUE
      ),
      'creditcard_transaction_date' => array(
        'type' => 'VARCHAR',
        'constraint' => '20',
        'null' => TRUE
      ),
      'creditcard_transaction_time' => array(
        'type' => 'VARCHAR',
        'constraint' => '20',
        'null' => TRUE
      ),
      'prepaid_card_no' => array(
        'type' => 'VARCHAR',
        'constraint' => '20',
        'null' => TRUE
      ),
      'welfare_card_no' => array(
        'type' => 'VARCHAR',
        'constraint' => '20',
        'null' => TRUE
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
