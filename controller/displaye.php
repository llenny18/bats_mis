<?php




function displayDailyLogs($conn)
{
    $sql = "SELECT * FROM employeedetails inner join attendance on attendance.user_id = employeedetails.employee_id";
    $result = $conn->query($sql);


?>
    <div class="card">
        <h5 class="card-header">Employee List and Information</h5>
        <div class="table-responsive text-nowrap">
            <table class="table" id="zero_config">
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Employment Type</th>
                        <th>Time In and Time Out</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["first_name"] . " " . $row["last_name"] . "</td>";
                            echo "<td>" . $row["employment_type"] . "</td>";
                            echo "<td>" . date("g:i a", strtotime($row["time_in"])) . " - " . date("g:i a", strtotime($row["time_out"])) .  "</td>";
                            echo "<td>" . date("F j, Y", strtotime($row["date"])) . "</td>";


                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8'>No results found</td></tr>";
                    }
                    ?>
                </tbody>
                <tfoot class="table-border-bottom-0">
                    <tr>
                        <th>Full Name</th>
                        <th>Employment Type</th>
                        <th>Time In and Time Out</th>
                        <th>Date</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>



<?php

}


function displayUserEmployees($conn)
{
    $sql = "SELECT employee_id, user_name, first_name, last_name, employment_type, date_of_birth, email, phone_number FROM employeedetails";
    $result = $conn->query($sql);


?>
    <div class="card">
        <h5 class="card-header">Employee List and Information <a href="manage-employee.php" class="btn btn-primary m-1"> + Register an Employee</a></h5>
        <div class="table-responsive text-nowrap">
            <table class="table" id="zero_config1">
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Employment Type</th>
                        <th>Date of Birth</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Account Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["first_name"] . " " . $row["last_name"] . "</td>";
                            echo "<td>" . $row["employment_type"] . "</td>";
                            echo "<td>" . $row["date_of_birth"] . "</td>";
                            echo "<td>" . $row["email"] . "</td>";
                            echo "<td>" . $row["phone_number"] . "</td>";
                            viewEmployeeAccountStatus($conn, $row["employee_id"]);

                            echo "<td>";
                    ?>
                            <div class="dropdown text-center">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item btn btn-success mb-1" href="../controller/manage-employees.php?employee_id=<?= $row["employee_id"] ?>&purpose=activate"><i class="bx bx-edit-alt me-2"></i> Activate</a>
                                    <a class="dropdown-item btn btn-primary mb-1" href="manage-employee.php?employee_id=<?= $row["employee_id"] ?>"><i class="bx bx-edit-alt me-2"></i> Edit</a>
                                    <a class="dropdown-item btn btn-danger mb-1" href="../controller/manage-employees.php?employee_id=<?= $row["employee_id"] ?>&purpose=delete"><i class="bx bx-trash me-2"></i> Delete</a>
                                </div>
                            </div>
                    <?php
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8'>No results found</td></tr>";
                    }
                    ?>
                </tbody>
                <tfoot class="table-border-bottom-0">
                    <tr>
                        <th>Full Name</th>
                        <th>Employment Type</th>
                        <th>Date of Birth</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Account Status</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>



<?php

}


function displayUsers($conn)
{
    $sql = "SELECT * FROM `users`";
    $result = $conn->query($sql);


?>
    <div class="card">
        <h5 class="card-header">Employee List and Information<a href="manage-admin.php" class="btn btn-primary m-1"> + Register an Administrator</a></h5>
        <div class="table-responsive text-nowrap">
            <table class="table" id="zero_config">
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["name"]  . "</td>";
                            echo "<td>" . $row["username"] . "</td>";
                            echo "<td>" . $row["email"] . "</td>";
                            echo "<td>" . $row["contact_number"] . "</td>";

                            echo "<td>";
                    ?>
                            <div class="dropdown text-center">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="manage-admin.php?user_id=<?= $row["user_id"] ?>"><i class="bx bx-edit-alt me-2"></i> Edit</a>
                                    <a class="dropdown-item" href="../controller/manage.php?user_id=<?= $row["user_id"] ?>&purpose=delete_user"><i class="bx bx-trash me-2"></i> Delete</a>
                                </div>
                            </div>
                    <?php
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8'>No results found</td></tr>";
                    }
                    ?>
                </tbody>
                <tfoot class="table-border-bottom-0">
                    <tr>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>



<?php

}




function viewLeaveStatus($conn, $eid)
{
    $sql = "SELECT * FROM `leavemanagement` WHERE leave_id = {$eid}";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row['status'] == "pending") {
            echo "<td>" . '<span class="badge bg-label-warning me-1">Pending</span>' . "</td>";
        } else if ($row['status'] == "approved") {
            echo "<td>" . '<span class="badge bg-label-success me-1">Approved</span>' . "</td>";
        } else if ($row['status'] == "declined") {
            echo "<td>" . '<span class="badge bg-label-danger me-1">Declined</span>' . "</td>";
        }
    } else {
        echo "<td>" . '<span class="badge bg-label-danger me-1">Absent</span>' . "</td>";
    }
}


function viewEmployeeStatus($conn, $eid)
{
    $sql = "SELECT * FROM `attendance` WHERE date = date(curdate()) and user_id = {$eid}";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row['status'] == "present") {
            echo "<td>" . '<span class="badge bg-label-success me-1">Present</span>' . "</td>";
        } else if ($row['status'] == "absent") {
            echo "<td>" . '<span class="badge bg-label-danger me-1">Absent</span>' . "</td>";
        } else if ($row['status'] == "on_leave") {
            echo "<td>" . '<span class="badge bg-label-warning me-1">On Leave</span>' . "</td>";
        }
    } else {
        echo "<td>" . '<span class="badge bg-label-danger me-1">Absent</span>' . "</td>";
    }
}


