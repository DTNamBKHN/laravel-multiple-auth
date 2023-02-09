import "core-js/fn/object/assign";
import Vue from 'vue';

import Test from '../components/Test.vue';

var app = new Vue({
  el: '#app',
  render: h => h(Test)
});