
    <style>
        video {
            height: 240px;
            width: 320px;
            border: 3px solid grey;
        }
    </style>
<main class="content">

    <div class="logIn " style="display: none;">
        <label for="uri">Log In</label>
        <input id="uri" type="text">
        </br>
        <label for="secret">Password</label>
        <input id="secret" type="text">
        <button id="button_auth"> Log In</button>

        <h1 class="authUri" style="display: none;"></h1>
    </div>
    <div class="inputUsers">
        <label for="inputNumber">Number</label>
        <input id="inputNumber" type="text">

        <button class="callButton" value="call">Call</button>
        <button class="hangUpButton">HangUp</button>
        <button class="answerButton">Answer</button>
    </div>

    <video autoplay id="selfView" muted></video>
    <video autoplay id="remoteView"></video>

    <div class="messages">
        <label for="inputNumberMsg">Номер</label>
        <input id="inputNumberMsg" type="text">
        </br>
        <label for="inputTextMsg">Сообщение</label>
        <input id="inputTextMsg" type="text">
        </br>
        <button id="sendMsgButton">Отправить</button>

    </div>


</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jssip/3.1.2/jssip.min.js"></script>
<!-- <script src="jssip-3.4.6.js"> </script> -->
<script>

    let callButton = document.querySelector('.callButton'), // Нахожу кнопку Call
        hangUpButton = document.querySelector('.hangUpButton'),  // Нахожу кнопку Hangup
        answerButton = document.querySelector('.answerButton'),  // Нахожу кнопку Answer
        inputNumber = document.querySelector('#inputNumber'),  // Нахожу инпут для звонкапо ID InputNumber
        logInDiv = document.querySelector('.logIn'),// Нахожу div авторизации
        loginUri = document.querySelector('#uri'),  // Нахожу инпут  URI по ID uri
        uriSecret = document.querySelector('#secret'),  // Нахожу инпут  Secret по ID secret
        buttonAuth = document.querySelector('#button_auth'),  // Нахожу кнопку button_auth  по ID для авторизации
        inputNumberMsg = document.querySelector('#inputNumberMsg'),  // инпут для ввода номера получателя
        inputTextMsg = document.querySelector('#inputTextMsg'),  // инпут для ввода текста для получателя
        sendMsgButton = document.querySelector('#sendMsgButton');  // кнопка для отправки сообщения

    var options = {
        'mediaConstraints': {'audio': true, 'video': true},
        'pcConfig': {
            'rtcpMuxPolicy': 'require',
            'iceServers': []
        },
        'rtcOfferConstraints': {
            'offerToReceiveAudio': 1, // Принимаем только аудио
            'offerToReceiveVideo': 1
        }
    };


    var socket = new JsSIP.WebSocketInterface('wss://zoft.uz:8089/ws');


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
        'uri': 'sip:301@10.10.3.31',
        'password': 301, // FILL PASSWORD HERE,
        'sockets': [socket],
        'register_expires': 180,
        'session_timers': false,
        'user_agent': 'JsSip-' + userAgent
    };

    var phone;
    if (user && pass) {
        /*JsSIP.debug.enable('JsSIP:*');*/
        phone = new JsSIP.UA(configuration);
        phone.on('registrationFailed', function (ev) {
            alert('Registering on SIP server failed with error: ' + ev.cause);
            configuration.uri = null;
            configuration.password = null;
        });

        phone.on('newRTCSession', (data) => {
            var newSession = data.session;


            if (session) { // hangup any existing call
                session.terminate();
                phone.stop();
            }
            session = newSession;
            var completeSession = function () {
                session = null;
            };


            if (session.direction == 'outgoing') {
                console.log('stream outgoing  -------->');
                session.on('connecting', function (e) {
                    console.log('CONNECT');
                });
                session.on('peerconnection', function (e) {
                    console.log('1accepted');
                });
                session.on('sending', function (e) {
                    console.log('sending');
                });
                session.on('progress', function (e) {
                    console.log('progress');
                });
                session.on('newDTMF', function (e) {
                    console.log('newDTMF');
                });
                session.on('newInfo', function (e) {
                    console.log('newInfo');
                });
                session.on('hold', function (e) {
                    console.log('hold');
                });
                session.on('unhold', function (e) {
                    console.log('unhold');
                });
                session.on('muted', function (e) {
                    console.log('muted');
                });
                session.on('unmuted', function (e) {
                    console.log('unmuted');
                });
                session.on('reinvite', function (e) {
                //Протестить эту вещь очень важно
                    console.log('reinvite');
                });
                session.on('update', function (e) {
                //Протестить эту вещь тоже очень  важно
                    console.log('update');
                });
                session.on('refer', function (e) {
                    //Протестить эту вещь тоже очень  важно
                    console.log('refer');
                });
                session.on('replaces', function (e) {
                    //Протестить эту вещь тоже очень  важно
                    console.log('replaces');
                });
                session.on('sdp', function (e) {
                    //Протестить эту вещь тоже очень  важно
                    console.log('sdp');
                });

                session.on('ended', completeSession);
                session.on('failed', completeSession);
                session.on('accepted', function (e) {
                    console.log('accepted')
                });
                session.on('confirmed', function (e) {
                    console.log('CONFIRM STREAM');
                });
            }
            else if (newSession.direction == 'incoming') {
                console.log('stream incoming  -------->');
                session.on('connecting', function () {
                    console.log('CONNECT');
                });
                session.on('peerconnection', function (e) {
                    console.log('1accepted');
                });
                session.on('sending', function (e) {
                    console.log('sending');
                });
                session.on('progress', function (e) {
                    console.log('progress');
                });
                session.on('newDTMF', function (e) {
                    console.log('newDTMF');
                });
                session.on('newInfo', function (e) {
                    console.log('newInfo');
                });
                session.on('hold', function (e) {
                    console.log('hold');
                });
                session.on('unhold', function (e) {
                    console.log('unhold');
                });
                session.on('muted', function (e) {
                    console.log('muted');
                });
                session.on('unmuted', function (e) {
                    console.log('unmuted');
                });
                session.on('reinvite', function (e) {
                    //Протестить эту вещь очень важно
                    console.log('reinvite');
                });
                session.on('update', function (e) {
                    //Протестить эту вещь тоже очень  важно
                    console.log('update');
                });
                session.on('refer', function (e) {
                    //Протестить эту вещь тоже очень  важно
                    console.log('refer');
                });
                session.on('replaces', function (e) {
                    //Протестить эту вещь тоже очень  важно
                    console.log('replaces');
                });
                session.on('sdp', function (e) {
                    //Протестить эту вещь тоже очень  важно
                    console.log('sdp');
                });

                session.on('ended', completeSession);
                session.on('failed', completeSession);
                session.on('accepted', function (e) {
                    console.log('accepted')
                });
                session.on('confirmed', function (e) {
                    console.log('CONFIRM STREAM');
                });

                //Поднимаем трубку при нажатии на кнопку Answer 
                answerButton.addEventListener('click', function () {
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
        phone.on('connecting', (data)=> {
            let session = data.session;

            console.log('connecting')
        });
        phone.on('connected', (data)=> {
            let session = data.session;

            console.log('connected')
        });
        phone.on('disconnected', (data)=> {
            let session = data.session;

            console.log('disconnected')
        });
        phone.on('registered', (data)=> {
            let session = data.session;

            console.log('registered')
        });
        phone.on('unregistered', (data)=> {
            let session = data.session;

            console.log('unregistered')
        });
        phone.on('registrationFailed', (data)=> {
            let session = data.session;

            console.log('registrationFailed')
        });
        phone.on('registrationExpiring', (data)=> {
            let session = data.session;

            console.log('registrationExpiring')
        });
        phone.on('newMessage', (data)=> {
            let session = data.session;

            console.log('newMessage')
        });
        phone.start();
    }

    var session;


    callButton.addEventListener('click', function () {
        phone.call('sip:' + inputNumber.value + '@94.158.52.244:7777', options)
        add_stream();
    });


    function add_stream() {
        console.log(session);
        session.connection.addEventListener('addstream', function (e) {
            remoteAudio.srcObject = (e.stream);
            remoteView.srcObject = (e.stream);
            selfView.srcObject = (session.connection.getLocalStreams()[0]);
            remoteView.srcObject = (session.connection.getRemoteStreams()[0]);
        })
    }


    //сбрасываем звонок при нажатии на HangUP
    hangUpButton.addEventListener('click', function () {
        phone.terminateSessions()
    });

    // Отправка сообщений
    sendMsgButton.addEventListener('click', function () {
        console.log('Send MSG');
        console.log(phone.Message)
        phone.sendMessage('sip:' + inputNumberMsg.value + '@10.10.3.31', inputTextMsg.value);


    })

</script>

