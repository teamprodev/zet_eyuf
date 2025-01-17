
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,400,700' rel='stylesheet' type='text/css'>
    <link  rel="stylesheet" href="demo_files/css/style.css">
    <!--[if lt IE 9]>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.min.js"></script>
    <![endif]-->
    <title>Squeezebox home</title>
</head>
<body>
<div class="wrap">
    <header class="page_header">
        <em class="logo">
            S
        </em>
        <h1>
            Squeezebox<span class="understate-me">.js</span>
        </h1>
        <h2>
            a fast & minimal Vanilla Js accordion script
        </h2>
        <hr>
        <nav class="main-nav">
            <ul>
                <li><a href="#setup">
                        Setup
                    </a></li>
                <li><a href="#advanced">
                        A slightly more advanced usage
                    </a></li>
                <li><a href="#callbacks">
                        Accordion with callbacks
                    </a></li>
                <li><a href="#docs">
                        Docs
                    </a></li>
                <li><a href="#dwl">
                        Download
                    </a></li>
            </ul>
        </nav>
    </header>
    <div class="page_content">
        <p class="catchline">
            Squeezebox.js is a minimal Vanilla JavaScript plugin that makes adding accordions to any website or app a metter of seconds. <br>
            It's powered by CSS3 transitions for increased performance, weighs around 1kb minified and Gziped and requires no extra library.
        </p>
        <p>
            If you fancy a jQuery version instead you can get it <a href="https://github.com/nobitagit/squeezebox">here</a>.
        </p>
        <h3 id="setup">
            Setup
        </h3>
        <p>
            Squeezebox.js works out of the box. It expects a very minimal structure and does not add any DIVs or other HTML tags. It comes with predefined, overridable classes for its elements.<br>Here's the minimum required layout the plugin needs:
        </p>
        <code>
            &lt;div class="squeezebox"&gt; <br>
            &nbsp;&lt;div class="squeezhead"&gt; <br>
            &nbsp;&nbsp;header #1 <br>
            &nbsp;&lt;/div&gt; <br>
            &nbsp;&lt;div class="squeezecnt"&gt; <br>
            &nbsp;&nbsp;here goes the content <br>
            &nbsp;&lt;/div&gt; <br>
            &lt;/div&gt; <br>
        </code>
        <p>
            In your js file create a new instance of Squeezebox and fire the script with init():
        </p>
        <code>
            var squeezebox = new Squeezebox(); <br>
            squeezebox.init();
        </code>
        <p>
            Here's the result:
        </p>
        <section class="squeezebox accordion-base">
            <header class="squeezhead">
                <p>Click me</p>
            </header>
            <div class="squeezecnt">
                <p>You clicked me.</p>
            </div>

            <header class="squeezhead">
                <p>Hit me</p>
            </header>
            <div class="squeezecnt">
                <p>Ouch!</p>
            </div>

            <header class="squeezhead">
                <p>Toggle me</p>
            </header>
            <div class="squeezecnt">
                <p>Here I am.</p>
            </div>

            <header class="squeezhead">
                <p>Press me</p>
            </header>
            <div class="squeezecnt">
                <p>This is just a default accordion...scroll for more options!</p>
            </div>
        </section>

        <code class="with-arrow-up">
            var squeezebox = new Squeezebox(); <br>
            squeezebox.init();
        </code>

        <h3 id="advanced">
            A slightly more advanced usage
        </h3>
        <p>
            The plugin comes with out-of-the-box, predefined classes for both the headers and the togglable content. At the same time by no means you are bound to use those. Just pass your classes as options of the plugin.
        </p>
        <p>
            In the following example we're also defining a different speed of the opening/closing animation. Another option passed makes sure that open folders are not automatically closed when a new one is opened.
        </p>
        <p>
            Further details in the <a href="#docs">docs</a>.
        </p>
        <section id="squeezebox-2" class="accordion-base">
            <header class="myheader">
                <p>We open</p>
            </header>
            <div class="mycontent">
                <p>your content here</p>
            </div>

            <header class="myheader">
                <p>A little</p>
            </header>
            <div class="mycontent">
                <p>your content here</p>
            </div>

            <header class="myheader">
                <p>Bit faster</p>
            </header>
            <div class="mycontent">
                <p>your content here</p>
            </div>

            <header class="myheader">
                <p>Then the others</p>
            </header>
            <div class="mycontent">
                <p>your content here</p>
            </div>
        </section>
        <code class="with-arrow-up">
            var squeezebox2 = new Squeezebox({<br>
            <br>
            &nbsp;&nbsp;wrapperEl : '#squeezebox-2',<br>
            &nbsp;&nbsp;headersClass : 'myheader',<br>
            &nbsp;&nbsp;foldersClass : 'mycontent',<br>
            &nbsp;&nbsp;closeOthers : false, <br>
            &nbsp;&nbsp;speed : '.3s'<br>
            <br>
            });<br>
            squeezebox2.init();
        </code>
        <h3 id="callbacks">
            Accordion with callbacks
        </h3>
        <p>
            Along with the set of option shown above the plugin offers two different callbacks you can hook to. One is fired when opening a folder, the other when closing it. Both expose the whole object created at init time. <br> This allows for easy access to the elements such as the headers and the folders so, for example, we can toggle classes when the accordion is used.
        </p>
        <p>
            Further details in the <a href="#docs">docs</a>.
        </p>
        <section id="squeezebox-3"  class="accordion-base">
            <header class="squeezhead">
                <p>Nice arrows</p>
                <span class="icon-arrow-right"></span>
            </header>
            <div class="squeezecnt">
                <p>your content here</p>
            </div>

            <header class="squeezhead">
                <p>Header #2</p>
                <span class="icon-arrow-right"></span>
            </header>
            <div class="squeezecnt">
                <p>your content here</p>
            </div>

            <header class="squeezhead">
                <p>Header #3</p>
                <span class="icon-arrow-right"></span>
            </header>
            <div class="squeezecnt">
                <p>your content here</p>
            </div>

            <header class="squeezhead">
                <p>Header #4</p>
                <span class="icon-arrow-right"></span>
            </header>
            <div class="squeezecnt">
                <p>your content here</p>
            </div>
        </section>
        <code class="with-arrow-up">
            $('.accordion-3').squeezebox({ <br>
            &nbsp; <span class="comment">// make sure you pass your parameters <br>
						&nbsp;  // to the function so you <br>
						&nbsp; // can gain acces to the elements you need </span><br>
            &nbsp;&nbsp;onOpen: function(wrapper, clickedHeader, content){ <br>
            &nbsp;&nbsp;&nbsp;clickedHeader.classList.add('accordion_open') <br>
            &nbsp;}, <br>
            &nbsp;&nbsp;onClose: function (event){ <br>
            &nbsp;&nbsp;&nbsp;clickedHeader.classList.remove('accordion_open') <br>
            &nbsp;}	<br>
            });
        </code>
        <h3 id="docs">
            Docs
        </h3>
        <p>
            CSS3 transitions are leveraged to get buttery smooth, fast and lightweight animation to the toggling event, both on desktop and mobile. This means the plugin natively targets modern browsers that can render CSS transitions. <br>
            Thus, it made sense (to me at least!) to leave legacy support out of the core, providing a much lighter plugin and relying on polyfills when fallback is needed.
        </p>
        <p>
            If you need a fallback for older browsers you can either provide support through polyfills (look <a href="https://github.com/eligrey/classList.js/blob/master/classList.min.js">here</a> and <a href="https://github.com/jonathantneal/Polyfills-for-IE8">here</a>) - but note that it's currently untested - or try the <a href="https://github.com/nobitagit/squeezebox">jQuery version</a> of this same plugin.
        </p>
        <p>
            Squeezebox is configured to work out-of-the-box if the default html structure is provided. Any option can be overridden during instantiation, though. <br>
            Here is a full overview of the configuration settings.
        </p>
        <dl class="the-api">
            <dt>wrapperEl</dt>
            <dd>
                <i>(property/string)</i> Wrapper id or class where the plugin will fire.
            </dd>
            <dt>headersClass</dt>
            <dd>
                <i>(property/string)</i> the class of the headers of each folder <b>(no dot here)</b>.
            </dd>
            <dt>foldersClass</dt>
            <dd>
                <i>(property/string)</i> the class of the folders that get shown/hidden by the plugin <b>(no dot here)</b>.
            </dd>
            <dt>closeOthers</dt>
            <dd>
                <i>(property/boolean)</i> if set to true only one folder per accordion can be open at one time. If false the user will be able to see the content of multiple folders at once.
            </dd>
            <dt>speed</dt>
            <dd>
                <i>(property/string)</i> set the speed of the animation (e.g. '.5s'). Set to 0 to avoid animation.
            </dd>
            <dt>onOpen</dt>
            <dd>
                <i>(method/function)</i> callback fired when opening a folder. Pass up to three parameters to the function to gain access to the wrapper, the clicked header and the opening/closing div. <br>
                For example if function(el1, el2, el3){} is passed:
                <ul>
                    <li><b>el1</b>: the wrapping div where the whole plugin fires</li>
                    <li><b>el2</b>: the heading that was clicked</li>
                    <li><b>el3</b>: the related div that is toggled</li>
                </ul>
            </dd>
            <dt>onClose</dt>
            <dd>
                <i>(method/function)</i> Callback fired when closing a folder. Same API as previous method.
            </dd>
        </dl>
        <p>
            These are the default values that get used if no options are passed.
        </p>
        <code>
            $('.accordion-wrap').squeezebox({ <br>
            &nbsp;wrapperEl: '.squeezebox', <br>
            &nbsp;headersClass: 'squeezhead', <br>
            &nbsp;foldersClass: 'squeezecnt', <br>
            &nbsp;closeOthers: true, <br>
            &nbsp;speed : '.7s' <br>
            });
        </code>
        <h3 id="dwl">
            Download
        </h3>
        <p>
            You can fork or download the latest version of the plugin directly from the github repo.
        </p>
        <p>
            <a href="https://github.com/nobitagit/squeezebox-vanilla" class="button">
                Project on Github
            </a>
        </p>
    </div>
    <footer class="page_footer">
        <a href="https://github.com/nobitagit"><span class="icon-github"></span></a>&nbsp;&nbsp;<a href="https://twitter.com/aureliari"><span class="icon-twitter"></span></a>&nbsp;
    </footer>
</div>

<script type="text/javascript" src="squeezebox.js"></script>
<script>

    var squeezebox = new Squeezebox();
    squeezebox.init();

    var squeezebox2 = new Squeezebox({
        wrapperEl : '#squeezebox-2',
        headersClass : 'myheader',
        foldersClass : 'mycontent',
        closeOthers : false,
        speed: '.3s'
    });
    squeezebox2.init();

    var squeezebox3 = new Squeezebox({
        wrapperEl : '#squeezebox-3',
        // make sure you pass the el
        onOpen : function(wrapper, clickedHeader, content){
            clickedHeader.classList.add('accordion_open')
        },
        onClose : function(wrapper, clickedHeader, content){
            clickedHeader.classList.remove('accordion_open');
        }
    });
    squeezebox3.init();
</script>
</body>
</html>
