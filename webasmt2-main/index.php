<?php
// index.php
// This file contains the form and client-side logic.
// It uses AJAX to POST to submit.php and shows the formatted result
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Online Registration | Vaibhava G</title>

  <!-- jQuery CDN -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

  <style>
    /* Simple professional styling */
    body { font-family: Inter, Arial, sans-serif; background:#f4f7fb; color:#222; padding:24px; }
    .card { max-width: 820px; margin: 12px auto; background:#fff; border-radius:10px; box-shadow:0 6px 20px rgba(30,40,60,0.08); padding:22px; }
    h1 { margin:0 0 10px; font-size:22px; color:#10375c; }
    form { display:grid; grid-template-columns: 1fr 1fr; gap:14px; margin-top:12px; }
    label { display:block; font-weight:600; margin-bottom:6px; font-size:13px; color:#2b3a4a; }
    input[type="text"], input[type="email"], select, textarea {
      width:90%; padding:10px 12px; border:1px solid #d7dbe0; border-radius:8px; font-size:14px;
      background: #fff;
    }
    textarea { min-height:100px; resize:vertical; grid-column: 1 / -1; }
    .full { grid-column: 1 / -1; display:flex; gap:10px; justify-content:flex-end; }
    button { background:#0b78d1; color:#fff; border:none; padding:10px 16px; border-radius:8px; cursor:pointer; font-weight:700; }
    button:disabled { opacity:0.6; cursor:not-allowed; }
    .result { margin-top:18px; padding:18px; border-radius:8px; background: linear-gradient(180deg,#fff,#f8fbff); border:1px solid #e6eefc; }
    .field-row { margin-bottom:8px; }
    .muted { color:#6f7b87; font-size:13px; }
    /* responsive */
    @media (max-width:720px) {
      form { grid-template-columns: 1fr; }
      .full { justify-content: stretch; flex-direction:column; }
    }
  </style>
</head>
<body>

  <div class="card">
    <h1>Online Application / Registration Form</h1>
    <p class="muted">Fill the form and click Submit — your formatted application will appear below.</p>

    <form id="regForm" autocomplete="off">
      <div>
        <label for="fullname">Full Name</label>
        <input id="fullname" name="fullname" type="text" required placeholder="First Last">
      </div>

      <div>
        <label for="email">Email</label>
        <input id="email" name="email" type="email" required placeholder="you@example.com">
      </div>

      <div>
        <label for="phone">Phone</label>
        <input id="phone" name="phone" type="text" required placeholder="+91 98xxxxxx">
      </div>

      <div>
        <label for="dob">Date of Birth</label>
        <input id="dob" name="dob" type="text" placeholder="DD MMM YYYY (e.g. 17 May 2005)">
      </div>

      <div>
        <label for="course">Applying For</label>
        <select id="course" name="course" required>
          <option value="">-- Select --</option>
          <option>Internship - Web Development</option>
          <option>Internship - Machine Learning</option>
          <option>Full-time - Junior Developer</option>
          <option>College Project Collaboration</option>
        </select>
      </div>

      <div>
        <label for="gender">Gender</label>
        <select id="gender" name="gender">
          <option value="">Prefer not to say</option>
          <option>Male</option>
          <option>Female</option>
          <option>Other</option>
        </select>
      </div>

      <div style="grid-column:1 / -1;">
        <label for="address">Address</label>
        <textarea id="address" name="address" placeholder="Your address..."></textarea>
      </div>

      <div class="full">
        <button id="submitBtn" type="submit">Submit Application</button>
      </div>
    </form>

    <div id="messageBox" class="result" style="display:none;"></div>
  </div>

  <script>
    // jQuery: handle submit via AJAX and display formatted response
    $(function(){
      $('#regForm').on('submit', function(evt){
        evt.preventDefault();
        $('#submitBtn').prop('disabled', true).text('Submitting...');

        // Serialize form
        var formData = $(this).serialize();

        $.ajax({
          url: 'submit.php',
          method: 'POST',
          data: formData,
          dataType: 'html',
          success: function(responseHtml){
            $('#messageBox').html(responseHtml).show();
            $('#submitBtn').prop('disabled', false).text('Submit Application');
            // Optionally clear form:
            // $('#regForm')[0].reset();
            // Smooth scroll to result
            $('html,body').animate({ scrollTop: $('#messageBox').offset().top - 20 }, 400);
          },
          error: function(xhr, status, err){
            $('#messageBox').html('<strong>Submission failed.</strong> Try again.').show();
            $('#submitBtn').prop('disabled', false).text('Submit Application');
          }
        });
      });
    });
  </script>

</body>
</html>