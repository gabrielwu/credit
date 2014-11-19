			<div>
				<ul class="breadcrumb">
					<li>
						<a href="#">首页</a><span class="divider">></span>
					</li>
					<li>
						<span>用户权限管理</span><span class="divider">></span>
					</li>
					<li>
						<a href="<?=base_url()?>arole/index">角色管理</a><span class="divider">></span>
					</li>
					<li>
						<a href="<?=base_url()?>arole/create">创建</a>
					</li>
				</ul>
			</div>	

			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-wrench"></i>角色信息</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
						</div>
					</div>
					<div class="box-content">
						<div class="control-group" style="margin: 8px;">
							<form id="frm" method="post" action="<?=base_url()?>arole/createSubmit">
								<span class="result-info" style="position:relative;left:40%;"><?=$alertInfo['result']?></span>
								<table class="table" style="width:70%;margin:0 auto 10px;border:0px;" >
									<tr>
										<td style="text-align:center">角色名</td>
										<td><input name="name" type="text" value="<?=$role['name']?>" /></td>	
										<td><span class="alert-info"><?=$alertInfo['name']?></span></td>
									</tr>
									<tr>
										<td style="text-align:center">功能</td>	
										<td>
											<?php 
											echo "<table>";
											$m_name = "";
											$count  = 0;
											$capcity = 2;
											foreach ($funcs as $func) { 
												if ($func['module_name'] != $m_name) {
													echo ($count % $capcity == 0) ? "<tr>" : "";
													echo "<td valign='top' style='padding:0px 10px 10px;border:0;'>". $func['module_name']. "<br>";
													$m_name = $func['module_name'];
													$count++;
												}

											?>
											<label class="checkbox inline">
											<input type="checkbox" name="func[]" value="<?=$func['id']?>" <?php foreach ($role['funcs'] as $roleFunc) { if ($roleFunc == $func['id']) {echo 'checked'; break;}}?>>
											<?=$func['name']?>
											</label>
											<br>
											<?php 
												if ($func['module_name'] != $m_name) {
													echo "</td>";
													echo ($count % $capcity == 0) ? "</tr>" : "";
												}
											} 
											echo "</table>";?>
										</td>	
										<td><span class="alert-info"><?=$alertInfo['func']?></span></td>
									</tr>
									<tr>
										<td style="text-align:center">导航</td>		
										<td>
											<?php 
											echo "<table>";
											$parent = "";
											$count  = 0;
											$capcity = 2;
											foreach ($navis as $navi) { 
												if ($navi['parent'] != $parent) {
													echo ($count % $capcity == 0) ? "<tr>" : "";
													echo "<td valign='top' style='padding:0px 10px 10px;border:0;'>";
													?>
													<label class="checkbox inline" style="padding-left:6px;">
													<input type="checkbox" name="navi[]" value="<?=$navi['id']?>" <?php foreach ($role['navis'] as $roleNavi) { if ($roleNavi == $navi['id']) {echo 'checked'; break;}}?>>
													<?=$navi['name']?>
													</label><br>
													<?php 
													$parent = $navi['parent'];
													$count++;
													continue;
												}

											?>
											<label class="checkbox inline">
											<input type="checkbox" name="navi[]" value="<?=$navi['id']?>" <?php foreach ($role['navis'] as $roleNavi) { if ($roleNavi == $navi['id']) {echo 'checked'; break;}}?>>
											<?=$navi['name']?>
											</label>
											<br>
											<?php 
												if ($navi['parent'] != $parent) {
													echo "</td>";
													echo ($count % $capcity == 0) ? "</tr>" : "";
												}
											} 
											echo "</table>";?>
										</td>	
										<td><span class="alert-info"><?=$alertInfo['navi']?></span></td>
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