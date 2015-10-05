<?php
        
        require 'Slim/Slim.php';
        \Slim\Slim::registerAutoloader();
        
        $c = mysql_connect("150.164.102.160", "daw-aluno1", "lucas");
        
        $app = new \Slim\Slim();
        $app->get('/hello/:name', function ($name) {
            echo "Hello, " . $name;
        });
        $app->get('/usuarios/:name', function($name){
           
            echo json_encode(Usuarios::getUsuarios($name)); 
            
        });
        $app->get('/tarefas', function(){
            echo json_encode(Tarefas::getTarefas());
        });
        
        $app->get('/categorias', function(){
            echo json_encode(Categorias::getCategorias());
        });
        
        $app->post('/addUser', function(){
            $request = \Slim\Slim::getInstance()->request(); 
            
            $the_body = $request->getBody();
            
            $output;
            parse_str($the_body, $output);
            
            $cliente = json_decode(json_encode($output));
            
            Usuarios::addUser($cliente);
            
        });
        
        $app->post('/addTarefa', function(){
            $request = \Slim\Slim::getInstance()->request(); 
            
            $the_body = $request->getBody();
            
            $output;
            parse_str($the_body, $output);
            
            $tarefa = json_decode(json_encode($output));
            
            Tarefas::addTarefa($tarefa);
            
        });
        
        $app->post('/addCategoria', function(){
            $request = \Slim\Slim::getInstance()->request(); 
            
            $the_body = $request->getBody();
            
            $output;
            parse_str($the_body, $output);
            
            $categoria = json_decode(json_encode($output));
            
            Categorias::addCategoria($categoria);
            
        });
        
        $app->delete('/rmUsuario/:id', function($id){
            Usuarios::rmUser($id);
        });
        
        $app->delete('/rmTarefa/:id', function($id){
            Tarefas::rmTarefa($id);
        });
        
        $app->delete('/rmCategoria/:id', function($id){
            Categorias::rmCategoria($id);
        });
        
        $app->put('/updateUser', function(){
            $request = \Slim\Slim::getInstance()->request(); 
            
            $the_body = $request->getBody();
            
            $output;
            parse_str($the_body, $output);
            
            $usuario = json_decode(json_encode($output));
            
            Usuarios::update($usuario);
            
            
        });
        
        $app->run();
        ?>
