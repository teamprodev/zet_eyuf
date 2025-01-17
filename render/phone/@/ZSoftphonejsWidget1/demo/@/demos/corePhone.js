var sipStack;
var registerSession;
var callSession = null;


var state = "null";//null, unregistered, registered, calling, incoming, incall

function createSipStack(){
    console.log("createSipStack 1");
    sipStack = new SIPml.Stack({
            realm: '94.158.52.244:7777',
            impi: '301',
            impu: 'sip:301@94.158.52.244:7777',
            password: '301',
            websocket_proxy_url: 'wss://zoft.uz:8089/ws',
            ice_servers: '[]',
            enable_rtcweb_breaker: true,
            events_listener: { events: '*', listener: onSipEventStack }, // optional: '*' means all events
            sip_headers: [ // optional
                    { name: 'User-Agent', value: 'IM-client/OMA1.0 sipML5-v1.0.0.0' },
                    { name: 'Organization', value: 'TODO' }
            ]
        }
    );
    console.log("createSipStack 2");
}

var readyCallback = function(e){
    createSipStack();
    console.info('sipml5 is ready');
};
var errorCallback = function(e){
    console.error('Failed to initialize the engine: ' + e.message);
}

/*
window.onload = function () {
    init finalState();
    state = "null";
    txtState.innerHTML = state;
    finalState("init");
    init SIPML5
    SIPml.init(readyCallback, errorCallback);//createSipStack
    //register
    register();

    if (localStorage['window_count'] < 0 || isNaN(localStorage['window_count'])){
        localStorage['window_count'] = 0;
    } else {
        localStorage['window_count'] = +localStorage['window_count'] + 1;
    }
    document.getElementById('window_count_label').innerHTML = localStorage['window_count'];
    console.log("onload " + localStorage['window_count']);
}
*/

window.onbeforeunload = function () {
    unregister();
    localStorage['window_count'] = +localStorage['window_count'] - 1;
    document.getElementById('window_count_label').innerHTML = localStorage['window_count'];
    console.log("onbeforeunload " + localStorage['window_count']);
};

// sends SIP REGISTER request to login
function register(){
    //from onload begin
    //init finalState
    state = "null";
    txtState.innerHTML = state;
    finalState("init");
    //init SIPML5
    SIPml.init(readyCallback, errorCallback);//createSipStack
    //from onload end
    
    console.log("register 1");
    sipStack.start(); //event 'started', register
    finalState("register");
    console.log("register 2");
}

// sends SIP REGISTER (expires=0) to logout
function unregister() {
    console.log("unregister 1");
    if (sipStack) {
        sipStack.stop(); // shutdown all sessions
    }
    finalState("unregister");
    console.log("unregister 2");
}

function onSipEventStack(e){
    console.log("onSipEventStack 1, type = " + e.type);
    switch (e.type) {
        case 'started':
        { //register
            registerSession = sipStack.newSession('register', {
                events_listener: { events: '*', listener: onSipEventSession } // optional: '*' means all events
            });
            registerSession.register();
            break;
        }
        case 'i_new_call': // incoming audio/video call
        {
            if (callSession) {
                // do not accept the incoming call if we're already 'in call'
                e.newSession.hangup(); // comment this line for multi-line support
            }
            else {
                callSession = e.newSession;
                // start listening for events
                callSession.setConfiguration({
                        audio_remote: document.getElementById('audio_remote'),
                        events_listener: { events: '*', listener: onSipEventSession } // optional: '*' means all events
                    });

                var sRemoteNumber = (callSession.getRemoteFriendlyName() || 'unknown');
                txtCallStatus.innerHTML = txtCallStatus.value = "Incoming call from " + sRemoteNumber;
                console.log("call = " + txtCallStatus.value);

                finalState("incoming");
            }
            break;
        }
        case 'stopping': case 'stopped': case 'failed_to_start': case 'failed_to_stop':
        {
            var bFailure = (e.type == 'failed_to_start') || (e.type == 'failed_to_stop');
            oSipStack = null;
            oSipSessionRegister = null;
            oSipSessionCall = null;

            finalState("unregister");

            txtCallStatus.innerHTML = txtCallStatus.value = "";
            console.log("call = " + txtCallStatus.value);
            txtRegStatus.innerHTML = txtRegStatus.value = bFailure ? "Disconnected: " + e.description + "" : "Disconnected";
            console.log("reg = " + txtRegStatus.value);
            break;
        }
        case 'starting': default: break;
    }
    console.log("onSipEventStack 2");
}

