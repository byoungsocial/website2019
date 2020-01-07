(function() {
   tinymce.create('tinymce.plugins.arPinterestApi', {
      init : function(ed, url) {
         ed.addButton('arPinterestApi', {
            title : 'PinWorks+',
            image : url+'/pinmcebtn.jpg',
            onclick : function() {
				

			   ed.windowManager.open(
					//	Window Properties
					{
						file:  url + '/codegenerator/codegenerator.html',
						
						width: document.documentElement.clientWidth*9.5/10,
						height: document.documentElement.clientHeight-44,
						inline: 1
					},
					//	Windows Parameters/Arguments
					{
						editor: ed,
						/* jquery: $ // PASS JQUERY */
					}
				);
			   
			   
			   
			   
			   
			   
			   
			   
            }
         });
      },
      createControl : function(n, cm) {
         return null;
      },
      getInfo : function() {
         return {
            longname : "PinWorks+ Wordpress Pinterest Gallery Widget",
            author : 'Artorius',
            authorurl : 'http://codecanyon.net/user/artorius',
            infourl : 'http://codecanyon.net/user/artorius',
            version : "1.0"
         };
      }
   });
   tinymce.PluginManager.add('arPinterestApi', tinymce.plugins.arPinterestApi);
})(jQuery);