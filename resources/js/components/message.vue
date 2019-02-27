<template>
    
    <div>
       
        <!-- <img src="https://www.associationofbusinessmentors.org/wp-content/uploads/daryl-headshots-0047.jpg" alt="" height="30px" width="30px" style="border-radius:50%; margin-left:10px; margin-top:20px">  -->
         <!-- <small> {{ user }} </small> -->
        <li class="list-group-item list-group-item-success message mb-10" :class="className" > <slot></slot> </li>
       
    </div>
    
    
</template>

<script>
    export default {
        
        props:[
            'color',
            'user'
        ],
        computed: {
            className() {
                return 'list-group-item-' +this.color;
            },
            badgeClass() {
                return 'badge-'+this.color;
            }
        }
    }
</script>
