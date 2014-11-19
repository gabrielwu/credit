		<?php if(!isset($no_visible_elements) || !$no_visible_elements)	{ ?>
			<!-- content ends -->
			</div><!--/#content.span10-->
		<?php } ?>
		</div><!--/fluid-row-->
		<?php if(!isset($no_visible_elements) || !$no_visible_elements)	{ ?>
		
		<hr>

		<div class="modal hide fade" id="myModal">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3>Settings</h3>
			</div>
			<div class="modal-body">
				<p>Here settings can be configured...</p>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal">Close</a>
				<a href="#" class="btn btn-primary">Save changes</a>
			</div>
		</div>

		<footer>
			<p class="pull-left">&copy; <a href="http://usman.it" target="_blank">Muhammad Usman</a> <?php echo date('Y') ?></p>
			<p class="pull-right">Powered by: <a href="http://usman.it/free-responsive-admin-template">Charisma</a></p>
		</footer>
		<?php } ?>

	</div><!--/.fluid-container-->

	<!-- external javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="<?=$js ?>/jquery-1.7.2.min.js"></script>
	<script src="<?=$js ?>/jquery-ui-1.8.21.custom.min.js"></script>
	<script src="<?=$js ?>/bootstrap-transition.js"></script>
	<script src="<?=$js ?>/bootstrap-alert.js"></script>
	<script src="<?=$js ?>/bootstrap-modal.js"></script>
	<script src="<?=$js ?>/bootstrap-dropdown.js"></script>
	<script src="<?=$js ?>/bootstrap-scrollspy.js"></script>
	<script src="<?=$js ?>/bootstrap-tab.js"></script>
	<script src="<?=$js ?>/bootstrap-tooltip.js"></script>
	<script src="<?=$js ?>/bootstrap-popover.js"></script>
	<script src="<?=$js ?>/bootstrap-button.js"></script>
	<script src="<?=$js ?>/bootstrap-collapse.js"></script>
	<script src="<?=$js ?>/bootstrap-carousel.js"></script>
	<script src="<?=$js ?>/bootstrap-typeahead.js"></script>
	<script src="<?=$js ?>/bootstrap-tour.js"></script>
	<script src="<?=$js ?>/jquery.cookie.js"></script>
	<script src='<?=$js ?>/fullcalendar.min.js'></script>
	<script src='<?=$js ?>/jquery.dataTables.min.js'></script>
	<script src="<?=$js ?>/excanvas.js"></script>
	<script src="<?=$js ?>/jquery.flot.min.js"></script>
	<script src="<?=$js ?>/jquery.flot.pie.min.js"></script>
	<script src="<?=$js ?>/jquery.flot.stack.js"></script>
	<script src="<?=$js ?>/jquery.flot.resize.min.js"></script>
	<script src="<?=$js ?>/jquery.chosen.min.js"></script>
	<script src="<?=$js ?>/jquery.uniform.min.js"></script>
	<script src="<?=$js ?>/jquery.colorbox.min.js"></script>
	<script src="<?=$js ?>/jquery.cleditor.min.js"></script>
	<script src="<?=$js ?>/jquery.noty.js"></script>
	<script src="<?=$js ?>/jquery.elfinder.min.js"></script>
	<script src="<?=$js ?>/jquery.raty.min.js"></script>
	<script src="<?=$js ?>/jquery.iphone.toggle.js"></script>
	<script src="<?=$js ?>/jquery.autogrow-textarea.js"></script>
	<script src="<?=$js ?>/jquery.uploadify-3.1.min.js"></script>
	<script src="<?=$js ?>/jquery.history.js"></script>
	<script src="<?=$js ?>/common/borrowType.js"></script>
	<script src="<?=$js ?>/common/region.js"></script>
	<script>
			function createItem(module, id) {
				var win = window.showModalDialog("<?=base_url()?>"+module+"/create/"+id,"newwin","dialogHeight: 540px; dialogWidth: 750px; dialogTop: 110px; dialogLeft: 166px; edge: Raised; center: Yes; help: Yes; resizable: Yes; status: Yes;");
				if (win != 'True') {
					window.location.reload();
	            } else {
	                alert('打死不出来');
	            }
			}
			function createAttachment(type, id) {
				var win = window.showModalDialog("<?=base_url()?>borrowAttachment/create"+type+"/"+id,"newwin","dialogHeight: 540px; dialogWidth: 750px; dialogTop: 110px; dialogLeft: 166px; edge: Raised; center: Yes; help: Yes; resizable: Yes; status: Yes;");
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
(function($) {
/*
 * Function: fnGetColumnData
 * Purpose:  Return an array of table values from a particular column.
 * Returns:  array string: 1d data array
 * Inputs:   object:oSettings - dataTable settings object. This is always the last argument past to the function
 *           int:iColumn - the id of the column to extract the data from
 *           bool:bUnique - optional - if set to false duplicated values are not filtered out
 *           bool:bFiltered - optional - if set to false all the table data is used (not only the filtered)
 *           bool:bIgnoreEmpty - optional - if set to false empty values are not filtered from the result array
 * Author:   Benedikt Forchhammer <b.forchhammer /AT\ mind2.de>
 */
$.fn.dataTableExt.oApi.fnGetColumnData = function ( oSettings, iColumn, bUnique, bFiltered, bIgnoreEmpty ) {
    // check that we have a column id
    if ( typeof iColumn == "undefined" ) return new Array();
     
    // by default we only want unique data
    if ( typeof bUnique == "undefined" ) bUnique = true;
     
    // by default we do want to only look at filtered data
    if ( typeof bFiltered == "undefined" ) bFiltered = true;
     
    // by default we do not want to include empty values
    if ( typeof bIgnoreEmpty == "undefined" ) bIgnoreEmpty = true;
     
    // list of rows which we're going to loop through
    var aiRows;
     
    // use only filtered rows
    if (bFiltered == true) aiRows = oSettings.aiDisplay;
    // use all rows
    else aiRows = oSettings.aiDisplayMaster; // all row numbers
 
    // set up data array   
    var asResultData = new Array();
     
    for (var i=0,c=aiRows.length; i<c; i++) {
        iRow = aiRows[i];
        var aData = this.fnGetData(iRow);
        var sValue = aData[iColumn];
         
        // ignore empty values?
        if (bIgnoreEmpty == true && sValue.length == 0) continue;
 
        // ignore unique values?
        else if (bUnique == true && jQuery.inArray(sValue, asResultData) > -1) continue;
         
        // else push the value onto the result data array
        else asResultData.push(sValue);
    }
     
    return asResultData;
}}(jQuery));
function fnCreateSelect( aData ) {
    var r='<select><option value=""></option>', i, iLen=aData.length;
    for ( i=0 ; i<iLen ; i++ ) {
	        r += '<option value="'+aData[i]+'">'+aData[i]+'</option>';
	}
    return r+'</select>';
}
$(document).ready(function(){
	$("#btn-submit").click(function (){
		$("#frm").submit();
	});
	$("#btn-submit1").click(function (){
		$("#frm1").submit();
	});
	$("#btn-reset").click(function (){
		$("#frm input").val("");
		$("#frm select").find("option[value='']").attr("selected",true);
	});
	var date   = new Date();   
    var year   = date.getFullYear();
    var year10 = year + 10;
	$( ".datepicker" ).datepicker({
		dateFormat: "yy-mm-dd",
    	changeYear: true,
    	changeMonth: true,
    	minDate: new Date(1900, 1 - 1, 1),
    	yearRange: "1900:" + year
    });
	//themes, change CSS with JS
	//default theme(CSS) is cerulean, change it if needed
	var current_theme = $.cookie('current_theme')==null ? 'cerulean' :$.cookie('current_theme');
	switch_theme(current_theme);
	
	$('#themes a[data-value="'+current_theme+'"]').find('i').addClass('icon-ok');
				 
	$('#themes a').click(function(e){
		e.preventDefault();
		current_theme=$(this).attr('data-value');
		$.cookie('current_theme',current_theme,{expires:365});
		switch_theme(current_theme);
		$('#themes i').removeClass('icon-ok');
		$(this).find('i').addClass('icon-ok');
	});
	
	
	function switch_theme(theme_name)
	{
		$('#bs-css').attr('href','<?=$css?>/bootstrap-'+theme_name+'.css');
	}
	
	//ajax menu checkbox
	$('#is-ajax').click(function(e){
		$.cookie('is-ajax',$(this).prop('checked'),{expires:365});
	});
	$('#is-ajax').prop('checked',$.cookie('is-ajax')==='true' ? true : false);
	
	//disbaling some functions for Internet Explorer
	if($.browser.msie)
	{
		$('#is-ajax').prop('checked',false);
		$('#for-is-ajax').hide();
		$('#toggle-fullscreen').hide();
		$('.login-box').find('.input-large').removeClass('span10');
		
	}
	
	
	//highlight current / active link
	$('ul.main-menu li a').each(function(){
		if($($(this))[0].href==String(window.location))
			$(this).parent().addClass('active');
	});
	
	//establish history variables
	var
		History = window.History, // Note: We are using a capital H instead of a lower h
		State = History.getState(),
		$log = $('#log');

	//bind to State Change
	History.Adapter.bind(window,'statechange',function(){ // Note: We are using statechange instead of popstate
		var State = History.getState(); // Note: We are using History.getState() instead of event.state
		$.ajax({
			url:State.url,
			success:function(msg){
				$('#content').html($(msg).find('#content').html());
				$('#loading').remove();
				$('#content').fadeIn();
				var newTitle = $(msg).filter('title').text();
				$('title').text(newTitle);
				docReady();
			}
		});
	});
	
	//ajaxify menus
	$('a.ajax-link').click(function(e){
		if($.browser.msie) e.which=1;
		if(e.which!=1 || !$('#is-ajax').prop('checked') || $(this).parent().hasClass('active')) return;
		e.preventDefault();
		if($('.btn-navbar').is(':visible'))
		{
			$('.btn-navbar').click();
		}
		$('#loading').remove();
		$('#content').fadeOut().parent().append('<div id="loading" class="center">Loading...<div class="center"></div></div>');
		var $clink=$(this);
		History.pushState(null, null, $clink.attr('href'));
		$('ul.main-menu li.active').removeClass('active');
		$clink.parent('li').addClass('active');	
	});
	
	//animating menus on hover
	$('ul.main-menu li:not(.nav-header)').hover(function(){
		$(this).animate({'margin-left':'+=5'},300);
	},
	function(){
		$(this).animate({'margin-left':'-=5'},300);
	});
	
	//other things to do on document ready, seperated for ajax calls
	docReady();

	$(".nav-header").each(function () {
		var id = $(this).attr("id");
		var className = id + "-child";
		$(this).click(function () {
			$("." + className).toggle(400);
		});
	});
	$(".nav-header").css("font-size", "13px");
});
		
		
function docReady(){
	//prevent # links from moving to top
	$('a[href="#"][data-top!=true]').click(function(e){
		e.preventDefault();
	});
	
	//rich text editor
	$('.cleditor').cleditor();
	
	//datepicker
	$('.datepicker').datepicker();
	
	//notifications
	$('.noty').click(function(e){
		e.preventDefault();
		var options = $.parseJSON($(this).attr('data-noty-options'));
		noty(options);
	});


	//uniform - styler for checkbox, radio and file input
	$("input:checkbox, input:radio, input:file").not('[data-no-uniform="true"],#uniform-is-ajax').uniform();

	//chosen - improves select
	$('[data-rel="chosen"],[rel="chosen"]').chosen();

	//tabs
	$('#myTab a:first').tab('show');
	$('#myTab a').click(function (e) {
	  e.preventDefault();
	  $(this).tab('show');
	});

	//makes elements soratble, elements that sort need to have id attribute to save the result
	$('.sortable').sortable({
		revert:true,
		cancel:'.btn,.box-content,.nav-header',
		update:function(event,ui){
			//line below gives the ids of elements, you can make ajax call here to save it to the database
			//console.log($(this).sortable('toArray'));
		}
	});

	//slider
	$('.slider').slider({range:true,values:[10,65]});

	//tooltip
	$('[rel="tooltip"],[data-rel="tooltip"]').tooltip({"placement":"bottom",delay: { show: 400, hide: 200 }});

	//auto grow textarea
	$('textarea.autogrow').autogrow();

	//popover
	$('[rel="popover"],[data-rel="popover"]').popover();

	//file manager
	var elf = $('.file-manager').elfinder({
		url : 'misc/elfinder-connector/connector.php'  // connector URL (REQUIRED)
	}).elfinder('instance');

	//iOS / iPhone style toggle switch
	$('.iphone-toggle').iphoneStyle();

	//star rating
	$('.raty').raty({
		score : 4 //default stars
	});

	//uploadify - multiple uploads
	$('#file_upload').uploadify({
		'swf'      : 'misc/uploadify.swf',
		'uploader' : 'misc/uploadify.php'
		// Put your options here
	});

	//gallery controlls container animation
	$('ul.gallery li').hover(function(){
		$('img',this).fadeToggle(1000);
		$(this).find('.gallery-controls').remove();
		$(this).append('<div class="well gallery-controls">'+
							'<p><a href="#" class="gallery-edit btn"><i class="icon-edit"></i></a> <a href="#" class="gallery-delete btn"><i class="icon-remove"></i></a></p>'+
						'</div>');
		$(this).find('.gallery-controls').stop().animate({'margin-top':'-1'},400,'easeInQuint');
	},function(){
		$('img',this).fadeToggle(1000);
		$(this).find('.gallery-controls').stop().animate({'margin-top':'-30'},200,'easeInQuint',function(){
				$(this).remove();
		});
	});


	//gallery image controls example
	//gallery delete
	$('.thumbnails').on('click','.gallery-delete',function(e){
		e.preventDefault();
		//get image id
		//alert($(this).parents('.thumbnail').attr('id'));
		$(this).parents('.thumbnail').fadeOut();
	});
	//gallery edit
	$('.thumbnails').on('click','.gallery-edit',function(e){
		e.preventDefault();
		//get image id
		//alert($(this).parents('.thumbnail').attr('id'));
	});

	//gallery colorbox
	$('.thumbnail a').colorbox({rel:'thumbnail a', transition:"elastic", maxWidth:"95%", maxHeight:"95%"});

	//gallery fullscreen
	$('#toggle-fullscreen').button().click(function () {
		var button = $(this), root = document.documentElement;
		if (!button.hasClass('active')) {
			$('#thumbnails').addClass('modal-fullscreen');
			if (root.webkitRequestFullScreen) {
				root.webkitRequestFullScreen(
					window.Element.ALLOW_KEYBOARD_INPUT
				);
			} else if (root.mozRequestFullScreen) {
				root.mozRequestFullScreen();
			}
		} else {
			$('#thumbnails').removeClass('modal-fullscreen');
			(document.webkitCancelFullScreen ||
				document.mozCancelFullScreen ||
				$.noop).apply(document);
		}
	});

	//tour
	if($('.tour').length && typeof(tour)=='undefined')
	{
		var tour = new Tour();
		tour.addStep({
			element: ".span10:first", /* html element next to which the step popover should be shown */
			placement: "top",
			title: "Custom Tour", /* title of the popover */
			content: "You can create tour like this. Click Next." /* content of the popover */
		});
		tour.addStep({
			element: ".theme-container",
			placement: "left",
			title: "Themes",
			content: "You change your theme from here."
		});
		tour.addStep({
			element: "ul.main-menu a:first",
			title: "Dashboard",
			content: "This is your dashboard from here you will find highlights."
		});
		tour.addStep({
			element: "#for-is-ajax",
			title: "Ajax",
			content: "You can change if pages load with Ajax or not."
		});
		tour.addStep({
			element: ".top-nav a:first",
			placement: "bottom",
			title: "Visit Site",
			content: "Visit your front end from here."
		});
		
		tour.restart();
	}

	//datatable
	var oTable;
	
	/*
	 * Support functions to provide a little bit of 'user friendlyness' to the textboxes
	 */
	$(".datatable thead input").each( function (i) {
		this.initVal = this.value;
	} );
	
	$(".datatable thead input").focus( function () {
		if ( this.className == "search_init" ) {
			this.className = "";
			this.value = "";
		}
	} );
	
	$(".datatable thead input").blur( function (i) {
		if ( this.value == "" ) {
			this.className = "search_init";
			this.value = this.initVal;
		}
	} );

	oTable = $('.datatable').dataTable({
			"sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span12'i><'span12 center'p>>",
			"sPaginationType": "bootstrap",
			"oLanguage": { "sUrl": "<?=$media?>/zh-cn.txt" },
			"bSortCellsTop": true
			//"oLanguage": {"sLengthMenu": "_MENU_ records per page"}
		} );
	$(".datatable thead input").keyup( function () {
		/* Filter on the column (the index) of this element */
		oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex( 
			oTable.fnSettings(), $("thead th").index(this) ) );
	} );
	$(".datatable thead select").parent().each( function ( i ) {
        $('select', this).change( function () {
			var index = $(this).parent().index(); 
        	oTable.fnFilter( this.value, index );
        	//oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex( oTable.fnSettings(), $("thead input").index(this) ) );
        } );
    } );
	$(".datatable thead #btn-reset-2").click(function (){
		$(".datatable thead input").val("");
		//$(".datatable thead select").find("option[value='']").attr("selected",true);
		$(".datatable thead select").val("");
		$(".datatable thead select").each( function () {
			var index = $(this).parent().index(); 
        	oTable.fnFilter( this.value, index );
        	//oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex( oTable.fnSettings(), $("thead input").index(this) ) );
        } );
		$(".dataTables_filter input").val("");
		
		$(".datatable thead input").each( function () {
			/* Filter on the column (the index) of this element */
			oTable.fnFilter( this.value, oTable.oApi._fnVisibleToColumnIndex( 
				oTable.fnSettings(), $("thead th").index(this) ) );
		} );
	});
	$(".datatable thead input, .datatable thead select").each(function (){
		var width = $(this).parent("th").innerWidth();
		//alert(width);
		$(this).css({"margin": "0px auto"});
	});
	$('.btn-close').click(function(e){
		e.preventDefault();
		$(this).parent().parent().parent().fadeOut();
	});
	$('.btn-minimize').click(function(e){
		e.preventDefault();
		var $target = $(this).parent().parent().next('.box-content');
		if($target.is(':visible')) $('i',$(this)).removeClass('icon-chevron-up').addClass('icon-chevron-down');
		else 					   $('i',$(this)).removeClass('icon-chevron-down').addClass('icon-chevron-up');
		$target.slideToggle();
	});
	$('.btn-setting').click(function(e){
		e.preventDefault();
		$('#myModal').modal('show');
	});



		
	//initialize the external events for calender

	$('#external-events div.external-event').each(function() {

		// it doesn't need to have a start or end
		var eventObject = {
			title: $.trim($(this).text()) // use the element's text as the event title
		};
		
		// store the Event Object in the DOM element so we can get to it later
		$(this).data('eventObject', eventObject);
		
		// make the event draggable using jQuery UI
		$(this).draggable({
			zIndex: 999,
			revert: true,      // will cause the event to go back to its
			revertDuration: 0  //  original position after the drag
		});
		
	});


	//initialize the calendar
	$('#calendar').fullCalendar({
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,agendaWeek,agendaDay'
		},
		editable: true,
		droppable: true, // this allows things to be dropped onto the calendar !!!
		drop: function(date, allDay) { // this function is called when something is dropped
		
			// retrieve the dropped element's stored Event Object
			var originalEventObject = $(this).data('eventObject');
			
			// we need to copy it, so that multiple events don't have a reference to the same object
			var copiedEventObject = $.extend({}, originalEventObject);
			
			// assign it the date that was reported
			copiedEventObject.start = date;
			copiedEventObject.allDay = allDay;
			
			// render the event on the calendar
			// the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
			$('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
			
			// is the "remove after drop" checkbox checked?
			if ($('#drop-remove').is(':checked')) {
				// if so, remove the element from the "Draggable Events" list
				$(this).remove();
			}
			
		}
	});
	
	
	//chart with points
	if($("#sincos").length)
	{
		var sin = [], cos = [];

		for (var i = 0; i < 14; i += 0.5) {
			sin.push([i, Math.sin(i)/i]);
			cos.push([i, Math.cos(i)]);
		}

		var plot = $.plot($("#sincos"),
			   [ { data: sin, label: "sin(x)/x"}, { data: cos, label: "cos(x)" } ], {
				   series: {
					   lines: { show: true  },
					   points: { show: true }
				   },
				   grid: { hoverable: true, clickable: true, backgroundColor: { colors: ["#fff", "#eee"] } },
				   yaxis: { min: -1.2, max: 1.2 },
				   colors: ["#539F2E", "#3C67A5"]
				 });

		function showTooltip(x, y, contents) {
			$('<div id="tooltip">' + contents + '</div>').css( {
				position: 'absolute',
				display: 'none',
				top: y + 5,
				left: x + 5,
				border: '1px solid #fdd',
				padding: '2px',
				'background-color': '#dfeffc',
				opacity: 0.80
			}).appendTo("body").fadeIn(200);
		}

		var previousPoint = null;
		$("#sincos").bind("plothover", function (event, pos, item) {
			$("#x").text(pos.x.toFixed(2));
			$("#y").text(pos.y.toFixed(2));

				if (item) {
					if (previousPoint != item.dataIndex) {
						previousPoint = item.dataIndex;

						$("#tooltip").remove();
						var x = item.datapoint[0].toFixed(2),
							y = item.datapoint[1].toFixed(2);

						showTooltip(item.pageX, item.pageY,
									item.series.label + " of " + x + " = " + y);
					}
				}
				else {
					$("#tooltip").remove();
					previousPoint = null;
				}
		});
		


		$("#sincos").bind("plotclick", function (event, pos, item) {
			if (item) {
				$("#clickdata").text("You clicked point " + item.dataIndex + " in " + item.series.label + ".");
				plot.highlight(item.series, item.datapoint);
			}
		});
	}
	
	//flot chart
	if($("#flotchart").length)
	{
		var d1 = [];
		for (var i = 0; i < Math.PI * 2; i += 0.25)
			d1.push([i, Math.sin(i)]);
		
		var d2 = [];
		for (var i = 0; i < Math.PI * 2; i += 0.25)
			d2.push([i, Math.cos(i)]);

		var d3 = [];
		for (var i = 0; i < Math.PI * 2; i += 0.1)
			d3.push([i, Math.tan(i)]);
		
		$.plot($("#flotchart"), [
			{ label: "sin(x)",  data: d1},
			{ label: "cos(x)",  data: d2},
			{ label: "tan(x)",  data: d3}
		], {
			series: {
				lines: { show: true },
				points: { show: true }
			},
			xaxis: {
				ticks: [0, [Math.PI/2, "\u03c0/2"], [Math.PI, "\u03c0"], [Math.PI * 3/2, "3\u03c0/2"], [Math.PI * 2, "2\u03c0"]]
			},
			yaxis: {
				ticks: 10,
				min: -2,
				max: 2
			},
			grid: {
				backgroundColor: { colors: ["#fff", "#eee"] }
			}
		});
	}
	
	//stack chart
	if($("#stackchart").length)
	{
		var d1 = [];
		for (var i = 0; i <= 10; i += 1)
		d1.push([i, parseInt(Math.random() * 30)]);

		var d2 = [];
		for (var i = 0; i <= 10; i += 1)
			d2.push([i, parseInt(Math.random() * 30)]);

		var d3 = [];
		for (var i = 0; i <= 10; i += 1)
			d3.push([i, parseInt(Math.random() * 30)]);

		var stack = 0, bars = true, lines = false, steps = false;

		function plotWithOptions() {
			$.plot($("#stackchart"), [ d1, d2, d3 ], {
				series: {
					stack: stack,
					lines: { show: lines, fill: true, steps: steps },
					bars: { show: bars, barWidth: 0.6 }
				}
			});
		}

		plotWithOptions();

		$(".stackControls input").click(function (e) {
			e.preventDefault();
			stack = $(this).val() == "With stacking" ? true : null;
			plotWithOptions();
		});
		$(".graphControls input").click(function (e) {
			e.preventDefault();
			bars = $(this).val().indexOf("Bars") != -1;
			lines = $(this).val().indexOf("Lines") != -1;
			steps = $(this).val().indexOf("steps") != -1;
			plotWithOptions();
		});
	}

	//pie chart
	var data = [
	{ label: "Internet Explorer",  data: 12},
	{ label: "Mobile",  data: 27},
	{ label: "Safari",  data: 85},
	{ label: "Opera",  data: 64},
	{ label: "Firefox",  data: 90},
	{ label: "Chrome",  data: 112}
	];
	
	if($("#piechart").length)
	{
		$.plot($("#piechart"), data,
		{
			series: {
					pie: {
							show: true
					}
			},
			grid: {
					hoverable: true,
					clickable: true
			},
			legend: {
				show: false
			}
		});
		
		function pieHover(event, pos, obj)
		{
			if (!obj)
					return;
			percent = parseFloat(obj.series.percent).toFixed(2);
			$("#hover").html('<span style="font-weight: bold; color: '+obj.series.color+'">'+obj.series.label+' ('+percent+'%)</span>');
		}
		$("#piechart").bind("plothover", pieHover);
	}
	
	//donut chart
	if($("#donutchart").length)
	{
		$.plot($("#donutchart"), data,
		{
				series: {
						pie: {
								innerRadius: 0.5,
								show: true
						}
				},
				legend: {
					show: false
				}
		});
	}




	 // we use an inline data source in the example, usually data would
	// be fetched from a server
	var data = [], totalPoints = 300;
	function getRandomData() {
		if (data.length > 0)
			data = data.slice(1);

		// do a random walk
		while (data.length < totalPoints) {
			var prev = data.length > 0 ? data[data.length - 1] : 50;
			var y = prev + Math.random() * 10 - 5;
			if (y < 0)
				y = 0;
			if (y > 100)
				y = 100;
			data.push(y);
		}

		// zip the generated y values with the x values
		var res = [];
		for (var i = 0; i < data.length; ++i)
			res.push([i, data[i]])
		return res;
	}

	// setup control widget
	var updateInterval = 30;
	$("#updateInterval").val(updateInterval).change(function () {
		var v = $(this).val();
		if (v && !isNaN(+v)) {
			updateInterval = +v;
			if (updateInterval < 1)
				updateInterval = 1;
			if (updateInterval > 2000)
				updateInterval = 2000;
			$(this).val("" + updateInterval);
		}
	});

	//realtime chart
	if($("#realtimechart").length)
	{
		var options = {
			series: { shadowSize: 1 }, // drawing is faster without shadows
			yaxis: { min: 0, max: 100 },
			xaxis: { show: false }
		};
		var plot = $.plot($("#realtimechart"), [ getRandomData() ], options);
		function update() {
			plot.setData([ getRandomData() ]);
			// since the axes don't change, we don't need to call plot.setupGrid()
			plot.draw();
			
			setTimeout(update, updateInterval);
		}

		update();
	}
}


