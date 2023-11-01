const passwordField = document.querySelector("#password");
const eyeIcon = document.querySelector("#icon");

function changeIcon(){

  const type = passwordField.getAttribute("type") === "password" ? "text" : "password";
  passwordField.setAttribute("type", type);

   if (passwordField.getAttribute("type") === "password") {
        eyeIcon.classList.remove("fa-eye");
        eyeIcon.classList.add("fa-eye-slash");
   } else {
        eyeIcon.classList.remove("fa-eye-slash");
        eyeIcon.classList.add("fa-eye");
   }
}
 