var MooSwipe=MooSwipe||new Class({Implements:[Options,Events],options:{tolerance:20,preventDefaults:true},element:null,startX:null,isMoving:false,initialize:function(b,a){this.setOptions(a);this.element=$(b);this.element.addListener("touchstart",this.onTouchStart.bind(this))},cancelTouch:function(){this.element.removeListener("touchmove",this.onTouchMove);this.startX=null;this.isMoving=false},onTouchMove:function(c){this.options.preventDefaults&&c.preventDefault();if(this.isMoving){var a=c.touches[0].pageX;var b=this.startX-a;if(Math.abs(b)>=this.options.tolerance){this.cancelTouch();this.fireEvent(b>0?"swipeLeft":"swipeRight");this.fireEvent("swipe",b>0?"left":"right")}}},onTouchStart:function(a){if(a.touches.length==1){this.startX=a.touches[0].pageX;this.isMoving=true;this.element.addListener("touchmove",this.onTouchMove.bind(this))}}});