<!DOCTYPE html>
<html lang="en">
<head>
    <title>EmployeeList</title>

    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/css/bootstrap.css">
    <!-- <link rel="stylesheet" href="<?php /*echo base_url(); */?>/public/css/styles.css">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.3.1.js" ></script>
    <script src="<?php echo base_url(); ?>/public/js/sweetalert.min.js"></script>
    <script src="<?php echo base_url(); ?>/public/js/validation.js"></script>

    <style>
        .elementz {
            border:none;
            background-image:none;
            background-color:transparent;
            -webkit-box-shadow: none;
            -moz-box-shadow: none;
            box-shadow: none;
            outline: none;
            -webkit-appearance: none;
            color: #000;
        }

        .buttonHide{
            display: none;
        }
    </style>
</head>
<body>

<div class="container">
    <!-- navigation bar -->
    <nav style="color: gainsboro" class="navbar navbar-expand-sm bg-light navbar-light" >

        <i class="fa fa-book" style="font-size:48px;color:green; margin-right: 10px"></i>

        <a class="navbar-brand .text-success" href="Register">Telexar</a>



        <!-- Navigation Links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="Register">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<i class="fa fa-sign-in" style="color: green"></i> Register</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href=""><i class="fa fa-folder-open" style="color: green"></i> Employee</a>
            </li>
        </ul>
    </nav>

    <div>
        <table class="table table-striped" id="table_js">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Status</th>
                <th>Address</th>
                <th>HTML</th>
                <th>CSS</th>
                <th>Javascript</th>
                <th>PHP</th>
                <th>Phone</th>
                <th>EDIT</th>
                <th>DELETE</th>
            </tr>
            </thead>
        </table>
    </div>

</div>



</body>
<script type="text/javascript" language="javascript" src="<?php echo base_url() ?>public/js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url() ?>public/js/jquery.dataTables.js"></script>
<script type="text/javascript" language="javascript" >
    $(document).ready(function() {
        var dataTable = $('#table_js').DataTable( {
            "processing": true,
            "serverSide": true,
            "ajax":{
                url : "<?php echo site_url('tablelist_data') ?>", // json datasource
                type: "post",  // method  , by default get
                error: function(e){  // error handling
                    $(".table_js-error").html("");
                    $("#table_js").append('<tbody class="employee-grid-error"><tr><th colspan="3">Sorry, Something is wrong</th></tr></tbody>');
                    $("#table_js_processing").css("display","none");
                }
            }
        } );
    } );
