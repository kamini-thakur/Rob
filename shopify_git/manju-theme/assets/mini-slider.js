'use strict';

var ms = '';

// Mini Slider JS code (01_homepage)
window.addEventListener('load', function () {
    ms = slider.new('ms');
    ms.load('mini-slider','ms-slide');
});
function minload() {
   ms = slider.new('ms');
   ms.load('mini-slider','ms-slide');
}

var slider = {
  idn: '',
  cl: '',
  a: '',
  a_nav: '',
  aname: '',
  auton: '',
  k: 0,
  id: function(id){
		return document.getElementById(id);
  },
  new: function(aname){
  this.aname = aname;
  return slider;
  },
	load: function(id,cl){
  	this.idn = id;
    this.cl = cl;
    var a = this.id(id).getElementsByClassName(cl);
    this.a = a;
    a[0].style.display = 'block';
    var htm = '';
    for(var i=0;i<a.length;i++){
    	var i2 = i+1;
    	htm += '<a class="ms-bullet" href="javascript://" onclick="'+this.aname+'.navigate('+i+');"></a> ';
    }
    this.id('ms-bullets').innerHTML = htm;
    var a_nav = this.id('ms-bullets').getElementsByTagName('a');
    this.a_nav = a_nav;
	this.a_nav[0].className = 'ms-bullet active';
    this.autonavigate();
  },
  autonavigate: function(){
  	if(this.k+1<this.a.length){
    	var k2 = this.k+1;
    }else{
    	var k2 = 0;
    }
    var that = this;
		this.auton = setTimeout(function(){that.navigate(k2);},6000);
  },
  
	navigate: function(e){
  	if(e==undefined){e==this.k2;}
		for(var i=0;i<this.a.length;i++){
      if(i==e){
      	this.slidere(i);
        this.k = i;
        clearInterval(this.auton);
        this.autonavigate();
      }else{
      	this.sliderk(i);
      }
    }
  
  },
	slidere: function(i){
    this.a[i].style.display = 'block';
    this.a_nav[i].className = 'ms-bullet active';
    var elem = this.a[i];
    var that = this;
		setTimeout(function(){elem.className = that.cl+' active'},400);
	},
  sliderk: function(i){
   	var elem = this.a[i];
    this.a_nav[i].className = 'ms-bullet';
		setTimeout(function(){elem.style.display = 'none'},1000);
		this.a[i].className = this.cl;
	}

}