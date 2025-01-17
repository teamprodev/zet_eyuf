<?php

/**
 *
 *
 * Author:  Asror Zakirov
 * https://www.linkedin.com/in/asror-zakirov
 * https://github.com/asror-z
 *
 */

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <title>Garlic.js</title>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta name="description" content="">
 <meta name="author" content="">

 <!-- Le styles -->
 <link href="./resources/bootstrap-2.3.2.css" rel="stylesheet">
 <link href="./resources/docs.css" rel="stylesheet">
 <link href="http://yandex.st/highlightjs/7.3/styles/github.min.css" rel="stylesheet">

 <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
 <!--[if lt IE 9]>
 <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
 <![endif]-->

 <style>
  body {
   display: block;
   padding: 10px 10%;
   padding-top: 0;
   margin: auto;
  }

  h1.affix {
   display: block;
  }

  #head-download {
   float: right;
  }

  .download a, .download a:hover {
   text-decoration:none;
  }

  .container {
   margin-top: 0;
  }

  pre {
   margin: 10px 0 15px 0;
  }

  .affix {
   position: fixed;
   clear: both;
  }

  .bs-docs-sidenav.affix {
   top: 200px;
  }

  #parsley {
   top: 250px;
   right: 60px;
   /*            padding: 25px;*/
   width: 250px;
   position: fixed;
   clear: both;
   line-height: 1.7em;
   font-size: 1.3em;
  }

  #parsley a {
   font-weight: bolder;
  }

  #demonstration {
   padding-top: 0;
  }

  .garlic-swap {
   /* twitter bootstrap alert */
   padding: 6px 35px 6px 14px;
   margin-bottom: 20px;
   color: #C09853;
   text-shadow: 0 1px 0 rgba(255, 255, 255, 0.5);
   background-color: #FCF8E3;
   border: 1px solid #FBEED5;
   -webkit-border-radius: 4px;
   -moz-border-radius: 4px;
   border-radius: 4px;

   /* twitter bootstrap alert-info */
   color: #3A87AD;
   background-color: #D9EDF7;
   border-color: #BCE8F1;

   /* garlic custo */
   cursor: pointer;
   margin-left: 5px;
   padding: 4px 6px;
   height: 20px;
  }
 </style>
 <link rel="icon" type="image/ico" href="resources/favicon.ico">
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="100">
<a href="https://github.com/guillaumepotier/garlic.js"><img style="position: fixed; top: 0; right: 0; border: 0; z-index:9999" src="https://s3.amazonaws.com/github/ribbons/forkme_right_orange_ff7600.png" alt="Fork me on GitHub"></a>
<a name="top"></top>
 <div class="container">
  <h1 class="">
   <img src="resources/garlicjs.png">

   <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://garlicjs.org" data-text="Garlic.js: allows you to automatically persist your forms' text field values locally, until the form is submitted" data-size="large"></a>
   <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

   <iframe src="http://ghbtns.com/github-btn.html?user=guillaumepotier&repo=garlic.js&type=watch&count=true"
           allowtransparency="true" frameborder="0" scrolling="0" width="90" height="25"></iframe>
   <iframe src="http://ghbtns.com/github-btn.html?user=guillaumepotier&repo=garlic.js&type=fork&count=true"
           allowtransparency="true" frameborder="0" scrolling="0" width="90" height="25"></iframe>

   <img src="https://secure.travis-ci.org/guillaumepotier/Garlic.js.png?branch=master" />
  </h1>

  <div class="row well intro">
   <div id="head-download" class="download">
    <a href="https://github.com/guillaumepotier/Garlic.js/archive/1.3.0.zip">
     <img width="90" border="0" src="http://github.com/images/modules/download/zip.png" onclick="onclick=”var that=this;_gaq.push(['_trackEvent','Download','ZIP',this.href]);setTimeout(function(){location.href=that.href;},200);return false;”">
    </a>
    <a href="https://github.com/guillaumepotier/Garlic.js/archive/1.3.0.tar.gz">
     <img width="90" border="0" src="http://github.com/images/modules/download/tar.png" onclick="onclick=”var that=this;_gaq.push(['_trackEvent','Download','TAR',this.href]);setTimeout(function(){location.href=that.href;},200);return false;”">
    </a>
   </div>

   <p>
    Garlic.js allows you to automatically persist your forms' text field values locally, until the form is submitted. This way, your users don't lose any precious data if they accidentally close their tab or browser.
   </p>
   <p>
    It strives to have a javascript agnostic interface for UI/UX developers that might want to use it. Just add some <code>data-persist="garlic"</code> in your form tags, and you're good to go!
   </p>
  </div>

  <div class="row row-content">
   <div class="span3 bs-docs-sidenav">
    <ul class="nav nav-list bs-docs-sidenav affix">
     <li><a href="#demonstration"><i class="icon-chevron-right"></i> Demonstration</a></li>
     <li><a href="#requirements"><i class="icon-chevron-right"></i> Requirements / Compatibility</a></li>
     <li><a href="#download"><i class="icon-chevron-right"></i> Download</a></li>
     <li><a href="#usage"><i class="icon-chevron-right"></i> Usage</a></li>
     <li><a href="#documentation"><i class="icon-chevron-right"></i> Documentation</a></li>
     <li><a href="#they-use"><i class="icon-chevron-right"></i> They use Garlic.js !</a></li>
     <li><a href="#other"><i class="icon-chevron-right"></i> Other stuff</a></li>
     <li><a href="#licence"><i class="icon-chevron-right"></i> Version / Licence</a></li>
    </ul>
    <p id="parsley" class="alert alert-block">
     <a class="close" data-dismiss="alert" href="#">&times;</a>
     <span class="label label-important"> New! </span><br/> Have a look to Garlicjs little brother (or sister, as you want), <a href="http://parsleyjs.org" target="_blank">Parsley.js: validate all your forms frontend without writing a single line of javascript!</a>
    </p>
   </div>

   <div class="span9 doc-content">
    <section id="demonstration">
     <div class="page-header">
      <h1>Demonstration <small>some magic..</small></h1>
     </div>

     <a name="demo1"></a>
     <form data-persist="garlic" method="POST">
      <fieldset>
       <legend>1 - Simple form</legend><br/>
       <label for="field1">Forms are independent. All text data is locally persisted thanks to localStorage<br/>
        if browser supports it. If you reload this page, quit and go back here, your<br/>
        data will still be there. On simple validation, if you press the submit button<br/>
        the persisted data will be destroyed, considering it has properly been submitted</label>
       <input type="text" name="mytext" id="field1"/><br/>
       <textarea name="textarea"></textarea>
       <br/>

       <label for="select"></label>
       <select id="select">
        <option value="hello">Hello</option>
        <option value="world">World</option>
        <option value="i">I</option>
        <option value="am">Am</option>
        <option value="persisted">Persisted</option>
       </select>
       <br/>

       <label class="radio">
        yes <input type="radio" name="radio1" value="yes" />&nbsp;
       </label>
       <label class="radio">
        no <input type="radio" name="radio1" value="no" />&nbsp;
       </label>
       <label class="radio">
        maybe <input type="radio" name="radio1" value="maybe" />
       </label>
       <br/>

       <label class="checkbox">
        I <input type="checkbox" name="checkbox[]" value="I">&nbsp;
       </label>
       <label class="checkbox">
        will <input type="checkbox" name="checkbox[]" value="will">&nbsp;
       </label>
       <label class="checkbox">
        be <input type="checkbox" name="checkbox[]" value="be">&nbsp;
       </label>
       <label class="checkbox">
        persisted <input type="checkbox" name="checkbox[]" value="persisted">
       </label>
       <br/>

       Submit and Reset buttons will destroy the fields stored data. Try it out!<br/><br/>
       <input type="submit" class="btn"/>
       <input type="reset" class="btn"/>
      </fieldset>
     </form>
     <a href="#top" class="pull-right">Top</a>

     <a name="demo2"></a>
     <form data-persist="garlic"  method="POST">
      <fieldset>
       <legend>2 - Form with non-persisted fields</legend><br/>
       This field will be locally persisted while submit button is not triggered<br/>
       <input type="text" name="mytext" /><br/>

       Thise textarea will never be persisted since it has the <code>data-storage="false"</code> attribute<br/>
       <textarea name="textarea" data-storage="false"></textarea><br/>
       <input type="submit" class="btn"/>
      </fieldset>
     </form>
     <a href="#top" class="pull-right">Top</a>

     <a name="demo3"></a>
     <form data-persist="garlic" method="POST">
      <fieldset>
       <legend>3 - Custom javascript or ajax validation</legend><br/>
       <label for="ajax-test">This field will be locally persisted while js test not ok. Could be useful<br/>
        with some AJAX behaviour. Here text will be persisted only if < 10 chars</label>
       <input type="text" id="ajax-test" name="myajaxtext" /> <span id="indicator"></span><br/>
      </fieldset>
     </form>

     <a name="demo4"></a>
     <form data-persist="garlic" data-destroy="false" data-expires="20" method="POST">
      <fieldset>
       <legend>4 - Auto expiration</legend><br/>
       <label for="expiration-test">This field will be locally persisted during 20 seconds, not one more! Try to refresh!</label>
       <input type="text" id="expiration-test" name="myajaxtext" /> <span id="auto-expires-indicator"></span>
      </fieldset>
     </form>

     <a name="demo5"></a>
     <form id="conflicted-form" method="POST">
      <fieldset>
       <legend>5 - Manage database and localStorage conflict</legend><br/>
       <label for="hello-world">These inputs have default values, let's say for example, database retrieved values. Try to edit them, and then, refresh the page!</label><br/>
       <form data-persist="garlic" method="POST">
        <div>
         <input type="text" id="hello-world" name="hello-world" value="Hello" /><br/>
         <select id="select">
          <option value="hello">Hello</option>
          <option selected value="world">World</option>
         </select><br/>
        </div>
        <input type="reset" class="btn"/>
        <input type="submit" id="submit42" class="btn"/>
       </form>
      </fieldset>
     </form>
     <a href="#top" class="pull-right">Top</a>

     <a name="demo6"></a>
     <form data-persist="garlic" data-destroy="false" method="POST">
      <fieldset>
       <legend>6 - "Infinite" persistency</legend><br/>
       <label for="ajax-test">Use <code>data-destroy="false"</code> in your <code>&lt;form></code> to never remove localStorage persistency</label>

       <input type="text" id="infinite-persistency" name="infinite-persistency" /><br/>
       <input type="submit" class="btn"/><br/><br/>
       You still can destroy localStorage data on custom javascript events, try <u><a style="cursor:pointer;" onClick="javascript:$('#infinite-persistency').garlic('destroy');">this action</a></u> and then refresh the page to see the difference ;)
      </fieldset>
     </form>
     <a href="#top" class="pull-right">Top</a>
    </section>

    <section id="requirements">
     <div class="page-header">
      <h1>Requirements / Compatibility</h1>
     </div>
     Garlic is delivered to you in different builds (in the Github dist/ directory), here they are:<br/><br/>
     <ul>
      <li>
       <strong><a href="https://github.com/guillaumepotier/Garlic.js/tree/master/dist">Garlic.min.js: ~5K</a></strong>, requires jQuery or Zepto (with data module builded for Zepto, see <a href="https://github.com/guillaumepotier/Garlic.js/blob/master/CHANGELOG.md">changelog 0.0.6</a>
      </li><br/>
      <li>
       Native localStorage compatible only with "modern" browsers: IE8+, Chrome 4+, FF 4+, Safari 4+, Opera 11+. See more <a href="http://www.html5rocks.com/en/features/storage">here</a>.<br/>
       Here is an awesome plugin that extends storage for IE6 and IE7!: https://github.com/mattpowell/localstorageshim<br/>
       <strong>Use it that way with Garlic:</strong>
       <pre><code>&lt;!--[if lte IE 7]>
    &lt;script src="https://raw.github.com/mattpowell/localstorageshim/master/localstorageshim.min.js" type="text/javascript">&lt;/script></script>
         &lt;![endif]-->

         &lt;script src="http://code.jquery.com/jquery-1.8.2.min.js">&lt;/script>
             &lt;script src="garlic.js">&lt;/script></code></pre>
         </li>
         </ul>
         <a href="#top" class="pull-right">Top</a>
             </section>

             <section id="download">
             <div class="page-header">
             <h1>Download</h1>
             </div>
             <div id="download" class="download">
             <a href="https://github.com/guillaumepotier/Garlic.js/archive/1.4.2.zip" onclick="onclick=”var that=this;_gaq.push(['_trackEvent','Download','ZIP',this.href]);setTimeout(function(){location.href=that.href;},200);return false;”" >
             <img width="90" border="0" src="http://github.com/images/modules/download/zip.png">
             </a>
             <a href="https://github.com/guillaumepotier/Garlic.js/archive/1.4.2tar.gz" onclick="onclick=”var that=this;_gaq.push(['_trackEvent','Download','TAR',this.href]);setTimeout(function(){location.href=that.href;},200);return false;”">
             <img width="90" border="0" src="http://github.com/images/modules/download/tar.png">
             </a>
             </div>
             </section>

             <section id="usage">
             <div class="page-header">
             <h1>Usage</h1>
             </div>
             <ul>
             <li>
             <strong>Include jQuery or Zepto (if not already here) and garlic.js</strong><br/>
         <pre><code>&lt;script src="jquery.js"></script>
         &lt;script src="garlic.js"></script></code></pre>
      </li>
      <li>
       <strong>Add </strong><code>data-persist="garlic"</code><strong> to the forms you want to auto-persist</strong><br/>
       <pre><code>&lt;form data-persist="garlic" method="POST"></form></script></code></pre>
      </li>
     </ul>
     <h3>That's all! ;)</h3>
     <a href="#top" class="pull-right">Top</a>
    </section>

    <section id="documentation">
     <div class="page-header">
      <h1>Documentation</h1>
     </div>
     <p class="alert">Hey, all doc is not fully here. There are some useful config parameters in Garlic code, better directly have a look <a href="http://github.com/guillaumepotier/garlic.js">there</a>! ;)</p>
     <ul>
      <li>
       Want to specifically chart fields persisted by Garlic? Use the auto-added <code>class="garlic-auto-save"</code> class!<br/>
      </li>
      <li>
       Never destroy localStorage for a form: use <code>data-destroy="false"</code> <strong>(don't work on inputs separately, only on whole form inputs)</strong>
      </li>
      <li>
       Store form localStorage across all domain <strong>(by default, storage is specific to each pages)</strong>, use <code>data-domain="true"</code><br/>
      </li>
      <li>
       Manually call garlic in javascript<br/>
       <pre><code>&lt;script type="text/javascript">
  $( '[rel=persist]' ).garlic();
&lt;/script></code></pre>
      </li>
      <li>
       Destroy storage for an element <strong>(don't work on an entire form yet, only input by input)</strong><br/>
       <pre><code>&lt;script type="text/javascript">
  $( 'input.no_good' ).garlic( 'destroy' );
&lt;/script></code></pre>
      </li>
      <li>
       Be notified when Garlic retrieve a field val by a custom overridable <code>onRetrieve</code> callback:
       <pre><code>&lt;script type="text/javascript">
  $( 'input.no_good' ).garlic( {
      onRetrieve: function ( elem, retrievedValue ) {
          console.log( 'The retrieved value for ' + elem.name() + ' is : ' + retrievedValue );
      }
  } );
&lt;/script></code></pre>
      </li>
      <li>
       Be notified when Garlic persists a field val by a custom overridable <code>onPersist</code> callback:
       <pre><code>&lt;script type="text/javascript">
  $( 'input.no_good' ).garlic( {
      onPersist: function ( elem, storedValue ) {
          console.log( 'The persisted value for ' + elem.name() + ' is : ' + storedValue );
      }
  } );
&lt;/script></code></pre>
      </li>
      <li>
       Generate your own key-storage fields policy to avoid conflicts:
       <pre><code>&lt;script type="text/javascript">
  $( '#form' ).garlic( {
      getPath: function ( $elem ) {
          return $elem.attr( 'id' );
      }
  } );
&lt;/script></code></pre>
      </li>
     </ul>
     <a href="#top" class="pull-right">Top</a>
    </section>

    <section id="they-use">
     <div class="page-header">
      <h1>They use Garlic.js !</h1>
     </div>
     <ul>
      <li>
       <a href="http://wisembly.com/en/">Wisembly (Backend)</a>
      </li>
      <li>
       <a href="https://chrome.google.com/webstore/detail/simple-form-recovery/cieifohdikchafcbdjbcmkdiabggalhp">Chrome extension</a> by <a href="https://twitter.com/kornnflake">@kornnflake</a>
      </li>
      <li>
       <a href="https://github.com/willdurand/Propilex">Propilex</a>
      </li>
      <li>
       Feel free to contact me if your website use Garlic in a smart way! ;)
      </li>
     </ul>
    </section>

    <section id="other">
     <div class="page-header">
      <h1>Other stuff</h1>
     </div>
     <img src="https://secure.travis-ci.org/guillaumepotier/Garlic.js.png?branch=master" />
     <a href="tests/">Here is the test suite, have a look!</a> <br/><br/>
     Please, feel free to fork and contribute to this plugin, or just discuss ideas, enhancement requests in an <a href="https://github.com/guillaumepotier/garlic.js/issues?state=open">issue</a>.<br/><br/>
     You could also fix my english mistakes, add some more tests in the test suite, and much more! :)
     <br/>
     <a href="#top" class="pull-right">Top</a>
    </section>

    <section id="licence">
     <div class="page-header">
      <h1>Version / Licence</h1>
     </div>
     <a href="https://github.com/guillaumepotier/Garlic.js/blob/master/README.md">1.3.0 - MIT</a> - <a href="https://github.com/guillaumepotier/Garlic.js/blob/master/CHANGELOG.md">See changelog</a>
     <a href="#top" class="pull-right">Top</a>
    </section>
   </div>
  </div>
 </div>

 <br/>
 <p>&copy; <a href="http://twitter.com/guillaumepotier" target="_blank">@guillaumepotier</a> 2012 <a href="http://wisembly.com/en/#garlic">@wisembly</a></p>

 <!--[if lte IE 7]>
 <script src="https://raw.github.com/mattpowell/localstorageshim/master/localstorageshim.min.js" type="text/javascript" id="ie-localstorage-shim"></script>
 <![endif]-->

    <script src="https://raw.github.com/mattpowell/localstorageshim/master/localstorageshim.min.js" type="text/javascript"></script>
 <script type="text/javascript" src="http://yandex.st/highlightjs/7.3/highlight.min.js"></script>
 <script src="http://twitter.github.com/bootstrap/assets/js/bootstrap-affix.js"></script>
 <script src="http://twitter.github.com/bootstrap/assets/js/bootstrap-scrollspy.js"></script>
 <script src="http://twitter.github.com/bootstrap/assets/js/bootstrap-alert.js"></script>

 <script type="text/javascript">
  hljs.initHighlightingOnLoad();

  $('#ajax-test').keyup( function () {
   if ($(this).val().length >= 10) {
    $('#ajax-test').garlic('destroy');
    $('#indicator').text("Won't be persisted!").removeClass("alert alert-success").addClass("alert alert-info");
    return;
   }

   $('#indicator').text("Will be persisted!").removeClass("alert alert-info").addClass("alert alert-success");
  });
  $( '#conflicted-form' ).garlic({
   conflictManager: {
    enabled: true
    , garlicPriority: true
    , template: '<span class="garlic-swap"></span>'
    , message: 'This is your saved data. Click here to choose between default or this data'
   }
  });
  window.onload = function () {
   if ( $( '#expiration-test').attr( 'expires-in' ) ) {
    $( '#auto-expires-indicator' ).text( ' Will auto destroy in ' + $( '#expiration-test').attr( 'expires-in' ) + ' seconds' );
   }
  }
 </script>
 <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36239082-1']);
  _gaq.push(['_trackPageview']);

  (function() {
   var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
   ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
   var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

 </script>
</body>
</html>

