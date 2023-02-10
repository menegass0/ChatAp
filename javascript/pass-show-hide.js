const paswdField = document.querySelector(".form .field input[type='password']"),
toggleBtn = document.querySelector(".form .field i");

toggleBtn.onclick = () =>{
    if(paswdField.type == "password"){
        paswdField.type = "type";
        toggleBtn.classList.add("active");
    }
    else{
        paswdField.type = "password";
        toggleBtn.classList.remove("active");
    }
}