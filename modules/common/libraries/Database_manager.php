<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Database_manager
{

    protected $CI;

    public function __construct()
    {
        // Get CodeIgniter instance
        $this->CI =& get_instance();
        // Load the dbforge library
        $this->CI->load->dbforge();
    }

    /**
     * Create a new table
     *
     * @param string $table_name The name of the table to create
     * @param array $fields Array of fields to be created in the table
     * @param string $primary_key The primary key field
     * @return bool Success or failure
     */
    public function create_table($table_name, $fields, $primary_key = NULL)
    {
        // Check if table already exists
        if ($this->CI->db->table_exists($table_name)) {
            return FALSE; // Table already exists
        }

        // Add fields to the table
        $this->CI->dbforge->add_field($fields);

        // Add primary key if provided
        if ($primary_key) {
            $this->CI->dbforge->add_key($primary_key, TRUE);
        }

        // Create the table
        return $this->CI->dbforge->create_table($table_name);
    }

    /**
     * Delete an existing table
     *
     * @param string $table_name The name of the table to delete
     * @return bool Success or failure
     */
    public function delete_table($table_name)
    {
        if (!$this->CI->db->table_exists($table_name)) {
            return FALSE; // Table does not exist
        }

        // Drop the table
        return $this->CI->dbforge->drop_table($table_name);
    }

    /**
     * Add a new field to an existing table
     *
     * @param string $table_name The name of the table
     * @param array $fields Array of fields to be added
     * @return bool Success or failure
     */
    public function add_field($table_name, $fields)
    {
        if (!$this->CI->db->table_exists($table_name)) {
            return FALSE; // Table does not exist
        }

        // Add field to the table
        return $this->CI->dbforge->add_column($table_name, $fields);
    }

    /**
     * Modify an existing field in a table
     *
     * @param string $table_name The name of the table
     * @param array $fields Array of fields with modifications
     * @return bool Success or failure
     */
    public function modify_field($table_name, $fields)
    {
        if (!$this->CI->db->table_exists($table_name)) {
            return FALSE; // Table does not exist
        }

        // Modify the field
        return $this->CI->dbforge->modify_column($table_name, $fields);
    }

    /**
     * Drop a field from an existing table
     *
     * @param string $table_name The name of the table
     * @param string $field_name The name of the field to drop
     * @return bool Success or failure
     */
    public function drop_field($table_name, $field_name)
    {
        if (!$this->CI->db->table_exists($table_name)) {
            return FALSE; // Table does not exist
        }

        // Drop field from the table
        return $this->CI->dbforge->drop_column($table_name, $field_name);
    }

    /**
     * Check if a field exists in a table
     *
     * @param string $table_name The name of the table
     * @param string $field_name The name of the field
     * @return bool Field exists or not
     */
    public function field_exists($table_name, $field_name)
    {
        if (!$this->CI->db->table_exists($table_name)) {
            return FALSE; // Table does not exist
        }

        // Get the list of fields in the table
        $fields = $this->CI->db->list_fields($table_name);
        return in_array($field_name, $fields);
    }

    /**
     * Check if a table exists
     *
     * @param string $table_name The name of the table
     * @return bool Table exists or not
     */
    public function table_exists($table_name)
    {
        return $this->CI->db->table_exists($table_name);
    }

    /**
     * Rename an existing table
     *
     * @param string $old_name The current table name
     * @param string $new_name The new table name
     * @return bool Success or failure
     */
    public function rename_table($old_name, $new_name)
    {
        if (!$this->CI->db->table_exists($old_name)) {
            return FALSE; // Old table does not exist
        }

        $this->CI->db->query("RENAME TABLE `{$old_name}` TO `{$new_name}`");
        return $this->CI->db->table_exists($new_name);
    }

    /**
     * Rename a field in an existing table
     *
     * @param string $table_name The name of the table
     * @param string $old_field_name The current field name
     * @param string $new_field_name The new field name
     * @param array $attributes Optional field attributes
     * @return bool Success or failure
     */
    public function rename_field($table_name, $old_field_name, $new_field_name, $attributes = array())
    {
        if (!$this->CI->db->table_exists($table_name)) {
            return FALSE; // Table does not exist
        }

        // Check if the old field exists
        if (!$this->field_exists($table_name, $old_field_name)) {
            return FALSE; // Old field does not exist
        }

        // Construct the query
        $sql = "ALTER TABLE `{$table_name}` CHANGE `{$old_field_name}` `{$new_field_name}`";
        if (!empty($attributes)) {
            $sql .= ' ' . $this->CI->db->field_data($attributes);
        }
        $this->CI->db->query($sql);
        return $this->field_exists($table_name, $new_field_name);
    }

    /**
     * Add a timestamp field to an existing table
     *
     * @param string $table_name The name of the table
     * @param string $field_name The name of the timestamp field
     * @param string $default Default value for the timestamp field
     * @return bool Success or failure
     */
    public function add_timestamp_field($table_name, $field_name, $default = NULL)
    {
        if (!$this->CI->db->table_exists($table_name)) {
            return FALSE; // Table does not exist
        }

        // Define the timestamp field
        $fields = array(
            $field_name => array(
                'type' => 'TIMESTAMP',
                'default' => $default
            )
        );

        // Add the field to the table
        return $this->CI->dbforge->add_column($table_name, $fields);
    }

    /**
     * Modify a timestamp field in a table
     *
     * @param string $table_name The name of the table
     * @param string $field_name The name of the timestamp field
     * @param string $default New default value for the timestamp field
     * @return bool Success or failure
     */
    public function modify_timestamp_field($table_name, $field_name, $default = NULL)
    {
        if (!$this->CI->db->table_exists($table_name)) {
            return FALSE; // Table does not exist
        }

        // Define the modified timestamp field
        $fields = array(
            $field_name => array(
                'name' => $field_name,
                'type' => 'TIMESTAMP',
                'default' => $default
            )
        );

        // Modify the field in the table
        return $this->CI->dbforge->modify_column($table_name, $fields);
    }

    /**
     * Drop a timestamp field from an existing table
     *
     * @param string $table_name The name of the table
     * @param string $field_name The name of the timestamp field to drop
     * @return bool Success or failure
     */
    public function drop_timestamp_field($table_name, $field_name)
    {
        if (!$this->CI->db->table_exists($table_name)) {
            return FALSE; // Table does not exist
        }

        // Drop the field from the table
        return $this->CI->dbforge->drop_column($table_name, $field_name);
    }
}
