<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/public/css/bootstrap.css">
    <!-- <link rel="stylesheet" href="<?php /*echo base_url(); */?>/public/css/styles.css">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="<?php echo base_url(); ?>/public/js/sweetalert.min.js"></script>
    <script src="<?php echo base_url(); ?>/public/js/validation.js"></script>

    <title>Register</title>
</head>
<body>
<div class="container">
    <div class="bg-light"
         style=" margin: 15%; margin-right: 15%; margin-top: 2%;box-shadow: 0 0.4629629629629629vh 0.5208333333333334vw 0 rgba(0,0,0,0.3);">

        <h4 style="color: #00CC00; margin-left: 30%">EMPLOYEE REGISTER FORM</h4>

        <form style="margin: 20%; margin-top: 1% " action="edit_empoyee" method="post" class="was-validated" onsubmit="return checkForm()" >
            <div class="form-group">
                <label for="id">ID :</label>
                <input type="text" class="form-control" name="id" value="<?php foreach ($emp as $row){ echo $row->id;} ?>" readonly>
            </div>

            <div class="form-group">
                <label for="name">Employee Name :</label>
                <input type="text" class="form-control" name="name" value="<?php foreach ($emp as $row){ echo $row->name;} ?>" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>

            <div class="form-group">
                <label for="gender">Gender :&emsp;</label>

                <label><input type="radio" class=" radio-inline" name="gender" value="Male" <?php foreach ($emp as $row){ if($row->gender=='Male'){ echo 'checked';}} ?> required >Male</label>
                <label><input type="radio" class="radio-inline" name="gender" value="Female" <?php foreach ($emp as $row){ if($row->gender=='Female'){ echo 'checked';}} ?> required>Female</label>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>

            </div>

            <div class="form-group">
                <label for="relationship">Relationship Status :</label>
                <select name="relationship" class="browser-default custom-select" required>
                    <option value="">Select Relationship State</option>
                    <option value="Single" <?php foreach ($emp as $row){ if($row->relationship=='Single'){ echo 'selected';}} ?>>Single</option>
                    <option value="Married"  <?php foreach ($emp as $row){ if($row->relationship=='Married'){ echo 'selected';}} ?>>Married</option>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </select>
            </div>

            <div class="form-group">
                <label for="address">Address :</label>
                <textarea class="form-control" name="address" required><?php foreach ($emp as $row){ echo $row->address;} ?></textarea>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>

            <div class="form-group">
                <label for="skills">Skills :</label>
                <div class="checkbox">
                    <label &emsp;><input type="checkbox" name="html" id="html" <?php foreach ($emp as $row){ if($row->html==1){ echo 'checked';}} ?>>HTML</label>
                    <label><input type="checkbox" name="css" id="css" <?php foreach ($emp as $row){ if($row->css==1){ echo 'checked';}} ?>>CSS</label>
                    <label><input type="checkbox" name="javascript" id="javascript" <?php foreach ($emp as $row){ if($row->javascript==1){ echo 'checked';}} ?> >JAVASCRIPT</label>
                    <label><input type="checkbox" name="php" id="php" <?php foreach ($emp as $row){ if($row->php==1){ echo 'checked';}} ?>>PHP</label>
                </div>
            </div>

            <div class="form-group">
                <label for="phone">Phone :</label>
                <input type="tel" pattern="[0-9]{10}" class="form-control" name="phone" id="phone" value="<?php foreach ($emp as $row){ echo $row->phone;} ?>" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <input style="margin-left: 10%" type="submit" value="Edit Details" class="btn btn-success">
    </div>

    </form>
</div>

</body>
</html>
<script>

    function checkForm(form) {

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

        return phoneCheck(form);
    }

    function phoneCheck(form) {

        var phone = document.getElementById("phone").value;

        re = /[0-9]{10}$/;
        if(!re.test(phone)) {
            swal({
                title: "Error",g
                text: "Your Entered Wrong Phone Number",
                icon: "warning",
                dangerMode: true,
        });
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

</script>