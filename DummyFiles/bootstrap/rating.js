//localStorage.clear();
var i=0;
var fivestar=0;		
var fourstar=0;
var threestar=0;
var twostar=0;
var onestar=0;
var sum=0;

var result=0;
var totalStars;
var newWidth1;
var newWidth2;
var newWidth3;
var newWidth4;
var newWidth5;

i=localStorage.getItem('i');
if(isNaN(i) || i==null){i=0;}

fivestar=localStorage.getItem('fivestar');
if(isNaN(fivestar)){fivestar=0;}

fourstar=localStorage.getItem('fourstar');
if(isNaN(fourstar)){fourstar=0;}

threestar=localStorage.getItem('threestar');
if(isNaN(threestar)){threestar=0;}

twostar=localStorage.getItem('twostar');
if(isNaN(twostar)){twostar=0;}

onestar=localStorage.getItem('onestar');
if(isNaN(onestar)){onestar=0;}

sum=parseInt(localStorage.getItem('sum'));
if(isNaN(sum)){sum=0;}

result=result=(sum/i).toFixed(1);

if(isNaN(result)){result=0}

function window_onload(){
		
		document.getElementById("rating-num").innerHTML=result;
		document.getElementById('totalP').innerHTML='<span class="glyphicon glyphicon-user"></span> '+i+' total';
		
		newWidth5=((fivestar/i).toFixed(2))*100;
		document.getElementById("fivestar").setAttribute("style","width:"+newWidth5+"%;");
		
		newWidth4=((fourstar/i).toFixed(2))*100;
		document.getElementById("fourstar").setAttribute("style","width:"+newWidth4+"%;");
		
		newWidth3=((threestar/i).toFixed(2))*100;
		document.getElementById("threestar").setAttribute("style","width:"+newWidth3+"%;");
		
		newWidth2=((twostar/i).toFixed(2))*100;
		document.getElementById("twostar").setAttribute("style","width:"+newWidth2+"%;");
		
		newWidth1=((onestar/i).toFixed(2))*100;
		document.getElementById("onestar").setAttribute("style","width:"+newWidth1+"%;");	
}

function rating(){
var submit = document.getElementById("ratingSubmit");
var value = document.getElementById("rating-empty-clearable").value;
//var x = document.getElementById("comment").value;
 //document.getElementById("demo").innerHTML = x;


		if(value!=0)
		{
		i++;	
		sum=sum+parseInt(value);
		result=(sum/i).toFixed(1);
		totalStars=Math.floor(result);
		
		document.getElementById("rating-num").innerHTML=result;
		document.getElementById('totalP').innerHTML='<span class="glyphicon glyphicon-user"></span> '+i+' total';
		
		var ratingstar=document.getElementById("rating-star");
		if(totalStars==1)			
		{ratingstar.innerHTML='<span class="glyphicon glyphicon-star" id="rating-star-1"></span><span class="glyphicon glyphicon-star-empty" id="rating-star-2"></span><span class="glyphicon glyphicon-star-empty" id="rating-star-3"></span><span class="glyphicon glyphicon-star-empty" id="rating-star-4"></span><span class="glyphicon glyphicon-star-empty" id="rating-star-5"></span>';}
		else if(totalStars==2)			
		{ratingstar.innerHTML='<span class="glyphicon glyphicon-star" id="rating-star-1"></span><span class="glyphicon glyphicon-star" id="rating-star-2"></span><span class="glyphicon glyphicon-star-empty" id="rating-star-3"></span><span class="glyphicon glyphicon-star-empty" id="rating-star-4"></span><span class="glyphicon glyphicon-star-empty" id="rating-star-5"></span>';}
		else if(totalStars==3)			
		{ratingstar.innerHTML='<span class="glyphicon glyphicon-star" id="rating-star-1"></span><span class="glyphicon glyphicon-star" id="rating-star-2"></span><span class="glyphicon glyphicon-star" id="rating-star-3"></span><span class="glyphicon glyphicon-star-empty" id="rating-star-4"></span><span class="glyphicon glyphicon-star-empty" id="rating-star-5"></span>';}
		else if(totalStars==4)			
		{ratingstar.innerHTML='<span class="glyphicon glyphicon-star" id="rating-star-1"></span><span class="glyphicon glyphicon-star" id="rating-star-2"></span><span class="glyphicon glyphicon-star" id="rating-star-3"></span><span class="glyphicon glyphicon-star" id="rating-star-4"></span><span class="glyphicon glyphicon-star-empty" id="rating-star-5"></span>';}
		else if(totalStars==5)			
		{ratingstar.innerHTML='<span class="glyphicon glyphicon-star" id="rating-star-1"></span><span class="glyphicon glyphicon-star" id="rating-star-2"></span><span class="glyphicon glyphicon-star" id="rating-star-3"></span><span class="glyphicon glyphicon-star" id="rating-star-4"></span><span class="glyphicon glyphicon-star" id="rating-star-5"></span>';}
		
		
		newWidth5=((fivestar/i).toFixed(2))*100;
		document.getElementById("fivestar").setAttribute("style","width:"+newWidth5+"%;");
		
		newWidth4=((fourstar/i).toFixed(2))*100;
		document.getElementById("fourstar").setAttribute("style","width:"+newWidth4+"%;");
		
		newWidth3=((threestar/i).toFixed(2))*100;
		document.getElementById("threestar").setAttribute("style","width:"+newWidth3+"%;");
		
		newWidth2=((twostar/i).toFixed(2))*100;
		document.getElementById("twostar").setAttribute("style","width:"+newWidth2+"%;");
		
		newWidth1=((onestar/i).toFixed(2))*100;
		document.getElementById("onestar").setAttribute("style","width:"+newWidth1+"%;");
		
		if(value==5)
		{
			fivestar++;
			newWidth5=((fivestar/i).toFixed(2))*100;
			document.getElementById("fivestar").setAttribute("style","width:"+newWidth5+"%;");
		}
		else if(value==4)
		{
			fourstar++;
			newWidth4=((fourstar/i).toFixed(2))*100;
			document.getElementById("fourstar").setAttribute("style","width:"+newWidth4+"%;");
		}
		else if(value==3)
		{
			threestar++;
			newWidth3=((threestar/i).toFixed(2))*100;
			document.getElementById("threestar").setAttribute("style","width:"+newWidth3+"%;");
		}
		else if(value==2)
		{
			twostar++;
			newWidth2=((twostar/i).toFixed(2))*100;
			document.getElementById("twostar").setAttribute("style","width:"+newWidth2+"%;");
		}
		
		
		else if(value==1)
		{
			onestar++;
			newWidth1=((onestar/i).toFixed(2))*100;
			document.getElementById("onestar").setAttribute("style","width:"+newWidth1+"%;");
		}
		
		}
		localStorage.setItem('i',i);
		localStorage.setItem('fivestar',fivestar);
		localStorage.setItem('fourstar',fourstar);
		localStorage.setItem('threestar',threestar);
		localStorage.setItem('twostar',twostar);
		localStorage.setItem('onestar',onestar);
		localStorage.setItem('sum',sum);
}