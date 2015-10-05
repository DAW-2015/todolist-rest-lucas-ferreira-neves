<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


        require 'Slim/Slim.php';
        \Slim\Slim::registerAutoloader();

        $c = mysql_connect("150.164.102.160", "daw-aluno1", "lucas");
        
        $app = new \Slim\Slim();
        $app->post('/daw_Usuarios', function () {
            $request = \Slim\Slim::getInstance()->request();
            
            $cliente = json_decode($request->getBody());
            $cliente = ClienteDAO::updateCliente($cliente);
//            $resultado = mysqli_query($c, "SELECT id FROM daw_Usuarios");
//            $usuario = mysqli_fetch_array($resultado);
//            echo $resultado["Nome"];
            
        });
        $app->run();
        mysql_close($c);
        
?>