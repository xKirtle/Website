if(window.Prototype){Ajax.Responders.register({onCreate:function(A,C){var B=Cookie.get("JSESSIONID");if(B){if(typeof A.options.requestHeaders=="object"){A.options.requestHeaders["X-App-Key"]=B}else{A.options.requestHeaders={"X-App-Key":B}}}}})}Event.delegate=function(A){return function(D){var C=Event.element(D);
for(var B in A){if(C.match(B)){return A[B].apply(C,$A(arguments))}}}};var Utils={getPageSize:function(){var D,A;if(window.innerHeight&&window.scrollMaxY){D=document.body.scrollWidth;A=window.innerHeight+window.scrollMaxY}else{if(document.body.scrollHeight>document.body.offsetHeight){D=document.body.scrollWidth;
A=document.body.scrollHeight}else{D=document.body.offsetWidth;A=document.body.offsetHeight}}var C,E;if(self.innerHeight){C=self.innerWidth;E=self.innerHeight}else{if(document.documentElement&&document.documentElement.clientHeight){C=document.documentElement.clientWidth;E=document.documentElement.clientHeight
}else{if(document.body){C=document.body.clientWidth;E=document.body.clientHeight}}}if(A<E){pageHeight=E}else{pageHeight=A}if(D<C){pageWidth=C}else{pageWidth=D}var B=[pageWidth,pageHeight,C,E];return B},limitTextarea:function(C,B,A){new Form.Element.Observer($(C),0.1,function(E){var D=$(C);if(!D){return 
}if(B<0){return }if(!!A){A(D.value.length>=B)}if(D.value.length>B){D.value=D.value.substring(0,B);D.scrollTop=D.scrollHeight}})},reloadCaptcha:function(){var A=$("captcha");if(A){var B=A.getAttribute("src");var C=B.split("?")[0];C+="?t="+new Date().getTime();A.setAttribute("src",C)}}};if(window.Prototype){Element.addMethods({wait:function(C,A){var B=(A&&A>0)?"padding: "+(A-6)/2+"px 0":"";
var D=Builder.node("div",{className:"progressbar",style:B},[Builder.node("img",{src:habboStaticFilePath+"/v2/images/page_loader.gif",alt:""})]);C.innerHTML=Builder.node("p",[D]).innerHTML}})}var Cookie={set:function(C,D,B){var A="";if(B!=undefined){var E=new Date();E.setTime(E.getTime()+(86400000*parseFloat(B)));
A="; expires="+E.toGMTString()}return(document.cookie=escape(C)+"="+escape(D||"")+"; path=/"+A)},get:function(A){var B=document.cookie.match(new RegExp("(^|;)\\s*"+escape(A)+"=([^;\\s]*)"));return(B?unescape(B[2]):null)},append:function(C,D,A,E){var B=Cookie.get(C);if(!!B){D=B+(E||"|")+D}return Cookie.set(C,D,A)
},erase:function(A){var B=Cookie.get(A)||true;Cookie.set(A,"",-1);return B},accept:function(){if(typeof navigator.cookieEnabled=="boolean"){return navigator.cookieEnabled}Cookie.set("_test","1");return(Cookie.erase("_test")==="1")}};var HabboClient={windowName:"client",windowParams:"toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,",narrowSizeParams:"width=740,height=597",wideSizeParams:"width=980,height=597",nowOpening:false,openOrFocus:function(C){HabboClient.preloadImages();
if(HabboClient.nowOpening){return }HabboClient.nowOpening=true;var E=(C.href?C.href:C);if(screen.width<990){E+=((E.indexOf("?")!=-1)?"&":"?")+"wide=false"}var D=HabboClient._openEmptyHabboWindow(HabboClient.windowName);var B=false;try{B=(D.habboClient&&D.document.habboLoggedIn==true)}catch(A){}if(B){D.focus();
if(D.updateHabboCount){D.updateHabboCount($("topbar-count").innerHTML)}}else{D.location.href=E;D.focus()}HabboClient.nowOpening=false;if(window.location.href.indexOf("/register/welcome")!=-1){window.location.href=habboReqPath+"/me?_notrack=1"}},openShortcut:function(B,A){if(document.habboLoggedIn){new Ajax.Request("/client/shortcut",{parameters:{shortcut:A}})
}HabboClient.openOrFocus(B)},roomForward:function(E,D,C){var F=(E.href?E.href:E);var B=false;try{B=window.habboClient}catch(A){}if(B){window.location.href=F;return }if(document.habboLoggedIn){new Ajax.Request("/components/roomNavigation",{method:"get",parameters:"targetId="+D+"&roomType="+C+"&move=true"},false)
}HabboClient.openOrFocus(F)},closeHabboAndOpenMainWindow:function(A){if(window.opener!=null&&!window.opener.closed){window.opener.location.href=A.href;window.opener.focus()}else{var B=window.open(A.href,"_blank",HabboClient.windowParams+(screen.width>=990?HabboClient.wideSizeParams:HabboClient.narrowSizeParams));
B.focus()}window.close()},preloadImages:function(){new Image().src=habboStaticFilePath+"/v2/images/client/preload.png";new Image().src=habboStaticFilePath+"/v2/images/client/grid.png";HabboClient.preloadImages=Prototype.emptyFunction},_openHabboWindow:function(A,B){return window.open(A,B,HabboClient.windowParams+(screen.width>=990?HabboClient.wideSizeParams:HabboClient.narrowSizeParams))
},_openEmptyHabboWindow:function(A){return HabboClient._openHabboWindow("",A)}};function openOrFocusHabbo(A){HabboClient.openOrFocus(A)}function roomForward(C,B,A){HabboClient.roomForward(C,B,A)}function openOrFocusHelp(C){var E=(C.href?C.href:C);var D=HabboClient._openEmptyHabboWindow("habbohelp");var B=false;
try{B=(D.habboHelp)}catch(A){}if(B){D.focus()}else{D.location.href=E;D.focus()}}function ensureOpenerIsLoggedOut(){try{if(window.opener!=null&&window.opener.document.habboLoggedIn!=null){if(window.opener.document.habboLoggedIn==true){window.opener.location.replace(window.opener.location.href)}}}catch(A){}}function ensureOpenerIsLoggedIn(){try{if(window.opener!=null){if(window.opener.document.logoutPage!=null&&window.opener.document.logoutPage==true){window.opener.location.href="/"
}else{if(window.opener.document.habboLoggedIn!=null&&window.opener.document.habboLoggedIn==false){window.opener.location.replace(window.opener.location.href)}}}}catch(A){}}var L10N=function(){var A=[];var B=function(F,E){var C=F;for(var D=0;D<E.length;++D){C=C.replace("{"+D+"}",E[D])}return C};return{put:function(C,D){A[C]=D;
return this},get:function(D){var C=$A(arguments);C.shift();var E=A[D]||D;return E===D?E:B(E,C)}}}();var TagHelper=Class.create();TagHelper.initialized=false;TagHelper.init=function(A){if(TagHelper.initialized){return }TagHelper.initialized=true;TagHelper.loggedInAccountId=A;TagHelper.bindEventsToTagLists()
};TagHelper.addFormTagToMe=function(){var A=$("add-tag-input");TagHelper.addThisTagToMe($F(A),true);Form.Element.clear(A)};TagHelper.bindEventsToTagLists=function(){var A=function(B){TagHelper.tagListClicked(B,TagHelper.loggedInAccountId)};$$(".tag-list.make-clickable").each(function(B){Event.observe(B,"click",A);
Element.removeClassName(B,"make-clickable")})};TagHelper.setTexts=function(A){TagHelper.options=A};TagHelper.tagListClicked=function(E){var D=Event.element(E);var B=Element.hasClassName(D,"tag-add-link");var A=Element.hasClassName(D,"tag-remove-link");if(B||A){var F=Element.up(D,".tag-list li");if(!F){return 
}var C=TagHelper.findTagNameForContainer(F);Event.stop(E);if(B){TagHelper.addThisTagToMe(C,true)}else{TagHelper.removeThisTagFromMe(C)}}};TagHelper.findTagNameForContainer=function(A){var B=Element.down(A,".tag");if(!B){return null}return B.innerHTML.strip()};TagHelper.addThisTagToMe=function(B,C,A){if(typeof (A)=="undefined"){A={}
}new Ajax.Request("/myhabbo/tag/add",{parameters:"accountId="+encodeURIComponent(TagHelper.loggedInAccountId)+"&tagName="+encodeURIComponent(B),onSuccess:function(E){var D=E.responseText;if(D=="valid"&&C){$$(".tag-list li").each(function(F){if(TagHelper.findTagNameForContainer(F)==B){var H=Element.down(F,".tag-add-link");
var G=$$(".tag-remove-link").first();H.title=G?G.title:"";H.removeClassName("tag-add-link").addClassName("tag-remove-link")}})}else{if(D=="taglimit"){Dialog.showInfoDialog("tag-error-dialog",TagHelper.options.tagLimitText,TagHelper.options.buttonText,null)}else{if(D=="invalidtag"){Dialog.showInfoDialog("tag-error-dialog",TagHelper.options.invalidTagText,TagHelper.options.buttonText,null)
}}}if(D=="valid"||D==""){if(C){TagHelper.reloadMyTagsList()}else{TagHelper.reloadSearchBox(B,1)}if(typeof (A.onSuccess)=="function"){A.onSuccess()}}}})};TagHelper.reloadSearchBox=function(A,B){if($("tag-search-habblet-container")){new Ajax.Updater($("tag-search-habblet-container"),"/habblet/ajax/tagsearch",{method:"post",parameters:"tag="+A+"&pageNumber="+B,evalScripts:true})
}};TagHelper.removeThisTagFromMe=function(A){new Ajax.Request("/myhabbo/tag/remove",{parameters:"accountId="+encodeURIComponent(TagHelper.loggedInAccountId)+"&tagName="+encodeURIComponent(A),onSuccess:function(C){var B=function(D){$$(".tag-list li").each(function(E){if(TagHelper.findTagNameForContainer(E)==A){var G=Element.down(E,".tag-remove-link");
var F=$$(".tag-add-link").first();if(F){G.title=F.title||"";G.removeClassName("tag-remove-link").addClassName("tag-add-link")}}})};TagHelper.reloadMyTagsList({onSuccess:B})}})};TagHelper.reloadMyTagsList=function(B){var A={evalScripts:true};Object.extend(A,B);new Ajax.Updater($("my-tags-list"),"/habblet/mytagslist",A)
};TagHelper.matchFriend=function(){var A=$F("tag-match-friend");if(A){new Ajax.Updater($("tag-match-result"),habboReqPath+"/habblet/ajax/tagmatch",{parameters:{friendName:A},onComplete:function(D){var C=$("tag-match-value");if(C){var B=parseInt(C.innerHTML,10);if(typeof TagHelper.CountEffect=="undefined"){$("tag-match-value-display").innerHTML=B+" %";
Element.show("tag-match-slogan")}else{var E;if(B>0){E=1.5}else{E=0.1}new TagHelper.CountEffect("tag-match-value-display",{duration:E,transition:Effect.Transitions.sinoidal,from:0,to:B,afterFinish:function(){Effect.Appear("tag-match-slogan",{duration:1})}})}}}})}};var TagFight=Class.create();TagFight.init=function(){if($F("tag1")&&$F("tag2")){TagFight.start()
}else{return false}};TagFight.start=function(){$("fightForm").style.display="none";$("tag-fight-button").style.display="none";$("fightanimation").src=habboStaticFilePath+"/images/tagfight/tagfight_loop.gif";$("fight-process").style.display="block";setTimeout("TagFight.run()",3000)};TagFight.run=function(){new Ajax.Updater("fightResults","/habblet/ajax/tagfight",{method:"post",parameters:"tag1="+$F("tag1")+"&tag2="+$F("tag2"),onComplete:function(){$("fight-process").style.display="none";
$("fightForm").style.display="none";$("tag-fight-button-new").style.display="block"}})};TagFight.newFight=function(){$("fight-process").style.display="none";$("fightForm").style.display="block";$("fightResultCount").style.display="none";$("tag-fight-button").style.display="block";$("tag-fight-button-new").style.display="none";
$("fightanimation").src=habboStaticFilePath+"/images/tagfight/tagfight_start.gif";$("tag1").value="";$("tag2").value=""};var Dialog={moveDialogToCenter:function(E){var D=$(document.body).cumulativeOffset();var F=Element.getDimensions(E);var B=Utils.getPageSize();var A=0,G=0;A=Math.round(B[2]/2)-Math.round(F.width/2);
if($("ad_sidebar")){var C=$("ad_sidebar").cumulativeOffset();if(A+F.width>C[0]){A=C[0]-F.width}}if(A<0){A=0}G=document.viewport.getScrollOffsets().top+80;if(G+F.height>B[1]){G=B[1]-F.height}if(G<D[1]){G=D[1]+20}E.style.left=A+"px";E.style.top=G+"px"},createDialog:function(N,H,I,G,E,A,K){if(!N){return 
}var F=$("overlay");var B=[];if(!K){B.push(Builder.node("h2",{className:"title dialog-handle"},H));if(H.length==0){B[0].innerHTML="&nbsp;"}}if(A){var O=Builder.node("a",{href:"#",className:"topdialog-exit"},[Builder.node("img",{src:habboStaticFilePath+"/v2/images/close_x.gif",width:15,height:15,alt:""})]);
Event.observe(O,"click",function(P){Event.stop(P);A()},false);B.push(O)}var M=[];if(K){var D=Builder.node("div",{className:"topdialog-tabs"});D.innerHTML=K;M.push(B);M.push(D);var L=$(D).select("ul");if(L.length>0){L[0].addClassName("box-tabs")}}else{M.push(B)}M.push(Builder.node("div",{id:N+"-body",className:"topdialog-body"}));
var C="cbb topdialog"+(K?" black":"");var J=F.parentNode.insertBefore(Builder.node("div",{id:N,className:C},M),F.nextSibling);Rounder.round(J);J=J.parentNode.parentNode.parentNode;J.style.zIndex=(I||9001);J.style.left=(G||-1000)+"px";J.style.top=(E||0)+"px";Dialog.makeDialogDraggable(J);return J},showInfoDialog:function(A,F,E,B){Overlay.show();
var C=Dialog.createDialog(A,"","9003");var D=Builder.node("a",{href:"#",className:"new-button"},[Builder.node("b",E),Builder.node("i")]);Dialog.appendDialogBody(C,Builder.node("p",{id:A+"content"}));$(A+"content").innerHTML=F;Dialog.appendDialogBody(C,Builder.node("p",[D]));if(B==null){Event.observe(D,"click",function(G){Event.stop(G);
Element.hide($(A));Overlay.hide()},false)}else{Event.observe(D,"click",B,false)}Overlay.move("9002");Dialog.moveDialogToCenter(C)},showConfirmDialog:function(E){var B=Object.extend({dialogId:"confirm-dialog",buttonText:"OK",cancelButtonText:"Cancel",headerText:"Are you sure?",okHandler:Prototype.emptyFunction,cancelHandler:Prototype.emptyFunction},arguments[1]||{});
Overlay.show();var C=Dialog.createDialog(B.dialogId,B.headerText,"9003");if(B.width){C.style.width=B.width}Dialog.appendDialogBody(C,Builder.node("p",{id:B.dialogId+"content"}));$(B.dialogId+"content").innerHTML=E;var D=Builder.node("a",{href:"#",className:"new-button"},[Builder.node("b",B.buttonText),Builder.node("i")]);
var A=Builder.node("a",{href:"#",className:"new-button"},[Builder.node("b",B.cancelButtonText),Builder.node("i")]);Dialog.appendDialogBody(C,Builder.node("div",[A,D]));Event.observe(D,"click",function(F){Event.stop(F);B.okHandler()},false);Event.observe(A,"click",function(F){Event.stop(F);Element.remove($(B.dialogId));
Overlay.hide();B.cancelHandler()},false);Overlay.move("9002");Dialog.moveDialogToCenter(C);return C},appendDialogBody:function(D,B,A){var E=$(D);if(E){var C=$(E.id+"-body");(A)?C.innerHTML+=B:C.insertBefore(B,C.lastChild);if(B.innerHTML){B.innerHTML.evalScripts()}}},setDialogBody:function(C,A){var D=$(C);
if(D){var B=$(D.id+"-body");B.innerHTML=A}},setAsWaitDialog:function(A){var B=$(A);if(B){Element.wait($(B.id+"-body"))}},makeDialogDraggable:function(A){if(typeof Draggable!="undefined"){var B="title";if(!$(A).down("."+B,0)){B="box-tabs"}new Draggable(A,{handle:B,starteffect:Prototype.emptyFunction,endeffect:Prototype.emptyFunction,zindex:9100})
}}};var Overlay={show:function(F,E){var A=Utils.getPageSize();var C=$("overlay");C.style.display="block";C.style.height=A[1]+"px";try{var G=Element.getDimensions("top").width;if(G>A[2]){C.style.minWidth=G+"px"}}catch(D){}C.style.zIndex="9000";if(E){var B=C.parentNode.insertBefore(Builder.node("div",{id:"overlay_progress"},[Builder.node("p",[Builder.node("img",{src:habboStaticFilePath+"/v2/images/page_loader.gif",alt:E})]),Builder.node("p",E)]),C.nextSibling);
Overlay.center(B)}if(F){Event.observe($("overlay"),"click",function(H){F()},false);if(E){Event.observe($("overlay_progress"),"click",function(H){F()},false)}}$$("object,embed").each(function(H){H.setStyle({visibility:"hidden"})})},center:function(C){var B=Utils.getPageSize();var D=Element.getDimensions(C);
var A=0,E=0;A=Math.round(B[2]/2)-Math.round(D.width/2);if(A<0){A=0}E=document.viewport.getScrollOffsets().top+(Math.round(B[3]/2)-Math.round(D.height/2));if(E<0){E=0}C.style.left=A+"px";C.style.top=E+"px"},hide:function(){if($("overlay_progress")){Element.remove($("overlay_progress"))}var A=$("overlay");
A.style.zIndex="9000";A.style.display="none";$$("object,embed").each(function(B){B.setStyle({visibility:"visible"})})},move:function(A){$("overlay").style.zIndex=A;if($("overlay_progress")){$("overlay_progress").style.zIndex=A}},hideIfMacFirefox:function(){var A=navigator.platform;var B=navigator.appName;
if((A=="Mac"||A=="MacIntel"||A=="MacPPC")&&(B=="Netscape"||B=="Mozilla"||B=="Firefox")){Overlay.hide()}},lightbox:function(E,C){var B=Builder.node("img",{src:E,style:"display: none; position: absolute; z-index: 9001; top:0; left:0; border: 7px solid #fff"});var D=function(F){if(F){Event.stop(F)}B.hide();
Overlay.hide()};Event.observe(B,"click",D);var A=new Image();Overlay.show(D,C||"");A.onload=function(){if($("overlay_progress")){Element.remove($("overlay_progress"))}$("overlay").parentNode.insertBefore(B,$("overlay"));Overlay.center(B);B.show();A.onload=function(){}};A.src=E}};var ScriptLoader={loaded:[],callbacks:[],load:function(E,A){if(!A){A={}
}if(!ScriptLoader.loaded[E]){var C=document.getElementsByTagName("head")[0];var B=document.createElement("script");B.type="text/javascript";var D=A.path||habboStaticFilePath+"/js";B.src=D+"/"+E+".js";if(A.callback){ScriptLoader.callbacks[E]=A.callback}C.appendChild(B)}else{if(A.callback){A.callback()
}}},notify:function(B,A){ScriptLoader.loaded[B]=true;if(ScriptLoader.callbacks[B]){ScriptLoader.callbacks[B](A)}}};QuickMenu=Class.create();QuickMenu.prototype={initialize:function(){},add:function(A,B){new QuickMenuItem(this,A,B)},activate:function(A){var B=A.element;if(this.active){Element.removeClassName(this.active,"selected")
}if(this.active===B){this.closeContainer()}else{Element.addClassName(B,"selected");if(this.openContainer(B)){if(A.clickHandler){A.clickHandler.apply(null,[this.qtabContainer])}}}},openContainer:function(B){var C=$("the-qtab-"+B.id);var D=(C==null);if(D){var C=$(Builder.node("div",{"class":"the-qtab",id:"the-qtab-"+B.id}));
$("header").appendChild(C);var A='<div style="margin-left: 1px; width: '+(B.getWidth()-2)+'px; height: 1px; background-color: #fff"></div>';C.update('<div class="qtab-container-top">'+A+'</div><div class="qtab-container-bottom"><div id="qtab-container-'+B.id+'" class="qtab-container"></div></div>');this.qtabContainer=$("qtab-container-"+B.id);
C.clonePosition(B,{setWidth:false,setHeight:false,offsetTop:25})}$("header").select(".the-qtab").each(Element.hide);C.show();this.active=B;return D},closeContainer:function(){$("header").select(".the-qtab").each(Element.hide);if(this.active){var A=$("the-qtab-"+this.active.id);Element.removeClassName(this.active,"selected")
}this.active=null}};QuickMenuItem=Class.create();QuickMenuItem.prototype={initialize:function(A,C,D){this.quickMenu=A;this.element=$(C);var B=this.click.bind(this);C.down("a").observe("click",B);if(D){this.clickHandler=D}},click:function(A){Event.stop(A);this.quickMenu.activate(this)}};HabboView.add(function(){if(document.habboLoggedIn&&$("subnavi-user")){var B=new QuickMenu();
var A=$A([["myfriends","habblet/quickmenu.php?key=friends_all"],["mygroups","habblet/quickmenu.php?key=groups"],["myrooms","habblet/quickmenu.php?key=rooms"]]);A.each(function(C){B.add($(C[0]),function(D){var E=C[1];Element.wait(D);new Ajax.Updater(D,E,{onComplete:function(){new QuickMenuListPaging(C[0],E)}})})});Event.observe(document.body,"click",function(C){B.closeContainer()
})}});var Accordion=Class.create();Accordion.prototype={initialize:function(F,E,A,C,D,B){this.animating=false;this.openedItem=null;this.accordionContainer=F;this.summaryContainerPrefix=E;this.toggleDetailsClassName=A;this.detailsContainerPrefix=C;this.openDetailsL10NKey=D;this.closeDetailsL10NKey=B;this.accordionContainer.select("."+this.toggleDetailsClassName).each(function(H){var G=this.parseItem(H);
if(G.el.visible()){this.openedItem=G;throw $break}}.bind(this));Event.observe(this.accordionContainer,"click",function(I){var H=Event.element(I);if(H&&H.id&&H.hasClassName(this.toggleDetailsClassName)){Event.stop(I);var G=this.parseItem(H);if(G.el){this.toggleItems(G.link,G.el,G.id)}}}.bind(this))},parseItem:function(B){var C=B.id.split("-").last();
var A=$(this.detailsContainerPrefix+C);return{link:B,el:A,id:C}},toggleItems:function(D,B,E){if(this.animating){return false}var A=this.openedItem;var C=[];if(!A||(A&&A.id!=E)){$(this.summaryContainerPrefix+E).addClassName("selected");if(this.closeDetailsL10NKey){D.innerHTML=L10N.get(this.closeDetailsL10NKey)
}C.push(new Effect.BlindDown(B));this.openedItem={link:D,el:B,id:E}}if(A&&A.id==E){this.openedItem=null}if(A){$(this.summaryContainerPrefix+A.id).removeClassName("selected");if(this.openDetailsL10NKey){A.link.innerHTML=L10N.get(this.openDetailsL10NKey)}C.push(new Effect.BlindUp(A.el))}new Effect.Parallel(C,{queue:{position:"end",scope:"accordionAnimation"},beforeStart:function(F){this.animating=true
}.bind(this),afterFinish:function(F){this.animating=false}.bind(this)})}};var TimeTracker=function(A){if(A){this.bucket_=A.sort(this.sortNumber)}else{this.bucket_=TimeTracker.DEFAULT_BUCKET}};TimeTracker.prototype.startTime_;TimeTracker.prototype.stopTime_;TimeTracker.prototype.bucket_;TimeTracker.DEFAULT_BUCKET=[100,500,1500,2500,5000];
TimeTracker.prototype._getTimeDiff=function(){return(this.stopTime_-this.startTime_)};TimeTracker.prototype.sortNumber=function(B,A){return(B-A)};TimeTracker.prototype._recordStartTime=function(A){if(A!=undefined){this.startTime_=A}else{this.startTime_=(new Date()).getTime()}};TimeTracker.prototype._recordEndTime=function(A){if(A!=undefined){this.stopTime_=A
}else{this.stopTime_=(new Date()).getTime()}};TimeTracker.prototype._track=function(F,A,C){var E;if(A!=undefined&&A.length!=0){E=F._createEventTracker(A)}else{E=F._createEventTracker("TimeTracker")}var D;var B;for(D=0;D<this.bucket_.length;D++){if((this._getTimeDiff())<this.bucket_[D]){if(D==0){B="0-"+(this.bucket_[0]);
break}else{B=this.bucket_[D-1]+"-"+(this.bucket_[D]-1);break}}}if(!B){B=this.bucket_[D-1]+"+"}E._trackEvent(B,C,this._getTimeDiff())};TimeTracker.prototype._setHistogramBuckets=function(A){this.bucket_=A.sort(this.sortNumber)};TimeTracker.prototype._registerMeasurement=function(){new Ajax.Request("/log/measure",{method:"post",parameters:{requestUrl:window.location.href,pageLoadTime:this._getTimeDiff(),userAgent:navigator.userAgent}})
};var PrettyTimer=Class.create({_time:0,_callback:Prototype.emptyFunction,_options:{leadingZeros:true,showDays:true,showMeaningfulOnly:true,endCallback:Prototype.emptyFunction,localizations:{days:"{0}:",hours:"{0}:",minutes:"{0}:",seconds:"{0}"}},initialize:function(B,C,A){this._time=B;if(!!C){this._callback=C
}if(!!A){this._options=Object.extend(this._options,A||{})}this._update();new PeriodicalExecuter(this._update.bind(this),1)},_update:function(C){if(this._time==0){this._options.endCallback();if(!!C){C.stop()}}else{var E=Math.floor(this._time/60);var B=Math.floor(E/60);E-=(B*60);var F=Math.floor(B/24);
B-=(F*24);var D=this._time-(F*24*60*60)-(B*60*60)-(E*60);var A="";if(this._options.showDays){if(!this._options.showMeaningfulOnly||F>0){if(this._options.leadingZeros&&F<10){A+="0"}A+=this._options.localizations.days.replace("{0}",F)}}if(!this._options.showMeaningfulOnly||B>0||F>0){if(this._options.leadingZeros&&B<10){A+="0"
}A+=this._options.localizations.hours.replace("{0}",B)}if(!this._options.showMeaningfulOnly||E>0||B>0||F>0){if(this._options.leadingZeros&&E<10){A+="0"}A+=this._options.localizations.minutes.replace("{0}",E)}if(this._options.leadingZeros&&D<10){A+="0"}A+=this._options.localizations.seconds.replace("{0}",D);
this._callback(A)}this._time--}});var HashHistory=function(){var B=false;var D=new Hash();var C="";var E=function(){C=window.location.hash;new PeriodicalExecuter(function(){var F=window.location.hash;if(F!=C&&F.indexOf("#")!=-1){A(F,false)}},0.3)};var A=function(F,G){C=F;D.each(function(H){if(new RegExp(H.key).test(F.substring(1))){H.value(F.substring(1),G)
}})};return{observe:function(F,G){D.set(F,G);if(!B){E()}A(window.location.hash,true)},setHash:function(F,G){C=F;if(!G){A(F,false)}window.location.hash=F}}}();