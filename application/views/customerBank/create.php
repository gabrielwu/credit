			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">首页</a><span class="divider">></span>
					</li>
					<li>
						<a href="<?=base_url()?>customerBank/create/<?=$customer_id?>">理财客户银行创建</a><span class="divider"></span>
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
							<form id="frm" method="post" action="<?=base_url()?>customerBank/createSubmit">
								<span class="result-info" style="position:relative;left:40%;"><?=$alertInfo['result']?></span>
								<table class="" style="width:60%;margin:0 auto 10px;border:0px;" >
									<tr>
										<td>省/直辖市
											<span class="alert-info"><?=$alertInfo['province']?></span><br>	
											<select name="province" id="province">
												<option value="" <?php if ($customerBank['province'] == "") echo "selected"; ?>>请选择</option>
												<?php foreach ($provinceList as $item) { ?>
												<option value="<?=$item['id']?>" class="<?=$item['provinceID']?>" <?php if ($customerBank['province'] == $item['id']) echo "selected"; ?>>
													<?=$item['provinceName']?>
												</option>
												<?php } ?>
											</select>
										</td>
									</tr>
									<tr>
										<td>城市
											<span class="alert-info"><?=$alertInfo['city']?></span><br>	
											<select name="city" id="city">
												<option value="" <?php if ($customerBank['city'] == "") echo "selected"; ?>>请选择</option>
												<?php foreach ($cityList as $item) { ?>
												<option value="<?=$item['id']?>" class="<?=$item['cityID']?>" title="<?=$item['father']?>" <?php if ($customerBank['city'] == $item['id']) echo "selected"; ?>>
													<?=$item['cityName']?>
												</option>
												<?php } ?>
											</select>
										</td>
									</tr>
									<tr>
										<td>县区
											<span class="alert-info"><?=$alertInfo['county']?></span><br>	
											<select name="county" id="county">
												<option value="" <?php if ($customerBank['county'] == "") echo "selected"; ?>>请选择</option>
												<?php foreach ($countyList as $item) { ?>
												<option value="<?=$item['id']?>" class="<?=$item['countyID']?>" title="<?=$item['father']?>" <?php if ($customerBank['county'] == $item['id']) echo "selected"; ?>>
													<?=$item['countyName']?>
												</option>
												<?php } ?>
											</select>
										</td>
									</tr>
									<tr>
										<td>银行<span class="required">*</span>
											<span class="alert-info"><?=$alertInfo['bank']?></span><br>	
											<select name="bank" id="bank">
												<option value="" <?php if ($customerBank['bank'] == "") echo "selected"; ?>>请选择</option>
												<?php foreach ($bankList as $item) { ?>
												<option value="<?=$item['id']?>"  <?php if ($customerBank['bank'] == $item['id']) echo "selected"; ?>>
													<?=$item['name']?>
												</option>
												<?php } ?>
											</select>
										</td>
									</tr>
									<tr>
										<td>分/支行名称<span class="required">*</span>
											<span class="alert-info"><?=$alertInfo['sub_bank']?></span><br>		
											<input class="focused" type="text" name="sub_bank" value="<?=$customerBank['sub_bank']?>" />
										</td>
									</tr>
									<tr>
										<td>开户用户名<span class="required">*</span>
											<span class="alert-info"><?=$alertInfo['bank_username']?></span><br>		
											<input class="focused" type="text" name="bank_username" value="<?=$customerBank['bank_username']?>" />
										</td>
									</tr>
									<tr>
										<td>银行卡号<span class="required">*</span>
											<span class="alert-info"><?=$alertInfo['cardID']?></span><br>		
											<input class="focused" type="text" name="cardID" value="<?=$customerBank['cardID']?>" />
										</td>
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
			<script>   
            </script>   