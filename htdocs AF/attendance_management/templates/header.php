<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<style>
body {
  /* font-family: "Lato", sans-serif; */
  font-family: Arial, Helvetica, sans-serif;
  margin-left: 40px;
}

/* Fixed sidenav, full height */
.sidenav {
  height: 100%;
  width: 230px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 20px;
}

/* Style the sidenav links and the dropdown button */
.sidenav a, .dropdown-btn {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  display: block;
  border: none;
  background: none;
  width: 100%;
  text-align: left;
  cursor: pointer;
  outline: none;
}

/* On mouse-over */
.sidenav a:hover, .dropdown-btn:hover {
  color: #f1f1f1;
  display: block;
  border: none;
  background: #207fdc;
}

/* Main content */
.main {
  margin-left: 230px; /* Same as the width of the sidenav */
  font-size: 20px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

/* Add an active class to the active dropdown button */
.active {
  background-color: #207fdc;
  color: white;
}

/* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
.dropdown-container {
  display: none;
  background-color: #262626;
  padding-left: 8px;
}

/* Optional: Style the caret down icon */
.fa-caret-down {
  float: right;
  padding-right: 8px;
}

/* Some media queries for responsiveness */
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>

<div class="sidenav">
  <img src="./images/af-logo.png" alt="AF Printers">
  <br><br>
  <a href="./dashboard.php"><i class="fa fa-home">&nbsp;</i>Dashbord</a>
  <button class="dropdown-btn"><i class="fa fa-user">&nbsp;</i>Employee
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="employee_register.php"><i class="fa fa-user">&nbsp;</i>Register Employee</a>
    <a href="manage_employee.php"><i class="fa fa-users">&nbsp;</i>Manage Employee</a>
  </div>
  <button class="dropdown-btn"><i class="fa fa-calendar-check">&nbsp;</i>Attendance
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="attendance.php"><i class="fa fa-calendar-check">&nbsp;</i>Attendance</a>
    <a href="#" data-toggle="modal" data-target="#form_attendance"><i class="fa fa-calendar-alt">&nbsp;</i>Manage</a>
    <a href="#" data-toggle="modal" data-target="#form_attendance_report"><i class="fa fa-tasks">&nbsp;</i>Report</a>
  </div>
  <a href="#" data-toggle="modal" data-target="#form_salary"><i class="fa fa-hand-holding-usd">&nbsp;</i>Manage Salary</a>
  <a href="../dashboard.php"><i class="fa fa-truck-moving">&nbsp;</i>Inventory Management</a>
</div>

  


<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}
</script>

</body>
</html> 
