<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Migration_Users extends CI_Migration {
    public function up() {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
			'username' => array(
				'type' => 'VARCHAR',
				'constraint' => '20'
			),
			'password' => array(
                'type' => 'VARCHAR',
                'constraint' => '200',
            ),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => '40',
            ),
			'role' => array(
                'type' => 'VARCHAR',
                'constraint' => '20',
            ),
            'last_login' => array(
                'type' => 'TIMESTAMP'
            ),
			'status' => array(
                'type' => 'SMALLINT'
            ),
    		'created_at datetime default current_timestamp',
    		'updated_at datetime default current_timestamp on update current_timestamp',
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('users');
    }
    public function down() {
        $this->dbforge->drop_table('users');
    }
}
