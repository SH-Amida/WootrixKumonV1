<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

class Category_model extends CI_Model {

    private $_tableName = 'tbl_category';
    private $_id = "";
    private $_category_code = "";
    private $_category_name = "";
    private $_status = "";
    private $_language = "";
    private $_created_date = "";
    private $_token = "";
    private $_language_name = "";

    public function get_language_name() {
        return $this->_language_name;
    }

    public function set_language_name($_language_name) {
        $this->_language_name = $_language_name;
    }

    public function get_token() {
        return $this->_token;
    }

    public function set_token($_token) {
        $this->_token = $_token;
    }

    public function get_tableName() {
        return $this->_tableName;
    }

    public function get_id() {
        return $this->_id;
    }

    public function get_category_code() {
        return $this->_category_code;
    }

    public function get_category_name() {
        return $this->_category_name;
    }

    public function get_status() {
        return $this->_status;
    }

    public function get_language() {
        return $this->_language;
    }

    public function get_created_date() {
        return $this->_created_date;
    }

    public function set_tableName($_tableName) {
        $this->_tableName = $_tableName;
    }

    public function set_id($_id) {
        $this->_id = $_id;
    }

    public function set_category_code($_category_code) {
        $this->_category_code = $_category_code;
    }

    public function set_category_name($_category_name) {
        $this->_category_name = $_category_name;
    }

    public function set_status($_status) {
        $this->_status = $_status;
    }

    public function set_language($_language) {
        $this->_language = $_language;
    }

    public function set_created_date($_created_date) {
        $this->_created_date = $_created_date;
    }

    public function verifyTokenValue() {
        $query = $this->db->select("id")
                ->from("tbl_users")
                ->where("token", $this->get_token())
                ->where("token_expiry_date >=", "NOW()", false)
                ->get();
        //echo $this->db->last_query();die;
        if ($query->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function getTopics() {
        $langName = $this->get_language_name();
        if ($langName == 'en') {
            $catagoryname = 'category_name';
        } else if ($langName == 'po' || $langName == 'pt') {
            $catagoryname = 'category_name_portuguese';
        } else if ($langName == 'es' || $langName == 'sp') {
            $catagoryname = 'category_name_spanish';
        } else {
            $catagoryname = 'category_name';
        }
        $query = $this->db->query("SELECT id,$catagoryname as category_name FROM tbl_category WHERE status='1'
                AND $catagoryname !=''");
        if ($query->num_rows() > 0) {
            $row = $query->result_array();
            return $row;
        } else {
            return FALSE;
        }
    }

    public function getLanguageId() {
        $query = $this->db->select("id")
                ->from("tbl_language")
                ->where("language_code", $this->get_language_name())
                ->get();
        $row = $query->row_array();
        return $row;
    }

}
