</div><?php if ($this->closeLink): ?></a><?php else: ?></div><?php endif; ?>
</div></div>
<?php if($this->enableSlider): ?>
<script type="text/javascript">
<!--//--><![CDATA[//><!--
<?php if($this->Controls): ?>
var controlDiv = new Element('div', {'class':'control_buttons'}).inject(document.getElement('#<?php echo $this->articleId; ?>'));
for (var i = 1; i <= <?php echo $this->countElements;?>; i++){new Element('span', {'class':'ce_noobSlide_button ce_noobSlide_controls', html:i}).inject(document.getElement('#<?php echo $this->articleId; ?> .control_buttons'));}
<?php endif; ?>
<?php if($this->previews): ?>
var previewHandles = $$('#<?php echo $this->articleId; ?> .ce_noobSlide_preview');
<?php endif; ?>
var noobslide<?php echo $this->sliderId; ?>;
window.addEvent('domready', function() {
	noobslide<?php echo $this->sliderId; ?> = new noobSlide({
		box: document.getElement('#<?php echo $this->articleId; ?> .ce_noobSlide_container'),
		items: [<?php echo $this->jsElements; ?>],
		<?php echo $this->mode; ?>,
<?php if($this->mode_src == 'fade'): ?>
		divElements: document.getElements('#<?php echo $this->articleId; ?> .ce_noobSlide_section'),
<?php endif; ?>
		size: <?php if($this->mode_src == 'vertical'): echo $this->height;?><?php else: ?><?php echo $this->width;?><?php endif;?>,
<?php if($this->ControlButtons OR $this->SideButtons): ?>
<?php if($this->SideButtons): ?>
		nextBtn: new Element('a', {'class':'ce_noobSlide_button ce_noobSlide_next', html:'<span><?php echo $this->next; ?></span>'}).inject(document.getElement('#<?php echo $this->articleId; ?> .ce_noobSlide'), 'after'),
	    prevBtn: new Element('a', {'class':'ce_noobSlide_button ce_noobSlide_previous', html:'<span><?php echo $this->previous; ?></span>'}).inject(document.getElement('#<?php echo $this->articleId; ?> .ce_noobSlide'), 'after'),
<?php endif; ?>
		addButtons: {<?php if($this->ControlButtons): ?>play: new Element('a', {'class':'ce_noobSlide_button ce_noobSlide_play', html:'<span>Play</span>'}).inject(document.getElement('#<?php echo $this->articleId; ?> .ce_noobSlide'), 'after'), stop: new Element('a', {'class':'ce_noobSlide_button ce_noobSlide_stop', html:'<span>Stop</span>'}).inject(document.getElement('#<?php echo $this->articleId; ?> .ce_noobSlide'), 'after'), playback: new Element('a', {'class':'ce_noobSlide_button ce_noobSlide_playback', html:'<span><?php echo $this->playbackLabel; ?></span>'}).inject(document.getElement('#<?php echo $this->articleId; ?> .ce_noobSlide'), 'after')<?php endif; ?><?php if($this->ControlButtons && $this->SideButtons): ?>, <?php endif;?><?php if($this->SideButtons): ?>previous: document.getElements('#<?php echo $this->articleId; ?> .ce_noobSlide_previous span'), next: document.getElements('#<?php echo $this->articleId; ?> .ce_noobSlide_next span')<?php endif; ?>},
<?php endif; ?>
    	interval: <?php echo $this->interval; ?>, 
    	fadeDuration: <?php echo $this->effectDuration; ?>,
    	autoPlay: <?php echo $this->nSPlayAuto; ?><?php if($this->effectActive): ?>, <?php endif; ?>
    	
<?php if($this->effectActive): ?>
		fxOptions: {
      	duration : <?php echo $this->effectDuration; ?>,
      	transition: Fx.Transitions.<?php echo $this->effect; ?>,
      	wait: false
    	}
<?php endif; ?>
<?php if($this->Controls || $this->previews): ?>
		,
		onWalk: function(currentItem,currentHandle){
<?php if($this->Controls): ?>
    		this.handles.removeClass('active');
	  		currentHandle.addClass('active');
<?php endif; ?>
<?php if($this->previews): ?>
    		previewHandles.removeClass('active');
			previewHandles[this.currentIndex].addClass('active');
<?php endif; ?>
    	}
<?php endif; ?>
<?php if($this->Controls): ?>
		,
		handles: $$('#<?php echo $this->articleId; ?> .ce_noobSlide_controls')       
<?php endif; ?>
<?php if($this->previews): ?>
 		,
 		previewItems: $$('#<?php echo $this->articleId; ?> .ce_noobSlide_preview')
<?php endif; ?>
 	});
//walk to item witouth fx
noobslide<?php echo $this->sliderId; ?>.walk(<?php echo $this->startPoint; ?>,false,true);

new MooSwipe(document.getElement('#<?php echo $this->articleId; ?> .ce_noobSlide_container'), {
		onSwipeLeft: function() {
			noobslide<?php echo $this->sliderId; ?>.next(this);
	  	},
		onSwipeRight: function() {
			noobslide<?php echo $this->sliderId; ?>.previous(this);
		}
	});
});
//--><!]]>
</script>
<?php endif; ?>		 	
		
		