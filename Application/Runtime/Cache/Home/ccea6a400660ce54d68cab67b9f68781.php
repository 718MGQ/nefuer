<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>知派</title>
	<meta charset="utf-8">
	<meta name="baidu_union_verify" content="5c13c4926eee7bdfd468bea2d30f753b">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<script src="https://code.jquery.com/jquery-1.11.3.js"></script>

	<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<div class="row clearfix">
			<div class="col-md-12 column">
				<div class="row clearfix" style="margin-top: 100px;">
					<div class="col-md-3 column">
					</div>
					<div class="col-md-6 column">
						<div class="jumbotron" style="background-color: rgb(235, 255, 235);">
							请使用教务系统账号密码登陆<br><br>
							登录授权知派<a onclick="javascript:alert('1.登陆教务系统\n2.查询个人信息\n3.查询课程信息\n4.查询成绩信息\n声明：你的信息仅将被用作失物通知、成绩查询、成绩推送以及后期开发的个人功能，知派保证不会以任何方式泄漏您的信息');">获取相关信息</a>
						</div>
						<form class="form-horizontal" onsubmit="return false;" role="form">
							<div class="form-group">
								 <label for="inputEmail3" class="col-sm-2 control-label">学号：</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="acc" id="acc" >
								</div>
							</div>
							<div class="form-group">
								 <label for="inputPassword3" class="col-sm-2 control-label">密码：</label>
								<div class="col-sm-10">
									<input type="password" class="form-control" name="pwd" id="pwd" />
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									 <button type="submit" class="btn btn-default" id="btn" onclick="dis();" style="float: right;padding-left: 30px; padding-right: 30px">登录并授权</button>
								</div>
							</div>
						</form>
					</div>
					<div class="col-md-3 column">
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="error">
		
	</div>
	<script type="text/javascript" src="/lib/jquery.md5.js"></script> 
	<script type="text/javascript">
		function dis()
		{
			document.getElementById('btn').disabled = true;
			$.ajax({
				url : '/nefuer/index.php/V1/User/login',
				method : 'post',
				dataType : 'json',
				data : {
					username : $('#acc').val(),
					password : $('#pwd').val()
				},
				success : function(result)
				{
					document.getElementById('btn').disabled = false;
					/**
					 * true : 成功
					 */
					if(result.code === 0)
					{
						window.location.assign('/nefuer?ope=<?php echo ($ope); ?>');
					}
					else
					{
						alert(result.message);
					}
				},
				error : function(XMLHttpRequest, textStatus, errorThrown) {
					alert(XMLHttpRequest.responseText);
				}
			});
		}
	</script>
</body>
</html>