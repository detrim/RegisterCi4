<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePhotoProfile extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'id_user' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true
            ],
            'photo_profile' => [
                'type' => 'TEXT',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
    
        // Add foreign key constraint
        $this->forge->addForeignKey('id_user', 'users', 'id', 'CASCADE', 'CASCADE');
    
        $this->forge->addKey('id', true);
        $this->forge->createTable('photo_profile');
    }
    
    public function down()
    {
        // Drop foreign key constraint first
        $this->forge->dropForeignKey('photo_profile', 'photo_profile_id_user_foreign');
        
        $this->forge->dropTable('photo_profile');
    }
    
}
