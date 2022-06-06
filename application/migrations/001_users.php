<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Migration_Users extends CI_Migration {
    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
			'username' => array(
				'type' => 'VARCHAR',
				'constraint' => '20'
			),
			'password' => array(
                'type' => 'VARCHAR',
                'constraint' => '45',
            ),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => '45',
            ),
			'role' => array(
                'type' => 'VARCHAR',
                'constraint' => '20',
            ),
            'last_login' => array(
                'type' => 'DATETIME'
            ),
			'created_at' => array(
                'type' => 'DATETIME'
            ),
			'updated_at' => array(
                'type' => 'DATETIME'
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('users');
    }
    public function down() {
        $this->dbforge->drop_table('users');
    }
}
