			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">首页</a><span class="divider">></span>
					</li>
					<li>
						<span>用户权限管理</span><span class="divider">></span>
					</li>
					<li>
						<a href="<?=base_url()?>auser/index">用户管理</a><span class="divider">></span>
					</li>
					<li>
						<a href="<?=base_url()?>auser/create">创建</a><span class="divider"></span>
					</li>
				</ul>
			</div>	

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-wrench"></i>用户信息</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						<div class="control-group" style="margin: 8px;">
							<form id="frm" method="post" action="<?=base_url()?>auser/createSubmit">
								<span class="result-info" style="position:relative;left:40%;"><?=$alertInfo['result']?></span>
								<table class="" style="width:60%;margin:0 auto 10px;border:0px;" >
									<tr>
										<td style="text-align:center">用户名</td>
										<td><input name="username" type="text" value="<?=$user['username']?>" /></td>	
										<td><span class="alert-info"><?=$alertInfo['username']?></span></td>
									</tr>
									<tr>
										<td style="text-align:center">姓名</td>	
										<td><input name="name" type="text" value="<?=$user['name']?>" /></td>		
										<td><span class="alert-info"><?=$alertInfo['name']?></span></td>
									</tr>
									<tr>
										<td style="text-align:center">性别</td>	
										<td>
											<label class="radio">
												<input type="radio" name="sex" value="男" checked>男
											</label>
											<label class="radio">
												<input type="radio" name="sex" value="女" <?php if ($user['sex'] == "女") echo "checked";?>>女
											</label>
										</td>	
										<td><span class="alert-info"></span></td>
									</tr>
									<tr>
										<td style="text-align:center">角色</td>	
										<td>
											<?php foreach ($roles as $role) { ?>
											<label class="checkbox inline">
											<input type="checkbox" name="role[]" value="<?=$role['id']?>" <?php foreach ($user['roles'] as $userRole) { if ($userRole == $role['id']) {echo 'checked'; break;}}?>>
											<?=$role['name']?>
											</label>
											<br>
											<?php } ?>
										</td>	
										<td><span class="alert-info"><?=$alertInfo['role']?></span></td>
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