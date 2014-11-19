			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">首页</a><span class="divider">></span>
					</li>
					<li>
						<a href="<?=base_url()?>customerInvestWay/create">创建</a>
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
							<form id="frm" method="post" action="<?=base_url()?>customerInvestWay/createSubmit">
								<span class="result-info" style="position:relative;left:40%;"><?=$alertInfo['result']?></span>
								<table class="" style="margin:0 auto 10px;border:0px;" >
									<tr>
										<td style="text-align:center">名称</td>
										<td><input name="name" type="text" value="<?=$item['name']?>" /></td>	
										<td><span class="alert-info"><?=$alertInfo['code']?></span></td>
									</tr>
									<tr>
										<td style="text-align:center">代码</td>
										<td><input name="code" type="text" value="<?=$item['code']?>" /></td>	
										<td><span class="alert-info"><?=$alertInfo['code']?></span></td>
									</tr>
									<tr>
										<td style="text-align:center">类型</td>
										<td>
											<select name="type" >
												<option value="限期"   <?php if ($item['type'] == '定期')   echo "selected"; ?>>限期</option>
												<option value="无限期" <?php if ($item['type'] == '无限期') echo "selected"; ?>>无限期</option>
											</select>	
										</td>
										<td><span class="alert-info"><?=$alertInfo['type']?></span></td>	
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