<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_mas_lu extends CI_Migration {
	public function up()
	{
		$this->dbforge->drop_table('mas_lu', TRUE);

		// Table structure for table 'login_attempts'
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'MEDIUMINT',
				'constraint' => '11',
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'ParentId' => array(
				'type' => 'INT',
				'unsigned' => TRUE,
				'null' => TRUE
			),
			'LUType' => array(
				'type' => 'INT',
				'unsigned' => TRUE,
				'null' => FALSE
			),
			'RowNo' => array(
				'type' => 'INT',
				'constraint' => '11',
				'unsigned' => TRUE,
				'null' => TRUE
			),
			'LUCode' => array(
				'type' => 'VARCHAR',
				'constraint' => '10',
				'null' => TRUE
			),
			'TLUName' => array(
				'type' => 'VARCHAR',
				'constraint' => '20',
				'null' => TRUE
			),
			'TFullName' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => TRUE
			),
			'ELUName' => array(
				'type' => 'VARCHAR',
				'constraint' => '20',
				'null' => TRUE
			),
			'EFullName' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
				'null' => TRUE
			),
			'SystemId' => array(
				'type' => 'INT',
				'constraint' => '11',
				'unsigned' => TRUE,
				'null' => TRUE
			),
			'SubType' => array(
				'type' => 'INT',
				'constraint' => '11',
				'unsigned' => TRUE,
				'null' => TRUE
			),
			'ADecimal1' => array(
				'type' => 'DECIMAL',
				'constraint' => '15,4',
				'null' => TRUE
			),
			'ADecimal2' => array(
				'type' => 'DECIMAL',
				'constraint' => '15,4',
				'null' => TRUE
			),
			'AVarchar1' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
				'null' => TRUE
			),
			'AVarchar2' => array(
				'type' => 'VARCHAR',
				'constraint' => '255',
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
		$this->dbforge->create_table('mas_lu');
		// Dumping data for table 'users_groups'
		$now = date('Y-m-d H:i:s');
		$data =array(
			array(
				'LUType' => '8002',
				'TFullName' => 'ธนบัตรใบละ 1000',
				'EFullName' => 'Bank 1000',
				'ADecimal1' => '1000.0000',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			array(
				'LUType' => '8002',
				'TFullName' => 'ธนบัตรใบละ 500',
				'EFullName' => 'Bank 500',
				'ADecimal1' => '500.0000',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			array(
				'LUType' => '8002',
				'TFullName' => 'ธนบัตรใบละ 100',
				'EFullName' => 'Bank 100',
				'ADecimal1' => '100.0000',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			array(
				'LUType' => '8002',
				'TFullName' => 'ธนบัตรใบละ 50',
				'EFullName' => 'Bank 50',
				'ADecimal1' => '50.0000',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			array(
				'LUType' => '8002',
				'TFullName' => 'ธนบัตรใบละ 20',
				'EFullName' => 'Bank 20',
				'ADecimal1' => '20.0000',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			array(
				'LUType' => '8002',
				'TFullName' => 'ธนบัตรใบละ 10',
				'EFullName' => 'Bank 10',
				'ADecimal1' => '10.0000',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			array(
				'LUType' => '8002',
				'TFullName' => 'เหรียญ 10',
				'EFullName' => 'Coin 10',
				'ADecimal1' => '10.0000',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			array(
				'LUType' => '8002',
				'TFullName' => 'เหรียญ 5',
				'EFullName' => 'Coin 5',
				'ADecimal1' => '5.0000',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			array(
				'LUType' => '8002',
				'TFullName' => 'เหรียญ 2',
				'EFullName' => 'Coin 2',
				'ADecimal1' => '2.0000',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			array(
				'LUType' => '8002',
				'TFullName' => 'เหรียญ 1',
				'EFullName' => 'Coin 1',
				'ADecimal1' => '1.0000',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			array(
				'LUType' => '8002',
				'TFullName' => 'เหรียญ 50 สต.',
				'EFullName' => 'Coin 50 st.',
				'ADecimal1' => '0.5000',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			array(
				'LUType' => '8002',
				'TFullName' => 'เหรียญ 25 สต.',
				'EFullName' => 'Coin 25 st.',
				'ADecimal1' => '0.2500',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			//credit card type
			array(
				'LUType' => '8001',
				'LUCode' => '01',
				'TLUName' => 'วีซ่า',
				'TFullName' => 'วีซ่า',
				'ELUName' => 'VISA',
				'EFullName' => 'Visa',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			array(
				'LUType' => '8001',
				'LUCode' => '02',
				'TLUName' => 'มาสเตอร์',
				'TFullName' => 'มาสเตอร์ การ์ด',
				'ELUName' => 'MASTER',
				'EFullName' => 'Master Card',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			array(
				'LUType' => '8001',
				'LUCode' => '03',
				'TLUName' => 'เอเม็ก',
				'TFullName' => 'อเมริกัน เอกซ์เพรช',
				'ELUName' => 'AMEX',
				'EFullName' => 'American Express',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			array(
				'LUType' => '8001',
				'LUCode' => '04',
				'TLUName' => 'ดินเนอร์',
				'TFullName' => 'ดินเนอร์ คลับ',
				'ELUName' => 'DINER',
				'EFullName' => 'Dinners Club',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			array(
				'LUType' => '8001',
				'LUCode' => '05',
				'TLUName' => 'เจซีบี',
				'TFullName' => 'เจซีบี',
				'ELUName' => 'JCB',
				'EFullName' => 'JCB',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),	
			array(
				'LUType' => '8001',
				'LUCode' => '06',
				'TLUName' => 'ทีเอสซี',
				'TFullName' => 'ไทยสมาร์ทการ์ด',
				'ELUName' => 'TSC',
				'EFullName' => 'Thai Smart Card',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			//unit
			array(
				'LUType' => '5003',
				'TLUName' => 'ชิ้น',
				'TFullName' => 'ชิ้น',
				'ELUName' => 'Pcs',
				'EFullName' => 'Pieces',
				'SubType' => '0',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			array(
				'LUType' => '5003',
				'TLUName' => 'ชุด',
				'TFullName' => 'ชุด',
				'ELUName' => 'Set',
				'EFullName' => 'Set',
				'SubType' => '0',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			array(
				'LUType' => '5003',
				'TLUName' => 'ครั้ง',
				'TFullName' => 'ครั้ง',
				'ELUName' => 'Time',
				'EFullName' => 'Time',
				'SubType' => '0',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			array(
				'LUType' => '5003',
				'TLUName' => 'อัน',
				'TFullName' => 'อัน',
				'ELUName' => 'Pcs',
				'EFullName' => 'Pieces',
				'SubType' => '0',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			array(
				'LUType' => '5003',
				'TLUName' => 'คู่',
				'TFullName' => 'คู่',
				'ELUName' => 'Pair',
				'EFullName' => 'Pair',
				'SubType' => '0',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			array(
				'LUType' => '5003',
				'TLUName' => 'โหล',
				'TFullName' => 'โหล',
				'ELUName' => 'Doz',
				'EFullName' => 'Dozen',
				'SubType' => '0',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			array(
				'LUType' => '5003',
				'TLUName' => 'กุรุส',
				'TFullName' => 'กุรุส',
				'ELUName' => 'Gros.',
				'EFullName' => 'Gross',
				'SubType' => '0',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			array(
				'LUType' => '5003',
				'TLUName' => 'รีม',
				'TFullName' => 'รีม',
				'ELUName' => 'Ream',
				'EFullName' => 'Ream',
				'SubType' => '0',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			array(
				'LUType' => '5003',
				'TLUName' => 'แพ็ค',
				'TFullName' => 'แพ็ค',
				'ELUName' => 'Pkg',
				'EFullName' => 'Package',
				'SubType' => '0',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			array(
				'LUType' => '5003',
				'TLUName' => 'กล',
				'TFullName' => 'กล่อง',
				'ELUName' => 'Box',
				'EFullName' => 'Box',
				'SubType' => '0',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			array(
				'LUType' => '5003',
				'TLUName' => 'ถุง',
				'TFullName' => 'ถุง',
				'ELUName' => 'Case',
				'EFullName' => 'Case',
				'SubType' => '0',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			array(
				'LUType' => '5003',
				'TLUName' => 'เล่ม',
				'TFullName' => 'เล่ม',
				'ELUName' => 'Book',
				'EFullName' => 'Book',
				'SubType' => '0',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			array(
				'LUType' => '5003',
				'TLUName' => 'ขวด',
				'TFullName' => 'ขวด',
				'ELUName' => 'Bot',
				'EFullName' => 'Bottle',
				'SubType' => '0',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			array(
				'LUType' => '5003',
				'TLUName' => 'ตู้',
				'TFullName' => 'ตู้',
				'ELUName' => 'Cab',
				'EFullName' => 'Cabinet',
				'SubType' => '0',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			array(
				'LUType' => '5003',
				'TLUName' => 'กป',
				'TFullName' => 'กระป๋อง',
				'ELUName' => 'Can',
				'EFullName' => 'Can',
				'SubType' => '0',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			array(
				'LUType' => '5003',
				'TLUName' => 'ถ้วย',
				'TFullName' => 'ถ้วย',
				'ELUName' => 'Cup',
				'EFullName' => 'Cup',
				'SubType' => '0',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			array(
				'LUType' => '5003',
				'TLUName' => 'คร',
				'TFullName' => 'เครื่อง',
				'ELUName' => 'Set',
				'EFullName' => 'Set',
				'SubType' => '0',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			array(
				'LUType' => '5003',
				'TLUName' => 'ตัว',
				'TFullName' => 'ตัว',
				'ELUName' => 'Pcs',
				'EFullName' => 'Pieces',
				'SubType' => '0',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			array(
				'LUType' => '5003',
				'TLUName' => 'แผง',
				'TFullName' => 'แผง',
				'ELUName' => 'Pcs',
				'EFullName' => 'Pieces',
				'SubType' => '0',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			array(
				'LUType' => '5003',
				'TLUName' => 'ห่อ',
				'TFullName' => 'ห่อ',
				'ELUName' => 'Pack',
				'EFullName' => 'Pack',
				'SubType' => '0',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			array(
				'LUType' => '5003',
				'TLUName' => 'หล',
				'TFullName' => 'หลอด',
				'ELUName' => 'Pcs',
				'EFullName' => 'Pieces',
				'SubType' => '0',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			array(
				'LUType' => '5003',
				'TLUName' => 'ซม',
				'TFullName' => 'เซนติเมตร',
				'ELUName' => 'cm',
				'EFullName' => 'Centimetre',
				'SubType' => '1',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			array(
				'LUType' => '5003',
				'TLUName' => 'นิ้ว',
				'TFullName' => 'นิ้ว',
				'ELUName' => 'in',
				'EFullName' => 'Inch',
				'SubType' => '1',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			array(
				'LUType' => '5003',
				'TLUName' => 'ฟุต',
				'TFullName' => 'ฟุต',
				'ELUName' => 'ft',
				'EFullName' => 'Foot',
				'SubType' => '1',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			array(
				'LUType' => '5003',
				'TLUName' => 'หลา',
				'TFullName' => 'หลา',
				'ELUName' => 'yd',
				'EFullName' => 'Yard',
				'SubType' => '1',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			array(
				'LUType' => '5003',
				'TLUName' => 'ม',
				'TFullName' => 'เมตร',
				'ELUName' => 'm',
				'EFullName' => 'Metre',
				'SubType' => '1',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			array(
				'LUType' => '5003',
				'TLUName' => 'กม',
				'TFullName' => 'กิโลเมตร',
				'ELUName' => 'km',
				'EFullName' => 'Kilometre',
				'SubType' => '1',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			array(
				'LUType' => '5003',
				'TLUName' => 'ไมล์',
				'TFullName' => 'ไมล์',
				'ELUName' => 'mile',
				'EFullName' => 'Mile',
				'SubType' => '1',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			array(
				'LUType' => '5003',
				'TLUName' => 'มก',
				'TFullName' => 'มิลลิกรัม',
				'ELUName' => 'mg',
				'EFullName' => 'Milligram',
				'SubType' => '2',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			array(
				'LUType' => '5003',
				'TLUName' => 'กรัม',
				'TFullName' => 'กรัม',
				'ELUName' => 'g',
				'EFullName' => 'Gram',
				'SubType' => '2',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			array(
				'LUType' => '5003',
				'TLUName' => 'กม',
				'TFullName' => 'กิโลกรัม',
				'ELUName' => 'kg',
				'EFullName' => 'Kilogram',
				'SubType' => '2',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			array(
				'LUType' => '5003',
				'TLUName' => 'ตัน',
				'TFullName' => 'ตัน',
				'ELUName' => 'Ton',
				'EFullName' => 'Ton',
				'SubType' => '2',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			array(
				'LUType' => '5003',
				'TLUName' => 'ปอนด์',
				'TFullName' => 'ปอนด์',
				'ELUName' => 'pd',
				'EFullName' => 'Pound',
				'SubType' => '2',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			array(
				'LUType' => '5003',
				'TLUName' => 'ออนซ์',
				'TFullName' => 'ออนซ์',
				'ELUName' => 'on',
				'EFullName' => 'Ounce',
				'SubType' => '2',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			array(
				'LUType' => '5003',
				'TLUName' => 'มล',
				'TFullName' => 'มิลลิลิตร',
				'ELUName' => 'ml',
				'EFullName' => 'Millilitre',
				'SubType' => '2',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			array(
				'LUType' => '5003',
				'TLUName' => 'ลิตร',
				'TFullName' => 'ลิตร',
				'ELUName' => 'L',
				'EFullName' => 'Litre',
				'SubType' => '2',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			array(
				'LUType' => '5003',
				'TLUName' => 'ถัง',
				'TFullName' => 'ถัง',
				'ELUName' => 'Tank',
				'EFullName' => 'Tank',
				'SubType' => '2',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			array(
				'LUType' => '5003',
				'TLUName' => 'กส',
				'TFullName' => 'กระสอบ',
				'ELUName' => 'Bag',
				'EFullName' => 'Bag',
				'SubType' => '2',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			array(
				'LUType' => '5003',
				'TLUName' => 'ตรกม',
				'TFullName' => 'ตารางกิโลเมตร',
				'ELUName' => 'sqkm',
				'EFullName' => 'Square Kilometre',
				'SubType' => '3',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			array(
				'LUType' => '5003',
				'TLUName' => 'ตรม',
				'TFullName' => 'ตารางเมตร',
				'ELUName' => 'sqm',
				'EFullName' => 'Square Metre',
				'SubType' => '3',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			array(
				'LUType' => '5003',
				'TLUName' => 'ตรซม',
				'TFullName' => 'ตารางเซนติเมตร',
				'ELUName' => 'sqcm',
				'EFullName' => 'Square Centimetre',
				'SubType' => '3',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			array(
				'LUType' => '5003',
				'TLUName' => 'ชม',
				'TFullName' => 'ชั่วโมง',
				'ELUName' => 'hr',
				'EFullName' => 'Hour',
				'SubType' => '4',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			array(
				'LUType' => '5003',
				'TLUName' => 'นาที',
				'TFullName' => 'นาที',
				'ELUName' => 'min',
				'EFullName' => 'Minute',
				'SubType' => '4',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			array(
				'LUType' => '5003',
				'TLUName' => 'วัน',
				'TFullName' => 'วัน',
				'ELUName' => 'Day',
				'EFullName' => 'Day',
				'SubType' => '4',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			array(
				'LUType' => '8101',
				'TFullName' => 'สินค้าบกพร่อง',
				'EFullName' => 'Damage',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			array(
				'LUType' => '8101',
				'TFullName' => 'สินค้าใกล้หมดอายุ',
				'EFullName' => 'Nearly Expire',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),	
			array(
				'LUType' => '8102',
				'TFullName' => 'รายการสินค้าไม่ถูกต้อง',
				'EFullName' => 'Incorrect Item',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			array(
				'LUType' => '8102',
				'TFullName' => 'บิลมีความบกพร่อง',
				'EFullName' => 'Receipt an error',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			array(
				'LUType' => '9001',
				'TFullName' => 'เงินสด',
				'EFullName' => 'Cash',
				'CreateDt' => $now,
				'UpdateDt' => $now
			),
			array(
				'LUType' => '9001',
				'TFullName' => 'เครดิตการ์ด',
				'EFullName' => 'Credit card',
				'CreateDt' => $now,
				'UpdateDt' => $now
			)
		);
		foreach ($data as $d){
			$this->db->insert('mas_lu', $d);
		}
	}
	
	public function down()
	{
		$this->dbforge->drop_table('mas_lu');
	}
}