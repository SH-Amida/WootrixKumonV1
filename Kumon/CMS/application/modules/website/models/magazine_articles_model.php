<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');

class magazine_articles_model extends CI_Model {
        
    private $_tableName = 'tbl_magazine_articles';
    private $_id = "";
    private $_title = "";
    private $_author = "";
    private $_description = "";
    private $_description_without_html = "";
    private $_article_link = "";
    private $_publish_date = "";
    private $_category_id = "";
    private $_tags = "";
    private $_crawling_date = "";
    private $_media_id = "";
    private $_website_url = "";
    private $_status = "";
    private $_image = "";
    private $_language_id = "";
    private $_video_path = "";
    private $_customer_id = "";
    private $_magazine_id = "";
    private $_created_by = "";
    private $_media_type = "";
    private $_allow_comment = "";
    private $_allow_share = "";
    private $_publish_from = "";
    private $_publish_to = "";
    private $_server = "";
    private $_comment = "";
    private $_user_id = "";
    
    public function get_comment() {
        return $this->_comment;
    }

    public function get_user_id() {
        return $this->_user_id;
    }

    public function set_comment($_comment) {
        $this->_comment = $_comment;
    }

    public function set_user_id($_user_id) {
        $this->_user_id = $_user_id;
    }
    
    public function get_server() {
        return $this->_server;
    }

    public function set_server($_server) {
        $this->_server = $_server;
    }
    
    
    public function get_tableName() {
        return $this->_tableName;
    }

    public function get_id() {
        return $this->_id;
    }

    public function get_title() {
        return $this->_title;
    }

    public function get_author() {
        return $this->_author;
    }

    public function get_description() {
        return $this->_description;
    }

    public function get_description_without_html() {
        return $this->_description_without_html;
    }

    public function get_article_link() {
        return $this->_article_link;
    }

    public function get_publish_date() {
        return $this->_publish_date;
    }

    public function get_category_id() {
        return $this->_category_id;
    }

    public function get_tags() {
        return $this->_tags;
    }

    public function get_crawling_date() {
        return $this->_crawling_date;
    }

    public function get_media_id() {
        return $this->_media_id;
    }

    public function get_website_url() {
        return $this->_website_url;
    }

    public function get_status() {
        return $this->_status;
    }

    public function get_image() {
        return $this->_image;
    }

    public function get_language_id() {
        return $this->_language_id;
    }

    public function get_video_path() {
        return $this->_video_path;
    }

    public function get_customer_id() {
        return $this->_customer_id;
    }

    public function get_magazine_id() {
        return $this->_magazine_id;
    }

    public function get_created_by() {
        return $this->_created_by;
    }

    public function get_media_type() {
        return $this->_media_type;
    }

    public function get_allow_comment() {
        return $this->_allow_comment;
    }

    public function get_allow_share() {
        return $this->_allow_share;
    }

    public function get_publish_from() {
        return $this->_publish_from;
    }

    public function get_publish_to() {
        return $this->_publish_to;
    }

    public function set_tableName($_tableName) {
        $this->_tableName = $_tableName;
    }

    public function set_id($_id) {
        $this->_id = $_id;
    }

    public function set_title($_title) {
        $this->_title = $_title;
    }

    public function set_author($_author) {
        $this->_author = $_author;
    }

    public function set_description($_description) {
        $this->_description = $_description;
    }

    public function set_description_without_html($_description_without_html) {
        $this->_description_without_html = $_description_without_html;
    }

    public function set_article_link($_article_link) {
        $this->_article_link = $_article_link;
    }

    public function set_publish_date($_publish_date) {
        $this->_publish_date = $_publish_date;
    }

    public function set_category_id($_category_id) {
        $this->_category_id = $_category_id;
    }

    public function set_tags($_tags) {
        $this->_tags = $_tags;
    }

    public function set_crawling_date($_crawling_date) {
        $this->_crawling_date = $_crawling_date;
    }

    public function set_media_id($_media_id) {
        $this->_media_id = $_media_id;
    }

    public function set_website_url($_website_url) {
        $this->_website_url = $_website_url;
    }

    public function set_status($_status) {
        $this->_status = $_status;
    }

    public function set_image($_image) {
        $this->_image = $_image;
    }

    public function set_language_id($_language_id) {
        $this->_language_id = $_language_id;
    }

    public function set_video_path($_video_path) {
        $this->_video_path = $_video_path;
    }

    public function set_customer_id($_customer_id) {
        $this->_customer_id = $_customer_id;
    }

    public function set_magazine_id($_magazine_id) {
        $this->_magazine_id = $_magazine_id;
    }

