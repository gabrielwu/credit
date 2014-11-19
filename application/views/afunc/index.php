			<div>
				<ul class="breadcrumb">
					<li>
						<a href="">首页</a><span class="divider">></span>
					</li>
					<li>
						<a href="">用户权限管理</a><span class="divider">></span>
					</li>
					<li>
						<a href="<?=base_url()?>afunc/index">模块功能管理</a>
					</li>
				</ul>
			</div>	
			
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i>模块功能列表</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
						<a id="btn-add" class="btn btn-primary" style="float:right" href="<?=base_url()?>afunc/create"><i class="icon-plus icon-white"></i> 创建</a>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
							<thead>
							  	<tr>
									<th>模块功能名</th>
									<th>链接名</th>
									<th>模块名</th>
									<th>操作</th>
							 	 </tr>
						  	</thead>   
						  <tbody>
						  	<?php foreach ($funcs as $func) { ?>
							<tr>
								<td class="center"><?=$func['name'] ?></td>
								<td class="center"><?=$func['urls'] ?></td>
								<td class="center"><?=$func['module_name'] ?></td>
								<td class="center">
									<!--<a href="<?=base_url()?>auser/viewDetail/<?=$user['id'] ?>">查看</a>-->
									<a href="<?=base_url()?>afunc/edit/<?=$func['id'] ?>">编辑</a>
									<a href="javascript:deleteFunc(<?=$func['id'] ?>)">删除</a>
								</td>
							</tr>
							<?php } ?>
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			</div><!--/row-->
			<script type="text/javascript">
			function Func() {
				var id;
			}
			function deleteFunc(id) {
				if (confirm("确认删除？")) {
					var data = new Func;
					data.id = id;
					$.ajax({
						type: "POST",
						url: '<?=base_url()?>afunc/delete',
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