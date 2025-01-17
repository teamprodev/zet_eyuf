<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>GrapesJS Bootstrap v4 Blocks Plugin</title>
    <link href="https://unpkg.com/grapesjs/dist/css/grapes.min.css" rel="stylesheet">
    <script src="https://unpkg.com/grapesjs"></script>
    <script src="https://cdn.jsdelivr.net/npm/grapesjs-blocks-bootstrap4@0.1.16/dist/grapesjs-blocks-bootstrap4.min.js"></script>
</head>
<body>

<div id="gjs" style="height:0px; overflow:hidden">
    <style>
        body {
            background-color: #f4ebf3;
        }
        header {
            margin-top: 4rem;
        }
        h1, h2, h3, h4, h5, h6,
        .h1, .h2, .h3, .h4, .h5, .h6 {
            color: #9f5497;
        }
        .jumbotron {
            background-color: #d0bace;
        }
    </style>
    <!--<div style="margin:100px 100px 25px; padding:25px; font:caption">
      This is a demo content from index.html. For the development, you shouldn't edit this file, instead you can
      copy and rename it to _index.html, on next server start the new file will be served, and it will be ignored by git.
    </div>-->
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <header class="header clearfix">
                    <h1>GrapesJS Bootstrap v4 Blocks Plugin</h1>
                </header>
                <main role="main">
                    <div class="jumbotron">
                        <h1 class="display-4">Hello!</h1>
                        <p class="lead">This is demo content from <code>index.html</code>. For development, you shouldn't edit this file. Instead, you can copy and rename it to <code>_index.html</code>. The next time the server starts, the new file will be served, and it will be ignored by git.</p>
                    </div>
                </main>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-1"><div>Col</div></div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-1"><div>Col</div></div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-1"><div>Col</div></div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-1"><div>Col</div></div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-1"><div>Col</div></div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-1"><div>Col</div></div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-1"><div>Col</div></div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-1"><div>Col</div></div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-1"><div>Col</div></div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-1"><div>Col</div></div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-1"><div>Col</div></div>
            <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-1"><div>Col</div></div>
        </div>

        <div class="row">
            <div class="col">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#messages" role="tab">Messages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Settings</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="home" role="tabpanel">Home</div>
                    <div class="tab-pane" id="profile" role="tabpanel">Profile</div>
                    <div class="tab-pane" id="messages" role="tabpanel">Messages</div>
                    <div class="tab-pane" id="settings" role="tabpanel">Settings</div>
                </div>
            </div>
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
        showDevices: false,
        plugins: ['grapesjs-blocks-bootstrap4'],
        pluginsOpts: {
            'grapesjs-blocks-bootstrap4': {
                blocks: {
                    default:true,
                    text:true,
                    link:true,
                    image:true,
                    container:true,
                    row:true,
                    column:true,
                    column_break:true,
                    media_object:true,
                    alert:true,
                    tabs:true,
                    badge:true,
                    card:true,
                    card_container:true,
                    collapse:true,
                    dropdown:true,
                    header:true,
                    paragraph:true,
                    button:true,
                    button_group:true,
                    button_toolbar:true,
                    input:true,
                    input_group:true,
                    form_group_input:true,
                    textarea:true,
                    checkbox:true,
                    radio:true,

                    blockCategories: {
                        layout:true,
                        components:true,
                        typography:true,
                        basic:true,
                        forms:true,
                    }
                },
                labels: {
                    text:"text",
                    header:"header"
                },
                gridDevicesPanel: true,
                formPredefinedActions: [
                    {name: 'Contact', value: '/contact'},
                    {name: 'landing', value: '/landing'},
                ]
            }
        },
        canvas: {
            styles: [
                'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css'
            ],
            scripts: [
                'https://code.jquery.com/jquery-3.3.1.slim.min.js',
                'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js',
                'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'
            ],
        }
    });
    window.editor = editor;
</script>
</body>
</html>