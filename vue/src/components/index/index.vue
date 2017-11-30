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
      varble: [{"start": "2017-11-01","end": "2017-11-03","title": "月度总结",},],
//{
//  "start": "2017-11-06",
//  "end": "2017-11-08",
//  "title": "去分公司开研讨会",
//},
//{
//  "start": "2017-11-28",
//  "end": null,
//  "title": "加入115团队",
//},
//{
//  "start": "2017-11-20",
//  "title": "测试数据",
//},
//{
//  "start": "2017-11-15",
//  "end": "2017-11-24",
//  "title": "测试多天",
//}
//],
	  d_obj: {title:'大型',start:'2017-12-5'},
    }
  },
  create(){
  	obj = this
  },
  /*beforeCreate*/
  mounted() {
  	
//	abc(this)
//	obj = this
//	alert(this.varble)
//	console.log(this.varble)
/** calendar配置 **/
//$(document).ready(
	$(function(){
//	function() {
		var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();
		var test = '';
//		console.log(obj.varble)

	$.ajax({
		
			url:'http://115.work.com/get_info',
//			url:'/json.php',
			type:'get',
			dataType:'jsonp',
			jsonp:'data_back',
//			async:false,
			success:function(msg){
//				console.log(msg)
				obj.d_obj = msg;
				console.log(obj.varble)
//				test = msg;
//				alert(obj.d_obj = JSON.stringify(msg))
//				alert(JSON.parse(obj.d_obj))
				
//				obj.d_obj = JSON.stringify(msg)
//				console.log(obj.d_obj)
//				
//				var events =[];
//             $(msg).find('event').each(function() {
//                 events.push({
//                      title:$(this).attr('title'),
//                      start:$(this).attr('start')
//                  });
//              });
//             callback(events);
//				obj.d_obj += '[';
//				msg = eval("("+msg+")");
//				obj.d_obj = msg
//				console.log(msg)
//				$.each(msg,function(k,v){
//					console.log(v)
//					obj.d_obj += '{title:"'+v.title+'",start: "2017-11-17",end: "2017-11-18"},';
//					obj.d_obj += "{title:'"+v.title+"',start: '2017-11-17'},";
//				})
//				console.log(msg)
//				obj.d_obj += ']';
//				obj.d_obj = '{title:"买车票",start: "2017/11/7",end: "2017-11-15"}';
//				test = ''
//				console.log(events);
			},
			error:function(info){
				alert('error')
			}
	});
		

		
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
//			events: "/data.php",
//			events:[
//			events.push({
////                      title:$(this).attr('title'),
////                      start:$(this).attr('start') // will be parsed
//						title:'好丽友',
//						start:'2017-11-5'
//                 }),],
////			events: function(start,end, callback) {
//      $.ajax({
//          url:'http://115.work.com/get_data',
//          dataType: 'jsonp',
////          async:false,
//          jsonp:'data_back',
//          data: {
//              // ourhypothetical feed requires UNIX timestamps
//              start:Math.round(start.getTime() / 1000),
//              end: Math.round(end.getTime()/ 1000)
//          },
//          success:function(doc) {
//              var events =[];
//             $(doc).find('event').each(function() {
//                 events.push({
////                      title:$(this).attr('title'),
////                      start:$(this).attr('start') // will be parsed
//						title:'好丽友',
//						start:'2017-11-5'
//                  });
//              });
//             callback(events);
//          }
//      });
// },
//			events: function(){
////				alert(obj)
////				console.log(this.d_obj)
//alert('5')
//				alert(JSON.stringify(obj.d_obj))
//			},
//			events: [test],
//			events: obj.varble,
//			events: eval(obj.d_obj),
//			events: obj.d_obj,
//			events: JSON.stringify(obj.d_obj),
//			events: [{"title":"买车票","start":"2017,12,6"},{"title":"买菜","start":"2017,12,8"}],
//			events: [{"title":"买车票","start":"2017,12,6"},{"title":"买菜","start":"2017,12,8"}],
//			events: [test],
//			events: ['title'=>'买车票','start'=>'2017-11-5'],
//			events: [{title:'买车票',start: '2017/12/7',end: '2017-12-15'}],
//			events: [{title:'买车票',start: '2017/11/7',end: '2017-11-15'},],
//			events: [{title:'"+v.title+"',start: '2017-11-1',end: '2017-11-3'},{title:'"+v.title+"',start: '2017-11-1',end: '2017-11-3'},],
//			events: [{title:"买车票",start: "2017-11-17",end: "2017-11-18"},][{title:"买菜",start: "2017-11-17",end: "2017-11-18"},]
			/*events: [
			{
				title:"买车票",
				start: "2017-11-17",
				end: "2017-11-18"
			},
			{
				title:"买菜",
				start: "2017-11-17",
				end: '2017-11-18'},],*/
				events:[{"start": "2017-11-01","end": "2017-11-03","title": "月度总结",},
{
    "start": "2017-11-06",
    "end": "2017-11-08",
    "title": "去分公司开研讨会",
},
{
    "start": "2017-11-28",
    "end": null,
    "title": "加入115团队",
},
{
    "start": "2017-11-20",
    "title": "测试数据",
},
{
    "start": "2017-11-15",
    "end": "2017-11-24",
    "title": "测试多天",
}],
//			events: [{title:'买车票',start: '2017/11/7',end: '2017-11-15'},{title:'买菜',start: new Date(2017,10,17),end:new Date(2017,10,18)}],
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