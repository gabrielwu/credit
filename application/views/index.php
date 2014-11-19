<div id="main" class="center-layout">
<?php 
	$i = 1;
    foreach ($data['category'] as $row_c){ 
?>
	<div class="category">
		<div class="category_head">
			<h4><?php echo $row_c['c_name'];?></h4>
			<ul class="item_list">
			<?php foreach ($data['item'][$i] as $row_i){ ?>
				<li class="item">
					<a href=""><img src="<?php echo base_url().$row_i['path'];?>" /></a>
					<a class="flow"></a>
					<p><a href=""><?php echo $row_i['title']?></a></p>
				</li>
			<?php }	?>
			</ul>
		</div>
		<div class="clr"></div>
	</div>
<?php 
        $i++;
	} 
?>
</div>
<div class="clr"></div>