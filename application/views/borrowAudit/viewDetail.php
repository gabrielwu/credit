			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">首页</a><span class="divider">></span>
					</li>
					<li>
						<a href="<?=base_url()?>borrow/index">借款客户</a><span class="divider">></span>
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
							<form id="frm" method="post" action="<?=base_url()?>borrow/editSubmit">
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
							<a class="tab tab-current" href="" id="tab-1">审核</a>
							<a class="tab" id="tab-2">银行</a>
							<a class="tab" id="tab-3">紧急联系人</a>
							<a class="tab" id="tab-4">附件</a>
							<a class="tab" id="tab-5">合同附件</a>
							<a class="tab" id="tab-6">实地考察照片及核查表</a>
							<a class="tab" id="tab-7">贷款申请资料</a>
							<a class="tab" id="tab-8">债权人</a>
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
										<td style="text-align:center">审核ID</td>
										<td style="text-align:center">审核结果</td>
										<td style="text-align:center">审批月数</td>
										<td style="text-align:center">审批金额</td>
										<td style="text-align:center">审批客户类型</td>
										<td style="text-align:center">审核员</td>
										<td style="text-align:center">审核日期</td>
										<td style="text-align:center">审核备注</td>
										<td style="text-align:center">操作&nbsp;<!--<a href="<?=base_url()?>borrowAudit/create1">创建</a>--></td>
									</tr>
								</thead>
							    <tbody>
									<?php foreach ($borrowAuditList as $item) { ?>
									<tr>
										<td><?=$item['status']?></td>	
										<td><?=$item['months']?></td>
										<td><?=$item['amount']?></td>
										<td><?=$item['typeName']?>/<?=$item['typeCode ']?>/<?=$item['typeRate']?>%</td>	
										<td><?=$item['operator']?></td>
										<td><?=$item['create_time']?></td>
										<td><?=$item['remark']?></td>	
										<td><?=$item['number']?></td>
										<td><a href="javascript:deleteItem(<?=$user['id'] ?>)">删除</a></td>
									</tr>
									<?php }?>
								</tbody>
							</table>
						</div>
					</div>
					<div id="tab-2-content" class="box-content tab-content">
						<div class="control-group" style="margin: 8px;">
							<table style="width:100%;margin:0 auto;" class="table table-bordered table-striped bootstrap-datatable datatable">
								<thead>
									<tr>
										<td style="text-align:center">银行名称</td>
										<td style="text-align:center">城市</td>
										<td style="text-align:center">开户用户名</td>
										<td style="text-align:center">分/支行名称</td>
										<td style="text-align:center">银行卡号</td>
										<td style="text-align:center">操作&nbsp;<a href="javascript:createItem('borrowBank')">创建</a></td>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($borrowBankList as $item) { ?>
									<tr>
										<td><?=$item['bank_name']?></td>	
										<td><?=$item['provinceName']?>/<?=$item['cityName']?></td>
										<td><?=$item['bank_username']?></td>
										<td><?=$item['sub_bank']?></td>	
										<td><?=$item['cardID']?></td>
										<td><a href="javascript:deleteItem(<?=$item['id'] ?>, 'borrowBank')">删除</a></td>
									</tr>
									<?php }?>
								</tbody>
							</table>
						</div>
					</div>
					<div id="tab-3-content" class="box-content tab-content">
						<div class="control-group" style="margin: 8px;">
							<table style="width:100%;margin:0 auto;" class="table table-bordered table-striped bootstrap-datatable datatable">
								<thead>
									<tr>
										<td style="text-align:center">紧急联系人</td>
										<td style="text-align:center">手机</td>
										<td style="text-align:center">电话</td>
										<td style="text-align:center">身份证号</td>
										<td style="text-align:center">关系</td>
										<td style="text-align:center">操作&nbsp;<a href="javascript:createItem('borrowContact')">创建</a></td>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($borrowContactList as $item) { ?>
									<tr>
										<td><?=$item['name']?></td>	
										<td><?=$item['phone']?></td>
										<td><?=$item['telephone']?></td>
										<td><?=$item['idcard']?></td>	
										<td><?=$item['relationship']?></td>
										<td><a href="javascript:deleteItem(<?=$item['id'] ?>, 'borrowContact')">删除</a></td>
									</tr>
									<?php }?>
								</tbody>
							</table>
						</div>
					</div>
					<div id="tab-4-content" class="box-content tab-content">
						<div class="control-group" style="margin: 8px;">
							<table style="width:100%;margin:0 auto;" class="table table-bordered table-striped bootstrap-datatable datatable">
								<thead>
									<tr>
										<td style="text-align:center">文件名称</td>
										<td style="text-align:center">附件类型</td>
										<td style="text-align:center">附件名称</td>
										<td style="text-align:center">创建用户</td>
										<td style="text-align:center">创建时间</td>
										<td style="text-align:center">操作&nbsp;<a href="javascript:createAttachment('1')">创建</a></td>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($borrowAttachment1List as $item) { ?>
									<tr>
										<td><a href="<?=base_url()?>borrowAttachment/download/<?=$borrow_id?>/<?=$item['file_name']?>"><?=$item['file_name']?></a></td>	
										<td><?=$attachment_type1_name?></td>
										<td><?=$item['attachment_name']?></td>
										<td><?=$item['operator_name']?></td>
										<td><?=$item['create_time']?></td>
										<td><a href="javascript:deleteItem(<?=$item['id'] ?>, 'borrowAttatchment')">删除</a></td>
									</tr>
									<?php }?>
								</tbody>
							</table>
						</div>
					</div>
					<div id="tab-5-content" class="box-content tab-content">
						<div class="control-group" style="margin: 8px;">
							<table style="width:100%;margin:0 auto;" class="table table-bordered table-striped bootstrap-datatable datatable">
								<thead>
									<tr>
										<td style="text-align:center">文件名称</td>
										<td style="text-align:center">附件类型</td>
										<td style="text-align:center">附件名称</td>
										<td style="text-align:center">创建用户</td>
										<td style="text-align:center">创建时间</td>
										<td style="text-align:center">操作&nbsp;<a href="javascript:createAttachment('2')">创建</a></td>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($borrowAttachment2List as $item) { ?>
									<tr>
										<td><a href="<?=base_url()?>borrowAttachment/download/<?=$borrow_id?>/<?=$item['file_name']?>"><?=$item['file_name']?></a></td>	
										<td><?=$attachment_type2_name?></td>
										<td><?=$item['attachment_name']?></td>
										<td><?=$item['operator_name']?></td>
										<td><?=$item['create_time']?></td>
										<td><a href="javascript:deleteItem(<?=$item['id'] ?>, 'borrowAttatchment')">删除</a></td>
									</tr>
									<?php }?>
								</tbody>
							</table>
						</div>
					</div>
					<div id="tab-6-content" class="box-content tab-content">
						<div class="control-group" style="margin: 8px;">
							<table style="width:100%;margin:0 auto;" class="table table-bordered table-striped bootstrap-datatable datatable">
								<thead>
									<tr>
										<td style="text-align:center">文件名称</td>
										<td style="text-align:center">附件类型</td>
										<td style="text-align:center">附件名称</td>
										<td style="text-align:center">创建用户</td>
										<td style="text-align:center">创建时间</td>
										<td style="text-align:center">操作&nbsp;<a href="javascript:createAttachment('3')">创建</a></td>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($borrowAttachment3List as $item) { ?>
									<tr>
										<td><a href="<?=base_url()?>borrowAttachment/download/<?=$borrow_id?>/<?=$item['file_name']?>"><?=$item['file_name']?></a></td>	
										<td><?=$attachment_type3_name?></td>
										<td><?=$item['attachment_name']?></td>
										<td><?=$item['operator_name']?></td>
										<td><?=$item['create_time']?></td>
										<td><a href="javascript:deleteItem(<?=$item['id'] ?>, 'borrowAttatchment')">删除</a></td>
									</tr>
									<?php }?>
								</tbody>
							</table>
						</div>
					</div>
					<div id="tab-7-content" class="box-content tab-content">
						<div class="control-group" style="margin: 8px;">
							<table style="width:100%;margin:0 auto;" class="table table-bordered table-striped bootstrap-datatable datatable">
								<thead>
									<tr>
										<td style="text-align:center">文件名称</td>
										<td style="text-align:center">附件类型</td>
										<td style="text-align:center">附件名称</td>
										<td style="text-align:center">创建用户</td>
										<td style="text-align:center">创建时间</td>
										<td style="text-align:center">操作&nbsp;<a href="javascript:createAttachment('4')">创建</a></td>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($borrowAttachment4List as $item) { ?>
									<tr>
										<td><a href="<?=base_url()?>borrowAttachment/download/<?=$borrow_id?>/<?=$item['file_name']?>"><?=$item['file_name']?></a></td>	
										<td><?=$attachment_type4_name?></td>
										<td><?=$item['attachment_name']?></td>
										<td><?=$item['operator_name']?></td>
										<td><?=$item['create_time']?></td>
										<td><a href="javascript:deleteItem(<?=$item['id'] ?>, 'borrowAttatchment')">删除</a></td>
									</tr>
									<?php }?>
								</tbody>
							</table>
						</div>
					</div>
					<div id="tab-8-content" class="box-content tab-content">
						<div class="control-group" style="margin: 8px;">
							<table style="width:100%;margin:0 auto;" class="table table-bordered table-striped bootstrap-datatable datatable">
								<thead>
									<tr>
										<td style="text-align:center">理财客户名称人</td>
										<td style="text-align:center">已匹配债权金额</td>
										<td style="text-align:center">债权状态</td>
										<td style="text-align:center">创建时间</td>
										<td style="text-align:center">操作&nbsp;<a href="javascript:createItem('borrowBank')">创建</a></td>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($borrowAuditList as $item) { ?>
									<tr>
										<td><?=$item['status']?></td>	
										<td><?=$item['months']?></td>
										<td><?=$item['amount']?></td>
										<td><?=$item['type']?></td>	
										<td><a href="javascript:deleteItem(<?=$user['id'] ?>)">删除</a></td>
									</tr>
									<?php }?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<script type="text/javascript">
			function createItem(module) {
				var win = window.showModalDialog("<?=base_url()?>"+module+"/create/<?=$borrow_id?>","newwin","dialogHeight: 540px; dialogWidth: 750px; dialogTop: 110px; dialogLeft: 166px; edge: Raised; center: Yes; help: Yes; resizable: Yes; status: Yes;");
				if (win != 'True') {
					window.location.reload();
	            } else {
	                alert('打死不出来');
	            }
			}
			function createAttachment(type) {
				var win = window.showModalDialog("<?=base_url()?>borrowAttachment/create"+type+"/<?=$borrow_id?>","newwin","dialogHeight: 340px; dialogWidth: 750px; dialogTop: 110px; dialogLeft: 166px; edge: Raised; center: Yes; help: Yes; resizable: Yes; status: Yes;");
				if (win != 'True') {
					window.location.reload();
	            } else {
	                alert('打死不出来');
	            }
			}
			function Item() {
				var id;
			}
			function deleteItem(id, module) {
				if (confirm("确认删除？")) {
					var data = new Item;
					data.id = id;
					$.ajax({
						type: "POST",
						url: '<?=base_url()?>'+module+'/delete',
						data: data,
						success: 
						function (s) {
							if (s == '1') {
								alert('删除成功！');
								window.location.reload();
							} else if (s == '0') {
								alert('删除失败！');
							} else {
								alert('您没有权限！');
							}
						}
					})
				}
			}

			</script>

