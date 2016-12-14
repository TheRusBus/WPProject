document.getElementById("signin").onsubmit = validateSign;

function validateSign(){
        var form = document.getElementById("signin");
        var name = form.username.value;
        var pass = form.password.value;

        if (name.length > 20 || name.length < 1) {
                window.alert("Invalid Input");
                return false;
        }
        if (pass.length > 20 || pass.length < 1) {
                window.alert("Invalid Input");
                return false;
        }
}

document.getElementById("register").onsubmit = validateRes;

function validateRes(){
        var form = document.getElementById("register");
        var first= form.firstname.value;
        var last = form.lastname.value;
        var pass = form.password.value;
        var cpass= form.cpassword.value;
        var email= form.email.value;
        var cemail=form.cemail.value;
        var address=form.address.value;
        if (first.length > 20 || first.length < 1) {
                window.alert("Invalid Input");
                return false;
        }
        else if (last.length > 20 || last.length < 1) {
                window.alert("Invalid Input");
                return false;     
        }
        else if (address.length > 50 || address.length < 1) {
                window.alert("Invalid Input");
                return false;
        }                        
        else if (pass!=cpass || pass.length<1 || pass.length>20){
                window.alert("Passwords do not match")
                return false;
        }
        else if (email!=cemail || email.length<1 || email.length>20){
                window.alert("Emails do not match")
                return false;
        }
        else{
                window.alert("Thank You for registering, please sign in")
                return true;
        }     
        
}