			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">首页</a><span class="divider">></span>
					</li>
					<li>
						<span>借款用户类型</span><span class="divider">></span>
					</li>
					<li>
						<a href="<?=base_url()?>borrowType/indexLevel2">级别二类型</a><span class="divider">></span>
					</li>
					<li>
						<a href="<?=base_url()?>borrowType/createLevel2">创建</a>
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
							<form id="frm" method="post" action="<?=base_url()?>borrowType/createSubmitLevel2">
								<span class="result-info" style="position:relative;left:40%;"><?=$alertInfo['result']?></span>
								<table class="" style="margin:0 auto 10px;border:0px;" >
									<tr>
										<td style="text-align:center">级别一</td>
										<td>
											<select name="parent" >
												<option value="" <?php if ($item['parent'] == "") echo "selected"; ?>>请选择</option>
												<?php foreach ($level1List as $level1) { ?>
												<option value="<?=$level1['id']?>" <?php if ($level1['id'] == $item['parent']) echo "selected"; ?>>
													<?=$level1['name']?>/<?=$level1['code']?>
												</option>
												<?php } ?>
											</select>
										</td>	
										<td><span class="alert-info"><?=$alertInfo['parent']?></span></td>
									</tr>
									<tr>
										<td style="text-align:center">期数（月）</td>
										<td><input name="months" type="text" value="<?=$item['months']?>" /></td>	
										<td><span class="alert-info"><?=$alertInfo['months']?></span></td>
									</tr>
									<tr>
										<td style="text-align:center">利率</td>
										<td><input name="rate" type="text" value="<?=$item['rate']?>" />％</td>	
										<td><span class="alert-info"><?=$alertInfo['rate']?></span></td>
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