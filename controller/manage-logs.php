<?php
include("../model/conn.php");

if (isset($_GET['e_id'])) {
    $user_id = $_GET['e_id'];
    
    // Get the current date
    $date = date('Y-m-d');
    
    // Check if the user already has entries for today
    $checkSql = "SELECT * FROM attendance WHERE user_id = '$user_id' AND date = '$date' ORDER BY date DESC, time_in desc";
    $result = $conn->query($checkSql);

    if ($result->num_rows ==1) {
        // Fetch the latest row
        $row = $result->fetch_assoc();
        
        // If the latest row's time_out is null, update it
        if ($row['time_out'] == null) {
            $updateSql = "UPDATE attendance SET time_out = CURTIME() WHERE user_id = {$row['user_id']} ORDER BY date DESC, time_in desc limit 1";
            if ($conn->query($updateSql) === TRUE) {
                echo "<script>alert('Time Out Has Been Recorded To The Database.'); window.location.href = '../home/face-recog.php';</script>";
            } else {
                echo "<script>alert('Error: " . $updateSql . "<br>" . $conn->error."'); window.location.href = '../home/face-recog.php';</script>";
            }
        } else if ($result->num_rows < 3) {
            // If there are fewer than 3 rows and the latest row's time_out is not null, insert a new row
            $insertSql = "INSERT INTO attendance (user_id, date, time_in, status) VALUES ('$user_id', CURDATE(), CURTIME(), 'present')";
            if ($conn->query($insertSql) === TRUE) {
                echo "<script>alert('Time In Haas Been Recorded To The Database.'); window.location.href = '../home/face-recog.php';</script>";
            } else {
                echo "<script>alert('Error: " . $insertSql . "<br>" . $conn->error."'); window.location.href = '../home/face-recog.php';</script>";
            }
        } else {
            echo "<script>alert('Maximum attendance records reached for today.'); window.location.href = '../home/face-recog.php';</script>";
        }
    } 
    else if ($result->num_rows ==2) {
        // Fetch the latest row
        $row = $result->fetch_assoc();
        
        // If the latest row's time_out is null, update it
        if ($row['time_out'] == null) {
            $updateSql = "UPDATE attendance SET time_out = CURTIME() WHERE user_id = {$row['user_id']} ORDER BY date DESC, time_in desc limit 1";
            if ($conn->query($updateSql) === TRUE) {
                echo "<script>alert('Time Out Has Been Recorded To The Database.'); window.location.href = '../home/face-recog.php';</script>";
            } else {
                echo "<script>alert('Error: " . $updateSql . "<br>" . $conn->error."'); window.location.href = '../home/face-recog.php';</script>";
            }
        } else if ($result->num_rows < 3) {
            // If there are fewer than 3 rows and the latest row's time_out is not null, insert a new row
            $insertSql = "INSERT INTO attendance (user_id, date, time_in, status) VALUES ('$user_id', CURDATE(), CURTIME(), 'present')";
            if ($conn->query($insertSql) === TRUE) {
                echo "<script>alert('Time In Haas Been Recorded To The Database.'); window.location.href = '../home/face-recog.php';</script>";
            } else {
                echo "<script>alert('Error: " . $insertSql . "<br>" . $conn->error."'); window.location.href = '../home/face-recog.php';</script>";
            }
        } else {
            echo "<script>alert('Maximum attendance records reached for today.'); window.location.href = '../home/face-recog.php';</script>";
        }
    } 
    
    
    else if ($result->num_rows ==3) {
        // Fetch the latest row
        $row = $result->fetch_assoc();
        
        // If the latest row's time_out is null, update it
        if ($row['time_out'] == null) {
            $updateSql = "UPDATE attendance SET time_out = CURTIME() WHERE user_id = {$row['user_id']} ORDER BY date DESC, time_in desc limit 1";
            if ($conn->query($updateSql) === TRUE) {
                echo "<script>alert('Time Out Has Been Recorded To The Database.'); window.location.href = '../home/face-recog.php';</script>";
            } else {
                echo "<script>alert('Error: " . $updateSql . "<br>" . $conn->error."'); window.location.href = '../home/face-recog.php';</script>";
            }
        } else if ($result->num_rows < 3) {
            // If there are fewer than 3 rows and the latest row's time_out is not null, insert a new row
            $insertSql = "INSERT INTO attendance (user_id, date, time_in, status) VALUES ('$user_id', CURDATE(), CURTIME(), 'present')";
            if ($conn->query($insertSql) === TRUE) {
                echo "<script>alert('Time In Haas Been Recorded To The Database.'); window.location.href = '../home/face-recog.php';</script>";
            } else {
                echo "<script>alert('Error: " . $insertSql . "<br>" . $conn->error."'); window.location.href = '../home/face-recog.php';</script>";
            }
        } else {
            echo "<script>alert('Maximum attendance records reached for today.'); window.location.href = '../home/face-recog.php';</script>";
        }
    } 
    
    
    else {
        // If no entries exist for today, insert the first row
        $insertSql = "INSERT INTO attendance (user_id, date, time_in, status) VALUES ('$user_id', CURDATE(), CURTIME(), 'present')";
        if ($conn->query($insertSql) === TRUE) {
            echo "<script>alert('Time In Haas Been Recorded To The Database.'); window.location.href = '../home/face-recog.php';</script>";
        } else {
            echo "<script>alert('Error: " . $insertSql . "<br>" . $conn->error."'); window.location.href = '../home/face-recog.php';</script>";
        }
    }
}
?>
