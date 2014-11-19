			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">首页</a><span class="divider">></span>
					</li>
					<li>
						<a href="<?=base_url()?>borrowAttachment/create<?=$type?>/<?=$borrow_id?>">借款客户附件创建（<?=$type_name?>）</a><span class="divider"></span>
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
							<form id="frm" method="post" action="<?=base_url()?>borrowAttachment/createSubmit" enctype="multipart/form-data">
								<span class="result-info" style="position:relative;left:40%;"><?=$alertInfo['result']?><?=$alertInfo['upload']?></span>
								<table class="" style="width:60%;margin:0 auto 10px;border:0px;" >
									<tr>
										<td>附件名称<span class="required">*</span>
											<span class="alert-info"><?=$alertInfo['attachment_name']?></span><br>		
											<input class="focused" type="text" name="attachment_name" value="<?=$borrowAttachment['attachment_name']?>" />
										</td>
									</tr>
									<tr>
										<td>附件<span class="required">*</span>
											<span class="alert-info"><?=$alertInfo['file_name']?></span><br>		
											<input  type="file" name="file_name" value="" />
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