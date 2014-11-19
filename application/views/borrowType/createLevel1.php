			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">首页</a><span class="divider">></span>
					</li>
					<li>
						<span>借款用户类型</span><span class="divider">></span>
					</li>
					<li>
						<a href="<?=base_url()?>borrowType/indexLevel1">级别一类型</a><span class="divider">></span>
					</li>
					<li>
						<a href="<?=base_url()?>borrowType/createLevel1">创建</a>
					</li>
				</ul>
			</div>	

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-wrench"></i>信息</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						<div class="control-group" style="margin: 8px;">
							<form id="frm" method="post" action="<?=base_url()?>borrowType/createSubmitLevel1">
								<span class="result-info" style="position:relative;left:40%;"><?=$alertInfo['result']?></span>
								<table class="" style="margin:0 auto 10px;border:0px;" >
									<tr>
										<td style="text-align:center">类型名称</td>
										<td><input name="name" type="text" value="<?=$item['name']?>" /></td>	
										<td><span class="alert-info"><?=$alertInfo['name']?></span></td>
									</tr>
									<tr>
										<td style="text-align:center">类型代码（A，B，C...）</td>
										<td><input name="code" type="text" value="<?=$item['code']?>" /></td>	
										<td><span class="alert-info"><?=$alertInfo['code']?></span></td>
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