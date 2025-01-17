<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width minimum-scale=1.0 maximum-scale=1.0 user-scalable=no" />
    <title>My webpage</title>
    <link href="path/to/my-styles.css" rel="stylesheet" />
    <link href="path/to/mmenu.css" rel="stylesheet" />
    <link href="path/to/mburger.css" rel="stylesheet" />
    <style>
        .mburger {
            width: 80px;
            height: 80px;
            --mb-bar-height: 2px;
        }
    </style>
</head>
<body>
<div id="my-page">
    <div id="my-header">
        <a class="mburger mburger--collapse" href="#my-menu">
            <b></b>
            <b></b>
            <b></b>
            <span>Menu</span>
        </a>
        <nav id="my-menu">
            <ul>
                <li><a href="/">Home</a></li>
                <li><span>About us</span>
                    <ul>
                        <li><a href="/about/history/">History</a></li>
                        <li"><a href="/about/team/">The team</a></li>
                        <li><a href="/about/address/">Our address</a></li>
                    </ul>
                </li>
                <li><a href="/contact/">Contact</a></li>
            </ul>
        </nav>
    </div>
    <div id="my-content">
        <h1>Page title</h1>
        <p>Some content.</p>
    </div>
</div>
<script src="path/to/mmenu.js"></script>
<script>
    document.addEventListener(
        "DOMContentLoaded", () => {
            new Mmenu( "#my-menu" );
        }
    );
</script>
</body>
</html>
