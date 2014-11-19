			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">首页</a><span class="divider">></span>
					</li>
					<li>
						<span>用户权限管理</span><span class="divider">></span>
					</li>
					<li>
						<a href="<?=base_url()?>afunc/index">模块功能管理</a><span class="divider">></span>
					</li>
					<li>
						<span>编辑</span>
					</li>
				</ul>
			</div>	

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-wrench"></i>模块功能信息</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
						<a id="btn-add" class="btn btn-primary" style="float:right" href="<?=base_url()?>afunc/create"><i class="icon-plus icon-white"></i> 创建</a>
					</div>
					<div class="box-content">
						<div class="control-group" style="margin: 8px;">
							<form id="frm" method="post" action="<?=base_url()?>afunc/editSubmit">
								<span class="result-info" style="position:relative;left:40%;"><?=$alertInfo['result']?></span>
								<table class="" style="margin:0 auto 10px;border:0px;" >
									<tr>
										<td style="text-align:center">模块功能名</td>
										<td><input name="name" type="text" value="<?=$func['name']?>" /></td>	
										<td><span class="alert-info"><?=$alertInfo['name']?></span></td>
									</tr>
									<tr>
										<td style="text-align:center">链接名</td>
										<td><input name="urls" type="text" value="<?=$func['urls']?>" /></td>	
										<td><span class="alert-info"><?=$alertInfo['urls']?></span></td>
									</tr>
									<tr>
										<td style="text-align:center">模块名</td>
										<td><input name="module_name" type="text" value="<?=$func['module_name']?>" /></td>	
										<td><span class="alert-info"><?=$alertInfo['module_name']?></span></td>
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