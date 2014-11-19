			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">首页</a><span class="divider">></span>
					</li>
					<li>
						<a href="<?=base_url()?>creditRight/create/<?=$borrow_id?>">债权匹配创建</a><span class="divider"></span>
					</li>
				</ul>
			</div>	
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-wrench"></i>借款客户信息</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						<div class="control-group" style="margin: 8px;">
								<table style="width:90%;margin:0 auto;" class="table table-bordered table-striped">
									<tr>
										<td style="text-align:center">姓名</td>	<td><?=$borrow['name']?></td>	
										<td style="text-align:center">编号</td>	<td><?=$borrow['number']?></td>
										<td style="text-align:center">客户状态</td>	<td><?=$borrow['status']?></td>
									</tr>
									<tr>
										<td style="text-align:center">电子邮箱</td>	<td><?=$borrow['email']?></td>
										<td style="text-align:center">手机号</td>	<td><?=$borrow['phone']?></td>
										<td style="text-align:center">证件号</td>	<td><?=$borrow['idcard']?></td>
									</tr>
									<tr>
										<td style="text-align:center">证件地址</td>	<td><?=$borrow['idaddress']?></td>
										<td style="text-align:center">生日</td>	<td><?=$borrow['birthday']?></td>
										<td style="text-align:center">电话</td>	<td><?=$borrow['telephone']?></td>
									</tr>
									<tr>
										<td style="text-align:center">传真</td>	<td><?=$borrow['fax']?></td><br>
										<td style="text-align:center">客户意向</td>	<td><?=$borrow['intention']?></td>
										<td style="text-align:center">账户状态</td>	<td><?=$borrow['account_status']?></td>
									</tr>
									<tr>
										<td style="text-align:center">账户日期</td>	<td><?=$borrow['account_date']?></td>
										<td style="text-align:center">教育水平</td>	<td><?=$borrow['education']?></td>
										<td style="text-align:center">性别</td>	<td><?=$borrow['sex']?></td>
									</tr>
									<tr>
										<td style="text-align:center">职位</td>	<td><?=$borrow['position']?></td>
										<td style="text-align:center">职业</td>		<td><?=$borrow['job']?></td>
										<td style="text-align:center">公司</td>		<td><?=$borrow['company']?></td>
									</tr>
									<tr>
										<td style="text-align:center">客户关系管理</td>	<td><?=$borrow['CRM']?></td>
										<td style="text-align:center">客户开发</td>		<td><?=$borrow['develop']?></td>
										<td style="text-align:center">合同编号－－－</td>		<td><?=$borrow['sign_code']?></td>
									</tr>
									<tr>
										<td style="text-align:center">省份</td><td><?=$borrow['provinceName']?></td>
										<td style="text-align:center">城市</td><td><?=$borrow['cityName']?></td>
										<td style="text-align:center">县区</td><td><?=$borrow['countyName']?></td>
									</tr>
									<tr>
										<td style="text-align:center">借款金额</td><td><?=$borrow['money_sum']?></td>
										<td style="text-align:center">借款月数</td><td><?=$borrow['months']?></td>
										<td style="text-align:center">信用级别</td><td><?=$borrow['credit_level']?></td>
									</tr>
									<tr>
										<td style="text-align:center">是否逾期</td><td><?=$borrow['is_overdue']?></td>
										<td style="text-align:center">已还款月数</td><td><?=$borrow['months_paid']?></td>
										<td style="text-align:center">合同签约日期－－－</td>		<td><?=$borrow['sign_date']?></td>
									</tr>
									<tr>
										<td style="text-align:center">审批金额</td><td><?=$borrow['audit_money_sum']?></td>
										<td style="text-align:center">审批月数</td><td><?=$borrow['audit_months']?></td>
										<td style="text-align:center">借款成本额</td><td><?=$borrow['borrow_cost']?></td>
									</tr>
									<tr>
										<td style="text-align:center">家庭住址</td><td><?=$borrow['home_address']?></td>
										<td style="text-align:center">合同邮寄地址</td><td><?=$borrow['sign_address']?></td>
										<td style="text-align:center">客户类型</td><td><?=$borrow['typeName']?>/<?=$borrow['typeCode']?>/<?=$borrow['typeRate']?>%</td>
									</tr>
									<tr>
										<td style="text-align:center">借款用途</td><td><?=$borrow['purpose']?></td>
										<td style="text-align:center">放款银行及帐号</td><td><?=$borrow['bank']?><?=$borrow['sub_bank']?><?=$borrow['bank_cardID']?></td>
										<td style="text-align:center">放款银行代码</td><td><?=$borrow['bank_SWIFT_code']?></td>
									</tr>
									<tr>
										<td style="text-align:center">首期还款日</td><td><?=$borrow['first_repay_date']?></td>
										<td style="text-align:center">下一还款日</td><td><?=$borrow['next_repay_date']?></td>
										<td style="text-align:center">每月应还金额</td><td><?=$borrow['repay_per_month']?></td>
									</tr>
									<tr>
										<td style="text-align:center">放款日期</td><td><?=$borrow['load_date']?></td>
										<td style="text-align:center">手续费</td><td><?=$borrow['load_date']?></td>
										<td style="text-align:center">风险金</td><td><?=$borrow['venture_capital']?></td>
									</tr>
									<tr>
										<td style="text-align:center">补息差</td><td><?=$borrow['interest_spread']?></td>
										<td style="text-align:center">共同借款人</td><td><?=$borrow['joint_name']?></td>
										<td style="text-align:center">共同借款人手机</td><td><?=$borrow['joint_phone']?></td>
									</tr>
									<tr>
										<td style="text-align:center">共同借款人证件</td><td><?=$borrow['joint_idcard']?></td>
										<td style="text-align:center">创建时间</td><td><?=$borrow['create_time']?></td>
										<td style="text-align:center">创建人</td>	<td><?=$borrow['operator']?></td>
									</tr>
									<tr>
										<td style="text-align:center">评论</td><td colspan="5"><?=$borrow['comment']?></td>
									</tr>
								</table>
						</div>
					</div>
				</div>
			</div>
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-wrench"></i>搜索理财客户</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						<div class="control-group" style="margin: 8px;">
							<form id="frm" method="post" action="<?=base_url()?>creditRight/create/<?=$borrow_id?>">
								<table id="table_search">
									<tr>
										<td>姓名<br>		<input class="focused" type="text" name="name"   value="<?=$condition['name']?>" /></td>
										<td>编号<br>		<input class="focused" type="text" name="number" value="<?=$condition['number']?>" /></td>
										<!--<td>客户状态<br>	
											<select name="status" value="<?=$condition['status']?>" >
												<option value="" <?php if ($condition['status'] == "") echo "selected"; ?>>全部</option>
												<?php foreach ($customerStatusList as $status) { ?>
												<option value="<?=$status['value']?>" <?php if ($condition['status'] == $status['value']) echo "selected"; ?>>
													<?=$status['value']?>
												</option>
												<?php } ?>
											</select>
										</td>-->
										<td>电子邮箱<br>	<input class="focused" type="text" name="email"  value="<?=$condition['email']?>" /></td>
										<td>手机号<br>	<input class="focused" type="text" name="mobile" value="<?=$condition['mobile']?>" /></td>
									</tr>
									<tr>
										<td>证件号<br>	<input class="focused" type="text" name="idcard"   value="<?=$condition['idcard']?>" /></td>
										<td>生日<br>		<input class="focused" type="text" name="birthday" value="<?=$condition['birthday']?>" /></td>
										<td>电话<br>		<input class="focused" type="text" name="phone"    value="<?=$condition['phone']?>" /></td>
										<td>传真<br>		<input class="focused" type="text" name="fax"      value="<?=$condition['fax']?>" /></td>
										<td>个人主页<br>	<input class="focused" type="text" name="homepage" value="<?=$condition['homepage']?>" /></td>
									</tr>
									<tr>
										<td>账单地址<br>	<input class="focused" type="text" name="bill_addr" value="<?=$condition['bill_addr']?>" /></td>
										<td>账单邮编<br>	<input class="focused" type="text" name="bill_post" value="<?=$condition['bill_post']?>" /></td>
										<td>客户意向<br>	<input class="focused" type="text" name="intention" value="<?=$condition['intention']?>" /></td>
										<td>账户状态<br>	
											<select name="acnt_sta" value="<?=$condition['acnt_sta']?>" >
												<option value="" <?php if ($condition['acnt_sta'] == "") echo "selected"; ?>>全部</option>
												<?php foreach ($accountStatusList as $status) { ?>
												<option value="<?=$status['value']?>" <?php if ($condition['acnt_sta'] == $status['value']) echo "selected"; ?>>
													<?=$status['value']?>
												</option>
												<?php } ?>
											</select>
										</td>
										<td>账户日期<br>	<input class="focused" type="text" name="acnt_date" value="<?=$condition['acnt_date']?>" /></td>
									</tr>
									<tr>
										<td>教育水平<br>		<input class="focused" type="text" name="edu"      value="<?=$condition['edu']?>" /></td>
										<td>性别<br>					
											<select name="sex" value="<?=$condition['sex']?>" >
												<option value="" <?php if ($condition['sex'] == "") echo "selected"; ?>>全部</option>
												<option value="男" <?php if ($condition['sex'] == "男") echo "selected"; ?>>男</option>
												<option value="女" <?php if ($condition['sex'] == "女") echo "selected"; ?>>女</option>
											</select>
										</td>
										<td>职位<br>			<input class="focused" type="text" name="position" value="<?=$condition['position']?>" /></td>
										<td>公司<br>			<input class="focused" type="text" name="company"  value="<?=$condition['company']?>" /></td>
										<td>客户关系管理<br>	<input class="focused" type="text" name="CRM"      value="<?=$condition['CRM']?>" /></td>
									</tr>
									<tr>
										<td>客户开发<br>		<input class="focused" type="text" name="cus_dev"   value="<?=$condition['cus_dev']?>" /></td>
										<td>合同签订日期<br>	<input class="focused" type="text" name="CAD"       value="<?=$condition['CAD']?>" /></td>
										<td>创建时间<br>		<input class="focused" type="text" name="crte_time" value="<?=$condition['crte_time']?>" /></td>
										<td>创建人<br>		<input class="focused" type="text" name="operator"  value="<?=$condition['operator']?>" /></td>
										<td>客户来源<br>		
											<select name="source" value="<?=$condition['source']?>" >
												<option value="" <?php if ($condition['source'] == "") echo "selected"; ?>>全部</option>
												<?php foreach ($customerSourceList as $source) { ?>
												<option value="<?=$source['value']?>" <?php if ($condition['source'] == $source['value']) echo "selected"; ?>>
													<?=$source['value']?>
												</option>
												<?php } ?>
											</select>
										</td>
									</tr>
									<tr>
										<td>支付方式<br>	
											<select name="pay_mode" value="<?=$condition['pay_mode']?>" >
												<option value="" <?php if ($condition['pay_mode'] == "") echo "selected"; ?>>全部</option>
												<?php foreach ($payModeList as $pay_mode) { ?>
												<option value="<?=$pay_mode['value']?>" <?php if ($condition['pay_mode'] == $pay_mode['value']) echo "selected"; ?>>
													<?=$pay_mode['value']?>
												</option>
												<?php } ?>
											</select>		
										</td>
										<td>评论<br>			<input class="focused" type="text" name="comment"  value="<?=$condition['comment']?>" /></td>
										<td colspan="3" align="center">
											<a id="btn-submit" class="btn btn-success" href="#"><i class="icon-search icon-white"></i> 搜索</a>&nbsp;&nbsp;&nbsp;&nbsp;
											<a id="btn-reset" class="btn btn-info" href="#"><i class="icon-ban-circle icon-white"></i> 清空</a>&nbsp;&nbsp;&nbsp;&nbsp;
										</td>
									</tr>
								</table>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i>理财客户列表</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
							<thead>
							  	<tr>
									<th>姓名</th>
									<th>编号</th>
									<th>手机号</th>
									<th>证件号</th>
									<th>客户状态</th>
									<th>账户状态</th>
									<th>可匹配金额</th>
									<th>合同签约时间</th>
									<th>操作</th>
							 	 </tr>
						  	</thead>   
						  <tbody>
						  	<?php foreach ($customerList as $customer) { ?>
							<tr>
								<td class="center"><?=$customer['name'] ?></td>
								<td class="center"><?=$customer['number'] ?></td>
								<td class="center"><?=$customer['mobile'] ?></td>
								<td class="center"><?=$customer['idcard'] ?></td>
								<td class="center"><?=$customer['status'] ?></td>
								<td class="center"><?=$customer['acnt_sta'] ?></td>
								<td class="center"><?=$customer['customer_can_match'] ?></td>
								<td class="center"><?=$customer['CAD'] ?></td>
								<td class="center">
									<a href="javascript:chooseCustomer(<?=$customer['id'] ?>, '<?=$customer['name'] ?>', '<?=$customer['customer_can_match'] ?>', '<?=$customer['name'] ?>')">选中</a>
									<a href="<?=base_url()?>customer/viewDetail/<?=$customer['id'] ?>">查看</a>
								</td>
							</tr>
							<?php } ?>
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			</div><!--/row-->
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-wrench"></i>匹配信息</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						<div class="control-group" style="margin: 8px;">
							<form id="frm1" method="post" action="<?=base_url()?>creditRight/createSubmit" >
								<span class="result-info" style="position:relative;left:40%;"><?=$alertInfo['result']?></span>
								<table class="" style="width:60%;margin:0 auto 10px;border:0px;" >
									<tr>
										<td>借款成本额
											<span class="alert-info"></span><br>		
											<input class="focused" type="text" readonly="readonly" name="borrow_cost" id="borrow_cost" value="<?=$creditRight['borrow_cost']?>" />
										</td>
										<td>已匹配额
											<span class="alert-info"></span><br>		
											<input class="focused" type="text" readonly="readonly" name="matched_amount" id="matched_amount" value="<?=$creditRight['matched_amount']?>" />
										</td>
										<td>还需匹配额
											<span class="alert-info"></span><br>		
											<input class="focused" type="text" readonly="readonly" name="match_need" id="match_need" value="<?=$creditRight['match_need']?>" />
										</td>
									</tr>
									<tr>
										<td>选中理财客户
											<span class="alert-info"><br>		
											<input class="focused" type="text" readonly="readonly" name="customer_name" id="customer_name" value="<?=$creditRight['customer_name']?>" />
											<input class="focused" type="hidden" name="customer_id" id="customer_id" value="<?=$creditRight['customer_id']?>" />
										</td>
										<td>理财客户可匹配额
											<span class="alert-info"><br>		
											<input class="focused" type="text" readonly="readonly" name="customer_can_match" id="customer_can_match" value="<?=$creditRight['customer_can_match']?>" />
										</td>
										<td>理财客户可匹配月数
											<span class="alert-info"><br>		
											<input class="focused" type="text" name="customer_months_max" id="customer_months_max" value="<?=$creditRight['customer_months_max']?>" />
										</td>
									</tr>
									<tr>
										<td>匹配金额
											<span class="alert-info"><?=$alertInfo['match_amount']?></span><br>		
											<input class="focused" type="text" name="match_amount" value="<?=$creditRight['match_amount']?>" />
										</td>
										<td>匹配月数
											<span class="alert-info"><?=$alertInfo['months']?></span><br>		
											<input class="focused" type="text" name="months" value="<?=$creditRight['months']?>" />
										</td>
									</tr>
								</table>
								<a id="btn-submit1" class="btn btn-success" href="#" style="position:relative;left:40%;">
									<i class="icon-pencil icon-white"></i> 提交
								</a>
							</form>
						</div>
					</div>
				</div>
			</div>
			<script>   
			function chooseCustomer(id, name, customer_can_match, customer_months_max) {
				$("#customer_id").val(id);
				$("#customer_name").val(name);
				$("#customer_can_match").val(customer_can_match);
				$("#customer_months_max").val();
			}
            </script>   