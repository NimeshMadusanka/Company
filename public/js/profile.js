function clickFunction(id) {
    var id = id.id;
    var div = "div_"+id;

    if(document.getElementById(div).style.display == "block"){
        document.getElementById(div).style.display = "none";
    }else {
        document.getElementById(div).style.display = "block";
    }
}

function changePassword(form) {

    var x = document.getElementById("confirmPassword").value;
    var y = document.getElementById("confirmPassword2").value;
    var z = document.getElementById("confirmPassword3").value;

    if(x==z){
        showErrorMsg("Please Used Different Password !");
        return false;
    }else if(x != "" && x == y) {
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

    return changeConfirm(form);

}

function changePhone(form) {

    var x = document.getElementById("currentPhone").value;
    var y = document.getElementById("editPhone").value;

    if(x==y){
        showErrorMsg("Please Change Phone Number !");
        return false;
    }

    return changeConfirm(form);

}

function showErrorMsg(msg) {
    swal({
        title: "Error",
        text: msg,
        icon: "warning",
        dangerMode: true,
    });
}

function changeEmail(form) {

    var x = document.getElementById("changeEmail1").value;
    var y = document.getElementById("changeEmail2").value;

    if(x==y){
        showErrorMsg("Please Enter New Email !");
        return false;
    }

    return changeConfirm(form);

}

function changeConfirm(form) {
    swal({
        title: "Are You Sure?",
        text: "If You Want Edit This!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
        });
    return false;
}

function newCourse(form) {

    var course = document.getElementById("new_course").value;

    re = /^[0-9a-zA-Z]+$/;
    if(!re.test(course)) {
        showErrorMsg("Your Entered Wrong Input, You Can be Used Only Numbers And Characters !");
        return false;
    }

    return confirmAddCourse(form);

}

function confirmAddCourse(form) {

    swal({
        title: "Are You Sure?",
        text: "If You Want Add This One !",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
        });
    return false;

}
