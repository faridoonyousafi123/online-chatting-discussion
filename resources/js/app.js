
require('./bootstrap');

window.Vue = require('vue');

Vue.component('message', require('./components/message.vue').default);
Vue.component('sent-message', require('./components/SentMessage.vue').default);



import Vue from 'vue'
import VueChatScroll from 'vue-chat-scroll'
Vue.use(VueChatScroll)


const app = new Vue({
    el: '#app',

    data:{

        message: '',
        chat:{
            message: [],
            user: [],
            classname: [],
            alignright: [],
            floatright: [],
            time: [],
          


        },

        typing: '',
        onlineUsers: []

       
    },
    watch: {
        message() {

            Echo.private('chat')
                .whisper('typing', {
                    name: this.message
            });
        }
    },

    methods: {

        send() {

            if(this.message.length != 0)

            this.chat.message.push(this.message);
            this.chat.user.push('Me');
           
            this.chat.classname.push('');
            this.chat.alignright.push('');
            this.chat.floatright.push('');
            this.chat.time.push(this.getTime());

            axios.post('/send', {
                
                message: this.message

              })
              .then(response => {
                
                console.log(response);
                this.message = '';
                
              })
              .catch(error => {
                console.log(error);
              });
        },

        getTime() {
            let time = new Date();
            return time.getHours()+':'+time.getMinutes();
        }
    },

    mounted() {
        
        Echo.private('chat')
            .listen('ChatEvents', (e) => {
                this.chat.message.push(e.message);
                this.chat.user.push(e.user);
                this.chat.classname.push('clearfix');
                this.chat.alignright.push('align-right');
                this.chat.floatright.push('float-right other-message');
                this.chat.time.push(this.getTime());
                
            }).listenForWhisper('typing', (e) => {

                if(e.name != ''){
                    
                    this.typing = 'typing ... '
                }
               
                else{
                    this.typing = ''
                }
            });

     Echo.join(`chat`)
    .here((users) => {
        this.onlineUsers = users
    })
    .joining((user) => {
        this.onlineUsers.push(user);
    })
    .leaving((user) => {
       let index = this.onlineUsers.findIndex(u => u.name == user.name);
       this.onlineUsers.splice(index, 1);
    });
    }

});

