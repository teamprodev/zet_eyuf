<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Search in list</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.css">

    <title>Easy Search</title>
    <style>
        .container {
            width: 50%;
            margin: 50px auto;
        }
        .column {
            margin-bottom: 20px;
        }


    </style>
</head>





<div class="ui container">
    <div class="column">
        <div class="ui input focus">
            <input type="text" placeholder="Search...">
        </div>
    </div>

    <div class="column">
        <ul class="ui middle aligned selection list">
            <li class="item">

                <div class="content">
                    <div class="header"><P>
                            bfgnfgjnhgrtuyyjquery.min.js: 2 Uncaught TypeError: Bootstrap's tooltips require Popper.js
                        </P></div>
                </div>
            </li>

            <li class="item">

                <div class="content">
                    <div class="header"><p>
                            rtuyyjquery.min.js: 2 Uncaught TypeError: Bootstrap's tooltips require Popper.js
                        </p></div>
                </div>
            </li>
            <li class="item">

                <div class="content">
                    <div class="header"><p>
                            fkgimjquery.min.js: tttiii 2 Uncaught TypeError: Bootstrap's tooltips require Popper.js
                        </p></div>
                </div>
            </li>
            <li class="item">

                <div class="content">
                    <div class="header"><p>
                            dfvdvjquery.min.js: 2 Uncaught TypeError: Bootstrap's tooltips require Popper.js
                        </p></div>
                </div>
            </li>
            <li class="item">

                <div class="content">
                    <div class="header"><p>
                            sdfbsf.min.js: 2 Uncaught TypeError: Bootstrap's tooltips require Popper.js
                        </p></div>
                </div>
            </li>
            <!--<li class="item">
                <img class="ui avatar image" src="http://semantic-ui.com/images/avatar/small/christian.jpg">
                <div class="content">
                    <div class="header">Christian</div>
                </div>
            </li>
            <li class="item">
                <img class="ui avatar image" src="http://semantic-ui.com/images/avatar/small/daniel.jpg">
                <div class="content">
                    <div class="header">Daniel</div>
                </div>
            </li>
            <li class="item">
                <img class="ui avatar image" src="http://semantic-ui.com/images/avatar/small/christian.jpg">
                <div class="content">
                    <div class="header">Marybelle</div>
                </div>
            </li>
            <li class="item">
                <img class="ui avatar image" src="http://semantic-ui.com/images/avatar/small/helen.jpg">
                <div class="content">
                    <div class="header">Joeann</div>
                </div>
            </li>
            <li class="item">
                <img class="ui avatar image" src="http://semantic-ui.com/images/avatar/small/christian.jpg">
                <div class="content">
                    <div class="header">Fallon</div>
                </div>
            </li>
            <li class="item">
                <img class="ui avatar image" src="http://semantic-ui.com/images/avatar/small/daniel.jpg">
                <div class="content">
                    <div class="header">Arturo</div>
                </div>
            </li>-->
        </ul>
    </div>

    <!--  <div class="column">
          <div class="ui input focus">
              <input type="text" placeholder="Search...">
          </div>
      </div>-->

</div>


<script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js">

</script>

<script src="https://cdn.statically.io/gh/Archakov06/jQuery-easySearch/master/dist/jquery.easysearch.js"></script>
<script>
    $('input').jSearch({
        selector  : 'ul',
        child : 'li div.header',
        minValLength: 0,
        Found : function(elem, event){
            $(elem).parent().parent().show();
        },
        NotFound : function(elem, event){
            $(elem).parent().parent().hide();
        },
        After : function(t){
            if (!t.val().length) $('ul li').show();
        }
    });
</script>

