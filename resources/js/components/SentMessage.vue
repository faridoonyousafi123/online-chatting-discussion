<template>
     <li :class="className" v-chat>
            <div class="message-data" :class="alignRight">
              <span class="message-data-name"><i class="fa fa-circle online"></i> {{ user }}</span>
              <span class="message-data-time" :time="times">{{ times }} , Today</span>
            </div>
            <div class="message my-message" :class="floatRight">
             <slot></slot>
            </div>
     </li>
</template>
S
<script>
export default {
    props: [
        'user',
        'classname',
        'alignright',
        'floatright',
        'time'
    
    ],

    computed: {
            className() {
                return this.classname;
            },
            alignRight() {
                return this.alignright;
            },
            floatRight() {
                return this.floatright;
            },
            times() {
                return this.time;
            }
            
        }
}
</script>