function onSipEventSession(e){
    console.log("onSipEventSession 1");
    console.info('session event = ' + e.type);
    switch (e.type)
    {
        case 'connecting': case 'connected':
        {
            var bConnected = (e.type === 'connected');
            if (e.session === registerSession) {
                txtRegStatus.innerHTML = txtRegStatus.value = e.description;
                console.log("reg = " + txtRegStatus.value);
            }
            else if (e.session === callSession) {
                if (bConnected) {
                    finalState("call_or_answer");
                }
                txtCallStatus.innerHTML = txtCallStatus.value = e.description;
                console.log("call = " + txtCallStatus.value);
            }
            break;
        } // 'connecting' | 'connected'
        case 'terminating': case 'terminated':
        {
            if (e.session == registerSession) {
                callSession = null;
                registerSession = null;

                txtRegStatus.innerHTML = txtRegStatus.value = e.description;
                console.log("reg = " + txtRegStatus.value);
            }
            else if (e.session == callSession) {
                txtCallStatus.innerHTML = txtCallStatus.value = e.description;
                console.log("call = " + txtCallStatus.value);
                callSession = null;
            }
            if (e.type === 'terminated'){
                finalState("hangup");
                txtCallStatus.innerHTML = txtCallStatus.value = e.description;
                console.log("call = " + txtCallStatus.value);
            }
            break;
        } // 'terminating' | 'terminated'
        case 'i_ao_request':
        {
            if(e.session == callSession){
                var iSipResponseCode = e.getSipResponseCode();
                if (iSipResponseCode == 180 || iSipResponseCode == 183) {
                    finalState('calling');
                    txtCallStatus.innerHTML = txtCallStatus.value = 'Remote ringing...';
                    console.log("call = " + txtCallStatus.value);
                }
            }
            break;
        }
    }
    console.log("onSipEventSession 2");
}

function eventsListener(e){
    console.info('session event = ' + e.type);
}

function call(){
    console.log("call 1" + " " + document.getElementById("phone_popup_number").value.toString());
    if (callSession === null) {
        console.log("new call");
        if (document.getElementById("phone_popup_number").value.toString() === ""){
            alert("введите номер");
            return;
        }
        callSession = sipStack.newSession('call-audio', {
                audio_remote: document.getElementById('audio_remote'),
                events_listener: { events: '*', listener: onSipEventSession } // optional: '*' means all events
            });
        callSession.call(document.getElementById("phone_popup_number").value.toString());
    }
    else {
        txtCallStatus.innerHTML = txtCallStatus.value = 'Connecting...';
        console.log("call = " + txtCallStatus.value);
        callSession.accept();
        finalState("incall");
    }
    console.log("call 2");
}

// terminates the call (SIP BYE or CANCEL)
function hangup() {
    if (callSession) {
        txtCallStatus.innerHTML = txtCallStatus.value = 'Terminating the call...';
        console.log("call = " + txtCallStatus.value);
        callSession.hangup({events_listener: { events: '*', listener: onSipEventSession }});
    }
}


function finalState(action){
    switch (state)
    {
        case "null":
        {
            if (action === "init"){
                btnCall.value = 'Call';
                btnHangUp.value = 'HangUp';
                btnCall.disabled = true;
                btnHangUp.disabled = true;
                btnRegister.disabled = false;
                btnUnRegister.disabled = true;
                state = "unregistered";
            }
            break;
        }
        case "unregistered":
        {
            if (action === "register") {
                btnCall.value = 'Call';
                btnHangUp.value = 'HangUp';
                btnCall.disabled = false;
                btnHangUp.disabled = true;
                state = "registered";
                btnRegister.disabled = true;
                btnUnRegister.disabled = false;
            }
            break;
        }
        case "registered":
        {
            if (action === "calling") {
                btnCall.value = 'Call';
                btnHangUp.value = 'HangUp';
                btnCall.disabled = true;
                btnHangUp.disabled = false;
                state = "calling";
                startRingbackTone();
            }
            if (action === "incoming") {
                btnCall.value = 'Answer';
                btnHangUp.value = 'Reject';
                btnCall.disabled = false;
                btnHangUp.disabled = false;
                state = "incoming";
                startRingTone();
            }
            break;
        }
        case "calling":
        {
            if (action === "call_or_answer") {
                btnCall.value = 'Call';
                btnHangUp.value = 'HangUp';
                btnCall.disabled = true;
                btnHangUp.disabled = false;
                state = "incall";
                stopRingbackTone();
            } else
            if (action === "hangup") {
                btnCall.value = 'Call';
                btnHangUp.value = 'HangUp';
                btnCall.disabled = false;
                btnHangUp.disabled = true;
                state = "registered";
                stopRingbackTone();
            }
            break;
        }
        case "incoming":
        {
            if (action === "call_or_answer") {
                btnCall.value = 'Call';
                btnHangUp.value = 'HangUp';
                btnCall.disabled = true;
                btnHangUp.disabled = false;
                state = "incall";
                stopRingTone();
            } else
            if (action === "hangup") {
                btnCall.value = 'Call';
                btnHangUp.value = 'HangUp';
                btnCall.disabled = false;
                btnHangUp.disabled = true;
                state = "registered";
                stopRingTone();
            }
            break;
        }
        case "incall":
        {
            if (action === "hangup") {
                btnCall.value = 'Call';
                btnHangUp.value = 'HangUp';
                btnCall.disabled = false;
                btnHangUp.disabled = true;
                state = "registered";
            }
            break;
        }
    }
    if (action === "unregister"){
        btnCall.value = 'Call';
        btnHangUp.value = 'HangUp';
        btnCall.disabled = true;
        btnHangUp.disabled = true;
        btnRegister.disabled = false;
        btnUnRegister.disabled = true;
        state = "unregistered";
        stopRingTone();
        stopRingbackTone();
    }
    txtState.innerHTML = state;
    console.log("state = " + state);
}

function startRingTone() {
    try { ringtone.play(); }
    catch (e) { }
}
function stopRingTone() {
    try { ringtone.pause(); }
    catch (e) { }
}
function startRingbackTone() {
    try { ringbacktone.play(); }
    catch (e) { }
}
function stopRingbackTone() {
    try { ringbacktone.pause(); }
    catch (e) { }
}
