(function() {    tinymce.create('tinymce.plugins.smpanel', {        init : function(ed, url) {			ed.addCommand('insert', function() {				if (s=prompt("YouTube", "Video id")) {					s='[youtube id="'+s+'"]';					ed.execCommand('mceInsertContent', false, s);				}				});			ed.addCommand('insert6', function() {				if (s=prompt("Vimeo", "Video id")) {					s='[vimeo id="'+s+'"]';					ed.execCommand('mceInsertContent', false, s);				}				});			ed.addCommand('insert2', function() {				ed.windowManager.open({						file : url + '/../inc/windows/buttons.php',						width : 540,						height : 150,                        title: 'SMThemes',						inline : 1					});			});			ed.addCommand('insert3', function() {				ed.windowManager.open({						file : url + '/../inc/windows/columns.php?url='+url,						width : 540,						height : 150,                        title: 'SMThemes',						inline : 1					});			});			ed.addCommand('insert4', function() {				var s=ed.selection.getContent();				if (s=='')s='Tooltip';				var t=prompt("Tooltip", "Tooltip text");				s='[tooltip tiptext="'+t+'"]'+s+'[/tooltip]';				ed.execCommand('mceInsertContent', false, s);			});			ed.addCommand('insert5', function() {				var s=ed.selection.getContent();				ed.windowManager.open({						file : url + '/../inc/windows/highlights.php?url='+url+'&txt='+s,						width : 540,						height : 100,                        title: 'SMThemes',						inline : 1					});			});            ed.addButton('youtube', {                title : 'YouTube',                image : url+'/../inc/images/youtube.png',                cmd: 'insert'            });			ed.addButton('vimeo', {                title : 'Vimeo',                image : url+'/../inc/images/vimeo.png',                cmd: 'insert6'            });			ed.addButton('btns', {                title : 'Button',                image : url+'/../inc/images/buttons.png',                cmd: 'insert2'            });			ed.addButton('cols', {                title : 'Columns',                image : url+'/../inc/images/cols.png',                cmd: 'insert3'            });			ed.addButton('tooltips', {                title : 'Tooltip',                image : url+'/../inc/images/tooltips.png',                cmd: 'insert4'            });			ed.addButton('highlights', {                title : 'Highlight',                image : url+'/../inc/images/highlights.png',                cmd: 'insert5'            });			        },        createControl : function(n, cm) {            return null;        },        getInfo : function() {            return {                longname : "Brett's YouTube Shortcode",                author : 'Brett Terpstra',                authorurl : 'http://brettterpstra.com/',                infourl : 'http://brettterpstra.com/',                version : "1.0"            };        }    });    tinymce.PluginManager.add('smpanel', tinymce.plugins.smpanel);})();