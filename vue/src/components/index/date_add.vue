<template>
	<div class="result-wrap">
            <div class="result-content">
            	<center>
                <form action="__URL__/room_type_add_do" method="post" enctype="multipart/form-data">
                    <table class="insert-tab" width="75%">
                        <tbody>
                        	
                        	<tr>
                                <th><i class="require-red">*</i>类型:</th>
                                <td><label for="typ"><input id="typ" name="day_type" class="typ_sel" type="radio" checked="true" value="2" />一天</label> &nbsp;&nbsp;&nbsp;&nbsp;<label for="typ2"><input id="typ2" class="typ_sel" value="3" name="day_type" type="radio" />多天</label></td>
                            </tr>
                            <tr>
                                <th width="120"><i class="require-red">*</i>日期:</th>
                                <td>
                                    	<input class="Wdate" type="text" id="start_time" onClick="WdatePicker()"> &nbsp;&nbsp;&nbsp;&nbsp;<input style="display:" class="Wdate" type="text" id="end_time" onClick="WdatePicker()">
                                </td>
                            </tr>


                            <tr>
                                <th><i class="require-red">*</i>内容:</th>
                                <td><textarea name="rt_content" class="common-textarea" id="rt_content" cols="30" style="width: 98%;height:160px" rows="10" placeholder="请输入内容"></textarea></td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10" value="提交" type="submit">
                                    <input class="btn btn6" onclick="history.go(-1)" value="返回" type="button">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
                </center>
            </div>
        </div>
</template>

<script>
	//加载事件
	document.ready = function() {
//		alert(4)
		var start_time = document.getElementById('start_time')
		var end_time = document.getElementById('end_time');
		if(typ.checked == true) {
//			alert('选中')
			end_time.style.display = 'none';

		} else {
//			alert('未选中')
			end_time.style.display = '';
		}
	}
	//监听按钮事件
	$(document).on('click','.typ_sel',function(){
		var typ_val = $(this).val();
//		alert(typ_val)
		if(typ_val == 3) {
			$('#end_time').show();
		} else {
			$('#end_time').hide();
		}
	})
</script>

<style>
	
</style>