//additional functions for data table
$.fn.dataTableExt.oApi.fnPagingInfo = function ( oSettings )
{
	return {
		"iStart":         oSettings._iDisplayStart,
		"iEnd":           oSettings.fnDisplayEnd(),
		"iLength":        oSettings._iDisplayLength,
		"iTotal":         oSettings.fnRecordsTotal(),
		"iFilteredTotal": oSettings.fnRecordsDisplay(),
		"iPage":          Math.ceil( oSettings._iDisplayStart / oSettings._iDisplayLength ),
		"iTotalPages":    Math.ceil( oSettings.fnRecordsDisplay() / oSettings._iDisplayLength )
	};
}
$.extend( $.fn.dataTableExt.oPagination, {
	"bootstrap": {
		"fnInit": function( oSettings, nPaging, fnDraw ) {
			var oLang = oSettings.oLanguage.oPaginate;
			var fnClickHandler = function ( e ) {
				e.preventDefault();
				if ( oSettings.oApi._fnPageChange(oSettings, e.data.action) ) {
					fnDraw( oSettings );
				}
			};

			$(nPaging).addClass('pagination').append(
				'<ul>'+
					'<li class="prev disabled"><a href="#">&larr; '+oLang.sPrevious+'</a></li>'+
					'<li class="next disabled"><a href="#">'+oLang.sNext+' &rarr; </a></li>'+
				'</ul>'
			);
			var els = $('a', nPaging);
			$(els[0]).bind( 'click.DT', { action: "previous" }, fnClickHandler );
			$(els[1]).bind( 'click.DT', { action: "next" }, fnClickHandler );
		},

		"fnUpdate": function ( oSettings, fnDraw ) {
			var iListLength = 5;
			var oPaging = oSettings.oInstance.fnPagingInfo();
			var an = oSettings.aanFeatures.p;
			var i, j, sClass, iStart, iEnd, iHalf=Math.floor(iListLength/2);

			if ( oPaging.iTotalPages < iListLength) {
				iStart = 1;
				iEnd = oPaging.iTotalPages;
			}
			else if ( oPaging.iPage <= iHalf ) {
				iStart = 1;
				iEnd = iListLength;
			} else if ( oPaging.iPage >= (oPaging.iTotalPages-iHalf) ) {
				iStart = oPaging.iTotalPages - iListLength + 1;
				iEnd = oPaging.iTotalPages;
			} else {
				iStart = oPaging.iPage - iHalf + 1;
				iEnd = iStart + iListLength - 1;
			}

			for ( i=0, iLen=an.length ; i<iLen ; i++ ) {
				// remove the middle elements
				$('li:gt(0)', an[i]).filter(':not(:last)').remove();

				// add the new list items and their event handlers
				for ( j=iStart ; j<=iEnd ; j++ ) {
					sClass = (j==oPaging.iPage+1) ? 'class="active"' : '';
					$('<li '+sClass+'><a href="#">'+j+'</a></li>')
						.insertBefore( $('li:last', an[i])[0] )
						.bind('click', function (e) {
							e.preventDefault();
							oSettings._iDisplayStart = (parseInt($('a', this).text(),10)-1) * oPaging.iLength;
							fnDraw( oSettings );
						} );
				}

				// add / remove disabled classes from the static elements
				if ( oPaging.iPage === 0 ) {
					$('li:first', an[i]).addClass('disabled');
				} else {
					$('li:first', an[i]).removeClass('disabled');
				}

				if ( oPaging.iPage === oPaging.iTotalPages-1 || oPaging.iTotalPages === 0 ) {
					$('li:last', an[i]).addClass('disabled');
				} else {
					$('li:last', an[i]).removeClass('disabled');
				}
			}
		}
	}
});

	</script>
	<script>

	function downloadData() {
		var path;
		var file_name;
	}
	function download(path, file_name) {
		var data = new downloadData;
		data.path = path;
		data.file_name = file_name;
		$.ajax({
			type: "POST",
			url: '<?=base_url()?>borrowAttachment/download',
			data: data,
			success: 
				function (s) {
				}
		})
	}
	$(function (){
		$(".tab-content").css("display", "none");
		$("#tab-1-content").css("display", "block");
		$(".tab").click(function (){
			$(".tab").removeClass("tab-current");
			var tab_id = $(this).attr("id");
			$(this).addClass("tab-current");
			$(".tab-content").css("display", "none");
			$("#" + tab_id + "-content").css("display", "block");
		});
	})

	</script>
</body>
</html>
