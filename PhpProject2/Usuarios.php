<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuarios
 *
 * @author strudel
 */

class Usuarios {
    
    public static function getUsuarios($nome) {
        $con = Connection::getConnection();
        
        $handle = mysqli_query($con, "SELECT * FROM daw_Usuarios WHERE Nome = '$nome'");
        
        return mysqli_fetch_object($handle);
    }
    
    public static function addUser($cliente){
        $con = Connection::getConnection();
        $q = mysqli_query($con, "insert into daw_Usuarios (Nome, Senha, Usuario, Email) values ('$cliente->Nome', '$cliente->Senha', '$cliente->Usuario', '$cliente->Email')");
        
    }
    
    public static function rmUser($id){
        $con = Connection::getConnection();
        $q = mysqli_query($con, "delete from daw_Usuarios where id = '$id'");
        
    }
    
    public static function update($usuario){
        $con = Connection::getConnection();
        $q = mysqli_query($con, "update daw_Usuarios set Nome = '$usuario->nome', Senha = '$usuario->senha', Usuario = '$usuario->usuario', Email = '$usuario->email' where Id = '$usuario->id'");
        //update contatos set PrimeiroNome = ?, email = ?, endereco = ? where id
    }
    
}


