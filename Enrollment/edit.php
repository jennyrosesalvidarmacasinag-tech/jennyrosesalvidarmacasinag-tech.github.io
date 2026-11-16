<?php
include "db.php";

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM student_tb WHERE id=$id");
$user = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $grade_level     = $_POST['grade_level'];
    $tvl_track       = $_POST['tvl_track'];
    $academic_track  = $_POST['academic_track'];
    $lrn             = trim($_POST['lrn'] ?? '');
    $firstname       = $_POST['firstname'];
    $middlename      = $_POST['middlename'];
    $lastname        = $_POST['lastname'];
    $suffix          = $_POST['suffix'];
    $dob             = $_POST['dob'];
    $gender          = $_POST['gender'];
    $civilstatus     = $_POST['civilstatus'];
    $religion        = $_POST['religion'];
    $email           = $_POST['email'];
    $contact         = $_POST['contact'];
    $address         = $_POST['address'];
    $father_name     = $_POST['father_name'];
    $mother_name     = $_POST['mother_name'];
    $parent_contact  = $_POST['parent_contact'];
    $guardian        = $_POST['guardian'];
    $guardian_contact= $_POST['guardian_contact'];
    $junior_high_school = $_POST['junior_high_school'];
    $private_status     = $_POST['private_status'];
    $year_graduated     = $_POST['year_graduated'];
    $school_last        = $_POST['school_last'];
    $school_address     = $_POST['school_address'];
    $enrollment_date    = $_POST['enrollment_date'];
        $status             = $_POST['status'];

 $sql = "UPDATE student_tb
        SET grade_level = 'grade_level', tvl_track = 'tvl_track', academic_track ='academic_track', lrn = 'lrn', firstname = '$firstname', middlename = '$middlename', lastname = '$lastname', suffix = '$suffix', dob = 'dob',  gender = '$gender', civilstatus = '$civilstatus', religion = '$religion', email = 'email', contact = 'contact', address = 'address', father_name = 'father_name', mother_name = 'mother_name', parent_contact = 'parent_contact', guardian = 'guardian',  guardian_contact = 'guardian_contact', junior_high_school = 'junior_high_school', private_status = 'private_status', year_graduated = 'year_graduated', school_last = 'school_last', school_address = 'school_address'
        WHERE id = $id";
        
        if (mysqli_query($conn, $sql)){
        
        header("Location: admin.php?msg=updated");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

        
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student - <?= htmlspecialchars($user['firstname'] . ' ' . $user['lastname']) ?></title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1><i class="fas fa-edit"></i> Edit Student Information</h1>
            <p>Update student details below</p>
        </div>

        <form method="POST" action="admin.php" id="editForm">
            <div class="form-container">
                <!-- Academic Information - Line 1 -->
                <div class="form-section">
                    <div class="section-line"></div>
                    <div class="section-title">
                        <i class="fas fa-book"></i>
                        1. Academic Information
                    </div>
                    <div class="form-grid">
                        <div class="form-row">
                            <label for="grade_level">Grade Level <span class="required">*</span></label>
                            <select id="grade_level" name="grade_level" required>
                                <option value="">-- Choose --</option>
                                <option value="Grade 11" <?= $user['grade_level'] == 'Grade 11' ? 'selected' : '' ?>>Grade 11</option>
                                <option value="Grade 12" <?= $user['grade_level'] == 'Grade 12' ? 'selected' : '' ?>>Grade 12</option>
                            </select>
                        </div>
                        <div class="form-row">
                            <label for="tvl_track">TVL Track</label>
                            <select id="tvl_track" name="tvl_track">
                                <option value="">-- Choose --</option>
                                <option value="css" <?= $user['tvl_track'] == 'css' ? 'selected' : '' ?>>Computer System Services NC II</option>
                                <option value="ca" <?= $user['tvl_track'] == 'ca' ? 'selected' : '' ?>>Computer Animation NC II</option>
                                <option value="mt" <?= $user['tvl_track'] == 'mt' ? 'selected' : '' ?>>Medical Transcription NC II</option>
                                <option value="cp" <?= $user['tvl_track'] == 'cp' ? 'selected' : '' ?>>Computer Programming NC III</option>
                            </select>
                        </div>
                        <div class="form-row">
                            <label for="academic_track">Academic Track</label>
                            <select id="academic_track" name="academic_track">
                                <option value="">-- Choose --</option>
                                <option value="STEM" <?= $user['academic_track'] == 'STEM' ? 'selected' : '' ?>>STEM</option>
                                <option value="ABM" <?= $user['academic_track'] == 'ABM' ? 'selected' : '' ?>>ABM</option>
                                <option value="HUMSS" <?= $user['academic_track'] == 'HUMSS' ? 'selected' : '' ?>>HUMSS</option>
                                <option value="GAS" <?= $user['academic_track'] == 'GAS' ? 'selected' : '' ?>>GAS</option>
                            </select>
                        </div>
                        <div class="form-row">
                            <label for="lrn">Learner's Reference Number (LRN) <span class="required">*</span></label>
                            <input type="text" id="lrn" name="lrn" maxlength="12" pattern="[0-9]{12}" 
                                   value="<?= htmlspecialchars($user['lrn']) ?>" required>
                        </div>
                    </div>
                </div>

                <!-- Personal Information - Line 2 -->
                <div class="form-section">
                    <div class="section-line"></div>
                    <div class="section-title">
                        <i class="fas fa-user"></i>
                        2. Personal Information
                    </div>
                    <div class="form-grid">
                        <div class="form-row">
                            <label for="firstname">First Name <span class="required">*</span></label>
                            <input type="text" name="firstname" id="firstname" 
                                   value="<?= htmlspecialchars($user['firstname']) ?>" required>
                        </div>
                        <div class="form-row">
                            <label for="middlename">Middle Name</label>
                            <input type="text" name="middlename" id="middlename" 
                                   value="<?= htmlspecialchars($user['middlename']) ?>">
                        </div>
                        <div class="form-row">
                            <label for="lastname">Last Name <span class="required">*</span></label>
                            <input type="text" name="lastname" id="lastname" 
                                   value="<?= htmlspecialchars($user['lastname']) ?>" required>
                        </div>
                        <div class="form-row">
                            <label for="suffix">Suffix Name</label>
                            <input type="text" name="suffix" id="suffix" 
                                   value="<?= htmlspecialchars($user['suffix']) ?>">
                        </div>
                        <div class="form-row">
                            <label for="dob">Date of Birth <span class="required">*</span></label>
                            <input type="date" name="dob" id="dob" value="<?= htmlspecialchars($user['dob']) ?>" required>
                        </div>
                        <div class="form-row">
                            <label for="gender">Gender <span class="required">*</span></label>
                            <select name="gender" id="gender" required>
                                <option value="">-- Choose --</option>
                                <option value="male" <?= $user['gender'] == 'male' ? 'selected' : '' ?>>Male</option>
                                <option value="female" <?= $user['gender'] == 'female' ? 'selected' : '' ?>>Female</option>
                            </select>
                        </div>
                        <div class="form-row full-width">
                            <label for="address">Complete Address <span class="required">*</span></label>
                            <textarea name="address" id="address" rows="3" required><?= htmlspecialchars($user['address']) ?></textarea>
                        </div>
                        <div class="form-row">
                            <label for="civilstatus">Civil Status <span class="required">*</span></label>
                            <select id="civilstatus" name="civilstatus" required>
                                <option value="">-- Choose --</option>
                                <option value="Single" <?= $user['civilstatus'] == 'Single' ? 'selected' : '' ?>>Single</option>
                                <option value="Married" <?= $user['civilstatus'] == 'Married' ? 'selected' : '' ?>>Married</option>
                                <option value="Widowed" <?= $user['civilstatus'] == 'Widowed' ? 'selected' : '' ?>>Widowed</option>
                                <option value="Separated" <?= $user['civilstatus'] == 'Separated' ? 'selected' : '' ?>>Separated</option>
                            </select>
                        </div>
                        <div class="form-row">
                            <label for="religion">Religion <span class="required">*</span></label>
                            <select id="religion" name="religion" required>
                                <option value="">-- Choose --</option>
                                <option value="Roman Catholic" <?= $user['religion'] == 'Roman Catholic' ? 'selected' : '' ?>>Roman Catholic</option>
                                <option value="Christian" <?= $user['religion'] == 'Christian' ? 'selected' : '' ?>>Christian</option>
                                <option value="Iglesia ni Cristo" <?= $user['religion'] == 'Iglesia ni Cristo' ? 'selected' : '' ?>>Iglesia ni Cristo</option>
                                <option value="Muslim" <?= $user['religion'] == 'Muslim' ? 'selected' : '' ?>>Muslim</option>
                                <option value="Buddhist" <?= $user['religion'] == 'Buddhist' ? 'selected' : '' ?>>Buddhist</option>
                                <option value="Other" <?= $user['religion'] == 'Other' ? 'selected' : '' ?>>Other</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Contact & Family - Line 3 -->
                <div class="form-section">
                    <div class="section-line"></div>
                    <div class="section-title">
                        <i class="fas fa-phone"></i>
                        3. Contact & Family Information
                    </div>
                    <div class="form-grid">
                        <div class="form-row">
                            <label for="email">Email Address <span class="required">*</span></label>
                            <input type="email" name="email" id="email" 
                                   value="<?= htmlspecialchars($user['email']) ?>" required>
                        </div>
                        <div class="form-row">
                            <label for="contact">Contact Number <span class="required">*</span></label>
                            <input type="tel" name="contact" id="contact" 
                                   value="<?= htmlspecialchars($user['contact']) ?>" required>
                        </div>
                        <div class="form-row">
                            <label for="father_name">Father's Name</label>
                            <input type="text" id="father_name" name="father_name" 
                                   value="<?= htmlspecialchars($user['father_name']) ?>">
                        </div>
                        <div class="form-row">
                            <label for="mother_name">Mother's Name</label>
                            <input type="text" id="mother_name" name="mother_name" 
                                   value="<?= htmlspecialchars($user['mother_name']) ?>">
                        </div>
                        <div class="form-row">
                            <label for="parent_contact">Parent Contact <span class="required">*</span></label>
                            <input type="tel" id="parent_contact" name="parent_contact" 
                                   value="<?= htmlspecialchars($user['parent_contact']) ?>" required>
                        </div>
                        <div class="form-row">
                            <label for="guardian">Guardian (if applicable)</label>
                            <input type="text" id="guardian" name="guardian" 
                                   value="<?= htmlspecialchars($user['guardian']) ?>">
                        </div>
                        <div class="form-row">
                            <label for="guardian_contact">Guardian Contact</label>
                            <input type="tel" id="guardian_contact" name="guardian_contact" 
                                   value="<?= htmlspecialchars($user['guardian_contact']) ?>">
                        </div>
                    </div>
                </div>

                <!-- School History - Line 4 -->
                <div class="form-section">
                    <div class="section-line"></div>
                    <div class="section-title">
                        <i class="fas fa-school"></i>
                        4. School History
                    </div>
                    <div class="form-grid">
                        <div class="form-row">
                            <label>Junior High School <span class="required">*</span></label>
                            <div class="radio-group">
                                <label><input type="radio" id="jhs_private" name="junior_high_school" value="private" 
                                             <?= $user['junior_high_school'] == 'private' ? 'checked' : '' ?> required> Private</label>
                                <label><input type="radio" id="jhs_public" name="junior_high_school" value="public" 
                                             <?= $user['junior_high_school'] == 'public' ? 'checked' : '' ?> required> Public</label>
                            </div>
                        </div>
                        <div class="form-row">
                            <label>If Private:</label>
                            <div class="radio-group">
                                <label><input type="radio" id="esc_grantee" name="private_status" value="ESC GRANTEE" 
                                             <?= $user['private_status'] == 'ESC GRANTEE' ? 'checked' : '' ?>> ESC Grantee</label>
                                <label><input type="radio" id="none_esc" name="private_status" value="N ESC" 
                                             <?= $user['private_status'] == 'N ESC' ? 'checked' : '' ?>> None ESC</label>
                            </div>
                        </div>
                        <div class="form-row">
                            <label for="year_graduated">Year Graduated <span class="required">*</span></label>
                            <input type="number" id="year_graduated" name="year_graduated" min="2000" max="<?= date('Y') ?>" 
                                   value="<?= htmlspecialchars($user['year_graduated']) ?>" required>
                        </div>
                        <div class="form-row">
                            <label for="school_last">School Last Attended <span class="required">*</span></label>
                            <input type="text" id="school_last" name="school_last" 
                                   value="<?= htmlspecialchars($user['school_last']) ?>" required>
                        </div>
                        <div class="form-row full-width">
                            <label for="school_address">School Address <span class="required">*</span></label>
                            <input type="text" id="school_address" name="school_address" 
                                   value="<?= htmlspecialchars($user['school_address']) ?>" required>
                        </div>
                    </div>
                </div>

                <div class="form-row full-width">
                    <button type="submit" name="update">
                        <i class="fas fa-save"></i> Update Student Information
                    </button>
                </div>
            </div>
        </form>
    </div>

    <script>
        // Phone number formatting (11 digits)
        document.querySelectorAll('input[type="tel"]').forEach(input => {
            input.addEventListener('input', function() {
                let value = this.value.replace(/[^0-9]/g, '');
                if (value.length > 11) value = value.slice(0, 11);
                if (value.length >= 4) {
                    value = value.replace(/(\d{4})(\d{0,4})/, '$1 $2');
                }
                this.value = value;
            });
        });

        // LRN validation (only numbers, max 12 digits)
        document.getElementById('lrn').addEventListener('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '').slice(0, 12);
        });

        // Year graduated validation
        document.getElementById('year_graduated').addEventListener('input', function() {
            let year = parseInt(this.value);
            let currentYear = new Date().getFullYear();
            if (year < 2000 || year > currentYear) {
                this.setCustomValidity('Year must be between 2000 and current year');
            } else {
                this.setCustomValidity('');
            }
        });

        // Form submission enhancement
        document.getElementById('editForm').addEventListener('submit', function(e) {
            const lrn = document.getElementById('lrn').value;
            if (lrn && !/^[0-9]{12}$/.test(lrn)) {
                e.preventDefault();
                alert('LRN must be exactly 12 digits!');
                document.getElementById('lrn').focus();
                return false;
            }
            
            // Show loading state
            const btn = this.querySelector('button[type="submit"]');
            const originalText = btn.innerHTML;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Updating...';
            btn.disabled = true;
        });
    </script>
</body>
</html>