<h1>pk_noobslide for the CMS Contao</h1>

The pk_noobSlide module is a mootools based application to integrate multiple content via content-slider.

<h2>Features</h2>
<ul>
<li>Based on mootools version 1.2 library, therefore compatible to any version > 2.7</li>
<li>Several types of transition and effect types are available</li>
<li>Fade mode</li>
<li>Preview Elements</li>
<li>Contao Newsmodule support</li>
<li>Random startpoint</li>
<li>Random item order</li>
<li>include slider as module</li>
</ul>

<h2>How to use</h2>
<ul>
<li>first, create a new content-element "noobslider setup"</li>
<li>then define the basics  (mode, size, effects, navigation)</li>
<li>create a content-element "noobslider section" (in the section you can also define a background-image)</li>
<li>create any contents for the first slider element</li>
<li>create several content-element "noobslider section"</li>
<li>finally add the content-element "noobslide end"</li>
</ul>

to add preview-elements you have to place it after the setup element. For example

<ul>
<li>noobslide setup</li>
<li>noobslide preview</li>
<li>noobslide preview</li>
<li>noobslide section</li>
<li>slider element 1</li>
<li>noobslide section</li>
<li>slider element 2</li>
<li>noobslide end</li>
</ul>

<h2>Demos</h2>
for demos check our demosite <a href="http://demo.kaipo.at" title="Noobslide Demo">http://demo.kaipo.at</a>
