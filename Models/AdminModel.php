<?php
class AdminModel{
    public function login($username,$password){
        global $connect;
        $sql = "SELECT*FROM admin WHERE username = '$username' AND password = '$password'";
        $stmt =$connect->query($sql);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $rows = $stmt->fetchAll();
        // echo "<pre>";
        // print_r($sql);
        // die();
        return $rows;
    }
}