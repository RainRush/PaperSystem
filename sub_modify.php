<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head><script type="text/javascript" src="/44028BD508DB4F66B4F61BBB0E6DF1D8/9313DE1A-59F7-274C-9806-AA8B55F399A5/main.js" charset="UTF-8"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>更新論文</title>

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
			<!--<nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
				<div class="navbar-header">
					 
				</div>
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					
					
				</div>
				
			</nav>-->
		</div>
	</div>
	<div class="row">
		<div class="col-md-2">
		</div>
		<div class="col-md-8" align="center">
			<p style="color:white">_<br>_<br>_<br>_<br>_<br>_</p>
			<h1 class="text-center">
				更新論文
			</h1> 
			<h3>
				編號：
				<?php 
					$PaperNo = $_GET['PaperNo'];
					echo $PaperNo;
					$_SESSION['PaperNo'] = $PaperNo;
				?>
			</h3>
			<form class="form-horizontal" role="form" id= "form1" name= "form1" method= "post" enctype="multipart/form-data">
				<?php
					$data = mysql_query("SELECT * FROM SUBMIT WHERE PaperNo = '$PaperNo'");
					$CountNo = mysql_num_rows($data);
					$rs = mysql_fetch_row($data);		
				?>
				<div class="form-group">
					 <label for="Name" class="col-sm-4 control-label">論文主題</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="textfield" name="PaperTitle" value="<?php echo $rs[2]?>">
					</div>
				</div>
				<div class="form-group">
					 <label for="Name" class="col-sm-4 control-label">論文作者1</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="textfield" name="Author1" value="<?php echo $rs[5]?>">
					</div>
				</div>
				<div class="form-group">
					 <label for="Name" class="col-sm-4 control-label">論文作者2</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="textfield" name="Author2" value="<?php echo $rs[6]?>">
					</div>
				</div>
				<div class="form-group">
					 <label for="Name" class="col-sm-4 control-label">論文作者3</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="textfield" name="Author3" value="<?php echo $rs[7]?>">
					</div>
				</div>
				<div class="form-group">
					 <label for="Name" class="col-sm-4 control-label">論文作者4</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="textfield" name="Author4" value="<?php echo $rs[8]?>">
					</div>
				</div>
				<div class="form-group">
					 <label for="Name" class="col-sm-4 control-label">論文作者5</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="textfield" name="Author5" value="<?php echo $rs[9]?>">
					</div>
				</div>
				<div class="form-group">
					 <label for="Name" class="col-sm-4 control-label">論文作者6</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="textfield" name="Author6" value="<?php echo $rs[10]?>">
					</div>
				</div>
				<?php
					/*if(isset($_POST['add_author'])){
						if($_POST['Author1'] != NULL && $_POST['Author2'] != NULL && $_POST['Author3'] != NULL){
						switch (count($_POST)) {
							case '5':
								echo '<div class="form-group">
					 			<label for="Name" class="col-sm-4 control-label">論文作者4</label>
								<div class="col-sm-4">
								<input type="text" class="form-control" id="textfield" name="Author4">
								</div>
								</div>';
								break;
							case '6':
								echo '<div class="form-group">
					 			<label for="Name" class="col-sm-4 control-label">論文作者4</label>
								<div class="col-sm-4">
								<input type="text" class="form-control" id="textfield" name="Author4">
								</div>
								</div>';
								echo '<div class="form-group">
					 			<label for="Name" class="col-sm-4 control-label">論文作者5</label>
								<div class="col-sm-4">
								<input type="text" class="form-control" id="textfield" name="Author5">
								</div>
								</div>';
								break;
							
							default:
								echo '<div class="form-group">
					 			<label for="Name" class="col-sm-4 control-label">論文作者4</label>
								<div class="col-sm-4">
								<input type="text" class="form-control" id="textfield" name="Author4">
								</div>
								</div>';
								echo '<div class="form-group">
					 			<label for="Name" class="col-sm-4 control-label">論文作者5</label>
								<div class="col-sm-4">
								<input type="text" class="form-control" id="textfield" name="Author5">
								</div>
								</div>';
								echo '<div class="form-group">
					 			<label for="Name" class="col-sm-4 control-label">論文作者6</label>
								<div class="col-sm-4">
								<input type="text" class="form-control" id="textfield" name="Author6">
								</div>
								</div>';
								echo "至多六名作者";
								break;
						}
						}
						else
							echo '<p style="color:red">尚有作者未填</p>';
					}*/
				?>
				<!--<div class="form-group">
					<button type="submit" name="add_author" class="btn btn-default">新增一名作者</button>
				</div>-->
				<div class="form-group" align="center">
				<button type="submit" class="btn btn-default" name="update_info">
					更新資訊
				</button>
				<div class="form-group" align="center">
					<p style="color:white">_<br>_</p> 
					<label for="exampleInputFile">
						論文上傳
					</label>
					<input type="file" id="exampleInputFile" name="File">
					<p>原檔為：<?php echo $rs[3]?></p>
				</div>
				<?php
				if (isset($_POST['update_paper'])){
					if($_FILES['File']['error'])
						echo '<p style="color:red">上傳失敗</p>';
					else{
						//echo $_FILES['File']['name'];
						$FileName = $_FILES['File']['name'];
						move_uploaded_file($_FILES['File']['tmp_name'], 'upload/'.session_id().'_'. time().'.'.pathinfo($_FILES['File']['name'],PATHINFO_EXTENSION));
						//echo $_FILES['File']['name'];
						//$FileName = $_POST['File'];
						//echo $FileName;
						echo $_POST['File'];
						$FileURL = 'upload/'.session_id().'_'. time().'.'.pathinfo($_FILES['File']['name'],PATHINFO_EXTENSION);
						mysql_query("UPDATE SUBMIT SET FileName = '$FileName' WHERE PaperNo = '$PaperNo'");
						mysql_query("UPDATE SUBMIT SET FileURL = '$FileURL' WHERE PaperNo = '$PaperNo'");
						echo $_FILES['File']['name'];
						echo '<p>?!</p>';
						echo $FileName; 
						echo "<p>!!</p>";
						echo '<meta http-equiv="refresh" content="0 ; url=./sub_main.php">';
					}
				}
				else if (isset($_POST['update_info'])){
					mysql_query("UPDATE SUBMIT SET Author1 = '$_POST[Author1]' WHERE PaperNo = '$PaperNo'");
					mysql_query("UPDATE SUBMIT SET PaperTitle = '$_POST[PaperTitle]' WHERE PaperNo = '$PaperNo'");
					mysql_query("UPDATE SUBMIT SET Author2 = '$_POST[Author2]' WHERE PaperNo = '$PaperNo'");
					mysql_query("UPDATE SUBMIT SET Author3 = '$_POST[Author3]' WHERE PaperNo = '$PaperNo'");
					mysql_query("UPDATE SUBMIT SET Author4 = '$_POST[Author4]' WHERE PaperNo = '$PaperNo'");
					mysql_query("UPDATE SUBMIT SET Author5 = '$_POST[Author5]' WHERE PaperNo = '$PaperNo'");
					mysql_query("UPDATE SUBMIT SET Author6 = '$_POST[Author6]' WHERE PaperNo = '$PaperNo'");
					echo '<meta http-equiv="refresh" content="0 ; url=./sub_main.php">';
				}
				else if (isset($_POST['back']))
					echo '<meta http-equiv="refresh" content="0 ; url=./sub_main.php">';
				?>
				<button type="submit" class="btn btn-default" name="update_paper">
					更新論文
				</button>
				<p style="color:white">_<br>_</p> 
				<button type="submit" class="btn btn-default" name="back">
					回到主頁
				</button>
				
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