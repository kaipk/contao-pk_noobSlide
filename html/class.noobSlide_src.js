/*
Author:
	luistar15, <leo020588 [at] gmail.com>
	Rainer Ilgen <raineri@gmx.net> Extention for Fading
	Philipp Kaiblinger <philipp.kaiblinger@kaipo.at> Extention for Fading adapting for Contao CMS
	
License:
	MIT License
 
Class
	noobSlide (rev.03-11-10)
	noobSlide Extention for Fading (rev. 23-10-08)
	noobSlide Extension for Fading adapting for Contao CMS (rev. 28-06-2011)

Arguments:
	Parameters - see Parameters below

Parameters:
	box: dom element | required
	items: dom collection | required
	size: int | item size (px) | default: 240
	mode: string | 'horizontal', 'vertical' | default: 'horizontal'
	fade: boolean | default: false
	addButtons:{
		previous: single dom element OR dom collection| default: null
		next:  single dom element OR dom collection | default: null
		play:  single dom element OR dom collection | default: null
		playback:  single dom element OR dom collection | default: null
		stop:  single dom element OR dom collection | default: null
	}
	button_event: string | event type | default: 'click'
	handles: dom collection | default: null
	handle_event: string | event type| default: 'click'
	fxOptions: object | Fx.Tween options | default: {duration:500,wait:false}
	interval: int | for periodical | default: 5000
	autoPlay: boolean | default: false
	onWalk: event | pass arguments: currentItem, currentHandle | default: null
	startItem: int | default: 0

Properties:
	box: dom element
	items: dom collection
	size: int
	mode: string
	fade: boolean
	buttons: object
	button_event: string
	handles: dom collection
	handle_event: string
	previousIndex: int
	nextIndex: int
	fx: Fx.Tween instance
	interval: int
	autoPlay: boolean
	onWalk: function
	
Methods:
	previous(manual): walk to previous item
		manual: bolean | default:false
	next(manual): walk to next item
		manual: bolean | default:false
	play (interval,direction,wait): auto walk items
		interval: int | required
		direction: string | "previous" or "next" | required
		wait: boolean | required
	stop(): stop auto walk
	walk(item,manual,noFx): walk to item
		item: int | required
		manual: bolean | default:false
		noFx: boolean | default:false
	addHandleButtons(handles):
		handles: dom collection | required
	addActionButtons(action,buttons):
		action: string | "previous", "next", "play", "playback", "stop" | required
		buttons: dom collection | required

Requires:
	mootools 1.2 core
*/
var noobSlide = new Class({

	initialize: function(params){	
		this.items = params.items;
		this.mode = params.mode || 'horizontal';
		this.fade = params.fade || false;
		this.modes = {horizontal:['left','width'], vertical:['top','height']};
		this.size = params.size || 240;
		this.box = params.box.setStyle(this.modes[this.mode][1],(this.size*this.items.length)+'px');
		this.divElements = params.divElements;		
		this.button_event = params.button_event || 'click';
		this.handle_event = params.handle_event || 'click';
		this.previewItems_event = params.previewItems_event || 'click'; 
		this.onWalk = params.onWalk || null;
		this.currentIndex = null;
		this.previousIndex = null;
		this.nextIndex = null;
		this.interval = params.interval || 5000;
		this.autoPlay = params.autoPlay || false;
		this._play = null;
		this.handles = params.handles || null;
		this.previewItems = params.previewItems || null;
		this.fadeDuration = params.fadeDuration; 
		
		if(this.handles){
			this.addHandleButtons(this.handles, this.handle_event);
		}
		
		if(this.previewItems){
			this.addHandleButtons(this.previewItems, this.previewItems_event);
		}
		
		this.buttons = {
			previous: [],
			next: [],
			play: [],
			playback: [],
			stop: []
		};
		if(params.addButtons){
			for(var action in params.addButtons){
				this.addActionButtons(action, $type(params.addButtons[action])=='array' ? params.addButtons[action] : [params.addButtons[action]]);
			}
		}
		
		if(this.fade)
		{
			//Prepare Fading
			this.orderItems(params);
			this.fading((params.startItem||0),true,true);
		}
		else
		{
			//original Sliding
			this.fx = new Fx.Tween(this.box,$extend((params.fxOptions||{duration:500,wait:false}),{property:this.modes[this.mode][0]}));
			this.walk((params.startItem||0),true,true);
		}
	},
		
	//new function for Ordering the Items for Fading
	orderItems: function() {
		
		for(i=0;i<this.items.length;i++)
		{	
			$$(this.divElements)[i].setStyle('position', 'absolute');
			$$(this.divElements)[i].setStyle('left', '0px');
			$$(this.divElements)[i].setStyle('z-index', i+1);			
			
			if(i>0)
			{
				$$(this.divElements)[i].fade('out');
				// hidden inactive elements
				$$(this.divElements)[i].setStyle('display', 'none');
			}
			
		}
	},

	addHandleButtons: function(handles, handle_event){
		for(var i=0;i<handles.length;i++){
			if(this.fade)
			{
				handles[i].addEvent(handle_event,this.fading.pass([i,true],this));
			}
			else
			{
				handles[i].addEvent(handle_event,this.walk.pass([i,true],this));
			}
		}
	},

	addActionButtons: function(action,buttons){
		for(var i=0; i<buttons.length; i++){
			switch(action){
				case 'previous': buttons[i].addEvent(this.button_event,this.previous.pass([true],this)); break;
				case 'next': buttons[i].addEvent(this.button_event,this.next.pass([true],this)); break;
				case 'play': buttons[i].addEvent(this.button_event,this.play.pass([this.interval,'next',false],this)); break;
				case 'playback': buttons[i].addEvent(this.button_event,this.play.pass([this.interval,'previous',false],this)); break;
				case 'stop': buttons[i].addEvent(this.button_event,this.stop.create({bind:this})); break;
			}
			this.buttons[action].push(buttons[i]);		
		}
	},

	previous: function(manual){
		if(this.fade)
		{
			this.fading((this.currentIndex>0 ? this.currentIndex-1 : this.items.length-1),manual);
		}
		else
		{
			this.walk((this.currentIndex>0 ? this.currentIndex-1 : this.items.length-1),manual);
		}
	},

	next: function(manual){
		if(this.fade)
		{
			this.fading((this.currentIndex<this.items.length-1 ? this.currentIndex+1 : 0),manual);
		}
		else
		{
			this.walk((this.currentIndex<this.items.length-1 ? this.currentIndex+1 : 0),manual);
		}
	},
	play: function(interval,direction,wait){
		this.stop();
		if(!wait){
			this[direction](false);
		}
		this._play = this[direction].periodical(interval,this,[false]);
	},

	stop: function(){
		$clear(this._play);
	},
	walk: function(item,manual,noFx){
		if(item!=this.currentIndex){
			this.currentIndex=item;
			this.previousIndex = this.currentIndex + (this.currentIndex>0 ? -1 : this.items.length-1);
			this.nextIndex = this.currentIndex + (this.currentIndex<this.items.length-1 ? 1 : 1-this.items.length);
			if(manual){
				this.stop();
			}
			if(noFx){
				this.fx.cancel().set((this.size*-this.currentIndex)+'px');
			}else{
				this.fx.start(this.size*-this.currentIndex);
			}
			if(manual && this.autoPlay){
				this.play(this.interval,'next',true);
			}
			if(this.onWalk){
				this.onWalk((this.items[this.currentIndex] || null), (this.handles && this.handles[this.currentIndex] ? this.handles[this.currentIndex] : null));
			}
		}
	},
	//Fading
	fading: function(item,manual,noFx){
		if(item!=this.currentIndex){
			this.lastIndex=this.currentIndex;
			this.currentIndex=item;
			this.previousIndex = this.currentIndex + (this.currentIndex>0 ? -1 : this.items.length-1);
			this.nextIndex = this.currentIndex + (this.currentIndex<this.items.length-1 ? 1 : 1-this.items.length);
			
			$$(this.divElements)[this.currentIndex].set('tween', {duration: (this.fadeDuration ? this.fadeDuration : 500)});
			
			if(manual){
				this.stop();
			}
			if(!noFx){
				// fade in and show active element
				$$(this.divElements)[this.currentIndex].fade('in');
				$$(this.divElements)[this.currentIndex].setStyle('display', 'block');
				$$(this.divElements)[this.lastIndex].fade('out');
			}
			if(manual && this.autoPlay){
				this.play(this.interval,'next',true);
			}
			if(this.onWalk){
				this.onWalk((this.items[this.currentIndex] || null), (this.handles && this.handles[this.currentIndex] ? this.handles[this.currentIndex] : null));
			}
		}
	}
});