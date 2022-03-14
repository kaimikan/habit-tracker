<!DOCTYPE html>
<html>
<head>
  <script src="menu.js" active="calendar"></script>
  <link rel="stylesheet" href="css/calendar_style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

<div class="container">
  <div class="calendar">
    <div class="month">
      <i class="fas fa-angle-left prev"></i>
        <div class="date">
          <h1></h1>
          <p></p>
        </div>
        <i class="fas fa-angle-right next"></i>
    </div>
    <div class="weekdays">
      <div>Sun</div>
      <div>Mon</div>
      <div>Tue</div>
      <div>Wed</div>
      <div>Thu</div>
      <div>Fri</div>
      <div>Sat</div>
    </div>
    <div class="days">
    </div>
  </div>
</div>

<!-- calling at the bottom of the page to make sure document. is ready-->
<script src="calendar_script.js"></script>
</body>
</html>