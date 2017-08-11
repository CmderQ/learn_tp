
$(function(){

	var $content = $('#content');

	// 开始加载动画，全屏不可点击
	function ajaxLoading() {
		var $dialog = $('#loading_dialog'),
			$gif = $dialog.find('.loading-gif'),
			$window = $(window),
			winWidth = $window.width(),
			winHeight = $window.height(),
			width = $gif.width(),
			height = $gif.height();
		$gif.css({left: (winWidth-width)/2, top: (winHeight-height)/2});
		$dialog.show();
	}

	// 结束加载动画
	function ajaxLoadingStop() {
		var $dialog = $('#loading_dialog');
		$dialog.hide();
	}

	// 提示条
	$('[data-rel=tooltip]').tooltip({
		container: 'body',
		trigger: 'focus'
	});

	// 数字选择器
	$('#ace_spinner').ace_spinner({
		value: 0,
		min: 0,
		max: 100,
		step: 10,
		on_sides: true,
		icon_up:'ace-icon fa fa-plus smaller-70',
		icon_down: 'ace-icon fa fa-minus smaller-70',
		btn_up_class:'btn-info' ,
		btn_down_class:'btn-info'
	});

	// 文件选择
	$('#image_file').ace_file_input({
		no_file:'请选择一张jpg/png格式的图片',
		btn_choose: '选择',
		btn_change: '更换',
		droppable: true,
		whitelist: 'png|jpg|jpeg'
	});

	// 日期选择器
	$('.date-picker').datepicker({
		autoclose: true,
		todayHighlight: true,
		language: 'zh-CN'
	})
	.next().on(ace.click_event, function() { // 图标点击弹出选择器
		$(this).prev().focus();
	});

	// 日期时间段选择器
	$('.input-daterange').datepicker({
		autoclose: true,
		todayHighlight: true,
		language: 'zh-CN'
	});

	// 词条多选
	$('.chosen-select').chosen({allow_single_deselect: true});

	// 站点多选列表
	$('#duallist').bootstrapDualListbox({
		filterTextClear: '显示所有',
		filterPlaceHolder: '过滤条件',
		infoText: '显示全部{0}项',
		infoTextFiltered: '<span class="label label-purple label-lg">筛选结果</span>',
		infoTextEmpty: '空列表',
		moveSelectedLabel: '选择',
		moveAllLabel: '选择所有',
		removeSelectedLabel: '移除选择',
		removeAllLabel: '移除所有选择',
		buttonClass: 'btn-white btn-info btn-bold'
	});

	$('#save').click(function() {
		mask();
		setTimeout(function() {
			unmask();
			if(!$content.val().length) {
				$('#content_error').show();
				$content.addClass('yw-error-input').focus();
			} else {
				gui.info('保存成功！');
			}
		}, 1500);
	});

	$content.keyup(function() {
		if($content.val().length) {
			$content.removeClass('yw-error-input');
			$('#content_error').hide();
		}
	});

	$('.yw-tab-btn').click(function() {
		var id = $(this).data('tid');
		$('#tab-detail'+id).show().click();
	});

	$('#back_list').click(function(){
		$('#tab-list').show().click();
	});

	$('#check_title').click(function() {
		var $this = $(this);
		if($this.hasClass('disabled')) return;
		$this.addClass('disabled').text('检测中...');
		setTimeout(function(){
			$this.removeClass('disabled').text('检测作品名');
		}, 1500);
	});

	$('#notice_success').click(function() {
		gui.info('这是操作成功的提示！');
	});

	$('#notice_error').click(function() {
		gui.error('这是出现报错的提示！');
	});

	$('#alert_1').click(function() {
		gui.alert('数据提交过于频繁，请稍后再试！', function(){
			console.log('这是个回调函数');
		});
	});

	$('#alert_2').click(function() {
		var msg = '<div class="error-container">' +
			'<h1 class="grey lighter smaller">操作失败！</h1>' +
			'<hr>' +
			'<h3 class="lighter smaller">' +
			'<span class="blue">' +
			'<i class="ace-icon fa  fa-comment-o"></i> ' +
			'</span>' +
			'请尝试以下操作：' +
			'</h3>' +
			'<div class="space_10"></div>' +
			'<div class="row">' +
			'<ul class="list-unstyled spaced inline bigger-110 margin-15">' +
			'<li>' +
			'<i class="ace-icon fa fa-hand-o-right blue"></i> ' +
			'<a href="mailto:test@example.com">联系我们</a>反馈您的问题' +
			'</li>' +
			'<li>' +
			'<i class="ace-icon fa fa-hand-o-right blue"></i> ' +
			'找到部门对应权限管理人员开通权限' +
			'</li>' +
			'</ul>' +
			'</div>' +
			'</div>';
		gui.alert(msg);
	});

	$('#confirm_dialog').click(function() {
		gui.confirm('确认删除所选的敏感词吗？', function() {
			gui.info('已成功删除4条记录！');
		});
	});

	$('#complex_dialog').click(function() {
		bootbox.dialog({
			title: '<h2 class="align-center">请先登录账号</h2>',
			message: '<div>' +
			'<label for="form-field-8">账号</label>' +
			'<input type="text" class="form-control" placeholder="邮箱/手机号">' +
			'<div class="space"></div>' +
			'<label for="form-field-8">密码</label>' +
			'<input type="password" class="form-control">' +
			'</div>',
			buttons: {
				cancel: {
					label: '取消',
					className: 'btn-white'
				},
				confirm: {
					label: "登录",
					className: "btn-primary btn-sm",
					callback: function() {
						gui.info('登录成功！');
					}
				}
			}
		});
	});

	$('#check_all').click(function() {
		if($(this).prop('checked')) {
			$($(this).parents('table')[0]).find(':checkbox').prop('checked', true);
		}
	});

	$('#refresh_btn').click(function() {
		var id = $('#refresh_id').val(),
			$this = $(this);
		if($.trim(id).length == 0) {
			gui.error('请输入正确的CBID！');
		} else {
			$this.addClass('disabled');
			setTimeout(function(){
				$this.removeClass('disabled');
			}, 5000);
			gui.info('刷新成功！');
		}
	});

	var $menu = $('#side_menu');
	$menu.affix({
		offset: {
			top: function() {
				var top = $menu.offset().top,
					childTop = parseInt($menu.children(0).css('margin-top'), 10),
					height = $('.bs-docs-nav').height();
				return this.top = top - height - childTop;
			},
			bottom: function() {
				return this.bottom = 0;
			}
		}
	});

	$.scrollUp({
		scrollName: "scrollUp",
		topDistance: "300",
		topSpeed: 300,
		animation: "fade",
		animationInSpeed: 200,
		animationOutSpeed: 200,
		scrollText: '<i class="fa fa-angle-up"></i>',
		activeOverlay: !1
	});

	prettyPrint();
});