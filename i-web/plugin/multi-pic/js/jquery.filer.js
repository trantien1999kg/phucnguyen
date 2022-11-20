!function(a){"use strict";a.fn.filer=function(b){return this.each(function(c,d){var e=a(d),f=".jFiler",g=a(),h=a(),i=a(),j=[],k=a.extend(!0,{},a.fn.filer.defaults,b),l={init:function(){e.wrap('<div class="jFiler"></div>'),g=e.closest(f),l._changeInput()},_bindInput:function(){k.changeInput&&h.size()>0&&h.bind("click",l._clickHandler),e.on({focus:function(){h.addClass("focused")},blur:function(){h.removeClass("focused")},change:function(){l._onChange()}}),k.dragDrop&&(h.length>0?h:e).bind("drop",l._dragDrop.drop).bind("dragover",l._dragDrop.dragEnter).bind("dragleave",l._dragDrop.dragLeave),k.uploadFile&&k.clipBoardPaste&&a(window).on("paste",l._clipboardPaste)},_unbindInput:function(){k.changeInput&&h.size()>0&&h.unbind("click",l._clickHandler)},_clickHandler:function(){e.click()},_applyAttrSettings:function(){var a=["name","limit","maxSize","extensions","changeInput","showThumbs","appendTo","theme","addMore","excludeName","files"];for(var b in a){var c="data-jfiler-"+a[b];if(l._assets.hasAttr(c)){switch(a[b]){case"changeInput":case"showThumbs":case"addMore":k[a[b]]=["true","false"].indexOf(e.attr(c))>-1?"true"==e.attr(c):e.attr(c);break;case"extensions":k[a[b]]=e.attr(c).replace(/ /g,"").split(",");break;case"files":k[a[b]]=JSON.parse(e.attr(c));break;default:k[a[b]]=e.attr(c)}e.removeAttr(c)}}},_changeInput:function(){if(l._applyAttrSettings(),k.theme&&g.addClass("jFiler-theme-"+k.theme),"input"!=e.get(0).tagName.toLowerCase()&&"file"!=e.get(0).type)h=e,e=a('<input type="file" name="'+k.name+'" />'),e.css({position:"absolute",left:"-9999px",top:"-9999px","z-index":"-9999"}),g.prepend(e),l._isGn=e;else if(k.changeInput){switch(typeof k.changeInput){case"boolean":h=a('<div class="jFiler-input"><div class="jFiler-input-caption"><span>'+k.captions.feedback+'</span></div><div class="jFiler-input-button">'+k.captions.button+'</div></div>"');break;case"string":case"object":h=a(k.changeInput);break;case"function":h=a(k.changeInput(g,e,k))}e.after(h),e.css({position:"absolute",left:"-9999px",top:"-9999px","z-index":"-9999"})}(!k.limit||k.limit&&k.limit>=2)&&(e.attr("multiple","multiple"),"[]"!=e.attr("name").slice(-2)&&e.attr("name",e.attr("name")+"[]")),l._bindInput(),k.files&&l._append(!1,{files:k.files})},_clear:function(){l.files=null,k.uploadFile||k.addMore||l._reset(),l._set("feedback",l._itFl&&l._itFl.length>0?l._itFl.length+" "+k.captions.feedback2:k.captions.feedback),null!=k.onEmpty&&"function"==typeof k.onEmpty&&k.onEmpty(g,h,e)},_reset:function(b){if(!b){if(!k.uploadFile&&k.addMore){for(var c=0;c<j.length;c++)j[c].remove();j=[],l._unbindInput(),e=l._isGn?l._isGn:a(d),l._bindInput()}l._set("input","")}l._itFl=[],l._itFc=null,l._ajFc=0,g.find("input[name^='jfiler-items-exclude-']:hidden").remove(),i.fadeOut("fast",function(){a(this).remove()}),i=a()},_set:function(a,b){switch(a){case"input":e.val("");break;case"feedback":h.length>0&&h.find(".jFiler-input-caption span").html(b)}},_filesCheck:function(){var b=0;if(k.limit&&l.files.length+l._itFl.length>k.limit)return alert(l._assets.textParse(k.captions.errors.filesLimit)),!1;for(var c=0;c<l.files.length;c++){var d=l.files[c].name.split(".").pop().toLowerCase(),e=l.files[c],f={name:e.name,size:e.size,size2:l._assets.bytesToSize(e.size),type:e.type,ext:d};if(null!=k.extensions&&-1==a.inArray(d,k.extensions))return alert(l._assets.textParse(k.captions.errors.filesType,f)),!1;if(null!=k.maxSize&&l.files[c].size>1048576*k.maxSize)return alert(l._assets.textParse(k.captions.errors.filesSize,f)),!1;if(4096==e.size&&0==e.type.length)return!1;b+=l.files[c].size}if(null!=k.maxSize&&b>=Math.round(1048576*k.maxSize))return alert(l._assets.textParse(k.captions.errors.filesSizeAll)),!1;if(k.addMore||k.uploadFile){var f=l._itFl.filter(function(a,b){if(a.file.name==e.name&&a.file.size==e.size&&a.file.type==e.type&&(!e.lastModified||a.file.lastModified==e.lastModified))return!0});if(f.length>0)return!1}return!0},_thumbCreator:{create:function(b){var c=l.files[b],d=l._itFc?l._itFc.id:b,e=c.name,f=c.size,g=c.type.split("/",1).toString().toLowerCase(),h=-1!=e.indexOf(".")?e.split(".").pop().toLowerCase():"",j=k.uploadFile?'<div class="jFiler-jProgressBar">'+k.templates.progressBar+"</div>":"",m={id:d,name:e,size:f,size2:l._assets.bytesToSize(f),type:g,extension:h,icon:l._assets.getIcon(h,g),icon2:l._thumbCreator.generateIcon({type:g,extension:h}),image:'<div class="jFiler-item-thumb-image fi-loading"></div>',progressBar:j,_appended:c._appended},n="";if(c.opts&&(m=a.extend({},c.opts,m)),n=a(l._thumbCreator.renderContent(m)).attr("data-jfiler-index",d),n.get(0).jfiler_id=d,l._thumbCreator.renderFile(c,n,m),c.forList)return n;l._itFc.html=n,n.hide()[k.templates.itemAppendToEnd?"appendTo":"prependTo"](i.find(k.templates._selectors.list)).show(),c._appended||l._onSelect(b)},renderContent:function(a){return l._assets.textParse(a._appended?k.templates.itemAppend:k.templates.item,a)},renderFile:function(b,c,d){if(0==c.find(".jFiler-item-thumb-image").size())return!1;if(b.file&&"image"==d.type){var e='<img src="'+b.file+'" draggable="false" />',f=c.find(".jFiler-item-thumb-image.fi-loading");return a(e).error(function(){e=l._thumbCreator.generateIcon(d),c.addClass("jFiler-no-thumbnail"),f.removeClass("fi-loading").html(e)}).load(function(){f.removeClass("fi-loading").html(e)}),!0}if(window.File&&window.FileList&&window.FileReader&&"image"==d.type&&d.size<6e6){var g=new FileReader;g.onload=function(b){var e='<img src="'+b.target.result+'" draggable="false" />',f=c.find(".jFiler-item-thumb-image.fi-loading");a(e).error(function(){e=l._thumbCreator.generateIcon(d),c.addClass("jFiler-no-thumbnail"),f.removeClass("fi-loading").html(e)}).load(function(){f.removeClass("fi-loading").html(e)})},g.readAsDataURL(b)}else{var e=l._thumbCreator.generateIcon(d),f=c.find(".jFiler-item-thumb-image.fi-loading");c.addClass("jFiler-no-thumbnail"),f.removeClass("fi-loading").html(e)}},generateIcon:function(b){var c=new Array(3);if(b&&b.type&&b.extension)switch(b.type){case"image":c[0]="f-image",c[1]='<i class="icon-jfi-file-image"></i>';break;case"video":c[0]="f-video",c[1]='<i class="icon-jfi-file-video"></i>';break;case"audio":c[0]="f-audio",c[1]='<i class="icon-jfi-file-audio"></i>';break;default:c[0]="f-file f-file-ext-"+b.extension,c[1]=b.extension.length>0?"."+b.extension:"",c[2]=1}else c[0]="f-file",c[1]=b.extension&&b.extension.length>0?"."+b.extension:"",c[2]=1;var d='<span class="jFiler-icon-file '+c[0]+'">'+c[1]+"</span>";if(1==c[2]){var e=l._assets.text2Color(b.extension);if(e){var f=a(d).appendTo("body"),g=f.css("box-shadow");g=e+g.substring(g.replace(/^.*(rgba?\([^)]+\)).*$/,"$1").length,g.length),f.css({"-webkit-box-shadow":g,"-moz-box-shadow":g,"box-shadow":g}).attr("style","-webkit-box-shadow: "+g+"; -moz-box-shadow: "+g+"; box-shadow: "+g+";"),d=f.prop("outerHTML"),f.remove()}}return d},_box:function(b){if(null!=k.beforeShow&&"function"==typeof k.beforeShow&&!k.beforeShow(l.files,i,g,h,e))return!1;if(i.length<1){if(k.appendTo)var c=a(k.appendTo);else var c=g;c.find(".jFiler-items").remove(),i=a('<div class="jFiler-items jFiler-row"></div>'),i.append(l._assets.textParse(k.templates.box)).appendTo(c),i.on("click",k.templates._selectors.remove,function(c){c.preventDefault(),(!k.templates.removeConfirmation||confirm(k.captions.removeConfirmation))&&l._remove(b?b.remove.event:c,b?b.remove.el:a(this).closest(k.templates._selectors.item))})}for(var d=0;d<l.files.length;d++)l._addToMemory(d),l._thumbCreator.create(d)}},_upload:function(b){var c=l._itFc.html,d=new FormData;if(d.append(e.attr("name"),l._itFc.file,!!l._itFc.file.name&&l._itFc.file.name),null!=k.uploadFile.data&&a.isPlainObject(k.uploadFile.data))for(var f in k.uploadFile.data)d.append(f,k.uploadFile.data[f]);l._ajax.send(c,d,l._itFc)},_ajax:{send:function(b,c,d){return d.ajax=a.ajax({url:k.uploadFile.url,data:c,type:k.uploadFile.type,enctype:k.uploadFile.enctype,xhr:function(){var c=a.ajaxSettings.xhr();return c.upload&&c.upload.addEventListener("progress",function(a){l._ajax.progressHandling(a,b)},!1),c},complete:function(a,b){d.ajax=!1,++l._ajFc>=l.files.length&&(null!=k.uploadFile.onComplete&&"function"==typeof k.uploadFile.onComplete&&k.uploadFile.onComplete(i,g,h,e,a,b),l._ajFc=0)},beforeSend:function(a,c){return null==k.uploadFile.beforeSend||"function"!=typeof k.uploadFile.beforeSend||k.uploadFile.beforeSend(b,i,g,h,e,d.id,a,c)},success:function(a,c,f){d.uploaded=!0,null!=k.uploadFile.success&&"function"==typeof k.uploadFile.success&&k.uploadFile.success(a,b,i,g,h,e,d.id,c,f)},error:function(a,c,f){d.uploaded=!1,null!=k.uploadFile.error&&"function"==typeof k.uploadFile.error&&k.uploadFile.error(b,i,g,h,e,d.id,a,c,f)},statusCode:k.uploadFile.statusCode,cache:!1,contentType:!1,processData:!1}),d.ajax},progressHandling:function(a,b){if(a.lengthComputable){var c=Math.round(100*a.loaded/a.total).toString();null!=k.uploadFile.onProgress&&"function"==typeof k.uploadFile.onProgress&&k.uploadFile.onProgress(c,b,i,g,h,e),b.find(".jFiler-jProgressBar").find(k.templates._selectors.progressBar).css("width",c+"%")}}},_dragDrop:{dragEnter:function(a){a.preventDefault(),a.stopPropagation(),g.addClass("dragged"),l._set("feedback",k.captions.drop),null!=k.dragDrop.dragEnter&&"function"==typeof k.dragDrop.dragEnter&&k.dragDrop.dragEnter(a,h,e,g)},dragLeave:function(a){if(a.preventDefault(),a.stopPropagation(),!l._dragDrop._dragLeaveCheck(a))return!1;g.removeClass("dragged"),l._set("feedback",k.captions.feedback),null!=k.dragDrop.dragLeave&&"function"==typeof k.dragDrop.dragLeave&&k.dragDrop.dragLeave(a,h,e,g)},drop:function(a){a.preventDefault(),g.removeClass("dragged"),!a.originalEvent.dataTransfer.files||a.originalEvent.dataTransfer.files.length<=0||(l._set("feedback",k.captions.feedback),l._onChange(a,a.originalEvent.dataTransfer.files),null!=k.dragDrop.drop&&"function"==typeof k.dragDrop.drop&&k.dragDrop.drop(a.originalEvent.dataTransfer.files,a,h,e,g))},_dragLeaveCheck:function(b){var c=b.relatedTarget,d=!1;return c===h||(c&&(d=a.contains(h,c)),!d)}},_clipboardPaste:function(a,b){if((b||a.originalEvent.clipboardData||a.originalEvent.clipboardData.items)&&(!b||a.originalEvent.dataTransfer||a.originalEvent.dataTransfer.items)&&!l._clPsePre){var c=b?a.originalEvent.dataTransfer.items:a.originalEvent.clipboardData.items,d=function(a,b,c){b=b||"",c=c||512;for(var d=atob(a),e=[],f=0;f<d.length;f+=c){for(var g=d.slice(f,f+c),h=new Array(g.length),i=0;i<g.length;i++)h[i]=g.charCodeAt(i);var j=new Uint8Array(h);e.push(j)}return new Blob(e,{type:b})};if(c)for(var e=0;e<c.length;e++)if(-1!==c[e].type.indexOf("image")||-1!==c[e].type.indexOf("text/uri-list")){if(b)try{window.atob(a.originalEvent.dataTransfer.getData("text/uri-list").toString().split(",")[1])}catch(a){return}var f=b?d(a.originalEvent.dataTransfer.getData("text/uri-list").toString().split(",")[1],"image/png"):c[e].getAsFile();f.name=Math.random().toString(36).substring(5),f.name+=-1!=f.type.indexOf("/")?"."+f.type.split("/")[1].toString().toLowerCase():".png",l._onChange(a,[f]),l._clPsePre=setTimeout(function(){delete l._clPsePre},1e3)}}},_onSelect:function(b){k.uploadFile&&!a.isEmptyObject(k.uploadFile)&&l._upload(b),null!=k.onSelect&&"function"==typeof k.onSelect&&k.onSelect(l.files[b],l._itFc.html,i,g,h,e),b+1>=l.files.length&&null!=k.afterShow&&"function"==typeof k.afterShow&&k.afterShow(i,g,h,e)},_onChange:function(b,c){if(c){if(!c||0==c.length)return l._set("input",""),l._clear(),!1;l.files=c}else{if(!e.get(0).files||void 0===e.get(0).files||0==e.get(0).files.length)return k.uploadFile||k.addMore||(l._set("input",""),l._clear()),!1;l.files=e.get(0).files}if(k.uploadFile||k.addMore||l._reset(!0),!l._filesCheck())return l._set("input",""),l._clear(),!1;if(l._set("feedback",l.files.length+l._itFl.length+" "+k.captions.feedback2),k.showThumbs)l._thumbCreator._box();else for(var d=0;d<l.files.length;d++)l._addToMemory(d),l._onSelect(d);if(!k.uploadFile&&k.addMore){var f=a('<input type="file" />'),g=e.prop("attributes");a.each(g,function(){f.attr(this.name,this.value)}),e.after(f),l._unbindInput(),j.push(f),e=f,l._bindInput()}},_append:function(a,b){var c=!!b&&b.files;if(c&&!(c.length<=0)&&(l.files=c,k.showThumbs)){for(var d=0;d<l.files.length;d++)l.files[d]._appended=!0;l._thumbCreator._box()}},_getList:function(a,b){var c=!!b&&b.files;if(c&&!(c.length<=0)&&(l.files=c,k.showThumbs)){for(var d=[],f=0;f<l.files.length;f++)l.files[f].forList=!0,d.push(l._thumbCreator.create(f));b.callback&&b.callback(d,i,g,h,e)}},_retryUpload:function(b,c){var d=parseInt("object"==typeof c?c.attr("data-jfiler-index"):c),e=l._itFl.filter(function(a,b){return a.id==d});return e.length>0&&(!k.uploadFile||a.isEmptyObject(k.uploadFile)||e[0].uploaded?void 0:(l._itFc=e[0],l._upload(d),!0))},_remove:function(b,d){if(d.binded){if(d.data.id&&(d=i.find(k.templates._selectors.item+"[data-jfiler-index='"+d.data.id+"']"),0==d.size()))return!1;d.data.el&&(d=d.data.el)}var f=d.get(0).jfiler_id||d.attr("data-jfiler-index"),j=null,m=function(b){var d=g.find("input[name^='jfiler-items-exclude-']:hidden").first(),f=l._itFl[b].file,h=[];0==d.size()?(d=a('<input type="hidden" name="jfiler-items-exclude-'+(k.excludeName?k.excludeName:("[]"!=e.attr("name").slice(-2)?e.attr("name"):e.attr("name").substring(0,e.attr("name").length-2))+"-"+c)+'">'),d.appendTo(g)):h=JSON.parse(d.val()),h.push(f.name),h=JSON.stringify(h),d.val(h)},n=function(b,c){m(c),l._itFl.splice(c,1),l._itFl.length<1?(l._reset(),l._clear()):l._set("feedback",l._itFl.length+" "+k.captions.feedback2),b.fadeOut("fast",function(){a(this).remove()})};for(var o in l._itFl)"length"!==o&&l._itFl.hasOwnProperty(o)&&l._itFl[o].id==f&&(j=o);return!!l._itFl.hasOwnProperty(j)&&(l._itFl[j].ajax?(l._itFl[j].ajax.abort(),void n(d,j)):(null!=k.onRemove&&"function"==typeof k.onRemove&&k.onRemove(d,l._itFl[j].file,j,i,g,h,e),void n(d,j)))},_addToMemory:function(b){l._itFl.push({id:l._itFl.length,file:l.files[b],html:a(),ajax:!1,uploaded:!1}),l._itFc=l._itFl[l._itFl.length-1]},_assets:{bytesToSize:function(a){if(0==a)return"0 Byte";var b=1e3,c=["Bytes","KB","MB","GB","TB","PB","EB","ZB","YB"],d=Math.floor(Math.log(a)/Math.log(b));return(a/Math.pow(b,d)).toPrecision(3)+" "+c[d]},hasAttr:function(a,b){var b=b||e,c=b.attr(a);return!(!c||void 0===c)},getIcon:function(b,c){var d=["audio","image","text","video"];return a.inArray(c,d)>-1?'<i class="icon-jfi-file-'+c+" jfi-file-ext-"+b+'"></i>':'<i class="icon-jfi-file-o jfi-file-type-'+c+" jfi-file-ext-"+b+'"></i>'},textParse:function(b,c){switch(c=a.extend({},{limit:k.limit,maxSize:k.maxSize},c&&a.isPlainObject(c)?c:{}),typeof b){case"string":return b.replace(/\{\{fi-(.*?)\}\}/g,function(a,b){return b=b.replace(/ /g,""),b.match(/(.*?)\|limitTo\:(\d+)/)?b.replace(/(.*?)\|limitTo\:(\d+)/,function(a,b,d){var b=c[b]?c[b]:"",e=b.substring(0,d);return e=b.length>e.length?e.substring(0,e.length-3)+"...":e}):c[b]?c[b]:""});case"function":return b(c);default:return b}},text2Color:function(a){if(!a||0==a.length)return!1;for(var b=0,c=0;b<a.length;c=a.charCodeAt(b++)+((c<<5)-c));for(var b=0,d="#";b<3;d+=("00"+(c>>2*b++&255).toString(16)).slice(-2));return d}},files:null,_itFl:[],_itFc:null,_ajFc:0};return l.init(),e.on("filer.append",function(a,b){l._append(a,b)}),e.on("filer.remove",function(a,b){b.binded=!0,l._remove(a,b)}),e.on("filer.reset",function(a){return l._reset(),l._clear(),!0}),e.on("filer.generateList",function(a,b){return l._getList(a,b)}),e.on("filer.retry",function(a,b){return l._retryUpload(a,b)}),this})},a.fn.filer.defaults={limit:null,maxSize:null,extensions:null,changeInput:!0,showThumbs:!1,appendTo:null,theme:null,templates:{box:null,item:null,itemAppend:null,progressBar:null,itemAppendToEnd:!1,removeConfirmation:!0,_selectors:{list:null,item:null,progressBar:null,remove:null}},files:null,uploadFile:null,dragDrop:null,addMore:!1,clipBoardPaste:!0,excludeName:null,beforeShow:null,onSelect:null,afterShow:null,onRemove:null,onEmpty:null,captions:{button:"Choose Files",feedback:"Choose files To Upload",feedback2:"files were chosen",drop:"Drop file here to Upload",removeConfirmation:"Are you sure you want to remove this file?",errors:{filesLimit:"Only {{fi-limit}} files are allowed to be uploaded.",filesType:"Only Images are allowed to be uploaded.",filesSize:"{{fi-name}} is too large! Please upload file up to {{fi-maxSize}} MB.",filesSizeAll:"Files you've choosed are too large! Please upload files up to {{fi-maxSize}} MB."}}}}(jQuery);