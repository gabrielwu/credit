			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">首页</a><span class="divider">></span>
					</li>
					<li>
						<a href="<?=base_url()?>customer/index">理财客户</a><span class="divider">></span>
					</li>
					<li>
						<span>查看详细信息</span>
					</li>
				</ul>
			</div>	

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-wrench"></i>客户信息</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						<div class="control-group" style="margin: 8px;">
							<form id="frm" method="post" action="<?=base_url()?>customer/editSubmit">
								<table style="width:90%;margin:0 auto;" class="table table-bordered table-striped">
									<tr>
										<td style="text-align:center">姓名</td>	<td><?=$customer['name']?></td>	
										<td style="text-align:center">编号</td>	<td><?=$customer['number']?></td>
										<td style="text-align:center">客户状态</td>	<td><?=$customer['status']?></td>
									</tr>
									<tr>
										<td style="text-align:center" style="text-align:center">电子邮箱</td>	<td><?=$customer['email']?></td>
										<td style="text-align:center" style="text-align:center">手机号</td>	<td><?=$customer['mobile']?></td>
										<td style="text-align:center">证件号</td>	<td><?=$customer['idcard']?></td>
									</tr>
									<tr>
										<td style="text-align:center">生日</td>	<td><?=$customer['birthday']?></td>
										<td style="text-align:center">电话</td>	<td><?=$customer['phone']?></td>
										<td style="text-align:center">传真</td>	<td><?=$customer['fax']?></td><br>
									</tr>
									<tr>
										<td style="text-align:center">个人主页</td>	<td><?=$customer['homepage']?></td>
										<td style="text-align:center">账单地址</td>	<td><?=$customer['bill_addr']?></td>
										<td style="text-align:center">账单邮编</td>	<td><?=$customer['bill_post']?></td>
									</tr>
									<tr>
										<td style="text-align:center">客户意向</td>	<td><?=$customer['intention']?></td>
										<td style="text-align:center">账户状态</td>	<td><?=$customer['acnt_sta']?></td>
										<td style="text-align:center">账户日期</td>	<td><?=$customer['acnt_date']?></td>
									</tr>
									<tr>
										<td style="text-align:center">教育水平</td>	<td><?=$customer['edu']?></td>
										<td style="text-align:center">性别</td>	<td><?=$customer['sex']?></td>
										<td style="text-align:center">职位</td>	<td><?=$customer['position']?></td>
									</tr>
									<tr>
										<td style="text-align:center">公司</td>		<td><?=$customer['company']?></td>
										<td style="text-align:center">客户关系管理</td>	<td><?=$customer['CRM']?></td>
										<td style="text-align:center">客户开发</td>		<td><?=$customer['cus_dev']?></td>
									</tr>
									<tr>
										<td style="text-align:center">合同签订日期</td>	<td><?=$customer['CAD']?></td>
										<td style="text-align:center">创建时间</td>		<td><?=$customer['crte_time']?></td>
										<td style="text-align:center">创建人</td>		<td><?=$customer['operator_name']?></td>
									</tr>
									<tr>
										<td style="text-align:center">理财金额</td>	<td><?=$customer['amount']?></td>
										<td style="text-align:center">收益</td>		<td><?=$customer['earning']?></td>
										<td style="text-align:center"></td>		<td></td>
									</tr>
									<tr>
										<td style="text-align:center">客户来源</td>		<td><?=$customer['source']?></td>
										<td style="text-align:center">支付方式</td>		<td><?=$customer['pay_mode']?></td>
										<td style="text-align:center">投资方式</td>		<td><?=$customer['investWayCode']?><?=$customer['investWayName']?>/<?=$customer['investWayMonths']?>月/<?=$customer['investWayRate']?>%</td>
									</tr>
									<tr>
										<td style="text-align:center" >评论</td>		<td colspan="5"><?=$customer['comment']?></td>
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
						<h2><i class="icon-wrench"></i></h2>
						<h2 style="margin-left:30px;">
							<a class="tab tab-current" id="tab-1">银行</a>
							<a class="tab" id="tab-2">债权人</a>
						</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div id="tab-1-content" class="box-content tab-content">
						<div class="control-group" style="margin: 8px;">
							<table style="width:100%;margin:0 auto;" class="table table-bordered table-striped bootstrap-datatable datatable">
								<thead>
									<tr>
										<td style="text-align:center">银行名称</td>
										<td style="text-align:center">城市</td>
										<td style="text-align:center">开户用户名</td>
										<td style="text-align:center">分/支行名称</td>
										<td style="text-align:center">银行卡号</td>
										<td style="text-align:center">操作&nbsp;<a href="javascript:createItem('customerBank',<?=$customer['id'] ?>)">创建</a></td>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($customerBankList as $item) { ?>
									<tr>
										<td><?=$item['bank_name']?></td>	
										<td><?=$item['provinceName']?>/<?=$item['cityName']?></td>
										<td><?=$item['bank_username']?></td>
										<td><?=$item['sub_bank']?></td>	
										<td><?=$item['cardID']?></td>
										<td><a href="javascript:deleteItem(<?=$item['id'] ?>, 'customerBank')">删除</a></td>
									</tr>
									<?php }?>
								</tbody>
							</table>
						</div>
					</div>
					<div id="tab-2-content" class="box-content tab-content">
						<div class="control-group" style="margin: 8px;">
							<table style="width:100%;margin:0 auto;" class="table table-bordered table-striped bootstrap-datatable datatable">
								<thead
									<tr>
										<td style="text-align:center">借款客户</td>
										<td style="text-align:center">理财客户</td>
										<td style="text-align:center">已匹配债权金额</td>
										<td style="text-align:center">债权状态</td>
										<td style="text-align:center">创建时间</td>
										<td style="text-align:center">操作</td>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($creditRightList as $item) { ?>
									<tr>
										<td><?=$item['borrow_name']?></td>	
										<td><?=$item['customer_name']?></td>
										<td><?=$item['match_amount']?></td>
										<td><?=$item['status']?></td>
										<td><?=$item['create_time']?></td>	
										<td><a href="javascript:deleteItem( <?=$item['id'] ?>, 'creditRight')">删除</a></td>
									</tr>
									<?php }?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<script type="text/javascript">
			</script>

