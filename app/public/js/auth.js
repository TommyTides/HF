document.addEventListener('DOMContentLoaded', function () {
    const checkbox = document.getElementById('reg-log');
    const formContainer = document.querySelector('.card-3d-wrap');
    const signupForm = document.querySelector('.card-back');
  
    checkbox.addEventListener('change', function () {
      if (checkbox.checked) {
        // Adjust form size for signup
        formContainer.style.height = '775px'; // Adjust the height as needed for the signup form
        signupForm.style.display = 'block';
      } else {
        // Adjust form size for login
        formContainer.style.height = '400px'; // Adjust the height as needed for the login form
        signupForm.style.display = 'none';
      }
    });
  });