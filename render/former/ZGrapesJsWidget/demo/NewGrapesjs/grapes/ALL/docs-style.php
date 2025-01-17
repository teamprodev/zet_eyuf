<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>GrapesJS Plugin Boilerplate</title>
    <?php


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
</div>


<script type="text/javascript">
    var editor = grapesjs.init({
        height: '100%',
        showOffsets: 1,
        noticeOnUnload: 0,
        storageManager: { autoload: 0 },
        container: '#gjs',
        fromElement: true,
        plugins: ['grapesjs-plugin-boilerplate'],
        pluginsOpts: {
            'grapesjs-plugin-boilerplate': { some: 'value' }
        }
    });
    window.editor = editor;

    
</script>
</body>
</html>
