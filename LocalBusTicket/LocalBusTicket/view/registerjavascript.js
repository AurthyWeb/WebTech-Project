
function isValidForm(pForm1) {
	if (pForm1.firstname.value == "") {
		document.getElementById("error-fname").innerHTML = 
		"Please fill up the firstname form.Js-side";
		return false;
	}
    
   if(pForm1.lastname.value==""){
        document.getElementById("error-lname").innerHTML = 
		"Please fill up the lastname form.Js-side";
		return false;
    }
    if(pForm1.email.value==""){
        document.getElementById("error-email").innerHTML = 
		"Please fill up the email form.Js-side";
		return false;
    }
    if(pForm1.password.value==""){
        document.getElementById("error-password").innerHTML = 
		"Please fill up the password form.Js-side";
		return false;
    }
    if(pForm1.confirmpassword.value==""){
        document.getElementById("error-confirm").innerHTML = 
		"Please fill up the confirmpassword form.Js-side";
		return false;
    }
	else {
		return true;
	}
}


