<template>
	<input type="button" value="点击" v-on:click="jump()" />
</template>

<script>
//	location.replace(document.referrer)
export default {
  name: 'hello',
  data() {

  },
  mounted() {
//	alert(2);
//	this.data_init(this)
  	
//  this.drawLine(this);
  },
  methods: {
  
    show()
    {
    	alert(2)
    },
    jump(){
		alert(3)
		location.replace('http://127.0.0.1:8022');	
	}

}
 }
	
</script>

<style>
</style>