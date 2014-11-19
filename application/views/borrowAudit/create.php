			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">首页</a><span class="divider">></span>
					</li>
					<li>
						<a href="<?=base_url()?>borrowAudit/create<?=$status?>/<?=$borrow_id?>">借款客户审核创建（<?=$borrowAuditStatusName?>）</a><span class="divider"></span>
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
							<form id="frm" method="post" action="<?=base_url()?>borrowAudit/createSubmit" enctype="multipart/form-data">
								<span class="result-info" style="position:relative;left:40%;"><?=$alertInfo['result']?><?=$alertInfo['upload']?></span>
								<table class="" style="width:60%;margin:0 auto 10px;border:0px;" >
									<tr>
										<td>审批流程<span class="required">*</span>
											<span class="alert-info"><?=$alertInfo['status']?></span><br>	
											<select name="status" id="status">
												<option value="<?=$statusList[$status+1]['value']?>" <?php if ($borrowAudit['status'] == $statusList[$status+1]['value']) echo "selected"; ?>>
													<?=$statusList[$status+1]['value']?>
												</option>
												<option value="<?=$statusList[$status]['value']?>" <?php if ($borrowAudit['status'] == $statusList[$status]['value']) echo "selected"; ?>>
													<?=$statusList[$status]['value']?>
												</option>
											</select>
										</td>
									</tr>
									<tr>
										<td>附件名称
											<span class="alert-info"><?=$alertInfo['attachment']?></span><br>		
											<input class="focused" type="text" name="attachment" value="<?=$borrowAudit['attachment']?>" />
										</td>
									</tr>
									<tr>
										<td>附件
											<span class="alert-info"><?=$alertInfo['file_name']?></span><br>		
											<input  type="file" name="file_name" value="" />
										</td>
									</tr>
									<tr>
										<td>审批月数
											<span class="alert-info"><?=$alertInfo['months']?></span><br>		
											<input class="focused" type="text" name="months" value="<?=$borrowAudit['months']?>" />
										</td>
									</tr>
									<tr>
										<td>审批金额
											<span class="alert-info"><?=$alertInfo['amount']?></span><br>		
											<input class="focused" type="text" name="amount" value="<?=$borrowAudit['amount']?>" />
										</td>
									</tr>
									<tr>
										<td>备注
											<span class="alert-info"><?=$alertInfo['remark']?></span><br>		
											<input class="focused" type="text" name="remark" value="<?=$borrowAudit['remark']?>" />
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