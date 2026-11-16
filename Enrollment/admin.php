<!DOCTYPE html>
<html>
<head>
    <title>View Users</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="admin.css">
</head> 
<body>       
    <div class="table-container">
        <div class="table-header">
            <h2>Register Users</h2>
            <div class="add-btn-container">
                <a href="enroll.php" class="btn">Add New</a>
                <a href="enrolled_students.php" class="btn" style="background: linear-gradient(135deg, #ff6b6b, #e2bb21); color: white;">Enrolled Students</a>
            </div>
        </div>
        
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>GRADE LEVEL</th>
                        <th>TVL TRACKS</th>
                        <th>ACADEMIC TRACKS</th>
                        <th>LRN</th>
                        <th>FIRSTNAME</th>
                        <th>MIDDLE NAME</th>
                        <th>LASTNAME</th>
                        <th>SUFFIX NAME</th>
                        <th>DATE OF BIRTH</th>
                        <th>GENDER</th>
                        <th>CIVIL STATUS</th>
                        <th>RELIGION</th>
                        <th>EMAIL ADDRESS</th>
                        <th>CONTACT NUMBER</th>
                        <th>COMPLETE ADDRESS</th>
                        <th>FATHER'S NAME</th>
                        <th>MOTHER'S NAME</th>
                        <th>PARENT CONTACT</th>
                        <th>GUARDIAN (if applicable)</th>
                        <th>GUARDIAN CONTACT</th>
                        <th>JUNIOR HIGH SCHOOL</th>
                        <th>IF PRIVATE</th>
                        <th>YEAR GRADUATED</th>
                        <th>SCHOOL LAST ATTENDED</th>
                        <th>SCHOOL ADDRESS</th>
                        <th>ENROLLMENT DATE</th>
                        <th>STATUS</th>
                        <th>ACTION</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    include "db.php";
                    $result = mysqli_query($conn, "SELECT * FROM student_tb");
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?= htmlspecialchars($row['id']); ?></td>
                        <td><?= htmlspecialchars($row['grade_level']); ?></td>
                        <td><?= htmlspecialchars($row['tvl_track']); ?></td>
                        <td><?= htmlspecialchars($row['academic_track']); ?></td>
                        <td><?= htmlspecialchars($row['lrn']); ?></td>
                        <td><?= htmlspecialchars($row['firstname']); ?></td>
                        <td><?= htmlspecialchars($row['middlename']); ?></td>
                        <td><?= htmlspecialchars($row['lastname']); ?></td>
                        <td><?= htmlspecialchars($row['suffix']); ?></td>
                        <td><?= htmlspecialchars($row['dob']); ?></td>
                        <td><?= htmlspecialchars($row['gender']); ?></td>
                        <td><?= htmlspecialchars($row['civilstatus']); ?></td>
                        <td><?= htmlspecialchars($row['religion']); ?></td>
                        <td><?= htmlspecialchars($row['email']); ?></td>
                        <td><?= htmlspecialchars($row['contact']); ?></td>
                        <td><?= htmlspecialchars($row['address']); ?></td>
                        <td><?= htmlspecialchars($row['father_name']); ?></td>
                        <td><?= htmlspecialchars($row['mother_name']); ?></td>
                        <td><?= htmlspecialchars($row['parent_contact']); ?></td>
                        <td><?= htmlspecialchars($row['guardian']); ?></td>
                        <td><?= htmlspecialchars($row['guardian_contact']); ?></td>
                        <td><?= htmlspecialchars($row['junior_high_school']); ?></td>
                        <td><?= htmlspecialchars($row['private_status']); ?></td>
                        <td><?= htmlspecialchars($row['year_graduated']); ?></td>
                        <td><?= htmlspecialchars($row['school_last']); ?></td>
                        <td><?= htmlspecialchars($row['school_address']); ?></td>
                        <td><?= htmlspecialchars($row['enrollment_date']); ?></td>
                        <td><?= htmlspecialchars($row['status']); ?></td>
                        
                        <td>
                            <div class="actions">
                                <a href="accept.php?id=<?= $row['id']; ?>" class="accept-btn">Accept</a>
                                <a href="decline.php?id=<?= $row['id']; ?>" class="decline-btn">Decline</a>
                                <a href="edit.php?id=<?= $row['id']; ?>" class="edit-btn">Edit</a>
                                <a href="delete.php?id=<?= $row['id']; ?>" 
                                   class="delete-btn"
                                   onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>   
                            </div>
                        </td>
                    </tr>
                    <?php 
                        }
                    } else {
                    ?>
                    <tr>
                        <td colspan="28" style="text-align: center; padding: 40px; color: #666; font-style: italic;">
                            No users found
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>