    public function set_created_by($_created_by) {
        $this->_created_by = $_created_by;
    }

    public function set_media_type($_media_type) {
        $this->_media_type = $_media_type;
    }

    public function set_allow_comment($_allow_comment) {
        $this->_allow_comment = $_allow_comment;
    }

    public function set_allow_share($_allow_share) {
        $this->_allow_share = $_allow_share;
    }

    public function set_publish_from($_publish_from) {
        $this->_publish_from = $_publish_from;
    }

    public function set_publish_to($_publish_to) {
        $this->_publish_to = $_publish_to;
    }
    
    public function getMagazineArticleDetail(){
        $query = $this->db->select("*")
                          ->from("tbl_magazine_articles")
                          ->where("id",  $this->get_id())
                          ->get();
        $row = $query->row_array();
        return $row;
    }
    
    public function getAllComments(){
        $query = $this->db->select("ac.*,tu.name")
                          ->from("tbl_magazine_article_comment as ac")
                          ->join("tbl_users as tu",'ac.user_id = tu.id','left')
                          ->where("ac.article_id",  $this->get_id())
                          ->get();
        $row = $query->result_array();
        return $row;
    }
    
    public function getRelatedArticles(){
        $server=  $this->get_server();
        
       if($server=='web'){
       $id=  $this->get_id();
       
       $date = date("Y-m-d");
       $topicId = ltrim ($this->get_category_id(), '|');
       $langId=ltrim ($this->get_language_id(), ',');
       $sql= "SELECT 
    *
FROM
    (`tbl_magazine_articles`)
WHERE
    `status` = '2'
        AND `publish_from` <= '$date'
        AND `publish_to` >= '$date'
        AND `id` != '$id'";
       if($topicId!=''){
        $sql .= " AND category_id REGEXP '(^|,)($topicId)(,|$)'";
       }if($langId!=''){
        $sql .= " AND language_id IN($langId)";   
       }
$sql .= " ORDER BY `publish_date` desc
LIMIT 4";
       $query = $this->db->query($sql);
       //echo $this->db->last_query();die;
       if($query->num_rows()>0){
           
          $row = $query->result_array();
          $i=0;
         foreach($row as $r){
             $catId = explode(",",$r['category_id']);
             $queryTopic = $this->db->select("*")
                                    ->from("tbl_category")
                                    ->where_in("id",$catId)
                                    ->get();
             //echo $this->db->last_query();die;
             $rowTopic = $queryTopic->row_array();
             //echo "<pre>";print_r($rowTopic);die;
             $row[$i]['topicName'] = $rowTopic['category_name'];
         $i++;} 
         
       //echo "<pre>";print_r($row);die;
       return $row;
       }else{
           
           return FALSE;
       } 
           
       }else{
       $date = date("Y-m-d");
       $topicId = explode(",",  $this->get_category_id());
       
       $query = $this->db->select("*")
                          ->from("tbl_magazine_articles")                          
                          ->where("status","2")
                          ->where("publish_from <=",$date)
                          ->where("publish_to >=",$date)
                          ->where("id !=",  $this->get_id());                          
       foreach($topicId as $t){
       $query = $this->db->or_like("category_id",$t,"both");
       }
       $query = $this->db->order_by("publish_date","desc")
                         ->limit("4")
                         ->get();
       //echo $this->db->last_query();die;
       if($query->num_rows()>0){
           
          $row = $query->result_array();
          $i=0;
         foreach($row as $r){
             $catId = explode(",",$r['category_id']);
             $queryTopic = $this->db->select("*")
                                    ->from("tbl_category")
                                    ->where_in("id",$catId)
                                    ->get();
             //echo $this->db->last_query();die;
             $rowTopic = $queryTopic->row_array();
             //echo "<pre>";print_r($rowTopic);die;
             $row[$i]['topicName'] = $rowTopic['category_name'];
         $i++;} 
         
       //echo "<pre>";print_r($row);die;
       return $row;
       }else{
           
           return FALSE;
       } 
       }
    }
    
    public function postMagazineArtComments(){
        $data = array();
        $data['article_id'] = $this->get_id();
        $data['comment'] = $this->get_comment();
        $data['user_id'] = $this->get_user_id();
        
        $this->db->set($data)->set("created_date","NOW()",false)
                 ->insert("tbl_magazine_article_comment");
             return TRUE;
    }

    public function updateBranchLink($branchLink){

        $articleId = $this->get_id();

        $sql = $this->db->query("UPDATE tbl_magazine_articles SET branch_link = '{$branchLink}' WHERE id = {$articleId}");

        if ($sql) {
            return TRUE;
        }

        return FALSE;

    }
    
}
