<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>GrapesJS Plugin</title>
    <link rel="stylesheet" href="https://unpkg.com/grapesjs/dist/css/grapes.min.css">
    <script src="https://unpkg.com/grapesjs"></script>
    <script src="https://cdn.jsdelivr.net/npm/grapesjs-plugin-forms@1.0.5/dist/grapesjs-plugin-forms.min.js"></script>
</head>
<body>

<div id="gjs" style="height:0px; overflow:hidden">
    <form action="index.html" method="post" style="padding: 50px;">
        <input type="hidden" name="hidden-input" value="someval">
        <div class="row">
            <label>Name</label>
            <input type="text" name="text-input" value="">
        </div>
        <div class="row">
            <label>Messagge</label>
            <textarea name="textarea-input"></textarea>
        </div>
        <div class="row">
            <label>Options</label>
            <select name="select-input">
                <option value="">- Select -</option>
                <option value="1">Value 1</option>
                <option value="2">Value 2</option>
                <option value="3">Value 3</option>
            </select>
        </div>
        <div class="row">
            <input type="checkbox" name="checkbox-input" value="1"> Test
        </div>
        <div class="row">
            <input type="radio" name="radio-input" value="1"> 1
            <input type="radio" name="radio-input" value="2"> 2
            <input type="radio" name="radio-input" value="3"> 3
        </div>
        <button type="button" name="button-name">Send</button>
    </form>
    <style>
    </style>
</div>


<script type="text/javascript">
    var editor = grapesjs.init({
        height: '1000px',
        noticeOnUnload: 0,
        storageManager:{autoload: 0},
        container : '#gjs',
        fromElement: true,
        plugins: ['gjs-plugin-forms'],
        pluginsOpts: {
            'gjs-plugin-forms': {}
        }
    });
    window.editor = editor;
</script>
</body>
</html>