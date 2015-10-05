<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Tarefas
 *
 * @author strudel
 */


class Tarefas{
    public static function getTarefas(){
        $con = Connection::getConnection();
        
        $result = mysqli_query($con, "Select * from tarefas where 1");
            
        return mysqli_fetch_array($result);    
        
    }
    public static function addTarefa($tarefa){
        $con = Connection::getConnection();
        $q = mysqli_query($con, "insert into tarefas (descricao, categorias_id, usuarios_id) values ('$tarefa->descricao', '$tarefa->categorias_id', '$tarefa->usuarios_id')");
        
    }
    public static function rmTarefa($id){
        $con = Connection::getConnection();
        $q = mysqli_query($con, "delete from tarefas where id = $id");
        
    }
}
