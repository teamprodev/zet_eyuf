<?php

namespace zetsoft\widgets\former;

use zetsoft\system\Az;
use zetsoft\system\helpers\ZArrayHelper;
use function GuzzleHttp\Psr7\str;
use zetsoft\system\kernels\ZWidget;
use kartik\widgets\Select2;
use yii\web\JsExpression;

/**
 *
 * Class ZKSelect2Widget
 * https://github.com/chinchang/hint.css
 * Created By: Malika Parmanova
 * Refactored: Malika Parmanova
 */

class ZHintCssMasterWidget extends ZWidget
{

    /**
     * Configuration
     */
    public $config = [];
    public $_config = [];


    /**
     *
     * Plugin Events
     * https://select2.org/programmatic-control/events
     */
    public $event = [];
    public $_event = [

    ];

    public $layout = [];
    public $_layout = [

        'main' => <<<HTML
         
<div class="section  hero">

	<h1 style="display:inline-block;position:relative">Hint.css <small class="version">2.0</small> </h1>
	<h3>A pure CSS tooltip library for your lovely websites</h3>
	<br>
</div>

<div class="section  section--inverted">
	<h2>Tryout</h2>

	<div class="window">
		<div class="titlebar">
			<div class="buttons">
				<a class="titlebar__btn  close  hint--bottom-right" aria-label="Close"></a>
				<a class="titlebar__btn  minimize  hint--bottom-right" aria-label="Minimize"></a>
				<a class="titlebar__btn  zoom  hint--bottom-right" aria-label="Zoom"></a>
			</div>
			Try hovering over different things
		</div>
		<div class="content">
			<div class="position-grid">
				<div class="position-grid__cell"><a href="#" aria-label="bottom-right" class="hint--bottom-right">bottom-right</a></div>
				<div class="position-grid__cell"><a href="#" aria-label="bottom" class="hint--bottom">bottom</a></div>
				<div class="position-grid__cell"><a href="#" aria-label="bottom-left" class="hint--bottom-left">bottom-left</a></div>
				<div class="position-grid__cell"><a href="#" aria-label="right" class="hint--right">right</a></div>
				<div class="position-grid__cell"><a>.</a></div>
				<div class="position-grid__cell"><a href="#" aria-label="left" class="hint--left">left</a></div>
				<div class="position-grid__cell"><a href="#" aria-label="top-right" class="hint--top-right">top-right</a></div>
				<div class="position-grid__cell"><a href="#" aria-label="top" class="hint--top">top</a></div>
				<div class="position-grid__cell"><a href="#" aria-label="top-left" class="hint--top-left">top-left</a></div>
			</div>

			<h3>Color Modifiers</h3>
			<p>
				<a class="status-icon  hint--bottom-right  hint--error" style="background:indianred" aria-label="This is an error tooltip">
					<svg style="width:24px;height:24px" viewBox="0 0 24 24">
						<path fill="#ffffff" d="M8.27,3L3,8.27V15.73L8.27,21H15.73L21,15.73V8.27L15.73,3M8.41,7L12,10.59L15.59,7L17,8.41L13.41,12L17,15.59L15.59,17L12,13.41L8.41,17L7,15.59L10.59,12L7,8.41" />
					</svg>
				</a>
				<a class="status-icon  hint--bottom-right  hint--warning" style="background:orange" aria-label="This is a warning tooltip">
					<svg style="width:24px;height:24px" viewBox="0 0 24 24">
						<path fill="#ffffff" d="M11,4.5H13V15.5H11V4.5M13,17.5V19.5H11V17.5H13Z" />
					</svg>
				</a>
				<a class="status-icon  hint--bottom-left  hint--info" style="background:lightblue" aria-label="This is an info tooltip">
					<svg style="width:24px;height:24px" viewBox="0 0 24 24">
						<path fill="#ffffff" d="M12,2A7,7 0 0,1 19,9C19,11.38 17.81,13.47 16,14.74V17A1,1 0 0,1 15,18H9A1,1 0 0,1 8,17V14.74C6.19,13.47 5,11.38 5,9A7,7 0 0,1 12,2M9,21V20H15V21A1,1 0 0,1 14,22H10A1,1 0 0,1 9,21M12,4A5,5 0 0,0 7,9C7,11.05 8.23,12.81 10,13.58V16H14V13.58C15.77,12.81 17,11.05 17,9A5,5 0 0,0 12,4Z" />
					</svg>
				</a>
				<a class="status-icon  hint--bottom-right  hint--success" style="background:lightgreen" aria-label="This is success tooltip">
					<svg style="width:24px;height:24px" viewBox="0 0 24 24">
						<path fill="#ffffff" d="M21,7L9,19L3.5,13.5L4.91,12.09L9,16.17L19.59,5.59L21,7Z" />
					</svg>
				</a>
			</p>

			<h3>Size variations</h3>

			<p>
				<a class="hint--top  hint--small" style="border: 1px solid #eee;padding:3px 6px;border-radius:4px;" data-hint="You can show very very long sentences inside tooltips by using various available size variation classes.">
					Small
				</a>

				<a class="hint--top  hint--medium" style="border: 1px solid #eee;padding:3px 6px;border-radius:4px;" data-hint="You can show very very long sentences inside tooltips by using various available size variation classes.">
					Medium
				</a>

				<a class="hint--top  hint--large" style="border: 1px solid #eee;padding:3px 6px;border-radius:4px;" data-hint="You can show very very long sentences inside tooltips by using various available size variation classes.">
					Large
				</a>
			</p>


			<h3>Extra</h3>

			<p>
				<a class="hint--left  hint--always" aria-label="...which always keep showing">You can also make tooltips...</a>
			</p>

			<p>
				<a class="hint--top  hint--rounded" aria-label="We have rounded corners for you">Hmm...So you don't like sharp edges?</a>
			</p>

			<h3>Effects</h3>

			<p>
				<a class="hint--top  hint--no-animate" aria-label="Get a simple show/hide tooltip">Dont like animation?</a>
			</p>
			<p>
				<a class="hint--right  hint--bounce" aria-label="Bounce">Adding a <code>hint--bounce</code> class gives you that...</a>
			</p>
			<p>
				<a class="hint--left  hint--no-shadow" aria-label="Yes, no shadows!">Maybe you do not want shadows.</a>
			</p>
		</div>
	</div>

	<div class="section-inner" style="opacity: 0.7; margin-top: 25px">
		<strong>Upgrading from v1.x</strong>: If you are already using v1.x, you may need to tweak certain position classes because of the way tooltips are positioned in v2.
		<br>
		Its recommended to use <code>aria-label</code> attribute to specify your tooltip text in support of accessibility. Though, you can always use <code>data-hint</code> attribute instead. <a href="https://webaccessibility.withgoogle.com/unit?unit=6&lesson=10">Read more about <code>aria-label</code> here</a>.

	</div>
</div>

<div class="section  footer">
	Made with hands by <a aria-label="@chinchang457" class="hint--top" href="https://twitter.com/chinchang457">Kushagra Gour</a> in India
</div>
HTML,


        'css' => <<<CSS
     
    
    
CSS,
    ];

    /**
     *
     * Constants
     */


    public function asset()
    {
        $this->fileCss('/render/former/ZHintCssMasterWidget/clean/Style.css');
        $this->fileCss('/render/former/ZHintCssMasterWidget/hint.css');
        $this->fileCss('https:://fonts.googleapis.com/css?family=Lobster');
    }

    public function codes()
    {

        $this->htm = strtr($this->_layout['main'], []);
    }

}






