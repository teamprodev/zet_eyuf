<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>GrapesJS Plugin Boilerplate</title>
    <link href="https://unpkg.com/grapesjs/dist/css/grapes.min.css" rel="stylesheet">
    <script src="https://unpkg.com/grapesjs"></script>
    <script src="https://unpkg.com/grapesjs-plugin-header"></script>
    <style>
        body,
        html {
            height: 100%;
            margin: 0;
        }
    </style>
</head>
<body>

<div id="gjs" style="height:0px; overflow:hidden">
    <div class="form-group highlight-addon row field-loginform-name required">
        <label class="col-form-label has-star col-md-4" for="loginform-name">Имя пользователя</label>
        <div class="col-md-8">
            <input id="loginform-name" class="form-control" name="LoginForm[name]" placeholder="Введите Имя пользователя">

            <div class="help-block invalid-feedback"></div>
        </div>
    </div>
</div>


<script type="text/javascript">
    var editor = grapesjs.init({
        height: '1000px',
        showOffsets: 1,
        noticeOnUnload: 0,
        storageManager: { autoload: 0 },
        container: '#gjs',
        fromElement: true,
        plugins: ['grapesjs-plugin-header'],
        pluginsOpts: {
            'grapesjs-plugin-header': {
            Size: 'h1'
            }
        }
    });
    window.editor = editor;
</script>
</body>
</html>
