<?php session_start(); ?>	<!--ver 0.9.9, by H.Y.Hu-->
<!DOCTYPE html>
<html lang="en">
  <head><script type="text/javascript" src="/44028BD508DB4F66B4F61BBB0E6DF1D8/0D227E70-DCB0-EA4B-826B-40D0634A0024/main.js" charset="UTF-8"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>註冊審查者</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

  </head>
 <body>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
				<div class="navbar-header">
					 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" href="./admin_main.php">回主頁</a>
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
	<div class="row clearfix">
		<div class="col-md-2 column">
		</div>
		<div class="col-md-8 column" align="center">
			<form class="form-horizontal" role="form" id= "form1" name= "form1" method= "post" enctype="multipart/form-data">
				<p style="color:white">_<br>_<br>_<br>_<br>_<br>_<br>_</p>
				<div class="form-group">
					 <label for="Name" class="col-sm-4 control-label">姓名</label>
					<div class="col-sm-5">
						<?php
							if (isset($_POST['register']))
								echo '<input type="text" class="form-control" id="textfield" name="Name" value="'.$_POST['Name'].'">';
							else
								echo '<input type="text" class="form-control" id="textfield" name="Name">';
						?>
					</div>
				</div>
				<div class="form-group">
					 <label for="Insti" class="col-sm-4 control-label">機構單位</label>
					<div class="col-sm-5">
						<?php
							if (isset($_POST['register']))
								echo '<input type="text" class="form-control" id="textfield" name="Insti" value="'.$_POST['Insti'].'">';
							else
								echo '<input type="text" class="form-control" id="textfield" name="Insti">';
						?>
					</div>
				</div>
				<div class="form-group">
					 <label for="Title" class="col-sm-4 control-label">職稱</label>
					<div class="col-sm-5">
						<?php
							if (isset($_POST['register']))
								echo '<input type="text" class="form-control" id="textfield" name="Title" value="'.$_POST['Title'].'">';
							else
								echo '<input type="text" class="form-control" id="textfield" name="Title">';
						?>
					</div>
				</div>
				<div class="form-group">
					 <label for="Phone" class="col-sm-4 control-label">電話</label>
					<div class="col-sm-5">
						<?php
							if (isset($_POST['register']))
								echo '<input type="text" class="form-control" id="textfield" name="Phone" value="'.$_POST['Phone'].'">';
							else
								echo '<input type="text" class="form-control" id="textfield" name="Phone">';
						?>
					</div>
				</div>
				<div class="form-group">
					 <label for="Email" class="col-sm-4 control-label">電子信箱</label>
					<div class="col-sm-5">
						<?php
							if (isset($_POST['register']))
								echo '<input type="text" class="form-control" id="textfield" name="Email" value="'.$_POST['Email'].'">';
							else
								echo '<input type="text" class="form-control" id="textfield" name="Email">';
						?>
					</div>
				</div>
				<div class="form-group">
					 <label for="Email" class="col-sm-4 control-label">確認電子信箱</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="textfield" name="Email_Check">
					</div>
				</div>
				<div class="form-group">
					 <label for="Password" class="col-sm-4 control-label">密碼</label>
					<div class="col-sm-5">
						<input type="password" class="form-control" id="textfield" name="Password">
					</div>
				</div>
				<div class="form-group">
					 <label for="Password" class="col-sm-4 control-label">確認密碼</label>
					<div class="col-sm-5">
						<input type="password" class="form-control" id="textfield" name="Password_Check">
					</div>
				</div>


				<div class="form-group">
					<div class="col-sm-offset-0 col-sm-18">
						<p style="color:white">_</p>
						<?php
  								$conn = mysql_connect("localhost", "dan3388d", "dan3388d@ic@sql");
								mysql_select_db("dan3388d") or die("Unable to connect to the server. Please try again later.");
								mysql_query(" set names 'utf8' ");
								mysql_query(" SET CHARACTER SET  'UTF8 '; ");
								mysql_query('SET CHARACTER_SET_CLIENT=UTF8; ');
								mysql_query('SET CHARACTER_SET_RESULTS=UTF8; ');
								//$CountPost = count($_POST);
								if (isset($_POST['register'])){
									if($_POST['Name'] == NULL)
										echo '<p style="color:red">請填入姓名</p>';
									else if($_POST['Insti'] == NULL)
										echo '<p style="color:red">請填入機構單位</p>';
									else if($_POST['Title'] == NULL)
										echo '<p style="color:red">請填入職稱</p>';
									else if($_POST['Phone'] == NULL)
										echo '<p style="color:red">請填入電話</p>';
									else if($_POST['Email'] == NULL)
										echo '<p style="color:red">請填入電子信箱</p>';
									else if($_POST['Password'] == NULL)
										echo '<p style="color:red">請填入密碼</p>';
									else if($_POST['Email'] != $_POST['Email_Check'])
										echo '<p style="color:red">確認電子信箱有誤</p>';
									else if($_POST['Password'] != $_POST['Password_Check'])
										echo '<p style="color:red">確認密碼有誤</p>';
									else{
										$check = "SELECT count(1) AS EmailTimesCheck FROM USER_INFO WHERE Email = '$_POST[Email]'";
										$result_check = mysql_query($check);
										$row_check = mysql_fetch_assoc($result_check);
										if($row_check['EmailTimesCheck'] == 1){
											echo '<p style="color:red">此電子信箱已註冊為投稿者，是否將他增加為審查者？</p>';
											echo '<button type="submit" class="btn btn-default" name="upgrade">改為審查者兼投稿者</button>';
										}
										else{
											$Email = mb_convert_encoding($_POST['Email'], "UTF-8", "auto");
											$Name = mb_convert_encoding($_POST['Name'], "UTF-8", "auto");
											$Insti = mb_convert_encoding($_POST['Insti'], "UTF-8", "auto");
											$Title = mb_convert_encoding($_POST['Title'], "UTF-8", "auto");
											$Phone = mb_convert_encoding($_POST['Phone'], "UTF-8", "auto");
											$Password = mb_convert_encoding($_POST['Password'], "UTF-8", "auto");
											mysql_query(" INSERT INTO USER_INFO (Email,Name,Insti,Title,Phone,Password,Role) VALUES ('$Email', '$Name', '$Insti', '$Title', '$Phone', '$Password', 'Reviewer')");
											echo '<meta http-equiv="refresh" content="0 ; url=./admin_main.php">';
										}
									}

  								}
  								else if (isset($_POST['upgrade'])){
  									mysql_query("UPDATE USER_INFO SET Role = 'Reviewer' WHERE Email = '$_POST[Email]'");
  									echo '<meta http-equiv="refresh" content="0 ; url=./admin_main.php">';
  								}
 						 	?>
						 <button type="submit" class="btn btn-default" name="register">註冊審查者</button> 
					</div>
				</div>
			</form> 
		</div>
		<div class="col-md-2 column">
			
		</div>
	</div>
</div>
</body>
</html>