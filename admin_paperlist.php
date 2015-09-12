<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head><script type="text/javascript" src="/44028BD508DB4F66B4F61BBB0E6DF1D8/0EBEC49B-DE2E-6840-A4E0-82352377F2C6/main.js" charset="UTF-8"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>論文清單及分配</title>

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
					 
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						 <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
					</button> <a class="navbar-brand" href="./admin_main.php">回主頁</a>
				</div>
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

					<ul class="nav navbar-nav navbar-right">
						<li>
							<a>
								<?php
								if ($_SESSION['Email'] != NULL){
						 			echo "<font color=\"WHITE\">您好，</font>";
						 			$Email = $_SESSION['Email'];
						 			$conn = mysql_connect("localhost", "dan3388d", "dan3388d@ic@sql");
									mysql_select_db("dan3388d") or die("Unable to connect to the server. Please try again later.");
									mysql_query(" set names 'utf8' ");
									mysql_query(" SET CHARACTER SET  'UTF8 '; ");
									mysql_query('SET CHARACTER_SET_CLIENT=UTF8; ');
									mysql_query('SET CHARACTER_SET_RESULTS=UTF8; ');
						 			$GetName = mysql_query("SELECT * FROM USER_INFO WHERE Email = '$Email'");
						 			$ls = mysql_fetch_row($GetName);
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
		</div>
	</div>
	<div class="row">
		<div class="col-md-2">
		</div>
		<div class="col-md-8" align="center">
			<p style="color:white">_<br>_<br>_<br>_<br>_<br>_</p>
			<h1 class="text-center">
				論文完整資料
			</h1> 
			<table class="table">
				<thead>
					<tr>
						<th>
							論文編號
						</th>
						<th>
							論文名稱
						</th>
						<th>
							論文狀態
						</th>
						<th>
							操作
						</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$conn = mysql_connect("localhost", "dan3388d", "dan3388d@ic@sql");
						mysql_select_db("dan3388d") or die("Unable to connect to the server. Please try again later.");
						mysql_query(" set names utf8 ");
						mysql_query(" SET CHARACTER SET  'UTF8 '; ");
						mysql_query('SET CHARACTER_SET_CLIENT=UTF8; ');
						mysql_query('SET CHARACTER_SET_RESULTS=UTF8; ');
						$data = mysql_query("SELECT * FROM SUBMIT");
						$CountNo = mysql_num_rows($data);
						$AssignData = mysql_query("SELECT * FROM PAPER_ASSIGN");

						for($i=0; $i<($CountNo);$i++){
							$rs = mysql_fetch_row($data);
							$rs1 = mysql_fetch_row($AssignData);
							$CheckAssign = mysql_query("SELECT * FROM SUBMIT WHERE PaperNo == $rs1[0]");
							$ca = mysql_num_rows($CheckAssign);
							$FileName = $rs[3];
							$FileURL = $rs[4];
							echo '<tr class="default">';
							echo '<td>' . $rs[1] . '</td>';
							echo '<td>' . $rs[2] . '</td>';
							
							if ($ca == 0){
								echo '<td>未分配</td>';
							}
							else
								echo '<td>已分配</td>';
							echo ('<td>
								<button type="submit" class="btn btn-default">給評</button>
								<a type="button" class="btn btn-default" href="http://140.120.54.230/dan3388d/sys/'.$FileURL.'">下載論文</a>
								檔名：'.$FileName.'	</td>');
							echo '</tr>';
						}
					?>
				</tbody>
			</table>
			<p style="color:white">_</p>
			<a type="button" class="btn btn-default" href="./admin_main.php">回到主頁</a>
		</div>
		<div class="col-md-2">
		</div>
	</div>
</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>