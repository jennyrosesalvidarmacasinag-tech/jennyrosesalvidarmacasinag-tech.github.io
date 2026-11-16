<?php
include "db.php";

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Secure: convert to integer
    
    // Update to accepted + set enrollment date
    $sql = "UPDATE student_tb SET 
            status = 'accepted', 
            enrollment_date = CURDATE(),
            updated_at = NOW()
            WHERE id = ?";
    
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    
    if (mysqli_stmt_execute($stmt)) {
        if (mysqli_stmt_affected_rows($stmt) > 0) {
            echo "<script>
                alert('✅ Student ACCEPTED and ENROLLED successfully!');
                window.location.href='admin.php';
            </script>";
        } else {
            echo "<script>alert('❌ No student found with that ID!');</script>";
        }
    } else {
        echo "<script>alert('❌ Database error!');</script>";
    }
    
    mysqli_stmt_close($stmt);
} else {
    echo "<script>window.location.href='admin.php';</script>";
}
?>