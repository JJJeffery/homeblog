(function() {
	tinymce.create('tinymce.plugins.Addshortcodes', {
		init : function(ed, url) {
		
			//Add Unik shortcodes button
			ed.addButton('Unik', {
				title : 'Add Unik shortcodes',
				cmd : 'alc_unik',
				image : url + '/images/unik.png'
			});
			ed.addCommand('alc_unik', function() {
				ed.windowManager.open({file : url + '/ui.php?page=unik',  width : 600 ,	height : 480 ,	inline : 1});
			});	
		},
		getInfo : function() {
			return {
				longname : "Weblusive Shortcodes",
				author : 'Weblusive',
				authorurl : 'http://www.weblusive.com/',
				infourl : 'http://www.weblusive.com/',
				version : "1.0"
			};
		}
	});
	tinymce.PluginManager.add('UnikShortcodes', tinymce.plugins.Addshortcodes);	
	
})();

