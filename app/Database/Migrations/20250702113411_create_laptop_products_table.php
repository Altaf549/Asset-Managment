<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLaptopProductsTable extends Migration
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
            'asset_id' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'serial_number' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'model_name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'manufacturer' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'screen_size' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'ram' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'ram_model' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'ram_fsb' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'ssd' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'hard_disk' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'processor_company' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'processor' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'processor_generation' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'motherboard' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'motherboard_model' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'assigned_to' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'emp_id' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
            'assign_date' => [
                'type' => 'DATE',
                'null' => true,
            ],
            'assign_status' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'default' => 'unassigned',
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

        $this->forge->addKey('id', true);
        $this->forge->createTable('tbl_laptop_product');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_laptop_product');
    }
}
