<?php

include 'header.php';

?>

<div class="account-pages"></div>
<div class="clearfix"></div>
<div class="wrapper-page">

	<body>

			<div class=" card-box">
				<div class="panel-heading">
					<h3 class="text-center">找回密码</h3>
				</div>

				<div class="panel-body">
					<form method="post" action="#" role="form" class="text-center">
						<div class="alert alert-info alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
								×
							</button>
							请输入<b>邮箱或手机号</b>!
						</div>
						<div class="form-group m-b-0">
							<div class="input-group">
								<input type="email" class="form-control" placeholder="输入邮箱地址或手机号" required="">
								<span class="input-group-btn">
									<button type="submit" class="btn btn-pink w-sm waves-effect waves-light">
										下一步
									</button> 
								</span>
							</div>
						</div>

					</form>
				</div>
			</div>
			
		</div>

<?php

include 'footer.php';

?>