function viewEmployeeAccountStatus($conn, $eid)
{
    $sql = "SELECT * FROM `employeedetails` WHERE employee_id = {$eid}";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row['e_status'] == "Active") {
            echo "<td class='text-center'>" . '<span class="badge bg-label-success me-1">Active</span>' . "</td>";
        } else if ($row['e_status'] == "Deleted") {
            echo "<td class='text-center'>" . '<span class="badge bg-label-danger me-1">Deleted</span>' . "</td>";
        }
    } else {
        echo "<td>" . '<span class="badge bg-label-danger me-1">Deleted</span>' . "</td>";
    }
}


function displayEmployees($conn)
{
    $sql = "SELECT employee_id, user_name, first_name, last_name, employment_type, date_of_birth, email, phone_number FROM employeedetails where e_status = 'Active'";
    $result = $conn->query($sql);
?>
    <div class="card">
        <h5 class="card-header">Employee List and Information</h5>
        <div class="table-responsive text-nowrap">
            <table class="table" id="zero_config">
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Employment Type</th>
                        <th>Date of Birth</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Status</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["first_name"] . " " . $row["last_name"] . "</td>";
                            echo "<td>" . $row["employment_type"] . "</td>";
                            echo "<td>" . $row["date_of_birth"] . "</td>";
                            echo "<td>" . $row["email"] . "</td>";
                            echo "<td>" . $row["phone_number"] . "</td>";
                            viewEmployeeStatus($conn, $row["employee_id"]);


                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8'>No results found</td></tr>";
                    }
                    ?>
                </tbody>
                <tfoot class="table-border-bottom-0">
                    <tr>
                        <th>Full Name</th>
                        <th>Employment Type</th>
                        <th>Date of Birth</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Status</th>

                    </tr>
                </tfoot>
            </table>
        </div>
    </div>



<?php

}



function displayEmployeesOnLeave($conn)
{
    $sql = "SELECT employee_id, user_name, first_name, last_name, employment_type, date_of_birth, email, phone_number FROM employeedetails inner join attendance on attendance.user_id = employeedetails.employee_id where attendance.status = 'on_leave' and e_status = 'Active' and attendance.date  = curdate()";
    $result = $conn->query($sql);
?>
    <div class="card">
        <h5 class="card-header">Employee List and Information</h5>
        <div class="table-responsive text-nowrap">
            <table class="table" id="zero_config">
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Employment Type</th>
                        <th>Date of Birth</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Status</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["first_name"] . " " . $row["last_name"] . "</td>";
                            echo "<td>" . $row["employment_type"] . "</td>";
                            echo "<td>" . $row["date_of_birth"] . "</td>";
                            echo "<td>" . $row["email"] . "</td>";
                            echo "<td>" . $row["phone_number"] . "</td>";
                            viewEmployeeStatus($conn, $row["employee_id"]);


                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8'>No results found</td></tr>";
                    }
                    ?>
                </tbody>
                <tfoot class="table-border-bottom-0">
                    <tr>
                        <th>Full Name</th>
                        <th>Employment Type</th>
                        <th>Date of Birth</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Status</th>

                    </tr>
                </tfoot>
            </table>
        </div>
    </div>



<?php

}

function displayEmployeesPresent($conn)
{
    $sql = "SELECT employee_id, user_name, first_name, last_name, employment_type, date_of_birth, email, phone_number FROM employeedetails inner join attendance on attendance.user_id = employeedetails.employee_id where attendance.status = 'present' and e_status = 'Active' and attendance.date  = curdate()";
    $result = $conn->query($sql);
?>
    <div class="card">
        <h5 class="card-header">Employee List and Information</h5>
        <div class="table-responsive text-nowrap">
            <table class="table" id="zero_config">
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Employment Type</th>
                        <th>Date of Birth</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Status</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["first_name"] . " " . $row["last_name"] . "</td>";
                            echo "<td>" . $row["employment_type"] . "</td>";
                            echo "<td>" . $row["date_of_birth"] . "</td>";
                            echo "<td>" . $row["email"] . "</td>";
                            echo "<td>" . $row["phone_number"] . "</td>";
                            viewEmployeeStatus($conn, $row["employee_id"]);


                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8'>No results found</td></tr>";
                    }
                    ?>
                </tbody>
                <tfoot class="table-border-bottom-0">
                    <tr>
                        <th>Full Name</th>
                        <th>Employment Type</th>
                        <th>Date of Birth</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Status</th>

                    </tr>
                </tfoot>
            </table>
        </div>
    </div>



<?php

}

function displayEmployeesAbsent($conn)
{
    $sql = "SELECT employee_id, user_name, first_name, last_name, employment_type, date_of_birth, email, phone_number FROM employeedetails left join attendance on attendance.user_id = employeedetails.employee_id where attendance.status = 'absent' or  NOT EXISTS (SELECT 1 
                   FROM   employeedetails 
                   WHERE  employeedetails.employee_id = attendance.user_id)  and e_status = 'Active'";
    $result = $conn->query($sql);
?>
    <div class="card">
        <h5 class="card-header">Employee List and Information</h5>
        <div class="table-responsive text-nowrap">
            <table class="table" id="zero_config">
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Employment Type</th>
                        <th>Date of Birth</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Status</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["first_name"] . " " . $row["last_name"] . "</td>";
                            echo "<td>" . $row["employment_type"] . "</td>";
                            echo "<td>" . $row["date_of_birth"] . "</td>";
                            echo "<td>" . $row["email"] . "</td>";
                            echo "<td>" . $row["phone_number"] . "</td>";
                            viewEmployeeStatus($conn, $row["employee_id"]);


                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8'>No results found</td></tr>";
                    }
                    ?>
                </tbody>
                <tfoot class="table-border-bottom-0">
                    <tr>
                        <th>Full Name</th>
                        <th>Employment Type</th>
                        <th>Date of Birth</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Status</th>

                    </tr>
                </tfoot>
            </table>
        </div>
    </div>



<?php

}


