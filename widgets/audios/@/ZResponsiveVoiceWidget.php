<?php

namespace zetsoft\widgets\audios;

use zetsoft\system\kernels\ZWidget;

/**
 *
 * Class ZKSelect2Widget
 * http://demos.krajee.com/widget-details/select2
 *
 * Created By: Asror Zakirov
 * Refactored: Asror Zakirov
 */
class ZResponsiveVoiceWidget extends ZWidget
{

    /**
     * Configuration
     */
    public $config = [];
    public $_config = [
        'type' => ZResponsiveVoiceWidget::Type['button']
    ];



    /**
     *
     * Constants
     */
    public const Type = [
        'button' => 'button'

    ];
    public const theme = [

    ];



    /**
     *
     * Plugin Events
     * https://select2.org/programmatic-control/events
     */
    public $event = [];
    public $_event = [

    ];

    public $layout = [];
    public $_layout = [

        'button' => <<<HTML
    <div>
    <div style="position: relative; display: none;" id="waitingdiv">
        Loading ResponsiveVoice…<br>
        If it doesn’t load please <a >
        check your browser compatibility</a>
    </div><div style="display: inline-block; margin: 0px auto;" id="voicetestdiv">
        <div class="voiceform">
            <textarea style="-webkit-input-placeholder: color: #555;margin-top:8px" placeholder="There is a new way of creating Text to Speech using HTML5. Type your own text here and click the Play button" id="text" class="input input--dropdown js--animations" cols="35" rows="3"></textarea><br>
            <br>
            <select id="voiceselection" onclick="responsiveVoice.speak(#&39;);" class="input input--dropdown js--animations"><option value="UK English Female">UK English Female</option><option value="UK English Male">UK English Male</option><option value="US English Female">US English Female</option><option value="US English Male">US English Male</option><option value="Arabic Male">Arabic Male</option><option value="Arabic Female">Arabic Female</option><option value="Armenian Male">Armenian Male</option><option value="Australian Female">Australian Female</option><option value="Australian Male">Australian Male</option><option value="Bangla Bangladesh Female">Bangla Bangladesh Female</option><option value="Bangla Bangladesh Male">Bangla Bangladesh Male</option><option value="Bangla India Female">Bangla India Female</option><option value="Bangla India Male">Bangla India Male</option><option value="Brazilian Portuguese Female">Brazilian Portuguese Female</option><option value="Brazilian Portuguese Male">Brazilian Portuguese Male</option><option value="Chinese Female">Chinese Female</option><option value="Chinese Male">Chinese Male</option><option value="Chinese (Hong Kong) Female">Chinese (Hong Kong) Female</option><option value="Chinese (Hong Kong) Male">Chinese (Hong Kong) Male</option><option value="Chinese Taiwan Female">Chinese Taiwan Female</option><option value="Chinese Taiwan Male">Chinese Taiwan Male</option><option value="Czech Female">Czech Female</option><option value="Czech Male">Czech Male</option><option value="Danish Female">Danish Female</option><option value="Danish Male">Danish Male</option><option value="Deutsch Female">Deutsch Female</option><option value="Deutsch Male">Deutsch Male</option><option value="Dutch Female">Dutch Female</option><option value="Dutch Male">Dutch Male</option><option value="Estonian Male">Estonian Male</option><option value="Filipino Female">Filipino Female</option><option value="Finnish Female">Finnish Female</option><option value="Finnish Male">Finnish Male</option><option value="French Female">French Female</option><option value="French Male">French Male</option><option value="French Canadian Female">French Canadian Female</option><option value="French Canadian Male">French Canadian Male</option><option value="Greek Female">Greek Female</option><option value="Greek Male">Greek Male</option><option value="Hindi Female">Hindi Female</option><option value="Hindi Male">Hindi Male</option><option value="Hungarian Female">Hungarian Female</option><option value="Hungarian Male">Hungarian Male</option><option value="Indonesian Female">Indonesian Female</option><option value="Indonesian Male">Indonesian Male</option><option value="Italian Female">Italian Female</option><option value="Italian Male">Italian Male</option><option value="Japanese Female">Japanese Female</option><option value="Japanese Male">Japanese Male</option><option value="Korean Female">Korean Female</option><option value="Korean Male">Korean Male</option><option value="Latin Female">Latin Female</option><option value="Latin Male">Latin Male</option><option value="Nepali">Nepali</option><option value="Norwegian Female">Norwegian Female</option><option value="Norwegian Male">Norwegian Male</option><option value="Polish Female">Polish Female</option><option value="Polish Male">Polish Male</option><option value="Portuguese Female">Portuguese Female</option><option value="Portuguese Male">Portuguese Male</option><option value="Romanian Female">Romanian Female</option><option value="Russian Female">Russian Female</option><option value="Russian Male">Russian Male</option><option value="Sinhala">Sinhala</option><option value="Slovak Female">Slovak Female</option><option value="Slovak Male">Slovak Male</option><option value="Spanish Female">Spanish Female</option><option value="Spanish Male">Spanish Male</option><option value="Spanish Latin American Female">Spanish Latin American Female</option><option value="Spanish Latin American Male">Spanish Latin American Male</option><option value="Swedish Female">Swedish Female</option><option value="Swedish Male">Swedish Male</option><option value="Tamil Female">Tamil Female</option><option value="Tamil Male">Tamil Male</option><option value="Thai Female">Thai Female</option><option value="Thai Male">Thai Male</option><option value="Turkish Female">Turkish Female</option><option value="Turkish Male">Turkish Male</option><option value="Ukrainian Female">Ukrainian Female</option><option value="Vietnamese Female">Vietnamese Female</option><option value="Vietnamese Male">Vietnamese Male</option><option value="Afrikaans Male">Afrikaans Male</option><option value="Albanian Male">Albanian Male</option><option value="Bosnian Male">Bosnian Male</option><option value="Catalan Male">Catalan Male</option><option value="Croatian Male">Croatian Male</option><option value="Esperanto Male">Esperanto Male</option><option value="Icelandic Male">Icelandic Male</option><option value="Latvian Male">Latvian Male</option><option value="Macedonian Male">Macedonian Male</option><option value="Moldavian Female">Moldavian Female</option><option value="Moldavian Male">Moldavian Male</option><option value="Montenegrin Male">Montenegrin Male</option><option value="Serbian Male">Serbian Male</option><option value="Serbo-Croatian Male">Serbo-Croatian Male</option><option value="Swahili Male">Swahili Male</option><option value="Welsh Male">Welsh Male</option><option value="Fallback UK Female">Fallback UK Female</option><option value="UK English Female">UK English Female</option><option value="UK English Male">UK English Male</option><option value="US English Female">US English Female</option><option value="US English Male">US English Male</option><option value="Arabic Male">Arabic Male</option><option value="Arabic Female">Arabic Female</option><option value="Armenian Male">Armenian Male</option><option value="Australian Female">Australian Female</option><option value="Australian Male">Australian Male</option><option value="Bangla Bangladesh Female">Bangla Bangladesh Female</option><option value="Bangla Bangladesh Male">Bangla Bangladesh Male</option><option value="Bangla India Female">Bangla India Female</option><option value="Bangla India Male">Bangla India Male</option><option value="Brazilian Portuguese Female">Brazilian Portuguese Female</option><option value="Brazilian Portuguese Male">Brazilian Portuguese Male</option><option value="Chinese Female">Chinese Female</option><option value="Chinese Male">Chinese Male</option><option value="Chinese (Hong Kong) Female">Chinese (Hong Kong) Female</option><option value="Chinese (Hong Kong) Male">Chinese (Hong Kong) Male</option><option value="Chinese Taiwan Female">Chinese Taiwan Female</option><option value="Chinese Taiwan Male">Chinese Taiwan Male</option><option value="Czech Female">Czech Female</option><option value="Czech Male">Czech Male</option><option value="Danish Female">Danish Female</option><option value="Danish Male">Danish Male</option><option value="Deutsch Female">Deutsch Female</option><option value="Deutsch Male">Deutsch Male</option><option value="Dutch Female">Dutch Female</option><option value="Dutch Male">Dutch Male</option><option value="Estonian Male">Estonian Male</option><option value="Filipino Female">Filipino Female</option><option value="Finnish Female">Finnish Female</option><option value="Finnish Male">Finnish Male</option><option value="French Female">French Female</option><option value="French Male">French Male</option><option value="French Canadian Female">French Canadian Female</option><option value="French Canadian Male">French Canadian Male</option><option value="Greek Female">Greek Female</option><option value="Greek Male">Greek Male</option><option value="Hindi Female">Hindi Female</option><option value="Hindi Male">Hindi Male</option><option value="Hungarian Female">Hungarian Female</option><option value="Hungarian Male">Hungarian Male</option><option value="Indonesian Female">Indonesian Female</option><option value="Indonesian Male">Indonesian Male</option><option value="Italian Female">Italian Female</option><option value="Italian Male">Italian Male</option><option value="Japanese Female">Japanese Female</option><option value="Japanese Male">Japanese Male</option><option value="Korean Female">Korean Female</option><option value="Korean Male">Korean Male</option><option value="Latin Female">Latin Female</option><option value="Latin Male">Latin Male</option><option value="Nepali">Nepali</option><option value="Norwegian Female">Norwegian Female</option><option value="Norwegian Male">Norwegian Male</option><option value="Polish Female">Polish Female</option><option value="Polish Male">Polish Male</option><option value="Portuguese Female">Portuguese Female</option><option value="Portuguese Male">Portuguese Male</option><option value="Romanian Female">Romanian Female</option><option value="Russian Female">Russian Female</option><option value="Russian Male">Russian Male</option><option value="Sinhala">Sinhala</option><option value="Slovak Female">Slovak Female</option><option value="Slovak Male">Slovak Male</option><option value="Spanish Female">Spanish Female</option><option value="Spanish Male">Spanish Male</option><option value="Spanish Latin American Female">Spanish Latin American Female</option><option value="Spanish Latin American Male">Spanish Latin American Male</option><option value="Swedish Female">Swedish Female</option><option value="Swedish Male">Swedish Male</option><option value="Tamil Female">Tamil Female</option><option value="Tamil Male">Tamil Male</option><option value="Thai Female">Thai Female</option><option value="Thai Male">Thai Male</option><option value="Turkish Female">Turkish Female</option><option value="Turkish Male">Turkish Male</option><option value="Ukrainian Female">Ukrainian Female</option><option value="Vietnamese Female">Vietnamese Female</option><option value="Vietnamese Male">Vietnamese Male</option><option value="Afrikaans Male">Afrikaans Male</option><option value="Albanian Male">Albanian Male</option><option value="Bosnian Male">Bosnian Male</option><option value="Catalan Male">Catalan Male</option><option value="Croatian Male">Croatian Male</option><option value="Esperanto Male">Esperanto Male</option><option value="Icelandic Male">Icelandic Male</option><option value="Latvian Male">Latvian Male</option><option value="Macedonian Male">Macedonian Male</option><option value="Moldavian Female">Moldavian Female</option><option value="Moldavian Male">Moldavian Male</option><option value="Montenegrin Male">Montenegrin Male</option><option value="Serbian Male">Serbian Male</option><option value="Serbo-Croatian Male">Serbo-Croatian Male</option><option value="Swahili Male">Swahili Male</option><option value="Welsh Male">Welsh Male</option><option value="Fallback UK Female">Fallback UK Female</option><option value="UK English Female">UK English Female</option><option value="UK English Male">UK English Male</option><option value="US English Female">US English Female</option><option value="US English Male">US English Male</option><option value="Arabic Male">Arabic Male</option><option value="Arabic Female">Arabic Female</option><option value="Armenian Male">Armenian Male</option><option value="Australian Female">Australian Female</option><option value="Australian Male">Australian Male</option><option value="Bangla Bangladesh Female">Bangla Bangladesh Female</option><option value="Bangla Bangladesh Male">Bangla Bangladesh Male</option><option value="Bangla India Female">Bangla India Female</option><option value="Bangla India Male">Bangla India Male</option><option value="Brazilian Portuguese Female">Brazilian Portuguese Female</option><option value="Brazilian Portuguese Male">Brazilian Portuguese Male</option><option value="Chinese Female">Chinese Female</option><option value="Chinese Male">Chinese Male</option><option value="Chinese (Hong Kong) Female">Chinese (Hong Kong) Female</option><option value="Chinese (Hong Kong) Male">Chinese (Hong Kong) Male</option><option value="Chinese Taiwan Female">Chinese Taiwan Female</option><option value="Chinese Taiwan Male">Chinese Taiwan Male</option><option value="Czech Female">Czech Female</option><option value="Czech Male">Czech Male</option><option value="Danish Female">Danish Female</option><option value="Danish Male">Danish Male</option><option value="Deutsch Female">Deutsch Female</option><option value="Deutsch Male">Deutsch Male</option><option value="Dutch Female">Dutch Female</option><option value="Dutch Male">Dutch Male</option><option value="Estonian Male">Estonian Male</option><option value="Filipino Female">Filipino Female</option><option value="Finnish Female">Finnish Female</option><option value="Finnish Male">Finnish Male</option><option value="French Female">French Female</option><option value="French Male">French Male</option><option value="French Canadian Female">French Canadian Female</option><option value="French Canadian Male">French Canadian Male</option><option value="Greek Female">Greek Female</option><option value="Greek Male">Greek Male</option><option value="Hindi Female">Hindi Female</option><option value="Hindi Male">Hindi Male</option><option value="Hungarian Female">Hungarian Female</option><option value="Hungarian Male">Hungarian Male</option><option value="Indonesian Female">Indonesian Female</option><option value="Indonesian Male">Indonesian Male</option><option value="Italian Female">Italian Female</option><option value="Italian Male">Italian Male</option><option value="Japanese Female">Japanese Female</option><option value="Japanese Male">Japanese Male</option><option value="Korean Female">Korean Female</option><option value="Korean Male">Korean Male</option><option value="Latin Female">Latin Female</option><option value="Latin Male">Latin Male</option><option value="Nepali">Nepali</option><option value="Norwegian Female">Norwegian Female</option><option value="Norwegian Male">Norwegian Male</option><option value="Polish Female">Polish Female</option><option value="Polish Male">Polish Male</option><option value="Portuguese Female">Portuguese Female</option><option value="Portuguese Male">Portuguese Male</option><option value="Romanian Female">Romanian Female</option><option value="Russian Female">Russian Female</option><option value="Russian Male">Russian Male</option><option value="Sinhala">Sinhala</option><option value="Slovak Female">Slovak Female</option><option value="Slovak Male">Slovak Male</option><option value="Spanish Female">Spanish Female</option><option value="Spanish Male">Spanish Male</option><option value="Spanish Latin American Female">Spanish Latin American Female</option><option value="Spanish Latin American Male">Spanish Latin American Male</option><option value="Swedish Female">Swedish Female</option><option value="Swedish Male">Swedish Male</option><option value="Tamil Female">Tamil Female</option><option value="Tamil Male">Tamil Male</option><option value="Thai Female">Thai Female</option><option value="Thai Male">Thai Male</option><option value="Turkish Female">Turkish Female</option><option value="Turkish Male">Turkish Male</option><option value="Ukrainian Female">Ukrainian Female</option><option value="Vietnamese Female">Vietnamese Female</option><option value="Vietnamese Male">Vietnamese Male</option><option value="Afrikaans Male">Afrikaans Male</option><option value="Albanian Male">Albanian Male</option><option value="Bosnian Male">Bosnian Male</option><option value="Catalan Male">Catalan Male</option><option value="Croatian Male">Croatian Male</option><option value="Esperanto Male">Esperanto Male</option><option value="Icelandic Male">Icelandic Male</option><option value="Latvian Male">Latvian Male</option><option value="Macedonian Male">Macedonian Male</option><option value="Moldavian Female">Moldavian Female</option><option value="Moldavian Male">Moldavian Male</option><option value="Montenegrin Male">Montenegrin Male</option><option value="Serbian Male">Serbian Male</option><option value="Serbo-Croatian Male">Serbo-Croatian Male</option><option value="Swahili Male">Swahili Male</option><option value="Welsh Male">Welsh Male</option><option value="Fallback UK Female">Fallback UK Female</option><option value="UK English Female">UK English Female</option><option value="UK English Male">UK English Male</option><option value="US English Female">US English Female</option><option value="US English Male">US English Male</option><option value="Arabic Male">Arabic Male</option><option value="Arabic Female">Arabic Female</option><option value="Armenian Male">Armenian Male</option><option value="Australian Female">Australian Female</option><option value="Australian Male">Australian Male</option><option value="Bangla Bangladesh Female">Bangla Bangladesh Female</option><option value="Bangla Bangladesh Male">Bangla Bangladesh Male</option><option value="Bangla India Female">Bangla India Female</option><option value="Bangla India Male">Bangla India Male</option><option value="Brazilian Portuguese Female">Brazilian Portuguese Female</option><option value="Brazilian Portuguese Male">Brazilian Portuguese Male</option><option value="Chinese Female">Chinese Female</option><option value="Chinese Male">Chinese Male</option><option value="Chinese (Hong Kong) Female">Chinese (Hong Kong) Female</option><option value="Chinese (Hong Kong) Male">Chinese (Hong Kong) Male</option><option value="Chinese Taiwan Female">Chinese Taiwan Female</option><option value="Chinese Taiwan Male">Chinese Taiwan Male</option><option value="Czech Female">Czech Female</option><option value="Czech Male">Czech Male</option><option value="Danish Female">Danish Female</option><option value="Danish Male">Danish Male</option><option value="Deutsch Female">Deutsch Female</option><option value="Deutsch Male">Deutsch Male</option><option value="Dutch Female">Dutch Female</option><option value="Dutch Male">Dutch Male</option><option value="Estonian Male">Estonian Male</option><option value="Filipino Female">Filipino Female</option><option value="Finnish Female">Finnish Female</option><option value="Finnish Male">Finnish Male</option><option value="French Female">French Female</option><option value="French Male">French Male</option><option value="French Canadian Female">French Canadian Female</option><option value="French Canadian Male">French Canadian Male</option><option value="Greek Female">Greek Female</option><option value="Greek Male">Greek Male</option><option value="Hindi Female">Hindi Female</option><option value="Hindi Male">Hindi Male</option><option value="Hungarian Female">Hungarian Female</option><option value="Hungarian Male">Hungarian Male</option><option value="Indonesian Female">Indonesian Female</option><option value="Indonesian Male">Indonesian Male</option><option value="Italian Female">Italian Female</option><option value="Italian Male">Italian Male</option><option value="Japanese Female">Japanese Female</option><option value="Japanese Male">Japanese Male</option><option value="Korean Female">Korean Female</option><option value="Korean Male">Korean Male</option><option value="Latin Female">Latin Female</option><option value="Latin Male">Latin Male</option><option value="Nepali">Nepali</option><option value="Norwegian Female">Norwegian Female</option><option value="Norwegian Male">Norwegian Male</option><option value="Polish Female">Polish Female</option><option value="Polish Male">Polish Male</option><option value="Portuguese Female">Portuguese Female</option><option value="Portuguese Male">Portuguese Male</option><option value="Romanian Female">Romanian Female</option><option value="Russian Female">Russian Female</option><option value="Russian Male">Russian Male</option><option value="Sinhala">Sinhala</option><option value="Slovak Female">Slovak Female</option><option value="Slovak Male">Slovak Male</option><option value="Spanish Female">Spanish Female</option><option value="Spanish Male">Spanish Male</option><option value="Spanish Latin American Female">Spanish Latin American Female</option><option value="Spanish Latin American Male">Spanish Latin American Male</option><option value="Swedish Female">Swedish Female</option><option value="Swedish Male">Swedish Male</option><option value="Tamil Female">Tamil Female</option><option value="Tamil Male">Tamil Male</option><option value="Thai Female">Thai Female</option><option value="Thai Male">Thai Male</option><option value="Turkish Female">Turkish Female</option><option value="Turkish Male">Turkish Male</option><option value="Ukrainian Female">Ukrainian Female</option><option value="Vietnamese Female">Vietnamese Female</option><option value="Vietnamese Male">Vietnamese Male</option><option value="Afrikaans Male">Afrikaans Male</option><option value="Albanian Male">Albanian Male</option><option value="Bosnian Male">Bosnian Male</option><option value="Catalan Male">Catalan Male</option><option value="Croatian Male">Croatian Male</option><option value="Esperanto Male">Esperanto Male</option><option value="Icelandic Male">Icelandic Male</option><option value="Latvian Male">Latvian Male</option><option value="Macedonian Male">Macedonian Male</option><option value="Moldavian Female">Moldavian Female</option><option value="Moldavian Male">Moldavian Male</option><option value="Montenegrin Male">Montenegrin Male</option><option value="Serbian Male">Serbian Male</option><option value="Serbo-Croatian Male">Serbo-Croatian Male</option><option value="Swahili Male">Swahili Male</option><option value="Welsh Male">Welsh Male</option><option value="Fallback UK Female">Fallback UK Female</option><option value="UK English Female">UK English Female</option><option value="UK English Male">UK English Male</option><option value="US English Female">US English Female</option><option value="US English Male">US English Male</option><option value="Arabic Male">Arabic Male</option><option value="Arabic Female">Arabic Female</option><option value="Armenian Male">Armenian Male</option><option value="Australian Female">Australian Female</option><option value="Australian Male">Australian Male</option><option value="Bangla Bangladesh Female">Bangla Bangladesh Female</option><option value="Bangla Bangladesh Male">Bangla Bangladesh Male</option><option value="Bangla India Female">Bangla India Female</option><option value="Bangla India Male">Bangla India Male</option><option value="Brazilian Portuguese Female">Brazilian Portuguese Female</option><option value="Brazilian Portuguese Male">Brazilian Portuguese Male</option><option value="Chinese Female">Chinese Female</option><option value="Chinese Male">Chinese Male</option><option value="Chinese (Hong Kong) Female">Chinese (Hong Kong) Female</option><option value="Chinese (Hong Kong) Male">Chinese (Hong Kong) Male</option><option value="Chinese Taiwan Female">Chinese Taiwan Female</option><option value="Chinese Taiwan Male">Chinese Taiwan Male</option><option value="Czech Female">Czech Female</option><option value="Czech Male">Czech Male</option><option value="Danish Female">Danish Female</option><option value="Danish Male">Danish Male</option><option value="Deutsch Female">Deutsch Female</option><option value="Deutsch Male">Deutsch Male</option><option value="Dutch Female">Dutch Female</option><option value="Dutch Male">Dutch Male</option><option value="Estonian Male">Estonian Male</option><option value="Filipino Female">Filipino Female</option><option value="Finnish Female">Finnish Female</option><option value="Finnish Male">Finnish Male</option><option value="French Female">French Female</option><option value="French Male">French Male</option><option value="French Canadian Female">French Canadian Female</option><option value="French Canadian Male">French Canadian Male</option><option value="Greek Female">Greek Female</option><option value="Greek Male">Greek Male</option><option value="Hindi Female">Hindi Female</option><option value="Hindi Male">Hindi Male</option><option value="Hungarian Female">Hungarian Female</option><option value="Hungarian Male">Hungarian Male</option><option value="Indonesian Female">Indonesian Female</option><option value="Indonesian Male">Indonesian Male</option><option value="Italian Female">Italian Female</option><option value="Italian Male">Italian Male</option><option value="Japanese Female">Japanese Female</option><option value="Japanese Male">Japanese Male</option><option value="Korean Female">Korean Female</option><option value="Korean Male">Korean Male</option><option value="Latin Female">Latin Female</option><option value="Latin Male">Latin Male</option><option value="Nepali">Nepali</option><option value="Norwegian Female">Norwegian Female</option><option value="Norwegian Male">Norwegian Male</option><option value="Polish Female">Polish Female</option><option value="Polish Male">Polish Male</option><option value="Portuguese Female">Portuguese Female</option><option value="Portuguese Male">Portuguese Male</option><option value="Romanian Female">Romanian Female</option><option value="Russian Female">Russian Female</option><option value="Russian Male">Russian Male</option><option value="Sinhala">Sinhala</option><option value="Slovak Female">Slovak Female</option><option value="Slovak Male">Slovak Male</option><option value="Spanish Female">Spanish Female</option><option value="Spanish Male">Spanish Male</option><option value="Spanish Latin American Female">Spanish Latin American Female</option><option value="Spanish Latin American Male">Spanish Latin American Male</option><option value="Swedish Female">Swedish Female</option><option value="Swedish Male">Swedish Male</option><option value="Tamil Female">Tamil Female</option><option value="Tamil Male">Tamil Male</option><option value="Thai Female">Thai Female</option><option value="Thai Male">Thai Male</option><option value="Turkish Female">Turkish Female</option><option value="Turkish Male">Turkish Male</option><option value="Ukrainian Female">Ukrainian Female</option><option value="Vietnamese Female">Vietnamese Female</option><option value="Vietnamese Male">Vietnamese Male</option><option value="Afrikaans Male">Afrikaans Male</option><option value="Albanian Male">Albanian Male</option><option value="Bosnian Male">Bosnian Male</option><option value="Catalan Male">Catalan Male</option><option value="Croatian Male">Croatian Male</option><option value="Esperanto Male">Esperanto Male</option><option value="Icelandic Male">Icelandic Male</option><option value="Latvian Male">Latvian Male</option><option value="Macedonian Male">Macedonian Male</option><option value="Moldavian Female">Moldavian Female</option><option value="Moldavian Male">Moldavian Male</option><option value="Montenegrin Male">Montenegrin Male</option><option value="Serbian Male">Serbian Male</option><option value="Serbo-Croatian Male">Serbo-Croatian Male</option><option value="Swahili Male">Swahili Male</option><option value="Welsh Male">Welsh Male</option><option value="Fallback UK Female">Fallback UK Female</option><option value="UK English Female">UK English Female</option><option value="UK English Male">UK English Male</option><option value="US English Female">US English Female</option><option value="US English Male">US English Male</option><option value="Arabic Male">Arabic Male</option><option value="Arabic Female">Arabic Female</option><option value="Armenian Male">Armenian Male</option><option value="Australian Female">Australian Female</option><option value="Australian Male">Australian Male</option><option value="Bangla Bangladesh Female">Bangla Bangladesh Female</option><option value="Bangla Bangladesh Male">Bangla Bangladesh Male</option><option value="Bangla India Female">Bangla India Female</option><option value="Bangla India Male">Bangla India Male</option><option value="Brazilian Portuguese Female">Brazilian Portuguese Female</option><option value="Brazilian Portuguese Male">Brazilian Portuguese Male</option><option value="Chinese Female">Chinese Female</option><option value="Chinese Male">Chinese Male</option><option value="Chinese (Hong Kong) Female">Chinese (Hong Kong) Female</option><option value="Chinese (Hong Kong) Male">Chinese (Hong Kong) Male</option><option value="Chinese Taiwan Female">Chinese Taiwan Female</option><option value="Chinese Taiwan Male">Chinese Taiwan Male</option><option value="Czech Female">Czech Female</option><option value="Czech Male">Czech Male</option><option value="Danish Female">Danish Female</option><option value="Danish Male">Danish Male</option><option value="Deutsch Female">Deutsch Female</option><option value="Deutsch Male">Deutsch Male</option><option value="Dutch Female">Dutch Female</option><option value="Dutch Male">Dutch Male</option><option value="Estonian Male">Estonian Male</option><option value="Filipino Female">Filipino Female</option><option value="Finnish Female">Finnish Female</option><option value="Finnish Male">Finnish Male</option><option value="French Female">French Female</option><option value="French Male">French Male</option><option value="French Canadian Female">French Canadian Female</option><option value="French Canadian Male">French Canadian Male</option><option value="Greek Female">Greek Female</option><option value="Greek Male">Greek Male</option><option value="Hindi Female">Hindi Female</option><option value="Hindi Male">Hindi Male</option><option value="Hungarian Female">Hungarian Female</option><option value="Hungarian Male">Hungarian Male</option><option value="Indonesian Female">Indonesian Female</option><option value="Indonesian Male">Indonesian Male</option><option value="Italian Female">Italian Female</option><option value="Italian Male">Italian Male</option><option value="Japanese Female">Japanese Female</option><option value="Japanese Male">Japanese Male</option><option value="Korean Female">Korean Female</option><option value="Korean Male">Korean Male</option><option value="Latin Female">Latin Female</option><option value="Latin Male">Latin Male</option><option value="Nepali">Nepali</option><option value="Norwegian Female">Norwegian Female</option><option value="Norwegian Male">Norwegian Male</option><option value="Polish Female">Polish Female</option><option value="Polish Male">Polish Male</option><option value="Portuguese Female">Portuguese Female</option><option value="Portuguese Male">Portuguese Male</option><option value="Romanian Female">Romanian Female</option><option value="Russian Female">Russian Female</option><option value="Russian Male">Russian Male</option><option value="Sinhala">Sinhala</option><option value="Slovak Female">Slovak Female</option><option value="Slovak Male">Slovak Male</option><option value="Spanish Female">Spanish Female</option><option value="Spanish Male">Spanish Male</option><option value="Spanish Latin American Female">Spanish Latin American Female</option><option value="Spanish Latin American Male">Spanish Latin American Male</option><option value="Swedish Female">Swedish Female</option><option value="Swedish Male">Swedish Male</option><option value="Tamil Female">Tamil Female</option><option value="Tamil Male">Tamil Male</option><option value="Thai Female">Thai Female</option><option value="Thai Male">Thai Male</option><option value="Turkish Female">Turkish Female</option><option value="Turkish Male">Turkish Male</option><option value="Ukrainian Female">Ukrainian Female</option><option value="Vietnamese Female">Vietnamese Female</option><option value="Vietnamese Male">Vietnamese Male</option><option value="Afrikaans Male">Afrikaans Male</option><option value="Albanian Male">Albanian Male</option><option value="Bosnian Male">Bosnian Male</option><option value="Catalan Male">Catalan Male</option><option value="Croatian Male">Croatian Male</option><option value="Esperanto Male">Esperanto Male</option><option value="Icelandic Male">Icelandic Male</option><option value="Latvian Male">Latvian Male</option><option value="Macedonian Male">Macedonian Male</option><option value="Moldavian Female">Moldavian Female</option><option value="Moldavian Male">Moldavian Male</option><option value="Montenegrin Male">Montenegrin Male</option><option value="Serbian Male">Serbian Male</option><option value="Serbo-Croatian Male">Serbo-Croatian Male</option><option value="Swahili Male">Swahili Male</option><option value="Welsh Male">Welsh Male</option><option value="Fallback UK Female">Fallback UK Female</option><option value="UK English Female">UK English Female</option><option value="UK English Male">UK English Male</option><option value="US English Female">US English Female</option><option value="US English Male">US English Male</option><option value="Arabic Male">Arabic Male</option><option value="Arabic Female">Arabic Female</option><option value="Armenian Male">Armenian Male</option><option value="Australian Female">Australian Female</option><option value="Australian Male">Australian Male</option><option value="Bangla Bangladesh Female">Bangla Bangladesh Female</option><option value="Bangla Bangladesh Male">Bangla Bangladesh Male</option><option value="Bangla India Female">Bangla India Female</option><option value="Bangla India Male">Bangla India Male</option><option value="Brazilian Portuguese Female">Brazilian Portuguese Female</option><option value="Brazilian Portuguese Male">Brazilian Portuguese Male</option><option value="Chinese Female">Chinese Female</option><option value="Chinese Male">Chinese Male</option><option value="Chinese (Hong Kong) Female">Chinese (Hong Kong) Female</option><option value="Chinese (Hong Kong) Male">Chinese (Hong Kong) Male</option><option value="Chinese Taiwan Female">Chinese Taiwan Female</option><option value="Chinese Taiwan Male">Chinese Taiwan Male</option><option value="Czech Female">Czech Female</option><option value="Czech Male">Czech Male</option><option value="Danish Female">Danish Female</option><option value="Danish Male">Danish Male</option><option value="Deutsch Female">Deutsch Female</option><option value="Deutsch Male">Deutsch Male</option><option value="Dutch Female">Dutch Female</option><option value="Dutch Male">Dutch Male</option><option value="Estonian Male">Estonian Male</option><option value="Filipino Female">Filipino Female</option><option value="Finnish Female">Finnish Female</option><option value="Finnish Male">Finnish Male</option><option value="French Female">French Female</option><option value="French Male">French Male</option><option value="French Canadian Female">French Canadian Female</option><option value="French Canadian Male">French Canadian Male</option><option value="Greek Female">Greek Female</option><option value="Greek Male">Greek Male</option><option value="Hindi Female">Hindi Female</option><option value="Hindi Male">Hindi Male</option><option value="Hungarian Female">Hungarian Female</option><option value="Hungarian Male">Hungarian Male</option><option value="Indonesian Female">Indonesian Female</option><option value="Indonesian Male">Indonesian Male</option><option value="Italian Female">Italian Female</option><option value="Italian Male">Italian Male</option><option value="Japanese Female">Japanese Female</option><option value="Japanese Male">Japanese Male</option><option value="Korean Female">Korean Female</option><option value="Korean Male">Korean Male</option><option value="Latin Female">Latin Female</option><option value="Latin Male">Latin Male</option><option value="Nepali">Nepali</option><option value="Norwegian Female">Norwegian Female</option><option value="Norwegian Male">Norwegian Male</option><option value="Polish Female">Polish Female</option><option value="Polish Male">Polish Male</option><option value="Portuguese Female">Portuguese Female</option><option value="Portuguese Male">Portuguese Male</option><option value="Romanian Female">Romanian Female</option><option value="Russian Female">Russian Female</option><option value="Russian Male">Russian Male</option><option value="Sinhala">Sinhala</option><option value="Slovak Female">Slovak Female</option><option value="Slovak Male">Slovak Male</option><option value="Spanish Female">Spanish Female</option><option value="Spanish Male">Spanish Male</option><option value="Spanish Latin American Female">Spanish Latin American Female</option><option value="Spanish Latin American Male">Spanish Latin American Male</option><option value="Swedish Female">Swedish Female</option><option value="Swedish Male">Swedish Male</option><option value="Tamil Female">Tamil Female</option><option value="Tamil Male">Tamil Male</option><option value="Thai Female">Thai Female</option><option value="Thai Male">Thai Male</option><option value="Turkish Female">Turkish Female</option><option value="Turkish Male">Turkish Male</option><option value="Ukrainian Female">Ukrainian Female</option><option value="Vietnamese Female">Vietnamese Female</option><option value="Vietnamese Male">Vietnamese Male</option><option value="Afrikaans Male">Afrikaans Male</option><option value="Albanian Male">Albanian Male</option><option value="Bosnian Male">Bosnian Male</option><option value="Catalan Male">Catalan Male</option><option value="Croatian Male">Croatian Male</option><option value="Esperanto Male">Esperanto Male</option><option value="Icelandic Male">Icelandic Male</option><option value="Latvian Male">Latvian Male</option><option value="Macedonian Male">Macedonian Male</option><option value="Moldavian Female">Moldavian Female</option><option value="Moldavian Male">Moldavian Male</option><option value="Montenegrin Male">Montenegrin Male</option><option value="Serbian Male">Serbian Male</option><option value="Serbo-Croatian Male">Serbo-Croatian Male</option><option value="Swahili Male">Swahili Male</option><option value="Welsh Male">Welsh Male</option><option value="Fallback UK Female">Fallback UK Female</option><option value="UK English Female">UK English Female</option><option value="UK English Male">UK English Male</option><option value="US English Female">US English Female</option><option value="US English Male">US English Male</option><option value="Arabic Male">Arabic Male</option><option value="Arabic Female">Arabic Female</option><option value="Armenian Male">Armenian Male</option><option value="Australian Female">Australian Female</option><option value="Australian Male">Australian Male</option><option value="Bangla Bangladesh Female">Bangla Bangladesh Female</option><option value="Bangla Bangladesh Male">Bangla Bangladesh Male</option><option value="Bangla India Female">Bangla India Female</option><option value="Bangla India Male">Bangla India Male</option><option value="Brazilian Portuguese Female">Brazilian Portuguese Female</option><option value="Brazilian Portuguese Male">Brazilian Portuguese Male</option><option value="Chinese Female">Chinese Female</option><option value="Chinese Male">Chinese Male</option><option value="Chinese (Hong Kong) Female">Chinese (Hong Kong) Female</option><option value="Chinese (Hong Kong) Male">Chinese (Hong Kong) Male</option><option value="Chinese Taiwan Female">Chinese Taiwan Female</option><option value="Chinese Taiwan Male">Chinese Taiwan Male</option><option value="Czech Female">Czech Female</option><option value="Czech Male">Czech Male</option><option value="Danish Female">Danish Female</option><option value="Danish Male">Danish Male</option><option value="Deutsch Female">Deutsch Female</option><option value="Deutsch Male">Deutsch Male</option><option value="Dutch Female">Dutch Female</option><option value="Dutch Male">Dutch Male</option><option value="Estonian Male">Estonian Male</option><option value="Filipino Female">Filipino Female</option><option value="Finnish Female">Finnish Female</option><option value="Finnish Male">Finnish Male</option><option value="French Female">French Female</option><option value="French Male">French Male</option><option value="French Canadian Female">French Canadian Female</option><option value="French Canadian Male">French Canadian Male</option><option value="Greek Female">Greek Female</option><option value="Greek Male">Greek Male</option><option value="Hindi Female">Hindi Female</option><option value="Hindi Male">Hindi Male</option><option value="Hungarian Female">Hungarian Female</option><option value="Hungarian Male">Hungarian Male</option><option value="Indonesian Female">Indonesian Female</option><option value="Indonesian Male">Indonesian Male</option><option value="Italian Female">Italian Female</option><option value="Italian Male">Italian Male</option><option value="Japanese Female">Japanese Female</option><option value="Japanese Male">Japanese Male</option><option value="Korean Female">Korean Female</option><option value="Korean Male">Korean Male</option><option value="Latin Female">Latin Female</option><option value="Latin Male">Latin Male</option><option value="Nepali">Nepali</option><option value="Norwegian Female">Norwegian Female</option><option value="Norwegian Male">Norwegian Male</option><option value="Polish Female">Polish Female</option><option value="Polish Male">Polish Male</option><option value="Portuguese Female">Portuguese Female</option><option value="Portuguese Male">Portuguese Male</option><option value="Romanian Female">Romanian Female</option><option value="Russian Female">Russian Female</option><option value="Russian Male">Russian Male</option><option value="Sinhala">Sinhala</option><option value="Slovak Female">Slovak Female</option><option value="Slovak Male">Slovak Male</option><option value="Spanish Female">Spanish Female</option><option value="Spanish Male">Spanish Male</option><option value="Spanish Latin American Female">Spanish Latin American Female</option><option value="Spanish Latin American Male">Spanish Latin American Male</option><option value="Swedish Female">Swedish Female</option><option value="Swedish Male">Swedish Male</option><option value="Tamil Female">Tamil Female</option><option value="Tamil Male">Tamil Male</option><option value="Thai Female">Thai Female</option><option value="Thai Male">Thai Male</option><option value="Turkish Female">Turkish Female</option><option value="Turkish Male">Turkish Male</option><option value="Ukrainian Female">Ukrainian Female</option><option value="Vietnamese Female">Vietnamese Female</option><option value="Vietnamese Male">Vietnamese Male</option><option value="Afrikaans Male">Afrikaans Male</option><option value="Albanian Male">Albanian Male</option><option value="Bosnian Male">Bosnian Male</option><option value="Catalan Male">Catalan Male</option><option value="Croatian Male">Croatian Male</option><option value="Esperanto Male">Esperanto Male</option><option value="Icelandic Male">Icelandic Male</option><option value="Latvian Male">Latvian Male</option><option value="Macedonian Male">Macedonian Male</option><option value="Moldavian Female">Moldavian Female</option><option value="Moldavian Male">Moldavian Male</option><option value="Montenegrin Male">Montenegrin Male</option><option value="Serbian Male">Serbian Male</option><option value="Serbo-Croatian Male">Serbo-Croatian Male</option><option value="Swahili Male">Swahili Male</option><option value="Welsh Male">Welsh Male</option><option value="Fallback UK Female">Fallback UK Female</option><option value="UK English Female">UK English Female</option><option value="UK English Male">UK English Male</option><option value="US English Female">US English Female</option><option value="US English Male">US English Male</option><option value="Arabic Male">Arabic Male</option><option value="Arabic Female">Arabic Female</option><option value="Armenian Male">Armenian Male</option><option value="Australian Female">Australian Female</option><option value="Australian Male">Australian Male</option><option value="Bangla Bangladesh Female">Bangla Bangladesh Female</option><option value="Bangla Bangladesh Male">Bangla Bangladesh Male</option><option value="Bangla India Female">Bangla India Female</option><option value="Bangla India Male">Bangla India Male</option><option value="Brazilian Portuguese Female">Brazilian Portuguese Female</option><option value="Brazilian Portuguese Male">Brazilian Portuguese Male</option><option value="Chinese Female">Chinese Female</option><option value="Chinese Male">Chinese Male</option><option value="Chinese (Hong Kong) Female">Chinese (Hong Kong) Female</option><option value="Chinese (Hong Kong) Male">Chinese (Hong Kong) Male</option><option value="Chinese Taiwan Female">Chinese Taiwan Female</option><option value="Chinese Taiwan Male">Chinese Taiwan Male</option><option value="Czech Female">Czech Female</option><option value="Czech Male">Czech Male</option><option value="Danish Female">Danish Female</option><option value="Danish Male">Danish Male</option><option value="Deutsch Female">Deutsch Female</option><option value="Deutsch Male">Deutsch Male</option><option value="Dutch Female">Dutch Female</option><option value="Dutch Male">Dutch Male</option><option value="Estonian Male">Estonian Male</option><option value="Filipino Female">Filipino Female</option><option value="Finnish Female">Finnish Female</option><option value="Finnish Male">Finnish Male</option><option value="French Female">French Female</option><option value="French Male">French Male</option><option value="French Canadian Female">French Canadian Female</option><option value="French Canadian Male">French Canadian Male</option><option value="Greek Female">Greek Female</option><option value="Greek Male">Greek Male</option><option value="Hindi Female">Hindi Female</option><option value="Hindi Male">Hindi Male</option><option value="Hungarian Female">Hungarian Female</option><option value="Hungarian Male">Hungarian Male</option><option value="Indonesian Female">Indonesian Female</option><option value="Indonesian Male">Indonesian Male</option><option value="Italian Female">Italian Female</option><option value="Italian Male">Italian Male</option><option value="Japanese Female">Japanese Female</option><option value="Japanese Male">Japanese Male</option><option value="Korean Female">Korean Female</option><option value="Korean Male">Korean Male</option><option value="Latin Female">Latin Female</option><option value="Latin Male">Latin Male</option><option value="Nepali">Nepali</option><option value="Norwegian Female">Norwegian Female</option><option value="Norwegian Male">Norwegian Male</option><option value="Polish Female">Polish Female</option><option value="Polish Male">Polish Male</option><option value="Portuguese Female">Portuguese Female</option><option value="Portuguese Male">Portuguese Male</option><option value="Romanian Female">Romanian Female</option><option value="Russian Female">Russian Female</option><option value="Russian Male">Russian Male</option><option value="Sinhala">Sinhala</option><option value="Slovak Female">Slovak Female</option><option value="Slovak Male">Slovak Male</option><option value="Spanish Female">Spanish Female</option><option value="Spanish Male">Spanish Male</option><option value="Spanish Latin American Female">Spanish Latin American Female</option><option value="Spanish Latin American Male">Spanish Latin American Male</option><option value="Swedish Female">Swedish Female</option><option value="Swedish Male">Swedish Male</option><option value="Tamil Female">Tamil Female</option><option value="Tamil Male">Tamil Male</option><option value="Thai Female">Thai Female</option><option value="Thai Male">Thai Male</option><option value="Turkish Female">Turkish Female</option><option value="Turkish Male">Turkish Male</option><option value="Ukrainian Female">Ukrainian Female</option><option value="Vietnamese Female">Vietnamese Female</option><option value="Vietnamese Male">Vietnamese Male</option><option value="Afrikaans Male">Afrikaans Male</option><option value="Albanian Male">Albanian Male</option><option value="Bosnian Male">Bosnian Male</option><option value="Catalan Male">Catalan Male</option><option value="Croatian Male">Croatian Male</option><option value="Esperanto Male">Esperanto Male</option><option value="Icelandic Male">Icelandic Male</option><option value="Latvian Male">Latvian Male</option><option value="Macedonian Male">Macedonian Male</option><option value="Moldavian Female">Moldavian Female</option><option value="Moldavian Male">Moldavian Male</option><option value="Montenegrin Male">Montenegrin Male</option><option value="Serbian Male">Serbian Male</option><option value="Serbo-Croatian Male">Serbo-Croatian Male</option><option value="Swahili Male">Swahili Male</option><option value="Welsh Male">Welsh Male</option><option value="Fallback UK Female">Fallback UK Female</option><option value="UK English Female">UK English Female</option><option value="UK English Male">UK English Male</option><option value="US English Female">US English Female</option><option value="US English Male">US English Male</option><option value="Arabic Male">Arabic Male</option><option value="Arabic Female">Arabic Female</option><option value="Armenian Male">Armenian Male</option><option value="Australian Female">Australian Female</option><option value="Australian Male">Australian Male</option><option value="Bangla Bangladesh Female">Bangla Bangladesh Female</option><option value="Bangla Bangladesh Male">Bangla Bangladesh Male</option><option value="Bangla India Female">Bangla India Female</option><option value="Bangla India Male">Bangla India Male</option><option value="Brazilian Portuguese Female">Brazilian Portuguese Female</option><option value="Brazilian Portuguese Male">Brazilian Portuguese Male</option><option value="Chinese Female">Chinese Female</option><option value="Chinese Male">Chinese Male</option><option value="Chinese (Hong Kong) Female">Chinese (Hong Kong) Female</option><option value="Chinese (Hong Kong) Male">Chinese (Hong Kong) Male</option><option value="Chinese Taiwan Female">Chinese Taiwan Female</option><option value="Chinese Taiwan Male">Chinese Taiwan Male</option><option value="Czech Female">Czech Female</option><option value="Czech Male">Czech Male</option><option value="Danish Female">Danish Female</option><option value="Danish Male">Danish Male</option><option value="Deutsch Female">Deutsch Female</option><option value="Deutsch Male">Deutsch Male</option><option value="Dutch Female">Dutch Female</option><option value="Dutch Male">Dutch Male</option><option value="Estonian Male">Estonian Male</option><option value="Filipino Female">Filipino Female</option><option value="Finnish Female">Finnish Female</option><option value="Finnish Male">Finnish Male</option><option value="French Female">French Female</option><option value="French Male">French Male</option><option value="French Canadian Female">French Canadian Female</option><option value="French Canadian Male">French Canadian Male</option><option value="Greek Female">Greek Female</option><option value="Greek Male">Greek Male</option><option value="Hindi Female">Hindi Female</option><option value="Hindi Male">Hindi Male</option><option value="Hungarian Female">Hungarian Female</option><option value="Hungarian Male">Hungarian Male</option><option value="Indonesian Female">Indonesian Female</option><option value="Indonesian Male">Indonesian Male</option><option value="Italian Female">Italian Female</option><option value="Italian Male">Italian Male</option><option value="Japanese Female">Japanese Female</option><option value="Japanese Male">Japanese Male</option><option value="Korean Female">Korean Female</option><option value="Korean Male">Korean Male</option><option value="Latin Female">Latin Female</option><option value="Latin Male">Latin Male</option><option value="Nepali">Nepali</option><option value="Norwegian Female">Norwegian Female</option><option value="Norwegian Male">Norwegian Male</option><option value="Polish Female">Polish Female</option><option value="Polish Male">Polish Male</option><option value="Portuguese Female">Portuguese Female</option><option value="Portuguese Male">Portuguese Male</option><option value="Romanian Female">Romanian Female</option><option value="Russian Female">Russian Female</option><option value="Russian Male">Russian Male</option><option value="Sinhala">Sinhala</option><option value="Slovak Female">Slovak Female</option><option value="Slovak Male">Slovak Male</option><option value="Spanish Female">Spanish Female</option><option value="Spanish Male">Spanish Male</option><option value="Spanish Latin American Female">Spanish Latin American Female</option><option value="Spanish Latin American Male">Spanish Latin American Male</option><option value="Swedish Female">Swedish Female</option><option value="Swedish Male">Swedish Male</option><option value="Tamil Female">Tamil Female</option><option value="Tamil Male">Tamil Male</option><option value="Thai Female">Thai Female</option><option value="Thai Male">Thai Male</option><option value="Turkish Female">Turkish Female</option><option value="Turkish Male">Turkish Male</option><option value="Ukrainian Female">Ukrainian Female</option><option value="Vietnamese Female">Vietnamese Female</option><option value="Vietnamese Male">Vietnamese Male</option><option value="Afrikaans Male">Afrikaans Male</option><option value="Albanian Male">Albanian Male</option><option value="Bosnian Male">Bosnian Male</option><option value="Catalan Male">Catalan Male</option><option value="Croatian Male">Croatian Male</option><option value="Esperanto Male">Esperanto Male</option><option value="Icelandic Male">Icelandic Male</option><option value="Latvian Male">Latvian Male</option><option value="Macedonian Male">Macedonian Male</option><option value="Moldavian Female">Moldavian Female</option><option value="Moldavian Male">Moldavian Male</option><option value="Montenegrin Male">Montenegrin Male</option><option value="Serbian Male">Serbian Male</option><option value="Serbo-Croatian Male">Serbo-Croatian Male</option><option value="Swahili Male">Swahili Male</option><option value="Welsh Male">Welsh Male</option><option value="Fallback UK Female">Fallback UK Female</option><option value="UK English Female">UK English Female</option><option value="UK English Male">UK English Male</option><option value="US English Female">US English Female</option><option value="US English Male">US English Male</option><option value="Arabic Male">Arabic Male</option><option value="Arabic Female">Arabic Female</option><option value="Armenian Male">Armenian Male</option><option value="Australian Female">Australian Female</option><option value="Australian Male">Australian Male</option><option value="Bangla Bangladesh Female">Bangla Bangladesh Female</option><option value="Bangla Bangladesh Male">Bangla Bangladesh Male</option><option value="Bangla India Female">Bangla India Female</option><option value="Bangla India Male">Bangla India Male</option><option value="Brazilian Portuguese Female">Brazilian Portuguese Female</option><option value="Brazilian Portuguese Male">Brazilian Portuguese Male</option><option value="Chinese Female">Chinese Female</option><option value="Chinese Male">Chinese Male</option><option value="Chinese (Hong Kong) Female">Chinese (Hong Kong) Female</option><option value="Chinese (Hong Kong) Male">Chinese (Hong Kong) Male</option><option value="Chinese Taiwan Female">Chinese Taiwan Female</option><option value="Chinese Taiwan Male">Chinese Taiwan Male</option><option value="Czech Female">Czech Female</option><option value="Czech Male">Czech Male</option><option value="Danish Female">Danish Female</option><option value="Danish Male">Danish Male</option><option value="Deutsch Female">Deutsch Female</option><option value="Deutsch Male">Deutsch Male</option><option value="Dutch Female">Dutch Female</option><option value="Dutch Male">Dutch Male</option><option value="Estonian Male">Estonian Male</option><option value="Filipino Female">Filipino Female</option><option value="Finnish Female">Finnish Female</option><option value="Finnish Male">Finnish Male</option><option value="French Female">French Female</option><option value="French Male">French Male</option><option value="French Canadian Female">French Canadian Female</option><option value="French Canadian Male">French Canadian Male</option><option value="Greek Female">Greek Female</option><option value="Greek Male">Greek Male</option><option value="Hindi Female">Hindi Female</option><option value="Hindi Male">Hindi Male</option><option value="Hungarian Female">Hungarian Female</option><option value="Hungarian Male">Hungarian Male</option><option value="Indonesian Female">Indonesian Female</option><option value="Indonesian Male">Indonesian Male</option><option value="Italian Female">Italian Female</option><option value="Italian Male">Italian Male</option><option value="Japanese Female">Japanese Female</option><option value="Japanese Male">Japanese Male</option><option value="Korean Female">Korean Female</option><option value="Korean Male">Korean Male</option><option value="Latin Female">Latin Female</option><option value="Latin Male">Latin Male</option><option value="Nepali">Nepali</option><option value="Norwegian Female">Norwegian Female</option><option value="Norwegian Male">Norwegian Male</option><option value="Polish Female">Polish Female</option><option value="Polish Male">Polish Male</option><option value="Portuguese Female">Portuguese Female</option><option value="Portuguese Male">Portuguese Male</option><option value="Romanian Female">Romanian Female</option><option value="Russian Female">Russian Female</option><option value="Russian Male">Russian Male</option><option value="Sinhala">Sinhala</option><option value="Slovak Female">Slovak Female</option><option value="Slovak Male">Slovak Male</option><option value="Spanish Female">Spanish Female</option><option value="Spanish Male">Spanish Male</option><option value="Spanish Latin American Female">Spanish Latin American Female</option><option value="Spanish Latin American Male">Spanish Latin American Male</option><option value="Swedish Female">Swedish Female</option><option value="Swedish Male">Swedish Male</option><option value="Tamil Female">Tamil Female</option><option value="Tamil Male">Tamil Male</option><option value="Thai Female">Thai Female</option><option value="Thai Male">Thai Male</option><option value="Turkish Female">Turkish Female</option><option value="Turkish Male">Turkish Male</option><option value="Ukrainian Female">Ukrainian Female</option><option value="Vietnamese Female">Vietnamese Female</option><option value="Vietnamese Male">Vietnamese Male</option><option value="Afrikaans Male">Afrikaans Male</option><option value="Albanian Male">Albanian Male</option><option value="Bosnian Male">Bosnian Male</option><option value="Catalan Male">Catalan Male</option><option value="Croatian Male">Croatian Male</option><option value="Esperanto Male">Esperanto Male</option><option value="Icelandic Male">Icelandic Male</option><option value="Latvian Male">Latvian Male</option><option value="Macedonian Male">Macedonian Male</option><option value="Moldavian Female">Moldavian Female</option><option value="Moldavian Male">Moldavian Male</option><option value="Montenegrin Male">Montenegrin Male</option><option value="Serbian Male">Serbian Male</option><option value="Serbo-Croatian Male">Serbo-Croatian Male</option><option value="Swahili Male">Swahili Male</option><option value="Welsh Male">Welsh Male</option><option value="Fallback UK Female">Fallback UK Female</option><option value="UK English Female">UK English Female</option><option value="UK English Male">UK English Male</option><option value="US English Female">US English Female</option><option value="US English Male">US English Male</option><option value="Arabic Male">Arabic Male</option><option value="Arabic Female">Arabic Female</option><option value="Armenian Male">Armenian Male</option><option value="Australian Female">Australian Female</option><option value="Australian Male">Australian Male</option><option value="Bangla Bangladesh Female">Bangla Bangladesh Female</option><option value="Bangla Bangladesh Male">Bangla Bangladesh Male</option><option value="Bangla India Female">Bangla India Female</option><option value="Bangla India Male">Bangla India Male</option><option value="Brazilian Portuguese Female">Brazilian Portuguese Female</option><option value="Brazilian Portuguese Male">Brazilian Portuguese Male</option><option value="Chinese Female">Chinese Female</option><option value="Chinese Male">Chinese Male</option><option value="Chinese (Hong Kong) Female">Chinese (Hong Kong) Female</option><option value="Chinese (Hong Kong) Male">Chinese (Hong Kong) Male</option><option value="Chinese Taiwan Female">Chinese Taiwan Female</option><option value="Chinese Taiwan Male">Chinese Taiwan Male</option><option value="Czech Female">Czech Female</option><option value="Czech Male">Czech Male</option><option value="Danish Female">Danish Female</option><option value="Danish Male">Danish Male</option><option value="Deutsch Female">Deutsch Female</option><option value="Deutsch Male">Deutsch Male</option><option value="Dutch Female">Dutch Female</option><option value="Dutch Male">Dutch Male</option><option value="Estonian Male">Estonian Male</option><option value="Filipino Female">Filipino Female</option><option value="Finnish Female">Finnish Female</option><option value="Finnish Male">Finnish Male</option><option value="French Female">French Female</option><option value="French Male">French Male</option><option value="French Canadian Female">French Canadian Female</option><option value="French Canadian Male">French Canadian Male</option><option value="Greek Female">Greek Female</option><option value="Greek Male">Greek Male</option><option value="Hindi Female">Hindi Female</option><option value="Hindi Male">Hindi Male</option><option value="Hungarian Female">Hungarian Female</option><option value="Hungarian Male">Hungarian Male</option><option value="Indonesian Female">Indonesian Female</option><option value="Indonesian Male">Indonesian Male</option><option value="Italian Female">Italian Female</option><option value="Italian Male">Italian Male</option><option value="Japanese Female">Japanese Female</option><option value="Japanese Male">Japanese Male</option><option value="Korean Female">Korean Female</option><option value="Korean Male">Korean Male</option><option value="Latin Female">Latin Female</option><option value="Latin Male">Latin Male</option><option value="Nepali">Nepali</option><option value="Norwegian Female">Norwegian Female</option><option value="Norwegian Male">Norwegian Male</option><option value="Polish Female">Polish Female</option><option value="Polish Male">Polish Male</option><option value="Portuguese Female">Portuguese Female</option><option value="Portuguese Male">Portuguese Male</option><option value="Romanian Female">Romanian Female</option><option value="Russian Female">Russian Female</option><option value="Russian Male">Russian Male</option><option value="Sinhala">Sinhala</option><option value="Slovak Female">Slovak Female</option><option value="Slovak Male">Slovak Male</option><option value="Spanish Female">Spanish Female</option><option value="Spanish Male">Spanish Male</option><option value="Spanish Latin American Female">Spanish Latin American Female</option><option value="Spanish Latin American Male">Spanish Latin American Male</option><option value="Swedish Female">Swedish Female</option><option value="Swedish Male">Swedish Male</option><option value="Tamil Female">Tamil Female</option><option value="Tamil Male">Tamil Male</option><option value="Thai Female">Thai Female</option><option value="Thai Male">Thai Male</option><option value="Turkish Female">Turkish Female</option><option value="Turkish Male">Turkish Male</option><option value="Ukrainian Female">Ukrainian Female</option><option value="Vietnamese Female">Vietnamese Female</option><option value="Vietnamese Male">Vietnamese Male</option><option value="Afrikaans Male">Afrikaans Male</option><option value="Albanian Male">Albanian Male</option><option value="Bosnian Male">Bosnian Male</option><option value="Catalan Male">Catalan Male</option><option value="Croatian Male">Croatian Male</option><option value="Esperanto Male">Esperanto Male</option><option value="Icelandic Male">Icelandic Male</option><option value="Latvian Male">Latvian Male</option><option value="Macedonian Male">Macedonian Male</option><option value="Moldavian Female">Moldavian Female</option><option value="Moldavian Male">Moldavian Male</option><option value="Montenegrin Male">Montenegrin Male</option><option value="Serbian Male">Serbian Male</option><option value="Serbo-Croatian Male">Serbo-Croatian Male</option><option value="Swahili Male">Swahili Male</option><option value="Welsh Male">Welsh Male</option><option value="Fallback UK Female">Fallback UK Female</option><option value="UK English Female">UK English Female</option><option value="UK English Male">UK English Male</option><option value="US English Female">US English Female</option><option value="US English Male">US English Male</option><option value="Arabic Male">Arabic Male</option><option value="Arabic Female">Arabic Female</option><option value="Armenian Male">Armenian Male</option><option value="Australian Female">Australian Female</option><option value="Australian Male">Australian Male</option><option value="Bangla Bangladesh Female">Bangla Bangladesh Female</option><option value="Bangla Bangladesh Male">Bangla Bangladesh Male</option><option value="Bangla India Female">Bangla India Female</option><option value="Bangla India Male">Bangla India Male</option><option value="Brazilian Portuguese Female">Brazilian Portuguese Female</option><option value="Brazilian Portuguese Male">Brazilian Portuguese Male</option><option value="Chinese Female">Chinese Female</option><option value="Chinese Male">Chinese Male</option><option value="Chinese (Hong Kong) Female">Chinese (Hong Kong) Female</option><option value="Chinese (Hong Kong) Male">Chinese (Hong Kong) Male</option><option value="Chinese Taiwan Female">Chinese Taiwan Female</option><option value="Chinese Taiwan Male">Chinese Taiwan Male</option><option value="Czech Female">Czech Female</option><option value="Czech Male">Czech Male</option><option value="Danish Female">Danish Female</option><option value="Danish Male">Danish Male</option><option value="Deutsch Female">Deutsch Female</option><option value="Deutsch Male">Deutsch Male</option><option value="Dutch Female">Dutch Female</option><option value="Dutch Male">Dutch Male</option><option value="Estonian Male">Estonian Male</option><option value="Filipino Female">Filipino Female</option><option value="Finnish Female">Finnish Female</option><option value="Finnish Male">Finnish Male</option><option value="French Female">French Female</option><option value="French Male">French Male</option><option value="French Canadian Female">French Canadian Female</option><option value="French Canadian Male">French Canadian Male</option><option value="Greek Female">Greek Female</option><option value="Greek Male">Greek Male</option><option value="Hindi Female">Hindi Female</option><option value="Hindi Male">Hindi Male</option><option value="Hungarian Female">Hungarian Female</option><option value="Hungarian Male">Hungarian Male</option><option value="Indonesian Female">Indonesian Female</option><option value="Indonesian Male">Indonesian Male</option><option value="Italian Female">Italian Female</option><option value="Italian Male">Italian Male</option><option value="Japanese Female">Japanese Female</option><option value="Japanese Male">Japanese Male</option><option value="Korean Female">Korean Female</option><option value="Korean Male">Korean Male</option><option value="Latin Female">Latin Female</option><option value="Latin Male">Latin Male</option><option value="Nepali">Nepali</option><option value="Norwegian Female">Norwegian Female</option><option value="Norwegian Male">Norwegian Male</option><option value="Polish Female">Polish Female</option><option value="Polish Male">Polish Male</option><option value="Portuguese Female">Portuguese Female</option><option value="Portuguese Male">Portuguese Male</option><option value="Romanian Female">Romanian Female</option><option value="Russian Female">Russian Female</option><option value="Russian Male">Russian Male</option><option value="Sinhala">Sinhala</option><option value="Slovak Female">Slovak Female</option><option value="Slovak Male">Slovak Male</option><option value="Spanish Female">Spanish Female</option><option value="Spanish Male">Spanish Male</option><option value="Spanish Latin American Female">Spanish Latin American Female</option><option value="Spanish Latin American Male">Spanish Latin American Male</option><option value="Swedish Female">Swedish Female</option><option value="Swedish Male">Swedish Male</option><option value="Tamil Female">Tamil Female</option><option value="Tamil Male">Tamil Male</option><option value="Thai Female">Thai Female</option><option value="Thai Male">Thai Male</option><option value="Turkish Female">Turkish Female</option><option value="Turkish Male">Turkish Male</option><option value="Ukrainian Female">Ukrainian Female</option><option value="Vietnamese Female">Vietnamese Female</option><option value="Vietnamese Male">Vietnamese Male</option><option value="Afrikaans Male">Afrikaans Male</option><option value="Albanian Male">Albanian Male</option><option value="Bosnian Male">Bosnian Male</option><option value="Catalan Male">Catalan Male</option><option value="Croatian Male">Croatian Male</option><option value="Esperanto Male">Esperanto Male</option><option value="Icelandic Male">Icelandic Male</option><option value="Latvian Male">Latvian Male</option><option value="Macedonian Male">Macedonian Male</option><option value="Moldavian Female">Moldavian Female</option><option value="Moldavian Male">Moldavian Male</option><option value="Montenegrin Male">Montenegrin Male</option><option value="Serbian Male">Serbian Male</option><option value="Serbo-Croatian Male">Serbo-Croatian Male</option><option value="Swahili Male">Swahili Male</option><option value="Welsh Male">Welsh Male</option><option value="Fallback UK Female">Fallback UK Female</option><option value="UK English Female">UK English Female</option><option value="UK English Male">UK English Male</option><option value="US English Female">US English Female</option><option value="US English Male">US English Male</option><option value="Arabic Male">Arabic Male</option><option value="Arabic Female">Arabic Female</option><option value="Armenian Male">Armenian Male</option><option value="Australian Female">Australian Female</option><option value="Australian Male">Australian Male</option><option value="Bangla Bangladesh Female">Bangla Bangladesh Female</option><option value="Bangla Bangladesh Male">Bangla Bangladesh Male</option><option value="Bangla India Female">Bangla India Female</option><option value="Bangla India Male">Bangla India Male</option><option value="Brazilian Portuguese Female">Brazilian Portuguese Female</option><option value="Brazilian Portuguese Male">Brazilian Portuguese Male</option><option value="Chinese Female">Chinese Female</option><option value="Chinese Male">Chinese Male</option><option value="Chinese (Hong Kong) Female">Chinese (Hong Kong) Female</option><option value="Chinese (Hong Kong) Male">Chinese (Hong Kong) Male</option><option value="Chinese Taiwan Female">Chinese Taiwan Female</option><option value="Chinese Taiwan Male">Chinese Taiwan Male</option><option value="Czech Female">Czech Female</option><option value="Czech Male">Czech Male</option><option value="Danish Female">Danish Female</option><option value="Danish Male">Danish Male</option><option value="Deutsch Female">Deutsch Female</option><option value="Deutsch Male">Deutsch Male</option><option value="Dutch Female">Dutch Female</option><option value="Dutch Male">Dutch Male</option><option value="Estonian Male">Estonian Male</option><option value="Filipino Female">Filipino Female</option><option value="Finnish Female">Finnish Female</option><option value="Finnish Male">Finnish Male</option><option value="French Female">French Female</option><option value="French Male">French Male</option><option value="French Canadian Female">French Canadian Female</option><option value="French Canadian Male">French Canadian Male</option><option value="Greek Female">Greek Female</option><option value="Greek Male">Greek Male</option><option value="Hindi Female">Hindi Female</option><option value="Hindi Male">Hindi Male</option><option value="Hungarian Female">Hungarian Female</option><option value="Hungarian Male">Hungarian Male</option><option value="Indonesian Female">Indonesian Female</option><option value="Indonesian Male">Indonesian Male</option><option value="Italian Female">Italian Female</option><option value="Italian Male">Italian Male</option><option value="Japanese Female">Japanese Female</option><option value="Japanese Male">Japanese Male</option><option value="Korean Female">Korean Female</option><option value="Korean Male">Korean Male</option><option value="Latin Female">Latin Female</option><option value="Latin Male">Latin Male</option><option value="Nepali">Nepali</option><option value="Norwegian Female">Norwegian Female</option><option value="Norwegian Male">Norwegian Male</option><option value="Polish Female">Polish Female</option><option value="Polish Male">Polish Male</option><option value="Portuguese Female">Portuguese Female</option><option value="Portuguese Male">Portuguese Male</option><option value="Romanian Female">Romanian Female</option><option value="Russian Female">Russian Female</option><option value="Russian Male">Russian Male</option><option value="Sinhala">Sinhala</option><option value="Slovak Female">Slovak Female</option><option value="Slovak Male">Slovak Male</option><option value="Spanish Female">Spanish Female</option><option value="Spanish Male">Spanish Male</option><option value="Spanish Latin American Female">Spanish Latin American Female</option><option value="Spanish Latin American Male">Spanish Latin American Male</option><option value="Swedish Female">Swedish Female</option><option value="Swedish Male">Swedish Male</option><option value="Tamil Female">Tamil Female</option><option value="Tamil Male">Tamil Male</option><option value="Thai Female">Thai Female</option><option value="Thai Male">Thai Male</option><option value="Turkish Female">Turkish Female</option><option value="Turkish Male">Turkish Male</option><option value="Ukrainian Female">Ukrainian Female</option><option value="Vietnamese Female">Vietnamese Female</option><option value="Vietnamese Male">Vietnamese Male</option><option value="Afrikaans Male">Afrikaans Male</option><option value="Albanian Male">Albanian Male</option><option value="Bosnian Male">Bosnian Male</option><option value="Catalan Male">Catalan Male</option><option value="Croatian Male">Croatian Male</option><option value="Esperanto Male">Esperanto Male</option><option value="Icelandic Male">Icelandic Male</option><option value="Latvian Male">Latvian Male</option><option value="Macedonian Male">Macedonian Male</option><option value="Moldavian Female">Moldavian Female</option><option value="Moldavian Male">Moldavian Male</option><option value="Montenegrin Male">Montenegrin Male</option><option value="Serbian Male">Serbian Male</option><option value="Serbo-Croatian Male">Serbo-Croatian Male</option><option value="Swahili Male">Swahili Male</option><option value="Welsh Male">Welsh Male</option><option value="Fallback UK Female">Fallback UK Female</option><option value="UK English Female">UK English Female</option><option value="UK English Male">UK English Male</option><option value="US English Female">US English Female</option><option value="US English Male">US English Male</option><option value="Arabic Male">Arabic Male</option><option value="Arabic Female">Arabic Female</option><option value="Armenian Male">Armenian Male</option><option value="Australian Female">Australian Female</option><option value="Australian Male">Australian Male</option><option value="Bangla Bangladesh Female">Bangla Bangladesh Female</option><option value="Bangla Bangladesh Male">Bangla Bangladesh Male</option><option value="Bangla India Female">Bangla India Female</option><option value="Bangla India Male">Bangla India Male</option><option value="Brazilian Portuguese Female">Brazilian Portuguese Female</option><option value="Brazilian Portuguese Male">Brazilian Portuguese Male</option><option value="Chinese Female">Chinese Female</option><option value="Chinese Male">Chinese Male</option><option value="Chinese (Hong Kong) Female">Chinese (Hong Kong) Female</option><option value="Chinese (Hong Kong) Male">Chinese (Hong Kong) Male</option><option value="Chinese Taiwan Female">Chinese Taiwan Female</option><option value="Chinese Taiwan Male">Chinese Taiwan Male</option><option value="Czech Female">Czech Female</option><option value="Czech Male">Czech Male</option><option value="Danish Female">Danish Female</option><option value="Danish Male">Danish Male</option><option value="Deutsch Female">Deutsch Female</option><option value="Deutsch Male">Deutsch Male</option><option value="Dutch Female">Dutch Female</option><option value="Dutch Male">Dutch Male</option><option value="Estonian Male">Estonian Male</option><option value="Filipino Female">Filipino Female</option><option value="Finnish Female">Finnish Female</option><option value="Finnish Male">Finnish Male</option><option value="French Female">French Female</option><option value="French Male">French Male</option><option value="French Canadian Female">French Canadian Female</option><option value="French Canadian Male">French Canadian Male</option><option value="Greek Female">Greek Female</option><option value="Greek Male">Greek Male</option><option value="Hindi Female">Hindi Female</option><option value="Hindi Male">Hindi Male</option><option value="Hungarian Female">Hungarian Female</option><option value="Hungarian Male">Hungarian Male</option><option value="Indonesian Female">Indonesian Female</option><option value="Indonesian Male">Indonesian Male</option><option value="Italian Female">Italian Female</option><option value="Italian Male">Italian Male</option><option value="Japanese Female">Japanese Female</option><option value="Japanese Male">Japanese Male</option><option value="Korean Female">Korean Female</option><option value="Korean Male">Korean Male</option><option value="Latin Female">Latin Female</option><option value="Latin Male">Latin Male</option><option value="Nepali">Nepali</option><option value="Norwegian Female">Norwegian Female</option><option value="Norwegian Male">Norwegian Male</option><option value="Polish Female">Polish Female</option><option value="Polish Male">Polish Male</option><option value="Portuguese Female">Portuguese Female</option><option value="Portuguese Male">Portuguese Male</option><option value="Romanian Female">Romanian Female</option><option value="Russian Female">Russian Female</option><option value="Russian Male">Russian Male</option><option value="Sinhala">Sinhala</option><option value="Slovak Female">Slovak Female</option><option value="Slovak Male">Slovak Male</option><option value="Spanish Female">Spanish Female</option><option value="Spanish Male">Spanish Male</option><option value="Spanish Latin American Female">Spanish Latin American Female</option><option value="Spanish Latin American Male">Spanish Latin American Male</option><option value="Swedish Female">Swedish Female</option><option value="Swedish Male">Swedish Male</option><option value="Tamil Female">Tamil Female</option><option value="Tamil Male">Tamil Male</option><option value="Thai Female">Thai Female</option><option value="Thai Male">Thai Male</option><option value="Turkish Female">Turkish Female</option><option value="Turkish Male">Turkish Male</option><option value="Ukrainian Female">Ukrainian Female</option><option value="Vietnamese Female">Vietnamese Female</option><option value="Vietnamese Male">Vietnamese Male</option><option value="Afrikaans Male">Afrikaans Male</option><option value="Albanian Male">Albanian Male</option><option value="Bosnian Male">Bosnian Male</option><option value="Catalan Male">Catalan Male</option><option value="Croatian Male">Croatian Male</option><option value="Esperanto Male">Esperanto Male</option><option value="Icelandic Male">Icelandic Male</option><option value="Latvian Male">Latvian Male</option><option value="Macedonian Male">Macedonian Male</option><option value="Moldavian Female">Moldavian Female</option><option value="Moldavian Male">Moldavian Male</option><option value="Montenegrin Male">Montenegrin Male</option><option value="Serbian Male">Serbian Male</option><option value="Serbo-Croatian Male">Serbo-Croatian Male</option><option value="Swahili Male">Swahili Male</option><option value="Welsh Male">Welsh Male</option><option value="Fallback UK Female">Fallback UK Female</option></select>&nbsp;&nbsp;&nbsp;<button id="playbutton" class="butt js--triggerAnimation" type="button" value="Play"><img draggable="false" role="img" class="emoji" alt="▶️" src="./demo_files/25b6.svg"> Play </button>
        </div>
        <div id="playshield" class="poweredby_container"><svg viewBox="-50 -50 612 612" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg"><filter id="black-glow"><fecolormatrix type="matrix" values="0 0 0 0.6   0  0 0 0 0   0  0 0 0 0   0  0 0 0 1 0"></fecolormatrix><fegaussianblur id="filterblur" stdDeviation="0" result="coloredBlur"></fegaussianblur><femerge><femergenode in="coloredBlur"></femergenode><femergenode in="SourceGraphic"></femergenode></femerge></filter><g style="filter:url(#black-glow)">
            <path id="svg_1" d="m71,460l-41,-460l451,0l-41,460l-185,52" fill="#c10908"></path>
            <path id="svg_2" d="m256,472l149,-41l35,-394l-184,0" fill="#e62e42"></path></g><image xlink:href="//responsivevoice.org/wp-content/uploads/2015/06/mouth.png" id="svg_4" height="311" width="285" y="95" x="114"></image></svg>
      </div>
    </div>

    HTML,

        'js' => <<<JS
        dataLayer = [];
      
        (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-KM8QP7L');
         
        var keyboardMap = [
            "", // [0]
            "", // [1]
            "", // [2]
            "CANCEL", // [3]
            "", // [4]
            "", // [5]
            "HELP", // [6]
            "", // [7]
            "BACK SPACE", // [8]
            "TAB", // [9]
            "", // [10]
            "", // [11]
            "CLEAR", // [12]
            "ENTER", // [13]
            "ENTER_SPECIAL", // [14]
            "", // [15]
            "SHIFT", // [16]
            "CONTROL", // [17]
            "ALT", // [18]
            "PAUSE", // [19]
            "CAPS LOCK", // [20]
            "KANA", // [21]
            "EISU", // [22]
            "JUNJA", // [23]
            "FINAL", // [24]
            "HANJA", // [25]
            "", // [26]
            "ESCAPE", // [27]
            "CONVERT", // [28]
            "NONCONVERT", // [29]
            "ACCEPT", // [30]
            "MODECHANGE", // [31]
            "SPACE", // [32]
            "PAGE UP", // [33]
            "PAGE DOWN", // [34]
            "END", // [35]
            "HOME", // [36]
            "LEFT", // [37]
            "UP", // [38]
            "RIGHT", // [39]
            "DOWN", // [40]
            "SELECT", // [41]
            "PRINT", // [42]
            "EXECUTE", // [43]
            "PRINTSCREEN", // [44]
            "INSERT", // [45]
            "DELETE", // [46]
            "", // [47]
            "0", // [48]
            "1", // [49]
            "2", // [50]
            "3", // [51]
            "4", // [52]
            "5", // [53]
            "6", // [54]
            "7", // [55]
            "8", // [56]
            "9", // [57]
            "COLON", // [58]
            "SEMICOLON", // [59]
            "LESS THAN", // [60]
            "EQUALS", // [61]
            "GREATER THAN", // [62]
            "QUESTION MARK", // [63]
            "AT", // [64]
            "A", // [65]
            "B", // [66]
            "C", // [67]
            "D", // [68]
            "E", // [69]
            "F", // [70]
            "G", // [71]
            "H", // [72]
            "I", // [73]
            "J", // [74]
            "K", // [75]
            "L", // [76]
            "M", // [77]
            "N", // [78]
            "O", // [79]
            "P", // [80]
            "Q", // [81]
            "R", // [82]
            "S", // [83]
            "T", // [84]
            "U", // [85]
            "V", // [86]
            "W", // [87]
            "X", // [88]
            "Y", // [89]
            "Z", // [90]
            "OS KEY", // [91] Windows Key (Windows) or Command Key (Mac)
            "", // [92]
            "CONTEXT MENU", // [93]
            "", // [94]
            "SLEEP", // [95]
            "NUMPAD 0", // [96]
            "NUMPAD 1", // [97]
            "NUMPAD 2", // [98]
            "NUMPAD 3", // [99]
            "NUMPAD 4", // [100]
            "NUMPAD 5", // [101]
            "NUMPAD 6", // [102]
            "NUMPAD 7", // [103]
            "NUMPAD 8", // [104]
            "NUMPAD 9", // [105]
            "MULTIPLY", // [106]
            "ADD", // [107]
            "SEPARATOR", // [108]
            "SUBTRACT", // [109]
            "DECIMAL", // [110]
            "DIVIDE", // [111]
            "F1", // [112]
            "F2", // [113]
            "F3", // [114]
            "F4", // [115]
            "F5", // [116]
            "F6", // [117]
            "F7", // [118]
            "F8", // [119]
            "F9", // [120]
            "F10", // [121]
            "F11", // [122]
            "F12", // [123]
            "F13", // [124]
            "F14", // [125]
            "F15", // [126]
            "F16", // [127]
            "F17", // [128]
            "F18", // [129]
            "F19", // [130]
            "F20", // [131]
            "F21", // [132]
            "F22", // [133]
            "F23", // [134]
            "F24", // [135]
            "", // [136]
            "", // [137]
            "", // [138]
            "", // [139]
            "", // [140]
            "", // [141]
            "", // [142]
            "", // [143]
            "NUM LOCK", // [144]
            "SCROLL LOCK", // [145]
            "WIN_OEM_FJ_JISHO", // [146]
            "WIN_OEM_FJ_MASSHOU", // [147]
            "WIN_OEM_FJ_TOUROKU", // [148]
            "WIN_OEM_FJ_LOYA", // [149]
            "WIN_OEM_FJ_ROYA", // [150]
            "", // [151]
            "", // [152]
            "", // [153]
            "", // [154]
            "", // [155]
            "", // [156]
            "", // [157]
            "", // [158]
            "", // [159]
            "CIRCUMFLEX", // [160]
            "EXCLAMATION", // [161]
            "DOUBLE QUOTE", // [162]
            "HASH", // [163]
            "DOLLAR", // [164]
            "PERCENT", // [165]
            "AMPERSAND", // [166]
            "UNDERSCORE", // [167]
            "OPEN PAREN", // [168]
            "CLOSE PAREN", // [169]
            "ASTERISK", // [170]
            "PLUS", // [171]
            "PIPE", // [172]
            "HYPHEN MINUS", // [173]
            "OPEN CURLY BRACKET", // [174]
            "CLOSE CURLY BRACKET", // [175]
            "TILDE", // [176]
            "", // [177]
            "", // [178]
            "", // [179]
            "", // [180]
            "VOLUME MUTE", // [181]
            "VOLUME DOWN", // [182]
            "VOLUME UP", // [183]
            "", // [184]
            "", // [185]
            "SEMICOLON", // [186]
            "EQUALS", // [187]
            "COMMA", // [188]
            "MINUS", // [189]
            "PERIOD", // [190]
            "SLASH", // [191]
            "BACK QUOTE", // [192]
            "", // [193]
            "", // [194]
            "", // [195]
            "", // [196]
            "", // [197]
            "", // [198]
            "", // [199]
            "", // [200]
            "", // [201]
            "", // [202]
            "", // [203]
            "", // [204]
            "", // [205]
            "", // [206]
            "", // [207]
            "", // [208]
            "", // [209]
            "", // [210]
            "", // [211]
            "", // [212]
            "", // [213]
            "", // [214]
            "", // [215]
            "", // [216]
            "", // [217]
            "", // [218]
            "OPEN BRACKET", // [219]
            "BACK SLASH", // [220]
            "CLOSE BRACKET", // [221]
            "QUOTE", // [222]
            "", // [223]
            "META", // [224]
            "ALTGR", // [225]
            "", // [226]
            "WIN_ICO_HELP", // [227]
            "WIN_ICO_00", // [228]
            "", // [229]
            "WIN_ICO_CLEAR", // [230]
            "", // [231]
            "", // [232]
            "WIN_OEM_RESET", // [233]
            "WIN_OEM_JUMP", // [234]
            "WIN_OEM_PA1", // [235]
            "WIN_OEM_PA2", // [236]
            "WIN_OEM_PA3", // [237]
            "WIN_OEM_WSCTRL", // [238]
            "WIN_OEM_CUSEL", // [239]
            "WIN_OEM_ATTN", // [240]
            "WIN_OEM_FINISH", // [241]
            "WIN_OEM_COPY", // [242]
            "WIN_OEM_AUTO", // [243]
            "WIN_OEM_ENLW", // [244]
            "WIN_OEM_BACKTAB", // [245]
            "ATTN", // [246]
            "CRSEL", // [247]
            "EXSEL", // [248]
            "EREOF", // [249]
            "PLAY", // [250]
            "ZOOM", // [251]
            "", // [252]
            "PA1", // [253]
            "WIN_OEM_CLEAR", // [254]
            "" // [255]
        ];
  
    var voicelist = responsiveVoice.getVoices();
    var vselect = $("#voiceselection");
    $.each(voicelist, function() {
        vselect.append($("<option >").val(this.name).text(this.name));
    });

    playbutton.onclick = function() {
        responsiveVoice.speak( ($('#text').val()) ? $('#text').val() : $('#text').attr("placeholder"), $('#voiceselection').val());$('#text').focus();
    };

    playshield.onclick = function() {
        responsiveVoice.speak( ($('#text').val()) ? $('#text').val(): $('#text').attr("placeholder"),$('#voiceselection').val());
        $('#text').focus();
    };
    $('#voicetestdiv').hide();
    $('#waitingdiv').show();
    responsiveVoice.OnVoiceReady = function() {
        $('#voicetestdiv').fadeIn(0.5);
        $('#waitingdiv').fadeOut(0.5);
        $('#text').focus();
        $('#voiceselection').val('UK English Female')}

    var voicelist = responsiveVoice.getVoices();
    var vselect = $("#voiceselection");
    $.each(voicelist, function() {
        vselect.append($("<option >").val(this.name).text(this.name));
    });

    playbutton.onclick = function() {
        responsiveVoice.speak( ($('#text').val()) ? $('#text').val() : $('#text').attr("placeholder"), $('#voiceselection').val());$('#text').focus();
    };

    playshield.onclick = function() {
        responsiveVoice.speak( ($('#text').val()) ? $('#text').val(): $('#text').attr("placeholder"),$('#voiceselection').val());
        $('#text').focus();
    };
    $('#voicetestdiv').hide();
    $('#waitingdiv').show();
    responsiveVoice.OnVoiceReady = function() {
        $('#voicetestdiv').fadeIn(0.5);
        $('#waitingdiv').fadeOut(0.5);
        $('#text').focus();
        $('#voiceselection').val('UK English Female')}

    var voicelist = responsiveVoice.getVoices();
    var vselect = $("#voiceselection");
    $.each(voicelist, function() {
        vselect.append($("<option >").val(this.name).text(this.name));
    });

    playbutton.onclick = function() {
        responsiveVoice.speak( ($('#text').val()) ? $('#text').val() : $('#text').attr("placeholder"), $('#voiceselection').val());$('#text').focus();
    };

    playshield.onclick = function() {
        responsiveVoice.speak( ($('#text').val()) ? $('#text').val(): $('#text').attr("placeholder"),$('#voiceselection').val());
        $('#text').focus();
    };
    $('#voicetestdiv').hide();
    $('#waitingdiv').show();
    responsiveVoice.OnVoiceReady = function() {
        $('#voicetestdiv').fadeIn(0.5);
        $('#waitingdiv').fadeOut(0.5);
        $('#text').focus();
        $('#voiceselection').val('UK English Female')}

    var voicelist = responsiveVoice.getVoices();
    var vselect = $("#voiceselection");
    $.each(voicelist, function() {
        vselect.append($("<option >").val(this.name).text(this.name));
    });

    playbutton.onclick = function() {
        responsiveVoice.speak( ($('#text').val()) ? $('#text').val() : $('#text').attr("placeholder"), $('#voiceselection').val());$('#text').focus();
    };

    playshield.onclick = function() {
        responsiveVoice.speak( ($('#text').val()) ? $('#text').val(): $('#text').attr("placeholder"),$('#voiceselection').val());
        $('#text').focus();
    };
    $('#voicetestdiv').hide();
    $('#waitingdiv').show();
    responsiveVoice.OnVoiceReady = function() {
        $('#voicetestdiv').fadeIn(0.5);
        $('#waitingdiv').fadeOut(0.5);
        $('#text').focus();
        $('#voiceselection').val('UK English Female')}

    var voicelist = responsiveVoice.getVoices();
    var vselect = $("#voiceselection");
    $.each(voicelist, function() {
        vselect.append($("<option >").val(this.name).text(this.name));
    });

    playbutton.onclick = function() {
        responsiveVoice.speak( ($('#text').val()) ? $('#text').val() : $('#text').attr("placeholder"), $('#voiceselection').val());$('#text').focus();
    };

    playshield.onclick = function() {
        responsiveVoice.speak( ($('#text').val()) ? $('#text').val(): $('#text').attr("placeholder"),$('#voiceselection').val());
        $('#text').focus();
    };
    $('#voicetestdiv').hide();
    $('#waitingdiv').show();
    responsiveVoice.OnVoiceReady = function() {
        $('#voicetestdiv').fadeIn(0.5);
        $('#waitingdiv').fadeOut(0.5);
        $('#text').focus();
        $('#voiceselection').val('UK English Female')}

    var voicelist = responsiveVoice.getVoices();
    var vselect = $("#voiceselection");
    $.each(voicelist, function() {
        vselect.append($("<option >").val(this.name).text(this.name));
    });

    playbutton.onclick = function() {
        responsiveVoice.speak( ($('#text').val()) ? $('#text').val() : $('#text').attr("placeholder"), $('#voiceselection').val());$('#text').focus();
    };

    playshield.onclick = function() {
        responsiveVoice.speak( ($('#text').val()) ? $('#text').val(): $('#text').attr("placeholder"),$('#voiceselection').val());
        $('#text').focus();
    };
    $('#voicetestdiv').hide();
    $('#waitingdiv').show();
    responsiveVoice.OnVoiceReady = function() {
        $('#voicetestdiv').fadeIn(0.5);
        $('#waitingdiv').fadeOut(0.5);
        $('#text').focus();
        $('#voiceselection').val('UK English Female')}

    var voicelist = responsiveVoice.getVoices();
    var vselect = $("#voiceselection");
    $.each(voicelist, function() {
        vselect.append($("<option >").val(this.name).text(this.name));
    });

    playbutton.onclick = function() {
        responsiveVoice.speak( ($('#text').val()) ? $('#text').val() : $('#text').attr("placeholder"), $('#voiceselection').val());$('#text').focus();
    };

    playshield.onclick = function() {
        responsiveVoice.speak( ($('#text').val()) ? $('#text').val(): $('#text').attr("placeholder"),$('#voiceselection').val());
        $('#text').focus();
    };
    $('#voicetestdiv').hide();
    $('#waitingdiv').show();
    responsiveVoice.OnVoiceReady = function() {
        $('#voicetestdiv').fadeIn(0.5);
        $('#waitingdiv').fadeOut(0.5);
        $('#text').focus();
        $('#voiceselection').val('UK English Female')}

    var voicelist = responsiveVoice.getVoices();
    var vselect = $("#voiceselection");
    $.each(voicelist, function() {
        vselect.append($("<option >").val(this.name).text(this.name));
    });

    playbutton.onclick = function() {
        responsiveVoice.speak( ($('#text').val()) ? $('#text').val() : $('#text').attr("placeholder"), $('#voiceselection').val());$('#text').focus();
    };

    playshield.onclick = function() {
        responsiveVoice.speak( ($('#text').val()) ? $('#text').val(): $('#text').attr("placeholder"),$('#voiceselection').val());
        $('#text').focus();
    };
    $('#voicetestdiv').hide();
    $('#waitingdiv').show();
    responsiveVoice.OnVoiceReady = function() {
        $('#voicetestdiv').fadeIn(0.5);
        $('#waitingdiv').fadeOut(0.5);
        $('#text').focus();
        $('#voiceselection').val('UK English Female')}

    var voicelist = responsiveVoice.getVoices();
    var vselect = $("#voiceselection");
    $.each(voicelist, function() {
        vselect.append($("<option >").val(this.name).text(this.name));
    });

    playbutton.onclick = function() {
        responsiveVoice.speak( ($('#text').val()) ? $('#text').val() : $('#text').attr("placeholder"), $('#voiceselection').val());$('#text').focus();
    };

    playshield.onclick = function() {
        responsiveVoice.speak( ($('#text').val()) ? $('#text').val(): $('#text').attr("placeholder"),$('#voiceselection').val());
        $('#text').focus();
    };
    $('#voicetestdiv').hide();
    $('#waitingdiv').show();
    responsiveVoice.OnVoiceReady = function() {
        $('#voicetestdiv').fadeIn(0.5);
        $('#waitingdiv').fadeOut(0.5);
        $('#text').focus();
        $('#voiceselection').val('UK English Female')}

    var voicelist = responsiveVoice.getVoices();
    var vselect = $("#voiceselection");
    $.each(voicelist, function() {
        vselect.append($("<option >").val(this.name).text(this.name));
    });

    playbutton.onclick = function() {
        responsiveVoice.speak( ($('#text').val()) ? $('#text').val() : $('#text').attr("placeholder"), $('#voiceselection').val());$('#text').focus();
    };

    playshield.onclick = function() {
        responsiveVoice.speak( ($('#text').val()) ? $('#text').val(): $('#text').attr("placeholder"),$('#voiceselection').val());
        $('#text').focus();
    };
    $('#voicetestdiv').hide();
    $('#waitingdiv').show();
    responsiveVoice.OnVoiceReady = function() {
        $('#voicetestdiv').fadeIn(0.5);
        $('#waitingdiv').fadeOut(0.5);
        $('#text').focus();
        $('#voiceselection').val('UK English Female')}

    var voicelist = responsiveVoice.getVoices();
    var vselect = $("#voiceselection");
    $.each(voicelist, function() {
        vselect.append($("<option >").val(this.name).text(this.name));
    });

    playbutton.onclick = function() {
        responsiveVoice.speak( ($('#text').val()) ? $('#text').val() : $('#text').attr("placeholder"), $('#voiceselection').val());$('#text').focus();
    };

    playshield.onclick = function() {
        responsiveVoice.speak( ($('#text').val()) ? $('#text').val(): $('#text').attr("placeholder"),$('#voiceselection').val());
        $('#text').focus();
    };
    $('#voicetestdiv').hide();
    $('#waitingdiv').show();
    responsiveVoice.OnVoiceReady = function() {
        $('#voicetestdiv').fadeIn(0.5);
        $('#waitingdiv').fadeOut(0.5);
        $('#text').focus();
        $('#voiceselection').val('UK English Female')}

    var voicelist = responsiveVoice.getVoices();
    var vselect = $("#voiceselection");
    $.each(voicelist, function() {
        vselect.append($("<option >").val(this.name).text(this.name));
    });

    playbutton.onclick = function() {
        responsiveVoice.speak( ($('#text').val()) ? $('#text').val() : $('#text').attr("placeholder"), $('#voiceselection').val());$('#text').focus();
    };

    playshield.onclick = function() {
        responsiveVoice.speak( ($('#text').val()) ? $('#text').val(): $('#text').attr("placeholder"),$('#voiceselection').val());
        $('#text').focus();
    };
    $('#voicetestdiv').hide();
    $('#waitingdiv').show();
    responsiveVoice.OnVoiceReady = function() {
        $('#voicetestdiv').fadeIn(0.5);
        $('#waitingdiv').fadeOut(0.5);
        $('#text').focus();
        $('#voiceselection').val('UK English Female')}

    var voicelist = responsiveVoice.getVoices();
    var vselect = $("#voiceselection");
    $.each(voicelist, function() {
        vselect.append($("<option >").val(this.name).text(this.name));
    });

    playbutton.onclick = function() {
        responsiveVoice.speak( ($('#text').val()) ? $('#text').val() : $('#text').attr("placeholder"), $('#voiceselection').val());$('#text').focus();
    };

    playshield.onclick = function() {
        responsiveVoice.speak( ($('#text').val()) ? $('#text').val(): $('#text').attr("placeholder"),$('#voiceselection').val());
        $('#text').focus();
    };
    $('#voicetestdiv').hide();
    $('#waitingdiv').show();
    responsiveVoice.OnVoiceReady = function() {
        $('#voicetestdiv').fadeIn(0.5);
        $('#waitingdiv').fadeOut(0.5);
        $('#text').focus();
        $('#voiceselection').val('UK English Female')}
JS,

        'css' => <<<CSS
     .poweredby_container{
            float: right;
            width: 100px;
        }
        .voiceform{
            float: left;
        }
        @media (min-width: 320px) and (max-width: 480px) {
            .poweredby_container{
                float: none;
                margin: 15px auto;
                display: none;
            }
            #voiceselection {
                max-width: 180px;
            }
            .voiceform{
                float: none;
            }
        }
        
          img.wp-smiley,
        img.emoji {
            display: inline !important;
            border: none !important;
            box-shadow: none !important;
            height: 1em !important;
            width: 1em !important;
            margin: 0 .07em !important;
            vertical-align: -0.1em !important;
            background: none !important;
            padding: 0 !important;
            cursor: pointer;

        }
CSS,

    ];

    public function asset()
    {
        $this->fileCss('/render/audios/assets/audio/responciveVoice/demo_files/modal.min.css');
        
        $this->fileJs('/render/audios/assets/audio/responciveVoice/demo_files/responsivevoice.js');

    }

    /**
     *
     * Function  option
     * https://demos.krajee.com/widget-details/select2#settings
     */

    public function codes()
    {
        $this->htm = strtr($this->_layout['button'], [

        ]);
        $this->htm .= strtr($this->_layout['js'], [

        ]);
         $this->htm .= strtr($this->_layout['css'], [

     ]);



    }

}
