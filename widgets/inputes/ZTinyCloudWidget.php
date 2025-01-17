<?php

namespace zetsoft\widgets\inputes;

use zetsoft\system\kernels\ZWidget;

/**
 * Class ZTinyCloudWidget
 * https://www.tiny.cloud/
 */
class ZTinyCloudWidget extends ZWidget
{
    /**
     * Configuration
     */

    public $dbType = dbTypeText;
    public $config = [];
    public $_config = [
    ];
    public static $grapes = [
        'enable' => true,
        'icon' => '',
        'image' => '/render/inputes/ZTinyCloudWidget/image/icon.png',
        'name' => Azl . 'TinyCloud',
        'title' => Azl.'<b>safasfsa</b>',

    ];
    /**
     *
     * Plugin Events
     * https://select2.org/programmatic-control/events
     */
    public $event = [];
    public $_event = [
        'change' => ' console.log("ZTinyCloudWidget | $eventChange") ',
        'open' => ' console.log("ZTinyCloudWidget | $eventOpen") ',
    ];

    /**
     *
     * Constants
     */
    public const theme = [
        'default' => 'default',
        'classic' => 'classic',
        'bootstrap' => 'bootstrap',
        'krajee' => 'krajee',
        'krajee-bs4' => 'krajee-bs4',
    ];

    public const size = [
        'lg' => 'lg',
        'md' => 'md',
        'sm' => 'sm'
    ];


