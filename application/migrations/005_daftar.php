<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Migration_Daftar extends CI_Migration {
    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
			'tanggal_daftar' => array(
				'type' => 'DATE'
			),
			'alasan' => array(
				'type' => 'VARCHAR',
				'constraint' => '200'
			),
			'user_id' => array(
				'type' => 'INT',
				'unsigned' => TRUE,
			),
			'kegiatan_id' => array(
				'type' => 'INT',
				'unsigned' => TRUE,
			),
			'kategori_peserta_id' => array(
				'type' => 'INT',
				'unsigned' => TRUE,
			),
			'nosertifikat' => array(
				'type' => 'VARCHAR',
				'constraint' => '20'
			)
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('daftar');
		$this->db->query('ALTER TABLE `daftar` ADD FOREIGN KEY(`user_id`) REFERENCES `users`(`id`);');
		$this->db->query('ALTER TABLE `daftar` ADD FOREIGN KEY(`kategori_peserta_id`) REFERENCES `kategori_peserta`(`id`);');
		$this->db->query('ALTER TABLE `daftar` ADD FOREIGN KEY(`kegiatan_id`) REFERENCES `kegiatan`(`id`);');
    }
    public function down() {
        $this->dbforge->drop_table('daftar');
    }
}
