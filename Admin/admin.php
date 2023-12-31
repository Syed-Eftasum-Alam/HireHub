<?php

require_once ('config.php');
session_start();



$sql1 = "SELECT * FROM user where type='seeker' and approval=1";
$result = mysqli_query($conn, $sql1);
$num1 = mysqli_num_rows($result);

$sql2 = "SELECT * FROM user where type='company' and approval=1";
$result = mysqli_query($conn, $sql2);
$num2 = mysqli_num_rows($result);

$sql3= "SELECT * FROM job";
$result = mysqli_query($conn, $sql3);
$num3 = mysqli_num_rows($result);



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>Header</title>
</head>
<body>
    <body>
        <div class="navbar">
          <img src="../images/mainlogo.png" style="width: 7%;" alt="">
            <a href="admin.php">Dashboard</a>
            <a href="approval.php">Approval</a>
            <a href="tutorial.php">Tutorial Upload</a>
            <a href="settings.php">Settings</a>
          <img src="../images/avatar.png" onclick="toggleMenu()" style="width: 50px; height:1%; margin-left:50%; margin-top:1.25%" > 
          
          <div class="sub-menu-wrap" id="subMenu">

            <div class="sub-menu">
                 <div class="user-info">
                    <img src="../images/avatar.png"  alt="">
                    <h2>Admin</h2>
                 </div>
                 <hr>
                
               <a href="logout.php" class="sub-menu-link">
                <img src="../images/logout.png" alt="">
                <p>Log Out</p>
                <span> > </span>
             </a>
            </div>

          </div>
          


 </div>
        <div class="container">
            <div class="card-container">
                <div class="card">
                <img src="../images/employee.png" alt="">
                  <h2>Total Seeker</h2>
                  <p>Total added job seekers are rising day by day and current number is-</p>
                  <div class="circle">
                    <h1><?php echo $num1?></h1>
                  </div> 
                 
                </div>
                <div class="card">
                  <img src="../images/company.png" alt="">
                  <h2>Total Company </h2>
                  <p>Total added job seekers are rising day by day and current number is-</p>
                  <div class="circle">
                  <h1><?php echo $num2?></h1>
                  </div> 
                
                </div>
                <div class="card">
                    <img src="../images/jobs(2).png" alt="">
                  <h2>Total Job Circular</h2>
                  <p>Total added job seekers are rising day by day and current number is-</p>
                  <div class="circle">
                  <h1><?php echo $num3?></h1>
                  </div> 
             
                </div>
               
              </div>
        </div>
        <br>
        <div class="graphsec">
          <div class="graph" style="text-align: center;">
            <div id="columnchart_values" style="width: 900px; height: 300px; margin-left:15%"></div>
        </div>
        <div class="graph" style="text-align: center; margin-left:2%">
          <div id="piechart_3d" style="width: 1100; height: 500; text-align:center;margin-left:15%"></div>
      </div>

 </div> 
     
       
</body>
</html>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Task', 'Hours per Day'],
      ['Work Circular',     0],
      ['Hirer',      <?php echo $num2 ?>],
      ['Seeker',  <?php echo $num1 ?>],

    ]);

    var options = {
      width: 550,
      height: 400,
      title: 'Graphical Represntation',
      backgroundColor: 'transparent',
      legendTextStyle: { color: '#FFF' },
      titleTextStyle: { color: '#FFF' },
      color: '#FFF',
      is3D: true,
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
    chart.draw(data, options);
  }
</script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load("current", {packages:['corechart']});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ["Element", "Density", { role: "style" } ],
      ["Seeker", <?php echo $num1 ?>, "orange"],
      ["Employer", <?php echo $num2 ?>, "White"],
      ["Jobs", <?php echo $num3 ?>, "Red"],
    ]);

    var view = new google.visualization.DataView(data);
    view.setColumns([0, 1,
                     { calc: "stringify",
                       sourceColumn: 1,
                       type: "string",
                       role: "annotation" },
                     2]);

    var options = {
      title: "Graphical Representation",
      Element:{color: `#FFF`},
      width: 550,
      height: 400,
      bar: {groupWidth: "65%"},
      legend: { position: "none" },
      legendTextStyle: { color: '#FFF' },
      titleTextStyle: { color: '#FFF' },
      backgroundColor: 'transparent',
      color: `white`
    };
    var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
    chart.draw(view, options);
}



</script>
<script>
      let subMenu= document.getElementById("subMenu");
      function toggleMenu(){
        subMenu.classList.toggle("open");
      }
</script>


