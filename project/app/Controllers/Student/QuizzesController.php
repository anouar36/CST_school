<?php
namespace app\Controllers\Student;

use App\Controllers\ControllerInterface;
use App\Repositories\QuizzesRepositorie;
use App\Service\QuizzServis;
use App\Controllers\View;



class QuizzesController implements ControllerInterface
{
    public function index()
    {
       $idQuizz = $_POST['idQuizz'];
       
        $quizzes = new QuizzesRepositorie;
        $objectQuizzes = new QuizzServis;
        $quizzesDatabase = $quizzes->getQuizById($idQuizz);
        $quizzesList = $objectQuizzes->getObjectQuizzes($quizzesDatabase);
        // echo '<pre>';
        // var_dump($quizzesList);
        // echo '</pre>';
        // exit;
     
        

        View::render('Student/quizz.twig', [
            'quizzes' => $quizzesList,
            
        ]);

    }

    public function indexWith($id)
    {
        $quizzes = new QuizzesRepositorie;
        $quizzesList = $quizzes->getAllQuizzes($id);
        
       
        

         echo  json_encode($quizzesList);
         exit;
      

         


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
    public function search($query)
    {
        // Implement search method
    }

    


}