<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Migration_Kegiatan extends CI_Migration {
    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
			'judul' => array(
				'type' => 'VARCHAR',
				'constraint' => '200'
			),
			'kapasitas' => array(
				'type' => 'INT'
			),
			'harga_tiket' => array(
				'type' => 'DOUBLE'
			),
			'tanggal' => array(
				'type' => 'DATE'
			),
			'narasumber' => array(
				'type' => 'VARCHAR',
				'constraint' =>'200'
			),
			'tempat' => array(
				'type' => 'VARCHAR',
				'constraint' =>'100'
			),
			'pic' => array(
				'type' => 'VARCHAR',
				'constraint' =>'45'
			),
			'foto_flyer' => array(
				'type' => 'VARCHAR',
				'constraint' => '30'
			),
			'jenis_id' => array(
				'type' => 'INT'
			)
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('kegiatan');
    }
    public function down() {
        $this->dbforge->drop_table('kegiatan');
    }
}
