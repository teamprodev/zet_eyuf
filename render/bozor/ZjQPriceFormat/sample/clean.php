
    <script type="text/javascript"
            src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.6.1.min.js"></script>
 
    <script type="text/javascript"
            src="https://cdn.jsdelivr.net/npm/jquery-price-format@0.0.1/jquery.priceformat.min.js"></script>
    <script type="text/javascript">

        $(function () {

            $('#example1').priceFormat();

            $('#example2').priceFormat({
                prefix: 'R$ ',
                centsSeparator: ',',
                thousandsSeparator: '.'
            });

            $('#example3').priceFormat({
                prefix: '',
                thousandsSeparator: ''
            });

            $('#example4').priceFormat({
                limit: 2,
                centsLimit: 1
            });

            $('#example5').priceFormat({
                clearPrefix: true
            });

            $('#example6').priceFormat({
                allowNegative: true
            });

            $('#example7').priceFormat({
                prefix: 'R$',
                suffix: '$$',
                clearSuffix: true,
                clearPrefix: true
            });

            $("#unmask-test").click(function () {
                alert($('#example6').unmask());
            });

            $("#unprice-test").click(function () {
                $('#example7').unpriceFormat();
            });

            $("#price-test").click(function () {
                $('#example7').priceFormat({
                    prefix: 'R$',
                    suffix: '$$',
                    clearSuffix: true,
                    clearPrefix: true
                });
            });

        });

    </script>

<h1>JQuery Price Format Examples</h1>

<p>
    Basic usage
    <input type="text" value="" id="example1" name="example1">
</p>

<p>
    Customize
    <input type="text" value="123456" id="example2" name="example2">
</p>

<p>
    Skipping some option
    <input type="text" value="123456" id="example3" name="example3">
</p>

<p>
    Working with limits
    <input type="text" value="123456" id="example4" name="example4">
</p>

<p>
    Clear Prefix and Suffix on Blur
    <input type="text" value="123456" id="example5" name="example5">
</p>

<p>
    Allow Negatives and Unmask function
    <input type="text" value="-123456" id="example6" name="example6">
    <button id="unmask-test">Return Value Unmask</button>
</p>

<p>
    Add Suffix
    <input type="text" value="123456" id="example7" name="example7">
    <button id="unprice-test">Unprice Format</button>
    <button id="price-test">Price Format</button>
</p>


