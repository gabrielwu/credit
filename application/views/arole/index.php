			<div>
				<ul class="breadcrumb">
					<li>
						<a href="">首页</a><span class="divider">></span>
					</li>
					<li>
						<a href="">用户权限管理</a><span class="divider">></span>
					</li>
					<li>
						<a href="<?=base_url()?>arole/index">角色管理</a>
					</li>
				</ul>
			</div>	
			
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i>角色列表</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
						<a id="btn-add" class="btn btn-primary" style="float:right" href="<?=base_url()?>arole/create"><i class="icon-plus icon-white"></i> 创建</a>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
							<thead>
							  	<tr>
									<th>角色名</th>
									<th>功能</th>
									<th>导航</th>
									<th>操作</th>
							 	 </tr>
						  	</thead>   
						  <tbody>
						  	<?php foreach ($roles as $role) { ?>
							<tr>
								<td class="center"><?=$role['name'] ?></td>
								<td class="center">
								<?php 
									echo "<table>";
									$m_name = "";
									$count  = 0;
									$capcity = 3;
									for ($i = 0; $i < sizeof($role['func']); $i++) { 
										if ($role['func'][$i]['module_name'] != $m_name) {
											echo ($count % $capcity == 0) ? "<tr>" : "";
											echo "<td valign='top' style='background:none;padding:0px 20px 10px; border: none'>"
												 . "<span style='font-size:16px;font-weight:bold;'>"
												 . $role['func'][$i]['module_name']. "</span><br>";
											$m_name = $role['func'][$i]['module_name'];
											$count++;
										}
										echo "&nbsp". $role['func'][$i]['name']. "<br>";
										if ($role['func'][$i]['module_name'] != $m_name) {
											echo "</td>";
											echo ($count % $capcity == 0) ? "</tr>" : "";
										}
									} 
									echo "</table>";
								?>
								</td>
								<td class="center">
								<?php 
									echo "<table>";
									$parent = "";
									$count  = 0;
									$capcity = 3;
									for ($i = 0; $i < sizeof($role['navi']); $i++) { 
										if ($role['navi'][$i]['parent'] != $parent) {
											echo ($count % $capcity == 0) ? "<tr>" : "";
											echo "<td valign='top' style='background:none;padding:0px 20px 10px; border: none'>"
												 . "<span style='font-size:16px;font-weight:bold;'>"
												 . $role['navi'][$i]['name']. "</span><br>";
											$parent = $role['navi'][$i]['parent'];
											$count++;
										}
										echo "&nbsp". $role['navi'][$i]['name']. "<br>";
										if ($role['navi'][$i]['parent'] != $parent) {
											echo "</td>";
											echo ($count % $capcity == 0) ? "</tr>" : "";
										}
									} 
									echo "</table>";
								?>
								</td>
								<td class="center">
									<!--<a href="<?=base_url()?>auser/viewDetail/<?=$user['id'] ?>">查看</a>-->
									<a href="<?=base_url()?>arole/edit/<?=$role['id'] ?>">编辑</a>
									<a href="javascript:deleteRole(<?=$role['id'] ?>)">删除</a>
								</td>
							</tr>
							<?php } ?>
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			</div><!--/row-->
			<script type="text/javascript">
			function Role() {
				var id;
			}
			function deleteRole(id) {
				if (confirm("确认删除？")) {
					var data = new Role;
					data.id = id;
					$.ajax({
						type: "POST",
						url: '<?=base_url()?>arole/delete',
						data: data,
						success: 
						function (s) {
							if (s == '1') {
								alert('删除成功！');
								window.location.reload();
							} else if (s == '0') {
								alert('删除失败！');
							} else {
								alert('您没有权限！');
							}
						}
					})
				}
			}
			</script>