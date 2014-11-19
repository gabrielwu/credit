<style type="text/css">
	#table_search td {padding-right: 14px;}
	</style>			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">首页</a><span class="divider">></span>
					</li>
					<li>
						<a href="<?=base_url()?>customer/index">理财客户</a><span class="divider">></span>
					</li>
					<li>
						<span>理财客户管理</span>
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
							<form id="frm" method="post" action="<?=base_url()?>customer/index">
								<table id="table_search">
									<tr>
										<td>姓名<br>		<input class="focused" type="text" name="name"   value="<?=$condition['name']?>" /></td>
										<td>编号<br>		<input class="focused" type="text" name="number" value="<?=$condition['number']?>" /></td>
										<td>客户状态<br>	
											<select name="status" value="<?=$condition['status']?>" >
												<option value="" <?php if ($condition['status'] == "") echo "selected"; ?>>全部</option>
												<?php foreach ($customerStatusList as $status) { ?>
												<option value="<?=$status['value']?>" <?php if ($condition['status'] == $status['value']) echo "selected"; ?>>
													<?=$status['value']?>
												</option>
												<?php } ?>
											</select>
										</td>
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
										<td>评论<br>			<input class="focused" type="text" name="comment"  value="<?=$condition['comment']?>" /></td>
										
										<td>
											<?php if ($authorizedIndexAll) { ?>
											创建人<br>	
											<select name="operator" >
												<option value="" <?php if ($condition['operator'] == "") echo "selected"; ?>>全部</option>
												<?php foreach ($operatorList as $operator) { ?>
												<option value="<?=$operator['id']?>" <?php if ($condition['operator'] == $operator['id']) echo "selected"; ?>>
													<?=$operator['name']?>
												</option>
												<?php } ?>
											</select>	
											<?php } ?>
										</td>
										<td colspan="3" align="center">
											<a id="btn-submit" class="btn btn-success" href="#"><i class="icon-search icon-white"></i> 搜索</a>&nbsp;&nbsp;&nbsp;&nbsp;
											<a id="btn-reset" class="btn btn-info" href="#"><i class="icon-ban-circle icon-white"></i> 清空</a>&nbsp;&nbsp;&nbsp;&nbsp;
											<a id="btn-add" class="btn btn-primary" href="<?=base_url()?>customer/create"><i class="icon-plus icon-white"></i> 创建理财客户</a>
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
						<h2><i class="icon-user"></i>客户列表</h2>
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
									<th>创建人</th>
									<th>创建时间</th>
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
								<td class="center"><?=$customer['operator_name'] ?></td>
								<td class="center"><?=$customer['crte_time'] ?></td>
								<td class="center">
									<a href="<?=base_url()?>customer/viewDetail/<?=$customer['id'] ?>">查看</a>
									<a href="<?=base_url()?>customer/edit/<?=$customer['id'] ?>">编辑</a>
									<!--<a href="<?=base_url()?>customer/track/<?=$customer['id'] ?>">跟踪</a>
									<a href="<?=base_url()?>customer/modifyRequest/<?=$customer['id'] ?>">变更申请</a>-->
								</td>
							</tr>
							<?php } ?>
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			</div><!--/row-->