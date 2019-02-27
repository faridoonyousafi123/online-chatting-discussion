<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Online Chatting</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <div class="row my-5" id="app">
        
            <div class="col-md-8 offset-md-2">
            <li class="list-group-item active">Chat Room </li>
            <ul class="list-group" v-chat-scroll>
                
                <message v-for="value,index in chat.message" 
                :user = chat.user[index]
                :key = value.index
                :color = chat.color[index]
                >
                    {{value.message}}
                </message>
               

               
                <!-- <i class="fas fa-comment chat-icon"></i> -->
            </ul>
            <input type="text" placeholder="Type your message here..." v-model="message" class="form-control no-shadow my-2" @keyup.enter="send()">
            </div>

        </div>
    </div>
    

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>