			<div>
				<ul class="breadcrumb">
					<li>
						<a href="">首页</a><span class="divider">></span>
					</li>
					<li>
						<a href="">借款用户类型</a><span class="divider">></span>
					</li>
					<li>
						<a href="<?=base_url()?>borrowType/indexLevel2">级别二列表</a>
					</li>
				</ul>
			</div>	
			
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i>列表</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
						<a id="btn-add" class="btn btn-primary" style="float:right" href="<?=base_url()?>borrowType/createLevel2"><i class="icon-plus icon-white"></i> 创建</a>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
							<thead>
							  	<tr>
									<th>代码</th>
									<th>名称</th>
									<th>期数</th>
									<th>利率</th>
									<th>标记(0:正常；1:关闭)</th>
									<th>操作</th>
							 	 </tr>
						  	</thead>   
						  <tbody>
						  	<?php foreach ($list as $item) { ?>
							<tr>
								<td class="center"><?=$item['level1Code'] ?></td>
								<td class="center"><?=$item['level1Name'] ?></td>
								<td class="center"><?=$item['months'] ?></td>
								<td class="center"><?=$item['rate'] ?></td>
								<td class="center"><?=$item['status'] ?></td>
								<td class="center">
									<a href="javascript:deleteBorrowType(<?=$item['id'] ?>)">关闭</a>
								</td>
							</tr>
							<?php } ?>
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			</div><!--/row-->
			<script type="text/javascript">
			function BorrowType() {
				var id;
			}
			function deleteBorrowType(id) {
				if (confirm("确认删除？")) {
					var data = new BorrowType;
					data.id = id;
					$.ajax({
						type: "POST",
						url: '<?=base_url()?>borrowType/delete',
						data: data,
						success: 
						function (s) {
							if (s == '1') {
								alert('关闭成功！');
								window.location.reload();
							} else if (s == '0') {
								alert('关闭失败！');
							} else {
								alert('您没有权限！');
							}
						}
					})
				}
			}
			</script>