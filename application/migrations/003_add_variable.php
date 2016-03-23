<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_variable extends CI_Migration {
  public function up()
  {
    $this->dbforge->drop_table('variables', TRUE);

    // Table structure for table 'level group'
    $this->dbforge->add_field(array(
      'id' => array(
        'type' => 'MEDIUMINT',
        'constraint' => '8',
        'unsigned' => TRUE,
        'auto_increment' => TRUE
      ),
      'parent_id' => array(
        'type' => 'MEDIUMINT',
        'constraint' => '8',
        'unsigned' => TRUE,
        'null' => TRUE
      ),
      'type' => array(
        'type' => 'VARCHAR',
        'constraint' => '20',
        'null' => FALSE
      ),
      'sub_type' => array(
        'type' => 'MEDIUMINT',
        'constraint' => '8',
        'unsigned' => TRUE,
        'null' => TRUE
      ),
      'code' => array(
        'type' => 'VARCHAR',
        'constraint' => '10',
        'null' => TRUE
      ),
      't_abb_name' => array(
        'type' => 'VARCHAR',
        'constraint' => '20',
        'null' => TRUE
      ),
      't_full_name' => array(
        'type' => 'VARCHAR',
        'constraint' => '100',
        'null' => TRUE
      ),
      'e_abb_name' => array(
        'type' => 'VARCHAR',
        'constraint' => '20',
        'null' => TRUE
      ),
      'e_full_name' => array(
        'type' => 'VARCHAR',
        'constraint' => '100',
        'null' => TRUE
      ),
      'value1' => array(
        'type' => 'INT',
        'constraint' => '11',
        'null' => TRUE
      ),
      'value2' => array(
        'type' => 'INT',
        'constraint' => '11',
        'null' => TRUE
      ),
      'char1' => array(
        'type' => 'VARCHAR',
        'constraint' => '255',
        'null' => TRUE
      ),
      'char2' => array(
        'type' => 'VARCHAR',
        'constraint' => '255',
        'null' => TRUE
      ),
      'active' => array(
        'type' => 'TINYINT',
        'constraint' => '1',
        'unsigned' => TRUE,
        'default' => '1',
        'null' => FALSE
      ),
      'deleted' => array(
        'type' => 'TINYINT',
        'constraint' => '1',
        'unsigned' => TRUE,
        'default' => '0',
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
    $this->dbforge->create_table('variables');

    // Table structure for table 'level group'
    $data =array(
      array(
        'type' => 'money',
        't_full_name' => 'ธนบัตรใบละ 1000',
        'e_full_name' => 'Bank 1000',
        'value1' => '1000.0000',
        'created_on' => time(),
        'updated_on' => time()
      ),
      array(
        'type' => 'money',
        't_full_name' => 'ธนบัตรใบละ 500',
        'e_full_name' => 'Bank 500',
        'value1' => '50000',
        'created_on' => time(),
        'updated_on' => time()
      ),
      array(
        'type' => 'money',
        't_full_name' => 'ธนบัตรใบละ 100',
        'e_full_name' => 'Bank 100',
        'value1' => '10000',
        'created_on' => time(),
        'updated_on' => time()
      ),
      array(
        'type' => 'money',
        't_full_name' => 'ธนบัตรใบละ 50',
        'e_full_name' => 'Bank 50',
        'value1' => '5000',
        'created_on' => time(),
        'updated_on' => time()
      ),
      array(
        'type' => 'money',
        't_full_name' => 'ธนบัตรใบละ 20',
        'e_full_name' => 'Bank 20',
        'value1' => '2000',
        'created_on' => time(),
        'updated_on' => time()
      ),
      array(
        'type' => 'money',
        't_full_name' => 'ธนบัตรใบละ 10',
        'e_full_name' => 'Bank 10',
        'value1' => '1000',
        'created_on' => time(),
        'updated_on' => time()
      ),
      array(
        'type' => 'money',
        't_full_name' => 'เหรียญ 10',
        'e_full_name' => 'Coin 10',
        'value1' => '1000',
        'created_on' => time(),
        'updated_on' => time()
      ),
      array(
        'type' => 'money',
        't_full_name' => 'เหรียญ 5',
        'e_full_name' => 'Coin 5',
        'value1' => '500',
        'created_on' => time(),
        'updated_on' => time()
      ),
      array(
        'type' => 'money',
        't_full_name' => 'เหรียญ 2',
        'e_full_name' => 'Coin 2',
        'value1' => '200',
        'created_on' => time(),
        'updated_on' => time()
      ),
      array(
        'type' => 'money',
        't_full_name' => 'เหรียญ 1',
        'e_full_name' => 'Coin 1',
        'value1' => '100',
        'created_on' => time(),
        'updated_on' => time()
      ),
      array(
        'type' => 'money',
        't_full_name' => 'เหรียญ 50 สต.',
        'e_full_name' => 'Coin 50 st.',
        'value1' => '50',
        'created_on' => time(),
        'updated_on' => time()
      ),
      array(
        'type' => 'money',
        't_full_name' => 'เหรียญ 25 สต.',
        'e_full_name' => 'Coin 25 st.',
        'value1' => '25',
        'created_on' => time(),
        'updated_on' => time()
      ),
      //unit
      array(
        'type' => 'unit',
        't_abb_name' => 'ชิ้น',
        't_full_name' => 'ชิ้น',
        'e_abb_name' => 'Pcs',
        'e_full_name' => 'Pieces',
        'sub_type' => '0',
        'created_on' => time(),
        'updated_on' => time()
      ),
      array(
        'type' => 'unit',
        't_abb_name' => 'ชุด',
        't_full_name' => 'ชุด',
        'e_abb_name' => 'Set',
        'e_full_name' => 'Set',
        'sub_type' => '0',
        'created_on' => time(),
        'updated_on' => time()
      ),
      array(
        'type' => 'unit',
        't_abb_name' => 'ครั้ง',
        't_full_name' => 'ครั้ง',
        'e_abb_name' => 'Time',
        'e_full_name' => 'Time',
        'sub_type' => '0',
        'created_on' => time(),
        'updated_on' => time()
      ),
      array(
        'type' => 'unit',
        't_abb_name' => 'อัน',
        't_full_name' => 'อัน',
        'e_abb_name' => 'Pcs',
        'e_full_name' => 'Pieces',
        'sub_type' => '0',
        'created_on' => time(),
        'updated_on' => time()
      ),
      array(
        'type' => 'unit',
        't_abb_name' => 'คู่',
        't_full_name' => 'คู่',
        'e_abb_name' => 'Pair',
        'e_full_name' => 'Pair',
        'sub_type' => '0',
        'created_on' => time(),
        'updated_on' => time()
      ),
      array(
        'type' => 'unit',
        't_abb_name' => 'โหล',
        't_full_name' => 'โหล',
        'e_abb_name' => 'Doz',
        'e_full_name' => 'Dozen',
        'sub_type' => '0',
        'created_on' => time(),
        'updated_on' => time()
      ),
      array(
        'type' => 'unit',
        't_abb_name' => 'กุรุส',
        't_full_name' => 'กุรุส',
        'e_abb_name' => 'Gros.',
        'e_full_name' => 'Gross',
        'sub_type' => '0',
        'created_on' => time(),
        'updated_on' => time()
      ),
      array(
        'type' => 'unit',
        't_abb_name' => 'รีม',
        't_full_name' => 'รีม',
        'e_abb_name' => 'Ream',
        'e_full_name' => 'Ream',
        'sub_type' => '0',
        'created_on' => time(),
        'updated_on' => time()
      ),
      array(
        'type' => 'unit',
        't_abb_name' => 'แพ็ค',
        't_full_name' => 'แพ็ค',
        'e_abb_name' => 'Pkg',
        'e_full_name' => 'Package',
        'sub_type' => '0',
        'created_on' => time(),
        'updated_on' => time()
      ),
      array(
        'type' => 'unit',
        't_abb_name' => 'กล',
        't_full_name' => 'กล่อง',
        'e_abb_name' => 'Box',
        'e_full_name' => 'Box',
        'sub_type' => '0',
        'created_on' => time(),
        'updated_on' => time()
      ),
      array(
        'type' => 'unit',
        't_abb_name' => 'ถุง',
        't_full_name' => 'ถุง',
        'e_abb_name' => 'Case',
        'e_full_name' => 'Case',
        'sub_type' => '0',
        'created_on' => time(),
        'updated_on' => time()
      ),
      array(
        'type' => 'unit',
        't_abb_name' => 'เล่ม',
        't_full_name' => 'เล่ม',
        'e_abb_name' => 'Book',
        'e_full_name' => 'Book',
        'sub_type' => '0',
        'created_on' => time(),
        'updated_on' => time()
      ),
      array(
        'type' => 'unit',
        't_abb_name' => 'ขวด',
        't_full_name' => 'ขวด',
        'e_abb_name' => 'Bot',
        'e_full_name' => 'Bottle',
        'sub_type' => '0',
        'created_on' => time(),
        'updated_on' => time()
      ),
      array(
        'type' => 'unit',
        't_abb_name' => 'ตู้',
        't_full_name' => 'ตู้',
        'e_abb_name' => 'Cab',
        'e_full_name' => 'Cabinet',
        'sub_type' => '0',
        'created_on' => time(),
        'updated_on' => time()
      ),
      array(
        'type' => 'unit',
        't_abb_name' => 'กป',
        't_full_name' => 'กระป๋อง',
        'e_abb_name' => 'Can',
        'e_full_name' => 'Can',
        'sub_type' => '0',
        'created_on' => time(),
        'updated_on' => time()
      ),
      array(
        'type' => 'unit',
        't_abb_name' => 'ถ้วย',
        't_full_name' => 'ถ้วย',
        'e_abb_name' => 'Cup',
        'e_full_name' => 'Cup',
        'sub_type' => '0',
        'created_on' => time(),
        'updated_on' => time()
      ),
      array(
        'type' => 'unit',
        't_abb_name' => 'คร',
        't_full_name' => 'เครื่อง',
        'e_abb_name' => 'Set',
        'e_full_name' => 'Set',
        'sub_type' => '0',
        'created_on' => time(),
        'updated_on' => time()
      ),
      array(
        'type' => 'unit',
        't_abb_name' => 'ตัว',
        't_full_name' => 'ตัว',
        'e_abb_name' => 'Pcs',
        'e_full_name' => 'Pieces',
        'sub_type' => '0',
        'created_on' => time(),
        'updated_on' => time()
      ),
      array(
        'type' => 'unit',
        't_abb_name' => 'แผง',
        't_full_name' => 'แผง',
        'e_abb_name' => 'Pcs',
        'e_full_name' => 'Pieces',
        'sub_type' => '0',
        'created_on' => time(),
        'updated_on' => time()
      ),
      array(
        'type' => 'unit',
        't_abb_name' => 'ห่อ',
        't_full_name' => 'ห่อ',
        'e_abb_name' => 'Pack',
        'e_full_name' => 'Pack',
        'sub_type' => '0',
        'created_on' => time(),
        'updated_on' => time()
      ),
      array(
        'type' => 'unit',
        't_abb_name' => 'หล',
        't_full_name' => 'หลอด',
        'e_abb_name' => 'Pcs',
        'e_full_name' => 'Pieces',
        'sub_type' => '0',
        'created_on' => time(),
        'updated_on' => time()
      ),
      array(
        'type' => 'unit',
        't_abb_name' => 'ซม',
        't_full_name' => 'เซนติเมตร',
        'e_abb_name' => 'cm',
        'e_full_name' => 'Centimetre',
        'sub_type' => '1',
        'created_on' => time(),
        'updated_on' => time()
      ),
      array(
        'type' => 'unit',
        't_abb_name' => 'นิ้ว',
        't_full_name' => 'นิ้ว',
        'e_abb_name' => 'in',
        'e_full_name' => 'Inch',
        'sub_type' => '1',
        'created_on' => time(),
        'updated_on' => time()
      ),
      array(
        'type' => 'unit',
        't_abb_name' => 'ฟุต',
        't_full_name' => 'ฟุต',
        'e_abb_name' => 'ft',
        'e_full_name' => 'Foot',
        'sub_type' => '1',
        'created_on' => time(),
        'updated_on' => time()
      ),
      array(
        'type' => 'unit',
        't_abb_name' => 'หลา',
        't_full_name' => 'หลา',
        'e_abb_name' => 'yd',
        'e_full_name' => 'Yard',
        'sub_type' => '1',
        'created_on' => time(),
        'updated_on' => time()
      ),
      array(
        'type' => 'unit',
        't_abb_name' => 'ม',
        't_full_name' => 'เมตร',
        'e_abb_name' => 'm',
        'e_full_name' => 'Metre',
        'sub_type' => '1',
        'created_on' => time(),
        'updated_on' => time()
      ),
      array(
        'type' => 'unit',
        't_abb_name' => 'กม',
        't_full_name' => 'กิโลเมตร',
        'e_abb_name' => 'km',
        'e_full_name' => 'Kilometre',
        'sub_type' => '1',
        'created_on' => time(),
        'updated_on' => time()
      ),
      array(
        'type' => 'unit',
        't_abb_name' => 'ไมล์',
        't_full_name' => 'ไมล์',
        'e_abb_name' => 'mile',
        'e_full_name' => 'Mile',
        'sub_type' => '1',
        'created_on' => time(),
        'updated_on' => time()
      ),
      array(
        'type' => 'unit',
        't_abb_name' => 'มก',
        't_full_name' => 'มิลลิกรัม',
        'e_abb_name' => 'mg',
        'e_full_name' => 'Milligram',
        'sub_type' => '2',
        'created_on' => time(),
        'updated_on' => time()
      ),
      array(
        'type' => 'unit',
        't_abb_name' => 'กรัม',
        't_full_name' => 'กรัม',
        'e_abb_name' => 'g',
        'e_full_name' => 'Gram',
        'sub_type' => '2',
        'created_on' => time(),
        'updated_on' => time()
      ),
      array(
        'type' => 'unit',
        't_abb_name' => 'กม',
        't_full_name' => 'กิโลกรัม',
        'e_abb_name' => 'kg',
        'e_full_name' => 'Kilogram',
        'sub_type' => '2',
        'created_on' => time(),
        'updated_on' => time()
      ),
      array(
        'type' => 'unit',
        't_abb_name' => 'ตัน',
        't_full_name' => 'ตัน',
        'e_abb_name' => 'Ton',
        'e_full_name' => 'Ton',
        'sub_type' => '2',
        'created_on' => time(),
        'updated_on' => time()
      ),
      array(
        'type' => 'unit',
        't_abb_name' => 'ปอนด์',
        't_full_name' => 'ปอนด์',
        'e_abb_name' => 'pd',
        'e_full_name' => 'Pound',
        'sub_type' => '2',
        'created_on' => time(),
        'updated_on' => time()
      ),
      array(
        'type' => 'unit',
        't_abb_name' => 'ออนซ์',
        't_full_name' => 'ออนซ์',
        'e_abb_name' => 'on',
        'e_full_name' => 'Ounce',
        'sub_type' => '2',
        'created_on' => time(),
        'updated_on' => time()
      ),
      array(
        'type' => 'unit',
        't_abb_name' => 'มล',
        't_full_name' => 'มิลลิลิตร',
        'e_abb_name' => 'ml',
        'e_full_name' => 'Millilitre',
        'sub_type' => '2',
        'created_on' => time(),
        'updated_on' => time()
      ),
      array(
        'type' => 'unit',
        't_abb_name' => 'ลิตร',
        't_full_name' => 'ลิตร',
        'e_abb_name' => 'L',
        'e_full_name' => 'Litre',
        'sub_type' => '2',
        'created_on' => time(),
        'updated_on' => time()
      ),
      array(
        'type' => 'unit',
        't_abb_name' => 'ถัง',
        't_full_name' => 'ถัง',
        'e_abb_name' => 'Tank',
        'e_full_name' => 'Tank',
        'sub_type' => '2',
        'created_on' => time(),
        'updated_on' => time()
      ),
      array(
        'type' => 'unit',
        't_abb_name' => 'กส',
        't_full_name' => 'กระสอบ',
        'e_abb_name' => 'Bag',
        'e_full_name' => 'Bag',
        'sub_type' => '2',
        'created_on' => time(),
        'updated_on' => time()
      ),
      array(
        'type' => 'unit',
        't_abb_name' => 'ตรกม',
        't_full_name' => 'ตารางกิโลเมตร',
        'e_abb_name' => 'sqkm',
        'e_full_name' => 'Square Kilometre',
        'sub_type' => '3',
        'created_on' => time(),
        'updated_on' => time()
      ),
      array(
        'type' => 'unit',
        't_abb_name' => 'ตรม',
        't_full_name' => 'ตารางเมตร',
        'e_abb_name' => 'sqm',
        'e_full_name' => 'Square Metre',
        'sub_type' => '3',
        'created_on' => time(),
        'updated_on' => time()
      ),
      array(
        'type' => 'unit',
        't_abb_name' => 'ตรซม',
        't_full_name' => 'ตารางเซนติเมตร',
        'e_abb_name' => 'sqcm',
        'e_full_name' => 'Square Centimetre',
        'sub_type' => '3',
        'created_on' => time(),
        'updated_on' => time()
      ),
      array(
        'type' => 'unit',
        't_abb_name' => 'ชม',
        't_full_name' => 'ชั่วโมง',
        'e_abb_name' => 'hr',
        'e_full_name' => 'Hour',
        'sub_type' => '4',
        'created_on' => time(),
        'updated_on' => time()
      ),
      array(
        'type' => 'unit',
        't_abb_name' => 'นาที',
        't_full_name' => 'นาที',
        'e_abb_name' => 'min',
        'e_full_name' => 'Minute',
        'sub_type' => '4',
        'created_on' => time(),
        'updated_on' => time()
      ),
      array(
        'type' => 'unit',
        't_abb_name' => 'วัน',
        't_full_name' => 'วัน',
        'e_abb_name' => 'Day',
        'e_full_name' => 'Day',
        'sub_type' => '4',
        'created_on' => time(),
        'updated_on' => time()
      ),
      array(
        'type' => 'product_status',
        't_full_name' => 'สินค้าบกพร่อง',
        'e_full_name' => 'Damage',
        'created_on' => time(),
        'updated_on' => time()
      ),
      array(
        'type' => 'product_status',
        't_full_name' => 'สินค้าใกล้หมดอายุ',
        'e_full_name' => 'Nearly Expire',
        'created_on' => time(),
        'updated_on' => time()
      ),  
      array(
        'type' => 'bill_status',
        't_full_name' => 'รายการสินค้าไม่ถูกต้อง',
        'e_full_name' => 'Incorrect Item',
        'created_on' => time(),
        'updated_on' => time()
      ),
      array(
        'type' => 'bill_status',
        't_full_name' => 'บิลมีความบกพร่อง',
        'e_full_name' => 'Receipt an error',
        'created_on' => time(),
        'updated_on' => time()
      ),
      array(
        'type' => 'payment',
        't_full_name' => 'เงินสด',
        'e_full_name' => 'Cash',
        'created_on' => time(),
        'updated_on' => time()
      ),
      array(
        'type' => 'payment',
        't_full_name' => 'เครดิตการ์ด',
        'e_full_name' => 'Credit card',
        'created_on' => time(),
        'updated_on' => time()
      ),
      array(
        'type' => 'table_area',
        'e_abb_name' => 'A',
        'e_full_name' => 'Zone A',
        'value1' => '50',
        'created_on' => time(),
        'updated_on' => time()
      ),
      array(
        'type' => 'table_area',
        'e_abb_name' => 'B',
        'e_full_name' => 'Zone B',
        'value1' => '50',
        'created_on' => time(),
        'updated_on' => time()
      ),
      array(
        'type' => 'table_area',
        'e_abb_name' => 'C',
        'e_full_name' => 'Zone C',
        'value1' => '50',
        'created_on' => time(),
        'updated_on' => time()
      )
    );
    foreach ($data as $d){
      $this->db->insert('variables', $d);
    }
  }
  
  public function down()
  {
    $this->dbforge->drop_table('variables');
  }
}
