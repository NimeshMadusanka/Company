<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/css/bootstrap.css">
    <!-- <link rel="stylesheet" href="<?php /*echo base_url(); */ ?>/public/css/styles.css">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="<?php echo base_url(); ?>/public/js/sweetalert.min.js"></script>
    <script src="<?php echo base_url(); ?>/public/js/validation.js"></script>

    <title>Register</title>
</head>
<body>
<div class="container" style="">
    <!-- navigation bar -->
    <nav style="box-shadow: 0 0.4629629629629629vh 0.5208333333333334vw 0 rgba(0,0,0,0.3);"
         class="navbar navbar-expand-sm bg-light navbar-light">

        <i class="fa fa-book" style="font-size:48px;color:green; margin-right: 10px"></i>

        <a class="navbar-brand .text-success" href="">Telexar</a>


        <!-- Navigation Links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<i
                            class="fa fa-sign-in" style="color: green"></i> Register</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="EmployeeList"><i class="fa fa-folder-open" style="color: green"></i> Employee</a>
            </li>
        </ul>
    </nav>

    <div class="bg-light"
         style=" margin: 15%; margin-right: 15%; margin-top: 2%;box-shadow: 0 0.4629629629629629vh 0.5208333333333334vw 0 rgba(0,0,0,0.3);">

        <h4 style="color: #00CC00; margin-left: 30%">EMPLOYEE REGISTER FORM</h4>

        <form style="margin: 20%; margin-top: 1%" action="register" method="post" class="was-validated"
              onsubmit="return checkForm()">
            <div class="form-group">
                <label for="name">Employee Name :</label>
                <input type="text" class="form-control" name="name" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>

            <div class="form-group">
                <label for="gender">Gender :&emsp;</label>

                <label><input type="radio" class=" radio-inline" name="gender" value="Male" required>Male</label>
                <label><input type="radio" class="radio-inline" name="gender" value="Female" required>Female</label>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>

            </div>

            <div class="form-group">
                <label for="relationship">Relationship Status :</label>
                <select name="relationship" class="browser-default custom-select" required>
                    <option value="">Select Relationship State</option>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </select>
            </div>

            <div class="form-group">
                <label for="address">Address :</label>
                <textarea class="form-control" name="address" required></textarea>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>

            <div class="form-group">
                <label for="skills">Skills :</label>
                <div class="checkbox">
                    <label &emsp;><input type="checkbox" name="html" id="html">HTML</label>
                    <label><input type="checkbox" name="css" id="css">CSS</label>
                    <label><input type="checkbox" name="javascript" id="javascript">JAVASCRIPT</label>
                    <label><input type="checkbox" name="php" id="php">PHP</label>
                </div>
            </div>

            <div class="form-group">
                <label for="phone">Phone :</label>
                <input type="tel" pattern="[0-9]{10}" class="form-control" name="phone" id="phone" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <input style="margin-left: 35%; box-shadow: 0 0.4629629629629629vh 0.5208333333333334vw 0 rgba(0,0,0,0.3);"
                   type="submit" class="btn btn-success">
    </div>

    </form>
</div>

</body>
</html>
<script>
    window.onload = function (e) {
        var x = "<?php if (isset($_SESSION['success'])) {
            echo $_SESSION['success'];
        }?>";
        if ("1" == x) {
            swal("Data Added successfully!", "Registration Successful!", "success");
            <?php $this->session->set_flashdata("success", null); ?>
        }

    }
</script>