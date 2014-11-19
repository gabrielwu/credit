			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">首页</a><span class="divider">></span>
					</li>
					<li>
						<a href="<?=base_url()?>borrow/index">借款客户</a><span class="divider">></span>
					</li>
					<li>
						<span>查看变更信息</span>
					</li>
				</ul>
			</div>	

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-wrench"></i>客户信息（红色部分为变更内容）</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						<div class="control-group" style="margin: 8px;">
							<form id="frm" method="post" action="<?=base_url()?>borrow/editSubmit">
								<table style="width:90%;margin:0 auto;" class="table table-bordered table-striped">
									<tr>
										<td style="text-align:center">姓名</td>	
										<td><?=$borrow['name']?><span class="request"><?=$borrow_request['name']?></span></td>	
										<td style="text-align:center">编号</td>	
										<td><?=$borrow['number']?><span class="request"><?=$borrow_request['number']?></span></td>
										<td style="text-align:center">客户状态</td>	
										<td><?=$borrow['status']?><span class="request"><?=$borrow_request['status']?></span></td>
									</tr>
									<tr>
										<td style="text-align:center">电子邮箱</td>	
										<td><?=$borrow['email']?><span class="request"><?=$borrow_request['email']?></span></td>
										<td style="text-align:center">手机号</td>
										<td><?=$borrow['phone']?><span class="request"><?=$borrow_request['phone']?></span></td>
										<td style="text-align:center">证件号</td>
										<td><?=$borrow['idcard']?><span class="request"><?=$borrow_request['idcard']?></span></td>
									</tr>
									<tr>
										<td style="text-align:center">证件地址</td>	
										<td><?=$borrow['idaddress']?><span class="request"><?=$borrow_request['idaddress']?></span></td>
										<td style="text-align:center">生日</td>	
										<td><?=$borrow['birthday']?><span class="request"><?=$borrow_request['birthday']?></span></td>
										<td style="text-align:center">电话</td>	
										<td><?=$borrow['telephone']?><span class="request"><?=$borrow_request['telephone']?></span></td>
									</tr>
									<tr>
										<td style="text-align:center">传真</td>	
										<td><?=$borrow['fax']?><span class="request"><?=$borrow_request['fax']?></span></td>
										<td style="text-align:center">客户意向</td>	
										<td><?=$borrow['intention']?><span class="request"><?=$borrow_request['intention']?></span></td>
										<td style="text-align:center">账户状态</td>	
										<td><?=$borrow['account_status']?><span class="request"><?=$borrow_request['account_status']?></span></td>
									</tr>
									<tr>
										<td style="text-align:center">账户日期</td>	
										<td><?=$borrow['account_date']?><span class="request"><?=$borrow_request['account_date']?></span></td>
										<td style="text-align:center">教育水平</td>	
										<td><?=$borrow['education']?><span class="request"><?=$borrow_request['education']?></span></td>
										<td style="text-align:center">性别</td>	
										<td><?=$borrow['sex']?><span class="request"><?=$borrow_request['sex']?></span></td>
									</tr>
									<tr>
										<td style="text-align:center">职位</td>	
										<td><?=$borrow['position']?><span class="request"><?=$borrow_request['position']?></span></td>
										<td style="text-align:center">职业</td>		
										<td><?=$borrow['job']?><span class="request"><?=$borrow_request['job']?></span></td>
										<td style="text-align:center">公司</td>		
										<td><?=$borrow['company']?><span class="request"><?=$borrow_request['company']?></span></td>
									</tr>
									<tr>
										<td style="text-align:center">客户关系管理</td>	
										<td><?=$borrow['CRM']?><span class="request"><?=$borrow_request['CRM']?></span></td>
										<td style="text-align:center">客户开发</td>		
										<td><?=$borrow['develop']?><span class="request"><?=$borrow_request['develop']?></span></td>
										<td style="text-align:center">合同编号－－－</td>		
										<td><?=$borrow['sign_code']?><span class="request"><?=$borrow_request['sign_code']?></span></td>
									</tr>
									<tr>
										<td style="text-align:center">省份</td>
										<td><?=$borrow['provinceName']?><span class="request"><?=$borrow_request['provinceName']?></span></td>
										<td style="text-align:center">城市</td>
										<td><?=$borrow['cityName']?><span class="request"><?=$borrow_request['cityName']?></span></td>
										<td style="text-align:center">县区</td>
										<td><?=$borrow['countyName']?><span class="request"><?=$borrow_request['countyName']?></span></td>
									</tr>
									<tr>
										<td style="text-align:center">借款金额</td>
										<td><?=$borrow['money_sum']?><span class="request"><?=$borrow_request['money_sum']?></span></td>
										<td style="text-align:center">借款月数</td>
										<td><?=$borrow['months']?><span class="request"><?=$borrow_request['months']?></span></td>
										<td style="text-align:center">信用级别</td>
										<td><?=$borrow['credit_level']?><span class="request"><?=$borrow_request['credit_level']?></span></td>
									</tr>
									<tr>
										<td style="text-align:center">是否逾期</td>
										<td><?=$borrow['is_overdue']?><span class="request"><?=$borrow_request['is_overdue']?></span></td>
										<td style="text-align:center">已还款月数</td>
										<td><?=$borrow['months_paid']?><span class="request"><?=$borrow_request['months_paid']?></span></td>
										<td style="text-align:center">合同签约日期－－－</td>		
										<td><?=$borrow['sign_date']?><span class="request"><?=$borrow_request['sign_date']?></span></td>
									</tr>
									<tr>
										<td style="text-align:center">审批金额</td>
										<td><?=$borrow['audit_money_sum']?><span class="request"><?=$borrow_request['audit_money_sum']?></span></td>
										<td style="text-align:center">审批月数</td>
										<td><?=$borrow['audit_months']?><span class="request"><?=$borrow_request['audit_months']?></span></td>
										<td style="text-align:center">借款成本额</td>
										<td><?=$borrow['borrow_cost']?><span class="request"><?=$borrow_request['borrow_cost']?></span></td>
									</tr>
									<tr>
										<td style="text-align:center">家庭住址</td>
										<td><?=$borrow['home_address']?><span class="request"><?=$borrow_request['home_address']?></span></td>
										<td style="text-align:center">合同邮寄地址</td>
										<td><?=$borrow['sign_address']?><span class="request"><?=$borrow_request['sign_address']?></span></td>
										<td style="text-align:center">客户类型</td>
										<td><?=$borrow['typeName']?>/<?=$borrow['typeCode']?>/<?=$borrow['typeRate']?>%<span class="request"><?=$borrow_request['typeName']?>/<?=$borrow_request['typeCode']?>/<?=$borrow_request['typeRate']?>%</span></td>
									</tr>
									<tr>
										<td style="text-align:center">借款用途</td>
										<td><?=$borrow['purpose']?><span class="request"><?=$borrow_request['purpose']?></span></td>
										<td style="text-align:center">放款银行及帐号</td>
										<td><?=$borrow['bank']?><?=$borrow['sub_bank']?><?=$borrow['bank_cardID']?><span class="request"><?=$borrow_request['bank']?><?=$borrow_request['sub_bank']?><?=$borrow_request['bank_cardID']?></span></td>
										<td style="text-align:center">放款银行代码</td>
										<td><?=$borrow['bank_SWIFT_code']?><span class="request"><?=$borrow_request['bank_SWIFT_code']?></span></td>
									</tr>
									<tr>
										<td style="text-align:center">首期还款日</td>
										<td><?=$borrow['first_repay_date']?><span class="request"><?=$borrow_request['first_repay_date']?></span></td>
										<td style="text-align:center">下一还款日</td>
										<td><?=$borrow['next_repay_date']?><span class="request"><?=$borrow_request['next_repay_date']?></span></td>
										<td style="text-align:center">每月应还金额</td>
										<td><?=$borrow['repay_per_month']?><span class="request"><?=$borrow_request['repay_per_month']?></span></td>
									</tr>
									<tr>
										<td style="text-align:center">放款日期</td>
										<td><?=$borrow['load_date']?><span class="request"><?=$borrow_request['load_date']?></span></td>
										<td style="text-align:center">手续费</td>
										<td><?=$borrow['load_date']?><span class="request"><?=$borrow_request['load_date']?></span></td>
										<td style="text-align:center">风险金</td>
										<td><?=$borrow['venture_capital']?><span class="request"><?=$borrow_request['venture_capital']?></span></td>
									</tr>
									<tr>
										<td style="text-align:center">补息差</td>
										<td><?=$borrow['interest_spread']?><span class="request"><?=$borrow_request['interest_spread']?></span></td>
										<td style="text-align:center">共同借款人</td>
										<td><?=$borrow['joint_name']?><span class="request"><?=$borrow_request['joint_name']?></span></td>
										<td style="text-align:center">共同借款人手机</td>
										<td><?=$borrow['joint_phone']?><span class="request"><?=$borrow_request['joint_phone']?></span></td>
									</tr>
									<tr>
										<td style="text-align:center">共同借款人证件</td>
										<td><?=$borrow['joint_idcard']?><span class="request"><?=$borrow_request['joint_idcard']?></span></td>
										<td style="text-align:center">创建时间</td>
										<td><?=$borrow['create_time']?><span class="request"><?=$borrow_request['create_time']?></span></td>
										<td style="text-align:center">创建人</td>	
										<td><?=$borrow['operator']?><span class="request"><?=$borrow_request['operator']?></span></td>
									</tr>
									<tr>
										<td style="text-align:center">评论</td>
										<td colspan="5"><?=$borrow['comment']?><span class="request"><?=$borrow_request['comment']?></span></td>
									</tr>
									<?php if ($passAuthorized) { ?>
									<tr>
										<td colspan="6" style="text-align:center">
											<a id="btn-submit" class="btn btn-primary" href="<?=base_url()?>borrow/passRequest/1/<?=$borrow_request['_id']?>"><i class="icon-plus icon-white"></i> 通过</a>&nbsp;&nbsp;&nbsp;&nbsp;
											<a id="btn-reset" class="btn btn-info" href="#"><i class="icon-ban-circle icon-white"></i> 不通过</a>&nbsp;&nbsp;&nbsp;&nbsp;
										</td>
									</tr>
									<?php } ?>
								</table>
							</form>
						</div>
					</div>
				</div>
			</div>