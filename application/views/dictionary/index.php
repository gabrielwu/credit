			<div>
				<ul class="breadcrumb">
					<li>
						<a href="">首页</a><span class="divider">></span>
					</li>
					<li>
						<a href="">字典管理</a><span class="divider">></span>
					</li>
					<li>
						<a href="<?=base_url()?>dictionary/index">字典列表</a>
					</li>
				</ul>
			</div>	
			
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i>字典列表</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
						<a id="btn-add" class="btn btn-primary" style="float:right" href="<?=base_url()?>dictionary/create"><i class="icon-plus icon-white"></i> 创建</a>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
							<thead>
							  	<tr>
									<th>类型</th>
									<th>字典项值</th>
									<th>标记</th>
									<th>操作</th>
							 	 </tr>
						  	</thead>   
						  <tbody>
						  	<?php foreach ($borrowStatusList as $item) { ?>
							<tr>
								<td class="center"><?=$item['type'] ?></td>
								<td class="center"><?=$item['value'] ?></td>
								<td class="center"><?=$item['status'] ?></td>
								<td class="center">
									<a href="javascript:deleteDictionary(<?=$item['id'] ?>)">删除</a>
								</td>
							</tr>
							<?php } ?>
						  	<?php foreach ($borrowAccountStatusList as $item) { ?>
							<tr>
								<td class="center"><?=$item['type'] ?></td>
								<td class="center"><?=$item['value'] ?></td>
								<td class="center"><?=$item['status'] ?></td>
								<td class="center">
									<a href="javascript:deleteDictionary(<?=$item['id'] ?>)">删除</a>
								</td>
							</tr>
							<?php } ?>
						  	<?php foreach ($borrowIntentionList as $item) { ?>
							<tr>
								<td class="center"><?=$item['type'] ?></td>
								<td class="center"><?=$item['value'] ?></td>
								<td class="center"><?=$item['status'] ?></td>
								<td class="center">
									<a href="javascript:deleteDictionary(<?=$item['id'] ?>)">删除</a>
								</td>
							</tr>
							<?php } ?>
						  	<?php foreach ($borrowSignAddressList as $item) { ?>
							<tr>
								<td class="center"><?=$item['type'] ?></td>
								<td class="center"><?=$item['value'] ?></td>
								<td class="center"><?=$item['status'] ?></td>
								<td class="center">
									<a href="javascript:deleteDictionary(<?=$item['id'] ?>)">删除</a>
								</td>
							</tr>
							<?php } ?>
						  	<?php foreach ($borrowCreditLevelList as $item) { ?>
							<tr>
								<td class="center"><?=$item['type'] ?></td>
								<td class="center"><?=$item['value'] ?></td>
								<td class="center"><?=$item['status'] ?></td>
								<td class="center">
									<a href="javascript:deleteDictionary(<?=$item['id'] ?>)">删除</a>
								</td>
							</tr>
							<?php } ?>
						  	<?php foreach ($borrowSourceList as $item) { ?>
							<tr>
								<td class="center"><?=$item['type'] ?></td>
								<td class="center"><?=$item['value'] ?></td>
								<td class="center"><?=$item['status'] ?></td>
								<td class="center">
									<a href="javascript:deleteDictionary(<?=$item['id'] ?>)">删除</a>
								</td>
							</tr>
							<?php } ?>
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			</div><!--/row-->
			<script type="text/javascript">
			function Dictionary() {
				var id;
			}
			function deleteDictionary(id) {
				if (confirm("确认删除？")) {
					var data = new Dictionary;
					data.id = id;
					$.ajax({
						type: "POST",
						url: '<?=base_url()?>dictionary/delete',
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