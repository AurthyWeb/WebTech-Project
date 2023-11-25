
function Valid(pForm) {
	if (pForm.email.value == "") {
		document.getElementById("email_msgg").innerHTML = 
		"Please fill up the email form.Js-side";
		return false;
	}
    
   if(pForm.password.value==""){
        document.getElementById("password_old").innerHTML = 
		"Please fill up the old password form.Js-side";
		return false;
    }
    if(pForm.password.value==""){
        document.getElementById("password_new").innerHTML = 
		"Please fill up the new password form.Js-side";
		return false;
    }
    if(pForm.password.value==""){
        document.getElementById("password_confirm").innerHTML = 
		"Please fill up the confirm password form.Js-side";
		return false;
    }
	else {
		return true;
	}
}


