			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">首页</a><span class="divider">></span>
					</li>
					<li>
						<a href="<?=base_url()?>user/info">管理员</a><span class="divider">></span>
					</li>
					<li>
						<span>修改密码</span>
					</li>
				</ul>
			</div>	

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-wrench"></i>修改密码</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						<div class="control-group" style="margin: 8px;">
							<form id="frm" method="post" action="<?=base_url()?>user/modifyPasswordSubmit">
								<span class="result-info" style="position:relative;left:40%;"><?=$alertInfo['result']?></span>
								<table class="" style="width:40%;margin:0 auto 10px;" >
									<tr>
										<td style="text-align:center">当前密码</td>
										<td><input name="oPassword" type="password" value="<?=$userinfo['oPassword']?>" /></td>
										<td><span class="alert-info"><?=$alertInfo['oPassword']?></span></td>
									</tr>
									<tr>
										<td style="text-align:center">新的密码</td>
										<td><input name="nPassword" type="password" value="<?=$userinfo['nPassword']?>" pattern="(?=.{8,})((?=.*[^A-Za-z])(?!.*[.\n]))(?=.*[A-Za-z])[^\s]*"/></td>
										<td><span class="alert-info"><?=$alertInfo['nPassword']?></span></td>
									</tr>
									<tr>
										<td style="text-align:center">确认密码</td>	
										<td><input name="rPassword" type="password" value="<?=$userinfo['rPassword']?>" /></td>
										<td><span class="alert-info"><?=$alertInfo['rPassword']?></span></td>
									</tr>
								</table>
								<a id="btn-submit" class="btn btn-success" href="#" style="position:relative;left:40%;">
									<i class="icon-pencil icon-white"></i> 提交
								</a>
							</form>
						</div>
					</div>
				</div>
			</div>