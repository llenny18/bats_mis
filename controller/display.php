<?php




function displayDailyLogs($conn)
{
    $sql = "SELECT * FROM employeedetails inner join attendance on attendance.user_id = employeedetails.employee_id";
    $result = $conn->query($sql);


?>
    <div class="card">
        <h5 class="card-header">Employee List and Information</h5>
        <div class="table-responsive text-nowrap">
            <table class="table" id="zero_config1">
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Employment Type</th>
                        <th>Time In and Time Out</th>
                        <th>Date</th>
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
                            echo "<td>" . date("g:i a", strtotime($row["time_in"])) . " - ".date("g:i a", strtotime($row["time_out"])).  "</td>";
                            echo "<td>" . date("F j, Y",strtotime($row["date"] )) . "</td>";

                            echo "<td>";
                    ?>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-2"></i> Edit</a>
                                    <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-2"></i> Delete</a>
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
                        <th>Time In and Time Out</th>
                        <th>Date</th>
                        <th>Action</th>
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
        <h5 class="card-header">Employee List and Information</h5>
        <div class="table-responsive text-nowrap">
            <table class="table" id="zero_config1">
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Employment Type</th>
                        <th>Date of Birth</th>
                        <th>Email</th>
                        <th>Phone Number</th>
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
                            echo "<td>" . $row["first_name"] . " " . $row["last_name"] . "</td>";
                            echo "<td>" . $row["employment_type"] . "</td>";
                            echo "<td>" . $row["date_of_birth"] . "</td>";
                            echo "<td>" . $row["email"] . "</td>";
                            echo "<td>" . $row["phone_number"] . "</td>";
                             viewEmployeeStatus($conn, $row["employee_id"]) ;

                            echo "<td>";
                    ?>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="manage-employee.php?employee_id=<?=  $row["employee_id"] ?>"><i class="bx bx-edit-alt me-2"></i> Edit</a>
                                    <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-2"></i> Delete</a>
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
                        <th>Status</th>
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
        <h5 class="card-header">Employee List and Information</h5>
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
                            <div class="dropdown">
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
            echo "<td>" .'<span class="badge bg-label-warning me-1">Pending</span>'. "</td>";
        } else if ($row['status'] == "approved") {
            echo "<td>" .'<span class="badge bg-label-success me-1">Approved</span>'. "</td>";
        } else if ($row['status'] == "declined") {
            echo "<td>" .'<span class="badge bg-label-danger me-1">Declined</span>'. "</td>";
        }
    } else {
        echo "<td>" .'<span class="badge bg-label-danger me-1">Absent</span>'. "</td>";
    }
}


function viewEmployeeStatus($conn, $eid)
{
    $sql = "SELECT * FROM `attendance` WHERE date = date(curdate()) and user_id = {$eid}";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row['status'] == "present") {
            echo "<td>" .'<span class="badge bg-label-success me-1">Present</span>'. "</td>";
        } else if ($row['status'] == "absent") {
            echo "<td>" .'<span class="badge bg-label-danger me-1">Absent</span>'. "</td>";
        } else if ($row['status'] == "on_leave") {
            echo "<td>" .'<span class="badge bg-label-warning me-1">On Leave</span>'. "</td>";
        }
    } else {
        echo "<td>" .'<span class="badge bg-label-danger me-1">Absent</span>'. "</td>";
    }
}




function displayEmployees($conn)
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
                             viewEmployeeStatus($conn, $row["employee_id"]) ;

                           
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
    $sql = "SELECT employee_id, user_name, first_name, last_name, employment_type, date_of_birth, email, phone_number FROM employeedetails inner join attendance on attendance.user_id = employeedetails.employee_id where attendance.status = 'on_leave'";
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
                             viewEmployeeStatus($conn, $row["employee_id"]) ;

                           
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
    $sql = "SELECT employee_id, user_name, first_name, last_name, employment_type, date_of_birth, email, phone_number FROM employeedetails inner join attendance on attendance.user_id = employeedetails.employee_id where attendance.status = 'present'";
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
                             viewEmployeeStatus($conn, $row["employee_id"]) ;

                           
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
                   WHERE  employeedetails.employee_id = attendance.user_id)";
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
                             viewEmployeeStatus($conn, $row["employee_id"]) ;

                           
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




function displayLeaveManagement($conn)
{
    $sql = "SELECT leave_id, user_id, user_type, more_info, leave_type, start_date, end_date, status, created_at FROM leavemanagement";
    $result = $conn->query($sql);
?>
    <div class="card">
        <h5 class="card-header">Leave Management Information</h5>
        <div class="table-responsive text-nowrap">
            <table class="table" id="zero_config">
                <thead>
                    <tr>
                        <th>Leave ID</th>
                        <th>User ID</th>
                        <th>User Type</th>
                        <th>More Info</th>
                        <th>Leave Type</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Status</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["leave_id"] . "</td>";
                            echo "<td>" . $row["user_id"] . "</td>";
                            echo "<td>" . $row["user_type"] . "</td>";
                            echo "<td>" . $row["more_info"] . "</td>";
                            echo "<td>" . $row["leave_type"] . "</td>";
                            echo "<td>" . $row["start_date"] . "</td>";
                            echo "<td>" . $row["end_date"] . "</td>";
                            viewLeaveStatus($conn, $row["leave_id"]);
                            echo "<td>" . $row["created_at"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='9'>No results found</td></tr>";
                    }
                    ?>
                </tbody>
                <tfoot class="table-border-bottom-0">
                    <tr>
                        <th>Leave ID</th>
                        <th>User ID</th>
                        <th>User Type</th>
                        <th>More Info</th>
                        <th>Leave Type</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Status</th>
                        <th>Created At</th>
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
                            echo "<td><a class='btn btn-success' href='view-efiles.php?user_id= " . $row["employment_type"] . "' >View Files</a></td>";
                           

                           
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


?>