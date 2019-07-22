function checkPassword(form)
{
    var x = document.getElementById("password").value;
    var y = document.getElementById("cpassword").value;

    if(x != "" && x == y) {
        if(x.length < 8) {
            showErrorMsg("Password Must Contain at Least Eight Characters!");
            return false;
        }
        re = /[0-9]/;
        if(!re.test(x)) {
            showErrorMsg("Password Must Contain at Least One Number (0-9)!");
            return false;
        }
        re = /[a-z]/;
        if(!re.test(x)) {
            showErrorMsg("Password Must Contain at Least One Lowercase Letter (a-z)!");
            return false;
        }
        re = /[A-Z]/;
        if(!re.test(x)) {
            showErrorMsg("Password Must Contain at Least One Uppercase Letter (A-Z)!");
            return false;
        }
    } else {
        showErrorMsg("Please Check Entered Password And Confirmed Password !");
        return false;
    }

    return true;
}

function confirmNic(form) {

    var nic = document.getElementById("nic").value;

    re = /[0-9]{9}[V]$/;
    if(!re.test(nic)) {
        showErrorMsg("Your Entered Wrong NIC Number !");
        return false;
    }

    return checkPassword(form);

}

function checkForm(form) {

    var reg = document.getElementById("reg").value;

    re = /[it|IT|AD|ad|iT|It][0-9]{8}$/;

    if(!re.test(reg)) {
        showErrorMsg("Your Entered Wrong Registration No. !");
        return false;
    }

    return confirmNic(form);

}