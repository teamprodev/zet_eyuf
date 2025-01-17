<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2">
    <title>elFinder 2.1.x source version with PHP connector</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
<div id="elfinder"></div>
<script src="//cdnjs.cloudflare.com/ajax/libs/require.js/2.3.6/require.min.js"></script>
<script>require(['/render/blocks/ZElfinderWidget/main.default.js'])</script>
<script>
    define('elFinderConfig', {
        // elFinder options (REQUIRED)
        // Documentation for client options:
        // https://github.com/Studio-42/elFinder/wiki/Client-configuration-options
        defaultOpts: {
            url: '/core/tester/asror/elfinder.aspx', // or connector.maximal.php : connector URL (REQUIRED)
			contextmenu: {
				// navbarfolder menu
				navbar: ['open', '|', 'copy', 'cut', 'paste', 'duplicate', '|', 'rm', '|', 'info'],
				// current directory menu
				cwd: ['reload', 'back', '|', 'upload', 'mkdir', 'mkfile', 'paste', '|', 'sort', '|', 'info'],
				// current directory file menu
				files: ['getfile', '|', 'custom', 'quicklook', 'editimage', '|', 'download', '|', 'copy', 'cut', 'paste', 'duplicate', '|', 'rm', '|', 'edit', 'rename', 'resize', '|', 'archive', 'extract', '|', 'info']
			},
			uiOptions: {
				// toolbar configuration
				toolbar: [

					/* ['back', 'forward'],*/
					['reload'],
					['home', 'up'],
					['mkdir', 'mkfile', 'upload'],
					['open', 'download', 'getfile'],
					['info'],
					['quicklook', 'editimage'],
					['copy', 'cut', 'paste'],
					['rm'],
					['duplicate', 'rename', 'edit', 'resize'],
					['extract', 'archive'],
					['search'],
					['view'],
					['help']
				],

				// directories tree options
				tree: {
					// expand current root on init
					openRootOnLoad: true,
					// auto load current dir parents
					syncTree: true
				},

				// navbar options
				navbar: {
					minWidth: 150,
					maxWidth: 500
				},

				// current working directory options
				cwd: {
					// display parent directory in listing as ".."
					oldSchool: false
				}
			},
            commandsOptions: {
                edit: {
                    extraOptions: {
                        // set API key to enable Creative Cloud image editor
                        // see https://console.adobe.io/
                        creativeCloudApiKey: '',
                        // browsing manager URL for CKEditor, TinyMCE
                        // uses self location with the empty value
                        managerUrl: ''
                    }
                },
                quicklook: {
                    // to enable CAD-Files and 3D-Models preview with sharecad.org
                    sharecadMimes: ['image/vnd.dwg', 'image/vnd.dxf', 'model/vnd.dwf', 'application/vnd.hp-hpgl', 'application/plt', 'application/step', 'model/iges', 'application/vnd.ms-pki.stl', 'application/sat', 'image/cgm', 'application/x-msmetafile'],
                    // to enable preview with Google Docs Viewer
                    googleDocsMimes: ['application/pdf', 'image/tiff', 'application/vnd.ms-office', 'application/msword', 'application/vnd.ms-word', 'application/vnd.ms-excel', 'application/vnd.ms-powerpoint', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/vnd.openxmlformats-officedocument.presentationml.presentation', 'application/postscript', 'application/rtf'],
                    // to enable preview with Microsoft Office Online Viewer
                    // these MIME types override "googleDocsMimes"
                    officeOnlineMimes: ['application/vnd.ms-office', 'application/msword', 'application/vnd.ms-word', 'application/vnd.ms-excel', 'application/vnd.ms-powerpoint', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/vnd.openxmlformats-officedocument.presentationml.presentation', 'application/vnd.oasis.opendocument.text', 'application/vnd.oasis.opendocument.spreadsheet', 'application/vnd.oasis.opendocument.presentation']
                }
            },
			commands: [
				'custom', 'open', 'reload', 'home', 'up', 'back', 'forward', 'getfile', 'quicklook', 'editimage',
				'download', 'rm', 'duplicate', 'editimage', 'rename', 'mkdir', 'mkfile', 'upload', 'copy',
				'cut', 'paste', 'edit', 'extract', 'archive', 'search', 'info', 'view', 'help', 'resize', 'sort', 'netmount'
			],
        /*    Callback: function (fm) {
                fm.onclick = function () {
                    event.stopPropagation();
                    window.open('/core/tester/asror/main.aspx?path=' + path, '_blank');
                };

            },*/
            // bootCalback calls at before elFinder boot up
            bootCallback: function (fm, extraObj) {
                /* any bind functions etc. */

                fm.bind('init', function () {
                    // any your code
                });
                fm.bind('select', function (event) { // called on file(s) select/unselect

                    var files = fm.selected();
                    var hash = files[0];
                    var encPath = hash.substr(hash.indexOf('_') + 1);
                    // full path of selected file
                    // encFilePath
                    var path = 'render' + '/' + atob(encPath.replace(/\-/g, '+').replace(/_/g, '/').replace(/\./g, '='));
                    // search


                    var selectedFilesOf = fm.selectedFiles();
                    var some = selectedFilesOf[0].hash;
                    console.log(selectedFilesOf);

                    $("#" + some).dblclick(function (event) {
                        if (!$("#" + some).hasClass('directory')) {
                            event.stopPropagation();
                            window.open('/core/tester/asror/main.aspx?path=' + path, '_blank');

                        } else {
                        }
                        /*event.stopPropagation();
                        window.open('http://eyuf.zettest.uz/core/tester/asror/main.aspx?path='+path, '_blank');*/

                    });


                });


                // for example set document.title dynamically.
                var title = document.title;
                fm.bind('open', function () {

                    var path = '',
                        cwd = fm.cwd();
                    /*onclick=function (){
                        window.open('http://eyuf.zettest.uz/core/tester/asror/main.aspx?path='+path, '_blank');
                    };*/
                    if (cwd) {
                        path = fm.path(cwd.hash) || null;
                    }
                    document.title = path ? path + ':' + title : title;
                }).bind('destroy', function () {
                    document.title = title;
                });

            }

        },
        managers: {
            // 'DOM Element ID': { /* elFinder options of this DOM Element */ }
            'elfinder': {}
        },

      
      

    });
</script>
<script>
    $('.elfinder-button-icon-open').parent().click(function () {
        console.log('salom')
    })
</script>

</body>
</html>




