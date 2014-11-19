			<div>
				<ul class="breadcrumb">
					<li>
						<a href="">首页</a><span class="divider">></span>
					</li>
					<li>
						<a href="">用户权限管理</a><span class="divider">></span>
					</li>
					<li>
						<a href="<?=base_url()?>anavi/index">导航管理</a>
					</li>
				</ul>
			</div>	
			
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i>导航列表</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
						<a id="btn-add" class="btn btn-primary" style="float:right" href="<?=base_url()?>anavi/create"><i class="icon-plus icon-white"></i> 创建</a>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
							<thead>
							  	<tr>
									<th>级别</th>
									<th>导航</th>
									<th>父导航</th>
									<th>链接</th>
									<th>顺序</th>
									<th>操作</th>
							 	 </tr>
						  	</thead>   
						  <tbody>
						  	<?php foreach ($navis as $navi) { ?>
							<tr>
								<td class="center"><?=$navi['level']?></td>
								<td class="center"><?=$navi['name']?></td>
								<td class="center"><?=$navi['parent_name']?></td>
								<td class="center"><?=$navi['url']?></td>
								<td class="center"><?=$navi['seq']?></td>
								<td class="center">
									<a href="<?=base_url()?>anavi/edit/<?=$navi['id'] ?>">编辑</a>
									<a href="javascript:deleteNavi(<?=$navi['id'] ?>)">删除</a>
								</td>
							</tr>
							<?php } ?>
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			</div><!--/row-->
			<script type="text/javascript">
			function Navi() {
				var id;
			}
			function deleteNavi(id) {
				if (confirm("确认删除？")) {
					var data = new Navi;
					data.id = id;
					$.ajax({
						type: "POST",
						url: '<?=base_url()?>anavi/delete',
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