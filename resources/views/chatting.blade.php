<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Chat Widget</title>
   <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="{{ asset('css/style.css') }}">

  
</head>

<body>

    <div class="container clearfix"  id="app">
    <div class="people-list" id="people-list">
      <div class="search">
        <input type="text" placeholder="search" />
        <i class="fa fa-search"></i>
      </div>
      <ul class="list">

        <li class="clearfix" v-for="user,index in onlineUsers">
          <img class="image" :src="user.avatar" alt="avatar" />
          <div class="about">
            <div class="name">@{{ user.name }}  </div>
            <div class="status">
              <i class="fa fa-circle online"></i> online
            </div>
          </div>
        </li>

      </ul>
    </div>
    
    <div class="chat">
      <div class="chat-header clearfix">
        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/chat_avatar_01_green.jpg" alt="avatar" />
        
        <div class="chat-about">
          <div class="chat-with">Vincent Porter</div>
        
          <div class="chat-num-messages">Keep trying!</div>
        </div>
        <i class="fa fa-star"></i>
      </div> <!-- end chat-header -->
      
      <div class="chat-history" class="list-group" v-chat-scroll>
        <ul >
          
          <sent-message v-for="value,index in chat.message"
          :user = chat.user[index]
          :key = value.index
          :classname = chat.classname[index]
          :alignright = chat.alignright[index]
          :floatright = chat.floatright[index]
          :time = chat.time[index]
          >
          @{{ value }}
          </sent-message>

          <div class="typing mt-5 float-right" v-if="typing">
            <span class="circle bouncing"></span>
            <span class="circle bouncing"></span>
            <span class="circle bouncing"></span>
          </div>

          

        </ul>
        
      </div> <!-- end chat-history -->
      
      <div class="chat-message clearfix">
        <textarea name="message-to-send" @keyup.enter="send()" id="message-to-send" v-model="message" placeholder ="Type your message" rows="3"></textarea>
                
        <i class="fa fa-file-o"></i> &nbsp;&nbsp;&nbsp;
        <i class="fa fa-file-image-o"></i>
        
        <button>Send</button>

      </div> <!-- end chat-message -->
      
    </div> <!-- end chat -->
    
  </div> <!-- end container -->

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/handlebars.js/3.0.0/handlebars.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/list.js/1.1.1/list.min.js'></script>

  

    <script  src="{{ asset('js/index.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>



</body>

</html>
