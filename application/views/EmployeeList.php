<!DOCTYPE html>
<html lang="en">
<head>
    <title>EmployeeList</title>

    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/css/bootstrap.css">
    <!-- <link rel="stylesheet" href="<?php /*echo base_url(); */ ?>/public/css/styles.css">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="<?php echo base_url(); ?>/public/js/sweetalert.min.js"></script>
    <script src="<?php echo base_url(); ?>/public/js/validation.js"></script>
</head>
<body>

<div class="container">
    <!-- navigation bar -->
    <nav style="box-shadow: 0 0.4629629629629629vh 0.5208333333333334vw 0 rgba(0,0,0,0.3);" class="navbar navbar-expand-sm bg-light navbar-light"><i class="fa fa-book" style="font-size:48px;color:green; margin-right: 10px"></i>

        <a class="navbar-brand .text-success" href="Register">Telexar</a>


        <!-- Navigation Links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>register">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<i
                            class="fa fa-sign-in" style="color: green"></i> Register</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href=""><i class="fa fa-folder-open" style="color: green"></i> Employees</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout"><i class="fa fa-folder-open" style="color: green"></i> Logout</a>
            </li>
        </ul>
    </nav>

    <div>
        <table style="box-shadow: 0 0.4629629629629629vh 0.5208333333333334vw 0 rgba(0,0,0,0.3); margin: 0.01%"
               class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Status</th>
                <th>Address</th>
                <th>HTML</th>
                <th>CSS</th>
                <th>JAVASCRIPT</th>
                <th>PHP</th>
                <th>Phone</th>
                <th>Image</th>
                <th>EDIT</th>
                <th>DELETE</th>
            </tr>
            </thead>
            <tbody id="userData">

            <?php foreach($emp as $post){

            echo'
                <tr>
                    <td>'.$post['id'].'</td>
                    <td>'.$post['name'].'</td>
                    <td>'.$post['gender'].'</td>
                    <td>'.$post['relationship'].'</td>
                    <td>'.$post['address'].'</td>
                    <td>'; if($post['html'] == 1){
                        echo '&emsp;&#10003;';
                        } else{
                        echo '&emsp;&#10007;';
                        }echo '</td>

                    <td>'; if($post['css'] == 1){
                            echo '&emsp;&#10003;';
                        } else{
                            echo '&emsp;&#10007;';
                        }echo '</td>

                    <td>'; if($post['javascript'] == 1){
                            echo '&emsp;&emsp;&emsp;&#10003;';
                        } else{
                            echo '&emsp;&emsp;&emsp;&#10007;';
                        }echo '</td>

                    <td>'; if($post['php'] == 1){
                            echo '&emsp;&#10003;';
                        } else{
                            echo '&emsp;&#10007;';
                        }echo '</td>

                    <td>'.$post['phone'].'</td>
                    <td><img src="'.base_url().$post['image'].'" style="width:50px; height:50px "></td>

                    <td><input type="button" class="btn btn-outline-success" id="'.$post['id'].'" value="Edit" onclick="changeRow(this)"></td>
                    <td><input type="button" class="btn btn-outline-danger" id="'.$post['id'].'" value="Delete" onclick="deleteRow(this)"></td>


                </tr>
            ';}?>

            </tbody>
        </table>

    </div>
    <div>
        <!--render pagination links-->
        <ul class="pagination ">
            <?php echo $this->pagination->create_links(); ?>
        </ul>
    </div>
</div>

<div style="display: none;">
    <form action="<?php echo base_url('edit-employee');?>" method="GET" id="change_form">
        <input type="text" name="change_id" id="change_id">
    </form>
</div>

<div style="display: none;">
    <form action="<?php echo base_url('delete-employee');?>" method="post" id="delete_form">
        <input type="text" name="delete_id" id="delete_id">
    </form>
</div>

</body>
</html>
<script>
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

    window.onload = function (e) {
        var x = "<?php if (isset($_SESSION['success'])) {
            echo $_SESSION['success'];
        }?>";
        if ("1" == x) {
            swal("Successful!", "Edit Successful!", "success");
            <?php $this->session->set_flashdata("success", null); ?>
        } else if ("2" == x) {
            swal("Successful!", "Delete Successful!", "success");
            <?php $this->session->set_flashdata("success", null); ?>
        }


    }

</script>