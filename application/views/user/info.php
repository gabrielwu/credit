			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">首页</a><span class="divider">></span>
					</li>
					<li>
						<a href="<?=base_url()?>user/info">管理员</a><span class="divider">></span>
					</li>
					<li>
						<span>个人信息信息</span>
					</li>
				</ul>
			</div>	

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-wrench"></i>个人信息</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						<div class="control-group" style="margin: 8px;">
							<table style="width:50%;margin:0 auto 10px;" class="table table-bordered table-striped">
								<tr>
									<td style="text-align:center">用户名</td>	<td><?=$userinfo['username']?></td>	
								</tr>
								<tr>
									<td style="text-align:center">姓名</td>	<td><?=$userinfo['name']?></td>
								</tr>
								<tr>
									<td style="text-align:center">性别</td>	<td><?=$userinfo['sex']?></td>
								</tr>
							</table>
							<a id="btn-submit" class="btn btn-success" href="<?=base_url()?>user/editInfo" style="position:relative;left:50%;">
								<i class="icon-pencil icon-white"></i> 编辑
							</a>
						</div>
					</div>
				</div>
			</div>