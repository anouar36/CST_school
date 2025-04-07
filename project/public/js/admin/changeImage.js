
    
 
 
 // Optional JavaScript to show the submit button when a file is selected
 document.getElementById('profile-image-upload').addEventListener('change', function(e) {
    if (e.target.files.length > 0) {
      // Show the submit button
      document.getElementById('submit-button').classList.remove('hidden');
      
      // Preview the selected image
      const file = e.target.files[0];
      const reader = new FileReader();
      reader.onload = function(e) {
        document.getElementById('profile-image').src = e.target.result;
      }
      reader.readAsDataURL(file);
    }
  });