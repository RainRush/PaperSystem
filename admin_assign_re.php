<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>分配論文</title>

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
		<div class="col-md-4">
		<p style="color:white">_<br>_<br>_<br>_<br>_<br>_</p>
		<form class="form-horizontal" role="form" method= "post" enctype="multipart/form-data">
			<p class="lead">
				分配論文編號
				<?php 
					$PaperNo = $_GET['PaperNo'];
					echo $PaperNo;
					$_SESSION['PaperNo'] = $PaperNo;
				?>
				給：
			</p> 
			<?php
				$data = mysql_query("SELECT * FROM USER_INFO WHERE Role = 'Reviewer'");
				$CountNo = mysql_num_rows($data);
				
				for($i=0; $i<($CountNo);$i++){
					$rs = mysql_fetch_row($data);
			?>
					<label class="radio-inline"><input type="radio" name="Email" value="<?php echo $rs[0] ?>"><?php echo $rs[1]?></label>
			<?php
				}
			?>
			<?php
				if (isset($_POST['assign'])){
					mysql_query("INSERT INTO PAPER_ASSIGN(PaperNo,Email_Re) VALUES ('$PaperNo','$_POST[Email]')");
					echo '<meta http-equiv="refresh" content="0 ; url=./admin_main.php">';
				}
			?>
			<p  style="color:white">_</p>
			<button type="submit" class="btn btn-default" name="assign">
				確定
			</button>
		</form>
		</div>
		<div class="col-md-4">
			<p style="color:white">_<br>_<br>_<br>_<br>_<br>_</p>
			<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
				<table class="table">
					<thead>
						<tr>
							<th>
								目前分配
							</th>
							<th>
								操作
							</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$GetEmail = mysql_query("SELECT * FROM PAPER_ASSIGN WHERE PaperNo = '$PaperNo'");
							$CountNo1 = mysql_num_rows($GetEmail);
							for($j=0;$j<($CountNo1);$j++){	
								$ls = mysql_fetch_row($GetEmail);
								$data = mysql_query("SELECT * FROM USER_INFO WHERE Email = '$ls[1]'");
								$CountNo = mysql_num_rows($data);
								for($i=0; $i<($CountNo);$i++){
									$rs = mysql_fetch_row($data);
									$rs1 = mysql_fetch_row($result1);
									echo '<tr class="default">';
									echo '<td>' . $rs[1] . '</td>';
									echo '<td> <button type="submit" class="btn btn-default" name="delete">收回此分配</button> </td>';
									echo '</tr>';
								}
							}
						?>
					</tbody>
				</table>
			</form>	
		</div>
		<?php
			if(isset($_POST['delete'])){
				mysql_query("DELETE FROM PAPER_ASSIGN WHERE PaperNo = '$PaperNo' AND Email_Re = '$rs[0]'");
				echo '<meta http-equiv="refresh" content="0 ; url=./admin_paperlist.php">';
			}
		?>
		<div class="col-md-2">
		</div>
	</div>
</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>