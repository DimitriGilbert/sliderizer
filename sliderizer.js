var sliderizer=function()
{	
	var t=this;
	
	/*
	intialize the slider
	nb=> int; number of item;
	id => string; id of the slider;
	timing => int; number of ms between each item;
	enter => string; the enter effect;
	leave => string; the leave effect;
	*/
	t.init=function(nb,id,timing,enter,leave)
	{
		if(!id)
		{
			var id="";
		}
		if(!timing)
		{
			var timing=5000;
		}
		if(!leave)
		{
			var leave="run";
		}
		if(!enter)
		{
			var enter="run";
		}
		t.current=0;
		t.maxi=nb;
		t.id=id;
		t.timing=timing;
		t.enter=enter;
		t.leave=leave;
		t.timer=setTimeout("mm_slider_"+t.id+".forward();",t.timing);		
	}
	
	/*
	play animation to display next item;
	*/
	t.forward=function()
	{
		docel.id("mm_slider_item_main_"+t.current+"_"+t.id).className="mm_slider_item mm_slider_leave_"+t.leave;
		docel.id("mm_slider_item_thumb_"+t.current+"_"+t.id).style.background="none";
		if(t.current==t.maxi)
		{
			t.current=0;
		}
		else
		{
			t.current++;
		}
		
		docel.id("mm_slider_item_main_"+t.current+"_"+t.id).className="mm_slider_item mm_slider_enter_"+t.enter;
		docel.id("mm_slider_item_thumb_"+t.current+"_"+t.id).style.background="#000";
		clearTimeout(t.timer);
		t.timer=setTimeout("mm_slider_"+t.id+".forward();",t.timing);
	}
	
	/*
	play animation to display previous item;
	*/
	t.prev=function()
	{
		
		docel.id("mm_slider_item_main_"+t.current+"_"+t.id).className="mm_slider_item mm_slider_leave_"+t.leave;
		docel.id("mm_slider_item_thumb_"+t.current+"_"+t.id).style.background="none";
		if(t.current==0)
		{
			t.current=t.maxi;
		}
		else
		{
			t.current--;
		}
		
		docel.id("mm_slider_item_main_"+t.current+"_"+t.id).className="mm_slider_item mm_slider_enter_"+t.enter;
		docel.id("mm_slider_item_thumb_"+t.current+"_"+t.id).style.background="#000";
		clearTimeout(t.timer);
		t.timer=setTimeout("mm_slider_"+t.id+".forward();",t.timing);
	}
	
	/*
	play animation to display item x;
	*/
	t.show=function(x)
	{
		if(!x)
		{
			var x=0;
		}
		docel.id("mm_slider_item_main_"+t.current+"_"+t.id).className="mm_slider_item mm_slider_leave_"+t.leave;
		docel.id("mm_slider_item_thumb_"+t.current+"_"+t.id).style.background="none";
		docel.id("mm_slider_item_main_"+x+"_"+t.id).className="mm_slider_item mm_slider_enter_"+t.enter;
		docel.id("mm_slider_item_thumb_"+x+"_"+t.id).style.background="#000";
		t.current=x;
		clearTimeout(t.timer);
		t.timer=setTimeout("mm_slider_"+t.id+".forward();",t.timing);
	}
}
