<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Categorias
 *
 * @author strudel
 */
class Categorias{
    public static function getCategorias(){
        $con = Connection::getConnection();
        
        $result = mysqli_query($con, "Select * from categoria where 1");
            
        return mysqli_fetch_array($result);    
        
    }
    
    public static function addCategoria($categoria){
        $con = Connection::getConnection();
        $q = mysqli_query($con, "insert into categoria (nome, usuarios_id) values ('$categoria->nome', '$categoria->usuarios_id')");
        
        
    }
    
    public static function rmCategoria($id){
        $con = Connection::getConnection();
        $q = mysqli_query($con, "delete from categoria where id = '$id'");
        
    }
}

