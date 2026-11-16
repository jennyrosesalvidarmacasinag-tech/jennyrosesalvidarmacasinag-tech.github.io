<?php
include "db.php";
$result = mysqli_query($conn, "SELECT * FROM student_tb WHERE status='accepted' AND grade_level IN ('Grade 11','11','Grade 12','12') ORDER BY grade_level, lastname");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Enrolled Students List - Printable</title>
    <style>
        @media print { body { margin: 0; font-family: Arial, sans-serif; } }
        body { font-family: Arial, sans-serif; margin: 40px; }
        .header { text-align: center; margin-bottom: 40px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #333; padding: 8px; text-align: left; }
        th { background: #f0f0f0; }
        .grade11 { background: #e3f2fd; }
        .grade12 { background: #f3e5f5; }
    </style>
</head>
<body>
    <div class="header">
        <h1>SENIOR HIGH SCHOOL ENROLLED STUDENTS</h1>
        <h3>Grade 11 & 12 | Academic Year 2024-2025</h3>
        <p>Printed on: <?= date('F d, Y h:i A'); ?></p>
    </div>
    
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>LRN</th>
                <th>NAME</th>
                <th>GRADE</th>
                <th>TRACK</th>
                <th>CONTACT</th>
                <th>ENROLLMENT DATE</th>
            </tr>
        </thead>
        <tbody>
            <?php $counter = 1;
            while($row = mysqli_fetch_assoc($result)): 
                $class = strpos(strtolower($row['grade_level']), '11') !== false ? 'grade11' : 'grade12';
            ?>
            <tr class="<?= $class ?>">
                <td><?= $counter++ ?></td>
                <td><?= $row['lrn'] ?></td>
                <td><?= $row['firstname'].' '.$row['lastname'] ?></td>
                <td><?= $row['grade_level'] ?></td>
                <td><?= $row['tvl_track'] ?: $row['academic_track'] ?: 'N/A' ?></td>
                <td><?= $row['contact'] ?></td>
                <td><?= $row['enrollment_date'] ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    
    <script>window.print();</script>
</body>
</html>