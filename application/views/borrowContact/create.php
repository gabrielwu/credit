			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">首页</a><span class="divider">></span>
					</li>
					<li>
						<a href="<?=base_url()?>borrowContact/create/<?=$borrow_id?>">借款客户紧急联系人创建</a><span class="divider"></span>
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
							<form id="frm" method="post" action="<?=base_url()?>borrowContact/createSubmit">
								<span class="result-info" style="position:relative;left:40%;"><?=$alertInfo['result']?></span>
								<table class="" style="width:60%;margin:0 auto 10px;border:0px;" >
									<tr>
										<td>姓名<span class="required">*</span>
											<span class="alert-info"><?=$alertInfo['name']?></span><br>		
											<input class="focused" type="text" name="name" value="<?=$borrowContact['name']?>" />
										</td>
									</tr>
									<tr>
										<td>手机<span class="required">*</span>
											<span class="alert-info"><?=$alertInfo['phone']?></span><br>		
											<input class="focused" type="text" name="phone" value="<?=$borrowContact['phone']?>" />
										</td>
									</tr>
									<tr>
										<td>电话<span class="required">*</span>
											<span class="alert-info"><?=$alertInfo['telephone']?></span><br>		
											<input class="focused" type="text" name="telephone" value="<?=$borrowContact['telephone']?>" />
										</td>
									</tr>
									<tr>
										<td>证件号<span class="required">*</span>
											<span class="alert-info"><?=$alertInfo['idcard']?></span><br>		
											<input class="focused" type="text" name="idcard" value="<?=$borrowContact['idcard']?>" />
										</td>
									</tr>
									<tr>
										<td>关系<span class="required">*</span>
											<span class="alert-info"><?=$alertInfo['relationship']?></span><br>		
											<input class="focused" type="text" name="relationship" value="<?=$borrowContact['relationship']?>" />
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