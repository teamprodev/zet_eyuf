<?php

/**
 *
 *
 * Author:  Asror Zakirov
 * https://www.linkedin.com/in/asror-zakirov
 * https://github.com/asror-z
 *
 */

use zetsoft\dbitem\eyuf\SIPMLItem;
use zetsoft\widgets\notifier\ZJspanelWidgetWebphone1;

if(!isset($item)){
    $item = new SIPMLItem();
    $item->impu = '@10.10.3.60:5060';
    $item->impi = '301';
    $item->password = 301;
    $item->websocket_proxy_url = 'wss://10.10.3.60:8089/ws';
    $item->keypad = true;
    $item->video = true;
}

?>
<link rel="stylesheet" href="/render/phone/ZSipml5Widget/fayzullo/css/light.css">
<script src="https://jssip.net/download/releases/jssip-3.4.6.min.js"></script>
<style>
    .jsPanel-content::-webkit-scrollbar {
        display: none;
    }
</style>
<div class="container">
    <div class="row">
        <div class="number text-center border col-4 w-100">
            <div class="mb-2 mt-2 control_btn">
                <button id="callButton" class="btn btnCall callButton py-2" title="Call">
                    <i class="fa fa-phone fa-2x text-success"></i>
                </button>
                <button id="videoBtn" class="btn <?= $item->video ? '' : 'd-none'?> btnVideoCall py-2">
                    <i id="videoPanelBtn" class="fas success-ic fa-video fa-2x"></i>
                </button>
                <button class="btn btnHangUp hangUpButton hangupBtn py-2" id="btnHangUp" title="Hangup">
                    <i class="fas red-ic  fa-phone-slash fa-2x"></i>
                </button>
            </div>
            <div class="ml-4 mr-4">
                <div id="txtCallStatus" class="h-25"></div>
                <div id="txtRegStatus"></div>
                <h6 id="timer" class="d-none">00:00</h6>
                <div class=" md-form input-with-post-icon mt-lg-1">
                    <i class="fas fa-user fa-2x input-prefix text-center "></i>
                    <input type="text" id="txtPhoneNumber" class="form-control text-dark text-center fp-25">
                    <label for="txtPhoneNumber"></label>
                </div>
            </div>
            <div class="buuton-goup <?=$item->keypad ? '' : 'd-none' ?> mb-lg-4 mb-3">
                <a type="button" class="btn-floating pt-2 fp-20 number-btn" value="1">1</a>
                <a type="button" class="btn-floating pt-2 fp-20 number-btn" value="2">2</a>
                <a type="button" class="btn-floating pt-2 fp-20 number-btn" value="3">3</a>
                <br>
                <a type="button" class="btn-floating pt-2 fp-20 number-btn" value="4">4</a>
                <a type="button" class="btn-floating pt-2 fp-20 number-btn" value="5">5</a>
                <a type="button" class="btn-floating pt-2 fp-20 number-btn" value="6">6</a>
                <br>
                <a type="button" class="btn-floating pt-2 fp-20 number-btn" value="7">7</a>
                <a type="button" class="btn-floating pt-2 fp-20 number-btn" value="8">8</a>
                <a type="button" class="btn-floating pt-2 fp-20 number-btn" value="9">9</a>
                <br>
                <a type="button" class="btn-floating pt-2 fp-20 number-btn" value="+">+</a>
                <a type="button" class="btn-floating pt-2 fp-20 number-btn" value="0">0</a>
                <a type="button" class="btn-floating backspace-btn" value="c">
                    <i class="fas red-ic fa-backspace"></i></a>

            </div>
        </div>
        <?php
        ZJspanelWidgetWebphone1::begin([
            'grapesWrap' => false,
            'config' => [
                'id' => 'jspanel',
                'begin' => true,
                'height' => '320px',
                'width' => '480px',
                'my' => 'center',
                'at' => 'center',
                'autoposition' => 'top',
                'offsetX' => '60',
                'offsetY' => '-105',
                'shown' => $item->video,
                'headt' => ''
            ]
        ]);

        ?>
        <div class="w-100 position-relative">
            <video class="w-100" autoplay id="remoteView">
            </video>


            <video class="position-absolute" style="bottom: 10px; right: 10px; width: 25%; box-shadow: 0px 0px 17px 0px #f5f4f4;" autoplay id="selfView" muted></video>
        </div>


        <div id="divCallCtrl" class="p-0 m-0">
            <div id="tdVideo" class="tab-video">
                <div id="divVideo" class='div-video'>

                </div>
            </div>
            <div id='divCallOptions' class='call-options text-center'>
                <button class="btn px-3 py-2 " id="btnFullScreen" disabled onclick='toggleFullScreen();'><i class="fas fa-compress"></i></button>
                <button class="btn px-3 py-2 " id="btnMute" onclick='sipToggleMute();'><i class="fas fa-microphone-slash"></i></button>
                <button class="btn px-3 py-2 " id="btnHoldResume" onclick='sipToggleHoldResume();'><i class="fas fa-phone"></i></button>
                <button class="btn px-3 py-2 " id="btnTransfer" onclick='sipTransfer();'><i class="fas fa-random"></i></button>
                <button class="btn px-3 py-2 " id="btnLocalVid" onclick="localVidOn()"><i id="localVidIcon" class="fas fa-video"></i></button>
            </div>

        </div>

        <div id='divGlassPanel' class='glass-panel invisible'></div>

        <?php


        ZJspanelWidgetWebphone1::end();
        ?>
    </div>
