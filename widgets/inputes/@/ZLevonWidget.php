<?php

/**
 *
 *
 * Author:  Asror Zakirov
 * Created By :ElnurController Suyunov
 * https://www.linkedin.com/in/asror-zakirov
 * https://www.facebook.com/asror.zakirov
 * https://github.com/asror-z
 *
 */

namespace zetsoft\widgets\inputes;


use zetsoft\system\kernels\ZWidget;

class ZLevonWidget extends ZWidget
{
    public function asset()
    {
        $this->fileCss('//cdnjs.cloudflare.com/ajax/libs/require.js/2.3.6/require.min.js');
    }

    public $config = [];
    public $_config = [
        '{elFinderConfig}' => 'elFinderConfig',

    ];


    public $layout = [];
    public $_layout = [


        'main' => <<<HTML
      <iframe src="demo_iframe.htm" height="200" width="300">
        <div id="{id}-elfinder"></div>
      </iframe>  

HTML,

        'js' => <<<JS
         	define('elFinderConfig', {

			// elFinder options (REQUIRED)
			// Documentation for client options:
			// https://github.com/Studio-42/elFinder/wiki/Client-configuration-options
			defaultOpts : {
			url : '/render/Elfinder/elFinder/php/connector.maximal.php', // or connector.maximal.php : connector URL (REQUIRED)
				commandsOptions : {
					edit : {
						extraOptions : {
							// set API key to enable Creative Cloud image editor
							// see https://console.adobe.io/
							creativeCloudApiKey : '',
							// browsing manager URL for CKEditor, TinyMCE
							// uses self location with the empty value
							managerUrl : ''
						}
					},
					quicklook : {
						// to enable CAD-Files and 3D-Models preview with sharecad.org
						sharecadMimes : ['image/vnd.dwg', 'image/vnd.dxf', 'model/vnd.dwf', 'application/vnd.hp-hpgl', 'application/plt', 'application/step', 'model/iges', 'application/vnd.ms-pki.stl', 'application/sat', 'image/cgm', 'application/x-msmetafile'],
						// to enable preview with Google Docs Viewer
						googleDocsMimes : ['application/pdf', 'image/tiff', 'application/vnd.ms-office', 'application/msword', 'application/vnd.ms-word', 'application/vnd.ms-excel', 'application/vnd.ms-powerpoint', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/vnd.openxmlformats-officedocument.presentationml.presentation', 'application/postscript', 'application/rtf'],
						// to enable preview with Microsoft Office Online Viewer
						// these MIME types override "googleDocsMimes"
						officeOnlineMimes : ['application/vnd.ms-office', 'application/msword', 'application/vnd.ms-word', 'application/vnd.ms-excel', 'application/vnd.ms-powerpoint', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/vnd.openxmlformats-officedocument.presentationml.presentation', 'application/vnd.oasis.opendocument.text', 'application/vnd.oasis.opendocument.spreadsheet', 'application/vnd.oasis.opendocument.presentation']
					}
				},
				// bootCalback calls at before elFinder boot up
				bootCallback : function(fm, extraObj) {
					/* any bind functions etc. */

					fm.bind('init', function() {
					
						
					});
					fm.bind('select', function(event) { // called on file(s) select/unselect
						
						var files= fm.selected();
						var hash =files[0];
						var encPath = hash.substr(hash.indexOf('_')+1);
						// full path of selected file
						// encFilePath  
						var path ='render'+'/'+atob(encPath.replace(/\-/g, '+').replace(/_/g, '/').replace(/\./g, '=')) ;
						 // search
						 
					

						var selectedFilesOf = fm.selectedFiles();
						var fileMime = selectedFilesOf[0].mime;

						var	some = selectedFilesOf[0].hash;
						if (fileMime === 'text/x-php'){
							$("#"+ some).dblclick(function (event) {
								event.stopPropagation();
								window.open('http://eyuf.zettest.uz/core/tester/asror/main.aspx?path='+path, '_blank');

							});
						}
					});
					fm.bind('click', function (event) {
						
					});
					 
					// for example set document.title dynamically.
					var title = document.title;
					fm.bind('open', function() {
						var path = '',
								cwd  = fm.cwd();
						if (cwd) {
							path = fm.path(cwd.hash) || null;
						}
						document.title = path? path + ':' + title : title;
					}).bind('destroy', function() {
						document.title = title;
					});
				}
			},
			managers : {
				// 'DOM Element ID': { /* elFinder options of this DOM Element */ }
				'elfinder': {}
			},

			contextmenu : {
				// navbarfolder menu
				navbar : ['custom', 'open', '|', 'copy', 'cut', 'paste', 'duplicate', '|', 'rm', '|', 'info'],

				// current directory menu
				cwd    : ['reload', 'back', '|', 'upload', 'mkdir', 'mkfile', 'paste', '|', 'info'],

				// current directory file menu
				files  : [
					'getfile', '|', 'custom', 'open', 'quicklook', '|', 'download', '|', 'copy', 'cut', 'paste', 'duplicate', '|',
					'rm', '|', 'edit', 'rename', 'resize', '|', 'archive', 'extract', '|', 'info'
				]
			},
		});
JS,
    ];

    public function codes()
    {

        $this->htm = strtr($this->_layout['main'], [
            '{id}' => $this->id,
        ]);

        $this->js = strtr($this->_layout['js'], [

            '{elFinderConfig}' => $this->_config = ['elFinderConfig'],
        ]);

    }
}
