<?php
namespace app\Controllers\Student;

use App\Controllers\View;
use App\Models\User;
use App\Repositories\UserRepositorie;
use App\Repositories\CoursRepositorie;
use App\Repositories\OrderRepositorie;


class StudentController{

    public function index(  $number = 1){
      

        $allCourses = new CoursRepositorie;
        $nuberPages = $this->pagenation();
        

        $Ofset = $this->getPageNumber($number);
        $user = new UserRepositorie();
       
        $user = $user->getUser($_SESSION['user_id']);

        $courses = $allCourses->index( $Ofset);

        

        if(isset($_POST['courseId']) && isset($_POST['orderID'])){

            $insertToOrder = new OrderRepositorie;
            var_dump($_SESSION['user_id'],$_POST['orderID'],$_POST['courseId']);
            $insertToOrder->store($_SESSION['user_id'],$_POST['courseId'],$_POST['orderID']);



        }
        
        View::render('Student/student.twig', [
            'user'=> $user,
            'courses'=> $courses,
            'totalPages'=> $nuberPages,
            'currentPage'=> $number,
        ]);
    }

    

    public function pagenation(){
        $nmberPages= new CoursRepositorie();
        $totalePges = $nmberPages->clculeRows();
        $NumPages= ceil($totalePges['COUNT(*)']/6);
        if(!$NumPages){
            return false;
        }else{
            return $NumPages;
        }  
    }


    public function getPageNumber($currentPage){
        
        if($currentPage==1){
            $numberRowdesolay = 1;
            return $numberRowdesolay;
        }elseif($currentPage>1){
            $num = $currentPage - 1;
            $numFp=6;
            $numberFodesolay=$numFp*$num;
            return $numberFodesolay;
        }
    }

    public function allCourses(){
        
        
    }

    public function searchCourse($serch = null)
{
    header('Content-Type: application/json');
    
    $search = new CoursRepositorie();
    $courses = $search->searchCourse($serch);

    if ($courses) {
        $result = [];

        foreach ($courses as $course) {
            $result[] = [
                'id' => $course->getCourseId(),
                'course_name' => $course->getCourseName(),
                'price' => $course->getPrice(),
                'description' => $course->getCourseDescription(),
                'content' => $course->getContent(),
                'participants' => $course->getParticipants(),
                'start_date' => $course->getStartDate(),
                'active' => $course->getActive(),
                'category' => [
                    'name' => $course->getCategory()?->getName()
                ],
                'teacher' => [
                    'name' => $course->getTeacher()?->getName()
                ]
            ];
        }
        // var_dump(value: $result);
        // exit;

           echo json_encode($result);
    } else {
        echo json_encode(['error' => 'No courses found']);
    }
}

    public function profile(){  
        var_dump($_POST['user-id']);
       
        
        $history = new CoursRepositorie();
        // $historys = $history->history($id);
        // var_dump($historys);
        // exit;
        View::render('Student/profile.twig', [
            'name'      => $_SESSION['user_name'],
            'email'     => $_SESSION['email'],
            'role'      => $_SESSION['role'],
            'logged_in' => $_SESSION['logged_in'] ,
            // 'historys'=> $historys,
        ]);
    }

    public function resources(){

        $couers = new CoursRepositorie;
        // var_dump($_SESSION['user_id']);
    
        $couerses = $couers->getCouersOrder($_SESSION['user_id']);
      
        
        


        $couersOreder = [];

        foreach ($couerses as $couers) {
            $couersOreder[] = [
                'name' => $couers['name'],
                'id' => $couers['id'],
                'description' => $couers['description'],
                'intro' => $couers['intro'],
                'content' => $couers['content'],
                'price' => $couers['price'],
                'creation_date' => $couers['creation_date'],
                'participants' => $couers['participants'],
                'active' => $couers['active'],
                'category' => $couers['category'],
                'teacher' => $couers['teacher'],
                'teacher_image' => $couers['teacher_image'],
                'duration' => $couers['duration'],
                'level' => $couers['level'],
                'user' => $_SESSION['user_name'],
            ];
        }
       
        

        
        echo json_encode($couersOreder);
       

        


          

        

        
       
    }





}