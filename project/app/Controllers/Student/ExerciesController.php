<?php
namespace app\Controllers\Student;

use App\Controllers\ControllerInterface;
use App\Repositories\ExerciesRepositorie;



class ExerciesController implements ControllerInterface
{
    public function index()
    {
        // Implement index method
    }

    public function indexWith($id)
    {
        $exercies = new ExerciesRepositorie;
        $exerciesList = $exercies->getAllExercies($id);
         echo  json_encode($exerciesList);
      

         


    }
    public function create($data)
    {
        // Implement create method
    }

    public function read($id)
    {
        // Implement read method
    }

    public function update($id, $data)
    {
        // Implement update method
    }

    public function delete($id)
    {
        // Implement delete method
    }


    private function loadView($viewName, $data = []) {
        extract($data);
        require_once __DIR__ . "/../../Views/proprietaires/".$viewName.".php"; 
    }

    

}
    