function togglePassword() {
  document
    .getElementById("togglePassword")
    .addEventListener("click", function () {
      var passwordInput = document.getElementById("inputPassword");
      var passwordToggleButton = this;

      if (passwordInput.type === "password") {
        passwordInput.type = "text";
        passwordToggleButton.innerHTML = " Hide ";
      } else {
        passwordInput.type = "password";
        passwordToggleButton.innerHTML = " Show ";
      }
    });
}