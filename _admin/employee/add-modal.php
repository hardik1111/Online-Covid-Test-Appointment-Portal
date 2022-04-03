<?php 
    require_once '../../config/db_connect.php';
    $countSql="SELECT * FROM `employees`";
    $resultCount=mysqli_query($conn,$countSql);
    $numRows=mysqli_num_rows($resultCount);
   
    $query="SELECT emp_digit FROM employees ORDER BY emp_digit DESC LIMIT 1";
    $result=mysqli_query($conn,$query);
   
    if($numRows==0)
    {
        $empId=$empChar.$empDigit; 
    }
    else{
        $data=mysqli_fetch_assoc($result);
        $lastId=$data['emp_digit'];
        $empDigit=(int)$lastId+1;
        $empId=$empChar.$empDigit; 
    }
?>
<script>
function validate_password() {
    var pass = empPass.value;
    var rpass = empRpass.value;
    if (pass === rpass) {
        document.getElementById("registerForm").submit();
    } else {
        alert("Password and Re-Type Password should be same");
        document.getElementById("empPass").value = "";
        document.getElementById("empRpass").value = "";
        document.getElementById("empPass").focus();
        return false;
    }
}
</script>
<!-- The Modal -->
<div class="modal-dialog modal-lg">
    <div class="modal-content">

        <section class="card">
            <header class="card-header">
                <h2 class="card-title">Employee Registration </h2>
            </header>
            <form action="_manage_emp.php" method="POST"  id="registerForm" name="registerForm" onsubmit="return validate_password();">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label for="empId">Employee ID</label>
                            <input type="text" class="form-control" id="empId" name="empId" placeholder="Employee ID" value="<?php echo $empId; ?>" readonly>
                            <input type="hidden" value="<?php echo $empDigit; ?>" name="empDigit">
                        </div>
                        <div class="col-md-6">
                            <label for="empType">Employee Type</label>
                            <input type="text" class="form-control" id="empType" name="empType"
                                placeholder="Employee Type">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="empName">Name</label>
                        <input type="text" class="form-control" id="empName" name="empName" placeholder="Employee Name">
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label for="empDob">Date of Birth</label>
                            <input type="date" class="form-control" id="empDob" name="empDob"
                                placeholder="Date of Birth">
                        </div>
                        <div class="col-md-6">
                            <label for="empDoj">Date of Joining</label>
                            <input type="date" class="form-control" id="empDoj" name="empDoj"
                                placeholder="Date of Joining">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="empAddr">Address</label>
                        <textarea class="form-control" id="empAddr" name="empAddr"
                            placeholder="Apartment, City, State, Pincode"></textarea>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label for="empContact">Employee Number</label>
                            <input type="number" class="form-control" id="empContact" name="empContact"
                                placeholder="Employee Number">
                        </div>
                        <div class="col-md-6">
                            <label for="empEmail">Email</label>
                            <input type="email" class="form-control" id="empEmail" name="empEmail"
                                placeholder="Employee Email">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label for="empPass">Password</label>
                            <input type="password" class="form-control" id="empPass" name="empPass"
                                placeholder="Password">
                        </div>
                        <div class="col-md-6">
                            <label for="empRpass">Re-Type Password</label>
                            <input type="password" class="form-control" id="empRpass" name="empRpass"
                                placeholder="Re-Type Password">
                        </div>
                    </div>
                </div>
                <footer class="card-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-success modal-confirm">Add Employee</button>
                            <input type="hidden" value="_add_employee" name="action">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </footer>
            </form>
        </section>

    </div>
</div>