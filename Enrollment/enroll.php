<?php
include "db.php";

if (isset($_POST['save'])){

    // =========================
    // 1. Collect form data
    // =========================

    // Academic info
    $grade_level     = $_POST['grade_level'];
    $tvl_track       = $_POST['tvl_track'];
    $academic_track  = $_POST['academic_track'];
    $lrn             = trim($_POST['lrn']); // trim spaces

    // Personal info
    $firstname       = $_POST['firstname'];
    $middlename      = $_POST['middlename'];
    $lastname        = $_POST['lastname'];
    $suffix          = $_POST['suffix'];
    $dob             = $_POST['dob'];
    $gender          = $_POST['gender'];
    $civilstatus     = $_POST['civilstatus'];
    $religion        = $_POST['religion'];

    // Contact info
    $email           = $_POST['email'];
    $contact         = $_POST['contact'];
    $address         = $_POST['address'];

    // Family info
    $father_name     = $_POST['father_name'];
    $mother_name     = $_POST['mother_name'];
    $parent_contact  = $_POST['parent_contact'];
    $guardian        = $_POST['guardian'];
    $guardian_contact= $_POST['guardian_contact'];

    // School history
    $junior_high_school = $_POST['junior_high_school'];
    $private_status     = $_POST['private_status'] ?? null;
    $year_graduated     = $_POST['year_graduated'];
    $school_last        = $_POST['school_last'];
    $school_address     = $_POST['school_address'];
    $enrollment_date = date('Y-m-d');  // Today's date
    $status = 'Pending'; 

    // =========================
    // 2. Validate LRN
    // =========================
    if (!preg_match("/^[0-9]{12}$/", $lrn)) {
        die("Invalid LRN. Must be exactly 12 digits.");
    }

    // =========================
    // 3. Check for duplicates
    // =========================
    $check = mysqli_query($conn, "SELECT * FROM student_tb WHERE lrn='$lrn'");
    if (mysqli_num_rows($check) > 0) {
        echo "Error: LRN already exists!";
    } else {
        // =========================
        // 4. Insert record
        // =========================
        $sql = "INSERT INTO student_tb 
                (grade_level, tvl_track, academic_track, lrn, firstname, middlename, lastname, suffix, dob, gender, civilstatus, religion, email, contact, address, father_name, mother_name, parent_contact, guardian, guardian_contact, junior_high_school, private_status, year_graduated, school_last, school_address, enrollment_date, status) 
                VALUES 
                ('$grade_level', '$tvl_track', '$academic_track', '$lrn', '$firstname', '$middlename', '$lastname', '$suffix', '$dob', '$gender', '$civilstatus', '$religion', '$email', '$contact', '$address', '$father_name', '$mother_name', '$parent_contact', '$guardian', '$guardian_contact', '$junior_high_school', '$private_status', '$year_graduated', '$school_last', '$school_address', '$enrollment_date', '$status')";


        if (mysqli_query($conn, $sql)) {
            echo "Student record added successfully!";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrollment Form</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <div class="header">
            <h1><i class="fas fa-graduation-cap"></i> Enrollment Form</h1>
            <p>Complete your enrollment form in 4 simple steps</p>
        </div>
<form method="POST" action="">
    <input type="hidden" name="id" value="<?= $id ?>">
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
                            <option value="Grade 11">Grade 11</option>
                            <option value="Grade 12">Grade 12</option>
                        </select>
                    </div>
                    <div class="form-row">
                        <label for="tvl_track">TVL Track </label>
                        <select id="tvl_track" name="tvl_track">
                            <option value="">-- Choose --</option>
                            <option value="css">Computer System Services NC II</option>
                            <option value="ca">Computer Animation NC II</option>
                            <option value="mt">Medical Transcription NC II</option>
                            <option value="cp">Computer Programming NC III</option>
                        </select>
                    </div>
                    <div class="form-row">
                        <label for="academic_track">Academic Track</label>
                        <select id="academic_track" name="academic_track">
                            <option value="">-- Choose --</option>
                            <option value="STEM">STEM</option>
                            <option value="ABM">ABM</option>
                            <option value="HUMSS">HUMSS</option>
                            <option value="GAS">GAS</option>
                        </select>
                    </div>
                    <div class="form-row">
                        <label for="lrn">Learner's Reference Number (LRN) <span class="required">*</span></label>
                        <input type="text" id="lrn" name="lrn" maxlength="12" pattern="[0-9]{12}" placeholder="Enter 12-digit LRN" required>
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
                        <input type="text" name="firstname" id="firstname" required>
                    </div>
                    <div class="form-row">
                        <label for="middlename">Middle Name</label>
                        <input type="text" name="middlename" id="middlename">
                    </div>
                    <div class="form-row">
                        <label for="lastname">Last Name <span class="required">*</span></label>
                        <input type="text" name="lastname" id="lastname" required>
                    </div>
                    <div class="form-row">
                        <label for="suffix">Suffix Name</label>
                        <input type="text" name="suffix" id="suffix">
                    </div>
                    <div class="form-row">
                        <label for="dob">Date of Birth <span class="required">*</span></label>
                        <input type="date" name="dob" id="dob" required>
                    </div>
                    <div class="form-row">
                        <label for="gender">Gender <span class="required">*</span></label>
                        <select name="gender" id="gender" required>
                            <option value="">-- Choose --</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="form-row full-width">
                        <label for="address">Complete Address <span class="required">*</span></label>
                        <textarea name="address" id="address" rows="3" required placeholder="House No., Street, Barangay, City/Municipality, Province"></textarea>
                    </div>
                    <div class="form-row">
                        <label for="civilstatus">Civil Status <span class="required">*</span></label>
                        <select id="civilstatus" name="civilstatus" required>
                            <option value="">-- Choose --</option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                            <option value="Widowed">Widowed</option>
                            <option value="Separated">Separated</option>
                        </select>
                    </div>
                    <div class="form-row">
                        <label for="religion">Religion <span class="required">*</span></label>
                        <select id="religion" name="religion" required>
                            <option value="">-- Choose --</option>
                            <option value="Roman Catholic">Roman Catholic</option>
                            <option value="Christian">Christian</option>
                            <option value="Iglesia ni Cristo">Iglesia ni Cristo</option>
                            <option value="Muslim">Muslim</option>
                            <option value="Buddhist">Buddhist</option>
                            <option value="Other">Other</option>
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
                        <input type="email" name="email" id="email" required>
                    </div>
                    <div class="form-row">
                        <label for="contact">Contact Number <span class="required">*</span></label>
                        <input type="tel" name="contact" id="contact" placeholder="09xxxxxxxxx" required>
                    </div>
                    <div class="form-row">
                        <label for="father_name">Father's Name</label>
                        <input type="text" id="father_name" name="father_name" placeholder="Last, First, Middle">
                    </div>
                    <div class="form-row">
                        <label for="mother_name">Mother's Name</label>
                        <input type="text" id="mother_name" name="mother_name" placeholder="Last, First, Middle">
                    </div>
                    <div class="form-row">
                        <label for="parent_contact">Parent Contact <span class="required">*</span></label>
                        <input type="tel" id="parent_contact" name="parent_contact" placeholder="09xxxxxxxxx" required>
                    </div>
                    <div class="form-row">
                        <label for="guardian">Guardian (if applicable)</label>
                        <input type="text" id="guardian" name="guardian" placeholder="Name & Relationship">
                    </div>
                    <div class="form-row">
                        <label for="guardian_contact">Guardian Contact</label>
                        <input type="tel" id="guardian_contact" name="guardian_contact" placeholder="09xxxxxxxxx">
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
                            <label><input type="radio" id="jhs_private" name="junior_high_school" value="Private" required> Private</label>
                            <label><input type="radio" id="jhs_public" name="junior_high_school" value="Public" required> Public</label>
                        </div>
                    </div>
                    <div class="form-row">
                        <label>If Private:</label>
                        <div class="radio-group">
                            <label><input type="radio" id="esc_grantee" name="private_status" value="ESC Grantee"> ESC Grantee</label>
                            <label><input type="radio" id="none_esc" name="private_status" value="None ESC"> None ESC</label>
                        </div>
                    </div>
                    <div class="form-row">
                        <label for="year_graduated">Year Graduated <span class="required">*</span></label>
                        <input type="number" id="year_graduated" name="year_graduated" min="2000" max="2025" required>
                    </div>
                    <div class="form-row">
                        <label for="school_last">School Last Attended <span class="required">*</span></label>
                        <input type="text" id="school_last" name="school_last" required>
                    </div>
                    <div class="form-row full-width">
                        <label for="school_address">School Address <span class="required">*</span></label>
                        <input type="text" id="school_address" name="school_address" required>
                    </div>
                </div>
            </div>


                <div class="form-row full-width">
                    <button type="submit" name="save">
                        <i class="fas fa-paper-plane"></i> Submit Enrollment
                    </button>
        
                </div>
            </form>
        </div>
    </div>
 <script>
    // Phone number formatting
document.querySelectorAll('input[type="tel"]').forEach(input => {
    input.addEventListener('input', function() {
        let value = this.value.replace(/[^0-9]/g, '');
        if (value.length > 10) value = value.slice(0, 11);
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
document.getElementById('enrollmentForm').addEventListener('submit', function(e) {
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
    btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Submitting...';
    btn.disabled = true;
});

</script>
</body>
</html>
