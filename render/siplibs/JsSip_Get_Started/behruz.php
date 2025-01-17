<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Sip demo</title>
</head>

<body>
<head><title>WebRT</title>
    <style>
        video {
            height: 240px;
            width: 320px;
            border: 3px solid grey;
        }
    </style>
</head>
<main class="content">

    <div class="logIn "  style="display: none;">
        <label for="uri">Log In</label>
        <input type="text" id="uri">
        </br>
        <label for="secret">Password</label>
        <input type="text" id="secret">
        <button id="button_auth"> Log In</button>

        <h1 class="authUri" style="display: none;"></h1>
    </div>
    <div class="inputUsers">
        <label for="inputNumber">Number</label>
        <input type="text" id="inputNumber">

        <button class="callButton" value="call">Call</button>
        <button class="hangUpButton">HangUp</button>
        <button class="answerButton">Answer</button>
    </div>

    <video id="selfView" autoplay muted></video>
    <video id="remoteView" autoplay></video>

    <div class="messages">
        <label for="inputNumberMsg">Номер</label>
        <input type="text" id="inputNumberMsg">
        </br>
        <label for="inputTextMsg">Сообщение</label>
        <input type="text" id="inputTextMsg">
        </br>
        <button id="sendMsgButton">Отправить</button>

    </div>


</main>

</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jssip/3.1.2/jssip.min.js"> </script>
<!-- <script src="jssip-3.4.6.js"> </script> -->
<script>

    let   callButton    = document.querySelector('.callButton'), // Нахожу кнопку Call
        hangUpButton   = document.querySelector('.hangUpButton'),  // Нахожу кнопку Hangup
        answerButton   = document.querySelector('.answerButton'),  // Нахожу кнопку Answer
        inputNumber    = document.querySelector('#inputNumber');  // Нахожу инпут для звонкапо ID InputNumber
    logInDiv       = document.querySelector('.logIn');// Нахожу div авторизации
    loginUri       = document.querySelector('#uri');  // Нахожу инпут  URI по ID uri
    uriSecret      = document.querySelector('#secret');  // Нахожу инпут  Secret по ID secret
    buttonAuth     = document.querySelector('#button_auth');  // Нахожу кнопку button_auth  по ID для авторизации
    inputNumberMsg = document.querySelector('#inputNumberMsg');  // инпут для ввода номера получателя
    inputTextMsg     = document.querySelector('#inputTextMsg');  // инпут для ввода текста для получателя
    sendMsgButton     = document.querySelector('#sendMsgButton');  // кнопка для отправки сообщения

    var options = {
        'mediaConstraints' : { 'audio': true, 'video': true },
        'pcConfig': {
            'rtcpMuxPolicy': 'require',
            'iceServers': [
            ]
        },
        'rtcOfferConstraints': {
            'offerToReceiveAudio': 1, // Принимаем только аудио
            'offerToReceiveVideo': 1
        }
    };


    var socket = new JsSIP.WebSocketInterface('wss://10.10.3.41:8089/ws');


    //Create HTML Audio Object
    var remoteAudio = new window.Audio()
    remoteAudio.autoplay = true;

    const mediaSource = new MediaSource();

    var selfView = document.getElementById('selfView');
    var remoteView = document.getElementById('remoteView');

    var user = "${{USERNAME}}";
    var pass = "${{PASSWORD}}";

    var userAgent = JsSIP.version;
    console.log(socket);

    console.log('sip:%s@${{SERVER}}', user);

    var configuration = {
        'uri': 'sip:333@10.10.3.41:5060',
        'password': 333, // FILL PASSWORD HERE,
        'sockets': [ socket ],
        'register_expires': 180,
        'session_timers': false,
        'user_agent' : 'JsSip-' + userAgent
    };

    var phone;
    if(user && pass){
        JsSIP.debug.enable('JsSIP:*');
        phone = new JsSIP.UA(configuration);
        phone.on('registrationFailed', function(ev){
            alert('Registering on SIP server failed with error: ' + ev.cause);
            configuration.uri = null;
            configuration.password = null;
        });

        phone.on('newRTCSession',(data) => {
            var newSession = data.session;



            if(session){ // hangup any existing call
                session.terminate();
                phone.stop();
            }
            session = newSession;
            var completeSession = function(){
                session = null;
            };


            if(session.direction == 'outgoing'){
                console.log('stream outgoing  -------->');
                session.on('connecting', function() {
                    console.log('CONNECT');
                });
                session.on('peerconnection', function (event) {
                    console.log('1accepted');
                });
                session.on('ended', completeSession);
                session.on('failed', completeSession);
                session.on('accepted',function (event) {
                    console.log('accepted')
                });
                session.on('confirmed',function (event){
                    console.log('CONFIRM STREAM');
                });
            }else if (newSession.direction == 'incoming'){
                //Поднимаем трубку при нажатии на кнопку Answer
                answerButton.addEventListener('click', function(){
                    newSession.answer(options);
                    console.log(session.connection)
                    console.log(session.connection.stream)
                    add_stream()


                });
            }



            // if(session.direction === 'incoming'){
            //     console.log('stream incoming  -------->');
            // session.on('connecting', function() {
            //     console.log('CONNECT');
            //                 });
            // session.on('peerconnection', function (event) {
            //     console.log('1accepted');
            //     add_stream();
            //                 });
            // session.on('ended', completeSession);
            // session.on('failed', completeSession);
            // session.on('accepted',function (event) {
            //     console.log('accepted')
            //                 });
            // session.on('confirmed',function (event){
            //     console.log('CONFIRM STREAM');
            //                 });
            //                 var options = {
            // 'mediaConstraints' : { 'audio': true, 'video': true },
            // 'pcConfig': {
            //   'rtcpMuxPolicy': 'require',
            //   'iceServers': [
            //                                         ]
            //                                 },
            //                         };

            //     console.log('Incoming Call');
            //     session.answer(options);
            //    }
        });
        phone.start();
    }

    var session;



    callButton.addEventListener('click',function(){
        phone.call('sip:' + inputNumber.value + '@10.10.3.41:5060', options)
        add_stream();
    });



    function add_stream(){
        console.log(session);
        session.connection.addEventListener('addstream',function (event) {
            remoteAudio.srcObject = (e.stream);
            remoteView.srcObject = (e.stream);
            selfView.srcObject = (session.connection.getLocalStreams()[0]);
            remoteView.srcObject = (session.connection.getRemoteStreams()[0]);
        })
    }


    //сбрасываем звонок при нажатии на HangUP
    hangUpButton.addEventListener('click', function(){
        phone.terminateSessions()
    });

    // Отправка сообщений
    sendMsgButton.addEventListener('click', function(){
        console.log('Send MSG');
        console.log(phone.Message)
        phone.sendMessage('sip:' +  inputNumberMsg.value + '@10.10.3.41:5060', inputTextMsg.value);
        console.log(sendMessage)
    })

</script>

