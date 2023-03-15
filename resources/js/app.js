
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

const { default: axios } = require('axios');

require('./bootstrap');

var username = document.getElementById("username");
var message = document.getElementById('message');
var submit = document.getElementById('submit');

submit.addEventListener("click", function(){
    if(message.value != '' && username.value != '') {
      window.localStorage.setItem('username',username.value);
        const options = {
            method: 'post',
            url: '/send_message',
            data:{
                username: username.value,
                message: message.value
            }
        }

        axios(options)

       
    } else {
        alert('PLease enter all the details.');
    }
  });
  window.Echo.channel('chat')
  .listen('.message', (e)=>{
      console.log('logs',e);
      document.getElementById("username").value = '';
      document.getElementById("message").value = '';
      let chat_body = document.getElementById('chat-body');
      chat_body.innerHTML += `<div class="message-content sender">
      <label for="">${e.date}</label>
      <div class="msg-block">
        <h5 class="mb-2">${e.username}</h5>
        <p>
          ${e.message}
        </p>
      </div>
    </div>`;

    $("#chat-body").scrollTop($("#chat-body")[0].scrollHeight);
  })
// window.Vue = require('vue');

// /**
//  * The following block of code may be used to automatically register your
//  * Vue components. It will recursively scan this directory for the Vue
//  * components and automatically register them with their "basename".
//  *
//  * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
//  */

// // const files = require.context('./', true, /\.vue$/i);
// // files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

// /**
//  * Next, we will create a fresh Vue application instance and attach it to
//  * the page. Then, you may begin adding components to this application
//  * or customize the JavaScript scaffolding to fit your unique needs.
//  */

// const app = new Vue({
//     el: '#app'
// });
