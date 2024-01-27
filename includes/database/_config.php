<?php
// File path: wordpress\wp-content\plugins\wp-base-plugin\includes\database\_config.php

// Define dynamic constants for database tables using the mnm_define_dynamic_constant function.
// This configuration specifies the structure of each table required by the plugin.
mnm_define_dynamic_constant(
    // The dynamic constant name, based on the namespace function, to store table structures.
    $mnm_namespace_function . '_tables',
    // Array defining each table and their respective fields with data types.
    array(
        // Define the first table and its structure.
        'table_name' => [
            'id'      => 'INT(11) AUTO_INCREMENT PRIMARY KEY', // Define 'id' as an auto-increment primary key.
            'user_id' => 'INT(11) NOT NULL',                   // Define 'user_id' as an integer, not null.
            // More fields can be added here...
        ],
        // Define additional tables as needed...
        // 'another_table_name' => [
        //     // Table structure for 'another_table_name'...
        // ],
    )
);