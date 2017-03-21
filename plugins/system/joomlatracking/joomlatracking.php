<?php
/**
 * Appends tracking codes to joomla.org
 *
 * @copyright  Copyright (C) 2015 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Joomla.org Tracking Code plugin
 */
class PlgSystemJoomlatracking extends JPlugin
{
	/**
	 * Application object
	 *
	 * @var  JApplicationCms
	 */
	protected $app;

	/**
	 * Listener for onBeforeCompileHead event
	 *
	 * @return  void
	 */
	public function onBeforeCompileHead()
	{
		// Only for site
		if (!$this->app->isSite())
		{
			return;
		}

		// Only for HTML
		$doc = $this->app->getDocument();

		if ($doc->getType() != 'html')
		{
			return;
		}

		$doc->addCustomTag(<<< HTML
<script type='text/javascript'>
var WindowEvent;(function(n){n[n.Load="load"]="Load";n[n.BeforeUnload="beforeunload"]="BeforeUnload";n[n.Abort="abort"]="Abort";n[n.Error="error"]="Error"})(WindowEvent||(WindowEvent={}));var AjaxTiming=function(){function n(n,t,i,r){var u=this;this.getPerformanceTimings=function(n){u.connect=n.connectEnd-n.connectStart;u.dns=n.domainLookupEnd-n.domainLookupStart;u.duration=n.duration;u.load=n.responseEnd-n.requestStart;u.wait=n.startTime;u.redirect=n.redirectEnd-n.redirectStart;n.secureConnectionStart&&(u.ssl=n.connectEnd-n.secureConnectionStart)};this.url=n;this.method=t;this.isAsync=i;this.open=r}return n}(),ProfilerJsError=function(){function n(n,t,i){this.count=0;this.message=n;this.url=t;this.lineNumber=i}return n.createText=function(n,t,i){return[n,t,i].join(":")},n.prototype.getText=function(){return n.createText(this.message,this.url,this.lineNumber)},n}(),ProfilerEventManager=function(){function n(){this.events=[];this.hasAttachEvent=!!window.attachEvent}return n.prototype.add=function(n,t,i){this.events.push({type:n,target:t,func:i});this.hasAttachEvent?t.attachEvent("on"+n,i):t.addEventListener(n,i,!1)},n.prototype.clear=function(){for(var n,t=0,i=this.events;t<i.length;t++)n=i[t],this.hasAttachEvent?n.target.detachEvent(n.type,n.func):n.target.removeEventListener(n.type,n.func,!1);this.events=[]},n}(),RProfiler=function(){function n(){function s(n){var t=n.target||n.srcElement;return t.nodeType==3&&(t=t.parentNode),u("N/A",t.src||t.URL,-1),!1}var n=this,u,f,t,i,e;this.restUrl="g.3gl.net/jp/98/v3/M";this.startTime=(new Date).getTime();this.info={};this.hasInsight=!1;this.data={start:this.startTime,jsCount:0,jsErrors:[],loadTime:-1,loadFired:!1,ajax:[]};this.eventManager=new ProfilerEventManager;this.startAjaxCapture=function(){var i=XMLHttpRequest.prototype,o=i.open,s=i.send,r=[],u={},e=n.data.ajax,h=25,f=typeof performance=="object"&&typeof window.performance.now=="function"&&typeof window.performance.getEntriesByType=="function",t;f&&window.performance.setResourceTimingBufferSize(300);t=function(){return f?window.performance.now():(new Date).getTime()};i.open=function(n,i,u,f,e){u===void 0&&(u=!0);this.rpIndex=r.length;r.push(new AjaxTiming(i,n,u,t()));o.call(this,n,i,u,f,e)};i.send=function(n){var i=this,c=this.onreadystatechange,o;(this.onreadystatechange=function(){var n=r[i.rpIndex],o;if(n){o=i.readyState;switch(o){case 1:n.connectionEstablished=t();break;case 2:n.requestReceived=t();break;case 3:n.processingTime=t();break;case 4:n.complete=t();n.responseSize=i.responseText.length,function(n){setTimeout(function(){var r,s,h,c,o;if(f){var i=n.url,t=[],l=performance.getEntriesByType("resource");for(r=0,s=l;r<s.length;r++)h=s[r],h.name==i&&t.push(h);if(e.push(n),t.length!=0){if(u[i]||(u[i]=[]),t.length==1){n.getPerformanceTimings(t[0]);u[i].push(0);return}c=u[i];for(o in t)if(c.indexOf(o)==-1){n.getPerformanceTimings(t[o]);c.push(o);return}n.getPerformanceTimings(t[0])}}},h)}(n,e)}typeof c=="function"&&c.call(i)}},o=r[this.rpIndex],o)&&(n&&!isNaN(n.length)&&(o.sendSize=n.length),o.send=t(),s.call(this,n))}};this.recordPageLoad=function(){n.data.loadTime=(new Date).getTime();n.data.loadFired=!0};this.addError=function(t,i,r){var s,f,u,e,o;for(n.data.jsCount++,s=ProfilerJsError.createText(t,i,r),f=n.data.jsErrors,u=0,e=f;u<e.length;u++)if(o=e[u],o.getText()==s){o.count++;return}f.push(new ProfilerJsError(t,i,r))};this.addInfo=function(t,i,r){if(!n.isNullOrEmpty(t)){if(n.isNullOrEmpty(r))n.info[t]=i;else{if(n.isNullOrEmpty(i))return;n.isNullOrEmpty(n.info[t])&&(n.info[t]={});n.info[t][i]=r}n.hasInsight=!0}};this.clearInfo=function(){n.info={};n.hasInsight=!1};this.getInfo=function(){return n.hasInsight?n.info:null};this.eventManager.add(WindowEvent.Load,window,this.recordPageLoad);u=this.addError;this.startAjaxCapture();window.opera?this.eventManager.add(WindowEvent.Error,document,s):"onerror"in window&&(f=window.onerror,window.onerror=function(n,t,i){return(u(n,t,i),!!f)?f(n,t,i):!1});!window.__cpCdnPath||(this.restUrl=window.__cpCdnPath.trim());t=document.createElement("iframe");i=t.style;i.position="absolute";i.top="-10000px";i.left="-1000px";e=document.getElementsByTagName("script")[0];e.parentNode.insertBefore(t,e);var o=t.contentWindow.document.open("text/html","replace"),h=window.location.protocol+"//",r='<body onload="';r+="function s(u){var d=document,s=d.createElement('script');s.type='text/javascript';s.src=u;d.body.appendChild(s);}";r+="s('"+h+this.restUrl+"');";r+='"><\/body>';o.write(r);o.close()}return n.prototype.isNullOrEmpty=function(n){if(n===undefined||n===null)return!0;if(typeof n=="string"){var t=n;return t.trim().length==0}return!1},n.prototype.dispatchCustomEvent=function(n){(function(n){function t(n,t){t=t||{bubbles:!1,cancelable:!1,detail:undefined};var i=document.createEvent("CustomEvent");return i.initCustomEvent(n,t.bubbles,t.cancelable,t.detail),i}if(typeof n.CustomEvent=="function")return!1;t.prototype=Event.prototype;n.CustomEvent=t})(window);var t=new CustomEvent(n);window.dispatchEvent(t)},n}(),profiler=new RProfiler;window.RProfiler=profiler;window.WindowEvent=WindowEvent;profiler.dispatchCustomEvent("GlimpseLoaded");
</script>
HTML
		);

		$doc->setMetaData('google-site-verification', 'jrag6pGzOlb7sHXFr-742OJv8UYvJLe7MYqS6HFj07k');
	}

