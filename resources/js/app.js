/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

import Calendar from 'v-calendar/lib/components/calendar.umd'
import DatePicker from 'v-calendar/lib/components/date-picker.umd'

Vue.component('calendar', Calendar)
Vue.component('date-picker', DatePicker)

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data: {
        attrs: [
                {
                  key: 'today',
                  highlight: true,
                  dates: new Date(),
                },
              ],          

          range: null,
          modelConfig: {
            type: 'string',
            mask: 'YYYY-MM-DD',
          },
          date: new Date().toISOString().split('T')[0],
          fio: '',
          phone: '',
          diet: '',
          schedule: '',
          day1: false,
          day2: false,
          day3: false,
          day4: false,
          day5: false,
          day6: false,
          day7: false,
          comment: '',

          stored: false,
        },

    methods: {
        store: function () {
        var _this = this;
        axios.post('/store', {
            date: this.$root.date,
            range_start: this.$root.range.start,
            range_end: this.$root.range.end,
            fio: this.$root.fio,
            phone: this.$root.phone,
            diet: this.$root.diet,
            schedule: this.$root.schedule,
            day1: this.$root.day1,
            day2: this.$root.day2,
            day3: this.$root.day3,
            day4: this.$root.day4,
            day5: this.$root.day5,
            day6: this.$root.day6,
            day7: this.$root.day7,
            comment: this.$root.comment,
          })
          .then(function (response) {
            //console.log(response.data);
            if(response.data == 'Ok')
                _this.$root.stored = true
          })
          .catch(function (error) {
            console.log(error);
          });

          //console.log(this.$root);
        }
    },

    computed: {
        formattedDate: function () {
          var d = new Date();
          return d.getDate()  + "-" + (d.getMonth()+1) + "-" + d.getFullYear();
        }
    }            
});
