import Vue from 'vue'
import Router from 'vue-router'
import HelloWorld from '@/components/HelloWorld'

//Show page
import show from '@/components/index/index'

//Add page
import date_add from '@/components/index/date_add'

//test jump
import jump from '@/components/index/jump'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'show',
      component: show
    },
    {
      path: '/test',
      name: 'HelloWorld',
      component: HelloWorld
    },
    {
      path: '/jump',
      name: 'jump',
      component: jump
    },
    {
      path: '/date_add',
      name: 'date_add',
      component: date_add
    }
  ]
})
