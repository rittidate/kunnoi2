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

    $data =array(
        array (
        'code' => 'pd000001',
        't_full_name' => 'ผู้ใหญ่',
        't_abb_name' => 'ผู้ใหญ่',
        'unit_id' => '13',
        'created_on' => time(),
        'updated_on' => time(),
        ),
        array (
        'code' => 'pd000002',
        't_full_name' => 'เด็ก',
        't_abb_name' => 'เด็ก',
        'unit_id' => '13',
        'created_on' => time(),
        'updated_on' => time(),
        ),
        array (
        'code' => 'pd000003',
        't_full_name' => 'น้ำแข็ง (เล็ก)',
        't_abb_name' => 'น้ำแข็ง (เล็ก',
        'unit_id' => '13',
        'created_on' => time(),
        'updated_on' => time(),
        ),
        array (
        'code' => 'pd000004',
        't_full_name' => 'น้ำแข็ง (กลาง)',
        't_abb_name' => 'น้ำแข็ง (กลาง',
        'unit_id' => '13',
        'created_on' => time(),
        'updated_on' => time(),
        ),
        array (
        'code' => 'pd000005',
        't_full_name' => 'น้ำแข็ง (ใหญ่)',
        't_abb_name' => 'น้ำแข็ง (ใหญ่',
        'unit_id' => '13',
        'created_on' => time(),
        'updated_on' => time(),
        ),
        array (
        'code' => 'pd000006',
        't_full_name' => 'น้ำแข็ง (จัมโบ้)',
        't_abb_name' => 'น้ำแข็ง (จัมโ',
        'unit_id' => '13',
        'created_on' => time(),
        'updated_on' => time(),
        ),
        array (
        'code' => 'pd000007',
        't_full_name' => 'Est. (เล็ก)',
        't_abb_name' => 'Est. (เล็ก)',
        'unit_id' => '13',
        'created_on' => time(),
        'updated_on' => time(),
        ),
        array (
        'code' => 'pd000008',
        't_full_name' => 'Est. (ใหญ่)',
        't_abb_name' => 'Est. (ใหญ่)',
        'unit_id' => '13',
        'created_on' => time(),
        'updated_on' => time(),
        ),
        array (
        'code' => 'pd000009',
        't_full_name' => 'น้ำเปล่า',
        't_abb_name' => 'น้ำเปล่า',
        'unit_id' => '13',
        'created_on' => time(),
        'updated_on' => time(),
        ),
        array (
        'code' => 'pd000010',
        't_full_name' => 'โซดา',
        't_abb_name' => 'โซดา',
        'unit_id' => '13',
        'created_on' => time(),
        'updated_on' => time(),
        ),
        array (
        'code' => 'pd000011',
        't_full_name' => 'เบียร์ลีโอ (ขวด)',
        't_abb_name' => 'เบียร์ลีโอ (ข',
        'unit_id' => '13',
        'created_on' => time(),
        'updated_on' => time(),
        ),
        array (
        'code' => 'pd000012',
        't_full_name' => 'เบียร์สิงค์ (ขวด)',
        't_abb_name' => 'เบียร์สิงค์ (',
        'unit_id' => '13',
        'created_on' => time(),
        'updated_on' => time(),
        ),
        array (
        'code' => 'pd000013',
        't_full_name' => 'เบียร์ ไฮเนเก้น (ขวด)',
        't_abb_name' => 'เบียร์ ไฮเนเ�',
        'unit_id' => '13',
        'created_on' => time(),
        'updated_on' => time(),
        ),
        array (
        'code' => 'pd000014',
        't_full_name' => 'เบียร์สด ลีโอ เหยือก',
        't_abb_name' => 'เบียร์สด ลีโ�',
        'unit_id' => '13',
        'created_on' => time(),
        'updated_on' => time(),
        ),
        array (
        'code' => 'pd000015',
        't_full_name' => 'เบียร์สด ลีโอ ทาวเวอร์',
        't_abb_name' => 'เบียร์สด ลีโ�',
        'unit_id' => '13',
        'created_on' => time(),
        'updated_on' => time(),
        ),
        array (
        'code' => 'pd000016',
        't_full_name' => 'เบียร์สด สิงค์ เหยือก',
        't_abb_name' => 'เบียร์สด สิง�',
        'unit_id' => '13',
        'created_on' => time(),
        'updated_on' => time(),
        ),
        array (
        'code' => 'pd000017',
        't_full_name' => 'เบียร์สด สิงค์ ทาวเวอร์ ',
        't_abb_name' => 'เบียร์สด สิง�',
        'unit_id' => '13',
        'created_on' => time(),
        'updated_on' => time(),
        ),
        array (
        'code' => 'pd000018',
        't_full_name' => '100 Piper',
        't_abb_name' => '100 Piper',
        'unit_id' => '13',
        'created_on' => time(),
        'updated_on' => time(),
        ),
        array (
        'code' => 'pd000019',
        't_full_name' => 'Blend 285',
        't_abb_name' => 'Blend 285',
        'unit_id' => '13',
        'created_on' => time(),
        'updated_on' => time(),
        ),
        array (
        'code' => 'pd000020',
        't_full_name' => 'Regency (กลม)',
        't_abb_name' => 'Regency (กลม)',
        'unit_id' => '13',
        'created_on' => time(),
        'updated_on' => time(),
        ),
        array (
        'code' => 'pd000021',
        't_full_name' => 'Regency (แบน)',
        't_abb_name' => 'Regency (แบน)',
        'unit_id' => '13',
        'created_on' => time(),
        'updated_on' => time(),
        ),
        array (
        'code' => 'pd000022',
        't_full_name' => 'แสงโสม (กลม)',
        't_abb_name' => 'แสงโสม (กลม)',
        'unit_id' => '13',
        'created_on' => time(),
        'updated_on' => time(),
        ),
        array (
        'code' => 'pd000023',
        't_full_name' => 'แสงโสม (แบน)',
        't_abb_name' => 'แสงโสม (แบน)',
        'unit_id' => '13',
        'created_on' => time(),
        'updated_on' => time(),
        ),
        array (
        'code' => 'pd000024',
        't_full_name' => 'Spy',
        't_abb_name' => 'Spy',
        'unit_id' => '13',
        'created_on' => time(),
        'updated_on' => time(),
        ),
        array (
        'code' => 'pd000025',
        't_full_name' => 'ค่าเปลี่ยนกระทะ',
        't_abb_name' => 'ค่าเปลี่ยนก�',
        'unit_id' => '13',
        'created_on' => time(),
        'updated_on' => time(),
        ),
        array (
        'code' => 'pd000026',
        't_full_name' => 'ค่าเปิดเหล้า (ต่อขวด)',
        't_abb_name' => 'ค่าเปิดเหล้�',
        'unit_id' => '13',
        'created_on' => time(),
        'updated_on' => time(),
        ),
        array (
        'code' => 'pd000027',
        't_full_name' => 'ผ้าเย็น',
        't_abb_name' => 'ผ้าเย็น',
        'unit_id' => '13',
        'created_on' => time(),
        'updated_on' => time(),
        ),
        array (
        'code' => 'pd000028',
        't_full_name' => 'บุหรี่กรองทิพย์',
        't_abb_name' => 'บุหรี่กรองท�',
        'unit_id' => '13',
        'created_on' => time(),
        'updated_on' => time(),
        ),
        array (
        'code' => 'pd000029',
        't_full_name' => 'บุหรี่สายฝน',
        't_abb_name' => 'บุหรี่สายฝน',
        'unit_id' => '13',
        'created_on' => time(),
        'updated_on' => time(),
        ),
        array (
        'code' => 'pd000030',
        't_full_name' => 'บุหรี่ LM',
        't_abb_name' => 'บุหรี่ LM',
        'unit_id' => '13',
        'created_on' => time(),
        'updated_on' => time(),
        ),
        array (
        'code' => 'pd000031',
        't_full_name' => 'บุหรี่ Marlboro',
        't_abb_name' => 'บุหรี่ Marlboro',
        'unit_id' => '13',
        'created_on' => time(),
        'updated_on' => time(),
        ),
        array (
        'code' => 'pd000032',
        't_full_name' => 'ไฟแช็ค',
        't_abb_name' => 'ไฟแช็ค',
        'unit_id' => '13',
        'created_on' => time(),
        'updated_on' => time(),
        ),
        array (
        'code' => 'pd000033',
        't_full_name' => 'หงษ์ทอง (กลม)',
        't_abb_name' => 'หงษ์ทอง (กลม)',
        'unit_id' => '13',
        'created_on' => time(),
        'updated_on' => time(),
        ),
        array (
        'code' => 'pd000034',
        't_full_name' => 'หงษ์ทอง (แบน)',
        't_abb_name' => 'หงษ์ทอง (แบน)',
        'unit_id' => '13',
        'created_on' => time(),
        'updated_on' => time(),
        ),
        array (
        'code' => 'pd000035',
        't_full_name' => 'ค่าเปิดสปาย (ต่อขวด)',
        't_abb_name' => 'ค่าเปิดสปาย (',
        'unit_id' => '13',
        'created_on' => time(),
        'updated_on' => time(),
        ),
        array (
        'code' => 'pd000036',
        't_full_name' => 'ASAHI',
        't_abb_name' => 'ASAHI',
        'unit_id' => '13',
        'created_on' => time(),
        'updated_on' => time(),
        ),
        array (
        'code' => 'pd000037',
        't_full_name' => 'ASAHI Tower',
        't_abb_name' => 'ASAHI Tower',
        'unit_id' => '13',
        'created_on' => time(),
        'updated_on' => time(),
        ),
        array (
        'code' => 'pd000038',
        't_full_name' => 'Red Label',
        't_abb_name' => 'Red Label',
        'unit_id' => '13',
        'created_on' => time(),
        'updated_on' => time(),
        ),
        array (
        'code' => 'pd000039',
        't_full_name' => 'เหล้า Spirits 8',
        't_abb_name' => 'เหล้า Spirits 8',
        'unit_id' => '13',
        'created_on' => time(),
        'updated_on' => time(),
        ),
        array (
        'code' => 'pd000041',
        't_full_name' => 'ค่าเปิดเบียร์',
        't_abb_name' => 'ค่าเปิดเบีย�',
        'unit_id' => '13',
        'created_on' => time(),
        'updated_on' => time(),
        ),
        array (
        'code' => 'pd000042',
        't_full_name' => 'น้ำแข็ง (แก้ว)',
        't_abb_name' => 'น้ำแข็ง (แก้ว',
        'unit_id' => '13',
        'created_on' => time(),
        'updated_on' => time(),
        ),
        array (
        'code' => 'pd000043',
        't_full_name' => 'เบียร์ช้าง (ขวด)',
        't_abb_name' => 'เบียร์ช้าง (ข',
        'unit_id' => '13',
        'created_on' => time(),
        'updated_on' => time(),
        ),
         array (
        'code' => 'pd000044',
        't_full_name' => 'Black Label ',
        't_abb_name' => 'Black Label ',
        'unit_id' => '13',
        'created_on' => time(),
        'updated_on' => time(),
        ),

      );

    foreach ($data as $d){
      $this->db->insert('mp_products', $d);
    }

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

    $data = array(
        array (
          'price1' => '15900',
          'barcode' => 'pd000001',
          'mp_id' => '1',
          'unit_id' => '13',
          'created_on' => time(),
          'updated_on' => time(),
          ),
          array (
          'price1' => '9900',
          'barcode' => 'pd000002',
          'mp_id' => '2',
          'unit_id' => '13',
          'created_on' => time(),
          'updated_on' => time(),
          ),
          array (
          'price1' => '4000',
          'barcode' => 'pd000003',
          'mp_id' => '3',
          'unit_id' => '13',
          'created_on' => time(),
          'updated_on' => time(),
          ),
          array (
          'price1' => '8000',
          'barcode' => 'pd000004',
          'mp_id' => '4',
          'unit_id' => '13',
          'created_on' => time(),
          'updated_on' => time(),
          ),
          array (
          'price1' => '10000',
          'barcode' => 'pd000005',
          'mp_id' => '5',
          'unit_id' => '13',
          'created_on' => time(),
          'updated_on' => time(),
          ),
          array (
          'price1' => '10000',
          'barcode' => 'pd000006',
          'mp_id' => '6',
          'unit_id' => '13',
          'created_on' => time(),
          'updated_on' => time(),
          ),
          array (
          'price1' => '2000',
          'barcode' => 'pd000007',
          'mp_id' => '7',
          'unit_id' => '13',
          'created_on' => time(),
          'updated_on' => time(),
          ),
          array (
          'price1' => '6000',
          'barcode' => 'pd000008',
          'mp_id' => '8',
          'unit_id' => '13',
          'created_on' => time(),
          'updated_on' => time(),
          ),
          array (
          'price1' => '2000',
          'barcode' => 'pd000009',
          'mp_id' => '9',
          'unit_id' => '13',
          'created_on' => time(),
          'updated_on' => time(),
          ),
          array (
          'price1' => '2000',
          'barcode' => 'pd000010',
          'mp_id' => '10',
          'unit_id' => '13',
          'created_on' => time(),
          'updated_on' => time(),
          ),
          array (
          'price1' => '8500',
          'barcode' => 'pd000011',
          'mp_id' => '11',
          'unit_id' => '13',
          'created_on' => time(),
          'updated_on' => time(),
          ),
          array (
          'price1' => '10000',
          'barcode' => 'pd000012',
          'mp_id' => '12',
          'unit_id' => '13',
          'created_on' => time(),
          'updated_on' => time(),
          ),
          array (
          'price1' => '11000',
          'barcode' => 'pd000013',
          'mp_id' => '13',
          'unit_id' => '13',
          'created_on' => time(),
          'updated_on' => time(),
          ),
          array (
          'price1' => '14000',
          'barcode' => 'pd000014',
          'mp_id' => '14',
          'unit_id' => '13',
          'created_on' => time(),
          'updated_on' => time(),
          ),
          array (
          'price1' => '40000',
          'barcode' => 'pd000015',
          'mp_id' => '15',
          'unit_id' => '13',
          'created_on' => time(),
          'updated_on' => time(),
          ),
          array (
          'price1' => '16000',
          'barcode' => 'pd000016',
          'mp_id' => '16',
          'unit_id' => '13',
          'created_on' => time(),
          'updated_on' => time(),
          ),
          array (
          'price1' => '45000',
          'barcode' => 'pd000017',
          'mp_id' => '17',
          'unit_id' => '13',
          'created_on' => time(),
          'updated_on' => time(),
          ),
          array (
          'price1' => '43000',
          'barcode' => 'pd000018',
          'mp_id' => '18',
          'unit_id' => '13',
          'created_on' => time(),
          'updated_on' => time(),
          ),
          array (
          'price1' => '33000',
          'barcode' => 'pd000019',
          'mp_id' => '19',
          'unit_id' => '13',
          'created_on' => time(),
          'updated_on' => time(),
          ),
          array (
          'price1' => '66000',
          'barcode' => 'pd000020',
          'mp_id' => '20',
          'unit_id' => '13',
          'created_on' => time(),
          'updated_on' => time(),
          ),
          array (
          'price1' => '33000',
          'barcode' => 'pd000021',
          'mp_id' => '21',
          'unit_id' => '13',
          'created_on' => time(),
          'updated_on' => time(),
          ),
          array (
          'price1' => '33000',
          'barcode' => 'pd000022',
          'mp_id' => '22',
          'unit_id' => '13',
          'created_on' => time(),
          'updated_on' => time(),
          ),
          array (
          'price1' => '16500',
          'barcode' => 'pd000023',
          'mp_id' => '23',
          'unit_id' => '13',
          'created_on' => time(),
          'updated_on' => time(),
          ),
          array (
          'price1' => '5500',
          'barcode' => 'pd000024',
          'mp_id' => '24',
          'unit_id' => '13',
          'created_on' => time(),
          'updated_on' => time(),
          ),
          array (
          'price1' => '2000',
          'barcode' => 'pd000025',
          'mp_id' => '25',
          'unit_id' => '13',
          'created_on' => time(),
          'updated_on' => time(),
          ),
          array (
          'price1' => '5000',
          'barcode' => 'pd000026',
          'mp_id' => '26',
          'unit_id' => '13',
          'created_on' => time(),
          'updated_on' => time(),
          ),
          array (
          'price1' => '1500',
          'barcode' => 'pd000027',
          'mp_id' => '27',
          'unit_id' => '13',
          'created_on' => time(),
          'updated_on' => time(),
          ),
          array (
          'price1' => '10000',
          'barcode' => 'pd000028',
          'mp_id' => '28',
          'unit_id' => '13',
          'created_on' => time(),
          'updated_on' => time(),
          ),
          array (
          'price1' => '10000',
          'barcode' => 'pd000029',
          'mp_id' => '29',
          'unit_id' => '13',
          'created_on' => time(),
          'updated_on' => time(),
          ),
          array (
          'price1' => '10000',
          'barcode' => 'pd000030',
          'mp_id' => '30',
          'unit_id' => '13',
          'created_on' => time(),
          'updated_on' => time(),
          ),
          array (
          'price1' => '13000',
          'barcode' => 'pd000031',
          'mp_id' => '31',
          'unit_id' => '13',
          'created_on' => time(),
          'updated_on' => time(),
          ),
          array (
          'price1' => '1500',
          'barcode' => 'pd000032',
          'mp_id' => '32',
          'unit_id' => '13',
          'created_on' => time(),
          'updated_on' => time(),
          ),
          array (
          'price1' => '38000',
          'barcode' => 'pd000033',
          'mp_id' => '33',
          'unit_id' => '13',
          'created_on' => time(),
          'updated_on' => time(),
          ),
          array (
          'price1' => '16000',
          'barcode' => 'pd000034',
          'mp_id' => '34',
          'unit_id' => '13',
          'created_on' => time(),
          'updated_on' => time(),
          ),
          array (
          'price1' => '2000',
          'barcode' => 'pd000035',
          'mp_id' => '35',
          'unit_id' => '13',
          'created_on' => time(),
          'updated_on' => time(),
          ),
          array (
          'price1' => '10000',
          'barcode' => 'pd000036',
          'mp_id' => '36',
          'unit_id' => '13',
          'created_on' => time(),
          'updated_on' => time(),
          ),
          array (
          'price1' => '39000',
          'barcode' => 'pd000037',
          'mp_id' => '37',
          'unit_id' => '13',
          'created_on' => time(),
          'updated_on' => time(),
          ),
          array (
          'price1' => '100000',
          'barcode' => 'pd000038',
          'mp_id' => '38',
          'unit_id' => '13',
          'created_on' => time(),
          'updated_on' => time(),
          ),
          array (
          'price1' => '28000',
          'barcode' => 'pd000039',
          'mp_id' => '39',
          'unit_id' => '13',
          'created_on' => time(),
          'updated_on' => time(),
          ),
          array (
          'price1' => '2000',
          'barcode' => 'pd000041',
          'mp_id' => '41',
          'unit_id' => '13',
          'created_on' => time(),
          'updated_on' => time(),
          ),
          array (
          'price1' => '500',
          'barcode' => 'pd000042',
          'mp_id' => '42',
          'unit_id' => '13',
          'created_on' => time(),
          'updated_on' => time(),
          ),
          array (
          'price1' => '8500',
          'barcode' => 'pd000043',
          'mp_id' => '43',
          'unit_id' => '13',
          'created_on' => time(),
          'updated_on' => time(),
          ),
          array (
          'price1' => '149000',
          'barcode' => 'pd000044',
          'mp_id' => '44',
          'unit_id' => '13',
          'created_on' => time(),
          'updated_on' => time(),
          ),
      );
    foreach ($data as $d){
      $this->db->insert('mp_barcodes', $d);
    }
  }
  
  public function down()
  {
    $this->dbforge->drop_table('mp_products');
    $this->dbforge->drop_table('mp_barcodes');
  }
}
