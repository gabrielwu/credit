			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">首页</a><span class="divider">></span>
					</li>
					<li>
						<a href="＃">用户权限管理</a><span class="divider">></span>
					</li>
					<li>
						<span>用户管理</span>
					</li>
				</ul>
			</div>	

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-wrench"></i>操作</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						<div class="control-group" style="margin: 8px;">
							<form id="frm" method="post" action="<?=base_url()?>auser/index">
								<table style="margin:0 auto;">
									<tr>
										<td>用户名<br>
											<input class="focused" type="text" name="username"   value="<?=$condition['username']?>" />
										</td>
										<td>姓名<br>	
											<input class="focused" type="text" name="name" value="<?=$condition['name']?>" />
										</td>
										<td>性别<br>					
											<select name="sex" value="<?=$condition['sex']?>" >
												<option value="" <?php if ($condition['sex'] == "") echo "selected"; ?>>全部</option>
												<option value="男" <?php if ($condition['sex'] == "男") echo "selected"; ?>>男</option>
												<option value="女" <?php if ($condition['sex'] == "女") echo "selected"; ?>>女</option>
											</select>
										</td>
									</tr>
									<tr>
										<td colspan="2">创建日期<br>	
											<input class="focused datepicker" type="text" name="date1" value="<?=$condition['date1']?>" placeholder="不早于"/>
											<input class="focused datepicker" type="text" name="date2" value="<?=$condition['date2']?>" placeholder="不晚于"/></td>
										<td>角色<br>	
											<select name="role">
												<option value="" <?php if ($condition['role'] == "") echo "selected"; ?>>全部</option>
												<?php foreach ($roles as $role) { ?>
												<option value="<?=$role['id']?>" <?php if ($condition['role'] == $role['id']) echo "selected"; ?>>
													<?=$role['name']?>
												</option>
												<?php } ?>
											</select>
										</td>
									</tr>
									<tr>
										<td colspan="3" align="center">
										<a id="btn-submit" class="btn btn-success" href="#"><i class="icon-search icon-white"></i> 搜索</a>&nbsp;&nbsp;&nbsp;&nbsp;
										<a id="btn-reset" class="btn btn-info" href="#"><i class="icon-ban-circle icon-white"></i> 清空</a>&nbsp;&nbsp;&nbsp;&nbsp;
										<a id="btn-add" class="btn btn-primary" href="<?=base_url()?>auser/create"><i class="icon-plus icon-white"></i> 创建用户</a>
										</td>
									</tr>
								</table>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i>用户列表</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
							<thead>
							  	<tr>
									<th>用户名</th>
									<th>姓名</th>
									<th>性别</th>
									<th>创建时间</th>
									<th>角色</th>
									<th>操作</th>
							 	 </tr>
						  	</thead>   
						  <tbody>
						  	<?php foreach ($users as $user) { ?>
							<tr>
								<td class="center"><?=$user['username'] ?></td>
								<td class="center"><?=$user['name'] ?></td>
								<td class="center"><?=$user['sex'] ?></td>
								<td class="center"><?=$user['date'] ?></td>
								<td class="center">
									<?php 
									for ($i = 0; $i < sizeof($user['role']); $i++) {
										echo $user['role'][$i]['name'];
										if ($i != sizeof($user['role']) - 1) echo '<br>';
									}
									?>
								</td>
								<td class="center">
									<!--<a href="<?=base_url()?>auser/viewDetail/<?=$user['id'] ?>">查看</a>-->
									<a href="<?=base_url()?>auser/edit/<?=$user['id'] ?>">编辑</a>
									<a href="javascript:resetPassword(<?=$user['id'] ?>)">密码重置</a>
									<a href="javascript:deleteAuser(<?=$user['id'] ?>)">删除</a>
								</td>
							</tr>
							<?php } ?>
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			</div><!--/row-->
			<script type="text/javascript">
			function User() {
				var id;
			}
			function deleteAuser(id) {
				if (confirm("确认删除？")) {
					var data = new User;
					data.id = id;
					$.ajax({
						type: "POST",
						url: '<?=base_url()?>auser/delete',
						data: data,
						success: 
						function (s) {
							if (s == '1') {
								alert('删除成功！');
								$("#frm").submit();
							} else if (s == '0') {
								alert('删除失败！');
							} else {
								alert('您没有权限！');
							}
						}
					})
				}
			}
			function resetPassword(id) {
				if (confirm("密码将重置为123456，确认重置？")) {
					var data = new User;
					data.id = id;
					$.ajax({
						type: "POST",
						url: '<?=base_url()?>auser/resetPassword',
						data: data,
						success: 
						function (s) {
							if (s == '1') {
								alert('重置密码成功！');
								$("#frm").submit();
							} else if (s == '0') {
								alert('重置密码成功！');
							} else {
								alert('您没有权限！');
							}
						}
					})
				}
			}
			</script>