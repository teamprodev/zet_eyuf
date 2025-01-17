<!--
<link rel="stylesheet" href="/render/navigat/ZSmartTabWidget/demo/assets/bootstrap.min.css">
<script src="/render/navigat/ZSmartTabWidget/demo/assets/jquery-3.4.1.min.js"></script>
-->


<!-- External Buttons -->
<div class="row mb-3 align-items-center valign-items-center ">
    <div class="col-auto ">
        <label>Theme:</label>
        <select id="theme_selector" class="form-control">
            <option value="default" selected="">Default</option>
            <option value="classic">Classic</option>
            <option value="dark">Dark</option>
            <option value="brick">Brick</option>
            <option value="bstabs">Bootstrap Tabs</option>
            <option value="bspills">Bootstrap Pills</option>
            <option value="">No Theme</option>
        </select>
    </div>
    <div class="col-auto ">
        <label>Animation:</label>
        <select id="animation" class="form-control">
            <option value="none">None</option>
            <option value="fade">Fade</option>
            <option value="slide-horizontal">Slide Horizontal</option>
            <option value="slide-vertical">Slide Vertical</option>
            <option value="slide-swing">Slide Swing</option>
        </select>
    </div>
    <div class="col-auto ">
        <label>Go To:</label>
        <select id="got_to_tab" class="form-control">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>
    </div>

    <div class="col-auto ">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="is_vertical"
                   value="1">
            <label class="custom-control-label" for="is_vertical">Vertical</label>
        </div>
    </div>
    <div class="col-auto ">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="is_justified"
                   value="1" checked="">
            <label class="custom-control-label" for="is_justified">Justified</label>
        </div>
    </div>
</div>

<!-- SmartTab html -->
<div id="smarttab" class="st st-justified st-theme-default st-horizontal">

    <ul class="nav">
        <li>
            <a class="nav-link active"
               href="#tab-1">
                <strong>Tab 1</strong> This is tab description
            </a>
        </li>
        <li>
            <a class="nav-link" href="#tab-2">
                <strong>Tab 2</strong> This is tab description
            </a>
        </li>
        <li>
            <a class="nav-link" href="#tab-3">
                <strong>Tab 3</strong> This is tab description
            </a>
        </li>
        <li>
            <a class="nav-link" href="#tab-4">
                <strong>Tab 4</strong> This is tab description
            </a>
        </li>
    </ul>

    <div class="tab-content" style="height: 190px;">
        <div id="tab-1" class="tab-pane" role="tabpanel" style="display: block;">
            <h3>Tab 1 Content</h3>
            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
            Lorem Ipsum has been the industry's standard dummy text ever since the
            1500s, when an unknown printer took a galley of type and scrambled it to
            make a type specimen book. It has survived not only five centuries, but also
            the leap into electronic typesetting, remaining essentially unchanged. It
            was popularised in the 1960s with the release of Letraset sheets containing
            Lorem Ipsum passages, and more recently with desktop publishing software
            like Aldus PageMaker including versions of Lorem Ipsum.
        </div>
        <div id="tab-2" class="tab-pane" role="tabpanel" style="display: none;">
            <h3>Tab 2 Content</h3>
            <div>Lorem Ipsum is simply dummy text of the printing and typesetting
                industry. Lorem Ipsum has been the industry's standard dummy text ever
                since the 1500s, when an unknown printer took a galley of type and
                scrambled it to make a type specimen book. It has survived not only five
                centuries, but also the leap into electronic typesetting, remaining
                essentially unchanged. It was popularised in the 1960s with the release
                of Letraset sheets containing Lorem Ipsum passages, and more recently
                with desktop publishing software like Aldus PageMaker including versions
                of Lorem Ipsum.
            </div>
        </div>
        <div id="tab-3" class="tab-pane" role="tabpanel" style="display: none;">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
            Lorem Ipsum has been the industry's standard dummy text ever since the
            1500s, when an unknown printer took a galley of type and scrambled it to
            make a type specimen book. It has survived not only five centuries, but also
            the leap into electronic typesetting, remaining essentially unchanged. It
            was popularised in the 1960s with the release of Letraset sheets containing
            Lorem Ipsum passages, and more recently with desktop publishing software
            like Aldus PageMaker including versions of Lorem Ipsum.
        </div>
        <div id="tab-4" class="tab-pane" role="tabpanel" style="display: none;">
            <h3>Tab 4 Content</h3>
            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
            Lorem Ipsum has been the industry's standard dummy text ever since the
            1500s, when an unknown printer took a galley of type and scrambled it to
            make a type specimen book. It has survived not only five centuries, but also
            the leap into electronic typesetting, remaining essentially unchanged. It
            was popularised in the 1960s with the release of Letraset sheets containing
            Lorem Ipsum passages, and more recently with desktop publishing software
            like Aldus PageMaker including versions of Lorem Ipsum.
            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
            Lorem Ipsum has been the industry's standard dummy text ever since the
            1500s, when an unknown printer took a galley of type and scrambled it to
            make a type specimen book. It has survived not only five centuries, but also
            the leap into electronic typesetting, remaining essentially unchanged. It
            was popularised in the 1960s with the release of Letraset sheets containing
            Lorem Ipsum passages, and more recently with desktop publishing software
            like Aldus PageMaker including versions of Lorem Ipsum.
        </div>
    </div>
</div>


<!-- Core -->



<!-- Include SmartTab JavaScript source -->

<link rel="stylesheet" type="text/css"
      href="https://cdn.jsdelivr.net/npm/jquery-smarttab@3.0.1/dist/css/smart_tab_all.min.css">

<script type="text/javascript"
        src="https://cdn.jsdelivr.net/npm/jquery-smarttab@3.0.0/dist/js/jquery.smartTab.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {

        // SmartTab initialize
        $('#smarttab').smartTab({
            backButtonSupport: false, // Enable the back button support
            enableURLhash: false,
            autoProgress: { // Auto navigate tabs on interval
                enabled: false, // Enable/Disable Auto navigation
                interval: 3500, // Auto navigate Interval (used only if "autoProgress" is set to true)
                stopOnFocus: true, // Stop auto navigation on focus and resume on outfocus
            }
        });


        // Demo Button Events
        $("#got_to_tab").on("change", function () {
            // Go to tab
            var tab_index = $(this).val() - 1;
            $('#smarttab').smartTab("goToTab", tab_index);
            return true;
        });

        $("#is_vertical").on("click", function () {
            // Change Orientation
            var options = {
                orientation: ($(this).prop("checked") == true) ? 'vertical' : 'horizontal'
            };
            $('#smarttab').smartTab("setOptions", options);
            return true;
        });

        $("#is_justified").on("click", function () {
            // Change Justify
            var options = {
                justified: $(this).prop("checked")
            };

            $('#smarttab').smartTab("setOptions", options);
            return true;
        });

        $("#animation").on("change", function () {
            // Change theme
            var options = {
                transition: {
                    animation: $(this).val()
                },
            };
            $('#smarttab').smartTab("setOptions", options);
            return true;
        });

        $("#theme_selector").on("change", function () {
            // Change theme
            var options = {
                theme: $(this).val()
            };
            $('#smarttab').smartTab("setOptions", options);
            return true;
        });

        // Set selected theme on page refresh
        $("#theme_selector").change();

    });
</script>