function displayAdminLeaveCredits($conn) {
    // Query for Admin Remaining Leave Credits by Month
    $sql = "SELECT * FROM admin_leavecredits";
    $result = $conn->query($sql);
    
    ?>
    <div class="card">
        <h5 class="card-header">Admin Remaining Leave Credits by Month</h5>
        <div class="table-responsive text-nowrap">
            <table class="table" id="zero_config">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>User Type</th>
                        <th>Jan Sick Leave</th>
                        <th>Feb Sick Leave</th>
                        <th>Mar Sick Leave</th>
                        <th>Apr Sick Leave</th>
                        <th>May Sick Leave</th>
                        <th>Jun Sick Leave</th>
                        <th>Jul Sick Leave</th>
                        <th>Aug Sick Leave</th>
                        <th>Sep Sick Leave</th>
                        <th>Oct Sick Leave</th>
                        <th>Nov Sick Leave</th>
                        <th>Dec Sick Leave</th>
                        <th>Jan Vacation Leave</th>
                        <th>Feb Vacation Leave</th>
                        <th>Mar Vacation Leave</th>
                        <th>Apr Vacation Leave</th>
                        <th>May Vacation Leave</th>
                        <th>Jun Vacation Leave</th>
                        <th>Jul Vacation Leave</th>
                        <th>Aug Vacation Leave</th>
                        <th>Sep Vacation Leave</th>
                        <th>Oct Vacation Leave</th>
                        <th>Nov Vacation Leave</th>
                        <th>Dec Vacation Leave</th>
                        <th>Jan Special Leave</th>
                        <th>Feb Special Leave</th>
                        <th>Mar Special Leave</th>
                        <th>Apr Special Leave</th>
                        <th>May Special Leave</th>
                        <th>Jun Special Leave</th>
                        <th>Jul Special Leave</th>
                        <th>Aug Special Leave</th>
                        <th>Sep Special Leave</th>
                        <th>Oct Special Leave</th>
                        <th>Nov Special Leave</th>
                        <th>Dec Special Leave</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["first_name"] . " " . $row["last_name"] . "</td>";
                            echo "<td>" . $row["employment_type"] . "</td>";
                            echo "<td>" . $row["Jan_sick_leave"] . "</td>";
                            echo "<td>" . $row["Feb_sick_leave"] . "</td>";
                            echo "<td>" . $row["Mar_sick_leave"] . "</td>";
                            echo "<td>" . $row["Apr_sick_leave"] . "</td>";
                            echo "<td>" . $row["May_sick_leave"] . "</td>";
                            echo "<td>" . $row["Jun_sick_leave"] . "</td>";
                            echo "<td>" . $row["Jul_sick_leave"] . "</td>";
                            echo "<td>" . $row["Aug_sick_leave"] . "</td>";
                            echo "<td>" . $row["Sep_sick_leave"] . "</td>";
                            echo "<td>" . $row["Oct_sick_leave"] . "</td>";
                            echo "<td>" . $row["Nov_sick_leave"] . "</td>";
                            echo "<td>" . $row["Dec_sick_leave"] . "</td>";
                            echo "<td>" . $row["Jan_vacation_leave"] . "</td>";
                            echo "<td>" . $row["Feb_vacation_leave"] . "</td>";
                            echo "<td>" . $row["Mar_vacation_leave"] . "</td>";
                            echo "<td>" . $row["Apr_vacation_leave"] . "</td>";
                            echo "<td>" . $row["May_vacation_leave"] . "</td>";
                            echo "<td>" . $row["Jun_vacation_leave"] . "</td>";
                            echo "<td>" . $row["Jul_vacation_leave"] . "</td>";
                            echo "<td>" . $row["Aug_vacation_leave"] . "</td>";
                            echo "<td>" . $row["Sep_vacation_leave"] . "</td>";
                            echo "<td>" . $row["Oct_vacation_leave"] . "</td>";
                            echo "<td>" . $row["Nov_vacation_leave"] . "</td>";
                            echo "<td>" . $row["Dec_vacation_leave"] . "</td>";
                            echo "<td>" . $row["Jan_special_leave"] . "</td>";
                            echo "<td>" . $row["Feb_special_leave"] . "</td>";
                            echo "<td>" . $row["Mar_special_leave"] . "</td>";
                            echo "<td>" . $row["Apr_special_leave"] . "</td>";
                            echo "<td>" . $row["May_special_leave"] . "</td>";
                            echo "<td>" . $row["Jun_special_leave"] . "</td>";
                            echo "<td>" . $row["Jul_special_leave"] . "</td>";
                            echo "<td>" . $row["Aug_special_leave"] . "</td>";
                            echo "<td>" . $row["Sep_special_leave"] . "</td>";
                            echo "<td>" . $row["Oct_special_leave"] . "</td>";
                            echo "<td>" . $row["Nov_special_leave"] . "</td>";
                            echo "<td>" . $row["Dec_special_leave"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='37'>No results found</td></tr>";
                    }
                    ?>
                </tbody>
                <tfoot class="table-border-bottom-0">
                    <tr>
                        <th>Name</th>
                        <th>User Type</th>
                        <th>Jan Sick Leave</th>
                        <th>Feb Sick Leave</th>
                        <th>Mar Sick Leave</th>
                        <th>Apr Sick Leave</th>
                        <th>May Sick Leave</th>
                        <th>Jun Sick Leave</th>
                        <th>Jul Sick Leave</th>
                        <th>Aug Sick Leave</th>
                        <th>Sep Sick Leave</th>
                        <th>Oct Sick Leave</th>
                        <th>Nov Sick Leave</th>
                        <th>Dec Sick Leave</th>
                        <th>Jan Vacation Leave</th>
                        <th>Feb Vacation Leave</th>
                        <th>Mar Vacation Leave</th>
                        <th>Apr Vacation Leave</th>
                        <th>May Vacation Leave</th>
                        <th>Jun Vacation Leave</th>
                        <th>Jul Vacation Leave</th>
                        <th>Aug Vacation Leave</th>
                        <th>Sep Vacation Leave</th>
                        <th>Oct Vacation Leave</th>
                        <th>Nov Vacation Leave</th>
                        <th>Dec Vacation Leave</th>
                        <th>Jan Special Leave</th>
                        <th>Feb Special Leave</th>
                        <th>Mar Special Leave</th>
                        <th>Apr Special Leave</th>
                        <th>May Special Leave</th>
                        <th>Jun Special Leave</th>
                        <th>Jul Special Leave</th>
                        <th>Aug Special Leave</th>
                        <th>Sep Special Leave</th>
                        <th>Oct Special Leave</th>
                        <th>Nov Special Leave</th>
                        <th>Dec Special Leave</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <?php
}


