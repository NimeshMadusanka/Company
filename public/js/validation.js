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


}

