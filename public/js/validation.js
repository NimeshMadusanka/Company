function checkForm() {

    if (document.getElementById("html").checked || document.getElementById("css").checked || document.getElementById("javascript").checked || document.getElementById("php").checked) {

    } else {
        swal({
            title: "Error",
            text: "Please fill out your skills",
            icon: "warning",
            dangerMode: true,
        });

        return false;
    }
    return photo_upload();
}

function photo_upload() {

    var photo = document.getElementById("upload_image").value;

    if(photo=='') {
        swal({
            title: "Error",
            text: "Please Upload Your Image!",
            icon: "warning",
            dangerMode: true,
        });
        return false;
    }

    return checkPassword();
}

function checkPassword()
{
    var x = document.getElementById("password").value;
    var y = document.getElementById("confrim-password").value;

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

function showErrorMsg(msg) {
    swal({
        title: "Error",
        text: msg,
        icon: "warning",
        dangerMode: true,
    });
}

