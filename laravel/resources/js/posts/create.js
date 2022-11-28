// Load our customized validationjs library
import Validator from '../validator'
 
// Submit form ONLY when validation is OK
const form = document.getElementById("create")
 
form.addEventListener("submit", function( event ) {
   // Reset errors messages
   // ...  
    document.querySelector('.error').innerHTML = "";
    document.querySelector('.error').classList.remove('show');

     // Create validation

   let data = {
        "upload": document.getElementsByName("upload")[0].value,
        "body": document.getElementsByName("body")[0].value,
        "latitude": document.getElementsByName("latitude")[0].value,
        "longitude": document.getElementsByName("longitude")[0].value,

   }
   let rules = {
        "body": "required",
        "latitude": "required",
        "longitude": "required",
        "upload": "required",


   }
   let validation = new Validator(data, rules)
   // Validate fields
   if (validation.passes()) {
       // Allow submit form (do nothing)
       console.log("Validation OK")
   } else {
       // Get error messages
       let errors = validation.errors.all()
       console.log(errors)
       // Show error messages
       document.querySelector('#error').classList.add('show');
       for(let inputName in errors) {

            let field = document.querySelector('#' + inputName);
            
            field.querySelector('.error').classList.add('show');
            field.querySelector('.error').innerHTML = errors[inputName];
            
       }
       // Avoid submit
       event.preventDefault()
       return false
   }
})