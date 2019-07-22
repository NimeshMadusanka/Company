function checkNic(form) {

    var nic = document.getElementById("nic").value;

    re = /[0-9]{9}[V]$/;
    if(!re.test(nic)) {
        showErrorMsg("Your Entered Wrong NIC Number !");
        return false;
    }

    return checkPassword(form);

}

function checkStudent(form) {

    swal({
        title: "Are You Sure?",
        text: "If You Want, Add a Student ?",
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

function setStudent() {

    var id = document.getElementById("stdRegNum").value;

    var fname = 'fname'+id;
    var lname = 'lname'+id;
    var sname = 'sname'+id;
    var nic = 'nic'+id;
    var phone = 'phone'+id;
    var email = 'email'+id;

    document.getElementById("editF_name").value = document.getElementById(fname).value;
    document.getElementById("editL_name").value = document.getElementById(lname).value;
    document.getElementById("editS_name").value = document.getElementById(sname).value;
    document.getElementById("editNic").value = document.getElementById(nic).value;
    document.getElementById("editPhone").value = document.getElementById(phone).value;
    document.getElementById("editEmail").value = document.getElementById(email).value;

}

function checkStudentEdit(form) {

    swal({
        title: "Are You Sure?",
        text: "If You Want Edit This Details ?",
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

function setStudentDelete() {

    var id = document.getElementById("deleteRegNum").value;

    var fname = 'fname'+id;
    var lname = 'lname'+id;
    var sname = 'sname'+id;
    var nic = 'nic'+id;
    var phone = 'phone'+id;
    var email = 'email'+id;

    document.getElementById("deleteF_name").value = document.getElementById(fname).value;
    document.getElementById("deleteL_name").value = document.getElementById(lname).value;
    document.getElementById("deleteS_name").value = document.getElementById(sname).value;
    document.getElementById("deleteNic").value = document.getElementById(nic).value;
    document.getElementById("deletePhone").value = document.getElementById(phone).value;
    document.getElementById("deleteEmail").value = document.getElementById(email).value;

}

function checkStudentDelete(form) {

    swal({
        title: "Are You Sure?",
        text: "If You Want Remove This Student ?",
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

function checkStudentEdit(form) {

    swal({
        title: "Are You Sure?",
        text: "If You Want Edit This Details ?",
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

function checkLecturerDelete(form) {

    swal({
        title: "Are You Sure?",
        text: "If You Want Remove This Lecturer ?",
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

function checkLecturer(form) {

    swal({
        title: "Are You Sure?",
        text: "If You Want, Add a Lecturer ?",
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