function displayEmployeeLeaveCredits($conn, $uid) {
    // Query for Employee Leave Credits by Month
    $sql = "SELECT * FROM employee_leavecredits where user_id = $uid";
    $result = $conn->query($sql);
    
    ?>
    <div class="card">
        <h5 class="card-header">Employee Leave Credits by Month</h5>
        <div class="table-responsive text-nowrap">
            <table class="table" id="zero_config">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Employment Type</th>
                        <th>Jan Sick Leave</th>
                        <th>Feb Sick Leave</th>
                        <th>Mar Sick Leave</th>
                        <th>Apr Sick Leave</th>
                        <th>May Sick Leave</th>
                        <th>Jun Sick Leave</th>
                        <th>Jul Sick Leave</th>
                        <th>Aug Sick Leave</th>
                        <th>Sep Sick Leave</th>
                        <th>Oct Sick Leave</th>
                        <th>Nov Sick Leave</th>
                        <th>Dec Sick Leave</th>
                        <th>Jan Vacation Leave</th>
                        <th>Feb Vacation Leave</th>
                        <th>Mar Vacation Leave</th>
                        <th>Apr Vacation Leave</th>
                        <th>May Vacation Leave</th>
                        <th>Jun Vacation Leave</th>
                        <th>Jul Vacation Leave</th>
                        <th>Aug Vacation Leave</th>
                        <th>Sep Vacation Leave</th>
                        <th>Oct Vacation Leave</th>
                        <th>Nov Vacation Leave</th>
                        <th>Dec Vacation Leave</th>
                        <th>Jan Special Leave</th>
                        <th>Feb Special Leave</th>
                        <th>Mar Special Leave</th>
                        <th>Apr Special Leave</th>
                        <th>May Special Leave</th>
                        <th>Jun Special Leave</th>
                        <th>Jul Special Leave</th>
                        <th>Aug Special Leave</th>
                        <th>Sep Special Leave</th>
                        <th>Oct Special Leave</th>
                        <th>Nov Special Leave</th>
                        <th>Dec Special Leave</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["first_name"] . " " . $row["last_name"] . "</td>";
                            echo "<td>" . $row["employment_type"] . "</td>";
                            echo "<td>" . $row["Jan_sick_leave"] . "</td>";
                            echo "<td>" . $row["Feb_sick_leave"] . "</td>";
                            echo "<td>" . $row["Mar_sick_leave"] . "</td>";
                            echo "<td>" . $row["Apr_sick_leave"] . "</td>";
                            echo "<td>" . $row["May_sick_leave"] . "</td>";
                            echo "<td>" . $row["Jun_sick_leave"] . "</td>";
                            echo "<td>" . $row["Jul_sick_leave"] . "</td>";
                            echo "<td>" . $row["Aug_sick_leave"] . "</td>";
                            echo "<td>" . $row["Sep_sick_leave"] . "</td>";
                            echo "<td>" . $row["Oct_sick_leave"] . "</td>";
                            echo "<td>" . $row["Nov_sick_leave"] . "</td>";
                            echo "<td>" . $row["Dec_sick_leave"] . "</td>";
                            echo "<td>" . $row["Jan_vacation_leave"] . "</td>";
                            echo "<td>" . $row["Feb_vacation_leave"] . "</td>";
                            echo "<td>" . $row["Mar_vacation_leave"] . "</td>";
                            echo "<td>" . $row["Apr_vacation_leave"] . "</td>";
                            echo "<td>" . $row["May_vacation_leave"] . "</td>";
                            echo "<td>" . $row["Jun_vacation_leave"] . "</td>";
                            echo "<td>" . $row["Jul_vacation_leave"] . "</td>";
                            echo "<td>" . $row["Aug_vacation_leave"] . "</td>";
                            echo "<td>" . $row["Sep_vacation_leave"] . "</td>";
                            echo "<td>" . $row["Oct_vacation_leave"] . "</td>";
                            echo "<td>" . $row["Nov_vacation_leave"] . "</td>";
                            echo "<td>" . $row["Dec_vacation_leave"] . "</td>";
                            echo "<td>" . $row["Jan_special_leave"] . "</td>";
                            echo "<td>" . $row["Feb_special_leave"] . "</td>";
                            echo "<td>" . $row["Mar_special_leave"] . "</td>";
                            echo "<td>" . $row["Apr_special_leave"] . "</td>";
                            echo "<td>" . $row["May_special_leave"] . "</td>";
                            echo "<td>" . $row["Jun_special_leave"] . "</td>";
                            echo "<td>" . $row["Jul_special_leave"] . "</td>";
                            echo "<td>" . $row["Aug_special_leave"] . "</td>";
                            echo "<td>" . $row["Sep_special_leave"] . "</td>";
                            echo "<td>" . $row["Oct_special_leave"] . "</td>";
                            echo "<td>" . $row["Nov_special_leave"] . "</td>";
                            echo "<td>" . $row["Dec_special_leave"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='37'>No results found</td></tr>";
                    }
                    ?>
                </tbody>
                <tfoot class="table-border-bottom-0">
                    <tr>
                        <th>Name</th>
                        <th>Employment Type</th>
                        <th>Jan Sick Leave</th>
                        <th>Feb Sick Leave</th>
                        <th>Mar Sick Leave</th>
                        <th>Apr Sick Leave</th>
                        <th>May Sick Leave</th>
                        <th>Jun Sick Leave</th>
                        <th>Jul Sick Leave</th>
                        <th>Aug Sick Leave</th>
                        <th>Sep Sick Leave</th>
                        <th>Oct Sick Leave</th>
                        <th>Nov Sick Leave</th>
                        <th>Dec Sick Leave</th>
                        <th>Jan Vacation Leave</th>
                        <th>Feb Vacation Leave</th>
                        <th>Mar Vacation Leave</th>
                        <th>Apr Vacation Leave</th>
                        <th>May Vacation Leave</th>
                        <th>Jun Vacation Leave</th>
                        <th>Jul Vacation Leave</th>
                        <th>Aug Vacation Leave</th>
                        <th>Sep Vacation Leave</th>
                        <th>Oct Vacation Leave</th>
                        <th>Nov Vacation Leave</th>
                        <th>Dec Vacation Leave</th>
                        <th>Jan Special Leave</th>
                        <th>Feb Special Leave</th>
                        <th>Mar Special Leave</th>
                        <th>Apr Special Leave</th>
                        <th>May Special Leave</th>
                        <th>Jun Special Leave</th>
                        <th>Jul Special Leave</th>
                        <th>Aug Special Leave</th>
                        <th>Sep Special Leave</th>
                        <th>Oct Special Leave</th>
                        <th>Nov Special Leave</th>
                        <th>Dec Special Leave</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <?php
}



