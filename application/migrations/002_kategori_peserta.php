<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Migration_Kategori_Peserta extends CI_Migration {
    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
			'nama' => array(
				'type' => 'VARCHAR',
				'constraint' => '45'
			)
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('kategori_peserta');
    }
    public function down() {
        $this->dbforge->drop_table('kategori_peserta');
    }
}
