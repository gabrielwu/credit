<?php  ?>

			<div class="row-fluid">
				<div class="span12 center login-header">
					<h2></h2>
				</div><!--/span-->
			</div><!--/row-->
			
			<div class="row-fluid">
				<div class="well span5 center login-box">
					<div class="span12 center login-header" style="height:80px;padding:0px;">
						<img alt="Charisma Logo" src="<?=$img?>/logo.jpg" style="width:165px;height:63px;" />
					</div><!--/span-->
					<?php if (isset($alert_info)) { ?>
					<div class="alert alert-info"><?=$alert_info?></div>
					<?php } ?>
					<form class="form-horizontal" action="<?=base_url()?>site/login" method="post">
						<input type="hidden" name="anti" value=""/>
						<fieldset>
							<div class="input-prepend" title="Username" data-rel="tooltip">
								<span class="add-on"><i class="icon-user"></i></span>
								<input autofocus class="input-large span10" name="username" id="username" type="text" value="<?=$username?>"/>
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend" title="Password" data-rel="tooltip">
								<span class="add-on"><i class="icon-lock"></i></span>
								<input class="input-large span10" name="password" id="password" type="password" value="<?=$password?>"/>
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend">
							<label class="remember" for="remember"><input type="checkbox" id="remember" />下次自动登录</label>
							</div>
							<div class="clearfix"></div>
							<input type="hidden" value="" name="anti-spam"/>
							<p class="center span5">
							<button type="submit" class="btn btn-primary">登录</button>
							</p>
						</fieldset>
					</form>
				</div><!--/span-->
			</div><!--/row-->