function displayLeaveManagement($conn, $eid)
{
    $sql = "SELECT * FROM leavemanagement inner join employeedetails on employeedetails.employee_id =leavemanagement.user_id where user_id=$eid";
    $result = $conn->query($sql);
?>
    <div class="card">
        <h5 class="card-header">Leave Management Information</h5>
        <div class="table-responsive text-nowrap">
            <table class="table" id="zero_config">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>User Type</th>
                        <th>More Info</th>
                        <th>File</th>
                        <th>Leave Type</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Status</th>
                       
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["first_name"] . " " . $row["last_name"] . "</td>";
                            echo "<td>" . $row["user_type"] . "</td>";
                            echo "<td>" . $row["more_info"] . "</td>";
                            echo "<td>"; ?>

                            <iframe src="data:application/pdf;base64,<?php echo base64_encode($row['file_data']); ?>"
                                type="application/pdf" height="500px"></iframe>

                            <?php echo "</td>";
                            echo "<td>" . $row["leave_type"] . "</td>";
                            echo "<td>" . $row["start_date"] . "</td>";
                            echo "<td>" . $row["end_date"] . "</td>";
                            viewLeaveStatus($conn, $row["leave_id"]);

                            
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='9'>No results found</td></tr>";
                    }
                    ?>
                </tbody>
                <tfoot class="table-border-bottom-0">
                    <tr>
                        <th>Name</th>
                        <th>User Type</th>
                        <th>More Info</th>
                        <th>Leave Type</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Status</th>
                     
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
<?php
}






function displayEmployeeFiles($conn)
{
    $sql = "SELECT employee_id, user_name, first_name, last_name, employment_type, date_of_birth, email, phone_number FROM employeedetails";
    $result = $conn->query($sql);
?>
    <div class="card">
        <h5 class="card-header">Employee List and Information</h5>
        <div class="table-responsive text-nowrap">
            <table class="table" id="zero_config">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Employment Type</th>
                        <th>Action</th>


                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["employee_id"] . "</td>";
                            echo "<td>" . $row["first_name"] . " " . $row["last_name"] . "</td>";
                            echo "<td>" . $row["employment_type"] . "</td>";
                            echo "<td><a class='btn btn-success' href='view-efiles.php?user_id= " . $row["employee_id"] . "' >View Files</a></td>";



                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8'>No results found</td></tr>";
                    }
                    ?>
                </tbody>
                <tfoot class="table-border-bottom-0">
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Employment Type</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>



<?php

}




