</div>




<audio id="ringing" src="/render/phone/ZWebrtcPhoneWidget/demo/sounds/ringing.mp3" loop></audio>
<audio id="calling" src="/render/phone/ZWebrtcPhoneWidget/demo/sounds/calling.mp3" loop></audio>

<script>
    /*TODO:start Sherzod Mangliyev  */
    var timer = document.getElementById("timer");
    var time = "00:00"
    var seconds = 0;
    var minutes = 0;
    var t;

    timer.textContent = time;

    function buildTimer () {
        seconds++;
        if (seconds >= 60) {
            seconds = 0;
            minutes++;
            if (minutes >= 60) {
                minutes = 0;
                seconds = 0;
            }
        }
        timer.textContent = (minutes < 10 ? "0" + minutes.toString(): minutes) + ":" + (seconds < 10 ? "0" + seconds.toString(): seconds);
    }
    function startTimer () {

        clearTimeout(t);
        t = setInterval(buildTimer,1000);
    }
    function resetTimer () {

        timer.textContent = time;
        seconds = 0; minutes = 0;
    }
    function stopTimer () {
        clearTimeout(t);

    }
    /*TODO:end Sherzod Mangliyev  */

    let callButton = document.querySelector('#callButton'), // Нахожу кнопку Call
        hangUpButton = document.querySelector('.hangUpButton'),  // Нахожу кнопку Hangup
        videoCallBtn = document.querySelector('.btnVideoCall'),
        txtPhoneNumber = document.querySelector('#txtPhoneNumber');
    txtRegStatus = document.getElementById('txtRegStatus');
    calling = document.getElementById('calling');
    ringing = document.getElementById('ringing');
    var selfView = $('#selfView');
    var remoteView = $("#remoteView");

    var videoCall = <?= json_encode($item->video)?>;
    videoCallBtn.addEventListener('click', function () {
        document.getElementById("videoPanelBtn").classList.toggle("fa-video-slash");
        if (videoCall){
            $("#jspanel").hide();
            videoCall = false;
        } else if (!videoCall){
            $("#jspanel").show();
            videoCall = true;
        }
    })
    function disableBtn(keyBtn){
        keyBtn.disabled = true;
    }

    function enableBtn(keyBtn){
        keyBtn.disabled = false;
    }

    function localVidOn() {
        document.getElementById("selfView").classList.toggle("d-none");
        document.getElementById("localVidIcon").classList.toggle("fa-video-slash");
    };

    $('.number-btn').on("click", function() {
        var numberBtnVal = $(this).html();
        dis(numberBtnVal);
        enableBtn(callButton);

    })

    $('.backspace-btn').on("click", function() {
        clr();
    })

    function dis(val) {
        console.log('clicked');
        document.getElementById("txtPhoneNumber").value += val
    }

    checkIfEmpty()
    function clr() {
        document.getElementById("txtPhoneNumber").value = "";
        disableBtn(callButton);
    }

    document.getElementById('txtPhoneNumber').onkeyup = function () {
        checkIfEmpty()
    }

    window.onmouseup = function () {
        checkIfEmpty()
    }

    function checkIfEmpty() {
        if (document.getElementById('txtPhoneNumber').value.length == 0){
            callButton.disabled = true;
        } else  {
            callButton.disabled = false;
        }
    }


    var audioOptions = {
        'mediaConstraints': {'audio': true, 'video': false},
       // 'mediaStream' : {'audio': true, 'video': true},
      //  'anonymous' : true,
        'pcConfig': {
            'rtcpMuxPolicy': 'require',
            'iceServers': []
        },
        'rtcOfferConstraints': {     //_rtcOfferConstraints
            'offerToReceiveAudio': 1, // Принимаем только аудио
            'offerToReceiveVideo': 0
        }
    };

    var videoOptions = {
        'mediaConstraints': {'audio': true, 'video': true},
        // 'mediaStream' : {'audio': true, 'video': true},
        //  'anonymous' : true,
        'pcConfig': {
            'rtcpMuxPolicy': 'require',
            'iceServers': []
        },
        'rtcOfferConstraints': {     //_rtcOfferConstraints
            'offerToReceiveAudio': 1, // Принимаем только аудио
            'offerToReceiveVideo': 1
        }
    };

    var socket = new JsSIP.WebSocketInterface('<?=$item->websocket_proxy_url?>');

    //Create HTML Audio Object
    var remoteAudio = new window.Audio()
    remoteAudio.autoplay = true;

    const mediaSource = new MediaSource();

    var userAgent = JsSIP.version;
    console.log(socket);

    var configuration = {
        'uri': 'sip:<?= $item->impi . $item->impu?>',
        'password': <?=$item->password?>, // FILL PASSWORD HERE,
        'sockets': [socket],
        'register_expires': 5,
        'session_timers': false,
        'user_agent': 'JsSip-' + userAgent
    };

    var user = configuration.uri;
    var pass = configuration.password;
    var phone;
    if (user && pass) {
        /*JsSIP.debug.enable('JsSIP:*');*/
        JsSIP.debug.disable('JsSIP:*');
        phone = new JsSIP.UA(configuration);
        phone.on('registrationFailed', function (ev) {
            alert('Registering on SIP server failed with error: ' + ev.cause);
            configuration.uri = null;
            configuration.password = null;
        });

        phone.on('newRTCSession', (data) => {
            var newSession = data.session;


            if (session) { // hangup any existing call
                console.log('hangup any existing call ');
                session.terminate();
                phone.stop();
            }
            session = newSession;
            var completeSession = function () {

                console.log('completeSession');
                console.log('terminated');
                txtRegStatus.innerHTML = 'Call ended';
                stopTimer();
                setTimeout(function(){ txtRegStatus.innerHTML = 'Connected'; timer.classList.add('d-none'); resetTimer();}, 2000);
                checkIfEmpty();

                /*enableBtn(answerButton);*/
                calling.pause();
                ringing.pause();
                session = null;
            };
            let ringPlay = $('#ringing'); //рингтоне
            let ringCall = $('#calling'); //гудки

            var playingRingtone = function () {
                console.log('playingRingtone');

                ringCall.pause();
                ringPlay.play();
            }
            var playingCalling = function () {
                console.log('playingCalling');
                ringPlay.pause();
                ringCall.play();
            }
            var playingPause = function () {
                console.log('playingPause');
                ringCall.pause();
                ringPlay.pause();
            }

            function cnslg(key) {
                console.log(key);
            }


            if (session.direction == 'outgoing') {
                console.log('stream outgoing  -------->');
                txtRegStatus.innerHTML = 'Outgoing call';
                disableBtn(callButton);

                session.on('connecting', function (e) {
                    console.log('CONNECT');
                });
                session.on('peerconnection', function (e) {
                    console.log('1accepted');
                    timer.classList.remove('d-none');
                    resetTimer();
                    startTimer();
                    calling.pause();
                    ringing.pause()
                });
                session.on('sending', function (e) {
                    console.log('sending');
                });
                session.on('progress', function (e) {
                    //ringtone('ringing');
                    calling.play();
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
                    console.log('accepted');
                    txtRegStatus.innerHTML = 'In call';
                    timer.classList.remove('d-none');
                    resetTimer();
                    startTimer();
                    ringing.pause()
                    calling.pause();
                });
                session.on('confirmed', function (e) {
                    console.log('CONFIRM STREAM');
                });
            }
            else if (session.direction == 'incoming') {
                console.log('stream incoming  -------->');
                txtRegStatus.innerHTML = 'Incoming Call';
                enableBtn(callButton);
                session.on('connecting', function () {
                    console.log('CONNECT');
                });
                session.on('peerconnection', function (e) {
                    console.log('1accepted');
                    txtRegStatus.innerHTML = 'In Call';
                    calling.pause();
                    ringing.pause();
                });
                session.on('sending', function (e) {
                    console.log('sending');
                });
                session.on('progress', function (e) {
                    console.log('progress');
                    ringing.play();
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
                    console.log('accepted');
                    timer.classList.remove('d-none');
                    resetTimer();
                    startTimer();
                    ringing.pause();
                    calling.pause();

                });
                session.on('confirmed', function (e) {
                    console.log('CONFIRM STREAM');
                });


            }
        });
        phone.on('connecting', (data)=> {
            // let session = data.session;

            console.log('connecting');
            txtRegStatus.innerHTML = 'Connecting';
        });
        phone.on('connected', (data)=> {
            //let session = data.session;

            console.log('connected');
            txtRegStatus.innerHTML = 'Connected';
        });
        phone.on('disconnected', (data)=> {
            //let session = data.session;

            console.log('disconnected');
            txtRegStatus.innerHTML = 'Disconnected';

        });
        phone.on('registered', (data)=> {
            //let session = data.session;

            console.log('registered')
        });
        phone.on('unregistered', (data)=> {
            // let session = data.session;

            console.log('unregistered')
        });
        phone.on('registrationFailed', (data)=> {
            // let session = data.session;

            console.log('registrationFailed');
            txtRegStatus.innerHTML = 'Registration failed';
        });
        phone.on('registrationExpiring', function () {
            console.log('registrationExpiring')
            phone.register();
            console.log('phoneregister');
        } );
        phone.on('newMessage', (data)=> {
            // let session = data.session;

            console.log('newMessage')
        });
        phone.start();
    }

    var session;


    callButton.addEventListener('click', function () {
        if (session == undefined){
            if (videoCall){
                phone.call('sip:' + txtPhoneNumber.value + '<?=$item->impu?>', videoOptions)
                add_stream_video();
            } else if(!videoCall){
                phone.call('sip:' + txtPhoneNumber.value + '<?=$item->impu?>', audioOptions)
                add_stream_audio();
            }
        }
        else if (session.direction == "incoming") {
            if (videoCall){
                session.answer(videoOptions);

                add_stream_video();
            } else if(!videoCall){
                session.answer(audioOptions);
                add_stream_audio();
            }
        }

    });


    function add_stream_video() {
        console.log(session);
        var selfView = $('#selfView')[0];
        var remoteView = $("#remoteView")[0];
        
        session.connection.addEventListener('addstream', function (e) {
            remoteAudio.srcObject = (e.stream);
            remoteView.srcObject = (e.stream);
            selfView.srcObject = (session.connection.getLocalStreams()[0]);
            remoteView.srcObject = (session.connection.getRemoteStreams()[0]);

        })
    }

    function add_stream_audio() {
        console.log(session);

        session.connection.addEventListener('addstream', function (e) {
            remoteAudio.srcObject = (e.stream);
            
        })
    }


    //сбрасываем звонок при нажатии на HangUP
    hangUpButton.addEventListener('click', function () {
        phone.terminateSessions();
        ringing.pause();
        calling.pause();
    });
    
</script>
