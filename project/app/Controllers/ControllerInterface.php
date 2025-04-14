<?php
namespace app\Controllers;

interface ControllerInterface
{
    public function index();   
    public function indexWith($id);          

    public function create($data);    
    public function read($id);        
    public function update($id, $data);  
    public function delete($id);      
   

}