function displayEmployeeFileSeparated($conn, $eid)
{
    $sql = "SELECT employee_id, user_name, first_name, last_name, employment_type, date_of_birth, email, phone_number FROM employeedetails Where employee_id = $eid";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
?>
    <div class="card">Files of <?= $row['employee_id'] . ": " . $row["first_name"] . " " . $row["last_name"] ?></h5>
        <div class="table-responsive text-nowrap">
            <table class="table" id="zero_config">
                <thead>
                    <tr>
                        <th>File Type</th>
                        <th>File Content</th>
                        <th>File Description</th>
                        <th>Action</th>


                    </tr>
                </thead>
                <tbody>
                    <?php

                    $sql1ch = "SELECT * FROM `files` WHERE user_id = $eid and user_type='employee' and f_status = 'Saved'";
                    $result1ch = $conn->query($sql1ch);

                    if ($result1ch->num_rows > 0) {
                        // Output data of each row
                        $sql1 = "SELECT * FROM `files` WHERE user_id = $eid and user_type='employee' and file_type='pds' and f_status = 'Saved'";
                        $result1 = $conn->query($sql1);

                        if ($result1->num_rows > 0) {
                            // Output data of each row
                            while ($rowpds = $result1->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $rowpds["file_type"] . "</td>";
                                if ((strpos($rowpds["file_path"], '.pdf') !== false)) {
                                    echo "<td>";
                    ?>
                                    <iframe src="<?= $rowpds["file_path"] ?>" width="600" height="400"></iframe>
                                <?php
                                    echo "/<td>";
                                }
                                if (((strpos($rowpds["file_path"], '.xls') !== false)) || ((strpos($rowpds["file_path"], '.xlsx') !== false))) {
                                    echo "<td>" . '<div id="output' . $rowpds["file_id"] . '"></div>' . "  </td>";
                                }

                                echo "<td>" . $rowpds["file_description"] . "</td>";


                                echo "<td>";
                                ?>
                                <div class="dropdown text-center">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item btn btn-primary mb-1" href='" . $rowpds["file_path"] . "' download"><i class="bx bx-download me-2"></i> Download</a>
                                        <a class="dropdown-item btn btn-danger mb-1" href="../controller/manage-filese.php?file_id=" . $rowpds["file_id"] . "&purpose=delete"><i class="bx bx-trash me-2"></i> Delete</a>
                                    </div>
                                </div>
                                <?php
                                echo "</td>";





                                echo "</tr>";


                                ?>
                                <script>
                                    function readFile(filePath) {
                                        fetch(filePath)
                                            .then(response => response.arrayBuffer())
                                            .then(data => {
                                                const workbook = XLSX.read(data, {
                                                    type: 'array'
                                                });
                                                const sheetHtml = XLSX.utils.sheet_to_html(workbook.Sheets[workbook.SheetNames[0]], {
                                                    id: 'table_sheet'
                                                }); // Adding id and border properties
                                                document.getElementById('output<?= $rowpds["file_id"] ?>').innerHTML = sheetHtml;
                                            });
                                    }

                                    readFile('<?= $rowpds["file_path"] ?>');
                                </script>

                                <?php

                            }
                        }



                        $sql1 = "SELECT * FROM `files` WHERE user_id = $eid and user_type='employee' and file_type='saln' and f_status = 'Saved'";
                        $result1 = $conn->query($sql1);

                        if ($result1->num_rows > 0) {
                            // Output data of each row
                            while ($rowpds = $result1->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $rowpds["file_type"] . "</td>";
                                if ((strpos($rowpds["file_path"], '.pdf') !== false)) {
                                    echo "<td>";
                                ?>
                                    <iframe src="<?= $rowpds["file_path"] ?>" width="600" height="400"></iframe>
                                <?php
                                    echo "/<td>";
                                }
                                if (((strpos($rowpds["file_path"], '.xls') !== false)) || ((strpos($rowpds["file_path"], '.xlsx') !== false))) {
                                    echo "<td>" . '<div id="output' . $rowpds["file_id"] . '"></div>' . "  </td>";
                                }

                                echo "<td>" . $rowpds["file_description"] . "</td>";
                                echo "<td><a class='btn btn-danger m-1' href='../controller/manage-filese.php?file_id=" . $rowpds["file_id"] . "&purpose=delete' >Delete File</a><br><a class='btn btn-primary m-1' href='" . $rowpds["file_path"] . "'  download>Download File</a></td>";



                                echo "</tr>";


                                ?>
                                <script>
                                    function readFile(filePath) {
                                        fetch(filePath)
                                            .then(response => response.arrayBuffer())
                                            .then(data => {
                                                const workbook = XLSX.read(data, {
                                                    type: 'array'
                                                });
                                                const sheetHtml = XLSX.utils.sheet_to_html(workbook.Sheets[workbook.SheetNames[0]], {
                                                    id: 'table_sheet'
                                                }); // Adding id and border properties
                                                document.getElementById('output<?= $rowpds["file_id"] ?>').innerHTML = sheetHtml;
                                            });
                                    }

                                    readFile('<?= $rowpds["file_path"] ?>');
                                </script>

                                <?php

                            }
                        }




                        $sql1 = "SELECT * FROM `files` WHERE user_id = $eid and user_type='employee' and file_type='other' and f_status = 'Saved'";
                        $result1 = $conn->query($sql1);

                        if ($result1->num_rows > 0) {
                            // Output data of each row
                            while ($rowpds = $result1->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $rowpds["file_type"] . "</td>";
                                if ((strpos($rowpds["file_path"], '.pdf') !== false)) {
                                    echo "<td>";
                                ?>
                                    <iframe src="<?= $rowpds["file_path"] ?>" width="600" height="400"></iframe>
                                <?php
                                    echo "/<td>";
                                }
                                if (((strpos($rowpds["file_path"], '.xls') !== false)) || ((strpos($rowpds["file_path"], '.xlsx') !== false))) {
                                    echo "<td>" . '<div id="output' . $rowpds["file_id"] . '"></div>' . "  </td>";
                                }

                                echo "<td>" . $rowpds["file_description"] . "</td>";
                                echo "<td><a class='btn btn-danger m-1' href='../controller/manage-filese.php?file_id=" . $rowpds["file_id"] . "&purpose=delete' >Delete File</a><br><a class='btn btn-primary m-1' href='" . $rowpds["file_path"] . "'  download>Download File</a></td>";



                                echo "</tr>";


                                ?>
                                <script>
                                    function readFile(filePath) {
                                        fetch(filePath)
                                            .then(response => response.arrayBuffer())
                                            .then(data => {
                                                const workbook = XLSX.read(data, {
                                                    type: 'array'
                                                });
                                                const sheetHtml = XLSX.utils.sheet_to_html(workbook.Sheets[workbook.SheetNames[0]], {
                                                    id: 'table_sheet'
                                                }); // Adding id and border properties
                                                document.getElementById('output<?= $rowpds["file_id"] ?>').innerHTML = sheetHtml;
                                            });
                                    }

                                    readFile('<?= $rowpds["file_path"] ?>');
                                </script>

                    <?php

                            }
                        }
                    }



                    ?>
                </tbody>
                <tfoot class="table-border-bottom-0">
                    <tr>
                        <th>File Type</th>
                        <th>File</th>
                        <th>File Description</th>
                        <th>Action</th>

                    </tr>
                </tfoot>
            </table>
        </div>
    </div>



<?php

}




