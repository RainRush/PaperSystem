<?php session_start(); ?>	<!--version 1.0, by H.Y.Hu-->
<!DOCTYPE html>	
<html lang="en">
  <head><script type="text/javascript" src="/44028BD508DB4F66B4F61BBB0E6DF1D8/0EBEC49B-DE2E-6840-A4E0-82352377F2C6/main.js" charset="UTF-8"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>意見</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	
  </head>
  <body>
    <div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
				<div class="navbar-header">
					 
					<!--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						 <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
					</button>--> 
					<?php
						if ($_SESSION['Email'] != NULL){
						 	$Email = $_SESSION['Email'];
						 	$conn = mysql_connect("localhost", "dan3388d", "dan3388d@ic@sql");
							mysql_select_db("dan3388d") or die("Unable to connect to the server. Please try again later.");
							mysql_query(" set names 'utf8' ");
							mysql_query(" SET CHARACTER SET  'UTF8 '; ");
							mysql_query('SET CHARACTER_SET_CLIENT=UTF8; ');
							mysql_query('SET CHARACTER_SET_RESULTS=UTF8; ');
							$GetName = mysql_query("SELECT * FROM USER_INFO WHERE Email = '$Email'");
							$ls = mysql_fetch_row($GetName);
							$Role = $ls[6];
							$PaperNo = $_GET['PaperNo'];
						 	$CheckPaper = mysql_query("SELECT * FROM SUBMIT WHERE PaperNo = '$PaperNo'");
						 	$fs = mysql_fetch_row($CheckPaper);
						 	if($Email == $fs[0] || $ls[6] == 'admin')
						 		;
						 	else
						 		echo '<meta http-equiv="refresh" content="0 ; url=./sub_main.php">';
						 }
						 if($Role=='admin')
						 	echo '<a class="navbar-brand" href="./admin_paperlist.php">回主頁</a>';
						 else
						 	echo '<a class="navbar-brand" href="./sub_main.php">回主頁</a>';
					?>
				</div>
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a>
								<?php
								if ($_SESSION['Email'] != NULL){
						 			echo "<font color=\"WHITE\">您好，</font>";
						 			echo "<font color=\"WHITE\">".$ls[1]."</font>";
						 		}
						 		else{
						 			echo '<meta http-equiv="refresh" content="0 ; url=./main_login.php">';
						 		}
						 		?>
							</a>
						</li>
						<li>
							<form class="form-horizontal" role="form" id= "form1" name= "form1" method= "post" enctype="multipart/form-data">
							<button type="submit" name="logout" class="btn btn-link">
								登出
							</button>
							</form>
							<?php
								if(isset($_POST['logout'])){
									unset($_SESSION['Email']);
									echo '<meta http-equiv="refresh" content="0 ; url=./main_login.php">';
								} 
							?>
						</li>
					</ul>
				</div>
				
			</nav>
			<!--<nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
				<div class="navbar-header">
				
				</div>
				
			</nav>-->
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<p style="color:white">_<br>_<br>_<br>_<br>_<br>_</p>
			<h1 class="text-center">
				論文<?php 
				$PaperNo = $_GET['PaperNo']; 
				echo $PaperNo;
				$_SESSION['PaperNo'] = $PaperNo;
				?> 的意見
			</h1>
			<p style="color:white">_<br>_</p>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>
							意見
						</th>
					</tr>
				</thead>
				<tbody>
					<td>
						<?php
							$data = mysql_query("SELECT * FROM SUBMIT WHERE PaperNo = '$PaperNo'");
							$rs = mysql_fetch_row($data);
							echo '<p class="text-center">' .$rs[12]. '</p>';
						?>
					</td>
				</tbody>
			</table>
		</div>
	</div>
</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>