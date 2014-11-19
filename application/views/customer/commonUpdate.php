			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">首页</a><span class="divider">></span>
					</li>
					<li>
						<a href="<?=base_url()?>customer/index">理财客户</a><span class="divider">></span>
					</li>
					<li>
						<span>创建客户</span>
					</li>
				</ul>
			</div>	

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-wrench"></i>操作</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						<div class="control-group" style="margin: 8px;">
							<form id="frm" method="post" action="<?=base_url()?>customer/<?=$formAction?>">
								<table style="width:90%;margin:0 auto;">
									<tr>
										<td>姓名<br>		<input class="focused" type="text" name="name"   value="<?=$customer['name']?>"/></td>
										<td>编号<br>		<input class="focused" type="text" name="number" value="<?=$customer['number']?>"/></td>
										<td>客户状态<br>	
											<select name="status">
												<?php foreach ($customerStatusList as $item) { ?>
												<option value="<?=$item['value']?>" <?php if ($customer['status'] == $item['value']) echo "selected"; ?>><?=$item['value']?></option>
												<?php } ?>
											</select>
										</td>
										<td>电子邮箱<br>	<input class="focused" type="text" name="email"  value="<?=$customer['email']?>" /></td>
									</tr>
									<tr>
										<td>手机号<br>	<input class="focused" type="text" name="mobile" value="<?=$customer['mobile']?>"/></td>
										<td>证件号<br>	<input class="focused" type="text" name="idcard" value="<?=$customer['idcard']?>"/></td>
										<td>生日<br>		<input class="focused datepicker" type="text" name="birthday" value="<?=$customer['birthday']?>"/></td>
										<td>电话<br>		<input class="focused" type="text" name="phone"   value="<?=$customer['phone']?>" /></td>
									</tr>
									<tr>
										<td>传真<br>		<input class="focused" type="text" name="fax"     value="<?=$customer['fax']?>"/></td>
										<td>个人主页<br>	<input class="focused" type="text" name="homepage" value="<?=$customer['homepage']?>"/></td>
										<td>账单地址<br>	<input class="focused" type="text" name="bill_addr" value="<?=$customer['bill_addr']?>"/></td>
										<td>账单邮编<br>	<input class="focused" type="text" name="bill_post" value="<?=$customer['bill_post']?>"/></td>
									</tr>
									<tr>
									</tr>
									<tr>
										<td>教育水平<br>		<input class="focused" type="text" name="edu"  value="<?=$customer['edu']?>"    /></td>
										<td>客户意向<br>	<input class="focused" type="text" name="intention" value="<?=$customer['intention']?>"/></td>
										<td>账户状态<br>	
											<select name="acnt_sta">
												<?php foreach ($accountStatusList as $item) { ?>
												<option value="<?=$item['value']?>"  <?php if ($customer['acnt_sta'] == $item['value']) echo "selected"; ?>><?=$item['value']?></option>
												<?php } ?>
											</select>
										</td>
										<td>账户日期<br>	<input class="focused datepicker" type="text" name="acnt_date" value="<?=$customer['acnt_date']?>" /></td>
									</tr>
									<tr>
										<td>性别<br>		
											<label class="radio">
												<input type="radio" name="sex" value="男" checked="checked">男
											</label>
											<label class="radio">
												<input type="radio" name="sex" value="女" >女
											</label>
										</td>
										<td>职位<br>			<input class="focused" type="text" name="position" value="<?=$customer['position']?>"/></td>
										<td>公司<br>			<input class="focused" type="text" name="company"  value="<?=$customer['company']?>"/></td>
										<td>客户关系管理<br>	<input class="focused" type="text" name="CRM"      value="<?=$customer['CRM']?>"/></td>
									</tr>
									<tr>
										<td>客户开发<br>		<input class="focused" type="text" name="cus_dev"  value="<?=$customer['cus_dev']?>"/></td>
										<td>合同签订日期<br>	<input class="focused datepicker" type="text" name="CAD"   value="<?=$customer['CAD']?>"    /></td>
										<td>客户来源<br>		
											<select name="source" >
												<?php foreach ($customerSourceList as $item) { ?>
												<option value="<?=$item['value']?>" <?php if ($customer['source'] == $item['value']) echo "selected"; ?>><?=$item['value']?></option>
												<?php } ?>
											</select>
										</td>
										<td>支付方式<br>	
											<select name="pay_mode" >
												<?php foreach ($payModeList as $item) { ?>
												<option value="<?=$item['value']?>" <?php if ($customer['pay_mode'] == $item['value']) echo "selected"; ?>><?=$item['value']?></option>
												<?php } ?>
											</select>		
										</td>
									</tr>
									<tr>
										<td>投资方式<br>	
											<select name="invest_way" >
												<?php foreach ($investWayList as $item) { ?>
												<option value="<?=$item['id']?>" <?php if ($customer['invest_way'] == $item['id']) echo "selected"; ?>>
													<?=$item['code']?><?=$item['name']?>/<?=$item['months']?>月/<?=$item['rate']?>％
												</option>
												<?php } ?>
											</select>		
										</td>
										<td>理财金额<br><input class="focused" type="text" name="amount"  value="<?=$customer['amount']?>"/></td>
										<td>收益<br><input class="focused" type="text" name="earning"      value="<?=$customer['earning']?>"/></td>
										<td>评论<br>			<input class="focused" type="text" name="comment"  value="<?=$customer['comment']?>" /></td>
									</tr>
									<tr>
										<td colspan="4" align="center">
											<a id="btn-submit" class="btn btn-primary" href="#"><i class="icon-plus icon-white"></i> 提交</a>&nbsp;&nbsp;&nbsp;&nbsp;
											<a id="btn-reset" class="btn btn-info" href="#"><i class="icon-ban-circle icon-white"></i> 清空</a>&nbsp;&nbsp;&nbsp;&nbsp;
										</td>
									</tr>
								</table>
							</form>
						</div>
					</div>
				</div>
			</div>