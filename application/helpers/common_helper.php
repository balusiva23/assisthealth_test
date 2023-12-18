<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('check_field_exists')) {
    /**
     * Check if a field value already exists in a database table.
     *
     * @param string $val The value to check.
     * @param array $data The data to match against in the database table.
     * @param string $table The name of the database table.
     * @return int The number of rows found.
     */
    function check_field_exists($data, $table)
    {
        $CI = &get_instance();
        $CI->db->where($data);
        return $CI->db->get($table)->num_rows();
    }
}