</script>
</html>
<script>

    function editRow(id) {

        document.getElementById('row_name_'+id).readOnly = false;
        document.getElementById('row_address_'+id).readOnly = false;
        document.getElementById('row_name_'+id).classList.remove("elementz");
        document.getElementById('row_address_'+id).classList.remove("elementz");
        document.getElementById('btn_id_'+id).classList.add("buttonHide");
        document.getElementById('btn_save_id'+id).classList.remove("buttonHide");
        document.getElementById('row_gender_'+id).disabled = false;
        document.getElementById('row_gender_'+id).classList.remove("elementz");
        document.getElementById('row_relationship_'+id).disabled = false;
        document.getElementById('row_relationship_'+id).classList.remove("elementz");
        document.getElementById('row_phone_'+id).readOnly = false;
        document.getElementById('row_phone_'+id).classList.remove("elementz");
        document.getElementById('row_css_'+id).disabled = false;
        document.getElementById('row_css_'+id).classList.remove("elementz");
        document.getElementById('row_html_'+id).disabled = false;
        document.getElementById('row_html_'+id).classList.remove("elementz");
        document.getElementById('row_javascript_'+id).disabled = false;
        document.getElementById('row_javascript_'+id).classList.remove("elementz");
        document.getElementById('row_php_'+id).disabled = false;
        document.getElementById('row_php_'+id).classList.remove("elementz");

    }

    function saveData(id) {

        if (document.getElementById('row_name_'+id).value==""||document.getElementById('row_address_'+id).value==""||document.getElementById('row_phone_'+id).value==""){
            swal({
                title: "Error",
                text: "Empty!",
                icon: "warning",
                dangerMode: true,
            });
        }else {
            var phone = document.getElementById('row_phone_'+id).value;

            re = /^\d{10}$/;
            if(!re.test(phone)){
                swal({
                    title: "Error",
                    text: "Your Entered Wrong Phone Number",
                    icon: "warning",
                    dangerMode: true,
                });
            }else{
                disable_row(id);

                var name = '#row_name_'+id;
                var address = '#row_address_'+id;
                var gender = '#row_gender_'+id;
                var relationship = '#row_relationship_'+id;
                var phone = '#row_phone_'+id;
                var css = '#row_css_'+id;
                var html = '#row_html_'+id;
                var javascript = '#row_javascript_'+id;

                $.ajax({
                    url:'<?php echo site_url('save-employee'); ?>',
                    type: "POST",
                    data:{"id": id,"name": $(name).val(),"address": $(address).val(),"gender": $(gender).val(),"relationship": $(relationship).val(),"phone": $(phone).val(),"css": $(css).val(),"html": $(html).val(),"javascript": $(javascript).val()},
                    success:function(data)
                    {
                        swal("Successful!", "Edit Successful!", "success");
                    }
                });
            }
        }
    }

    function disable_row(id) {
        document.getElementById('row_name_'+id).readOnly = true;
        document.getElementById('row_address_'+id).readOnly = true;
        document.getElementById('row_name_'+id).classList.add("elementz");
        document.getElementById('row_address_'+id).classList.add("elementz");
        document.getElementById('btn_id_'+id).classList.remove("buttonHide");
        document.getElementById('btn_save_id'+id).classList.add("buttonHide");
        document.getElementById('row_gender_'+id).disabled = true;
        document.getElementById('row_gender_'+id).classList.add("elementz");
        document.getElementById('row_relationship_'+id).disabled = true;
        document.getElementById('row_relationship_'+id).classList.add("elementz");
        document.getElementById('row_phone_'+id).readOnly = true;
        document.getElementById('row_phone_'+id).classList.add("elementz");
        document.getElementById('row_css_'+id).disabled = true;
        document.getElementById('row_css_'+id).classList.add("elementz");
        document.getElementById('row_html_'+id).disabled = true;
        document.getElementById('row_html_'+id).classList.add("elementz");
        document.getElementById('row_javascript_'+id).disabled = true;
        document.getElementById('row_javascript_'+id).classList.add("elementz");
        document.getElementById('row_php_'+id).disabled = true;
        document.getElementById('row_php_'+id).classList.add("elementz");
    }

    function checkForm() {

        if (document.getElementById("css").checked||document.getElementById("html").checked||document.getElementById("javascript").checked){

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

    function phoneCheck() {

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
    }

    function deleteRow(id) {
        var id = id.id;

        document.getElementById("delete_id").value = id;

        return changeConfirm();
    }

    function changeRow(id) {
        var id = id.id;

        document.getElementById("change_id").value = id;

        document.getElementById("change_form").submit();
    }

    function changeConfirm() {
        swal({
            title: "Are You Sure?",
            text: "If You Want Delete This!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    document.getElementById("delete_form").submit();
                }
            });
        return false;
    }

</script>
<script>
    window.onload = function(e){
        var x="<?php if(isset($_SESSION['success'])){ echo $_SESSION['success'];}?>";
        if("1"==x){
            swal("Successful!", "Edit Successful!", "success");
            <?php $this->session->set_flashdata("success",null); ?>
        }else if("2"==x){
            swal("Successful!", "Delete Successful!", "success");
            <?php $this->session->set_flashdata("success",null); ?>
        }
        var y="<?php if(isset($_SESSION['error'])){ echo $_SESSION['error'];}?>";
        if("1"==y){
            showErrorMsg("This NIC Number Already Exists !");
            <?php $this->session->set_flashdata("error",null); ?>
        }
    }
</script>