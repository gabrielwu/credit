			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">首页</a><span class="divider">></span>
					</li>
					<li>
						<span>用户权限管理</span><span class="divider">></span>
					</li>
					<li>
						<a href="<?=base_url()?>anavi/index">导航管理</a><span class="divider">></span>
					</li>
					<li>
						<span>编辑</span>
					</li>
				</ul>
			</div>	

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-wrench"></i>导航信息</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
						<a id="btn-add" class="btn btn-primary" style="float:right" href="<?=base_url()?>anavi/create"><i class="icon-plus icon-white"></i> 创建</a>
					</div>
					<div class="box-content">
						<div class="control-group" style="margin: 8px;">
							<form id="frm" method="post" action="<?=base_url()?>anavi/editSubmit">
								<span class="result-info" style="position:relative;left:40%;"><?=$alertInfo['result']?></span>
								<table class="table" style="width:70%;margin:0 auto 10px;border:0px;" >
									<tr>
										<td style="text-align:center">导航</td>
										<td><input name="name" type="text" value="<?=$navi['name']?>" /></td>	
										<td><span class="alert-info"><?=$alertInfo['name']?></span></td>
									</tr>
									<tr>
										<td style="text-align:center">父导航</td>	
										<td>
											<select name="parent">
												<?php foreach ($parentList as $parent) { ?>
												<option value="<?=$parent['id']?>" <?php if ($parent['id'] == $navi['parent']) echo "selected";?>>
													<?=$parent['name']?>
												</option>
												<?php } ?>
											</select>
										</td>
										<td><span class="alert-info"><?=$alertInfo['parent']?></span></td>
									</tr>
									<tr>
										<td style="text-align:center">级别</td>	
										<td>
											<label class="radio">
												<input type="radio" name="level" value="1" <?php if ($navi['level'] == "1") echo "checked";?>>1
											</label>
											<label class="radio">
												<input type="radio" name="level" value="2" <?php if ($navi['level'] == "2") echo "checked";?>>2
											</label>
										</td>	
										<td><span class="alert-info"><?=$alertInfo['level']?></span></td>
									</tr>
									<tr>
										<td style="text-align:center">链接</td>
										<td><input name="url" type="text" value="<?=$navi['url']?>" /></td>	
										<td><span class="alert-info"><?=$alertInfo['url']?></span></td>
									</tr>
									<tr>
										<td style="text-align:center">顺序</td>
										<td><input name="seq" type="text" value="<?=$navi['seq']?>" /></td>	
										<td><span class="alert-info"><?=$alertInfo['seq']?></span></td>
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