	/**
	 * Listener for onAfterRender event
	 *
	 * @return  void
	 */
	public function onAfterRender()
	{
		// Only for site
		if (!$this->app->isSite())
		{
			return;
		}

		// Only for HTML
		$doc = $this->app->getDocument();

		if ($doc->getType() != 'html')
		{
			return;
		}

		// Scripts to append
		$script = <<< HTML
<script type="text/javascript">
    var myArray = ['server a', 'server b', 'server c', 'server d'];
    var SrvNm = myArray[Math.floor(Math.random() * myArray.length)];
    var SrvMin = -20;
    var SrvMax = 1000;
    var SrvTm = Math.floor(Math.random() * (SrvMax - SrvMin + 1)) + SrvMin;
    var min = 0;
    var max = 90;
    var sales = Math.floor(Math.random() * (max - min + 1)) + min;
    var items=Math.floor(Math.random()*10)
    var myVar = ['varA', 'varB'];
    var glimpseVar = myVar[Math.floor(Math.random() * myArray.length)];
    RProfiler.addInfo('variation', glimpseVar);
    RProfiler.addInfo('conversion', sales, items);
    RProfiler.addInfo('indicator', 'srvrtime', SrvTm);
    RProfiler.addInfo('tracepoint', 'srvrname', SrvNm);
    RProfiler.addInfo('indicator', 'size', 2722);
</script>
<script type="text/javascript">
	function ab_search(ab_callback, args){
		var valid_tags = new Array()

		args.forEach(function(c, i, a) {
			if (c) {
				if (typeof(a[i]) ===  'string') valid_tags.push(c)
				else if (Object.prototype.toString.call(a[i]) === '[object Array]') {
					c.forEach(
						function(c, i, a){ if(typeof(c) === 'string') valid_tags.push(c)}
					);
				}
			}
		})

		if (valid_tags.length > 0) {
			return ab_callback(valid_tags)
		}
	}

	function ab_begin() {
		var args = Array.prototype.slice.call(arguments)

		document.addEventListener('DOMContentLoaded', function(event) {
			var val = ab_search(function (valid_tags) {
				var ab_found = 'disabled',
				is_valid_el = function(tag) {
					if (tag !== null && tag !== undefined) ab_found = is_ab_found(tag)
				},
				is_ab_found = function(tag) {
					return (tag.clientHeight=== 0 || tag.clientHeight=== undefined || tag.clientWidth === 0 || tag.clientWidth === undefined)? 'enabled': ab_found;
				}

				valid_tags.forEach(function(c, i, a) {
					var tag = document.getElementsByClassName(c)
					is_valid_el(tag[0])
					tag = window.document.getElementById(c)
					is_valid_el(tag)
				});

				return ab_found;
			}, args)

			val = (val) ? val : 'undefined';
			RProfiler.addInfo('tracepoint', 'ab', val);
		});
	}

	//put IDs and/or classnames here
	ab_begin(['banner', 'custom'])
</script>

HTML;

		// Fetch the body
		$body = $this->app->getBody();

		// If for whatever reason we're missing the closing body tag, just append the scripts
		if (!stristr($body, '</body>'))
		{
			$body .= $script;
		}
		else
		{
			// Find the closing tag and put the scripts in
			$pos = strripos($body, '</body>');

			if ($pos !== false)
			{
				$body = substr_replace($body, $script . '</body>', $pos, strlen('</body>'));
			}
		}

		// Reset the body
		$this->app->setBody($body);
	}
}
