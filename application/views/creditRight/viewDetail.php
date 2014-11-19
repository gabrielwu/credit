			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">首页</a><span class="divider">></span>
					</li>
					<li>
						<a href="<?=base_url()?>creditRight/index>">债权匹配</a><span class="divider"></span>
					</li>
				</ul>
			</div>	
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-wrench"></i>债权信息</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div id="" class="box-content">
						<div class="control-group" style="margin: 8px;">
							<table style="width:100%;margin:0 auto;" class="table table-bordered table-striped bootstrap-datatable datatable">
								<thead>
									<tr>
										<td style="text-align:center">借款客户</td>
										<td style="text-align:center">理财客户</td>
										<td style="text-align:center">已匹配债权金额</td>
										<td style="text-align:center">债权状态</td>
										<td style="text-align:center">创建时间</td>
										<td style="text-align:center">操作</td>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($creditRightList as $item) { ?>
									<tr>
										<td><?=$item['borrow_name']?></td>	
										<td><?=$item['customer_name']?></td>
										<td><?=$item['match_amount']?></td>
										<td><?=$item['status']?></td>
										<td><?=$item['create_time']?></td>	
										<td><a href="javascript:deleteItem( <?=$item['id'] ?>, 'creditRight')">删除</a></td>
									</tr>
									<?php }?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