function displayEmployeeFileSeparatedAdmin($conn, $eid)
{
    $sql = "SELECT * FROM `users` where user_id = $eid";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
?>
    <div class="card">Files of <?= $row['user_id'] . ": " . $row["name"]  ?></h5>
        <div class="table-responsive text-nowrap">
            <table class="table" id="zero_config">
                <thead>
                    <tr>
                        <th>File Type</th>
                        <th>File Content</th>
                        <th>File Description</th>
                        <th>Action</th>


                    </tr>
                </thead>
                <tbody>
                    <?php

                    $sql1ch = "SELECT * FROM `files` WHERE user_id = $eid and user_type='admin' and f_status = 'Saved'";
                    $result1ch = $conn->query($sql1ch);

                    if ($result1ch->num_rows > 0) {
                        // Output data of each row
                        $sql1 = "SELECT * FROM `files` WHERE user_id = $eid and user_type='admin' and file_type='pds' and f_status = 'Saved'";
                        $result1 = $conn->query($sql1);

                        if ($result1->num_rows > 0) {
                            // Output data of each row
                            while ($rowpds = $result1->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $rowpds["file_type"] . "</td>";
                                if ((strpos($rowpds["file_path"], '.pdf') !== false)) {
                                    echo "<td>";
                    ?>
                                    <iframe src="<?= $rowpds["file_path"] ?>" width="600" height="400"></iframe>
                                <?php
                                    echo "/<td>";
                                }
                                if (((strpos($rowpds["file_path"], '.xls') !== false)) || ((strpos($rowpds["file_path"], '.xlsx') !== false))) {
                                    echo "<td>" . '<div id="output' . $rowpds["file_id"] . '"></div>' . "  </td>";
                                }

                                echo "<td>" . $rowpds["file_description"] . "</td>";


                                echo "<td>";
                                ?>
                                <div class="dropdown text-center">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item btn btn-primary mb-1" href='" . $rowpds["file_path"] . "' download"><i class="bx bx-download me-2"></i> Download</a>
                                        <a class="dropdown-item btn btn-danger mb-1" href="../controller/manage-filese.php?file_id=" . $rowpds["file_id"] . "&purpose=delete"><i class="bx bx-trash me-2"></i> Delete</a>
                                    </div>
                                </div>
                                <?php
                                echo "</td>";





                                echo "</tr>";


                                ?>
                                <script>
                                    function readFile(filePath) {
                                        fetch(filePath)
                                            .then(response => response.arrayBuffer())
                                            .then(data => {
                                                const workbook = XLSX.read(data, {
                                                    type: 'array'
                                                });
                                                const sheetHtml = XLSX.utils.sheet_to_html(workbook.Sheets[workbook.SheetNames[0]], {
                                                    id: 'table_sheet'
                                                }); // Adding id and border properties
                                                document.getElementById('output<?= $rowpds["file_id"] ?>').innerHTML = sheetHtml;
                                            });
                                    }

                                    readFile('<?= $rowpds["file_path"] ?>');
                                </script>

                                <?php

                            }
                        }



                        $sql1 = "SELECT * FROM `files` WHERE user_id = $eid and user_type='admin' and file_type='saln' and f_status = 'Saved'";
                        $result1 = $conn->query($sql1);

                        if ($result1->num_rows > 0) {
                            // Output data of each row
                            while ($rowpds = $result1->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $rowpds["file_type"] . "</td>";
                                if ((strpos($rowpds["file_path"], '.pdf') !== false)) {
                                    echo "<td>";
                                ?>
                                    <iframe src="<?= $rowpds["file_path"] ?>" width="600" height="400"></iframe>
                                <?php
                                    echo "/<td>";
                                }
                                if (((strpos($rowpds["file_path"], '.xls') !== false)) || ((strpos($rowpds["file_path"], '.xlsx') !== false))) {
                                    echo "<td>" . '<div id="output' . $rowpds["file_id"] . '"></div>' . "  </td>";
                                }

                                echo "<td>" . $rowpds["file_description"] . "</td>";
                                echo "<td><a class='btn btn-danger m-1' href='../controller/manage-filese.php?file_id=" . $rowpds["file_id"] . "&purpose=delete' >Delete File</a><br><a class='btn btn-primary m-1' href='" . $rowpds["file_path"] . "'  download>Download File</a></td>";



                                echo "</tr>";


                                ?>
                                <script>
                                    function readFile(filePath) {
                                        fetch(filePath)
                                            .then(response => response.arrayBuffer())
                                            .then(data => {
                                                const workbook = XLSX.read(data, {
                                                    type: 'array'
                                                });
                                                const sheetHtml = XLSX.utils.sheet_to_html(workbook.Sheets[workbook.SheetNames[0]], {
                                                    id: 'table_sheet'
                                                }); // Adding id and border properties
                                                document.getElementById('output<?= $rowpds["file_id"] ?>').innerHTML = sheetHtml;
                                            });
                                    }

                                    readFile('<?= $rowpds["file_path"] ?>');
                                </script>

                                <?php

                            }
                        }




                        $sql1 = "SELECT * FROM `files` WHERE user_id = $eid and user_type='admin' and file_type='other' and f_status = 'Saved'";
                        $result1 = $conn->query($sql1);

                        if ($result1->num_rows > 0) {
                            // Output data of each row
                            while ($rowpds = $result1->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $rowpds["file_type"] . "</td>";
                                if ((strpos($rowpds["file_path"], '.pdf') !== false)) {
                                    echo "<td>";
                                ?>
                                    <iframe src="<?= $rowpds["file_path"] ?>" width="600" height="400"></iframe>
                                <?php
                                    echo "/<td>";
                                }
                                if (((strpos($rowpds["file_path"], '.xls') !== false)) || ((strpos($rowpds["file_path"], '.xlsx') !== false))) {
                                    echo "<td>" . '<div id="output' . $rowpds["file_id"] . '"></div>' . "  </td>";
                                }

                                echo "<td>" . $rowpds["file_description"] . "</td>";
                                echo "<td><a class='btn btn-danger m-1' href='../controller/manage-filese.php?file_id=" . $rowpds["file_id"] . "&purpose=delete' >Delete File</a><br><a class='btn btn-primary m-1' href='" . $rowpds["file_path"] . "'  download>Download File</a></td>";



                                echo "</tr>";


                                ?>
                                <script>
                                    function readFile(filePath) {
                                        fetch(filePath)
                                            .then(response => response.arrayBuffer())
                                            .then(data => {
                                                const workbook = XLSX.read(data, {
                                                    type: 'array'
                                                });
                                                const sheetHtml = XLSX.utils.sheet_to_html(workbook.Sheets[workbook.SheetNames[0]], {
                                                    id: 'table_sheet'
                                                }); // Adding id and border properties
                                                document.getElementById('output<?= $rowpds["file_id"] ?>').innerHTML = sheetHtml;
                                            });
                                    }

                                    readFile('<?= $rowpds["file_path"] ?>');
                                </script>

                    <?php

                            }
                        }
                    }



                    ?>
                </tbody>
                <tfoot class="table-border-bottom-0">
                    <tr>
                        <th>File Type</th>
                        <th>File</th>
                        <th>File Description</th>
                        <th>Action</th>

                    </tr>
                </tfoot>
            </table>
        </div>
    </div>



    <?php

}


