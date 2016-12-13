document.getElementById("signin").onsubmit = validateSign;

function validateSign(){
        var form = document.getElementById("signin");
        var name = form.username.value;
        var pass = form.password.value;

        if (name.length > 20 || name.length < 1) {
                window.alert("Invalid Input");
                return false;
        }
        if (pass.length > 100 || pass.length < 1) {
                window.alert("Invalid Input");
                return false;
        }
}

document.getElementById("register").onsubmit = validateRes;

function validateRes(){
        var form = document.getElementById("register");
        var name = form.fullname.value;
        var pass = form.password.value;
        var cpass= form.cpassword.value;
        var email= form.email.value;
        var cemail=form.cemail.value;
        
        if (pass!=cpass || pass.length<1 || pass.length>20){
                window.alert("Passwords do not match")
                return false;
        }
        if (email!=cemail || pass.length<1 || pass.length>20){
                window.alert("Emails do not match")
                return false;
        }        
        
}