    console.log("hello from courseDetails.js");
    let buttonReviews = document.getElementById('buttonReviews');
    let buttonExercises = document.getElementById('buttonExercises');
    let exercisesContent = document.getElementById('exercisesContent');
    let ReviwsContent = document.getElementById('ReviwsContent');
    let exercisesList = document.getElementById('exercisesList');
    let QuizzesContent = document.getElementById('QuizzesContent');
    let QuizzesList = document.getElementById('QuizzesList');
    let loadingExercises =document.getElementById('loadingExercises');
    let buttonQuizzes = document.getElementById('buttonQuizzes');
    let idcours = document.getElementById('idCours').value;
    let isActive =document.getElementById('isActive').value;
    let containerCouerses = document.getElementById('content');
    let buttonAddReview = document.getElementById('buttonAddReview');
    let containerAddReview = document.getElementById('containerAddReview');
    let buttonCancelReview = document.getElementById('cancel-review');
    let stars = document.querySelectorAll('.star');
    console.log("stars =>", stars);

    buttonExercises.addEventListener('click', function(){

      buttonExercises.classList.remove('px-4', 'py-2', 'text-gray-500', 'hover:text-gray-700');
      buttonQuizzes.classList.remove('px-4', 'py-2', 'text-gray-500', 'hover:text-gray-700');
      exercisesContent.classList.remove('hidden');
      QuizzesContent.classList.add('hidden');
            ReviwsContent.classList.add('hidden');
      buttonReviews.classList.remove('px-4' ,'py-2', 'border-b-2', 'border-teal-500', 'text-teal-500', 'font-medium');
      buttonQuizzes.classList.remove('px-4' ,'py-2', 'border-b-2', 'border-teal-500', 'text-teal-500', 'font-medium');
      buttonExercises.classList.add('px-4' ,'py-2', 'border-b-2', 'border-teal-500', 'text-teal-500', 'font-medium');
      buttonReviews.classList.add('px-4', 'py-2', 'text-gray-500', 'hover:text-gray-700');
      

       
        
    if (exercisesList.children.length === 0) {
      let xhr = new XMLHttpRequest();
      xhr.open("GET", "/student/exercies/" + encodeURIComponent(idcours), true);
      
      xhr.onreadystatechange = function (){
        if(xhr.readyState == 4 &&  xhr.status == 200){
          const exercises = JSON.parse(xhr.responseText);
          exercises.forEach(exercise => {
          const exerciseCard = document.createElement('div');
          exerciseCard.className = 'border border-gray-200 rounded-lg p-6 hover:shadow-md transition-shadow';
          exerciseCard.innerHTML = `
            <h3 class="text-lg font-semibold mb-2">${exercise.name}</h3>
            <p class="text-gray-600 mb-4">${exercise.content}</p>
            <div class="flex justify-between items-center">
              <span class="text-sm text-gray-500">Difficulty: Not Specified</span>
              <button class="text-teal-500 hover:text-teal-600 font-medium text-sm">
                Start Exercise →
              </button>
            </div>`;
          exercisesList.appendChild(exerciseCard);
          });
        }
      }
        xhr.send();
      }
    });

    setTimeout(function() {
      loadingExercises.classList.add('hidden');
      exercisesList.classList.remove('hidden');
    }, 5000);

    buttonReviews.addEventListener('click', function(){

      buttonExercises.classList.remove('px-4' ,'py-2', 'border-b-2', 'border-teal-500', 'text-teal-500', 'font-medium');
      buttonQuizzes.classList.remove('px-4' ,'py-2', 'border-b-2', 'border-teal-500', 'text-teal-500', 'font-medium');
      buttonReviews.classList.remove('px-4', 'py-2', 'text-gray-500', 'hover:text-gray-700');
      exercisesContent.classList.add('hidden');
      QuizzesContent.classList.add('hidden');
      ReviwsContent.classList.remove('hidden');
      buttonExercises.classList.add('px-4', 'py-2', 'text-gray-500', 'hover:text-gray-700');
      buttonReviews.classList.add('px-4' ,'py-2', 'border-b-2', 'border-teal-500', 'text-teal-500', 'font-medium'); 
    })

    buttonQuizzes.addEventListener('click', function(){

      buttonExercises.classList.remove('px-4' ,'py-2', 'border-b-2', 'border-teal-500', 'text-teal-500', 'font-medium');
      buttonReviews.classList.remove('px-4' ,'py-2', 'border-b-2', 'border-teal-500', 'text-teal-500', 'font-medium');
      exercisesContent.classList.add('hidden');
      ReviwsContent.classList.add('hidden');
      QuizzesContent.classList.remove('hidden');
      buttonQuizzes.classList.add('px-4', 'py-2', 'text-gray-500', 'hover:text-gray-700');
      buttonReviews.classList.add('px-4', 'py-2', 'text-gray-500', 'hover:text-gray-700');
      buttonQuizzes.classList.add('px-4' ,'py-2', 'border-b-2', 'border-teal-500', 'text-teal-500', 'font-medium');
      console.log("hello");

      if(QuizzesList.children.length === 0){
        let xhr = new XMLHttpRequest();
        xhr.open("GET", "/student/quizz/" + encodeURIComponent(idcours), true);
        
        xhr.onreadystatechange = function (){
          console.log("readyState =>", xhr.readyState);
          console.log("status => ", xhr.status);
          if(xhr.readyState == 4 &&  xhr.status == 200){
            const Quizzes = JSON.parse(xhr.responseText);
            console.log("Quizzes =>", Quizzes);
            Quizzes.forEach(Quizz => {
            const QuizzCard = document.createElement('div');
            QuizzCard.className = 'border border-gray-200 rounded-lg p-6 hover:shadow-md transition-shadow';

            // let test = '#';
            // if(isActive == 1){
            //    test ='/student/quizz';
            // }
              
            QuizzCard.innerHTML = `
            <form method="POST" action="/student/quizz">
            <input hidden name="idQuizz" value="${Quizz.id}">
              <h3 class="text-lg font-semibold mb-2">${Quizz.title}</h3>
          
              <p class="text-gray-600 mb-4">${Quizz.description}</p>
              <div class="flex justify-between items-center">
              <h1 class="text-lg font-semibold mb-2">Score: ${Quizz.id}</h1>
                <span class="text-sm text-gray-500">Difficulty: ${Quizz.category_name
                    }<ti/span>
                <button class="text-teal-500 hover:text-teal-600 font-medium text-sm">
                  Start Quizz →
                </button>
              </div>
              </form>`;
            QuizzesList.appendChild(QuizzCard);
            });
          }
        }
          xhr.send();
        }
       
      });
       setTimeout(function() {
      loadingQuizz.classList.add('hidden');
      QuizzesList.classList.remove('hidden');
     }, 5000);
 
     console.log("hello");
      if(isActive == 1){
        buttonAddReview.addEventListener('click', function(){
          if (this.id === "buttonAddReview"){
            this.id = "cancelButton";
            containerAddReview.classList.remove('hidden');
          } else if(this.id === "cancelButton"){
             this.id = "buttonAddReview";
          containerAddReview.classList.add('hidden');
          }
        });

       
  
  
        buttonCancelReview.addEventListener('click', function(){
          containerAddReview.classList.add('hidden');
        });
    };

    let ratingValue = document.getElementById('rating-value')
    let count = 0;

    stars.forEach(star=>{
        
        star.addEventListener('click',function(){
            if(star.classList.contains('fill-gray-300')=== true){
                star.classList.remove('fill-gray-300');
                star.classList.add('fill-yellow-500');
                count++;

            }else{
                star.classList.remove('fill-yellow-500');
                star.classList.add('fill-gray-300');
                count--;
            }
            ratingValue.value = count;
            console.log("count =>", count);

        })

    })
