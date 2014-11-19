			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">首页</a><span class="divider">></span>
					</li>
					<li>
						<a href="<?=base_url()?>borrow/index">借款客户</a><span class="divider">></span>
					</li>
					<li>
						<span><?=$pageTitle?></span>
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
							<form id="frm" method="post" action="<?=base_url()?>borrow/<?=$formAction?>">
								
								<table style="width:90%;margin:0 auto;">
									<tr>
										<td>姓名<span class="required">*</span>
											<span class="alert-info"><?=$alertInfo['name']?></span><br>		
											<input class="focused" type="text" name="name" value="<?=$borrow['name']?>" />
										</td>
										<td>英文名
											<span class="alert-info"><?=$alertInfo['ename']?></span><br>		
											<input class="focused" type="text" name="ename" value="<?=$borrow['ename']?>" />
										</td>
										<td>电子邮箱
											<span class="alert-info"><?=$alertInfo['email']?></span><br>		
											<input class="focused" type="text" name="email" value="<?=$borrow['email']?>" />
										</td>
										<td>手机号<span class="required">*</span>
											<span class="alert-info"><?=$alertInfo['phone']?></span><br>		
											<input class="focused" type="text" name="phone" value="<?=$borrow['phone']?>" />
										</td>
									</tr>

									<tr>
										<td>生日
											<span class="alert-info"><?=$alertInfo['birthday']?></span><br>		
											<input class="focused datepicker" type="text" name="birthday" value="<?=$borrow['birthday']?>" />
										</td>
										<td>证件号<span class="required">*</span>
											<span class="alert-info"><?=$alertInfo['idcard']?></span><br>		
											<input class="focused" type="text" name="idcard" value="<?=$borrow['idcard']?>" />
										</td>
										<td>证件地址
											<span class="alert-info"><?=$alertInfo['idaddress']?></span><br>		
											<input class="focused" type="text" name="idaddress" value="<?=$borrow['idaddress']?>" />
										</td>
										<td>教育水平
											<span class="alert-info"><?=$alertInfo['education']?></span><br>		
											<input class="focused" type="text" name="education" value="<?=$borrow['education']?>" />
										</td>
									</tr>

									<tr>
										<td>性别
											<span class="required">*</span><br>		
											<label class="radio">
												<input type="radio" name="sex" value="男" checked="checked">男
											</label>
											<label class="radio">
												<input type="radio" name="sex" value="女" >女
											</label>
										</td>
										<td>电话
											<span class="alert-info"><?=$alertInfo['telephone']?></span><br>		
											<input class="focused" type="text" name="telephone" value="<?=$borrow['telephone']?>" />
										</td>
										<td>传真<span class="required">*</span>
											<span class="alert-info"><?=$alertInfo['fax']?></span><br>		
											<input class="focused" type="text" name="fax" value="<?=$borrow['fax']?>" />
										</td>
									</tr>

									<tr>
										<td>省/直辖市<span class="required">*</span>
											<span class="alert-info"><?=$alertInfo['province']?></span><br>	
											<select name="province" id="province">
												<option value="" <?php if ($borrow['province'] == "") echo "selected"; ?>>请选择</option>
												<?php foreach ($provinceList as $item) { ?>
												<option value="<?=$item['id']?>" class="<?=$item['provinceID']?>" <?php if ($borrow['province'] == $item['id']) echo "selected"; ?>>
													<?=$item['provinceName']?>
												</option>
												<?php } ?>
											</select>
										</td>
										<td>城市<span class="required">*</span>
											<span class="alert-info"><?=$alertInfo['city']?></span><br>	
											<select name="city" id="city">
												<option value="" <?php if ($borrow['city'] == "") echo "selected"; ?>>请选择</option>
												<?php foreach ($cityList as $item) { ?>
												<option value="<?=$item['id']?>" class="<?=$item['cityID']?>" title="<?=$item['father']?>" <?php if ($borrow['city'] == $item['id']) echo "selected"; ?>>
													<?=$item['cityName']?>
												</option>
												<?php } ?>
											</select>
										</td>
										<td>县区<span class="required">*</span>
											<span class="alert-info"><?=$alertInfo['county']?></span><br>	
											<select name="county" id="county">
												<option value="" <?php if ($borrow['county'] == "") echo "selected"; ?>>请选择</option>
												<?php foreach ($countyList as $item) { ?>
												<option value="<?=$item['id']?>" class="<?=$item['countyID']?>" title="<?=$item['father']?>" <?php if ($borrow['county'] == $item['id']) echo "selected"; ?>>
													<?=$item['countyName']?>
												</option>
												<?php } ?>
											</select>
										</td>
									</tr>

									<tr>
										<td>单位地址<span class="required">*</span>
											<span class="alert-info"><?=$alertInfo['work_address']?></span><br>		
											<input class="focused" type="text" name="work_address" value="<?=$borrow['work_address']?>" />
										</td>
										<td>家庭住址<span class="required">*</span>
											<span class="alert-info"><?=$alertInfo['home_address']?></span><br>		
											<input class="focused" type="text" name="home_address" value="<?=$borrow['home_address']?>" />
										</td>
										<td>合同邮寄地址
											<span class="alert-info"><?=$alertInfo['mail_address']?></span><br>		
											<input class="focused" type="text" name="mail_address" value="<?=$borrow['mail_address']?>" />
										</td>
										<td>账单邮编<span class="required">*</span>
											<span class="alert-info"><?=$alertInfo['zip_code']?></span><br>		
											<input class="focused" type="text" name="zip_code" value="<?=$borrow['zip_code']?>" />
										</td>
									</tr>

									<tr>
										<td>客户状态
											<span class="alert-info"><?=$alertInfo['status']?></span><br>	
											<select name="status">
												<?php foreach ($borrowStatusList as $item) { ?>
												<option value="<?=$item['value']?>" <?php if ($borrow['status'] == $item['value']) echo "selected"; ?>><?=$item['value']?></option>
												<?php } ?>
											</select>
										</td>
										<td>客户意向
											<span class="alert-info"><?=$alertInfo['intention']?></span><br>	
											<select name="intention">
												<option value="" >请选择</option>
												<?php foreach ($borrowIntentionList as $item) { ?>
												<option value="<?=$item['value']?>" <?php if ($borrow['intention'] == $item['value']) echo "selected"; ?>><?=$item['value']?></option>
												<?php } ?>
											</select>
										</td>
										<td>账户日期
											<span class="alert-info"><?=$alertInfo['account_date']?></span><br>	
											<input class="focused datepicker" type="text" name="account_date" value="<?=$borrow['account_date']?>" />
										</td>
										<td>合同签订日期
											<span class="alert-info"><?=$alertInfo['sign_date']?></span><br>	
											<input class="focused datepicker" type="text" name="sign_date" value="<?=$borrow['sign_date']?>" />
										</td>
									</tr>

									<tr>
										<td>借款金额<span class="required">*</span>
											<span class="alert-info"><?=$alertInfo['money_sum']?></span><br>	
											<input class="focused" type="text" name="money_sum" value="<?=$borrow['money_sum']?>" />
										</td>
										<td>借款用途<span class="required">*</span>
											<span class="alert-info"><?=$alertInfo['purpose']?></span><br>	
											<input class="focused" type="text" name="purpose" value="<?=$borrow['purpose']?>" />
										</td>
										<td>职业<span class="required">*</span>
											<span class="alert-info"><?=$alertInfo['job']?></span><br>	
											<input class="focused" type="text" name="job" value="<?=$borrow['job']?>" />
										</td>
										<td>职位<span class="required">*</span>
											<span class="alert-info"><?=$alertInfo['position']?></span><br>	
											<input class="focused" type="text" name="position" value="<?=$borrow['position']?>" />
										</td>
									</tr>

									<tr>
										<td>公司名称
											<span class="alert-info"><?=$alertInfo['company']?></span><br>	
											<input class="focused" type="text" name="company" value="<?=$borrow['company']?>" />
										</td>
										<td>收入
											<span class="alert-info"><?=$alertInfo['income']?></span><br>	
											<input class="focused" type="text" name="income" value="<?=$borrow['income']?>" />
										</td>
										<td>借款期数(月)
											<span class="alert-info"><?=$alertInfo['months']?></span><br>	
											<select name="months" id="months">
												<option value="" >请选择</option>
												<?php foreach ($borrowMonthsList as $item) { ?>
												<option value="<?=$item['months']?>" <?php if ($borrow['months'] == $item['months']) echo "selected"; ?> ><?=$item['months']?></option>
												<?php } ?>
											</select>
										</td>
										<td>借款客户类型
											<span class="alert-info"><?=$alertInfo['type']?></span><br>	
											<select name="type" id="type">
												<option value="" >请选择</option>
												<?php foreach ($borrowTypeList as $item) { ?>
												<option value="<?=$item['id']?>" title="<?=$item['months']?>" <?php if ($borrow['type'] == $item['id']) echo "selected"; ?> ><?=$item['code']?>/<?=$item['name']?>/<?=$item['rate']?>%</option>
												<?php } ?>
											</select>
										</td>
									</tr>

									<tr>
										<td>客户来源
											<span class="alert-info"><?=$alertInfo['source']?></span><br>	
											<select name="source">
												<option value="" >请选择</option>
												<?php foreach ($borrowSourceList as $item) { ?>
												<option value="<?=$item['value']?>" <?php if ($borrow['source'] == $item['value']) echo "selected"; ?>  ><?=$item['value']?></option>
												<?php } ?>
											</select>
										</td>
										<td>客户关系管理
											<span class="alert-info"><?=$alertInfo['CRM']?></span><br>	
											<input class="focused" type="text" name="CRM" value="<?=$borrow['CRM']?>" />
										</td>
										<td>客户开发
											<span class="alert-info"><?=$alertInfo['develop']?></span><br>	
											<input class="focused" type="text" name="develop" value="<?=$borrow['develop']?>" />
										</td>
										<td>信用级别
											<span class="alert-info"><?=$alertInfo['source']?></span><br>	
											<select name="credit_level">
												<option value="" >请选择</option>
												<?php foreach ($borrowCreditLevelList as $item) { ?>
												<option value="<?=$item['value']?>" <?php if ($borrow['credit_level'] == $item['value']) echo "selected"; ?> ><?=$item['value']?></option>
												<?php } ?>
											</select>
										</td>
									</tr>

									<tr>
										<td>合同签约地
											<span class="alert-info"><?=$alertInfo['sign_address']?></span><br>	
											<select name="sign_address">
												<option value="" >请选择</option>
												<?php foreach ($borrowSignAddressList as $item) { ?>
												<option value="<?=$item['value']?>" <?php if ($borrow['sign_address'] == $item['value']) echo "selected"; ?>><?=$item['value']?></option>
												<?php } ?>
											</select>
										</td>
										<td>共同借款人姓名
											<span class="alert-info"><?=$alertInfo['joint_name']?></span><br>	
											<input class="focused" type="text" name="joint_name" value="<?=$borrow['joint_name']?>" />
										</td>
										<td>共同借款人手机
											<span class="alert-info"><?=$alertInfo['joint_phone']?></span><br>	
											<input class="focused" type="text" name="joint_phone" value="<?=$borrow['joint_phone']?>" />
										</td>
										<td>共同借款人证件号
											<span class="alert-info"><?=$alertInfo['joint_idcard']?></span><br>	
											<input class="focused" type="text" name="joint_idcard" value="<?=$borrow['joint_idcard']?>" />
										</td>
									</tr>
									<tr>
										<td>备注
											<span class="alert-info"><?=$alertInfo['comment']?></span><br>	
											<input class="focused" type="text" name="comment" value="<?=$borrow['comment']?>" />
										</td>
										<td>账户状态
											<span class="alert-info"><?=$alertInfo['account_status']?></span><br>		
											<select name="account_status">
												<option value="" >请选择</option>
												<?php foreach ($borrowAccountStatusList as $item) { ?>
												<option value="<?=$item['value']?>" <?php if ($borrow['account_status'] == $item['value']) echo "selected"; ?> ><?=$item['value']?></option>
												<?php } ?>
											</select>
										</td>
										<td>放款银行
											<span class="alert-info"><?=$alertInfo['bank']?></span><br>		
											<select name="bank">
												<option value="" >请选择</option>
												<?php foreach ($bankList as $item) { ?>
												<option value="<?=$item['name']?>" <?php if ($borrow['bank'] == $item['name']) echo "selected"; ?> ><?=$item['name']?></option>
												<?php } ?>
											</select>
										</td>
										<td>放款银行分行
											<span class="alert-info"><?=$alertInfo['sub_bank']?></span><br>	
											<input class="focused" type="text" name="sub_bank" value="<?=$borrow['sub_bank']?>" />
										</td>
									</tr>
									<tr>
										<td>银行卡号
											<span class="alert-info"><?=$alertInfo['bank_cardID']?></span><br>	
											<input class="focused" type="text" name="bank_cardID" value="<?=$borrow['bank_cardID']?>" />
										</td>
										<td>银行代码
											<span class="alert-info"><?=$alertInfo['bank_SWIFT_code']?></span><br>	
											<input class="focused" type="text" name="bank_SWIFT_code" value="<?=$borrow['bank_SWIFT_code']?>" />
										</td>
										<td>审批金额
											<span class="alert-info"><?=$alertInfo['audit_money_sum']?></span><br>	
											<input class="focused" type="text" name="audit_money_sum" value="<?=$borrow['audit_money_sum']?>" />
										</td>
										<td>审批月数
											<span class="alert-info"><?=$alertInfo['audit_months']?></span><br>	
											<input class="focused" type="text" name="audit_months" value="<?=$borrow['audit_months']?>" />
										</td>
									</tr>
									<tr>
										<td>放款日期
											<span class="alert-info"><?=$alertInfo['load_date']?></span><br>	
											<input class="focused datepicker" type="text" name="load_date" value="<?=$borrow['load_date']?>" />
										</td>
										<td>首期还款日
											<span class="alert-info"><?=$alertInfo['first_repay_date']?></span><br>	
											<input class="focused datepicker" type="text" name="first_repay_date" value="<?=$borrow['first_repay_date']?>" />
										</td>
										<td>借款成本额
											<span class="alert-info"><?=$alertInfo['borrow_cost']?></span><br>	
											<input class="focused" type="text" name="borrow_cost" value="<?=$borrow['borrow_cost']?>" />
										</td>
										<td>每月应还金额
											<span class="alert-info"><?=$alertInfo['repay_per_month']?></span><br>	
											<input class="focused" type="text" name="repay_per_month" value="<?=$borrow['repay_per_month']?>" />
										</td>
									</tr>
									<tr>
										<td>手续费
											<span class="alert-info"><?=$alertInfo['handle_charge']?></span><br>	
											<input class="focused" type="text" name="handle_charge" value="<?=$borrow['handle_charge']?>" />
										</td>
										<td>风险金
											<span class="alert-info"><?=$alertInfo['venture_capital']?></span><br>	
											<input class="focused" type="text" name="venture_capital" value="<?=$borrow['venture_capital']?>" />
										</td>
										<td>补息差
											<span class="alert-info"><?=$alertInfo['interest_spread']?></span><br>	
											<input class="focused" type="text" name="interest_spread" value="<?=$borrow['interest_spread']?>" />
										</td>
									</tr>
									<tr>
										<td colspan="3" align="center">
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