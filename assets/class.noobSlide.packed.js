var noobSlide=new Class({initialize:function(b){this.items=b.items;this.mode=b.mode||"horizontal";this.fade=b.fade||false;this.modes={horizontal:["left","width"],vertical:["top","height"]};this.size=b.size||240;this.box=b.box.setStyle(this.modes[this.mode][1],(this.size*this.items.length)+"px");this.divElements=b.divElements;this.button_event=b.button_event||"click";this.handle_event=b.handle_event||"click";this.previewItems_event=b.previewItems_event||"click";this.onWalk=b.onWalk||null;this.currentIndex=null;this.previousIndex=null;this.nextIndex=null;this.interval=b.interval||5000;this.autoPlay=b.autoPlay||false;this._play=null;this.handles=b.handles||null;this.previewItems=b.previewItems||null;this.fadeDuration=b.fadeDuration;this.random=b.random||false;if(this.handles){this.addHandleButtons(this.handles,this.handle_event)}if(this.previewItems){this.addHandleButtons(this.previewItems,this.previewItems_event)}this.buttons={previous:[],next:[],play:[],playback:[],stop:[]};if(b.addButtons){for(var a in b.addButtons){this.addActionButtons(a,b.addButtons[a] instanceof Array?b.addButtons[a]:[b.addButtons[a]])}}if(this.fade){this.orderItems(b);this.fading((b.startItem||0),true,true,true)}else{this.fx=new Fx.Tween(this.box,Object.append((b.fxOptions||{duration:500,wait:false}),{property:this.modes[this.mode][0]}));this.walk((b.startItem||0),true,true,true)}},orderItems:function(){for(i=0;i<this.items.length;i++){$$(this.divElements)[i].setStyle("position","absolute");$$(this.divElements)[i].setStyle("left","0px");$$(this.divElements)[i].setStyle("z-index",i+1);if(i>0){$$(this.divElements)[i].fade("out");$$(this.divElements)[i].setStyle("display","none")}}},addHandleButtons:function(b,c){for(var a=0;a<b.length;a++){if(this.fade){b[a].addEvent(c,this.fading.pass([a,true],this))}else{b[a].addEvent(c,this.walk.pass([a,true],this))}}},addActionButtons:function(c,b){for(var a=0;a<b.length;a++){switch(c){case"previous":b[a].addEvent(this.button_event,this.previous.pass([true],this));break;case"next":b[a].addEvent(this.button_event,this.next.pass([true],this));break;case"play":b[a].addEvent(this.button_event,this.play.pass([this.interval,"next",false],this));break;case"playback":b[a].addEvent(this.button_event,this.play.pass([this.interval,"previous",false],this));break;case"stop":b[a].addEvent(this.button_event,this.stop.create({bind:this}));break}this.buttons[c].push(b[a])}},previous:function(a){if(this.fade){this.fading((this.currentIndex>0?this.currentIndex-1:this.items.length-1),a)}else{this.walk((this.currentIndex>0?this.currentIndex-1:this.items.length-1),a)}},next:function(a){if(this.fade){this.fading((this.currentIndex<this.items.length-1?this.currentIndex+1:0),a)}else{this.walk((this.currentIndex<this.items.length-1?this.currentIndex+1:0),a)}},play:function(a,c,b){this.stop();if(!b){this[c](false)}this._play=this[c].periodical(a,this,[false])},stop:function(){clearTimeout(this._play)},walk:function(c,b,a,d){if(this.random&&!b||d){this.changeIndex()}if(!this.random||b&&!d){this.currentIndex=c;this.previousIndex=this.currentIndex+(this.currentIndex>0?-1:this.items.length-1);this.nextIndex=this.currentIndex+(this.currentIndex<this.items.length-1?1:1-this.items.length)}if(b){this.stop()}if(a){this.fx.cancel().set((this.size*-this.currentIndex)+"px")}else{this.fx.cancel().start(this.size*-this.currentIndex)}if(b&&this.autoPlay){this.play(this.interval,"next",true)}if(this.onWalk){this.onWalk((this.items[this.currentIndex]||null),(this.handles&&this.handles[this.currentIndex]?this.handles[this.currentIndex]:null))}},fading:function(c,b,a,d){if(this.random&&!b||d){this.changeIndex()}if(!this.random||b&&!d){this.lastIndex=this.currentIndex;this.currentIndex=c;this.previousIndex=this.currentIndex+(this.currentIndex>0?-1:this.items.length-1);this.nextIndex=this.currentIndex+(this.currentIndex<this.items.length-1?1:1-this.items.length)}$$(this.divElements)[this.currentIndex].set("tween",{duration:(this.fadeDuration?this.fadeDuration:500)});if(b){this.stop()}if(a){$$(this.divElements)[this.currentIndex].fade("show");$$(this.divElements)[this.currentIndex].setStyle("display","block")}else{$$(this.divElements)[this.currentIndex].fade("in");$$(this.divElements)[this.currentIndex].setStyle("display","block");if(this.currentIndex!=this.lastIndex){$$(this.divElements)[this.lastIndex].fade("out")}}if(b&&this.autoPlay){this.play(this.interval,"next",true)}if(this.onWalk){this.onWalk((this.items[this.currentIndex]||null),(this.handles&&this.handles[this.currentIndex]?this.handles[this.currentIndex]:null))}},changeIndex:function(){var b=this.items.length,a=this.currentIndex;if(this.random&&b>1){do{a=Math.floor((Math.random()*b));if(a==this.currentIndex){a=Math.floor((Math.random()*b))}}while(a==this.currentIndex);this.lastIndex=this.currentIndex;this.currentIndex=a;this.previousIndex=this.currentIndex+(this.currentIndex>0?-1:this.items.length-1);this.nextIndex=this.currentIndex+(this.currentIndex<this.items.length-1?1:1-this.items.length)}}});