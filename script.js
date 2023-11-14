const forms = document.querySelector(".forms"),
      pwShowHide = document.querySelectorAll(".fa-eye-slash"),
      links = document.querySelectorAll(".link");

pwShowHide.forEach(faEyeSlash => {
    faEyeSlash.addEventListener("click", () => {
        let pwFields = faEyeSlash.parentElement.parentElement.querySelectorAll(".password");

        pwFields.forEach(password => {
            if (password.type === "password") {
                password.type = "text";
                faEyeSlash.classList.replace("fa-eye-slash", "fa-eye");
                return;
            }
            password.type = "password";
            faEyeSlash.classList.replace("fa-eye", "fa-eye-slash");
        })
    })    
})

links.forEach(link => {
    link.addEventListener("click", e => {
        e.preventDefault(); // preventing form submit
        forms.classList.toggle("show-signup");
    })
})