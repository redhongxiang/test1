$(function(){
	var index = 0;
	var slide = $("#slide");
	var pics = $("#pics li");
	var pic = pics.find("img");
	var btns = $("#contros #btnleft, #contros #btnright");
	var thumb = $("#thumb > a");
	var pic_thumb = thumb.find("img");
	var len = pics.length;
	var text = $("#text");
	var h3 = text.find("h3:first");
	var p = text.find("p:first");
	var timer = null;
	
	var toggle = function(i){
		pics.stop(true, true).fadeOut(300).eq(i).stop(true, true).fadeIn(300);
		thumb.removeClass("active").eq(i).addClass("active");
		h3.html($('<a href="' + thumb.eq(i).attr("href") + '" target="_blank">' + pic.eq(i).attr("alt") + '</a>'));
		p.html($('<a href="' + thumb.eq(i).attr("href") + '" target="_blank">' + pic_thumb.eq(i).attr("alt") + '</a>'));
	};
	toggle(0);
	
	thumb.mouseenter(function(){
		var inx = thumb.index(this);
		if(inx != index)
		{
			index = inx;
			toggle(index);
		}
	});
	
	var rightPlay = function(){
		index = index >= (len - 1) ? 0 : ++index;
		toggle(index);
	};
	
	btns.eq(0).click(function(){
		index = index <= 0 ? (len - 1) : --index;
		toggle(index);
	}).end().eq(1).click(rightPlay);
	
	var autoPlay = function(){timer = setInterval(rightPlay, 3000);};
	autoPlay();
	
	slide.hover(function(){clearInterval(timer);}, autoPlay);
});