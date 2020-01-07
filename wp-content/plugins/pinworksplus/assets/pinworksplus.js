/*
PinWorks+ Wordpress Pinterest Gallery Widget
Copyright Artorius Design
http://codecanyon.net/user/artorius
*/
jQuery(document).ready(function(a){function u(a,b,r){var q=document.createElement("a"),l=/(?:\?|&amp;|&)+([^=]+)(?:=([^&]*))*/g,n=[];q.href=a;for(b=encodeURIComponent(b);a=l.exec(q.search);)b!=a[1]&&n.push(a[1]+(a[2]?"="+a[2]:""));n.push(b+(r?"="+encodeURIComponent(r):""));q.search=n.join("&");return q.href}function x(a){return null!=a?a.replace("http://","").replace("https://","").replace("www.","").split(/[/?#]/)[0]:""}function v(){setTimeout(function(){for(var g=0;g<a(".pindiv_pinWrapper").length;g++)if($thisPin=
a(".pindiv_pinWrapper:eq("+g+")"),$thisPin.isOnScreen()&&void 0!=$thisPin.attr("bg-image")){var b=$thisPin.attr("bg-image");$thisPin.find(".pindiv_pinWrapper_content").css("background-image","url("+b+")");$thisPin.removeAttr("bg-image")}},300)}a.fn.isOnScreen=function(){var a=this.get(0).getBoundingClientRect();return a.top<window.innerHeight&&0<a.bottom};a(document).on("mouseenter",".pindiv_pinWrapper_content",function(){a(this).css({opacity:.9,"-webkit-opacity":.9,"-moz-opacity":.9}).find(".pindiv_pinWrapper_sourcelink").css({opacity:1,
"-webkit-opacity":1,"-moz-opacity":1});a(this).find(".pin_data_pinbutton").css({opacity:1,"-webkit-opacity":1,"-moz-opacity":1})});a(document).on("mouseleave",".pindiv_pinWrapper_content",function(){a(this).css({opacity:1,"-webkit-opacity":1,"-moz-opacity":1}).find(".pindiv_pinWrapper_sourcelink").css({opacity:0,"-webkit-opacity":0,"-moz-opacity":0});a(this).find(".pin_data_pinbutton").css({opacity:0,"-webkit-opacity":0,"-moz-opacity":0})});window.Artorius_pinWidget=function(){var g=0;a("div[data-pin-gallery='yes']").each(function(){a(this).addClass("gallery"+
g+"");g+=1});a("div[data-pin]").each(function(){var b=this,g=a(b).attr("data-pin-user");a(b).attr("data-pin-type");var q=a(b).attr("data-pin-header"),l=a(b).attr("data-pin-height"),n=Number(a(b).attr("data-pin-limit")),y=a(b).attr("data-pin-pinbutton"),z=a(b).attr("data-pin-sourcelink"),t=Number(a(b).attr("data-pin-descrlength")),f=0<Number(a(b).attr("data-pin-pinwidth"))?Number(a(b).attr("data-pin-pinwidth")):237,A="responsive"==a(b).attr("data-pin-width")?"100%":a(b).attr("data-pin-width")+"px",
h;"board"==a(b).attr("data-pin-type")&&(h=a(b).attr("data-pin-board"),h="https://api.pinterest.com/v3/pidgets/boards/"+g+"/"+h+"/pins/");"user"==a(b).attr("data-pin-type")&&(h="https://api.pinterest.com/v3/pidgets/users/"+g+"/pins/");a.ajax({url:h,jsonp:"callback",dataType:"jsonp",error:function(a,b,f){console.log(b,f)},beforeSend:function(){a(b).html("<p class='ajaxmsg' style='text-align:center;'>Retrieving pins...</p>")},success:function(c){var d=jQuery.parseJSON(JSON.stringify(c));if("success"!=
d.status)a(b).html("<p class='ajaxmsg' style='text-align:center;'>"+d.message+"</p>");else{a(b).empty();d=jQuery.parseJSON(JSON.stringify(c).replace(/\"237x/g,'"largeimg'));if(!a("body").hasClass("single")&&!a("body").hasClass("page")){for(c=d.data.pins.length;c<d.data.pins.length;c++)d.data.pins.hasOwnProperty(c)&&delete d.data.pins[c];c=d.data.pins.filter(function(a){return void 0!=a});delete d.data.pins;d.data.pins=[];for(var g in c)c.hasOwnProperty(g)&&(d.data.pins[g]=c[g]);a(b).closest(".entry-content").css({height:"400px",
overflow:"hidden",position:"relative"});a(b).closest(".entry-content").find("a").hasClass("pinmask")||(c=a(b).closest("article").find(".entry-title a").attr("href"),a(b).closest(".entry-content").append("<a href='"+c+"' class='pinmask'></a>"))}if("board"==a(b).attr("data-pin-type"))var p=d.data.board.name,e="https://www.pinterest.com"+d.data.board.url,h=d.data.board.pin_count,r=d.data.board.image_thumbnail_url,w=d.data.board.follower_count;"user"==a(b).attr("data-pin-type")&&(p=d.data.user.full_name,
e=d.data.user.profile_url,h=d.data.user.pin_count,r=d.data.user.image_small_url,w=d.data.user.follower_count);a(b).css({width:A,height:l});"yes"==q?(a(b).append("<div class='pindivheader'><div class='pindiv_user'><img src='"+r+"'/><a href='"+e+"' class='pindiv_username'>"+p+"</a></div></div>"),a(b).append("<hr class='pindiv_hr' />"),a(b).append("<div class='pindiv_tabs'><ul><li><span class='pindiv_value'>"+h+"</span><span class='pindiv_label'>pins</span></li><li><span class='pindiv_value'>"+w+"</span><span class='pindiv_label'>followers</span></li></ul></div>"),
a(b).append("<div class='pindiv_container'><div class='pindiv_container_inner'></div></div>"),c=l-(a(".pindivheader").outerHeight(!0)+a("hr.pindiv_hr").outerHeight(!0)+a(".pindiv_tabs").outerHeight(!0)),0<c&&a(b).find(".pindiv_container").css({height:c})):(a(b).append("<div class='pindiv_container'><div class='pindiv_container_inner'></div></div>"),0<l&&a(b).find(".pindiv_container").css({height:l}));p=n<d.data.pins.length&&0<n?n:d.data.pins.length;for(c=0;c<p;c++)0==t?e="":-1==t?e=d.data.pins[c].description:
d.data.pins[c].description.length>t&&0!=t?(e=d.data.pins[c].description.substring(0,t),e+="..."):e=d.data.pins[c].description,e="yes"==z&&null!=d.data.pins[c].link?"<div class='pindiv_pinWrapper' bg-image='"+d.data.pins[c].images.largeimg.url+"'> \t<div class='pindiv_pinWrapper_content' style='background-color: "+d.data.pins[c].dominant_color+";width:"+f+"px;height:"+d.data.pins[c].images.largeimg.height*f/237+"px;'><a class='pindiv_pinWrapper_sourcelink' target='_blank' href='"+d.data.pins[c].link+
"'>"+x(d.data.pins[c].link)+"</a> \t \t</div> <div class='pindiv_pinWrapper_decr' style='width:"+f+"px'>"+e+"</div> </div>":"<div class='pindiv_pinWrapper' bg-image='"+d.data.pins[c].images.largeimg.url+"'> \t<div class='pindiv_pinWrapper_content' style='background-color: "+d.data.pins[c].dominant_color+";width:"+f+"px;height:"+d.data.pins[c].images.largeimg.height*f/237+"px;'></div> <div class='pindiv_pinWrapper_decr' style='width:"+f+"px'>"+e+"</div> </div>",a(b).find(".pindiv_container_inner").append(e),
"yes"==y&&(e=u("https://www.pinterest.com/pin/create/button/","url","https://www.pinterest.com/pin/"+d.data.pins[c].id+""),e=u(e,"media",d.data.pins[c].images.largeimg.url),e=u(e,"description",d.data.pins[c].description),a(b).find(".pindiv_pinWrapper_content:eq("+c+")").append("<a class='pin_data_pinbutton' href='"+e+"'    target='_blank' data-pin-do='buttonPin'    data-pin-config='above' style='left:"+(f-40)/2+"px;'></a>")),"yes"==a(b).attr("data-pin-gallery")?(e="yes"==a(b).attr("data-pin-gallery-captions")?
"data-caption='"+d.data.pins[c].description+"'":"",h=d.data.pins[c].images.largeimg.url.replace("/237x","/736x"),a(b).find(".pindiv_pinWrapper_content:eq("+c+")").append("<a class='pindiv_pinWrapper_pinlink' "+e+" target='_blank' style='width:"+f+"px;height:"+Math.floor((d.data.pins[c].images.largeimg.height-40)*f/237)+"px' href='"+h+"'></a>\t")):a(b).find(".pindiv_pinWrapper_content:eq("+c+")").append("<a class='pindiv_pinWrapper_pinlink' target='_blank' style='width:"+f+"px;height:"+Math.floor((d.data.pins[c].images.largeimg.height-
40)*f/237)+"px' href='https://www.pinterest.com/pin/"+d.data.pins[c].id+"'></a> \t");window.placePins=function(b){for(var c=0<Number(a(b).attr("data-pin-pinwidth"))?Number(a(b).attr("data-pin-pinwidth")):237,e=Math.floor(a(b).find(".pindiv_container").width()/(c+5)),e=d.data.pins.length>e?e:d.data.pins.length,g=Math.floor((a(b).find(".pindiv_container").width()-e*c)/(e+1)),f=[],k=0;k<e;k++)f[k]=0;for(k=0;k<a(b).find(".pindiv_pinWrapper").length;k++){if(k<e){var h=20,m=(c+g)*k+g;f[k]=a(b).find(".pindiv_pinWrapper:eq("+
k+")").outerHeight(!0)+h}else h=Math.min.apply(Math,f),m=f.indexOf(h),f[m]+=a(b).find(".pindiv_pinWrapper:eq("+k+")").outerHeight(!0),m=(c+g)*m+g;a(b).find(".pindiv_pinWrapper:eq("+k+")").css({"-webkit-transform":"translate3d("+m+"px,"+h+"px,0)"});a(b).find(".pindiv_pinWrapper:eq("+k+")").css({"-moz-transform":"translate3d("+m+"px,"+h+"px,0)"});a(b).find(".pindiv_pinWrapper:eq("+k+")").css({transform:"translate3d("+m+"px,"+h+"px,0)"})}0==0<l&&a(b).find(".pindiv_container_inner").css({height:Math.max.apply(Math,
f)+"px"});v()};placePins(b);window.addEventListener("resize",function(a){placePins(b)});for(c=0;c<p;c++)$thisPin=a(b).find(".pindiv_pinWrapper:eq("+c+")"),$thisPin.isOnScreen()&&void 0!=$thisPin.attr("bg-image")&&(e=$thisPin.attr("bg-image"),$thisPin.find(".pindiv_pinWrapper_content").css("background-image","url("+e+")"),$thisPin.removeAttr("bg-image"));0<l?a(b).find(".pindiv_container_inner").bind("scroll",function(){v()}):window.onscroll=function(){v()};"yes"==a(b).attr("data-pin-gallery")&&(c=
a(b).attr("class"),p=void 0!=a(b).attr("data-pin-gallery-animation")?a(b).attr("data-pin-gallery-animation"):"slideIn",baguetteBox.run("."+c+"",{animation:p}))}}})})};Artorius_pinWidget()});