function displayTotalEmp($conn)
{
    $sql = "SELECT * FROM `total_emp`";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    echo $row['total'];
}


function displayTotalPercentA($conn)
{
    $sql = "SELECT * FROM `percent_attendees`";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    echo $row['absents'] * 100.00;
}

function displayTotalPercentP($conn)
{
    $sql = "SELECT * FROM `percent_attendees`";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    echo $row['presents'] * 100.00;
}

function displayTotalFiles($conn)
{
    $sql = "SELECT * FROM `total_files`";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    echo $row['total'];
}


function displayAveragePercent($conn)
{
    $sql = "SELECT * FROM `avg_perc`";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    echo $row['average']*100;
}


function displayAveragePercentP($conn)
{
    $sql = "SELECT * FROM `avg_perc`";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    echo 100-($row['average']*100);
}




function displayAverageCountA($conn)
{
    $sql = "SELECT * FROM `count_avg_perc`";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    echo $row['average_absent'];
}

function displayAverageCountP($conn)
{
    $sql = "SELECT * FROM `count_avg_perc`";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    echo $row['average_present'];
}



function displayActiveECount($conn)
{
    $sql = "SELECT count(*) as total FROM `employeedetails` WHERE e_status = 'Active';";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    echo $row['total'];
}

function displayLCdata($conn)
{
    $sql = "SELECT * FROM `count_avg_perc`";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    echo $row['average_present'];
}

function displayMonthlyAttendance($conn)
{
    $sql = "SELECT * FROM `lc_data`";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $absents = [];
        $presents = [];

        while ($row = $result->fetch_assoc()) {
            $absents[] = $row['absents'];
            $presents[] = $row['present_count'];
        }

        $absents_json = json_encode($absents);
        $presents_json = json_encode($presents);

        echo  $presents_json;
    
    }
}





function displayCalendarData($conn) {
    $sql = "SELECT `date`, `present_count`, `absents` FROM `calendar_data`";
    $result = $conn->query($sql);

    $events = array();

    if ($result->num_rows > 0) {
        $index = 1;
        while ($row = $result->fetch_assoc()) {
            $event = array(
                "from" => 'new Date("'.$row["date"].'")',
                "to" => 'new Date("'.$row["date"].'")',
                "title" => "Present: ".$row["present_count"].", Absent: ".$row["absents"],
                "description" => "Present employees today"
            );
            $events[] = 'event' . $index . ' = {
                from: ' . $event["from"] . ',
                to: ' . $event["to"] . ',
                title: "' . $event["title"] . '",
                description: "' . $event["description"] . '"
            }';
            
            $index++;
        }
    } else {
        echo "0 results";
        return;
    }

    // Join the events into a single string with each event assigned to a variable
    echo implode(",\n", $events);
}


function displayTravelOrders($conn, $eid)
{
    $sql = "SELECT file_id, file_description, file_path, uploaded_at, f_status FROM travel_order inner join tof_employees on tof_employees.tof_id = travel_order.file_id where e_id1  = $eid 
   OR e_id2  = $eid 
   OR e_id3  = $eid 
   OR e_id4  = $eid 
   OR e_id5  = $eid 
   OR e_id6  = $eid 
   OR e_id7  = $eid 
   OR e_id8  = $eid 
   OR e_id9  = $eid 
   OR e_id10  = $eid 
   OR e_id11  = $eid 
   OR e_id12  = $eid 
   OR e_id13  = $eid 
   OR e_id14  = $eid 
   OR e_id15  = $eid 
   OR e_id16  = $eid 
   OR e_id17  = $eid 
   OR e_id18  = $eid 
   OR e_id19  = $eid 
   OR e_id20  = $eid;";
    $result = $conn->query($sql);
?>
    <div class="card">
        <h5 class="card-header">Travel Orders List</h5>
        <div class="table-responsive text-nowrap">
            <table class="table" id="zero_config">
                <thead>
                    <tr>
                        <th>File ID</th>
                        <th>Description</th>
                        <th>File </th>
                        <th>Uploaded At</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php
                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["file_id"] . "</td>";
                            echo "<td>" . $row["file_description"] . "</td>";
                            echo "<td> " .'<iframe src="'.$row["file_path"].'" frameborder="0" style="width: 400px; height: 500px;"></iframe>' . "</td>";
                            echo "<td>" . $row["uploaded_at"] . "</td>";
                            echo "<td>" . $row["f_status"] . "</td>";
                            echo "<td><a class='btn btn-success m-1' href='" . $row["file_path"] . "' download>Download File</a><br><a class='btn btn-primary m-1' href='manage-tof.php?file_id=" . $row["file_id"] . "'>Edit File</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No results found</td></tr>";
                    }
                    ?>
                </tbody>
                <tfoot class="table-border-bottom-0">
                    <tr>
                        <th>File ID</th>
                        <th>Description</th>
                        <th>File Path</th>
                        <th>Uploaded At</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
<?php
}

?>