    public $layout = [];
    public $_layout = [

        'main' => <<<HTML
            <div class="d-inline-block div1">
                <span>{placeholder}</span>
                <textarea id="{id}" name="{name}" value="{value}">{value}</textarea>
            </div>
HTML,
        'icon' => <<<HTML
          <div class="d-inline-block div2">
                <i class="icon-prefix prefix {icon}"></i>
          </div>
HTML,
        'jsCode' => <<<JS
              tinymce.init({
            selector: '#{id}',
            plugins: 'advlist anchor autolink autoresize autosave bbcode charmap code codesample colorpicker contextmenu directionality emoticons fullpage fullscreen help hr image imagetools importcss insertdatetime legacyoutput link lists media nonbreaking noneditable pagebreak preview print save searchreplace spellchecker tabfocus table template textcolor textpattern toc visualblocks visualchars wordcount',
            cache_suffix: '?v=4.1.6',
            hidden_input: false,
            init_instance_callback : function(editor) {
                console.log("Editor: " + editor.class + " is now initialized.");
            },

            referrer_policy: 'strict-origin-when-cross-origin',

            setup: function(editor) {
                editor.on('click', function (event) {
                    console.log('Editor was clicked');
                });
            },
            suffix: '.min',
            target: null,
            block_formats: 'Paragraph=p; Header 1=h1; Header 2=h2; Header 3=h3',
            branding: false,
            contextmenu: "link image imagetools table spellchecker configurepermanentpen",
            contextmenu_never_use_native: true,
            custom_ui_selector: '.my-custom-button',
            draggable_modal: true,
            elementpath: false,
            event_root: '#root',
            fixed_toolbar_container: '#mytoolbar',
            font_formats: 'Arial=arial,helvetica,sans-serif; Courier New=courier new,courier,monospace; AkrutiKndPadmini=Akpdmi-n',
            fontsize_formats: '11px 12px 14px 16px 18px 24px 36px 48px',
            height: 300,
            /*icons: 'material',
            icons_url: false,*/
            max_height: 500,
            max_width: 1520,
            menu: {
                file: { title: 'File', items: 'newdocument restoredraft | preview | print ' },
                view: { title: 'View', items: 'code | visualaid visualchars visualblocks | spellchecker | preview fullscreen' },
                const: { title: 'Insert', items: 'image link media template codesample inserttable | charmap emoticons hr | pagebreak nonbreaking anchor toc | insertdatetime' },
                tools: { title: 'Tools', items: 'spellchecker spellcheckerlanguage | code wordcount' },
                table: { title: 'Table', items: 'inserttable | cell row column | tableprops deletetable' },
                help: { title: 'Help', items: 'help' },
                format: { title: 'Format', items: 'casechange'},
                
            },
            menubar:12,
            min_height:300,            
            min_width: 400,
            mobile: {
                plugins: [ 'autosave', 'lists', 'autolink' ],
                toolbar: [ 'undo', 'bold', 'italic', 'styleselect' ]
            },
            preview_styles: false,
            mode: 'textareas',
            quickbars_insert_toolbar: false,
            quickbars_selection_toolbar: false,
            removed_menuitems: 'undo, redo',
            resize: 'both',
            // skin: "oxide",
          /*  
            skin_url:false,*/
            statusbar: true,
            style_formats: [
                { title: 'Headings', items: [
                        { title: 'Heading 1', format: 'h1' },
                        { title: 'Heading 2', format: 'h2' },
                        { title: 'Heading 3', format: 'h3' },
                        { title: 'Heading 4', format: 'h4' },
                        { title: 'Heading 5', format: 'h5' },
                        { title: 'Heading 6', format: 'h6' }
                    ]},
                { title: 'Inline', items: [
                        { title: '{Bold}', format: 'bold' },
                        { title: '{Italic}', format: 'italic' },
                        { title: 'Underline', format: 'underline' },
                        { title: 'Strikethrough', format: 'strikethrough' },
                        { title: 'Superscript', format: 'superscript' },
                        { title: 'Subscript', format: 'subscript' },
                        { title: 'Code', format: 'code' }
                    ]},
                { title: 'Blocks', items: [
                        { title: 'Paragraph', format: 'p' },
                        { title: 'Blockquote', format: 'blockquote' },
                        { title: 'Div', format: 'div' },
                        { title: 'Pre', format: 'pre' }
                    ]},
                { title: 'Align', items: [
                        { title: 'Left', format: 'alignleft' },
                        { title: 'Center', format: 'aligncenter' },
                        { title: 'Right', format: 'alignright' },
                        { title: 'Justify', format: 'alignjustify' }
                    ]},
                {title: 'Image Left', selector: 'img', styles: {
                        'float' : 'left',
                        'margin': '0 10px 0 10px'
                    }},
                {title: 'Image Right', selector: 'img', styles: {
                        'float' : 'right',
                        'margin': '0 10px 0 10px'
                    }},
            ],
            style_formats_autohide: true,
            style_formats_merge: true,
            theme: 'silver',
            theme_url: false,
            toolbar_drawer: 'floating',
            toolbar_sticky: true,
            width : '100%',

            /*
            https://www.tiny.cloud/docs/configure/content-appearance/
            */
             
            body_class: 'my_class',
            body_id: 'my_id',
            content_css : false,
            content_css_cors: true,
            content_style: false,
            inline_boundaries: false,
            inline_boundaries_selector: 'a[href],code,b,i,strong,em',
            color_cols: "5",
            color_map: [
                "000000", "Black",
                "808080", "Gray",
                "FFFFFF", "White",
                "FF0000", "Red",
                "FFFF00", "Yellow",
                "008000", "Green",
                "0000FF", "Blue",
                "C0C0C0", "Silver"
            ],
            toolbar: "forecolor anchor undo redo styleselect bold italic aligncenter alignjustify alignleft alignright backcolor copy cut restoredraft charmap code codesample ltr rtl emoticons fullpage fullscreen help hr image insertdatetime link media nonbreaking pagebreak pageembed paste pastetext preview print save searchreplace table tabledelete tableprops tablerowprops tablecellprops tableinsertrowbefore tableinsertrowafter tabledeleterow tableinsertcolbefore tableinsertcolafter tabledeletecol template toc visualblocks visualchars wordcount",
            custom_colors: false,
            visual_anchor_class: 'my-custom-class',
            visual_table_class: 'my-custom-class',
            allow_conditional_comments: true,
            allow_html_in_named_anchor: true,
            allow_unsafe_link_target: true,
            convert_fonts_to_spans : false,
            extended_valid_elements : 'mycustomblock[id],mycustominline',
            custom_elements : 'mycustomblock,~mycustominline',
            element : 'html',
            encoding: 'xml',
            entities : '160,nbsp,162,cent,8364,euro,163,pound',
            entity_encoding : "raw",
            fix_list_elements : true,
            forced_root_block : 'p',
            forced_root_block_attrs: {
                
            },
            invalid_elements : 'strong,em',
            invalid_styles: 'color font-size',
            keep_styles: false,
            protect: [
                /\<\/?(if|endif)\>/g,  // Protect <if> & </endif>
                /\<xsl\:[^>]+\>/g,  // Protect <xsl:...>
                /<\?php.*?\?>/g  // Protect php code
            ],
            remove_trailing_brs: false,
            schema: 'html5',
            valid_children : '+body[style],-body[div],p[strong|a|#text]',
            valid_classes: 'class1 class2 class3',
            valid_elements : 'a[href|target=_blank],strong/b,div[align],br',
            valid_styles: {
                '*': 'border,font-size',
                'div': 'width,height'
            },
            bold: [
                { inline: 'strong', remove: 'all' },
                { inline: 'span', styles: { fontWeight: 'bold' } },
                { inline: 'b', remove: 'all' }
            ],
            formats: {
                // Changes the default format for h1 to have a class of heading
                h1: { block: 'h1', classes: 'heading' },
                bold: { inline: 'span', classes: 'bold' },
                alignleft: { selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes: 'left' },
                aligncenter: { selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes: 'center' },
                alignright: { selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes: 'right' },
                alignjustify: { selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes: 'full' },
                underline: { inline: 'span', styles: { 'text-decoration': 'underline' }, exact: true },
                strikethrough: { inline: 'span', styles: { 'text-decoration': 'line-through' }, exact: true },
                'custom-wrapper': { block: 'div', classes: 'wrapper', wrapper: true },
                removeformat: [
                    // Configures `clear formatting` to remove specified elements regardless of it's attributes
                    { selector: 'b,strong,em,i,font,u,strike', remove: 'all' },

                    // Configures `clear formatting` to remove the class red from spans and if the element then becomes empty i.e has no attributes it gets removed
                    { selector: 'span', classes: 'red', remove: 'empty' },

                    // Configures `clear formatting` to remove the class green from spans and if the element then becomes empty it's left intact
                    { selector: 'span', classes: 'green', remove: 'none' },
                    {
                        selector: 'h1,h2,h3,h4,h5,h6',
                        remove: 'all',
                        split: false,
                        expand: false,
                        block_expand: true,
                        deep: true
                    },
                    {
                        selector: 'b,strong,em,i,font,u,strike,sub,sup,dfn,code,samp,kbd,var,cite,mark,q,del,ins',
                        remove: 'all',
                        split: true,
                        block_expand: true,
                        expand: false,
                        deep: true
                    },
                    
                ],
                formatpainter_checklist: { selector: 'ul', classes: 'tox-checklist' },
                formatpainter_liststyletype: { selector: 'ul,ol', styles: { listStyleType: '%value' } },
                formatpainter_borderstyle: { selector: 'td,th', styles: { borderTopStyle: '%valueTop', borderRightStyle: '%valueRight', borderBottomStyle: '%valueBottom', borderLeftStyle: '%valueLeft', }, remove_similar: true },
                formatpainter_bordercolor: { selector: 'td,th', styles: { borderTopColor: '%valueTop', borderRightColor: '%valueRight', borderBottomColor: '%valueBottom', borderLeftColor: '%valueLeft' }, remove_similar: true },
                formatpainter_backgroundcolor: { selector: 'td,th', styles: { backgroundColor: '%value' }, remove_similar: true },
                formatpainter_removeformat: [
                    {
                        selector: 'b,strong,em,i,font,u,strike,sub,sup,dfn,code,samp,kbd,var,cite,mark,q,del,ins',
                        remove: 'all', split: true, expand: false, block_expand: true, deep: true
                    },
                    { selector: 'span', attributes: ['style', 'class'], remove: 'empty', split: true, expand: false, deep: true },
                    { selector: '*:not(tr,td,th,table)', attributes: ['style', 'class'], split: false, expand: false, deep: true }
                ],
            },
            indentation : '20pt',
            indent_use_margin: true,
            browser_spellcheck: true,
            gecko_spellcheck: false,
            external_plugins: {
                // 'powerpaste':'/publish/powerpaste/plugin.js'
            },
            advlist_bullet_styles: "square",
            advlist_number_styles: "lower-alpha",
            autoresize_bottom_margin: 50,
            autoresize_on_init: false,
            autoresize_overflow_padding: 50,
            autosave_ask_before_unload: false,
            autosave_interval: "20s",
            autosave_prefix: "tinymce-autosave-{path}{query}-{id}-",
            autosave_restore_when_empty: false,
            autosave_retention: "20m",
            bbcode_dialect: "punbb",
            casechange_title_case_minors: [
                'at', 'by', 'in', 'of', 'on', 'up', 'to', 'en', 're', 'vs',
                'but', 'off', 'out', 'via', 'bar', 'mid', 'per', 'pro', 'qua', 'til',
                'from', 'into', 'unto', 'with', 'amid', 'anit', 'atop', 'down', 'less', 'like', 'near', 'over', 'past', 'plus', 'sans', 'save', 'than', 'thru', 'till', 'upon',
                'for', 'and', 'nor', 'but', 'or', 'yet', 'so', 'an', 'a', 'some', 'the'
            ],
            charmap: [
                [0x2615, 'morning coffee']
            ],
            charmap_append: [
                [0x2600, 'sun'],
                [0x2601, 'cloud']
            ],
            tinydrive_token_provider: 'URL_TO_YOUR_TOKEN_PROVIDER',
            emoticons_append: {
                custom_mind_explode: {
                    keywords: ["brain", "mind", "explode", "blown"],
                    char: "🤯"
                },
                robot: {
                    keywords: ["computer", "machine", "bot"],
                    char: "🤖",
                    category: "people"
                },
                dog: {
                    keywords: ["animal", "friend", "nature", "woof", "puppy", "pet", "faithful"],
                    char: "🐶",
                    category: "animals_and_nature"
                },
            },
            emoticons_database_url:'https://cdn.jsdelivr.net/npm/emoji-js@3.5.0/lib/emoji.min.js',
            mediaembed_max_width: 450,
            mediaembed_service_url: "SERVICE_URL",
            formatpainter_blacklisted_formats: 'link,address,removeformat,formatpainter_removeformat',
            fullpage_default_doctype: "<!DOCTYPE html>",
            fullpage_default_encoding: "UTF-8",
            fullpage_default_font_size: "14px",
            fullpage_default_font_family: "'Times New Roman', Georgia, Serif;",
            fullpage_default_title: "TinyMCE-Configuration:fullpage_default_title",
            fullpage_default_text_color: "blue",
            fullpage_default_xml_pi: true,
            fullpage_hide_in_source_view: true,
            help_tabs: [
                'shortcuts', // the default shortcuts tab
                'keyboardnav', // the default keyboard navigation tab
                'plugins', // the default plugins tab
                {
                    name: 'custom1', // new tab called custom1
                    title: 'Custom Tab 1',
                    items: [
                        {
                            type: 'htmlpanel',
                            html: '<p>This is a custom tab</p>',
                        }
                    ]
                },
                {
                    name: 'versions', // override the default versions tab
                    title: 'Custom Versions',
                    items: [
                        {
                            type: 'htmlpanel',
                            html: 'This is a custom versions panel.'
                        }
                    ]
                },
                'custom2', // new tab custom2 as defined on init in setup() below
                'custom3' // new tab custom3 as defined on button click in setup() below
            ],
            
            image_list: [
                {title: 'My image 1', value: 'https://www.example.com/my1.gif'},
                {title: 'My image 2', value: 'http://www.moxiecode.com/my2.gif'}
            ],
            file_picker_callback: function(callback, value, meta) {
                // Provide file and text for the link dialog

                // Provide image and alt text for the image dialog
                if (meta.filetype === 'image') {
                    callback('myimage.jpg', {alt: 'My alt text'});
                }

                // Provide alternative source and posted for the media dialog
                
            },
            file_picker_types: 'file image media',
            image_caption: false,
            image_advtab: false,
            image_class_list: [
                {title: 'None', value: ''},
                {title: 'Dog', value: 'dog'},
                {title: 'Cat', value: 'cat'}
            ],
            image_description: true,
            image_dimensions: true,
            image_prepend_url: "",
            image_title: false,
            image_uploadtab: true,
            images_upload_base_path: '',
            images_upload_credentials: false,
            images_upload_handler: function (blobInfo, success, failure) {
                var xhr, formData;

                xhr = new XMLHttpRequest();
                xhr.withCredentials = false;
                xhr.open('POST', 'postAcceptor.php');

                xhr.onload = function() {
                    var json;

                   

                    json = JSON.parse(xhr.responseText);

                    if (!json || typeof json.location != 'string') {
                        failure('Invalid JSON: ' + xhr.responseText);
                        return null;
                    }

                    success(json.location);
                };

                formData = new FormData();
                formData.append('file', blobInfo.blob(), blobInfo.filename());

                xhr.send(formData);
            },
            typeahead_urls: true,
            insertdatetime_dateformat: "%Y-%m-%d",
            insertdatetime_formats: ["%H:%M:%S", "%Y-%m-%d", "%I:%M:%S %p", "%D"],
            insertdatetime_timeformat: "%H:%M:%S",
            insertdatetime_element: true,
            default_link_target: "_blank",
            link_assume_external_targets: true,
            link_class_list: [
                {title: 'None', value: ''},
                {title: 'Dog', value: 'dog'},
                {title: 'Cat', value: 'cat'}
            ],
            link_context_toolbar: true,
            link_list: [
                {title: 'My page 1', value: 'https://www.tiny.cloud'},
                {title: 'My page 2', value: 'https://about.tiny.cloud'}
            ],
            link_title: false,
            link_quicklink: true,
            rel_list: [
                {title: 'No Referrer', value: 'noreferrer'},
                {title: 'External Link', value: 'external'}
            ],
            target_list: false,
            linkchecker_service_url: "http://mydomain.com/linkchecker",
            media_alt_source: true,
            media_dimensions: true,
            media_filter_html: true,
            media_live_embeds: true,
            media_poster: false,
            media_scripts: [
                {filter: 'http://media1.example.com'},
                {filter: 'http://media2.example.com', width: 100, height: 200}
            ],
            media_url_resolver: function (data, resolve/*, reject*/) {
                if (data.url.indexOf('YOUR_SPECIAL_VIDEO_URL') !== -1) {
                    var embedHtml = '<iframe src="' + data.url +
                        '" width="400" height="400" ></iframe>';
                    resolve({html: embedHtml});
                } else {
                    resolve({html: ''});
                }
            },
            mentions_fetch: function (query, success) {
                // Fetch your full user list from the server and cache locally
                if (usersRequest === null) {
                    usersRequest = fetch('/users');
                }
                usersRequest.then(function(users) {
                    // query.term is the text the user typed after the '@'
                    users = users.filter(function (user) {
                        return user.name.indexOf(query.term.toLowerCase()) !== -1;
                    });

                    users = users.slice(0, 10);

                    // Where the user object must contain the properties `id` and `name`
                    // but you could additionally include anything else you deem useful.
                    success(users);
                });
            },
            mentions_selector: 'span.mymention',
            mentions_menu_complete: function (editor, userInfo) {
                var span = editor.getDoc().createElement('span');
                span.className = 'mymention';
                // store the user id in the mention so it can be identified later
                span.setAttribute('data-mention-id', userInfo.id);
                span.appendChild(editor.getDoc().createTextNode('@' + userInfo.name));
                return span;
            },
            mentions_menu_hover: function (userInfo, success) {
                // request more information about the user from the server and cache it locally
                if (!userRequest[userInfo.id]) {
                    userRequest[userInfo.id] = fetch('/user?id=' + userInfo.id);
                }
                userRequest[userInfo.id].then(function(userDetail) {
                    var div = document.createElement('div');

                    div.innerHTML = (
                        '<div>' +
                        '<h1>' + userDetail.fullName + '</h1>' +
                        '<img src="' + userDetail.image + '" ' +
                        'style="width: 50px; height: 50px; float: left;"/>' +
                        '<p>' + userDetail.title + '</p>' +
                        '</div>'
                    );

                    success(div);
                });
            },
            nonbreaking_force_tab: true,
            nonbreaking_wrap: false,
            noneditable_editable_class: "mceEditable",
            noneditable_noneditable_class: "mceNonEditable",
            noneditable_regexp: /\d{3}-\d{3}-\d{3}/g,
            pagebreak_separator: "<!-- my page break -->",
            pagebreak_split_block: true,
            tiny_pageembed_classes: [],
            paste_data_images: false,
            paste_as_text: false,
            paste_enable_default_filters: true,
            paste_filter_drop: true,
            paste_preprocess: function(plugin, args) {
                console.log(args.content);
                args.content += ' preprocess';
            },
            paste_postprocess: function(plugin, args) {
                console.log(args.node);
                args.node.setAttribute('id', '42');
            },
            paste_word_valid_elements: "b,strong,i,em,h1,h2",
            paste_webkit_styles: "color font-size",
            paste_retain_style_properties: "color font-size",
            paste_merge_formats: true,
            paste_convert_word_fake_lists: true,
            paste_remove_styles_if_webkit: true,
            permanentpen_properties: {
                fontname: 'arial,helvetica,sans-serif',
                forecolor: '#E74C3C',
                fontsize: '12pt',
                hilitecolor: '',
                bold: true,
                italic: false,
                strikethrough: false,
                underline: false
            },
            powerpaste_allow_local_images: true,
            powerpaste_clean_filtered_inline_elements: "strong, em, b, i, u, strike, sup, sub, font",
            powerpaste_keep_unsupported_src: true,
            save_enablewhendirty: true,
            save_oncancelcallback: function () { console.log('Save canceled');
            },
            save_onsavecallback: function () { console.log('Saved'); },
            spellchecker_callback: function (method, text, success, failure) {
                if (method === "spellcheck") {
                    tinymce.util.JSONRequest.sendRPC({
                        url: "/tinymce/spellchecker.php",
                        method: "spellcheck",
                        params: {
                            lang: this.getLanguage(),
                            words: text.match(this.getWordCharPattern())
                        },
                        success: function (event) {
                            success(result);
                        },
                        error: function (error, xhr) {
                            failure("Spellcheck error:" + xhr.status);
                        }
                    });
                } else {
                    failure('Unsupported spellcheck method');
                }
            },
            spellchecker_language: 'sv_SE',
            spellchecker_languages: 'English=en,Danish=da,Dutch=nl,Finnish=fi,French=fr_FR,' + 'German=de,Italian=it,Polish=pl,Portuguese=pt_BR,Spanish=es,Swedish=sv',
            spellchecker_rpc_url: 'spellchecker.php',
            spellchecker_wordchar_pattern: /[^\s,\.]+/g,
            tabfocus_elements: "somebutton",
            table_toolbar: "tableprops tabledelete | tableinsertrowbefore tableinsertrowafter tabledeleterow | tableinsertcolbefore tableinsertcolafter tabledeletecol",
            table_appearance_options: false,
            table_clone_elements: "strong em a",
            table_grid: false,
            table_tab_navigation: false,
            table_default_attributes: {
                border: '1'
            },
            table_default_styles: {
                width: '50%'
            },
            table_responsive_width: false,
            table_class_list: [
                {title: 'None', value: ''},
                {title: 'Dog', value: 'dog'},
                {title: 'Cat', value: 'cat'}
            ],
            table_cell_class_list: [
                {title: 'None', value: ''},
                {title: 'Dog', value: 'dog'},
                {title: 'Cat', value: 'cat'}
            ],
            table_row_class_list: [
                {title: 'None', value: ''},
                {title: 'Dog', value: 'dog'},
                {title: 'Cat', value: 'cat'}
            ],
            table_advtab: false,
            table_cell_advtab: false,
            table_row_advtab: false,
            table_resize_bars: false,
            table_style_by_css: true,
            templates: [
                {title: 'Cdate', title: 'Cdate example', content: '<p class="cdate">This will be replaced with the creation date</p>'},
                {title: 'Mdate', title: 'Mdate example', content: '<p class="mdate">This will be replaced with the date modified</p>'},
                {
                    title: 'My Template',
                    title: 'This is my template.',
                    content: '<p>Hello, <span class="selcontent">this statement will be replaced.</span></p>'
                },
            ],
            template_cdate_classes: "cdate creationdate",
            template_cdate_format: "%m/%d/%Y : %H:%M",
            template_mdate_classes: "mdate modifieddate",
            template_mdate_format: "%m/%d/%Y : %H:%M:%S",
            template_replace_values: {
                username: "Jack Black",
                staffid: "991234"
            },
            textpattern_patterns: [
                {start: '*', end: '*', format: 'italic'},
                {start: '**', end: '**', format: 'bold'},
                {start: '~', end: '~', cmd: 'createLink', value: 'https://tiny.cloud'}
            ],
            toc_depth: 3,
            toc_header: "div",
            toc_class: "our-toc",
            visualblocks_default_state: true,
            visualchars_default_state: true,
            
        }); 
JS,

        'css' => <<<CSS
            
            .div1 {
             width: 95%;
            }
            .div2 {
             width: 1%;
            }
            .tox-checklist > li:not(.tox-checklist--hidden) {
            list-style: none;
            margin: .25em 0;
            position: relative;
        }
        .tox-checklist > li:not(.tox-checklist--hidden)::before {
            background-image: url("data:image/svg+xml;charset=UTF-8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2216%22%20height%3D%2216%22%20viewBox%3D%220%200%2016%2016%22%3E%3Cg%20id%3D%22checklist-unchecked%22%20fill%3D%22none%22%20fill-rule%3D%22evenodd%22%3E%3Crect%20id%3D%22Rectangle%22%20width%3D%2215%22%20height%3D%2215%22%20x%3D%22.5%22%20y%3D%22.5%22%20fill-rule%3D%22nonzero%22%20stroke%3D%22%234C4C4C%22%20rx%3D%222%22%2F%3E%3C%2Fg%3E%3C%2Fsvg%3E%0A");
            background-size: 100%;
            content: '';
            cursor: pointer;
            height: 1em;
            left: -1.5em;
            position: absolute;
            top: .125em;
            width: 1em;
        }
        .tox-checklist li:not(.tox-checklist--hidden).tox-checklist--checked::before {
            background-image: url("data:image/svg+xml;charset=UTF-8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2216%22%20height%3D%2216%22%20viewBox%3D%220%200%2016%2016%22%3E%3Cg%20id%3D%22checklist-checked%22%20fill%3D%22none%22%20fill-rule%3D%22evenodd%22%3E%3Crect%20id%3D%22Rectangle%22%20width%3D%2216%22%20height%3D%2216%22%20fill%3D%22%234099FF%22%20fill-rule%3D%22nonzero%22%20rx%3D%222%22%2F%3E%3Cpath%20id%3D%22Path%22%20fill%3D%22%23FFF%22%20fill-rule%3D%22nonzero%22%20d%3D%22M11.5703186%2C3.14417309%20C11.8516238%2C2.73724603%2012.4164781%2C2.62829933%2012.83558%2C2.89774797%20C13.260121%2C3.17069355%2013.3759736%2C3.72932262%2013.0909105%2C4.14168582%20L7.7580587%2C11.8560195%20C7.43776896%2C12.3193404%206.76483983%2C12.3852142%206.35607322%2C11.9948725%20L3.02491697%2C8.8138662%20C2.66090143%2C8.46625845%202.65798871%2C7.89594698%203.01850234%2C7.54483354%20C3.373942%2C7.19866177%203.94940006%2C7.19592841%204.30829608%2C7.5386474%20L6.85276923%2C9.9684299%20L11.5703186%2C3.14417309%20Z%22%2F%3E%3C%2Fg%3E%3C%2Fsvg%3E%0A");
        }
        .tiny-pageembed--21by9,
        .tiny-pageembed--16by9,
        .tiny-pageembed--4by3,
        .tiny-pageembed--1by1 {
            display: block;
            overflow: hidden;
            padding: 0;
            position: relative;
            width: 100%;
        }

        .tiny-pageembed--21by9::before,
        .tiny-pageembed--16by9::before,
        .tiny-pageembed--4by3::before,
        .tiny-pageembed--1by1::before {
            content: "";
            display: block;
        }

        .tiny-pageembed--21by9::before {
            padding-top: 42.857143%;
        }

        .tiny-pageembed--16by9::before {
            padding-top: 56.25%;
        }

        .tiny-pageembed--4by3::before {
            padding-top: 75%;
        }

        .tiny-pageembed--1by1::before {
            padding-top: 100%;
        }

       /* .tiny-pageembed--21by9 iframe,
        .tiny-pageembed--16by9 iframe,
        .tiny-pageembed--4by3 iframe,
        .tiny-pageembed--1by1 iframe {
            border: 0;
            height: 100%;
            left: 0;
            position: absolute;
            top: 0;
            width: 100%;
        }*/
        .mce-toc {
            border: 1px solid gray;
        }

        .mce-toc h2 {
            margin: 4px;
        }

        .mce-toc li {
            list-style-type: none;
        }
CSS,
    ];

    public function asset()
    {
        //$this->fileJs('https://cdn.jsdelivr.net/npm/tinymce@5.1.6/tinymce.min.js');
        $this->fileJs('https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.2.2/tinymce.min.js');
    }


    public function codes()
    {

        if ($this->_config['hasIcon'] == true) {
            $getIcon = $this->htm .= strtr($this->_layout['icon'], [
                '{icon}' => $this->_config['icon'],
            ]);
        } else {
            $getIcon = '';
        }

        $this->js .= strtr($this->_layout['jsCode'], [
            '{id}' => $this->id,
        ]);

        $this->htm .= strtr($this->_layout['main'], [
            '{id}' => $this->id,
            '{name}' => $this->name,
            '{value}' => $this->value,
            '{placeholder}' => $this->_config['placeholder'],
            '{getIcon}' => $getIcon
        ]);


    }

}
