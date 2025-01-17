<?php

/**
 *
 *
 * Author:  Zoirjon Sobirov
 * https://t.me/zoirjon_sobirov
 *
 */

namespace zetsoft\service\freePBX;

use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverExpectedCondition;
use zetsoft\system\kernels\ZFrame;

class PBXwebdriver2 extends ZFrame
{
    public $headless = false;


    public $driver;

    public function config() {
        $desiredCapabilities = DesiredCapabilities::chrome();

        if ($this->headless) {
            $options = new ChromeOptions();
            $options->addArguments(['headless']);
            $desiredCapabilities->setCapability(\Facebook\WebDriver\Chrome\ChromeOptions::CAPABILITY, $options);
        }

        $this->driver = RemoteWebDriver::create('http://localhost:9515', $desiredCapabilities);
    }

    public function autoLogin(){
        $login = 'admin';
        $password = 'Production';
        $url = 'http://10.10.3.60/admin/config.php';
        $ismetVar = "ismet";
        

        $this->driver->get($url);
        echo "The title is '" . $this->driver->getTitle() . "'\n";

        echo "The current URI is '" . $this->driver->getCurrentURL() . "'\n";
        $this->driver->findElement(WebDriverBy::id('login_admin'))->click();

        echo "The title is '" . $this->driver->getTitle() . "'\n";

        echo "The current URI is '" . $this->driver->getCurrentURL() . "'\n";
        $this->driver->executeScript("
        var usernameInput = document.querySelector('#ui-id-1 #loginform .form-group input[name=username]').value='admin';
        console.log(usernameInput);
        ");


        $this->driver->executeScript("
        var passInput = document.querySelector('#ui-id-1 #loginform .form-group input[name=password]').value='Production';  
        console.log(passInput);
        var ismet = $('button:contains(is)').text('Continue');
        /*var varIsmet =document.querySelectorAll('.ui-dialog-buttonset .ui-button.ui-corner-all.ui-widget');
            varIsmet[0].click();*/
            
            console.log(arguments[0]);
        ",
        [
            $ismetVar
        ]);
        


        $this->driver->wait()->until(
            WebDriverExpectedCondition::titleContains('FreePBX Administration')
        );
        echo "The title is '" . $this->driver->getTitle() . "'\n";

        echo "The current URI is '" . $this->driver->getCurrentURL() . "'\n";
         $this->createExtension();

    }

    public function createExtension() {
        $mainPages = $this->driver->findElement(WebDriverBy::id('mainpages'));

        //vd($mainPages);


            $EXTEN = '';
            $url = 'http://10.10.3.60/admin/config.php?display=extensions';
            $params = array(
                "action" => "add",
                "extdisplay" => "",
                "tech" => "sip",
                "hardware" => "generic",
                "extension" => "888",
                "name" => "888",
                "outboundcid" => "",
                "emergency_cid" => "",
                "devinfo_secret" => "888",
                "langcode" => "",
                "userman_directory" => "1",
                "userman_assign" => "add",
                "userman_password" => "",
                "userman_group[]" => "1",
                "vm" => "disabled",
                "vmx_option_0_number" => "",
                "vmx_option_0_system_default" => "checked",
                "fmfm_ddial" => "disabled",
                "fmfm_calendar_enable" => "0",
                "fmfm_pre_ring" => "7",
                "fmfm_strategy" => "ringallv2-prim",
                "fmfm_grptime" => "20",
                "fmfm_grplist" => "",
                "fmfm_annmsg_id" => "",
                "fmfm_ringing" => "Ring",
                "fmfm_grppre" => "",
                "fmfm_dring" => "",
                "fmfm_rvolume" => "",
                "fmfm_needsconf" => "disabled",
                "fmfm_changecid" => "default",
                "gotofmfm" => "Follow_Me",
                "Announcementsfmfm" => "popover",
                "Call_Flow_Controlfmfm" => "popover",
                "Call_Recordingfmfm" => "popover",
                "Callbackfmfm" => "popover",
                "Conference_Profmfm" => "popover",
                "Conferencesfmfm" => "popover",
                "Custom_Applicationsfmfm" => "popover",
                "DISAfmfm" => "popover",
                "Directoryfmfm" => "popover",
                "Extensionsfmfm" => "from-did-direct,111,1",
                "Fax_Recipientfmfm" => "ext-fax,1,1",
                "Feature_Code_Adminfmfm" => "ext-featurecodes,*30,1",
                "Follow_Mefmfm" => "ext-local,,dest",
                "IVRfmfm" => "popover",
                "Inbound_Routesfmfm" => "from-trunk,,1",
                "Languagesfmfm" => "popover",
                "Misc_Destinationsfmfm" => "popover",
                "Paging_and_Intercomfmfm" => "popover",
                "Phonebook_Directoryfmfm" => "app-pbdirectory,pbdirectory,1",
                "Queue_Prioritiesfmfm" => "popover",
                "Queuesfmfm" => "ext-queues,757,1",
                "Queues_Profmfm" => "popover",
                "Ring_Groupsfmfm" => "popover",
                "Sipstationfmfm" => "sipstation-welcome,${EXTEN},1",
                "Terminate_Callfmfm" => "app-blackhole,hangup,1",
                "Text_To_Speechfmfm" => "popover",
                "Time_Conditionsfmfm" => "popover",
                "Trunksfmfm" => "ext-trunk,1,1",
                "Voicemailfmfm" => "ext-local,vmb315,1",
                "Voicemail_Blastingfmfm" => "popover",
                "fmfm_goto" => "gotofmfm",
                "newdid_name" => "",
                "newdid" => "",
                "newdidcid" => "",
                "devinfo_dtmfmode" => "rfc2833",
                "devinfo_canreinvite" => "no",
                "devinfo_context" => "from-internal",
                "devinfo_host" => "dynamic",
                "devinfo_defaultuser" => "",
                "devinfo_trustrpid" => "yes",
                "devinfo_user_eq_phone" => "no",
                "devinfo_sendrpid" => "pai",
                "devinfo_type" => "friend",
                "devinfo_sessiontimers" => "accept",
                "devinfo_nat" => "yes",
                "devinfo_port" => "5060",
                "devinfo_qualify" => "yes",
                "devinfo_qualifyfreq" => "60",
                "devinfo_transport" => "wss,udp,tcp,tls",
                "devinfo_avpf" => "yes",
                "devinfo_force_avp" => "yes",
                "devinfo_icesupport" => "yes",
                "devinfo_rtcp_mux" => "yes",
                "devinfo_encryption" => "yes",
                "devinfo_videosupport" => "yes",
                "devinfo_namedcallgroup" => "",
                "devinfo_namedpickupgroup" => "",
                "devinfo_disallow" => "",
                "devinfo_allow" => "",
                "devinfo_dial" => "",
                "devinfo_accountcode" => "",
                "devinfo_mailbox" => "",
                "devinfo_vmexten" => "",
                "devinfo_deny" => "0.0.0.0/0.0.0.0",
                "devinfo_permit" => "0.0.0.0/0.0.0.0",
                "cid_masquerade" => "",
                "sipname" => "",
                "ringtimer" => "0",
                "rvolume" => "",
                "cfringtimer" => "0",
                "concurrency_limit" => "3",
                "callwaiting" => "enabled",
                "cwtone" => "enabled",
                "call_screen" => "0",
                "answermode" => "disabled",
                "intercom" => "enabled",
                "qnostate" => "usestate",
                "recording_in_external" => "recording_in_external=>force",
                "recording_out_external" => "recording_out_external=>force",
                "recording_in_internal" => "recording_in_internal=>force",
                "recording_out_internal" => "recording_out_internal=>force",
                "recording_ondemand" => "recording_ondemand=>enabled",
                "recording_priority" => "10",
                "dictenabled" => "disabled",
                "dictformat" => "ogg",
                "dictemail" => "",
                "dictfrom" => "dictate@freepbx.org",
                "in_default_directory" => "0",
                "dtls_enable" => "no",
                "dtls_certificate" => "2",
                "dtls_verify" => "fingerprint",
                "dtls_setup" => "actpass",
                "dtls_rekey" => "0",
                "goto0" => "",
                "Announcements0" => "popover",
                "Call_Flow_Control0" => "popover",
                "Call_Recording0" => "popover",
                "Callback0" => "popover",
                "Conference_Pro0" => "popover",
                "Conferences0" => "popover",
                "Custom_Applications0" => "popover",
                "DISA0" => "popover",
                "Directory0" => "popover",
                "Extensions0" => "from-did-direct,111,1",
                "Fax_Recipient0" => "ext-fax,1,1",
                "Feature_Code_Admin0" => "ext-featurecodes,*30,1",
                "IVR0" => "popover",
                "Inbound_Routes0" => "from-trunk,,1",
                "Languages0" => "popover",
                "Misc_Destinations0" => "popover",
                "Paging_and_Intercom0" => "popover",
                "Phonebook_Directory0" => "app-pbdirectory,pbdirectory,1",
                "Queue_Priorities0" => "popover",
                "Queues0" => "ext-queues,757,1",
                "Queues_Pro0" => "popover",
                "Ring_Groups0" => "popover",
                "Sipstation0" => "sipstation-welcome,${EXTEN},1",
                "Terminate_Call0" => "app-blackhole,hangup,1",
                "Text_To_Speech0" => "popover",
                "Time_Conditions0" => "popover",
                "Trunks0" => "ext-trunk,1,1",
                "Voicemail0" => "ext-local,vmb315,1",
                "Voicemail_Blasting0" => "popover",
                "noanswer_dest" => "goto0",
                "noanswer_cid" => "",
                "goto1" => "",
                "Announcements1" => "popover",
                "Call_Flow_Control1" => "popover",
                "Call_Recording1" => "popover",
                "Callback1" => "popover",
                "Conference_Pro1" => "popover",
                "Conferences1" => "popover",
                "Custom_Applications1" => "popover",
                "DISA1" => "popover",
                "Directory1" => "popover",
                "Extensions1" => "from-did-direct,111,1",
                "Fax_Recipient1" => "ext-fax,1,1",
                "Feature_Code_Admin1" => "ext-featurecodes,*30,1",
                "IVR1" => "popover",
                "Inbound_Routes1" => "from-trunk,,1",
                "Languages1" => "popover",
                "Misc_Destinations1" => "popover",
                "Paging_and_Intercom1" => "popover",
                "Phonebook_Directory1" => "app-pbdirectory,pbdirectory,1",
                "Queue_Priorities1" => "popover",
                "Queues1" => "ext-queues,757,1",
                "Queues_Pro1" => "popover",
                "Ring_Groups1" => "popover",
                "Sipstation1" => "sipstation-welcome,${EXTEN},1",
                "Terminate_Call1" => "app-blackhole,hangup,1",
                "Text_To_Speech1" => "popover",
                "Time_Conditions1" => "popover",
                "Trunks1" => "ext-trunk,1,1",
                "Voicemail1" => "ext-local,vmb315,1",
                "Voicemail_Blasting1" => "popover",
                "busy_dest" => "goto1",
                "busy_cid" => "",
                "goto2" => "",
                "Announcements2" => "popover",
                "Call_Flow_Control2" => "popover",
                "Call_Recording2" => "popover",
                "Callback2" => "popover",
                "Conference_Pro2" => "popover",
                "Conferences2" => "popover",
                "Custom_Applications2" => "popover",
                "DISA2" => "popover",
                "Directory2" => "popover",
                "Extensions2" => "from-did-direct,111,1",
                "Fax_Recipient2" => "ext-fax,1,1",
                "Feature_Code_Admin2" => "ext-featurecodes,*30,1",
                "IVR2" => "popover",
                "Inbound_Routes2" => "from-trunk,,1",
                "Languages2" => "popover",
                "Misc_Destinations2" => "popover",
                "Paging_and_Intercom2" => "popover",
                "Phonebook_Directory2" => "app-pbdirectory,pbdirectory,1",
                "Queue_Priorities2" => "popover",
                "Queues2" => "ext-queues,757,1",
                "Queues_Pro2" => "popover",
                "Ring_Groups2" => "popover",
                "Sipstation2" => "sipstation-welcome,${EXTEN},1",
                "Terminate_Call2" => "app-blackhole,hangup,1",
                "Text_To_Speech2" => "popover",
                "Time_Conditions2" => "popover",
                "Trunks2" => "ext-trunk,1,1",
                "Voicemail2" => "ext-local,vmb315,1",
                "Voicemail_Blasting2" => "popover",
                "chanunavail_dest" => "goto2",
                "chanunavail_cid" => "",
                "pinless" => "disabled",
                "endpointBrand[1]" => "Select",
                "endpointMac[1]" => "",
                "endpointTemplate[1]" => " ",
                "endpointModel[1]" => " ",
                "endpointAccount[1]" => "account1",
                "cxpanel_add_extension" => "1",
                "cxpanel_auto_answer" => "1",
                "intercom_override" => "intercom_override=>reject",
                "devinfo_secret_origional" => "",
                "devinfo_sipdriver" => "chan_sip",
                "endpointExt[1]" => "",
            );
            $result = file_get_contents($url, false, stream_context_create(array(
                'http' => array(
                    'method'  => 'POST',
                    'header'  => 'Content-type: application/x-www-form-urlencoded',
                    'content' => http_build_query($params)
                )
            )));

            //echo $result;
            echo 'CREATE EXTENSION';
            
        /*text-center h4*/


    }
}
