			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">首页</a><span class="divider">></span>
					</li>
					<li>
						<span>字典管理</span><span class="divider">></span>
					</li>
					<li>
						<a href="<?=base_url()?>dictionary/index">字典列表</a><span class="divider">></span>
					</li>
					<li>
						<a href="<?=base_url()?>dictionary/create">创建</a>
					</li>
				</ul>
			</div>	

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-wrench"></i>字典项信息</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						<div class="control-group" style="margin: 8px;">
							<form id="frm" method="post" action="<?=base_url()?>dictionary/createSubmit">
								<span class="result-info" style="position:relative;left:40%;"><?=$alertInfo['result']?></span>
								<table class="" style="margin:0 auto 10px;border:0px;" >
									<tr>
										<td style="text-align:center">字典项值</td>
										<td><input name="value" type="text" value="<?=$item['value']?>" /></td>	
										<td><span class="alert-info"><?=$alertInfo['value']?></span></td>
									</tr>
									<tr>
										<td style="text-align:center">类型</td>
										<td>
											<select name="type" >
												<option value="" <?php if ($item['type'] == "") echo "selected"; ?>>请选择</option>
												<?php foreach ($typeList as $type) { ?>
												<option value="<?=$type['type']?>" <?php if ($type['type'] == $item['type']) echo "selected"; ?>>
													<?=$type['type']?>
												</option>
												<?php } ?>
											</select>
										</td>	
										<td><span class="alert-info"><?=$alertInfo['type']?></span></td>
									</tr>
									<tr>
										<td style="text-align:center">标记</td>
										<td><input name="status" type="text" value="<?=$item['status']?>" /></td>	
										<td><span class="alert-info"><?=$alertInfo['status']?></span></td>
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