<template>
	<body>
<div id="msgTopTipWrapper" style="display:none">
		<div id="msgTopTip">
			<span><i class="iconTip"></i>正在载入日历数据...</span>
		</div>
	</div>
	<div class="calendarWrapper">
		<div class="rightSidePanel mb50 fr">
			<div id="div_day_detail" class="h_calendar_alm">
				<div class="alm_date"></div>
				<div class="alm_content nofestival">
					<input type="button" class="fc-button fc-button-next fc-state-default fc-corner-right" v-on:click="date_add" value="添加日程" />
					<div class="today_icon"></div>
					<div class="today_date"></div>
					<p id="alm_cnD"></p>
					<p id="alm_cnY"></p>
					<p id="alm_cnA"></p>
					<div class="alm_lunar_date"></div>
				</div>
			</div>
			
		</div>
		<div id="calendar" class="dib"></div>
	</div>
</body>
</template>

<script>

export default {
  name: 'hello',
  data() {
    return {
      varble: [{title:'工作计划 （月报）',start: new Date(2017,10,1),end: new Date(2017,10,2)},{title:'工作计划',start: new Date(2017,10,5),end: new Date(2017,10,7)},{title:'fdsf',start: new Date(2017,10,1),end: new Date(2017,10,2)},{title: '下午去分公司开会',start: new Date(2017, 10, 16)}],
	  d_obj: [],
    }
  },
  mounted() {
  	obj = this
//	alert(this.varble)
//	console.log(this.varble)
/** calendar配置 **/
$(document).ready(
	function() {
		var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();
		var test = '';
//		console.log(this.varble)
//		test = {title:'工作计划 （月报）',start: new Date(2017,10,1),end: new Date(2017,10,2)};
//		test2 = {title:'工作计划',start: new Date(2017,10,5),end: new Date(2017,10,8)};
//		test3 = test,test2;
//		test4 = [title=> '审核项目代码，准备上线',start=> new Date(2017, 10, 1),end=> new Date(2017,10,3),url=> 'http://yun.115.com'],[title=> '下午去分公司开会',start=> new Date(y, m, 16),url=> 'http://yun.115.com'];
//		console.log(test4)
//		test = "{title:'工作计划 （月报）',start: new Date(y,10,1),end: new Date(y,10,2)},{title:'等待审核1',start:new Date(y,m+1,3),end: new Date(y,m+1,5)},{title:'核',start:new Date(y,m+1,17),end: new Date(y,m+1,19)}";
//		var tn = new Date(y,m,d);	
//		console.log(tn)
//		alert('加载ing 请稍候')
		$.ajax({
			url:'http://115.work.com/get_data',
			type:'get',
			dataType:'jsonp',
			jsonp:'data_back',
			success:function(msg){
//				obj.d_obj += '[';
				$.each(msg,function(k,v){
//					console.log(v)
					obj.d_obj += '{title:"'+v.title+'",start: "2017-11-17",end: "2017-11-18"},';
//					obj.d_obj += "{title:'"+v.title+"',start: "+ new Date(2017,10,1)+"},";
				})
//				obj.d_obj += ']';
				obj.d_obj = "{title:'买车票',start: '2017/11/7',end: '2017-11-15'},{title:'买车票',start: '2017/11/7',end: '2017-11-15'}";
				console.log(obj.d_obj);
			},
			error:function(info){
				alert('error')
			}
		})

		
	$("#calendar").fullCalendar(
		{
			header : {
				left : 'prevYear,nextYear',
				center : 'title',
				right : 'prev,next today'
			},
			buttonText: {
				prev: "<span class='fc-text-arrow'>&lsaquo;上个月</span>",
				next: "<span class='fc-text-arrow'>下个月&rsaquo;</span>",
				prevYear: "<span class='fc-text-arrow'>&laquo;上一年</span>",
				nextYear: "<span class='fc-text-arrow'>下一年&raquo;</span>"
			},
			editable : true,
//			events: [test],
//			events: obj.varble,
			events: [obj.d_obj],
//			events: [{title:'买车票',start: '2017/11/7',end: '2017-11-15'}],
//			events: [{title:'买车票',start: '2017/11/7',end: '2017-11-15'},],
//			events: [{title:'"+v.title+"',start: '2017-11-1',end: '2017-11-3'},{title:'"+v.title+"',start: '2017-11-1',end: '2017-11-3'},],
//			events: [{title:"买车票",start: "2017-11-17",end: "2017-11-18"},][{title:"买菜",start: "2017-11-17",end: "2017-11-18"},]
//			events: [{title:"买车票",start: "2017-11-17",end: "2017-11-18"},{title:"买菜",start: "2017-11-17",end: '2017-11-18'},],
//			events: [{title:'买车票',start: "2017/11/7",end: "2017-11-15"},{title:'买菜',start: new Date(2017,10,17),end:new Date(2017,10,18)}],
//			events: [{title: '审核项目代码，准备上线',start: new Date(2017, 10, 1),end: new Date(2017,10,3),url: 'http://yun.115.com'},{title: '下午去分公司开会',start: new Date(y, m, 16)},],
			dayClick : function(dayDate, allDay, jsEvent, view) { //点击单元格事件			
				var d = $.fullCalendar.formatDate(dayDate,"dddd");
				var m = $.fullCalendar.formatDate(dayDate,"yyyy年MM月dd日");
				var lunarDate = lunar(dayDate);
				$(".alm_date").html(m + "&nbsp;" + d);
				$(".today_date").html(dayDate.getDate())
				$("#alm_cnD").html("农历"+ lunarDate.lMonth + "月" + lunarDate.lDate);
				$("#alm_cnY").html(lunarDate.gzYear+"年&nbsp;"+lunarDate.gzMonth+"月&nbsp;"+lunarDate.gzDate+"日");
				$("#alm_cnA").html("【"+lunarDate.animal+"年】");
				var fes = lunarDate.festival();
				if(fes.length>0){
					$(".alm_lunar_date").html($.trim(lunarDate.festival()[0].desc));
					$(".alm_lunar_date").show();
				}else{
					$(".alm_lunar_date").hide();
				}
				// 当天则显示“当天”标识
				var now = new Date();
				if (now.getDate() == dayDate.getDate() && now.getMonth() == dayDate.getMonth() && now.getFullYear() == dayDate.getFullYear()){
					$(".today_icon").show();
				}else{
					$(".today_icon").hide();
				}
			},
			loading : function(bool) {
				if (bool)
					$("#msgTopTipWrapper").show();
				else
					$("#msgTopTipWrapper").fadeOut();
			}

		});
	});
	
	/** 绑定事件到日期下拉框 **/
	$(function(){
		$("#fc-dateSelect").delegate("select","change",function(){
			var fcsYear = $("#fcs_date_year").val();
			var fcsMonth = $("#fcs_date_month").val();
			$("#calendar").fullCalendar('gotoDate', fcsYear, fcsMonth);
		});
	});
	/** 当天信息初始化 **/

	$(function(){
		var dayDate = new Date();
		var d = $.fullCalendar.formatDate(dayDate,"dddd");
		var m = $.fullCalendar.formatDate(dayDate,"yyyy年MM月dd日");
		var lunarDate = lunar(dayDate);
		$(".alm_date").html(m + "&nbsp;" + d);
		$(".today_date").html(dayDate.getDate())
		$("#alm_cnD").html("农历"+ lunarDate.lMonth + "月" + lunarDate.lDate);
		$("#alm_cnY").html(lunarDate.gzYear+"年&nbsp;"+lunarDate.gzMonth+"月&nbsp;"+lunarDate.gzDate+"日");
		$("#alm_cnA").html("【"+lunarDate.animal+"年】");
		var fes = lunarDate.festival();
		if(fes.length>0){
			$(".alm_lunar_date").html($.trim(lunarDate.festival()[0].desc));
			$(".alm_lunar_date").show();
		}else{
			$(".alm_lunar_date").hide();
		}
		
	});

  },
  methods: {
  
    date_add()
    {
		location.href="http://localhost:8022/#/date_add"
    },

}
 }

</script>

<style>
	body {
		margin-top: 40px;
		text-align: center;
		font-size: 14px;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		}

	.calendarWrapper {
	width: 1190px;
	margin: 0 auto 15px;
}

#calendar {
	width: 885px;
	background: #fff;
	padding: 15px 10px;
}

.calendarWrapper .rightSidePanel {
	width: 240px;
	padding: 0px 15px;
}
	.dib{display: inline-block;}
	.fr{float: right;}

</style>