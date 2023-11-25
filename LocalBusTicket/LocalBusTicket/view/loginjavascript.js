
function isValid(pForm) {
	if (pForm.email.value == "") {
		document.getElementById("email_msg").innerHTML = 
		"Please fill up the email form.Js-side";
		return false;
	}
    
   if(pForm.password.value==""){
        document.getElementById("password_msg").innerHTML = 
		"Please fill up the password form.Js-side";
		return false;
    }
	else {
		return true;
	}
}


