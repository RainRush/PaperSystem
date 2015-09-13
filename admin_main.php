<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head><script type="text/javascript" src="/44028BD508DB4F66B4F61BBB0E6DF1D8/97A31538-E8BA-7845-A138-6A5951FF0B7B/main.js" charset="UTF-8"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>管理員主頁</title>

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
					</button> <a class="navbar-brand" href="./admin_main.php">首頁</a>
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
		<div class="col-md-12">
			<h3 class="text-center">
				<p style="color:white">_<br>_</p>
				管理員主頁
			</h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-1">
		</div>
		
		<div class="col-md-5" align="center">
			<h3 class="text-center">
				使用者管理
			</h3>
			<h3 class="text-muted">
				審查者兼投稿者
			</h3>
			<form class="form-horizontal" role="form" method= "post" enctype="multipart/form-data">
			<table class="table">
				<thead>
					<tr>
						<th>
							Email
						</th>
						<th>
							姓名
						</th>
						<th>
							單位
						</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$data = mysql_query("SELECT * FROM USER_INFO WHERE Role = 'Reviewer'");
						$CountNo = mysql_num_rows($data);
						if($CountNo>5){$CountNo=5;};						

						for($i=0; $i<($CountNo);$i++){
							$rs = mysql_fetch_row($data);
							echo '<tr class="default">';
							echo '<td>' . $rs[0] . '</td>';
							echo '<td>' . $rs[1] . '</td>';
							echo '<td>' . $rs[2] . '</td>';
							echo '</tr>';
						}
					?>
				</tbody>
			</table>
			</form>
				<!--<a href="./admin_regi_review.php" class="btn" type="button">新增審查者</a>-->
				<a href="./admin_main.php" class="btn" type="button">暫無法新增審查者</a>
			<h3 class="text-muted">
				投稿者
			</h3>
			<br>
			<a type="button" class="btn btn-default" href="admin_sub.php">
				投稿者完整資料
			</a>
		</div>
		
		<div class="col-md-5" align="center">
			<h3 class="text-center">
				論文管理
			</h3>
			<br>
			<a type="button" class="btn btn-default" href="admin_paperlist.php">
				論文清單及給評
			</a>
		</div>
		<div class="col-md-1">
		</div>
	</div>
</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>