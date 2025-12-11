<?php
// submit.php
// Accept POST values, sanitize them, and print a formatted HTML card
function e($k){ return isset($_POST[$k]) ? htmlspecialchars(trim($_POST[$k]), ENT_QUOTES, 'UTF-8') : ''; }

$fullname = e('fullname');
$email    = e('email');
$phone    = e('phone');
$dob      = e('dob');
$course   = e('course');
$gender   = e('gender');
$address  = nl2br(e('address'));

// Basic server-side validation
$errors = [];
if(!$fullname) $errors[] = "Full name is required.";
if(!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "A valid email is required.";
if(!$phone) $errors[] = "Phone is required.";
if(!$course) $errors[] = "Please select what you're applying for.";

if(!empty($errors)) {
  echo "<div style='color:#a94442; background:#fdecea; padding:12px; border-radius:8px; border:1px solid #f1b0b7;'>";
  echo "<strong>There were problems with your submission:</strong><ul style='margin-top:8px;'>";
  foreach($errors as $err) echo "<li>".htmlspecialchars($err)."</li>";
  echo "</ul></div>";
  exit;
}

// If ok, print formatted HTML (you can also save to DB or email here)
?>
<div style="font-family: Inter, Arial, sans-serif; color:#1f2b38;">
  <div style="display:flex; gap:18px; align-items:center;">
    <div style="width:64px; height:64px; background:#0b78d1; color:#fff; border-radius:12px; display:flex; align-items:center; justify-content:center; font-weight:800; font-size:20px;">
      <?php echo strtoupper(substr($fullname,0,1)); ?>
    </div>
    <div>
      <h2 style="margin:0; color:#0b3b66; font-size:18px;"><?php echo $fullname; ?></h2>
      <div style="color:#6b7b86; font-size:13px;"><?php echo $course; ?> • <?php echo $gender ?: '—'; ?></div>
    </div>
  </div>

  <hr style="margin:14px 0; border:none; border-top:1px solid #eef5fb;" />

  <div style="display:grid; grid-template-columns: 1fr 1fr; gap:12px;">
    <div>
      <div style="font-size:12px; color:#6b7b86;">Email</div>
      <div style="font-weight:700;"><?php echo $email; ?></div>
    </div>
    <div>
      <div style="font-size:12px; color:#6b7b86;">Phone</div>
      <div style="font-weight:700;"><?php echo $phone; ?></div>
    </div>

    <div>
      <div style="font-size:12px; color:#6b7b86;">Date of Birth</div>
      <div><?php echo $dob ?: '—'; ?></div>
    </div>

    <div>
      <div style="font-size:12px; color:#6b7b86;">Submitted On</div>
      <div><?php echo date('d M Y, H:i'); ?></div>
    </div>
  </div>

  <div style="margin-top:12px;">
    <div style="font-size:12px; color:#6b7b86;">Address</div>
    <div style="padding:10px; background:#fbfdff; border:1px solid #e7f0fc; border-radius:8px;"><?php echo $address ?: '—'; ?></div>
  </div>

  <div style="margin-top:14px; display:flex; gap:10px;">
    <a href="#" onclick="window.print(); return false;" style="text-decoration:none; background:#0b78d1; color:#fff; padding:8px 12px; border-radius:8px; font-weight:700;">Print</a>
    <a href="#" onclick="location.reload()" style="text-decoration:none; background:#eef6ff; color:#0b78d1; padding:8px 12px; border-radius:8px; font-weight:700;">Submit new</a>
  </div>
</div>