	<style type="text/css">
	#table_search td {padding-right: 14px;}
	</style>
			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">首页</a><span class="divider">></span>
					</li>
					<li>
						<a href="<?=base_url()?>borrow/index">借款客户</a><span class="divider">></span>
					</li>
					<li>
						<span>借款客户管理变更</span>
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
							<form id="frm" method="post" action="<?=base_url()?>borrow/requestIndex">
								<table id="table_search">
									<tr>
										<td>姓名<br>		
											<input class="focused" type="text" name="name"   value="<?=$condition['name']?>" />
										</td>
										<td>编号<br>		
											<input class="focused" type="text" name="number" value="<?=$condition['number']?>" />
										</td>
										<td>客户状态<br>	
											<select name="status" value="<?=$condition['status']?>" >
												<option value="" <?php if ($condition['status'] == "") echo "selected"; ?>>全部</option>
												<?php foreach ($borrowStatusList as $status) { ?>
												<option value="<?=$status['value']?>" <?php if ($condition['status'] == $status['value']) echo "selected"; ?>>
													<?=$status['value']?>
												</option>
												<?php } ?>
											</select>
										</td>
										<td>性别<br>					
											<select name="sex" value="<?=$condition['sex']?>" >
												<option value=""   <?php if ($condition['sex'] == "")  echo "selected"; ?>>全部</option>
												<option value="男" <?php if ($condition['sex'] == "男") echo "selected"; ?>>男</option>
												<option value="女" <?php if ($condition['sex'] == "女") echo "selected"; ?>>女</option>
											</select>
										</td>
										<td>
											创建人<br>	
											<select name="operator" >
												<option value="" <?php if ($condition['operator'] == "") echo "selected"; ?>>全部</option>
												<?php foreach ($operatorList as $operator) { ?>
												<option value="<?=$operator['id']?>" <?php if ($condition['operator'] == $operator['id']) echo "selected"; ?>>
													<?=$operator['name']?>
												</option>
												<?php } ?>
											</select>	
										</td>
									</tr>
									<tr>
										<td>电子邮箱<br>	
											<input class="focused" type="text" name="email"     value="<?=$condition['email']?>" />
										</td>
										<td>手机号<br>	
											<input class="focused" type="text" name="phone"     value="<?=$condition['phone']?>" />
										</td>
										<td>证件号<br>	
											<input class="focused" type="text" name="idcard"    value="<?=$condition['idcard']?>" />
										</td>
										<td>生日<br>		
											<input class="focused" type="text" name="birthday"  value="<?=$condition['birthday']?>" />
										</td>
										<td>电话<br>		
											<input class="focused" type="text" name="telephone" value="<?=$condition['telephone']?>" />
										</td>
									</tr>
									<tr>
										<td>客户意向<br>	
											<select name="intention" >
												<option value="" <?php if ($condition['intention'] == "") echo "selected"; ?>>全部</option>
												<?php foreach ($borrowIntentionList as $intention) { ?>
												<option value="<?=$intention['value']?>" <?php if ($condition['intention'] == $intention['value']) echo "selected"; ?>>
													<?=$intention['value']?>
												</option>
												<?php } ?>
											</select>
										</td>
										<td>账户状态<br>	
											<select name="account_status" >
												<option value="" <?php if ($condition['account_status'] == "") echo "selected"; ?>>全部</option>
												<?php foreach ($borrowAccountStatusList as $status) { ?>
												<option value="<?=$status['value']?>" <?php if ($condition['account_status'] == $status['value']) echo "selected"; ?>>
													<?=$status['value']?>
												</option>
												<?php } ?>
											</select>
										</td>
										<td>紧急联系人姓名<br>	
											<input class="focused" type="text" name="contact[name]"  value="<?=$condition['contact']['name']?>" />
										</td>
										<td>紧急联系人手机<br>	
											<input class="focused" type="text" name="contact[phone]" value="<?=$condition['contact']['phone']?>" />
										</td>
									</tr>
									<tr>
									</tr>
									<tr>
										<td colspan="3" align="center">
										<a id="btn-submit" class="btn btn-success" href="#"><i class="icon-search icon-white"></i> 搜索</a>&nbsp;&nbsp;&nbsp;&nbsp;
										<a id="btn-reset" class="btn btn-info" href="#"><i class="icon-ban-circle icon-white"></i> 清空</a>&nbsp;&nbsp;&nbsp;&nbsp;
										<a id="btn-add" class="btn btn-primary" href="<?=base_url()?>borrow/create"><i class="icon-plus icon-white"></i> 创建借款客户</a>
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
						<h2><i class="icon-user"></i>借款客户列表</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
							<thead>
							  	<tr>
									<th>ID</th>
									<th>姓名</th>
									<th>编号</th>
									<th>手机号</th>
									<th>证件号</th>
									<th>客户状态</th>
									<th>账户状态</th>
									<th>合同签约地点</th>
									<th>借款金额</th>
									<th>创建人</th>
									<th>审核状态</th>
									<th>操作</th>
							 	 </tr>
							 	 <tr>
									<th style="width:50px;" ><input type="text" style="width:50px;" /></th>
									<th style="width:64px;" ><input type="text" style="width:64px;" /></th>
									<th style="width:100px;"><input type="text" style="width:100px;" /></th>
									<th style="width:90px;" ><input type="text" style="width:90px;" /></th>
									<th style="width:144px;"><input type="text" style="width:144px;" /></th>
									<th style="width:96px;" >
										<select style="width:96px;">
											<option value="" >全部</option>
											<?php foreach ($borrowStatusList as $item) { ?>
											<option value="<?=$item['value']?>" ><?=$item['value']?></option>
											<?php } ?>
										</select>
									</th>
									<th style="width:84px;" >
										<select style="width:84px;">
											<option value="" >全部</option>
											<?php foreach ($borrowAccountStatusList as $item) { ?>
											<option value="<?=$item['value']?>" ><?=$item['value']?></option>
											<?php } ?>
										</select>
									</th>
									<th style="width:96px;" >
										<select style="width:96px;">
											<option value="" >全部</option>
											<?php foreach ($borrowSignAddressList as $item) { ?>
											<option value="<?=$item['value']?>" ><?=$item['value']?></option>
											<?php } ?>
											</select>
									</th>
									<th style="width:90px;" ><input type="text" style="width:90px;" /></th>
									<th style="width:78px;" >
										<select style="width:78px;">
											<option value="" >全部</option>
											<?php foreach ($operatorList as $item) { ?>
											<option value="<?=$item['name']?>" ><?=$item['name']?></option>
											<?php } ?>
										</select>
									</th>
									<th style="width:76px;" ><input type="text" style="width:76px;" /></th>
									<th style=""><a id="btn-reset-2" class="btn btn-info" href="#"><i class="icon-ban-circle icon-white"></i> 清空</a></th>
							 	 </tr>
						  	</thead>   
						  <tbody>
						  	<?php foreach ($borrowList as $borrow) { ?>
							<tr>
								<td class="center"><?=$borrow['id'] ?></td>
								<td class="center"><?=$borrow['name'] ?></td>
								<td class="center"><?=$borrow['number'] ?></td>
								<td class="center"><?=$borrow['phone'] ?></td>
								<td class="center"><?=$borrow['idcard'] ?></td>
								<td class="center"><?=$borrow['status'] ?></td>
								<td class="center"><?=$borrow['account_status'] ?></td>
								<td class="center"><?=$borrow['sign_address'] ?></td>
								<td class="center"><?=$borrow['money_sum'] ?></td>
								<td class="center"><?=$borrow['operator'] ?></td>
								<td class="center"><?=$borrow['pass_status'] ?></td>
								<td class="center">
									<a href="<?=base_url()?>borrow/viewRequest/<?=$borrow['_id'] ?>">查看变更申请</a>
									<a href="javascript:deleteBorrowRequest(<?=$borrow['_id'] ?>)">删除申请</a>
								</td>
							</tr>
							<?php } ?>
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			</div><!--/row-->
			<script type="text/javascript">
			function BorrowRequest() {
				var _id;
			}
			function deleteBorrowRequest(id) {
				if (confirm("确认删除？")) {
					var data = new BorrowRequest;
					data._id = id;
					$.ajax({
						type: "POST",
						url: '<?=base_url()?>borrow/deleteRequest',
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