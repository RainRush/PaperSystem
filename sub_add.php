<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head><script type="text/javascript" src="/44028BD508DB4F66B4F61BBB0E6DF1D8/9313DE1A-59F7-274C-9806-AA8B55F399A5/main.js" charset="UTF-8"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>新增投稿</title>

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
					</button>--> <a class="navbar-brand" href="./sub_main.php">回主頁</a>
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
				新增投稿
			</h1> 
			<form class="form-horizontal" role="form" id= "form1" name= "form1" method= "post" enctype="multipart/form-data">
				<div class="form-group">
					 <label for="Name" class="col-sm-4 control-label">論文主題</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="textfield" name="PaperTitle">
					</div>
				</div>
				<div class="form-group">
					 <label for="Name" class="col-sm-4 control-label">論文作者1</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="textfield" name="Author1">
					</div>
				</div>
				<div class="form-group">
					 <label for="Name" class="col-sm-4 control-label">論文作者2</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="textfield" name="Author2">
					</div>
				</div>
				<div class="form-group">
					 <label for="Name" class="col-sm-4 control-label">論文作者3</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="textfield" name="Author3">
					</div>
				</div>
				<div class="form-group">
					 <label for="Name" class="col-sm-4 control-label">論文作者4</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="textfield" name="Author4">
					</div>
				</div>
				<div class="form-group">
					 <label for="Name" class="col-sm-4 control-label">論文作者5</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="textfield" name="Author5">
					</div>
				</div>
				<div class="form-group">
					 <label for="Name" class="col-sm-4 control-label">論文作者6</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="textfield" name="Author6">
					</div>
				</div>

				<div class="form-group" align="center">
					 
					<label for="exampleInputFile">
						論文上傳
					</label>
					<input type="file" id="exampleInputFile" name="File">
					<?php
  						$conn = mysql_connect("localhost", "dan3388d", "dan3388d@ic@sql");
						mysql_select_db("dan3388d") or die("Unable to connect to the server. Please try again later.");
						mysql_query(" set names 'utf8' ");
						mysql_query(" SET CHARACTER SET  'UTF8 '; ");
						mysql_query('SET CHARACTER_SET_CLIENT=UTF8; ');
						mysql_query('SET CHARACTER_SET_RESULTS=UTF8; '); 
  						if(isset($_POST)){
  			//echo '<p style="color:white">_<br>_<br>_<br>_<br>_<br>_</p>';
  			//foreach ($_POST as $key => $value) {
  			//	echo $key . '=' . $value .'<br>';
  			//}
  			//echo count($_POST) . '<br>';
  							if (isset($_POST['paper'])){
  				//echo 'get';
				//foreach ($_POST as $key => $value) {
				//	echo $key.' = '. $value .'<br>';
				//}
								if($_FILES['File']['error'])
					//echo $_FILES['File']['error'];
									echo '<p style="color:red">上傳失敗</p>';
								else{
									echo $_FILES['File']['name'];
									$FileName = $_FILES['File']['Name'];
									move_uploaded_file($_FILES['File']['tmp_name'], 'upload/'.session_id().'_'. time().'.'.pathinfo($_FILES['File']['name'],PATHINFO_EXTENSION));
									$Email = $_SESSION['Email'];
									$data = mysql_query("SELECT * FROM SUBMIT");
									$CountNo = mysql_num_rows($data);
									$PaperNo = $CountNo + 1;
					//echo '<p style="color:white">_<br>_<br>_<br>_<br>_<br>_</p>';
									echo $_FILES['File']['name'];
									$FileName = $_FILES['File']['name'];
									echo $FileName;
									$FileURL = 'upload/'.session_id().'_'. time().'.'.pathinfo($_FILES['File']['name'],PATHINFO_EXTENSION);
									mysql_query("INSERT INTO SUBMIT(Email,PaperNo,PaperTitle,FileName,FileURL,Author1,Author2,Author3,Author4,Author5,Author6) VALUES ('$Email','$PaperNo','$_POST[PaperTitle]','$FileName','$FileURL','$_POST[Author1]','$_POST[Author2]','$_POST[Author3]','$_POST[Author4]','$_POST[Author5]','$_POST[Author6]')");
									echo '<meta http-equiv="refresh" content="0 ; url=./sub_main.php">';
								}
				
  							}
  							else if (isset($_POST['back']))
  								echo '<meta http-equiv="refresh" content="0 ; url=./sub_main.php">';
  						}
  					?>

				</div>
				<button type="submit" name="paper" class="btn btn-default">
					新增論文
				</button>
				<br><br>
				<button type="submit" name="back" class="btn btn-default">
					回到主頁
				</button>

				<!--<button type="submit" name="author" class="btn btn-default">
					新增作者
				</button>-->
			</form>
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