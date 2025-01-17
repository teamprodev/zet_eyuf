<!doctype html>
<html>
<head>
    <meta charset="utf-8">

    <?

    /**
     * Author: Sardor Elmurodov
     */


    use zetsoft\assets\grapes\ZGrapePluginActionsAsset;
    ZGrapePluginActionsAsset::register($this);
    ?>
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
        }
    </style>
</head>
<body>

<div id="gjs" style="height:0%; overflow:hidden">
    <div style="margin:100px 100px 25px; padding:25px; font:caption">
        This is a demo content from index.html. For the development, you shouldn't edit this file, instead you can
        copy and rename it to _index.html, on next server start the new file will be served, and it will be ignored by git.
    </div>

    <p>sardor</p>
</div>


<script type="text/javascript">
    var editor = grapesjs.init({
        height: '100%',
        showOffsets: 1,
        noticeOnUnload: 0,
        storageManager: {autoload: 0},
        container: '#gjs',
        fromElement: true,
        plugins: ['gjs-blocks-basic', 'gjs-plugin-actions'],
        pluginsOpts: {
            'gjs-plugin-actions': {

            },
            'gjs-blocks-basic': {
                flexGrid: 1
            }
        }
    });
    window.editor = editor;
</script>
<link href="https://unpkg.com/grapesjs/dist/css/grapes.min.css" rel="stylesheet"/>
<script src="https://unpkg.com/grapesjs"></script>
<script src="path/to/grapesjs-plugin-actions.min.js"></script>

<div id="gjs"></div>
<script type="text/javascript">
    var editor = grapesjs.init({
        container : '#gjs',

            plugins: ['gjs-plugin-actions'],
        pluginsOpts: {
        'gjs-plugin-actions': {
            textCleanCanvas:'Are you sure you want to clean the canvas?'   ,
            cleanBtnTitle:'Clean the canvas'   ,
            importBtnTitle:'Import'   ,
            undoBtnTitle:'Undo'   ,
            redoBtnTitle:'Redo'   ,
            modalImportLabel:'',
            modalImportContent:'',
            modalImportButton:'Import',
            modalImportTitle:'Import',
         
        }
    }
    });
</script>

</body>
</html>
