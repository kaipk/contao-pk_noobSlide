</div><?php if ($this->closeLink): ?></a><?php else: ?></div><?php endif; ?></div><div class="noobSlide_controls" style="position:relative;"></div></div>
<?php if($this->enableSlider): ?>
<script type="text/javascript">
/* <![CDATA[ */
<?php if($this->Controls): ?>
var controlDiv = new Element('div', {'class':'control_buttons'}).inject(document.getElement('#noobSlide<?php echo $this->sliderId; ?>'));
for (var i = 1; i <= <?php echo $this->countElements;?>; i++){new Element('span', {'class':'ce_noobSlide_button ce_noobSlide_controls', html:i}).inject(document.getElement('#noobSlide<?php echo $this->sliderId; ?> .control_buttons'));}
<?php endif; ?>
<?php if($this->previews): ?>
var previewHandles = $$('#noobSlide<?php echo $this->sliderId; ?> .ce_noobSlide_preview');
<?php endif; ?>
var noobslide<?php echo $this->sliderId; ?>;
window.addEvent('domready', function() {
	noobslide<?php echo $this->sliderId; ?> = new noobSlide({
		box: document.getElement('#noobSlide<?php echo $this->sliderId; ?> .ce_noobSlide_container'),
		items: [<?php echo $this->jsElements; ?>],
		<?php echo $this->mode; ?>,
<?php if($this->mode_src == 'fade'): ?>
		divElements: document.getElements('#noobSlide<?php echo $this->sliderId; ?> .ce_noobSlide_section'),
<?php endif; ?>
		size: <?php if($this->mode_src == 'vertical'): echo $this->height;?><?php else: ?><?php echo $this->width;?><?php endif;?>,
<?php if($this->startPoint && !$this->randomStartPoint): ?>
		startItem: <?php echo $this->startPoint; ?>,
<?php endif; ?>
<?php if($this->randomStartPoint && $this->startPoint == 0): ?>
		startItem: Math.floor((Math.random()*<?php echo $this->countElements; ?>)),
<?php endif; ?>
<?php if($this->randomSlides && !$this->randomStartPoint): ?>
		random: true,
<?php endif; ?>
<?php if($this->ControlButtons OR $this->SideButtons): ?>
<?php if($this->SideButtons): ?>
		prevBtn: $$('#noobSlide<?php echo $this->sliderId; ?> .noobSlide_controls').adopt(new Element('a', {'class':'ce_noobSlide_button ce_noobSlide_previous', html:'<span><?php echo $this->previous; ?></span>'})),
		nextBtn: $$('#noobSlide<?php echo $this->sliderId; ?> .noobSlide_controls').adopt(new Element('a', {'class':'ce_noobSlide_button ce_noobSlide_next', html:'<span><?php echo $this->next; ?></span>'})),
<?php endif; ?>
		addButtons: {<?php if($this->ControlButtons): ?>play: new Element('a', {'class':'ce_noobSlide_button ce_noobSlide_play', html:'<span>Play</span>'}).inject(document.getElement('#noobSlide<?php echo $this->sliderId; ?>'), 'after'), stop: new Element('a', {'class':'ce_noobSlide_button ce_noobSlide_stop', html:'<span>Stop</span>'}).inject(document.getElement('#noobSlide<?php echo $this->sliderId; ?>'), 'after'), playback: new Element('a', {'class':'ce_noobSlide_button ce_noobSlide_playback', html:'<span><?php echo $this->playbackLabel; ?></span>'}).inject(document.getElement('#noobSlide<?php echo $this->sliderId; ?>'), 'after')<?php endif; ?><?php if($this->ControlButtons && $this->SideButtons): ?>, <?php endif;?><?php if($this->SideButtons): ?>previous: document.getElements('#noobSlide<?php echo $this->sliderId; ?> .ce_noobSlide_previous span'), next: document.getElements('#noobSlide<?php echo $this->sliderId; ?> .ce_noobSlide_next span')<?php endif; ?>},
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
		handles: $$('#noobSlide<?php echo $this->sliderId; ?> .ce_noobSlide_controls')
<?php endif; ?>
<?php if($this->previews): ?>
 		,
 		previewItems: $$('#noobSlide<?php echo $this->sliderId; ?> .ce_noobSlide_preview')
<?php endif; ?>
 	});
<?php if($this->nSMouseOver): ?>
//add mousein/out behaviors for all slides
document.getElement('#noobSlide<?php echo $this->sliderId; ?> .ce_noobSlide_container').addEvents({
'mouseover':function(){
noobslide<?php echo $this->sliderId; ?>.stop();
},
'mouseleave':function(){
noobslide<?php echo $this->sliderId; ?>.play(<?php echo $this->interval; ?>,"next",false);
}
});
<?php endif; ?>
<?php if($this->nSMooSwipe): ?>
new MooSwipe(document.getElement('#noobSlide<?php echo $this->sliderId; ?> .ce_noobSlide_container'), {
		onSwipeLeft: function() {
			noobslide<?php echo $this->sliderId; ?>.next(this);
	  	},
		onSwipeRight: function() {
			noobslide<?php echo $this->sliderId; ?>.previous(this);
		}
	});
<?php endif; ?>
});
/* ]]> */
</script>
<?php endif; ?>