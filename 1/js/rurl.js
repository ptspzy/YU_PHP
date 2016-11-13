$(document).ready(function() {
    //此标志用于标志是否提交，防止多次提交
    var flag = false;
    //监测是否提交
    $('#addCommentForm').submit(function(e) {
        //阻止表单的自动提交
        e.preventDefault();
        if (flag) return false;
        flag = true;
        $('#submit').val('发布...');
        $('span.error').remove();


        ///异步提交
        // $.ajax({
        //     type: "POST", //提交方法
        //     url: "doAction.php", //后台处理文件地址
        //     datatype: "json", //返回数据类型
        //     //async: false,
        //     data: getFormJson($("#addCommentForm")),
        //     success: function(data) {

        //     },
        //     error: function() {
        //         //alert("ajax有错！");
        //     }
        // });

        function getFormJson(form) {
            var o = {};
            var a = $(form).serializeArray();
            $.each(a, function() {
                if (o[this.name] !== undefined) {
                    if (!o[this.name].push) {
                        o[this.name] = [o[this.name]];
                    }
                    o[this.name].push(this.value || '');
                } else {
                    o[this.name] = this.value || '';
                }
            });
            return o;
        }

        //通过Ajax发送数据
        $.post('doAction.php',$(this).serialize(),function(msg){

        	flag = false;
        	$('#submit').val('发布评论');

        	if(msg.status){
        		$(msg.html).hide().insertBefore('#addCommentContainer').slideDown();
        		$('#content').val('');
        	}
        	else {
        		$.each(msg.errors,function(k,v){
        			$('label[for='+ k +']').append('<span class="error">'+v+'</span>');
        		});
        	}
        },'json');
    });
});
