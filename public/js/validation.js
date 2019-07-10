function checkForm() {

    if (document.getElementById("html").checked||document.getElementById("css").checked||document.getElementById("javascript").checked||document.getElementById("php").checked){

    }else {
        swal({
            title: "Error",
            text: "Please mark your skills",
            icon: "warning",
            dangerMode: true,
        });

        return false;
    }

    return phoneCheck();
}

/*    function phoneCheck() {

        var phone = document.getElementById("phone").value;

        re = /[0-9]{10}$/;
        if(!re.test(phone)) {
            swal({
                title: "Error",
                text: "Your Entered Wrong Phone Number",
                icon: "warning",
                dangerMode: true,
            });
            return false;
        }

        return true;
    }*/