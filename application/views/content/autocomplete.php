	<style>
	.ui-autocomplete-category {
		font-weight: bold;
		padding: .2em .4em;
		margin: .8em 0 .2em;
		line-height: 1.5;
	}
	</style>
	<script>
        jQuery().noConflict();
	jQuery.widget( "custom.catcomplete", jQuery.ui.autocomplete, {
		_renderMenu: function( ul, items ) {
			var self = this,
				currentCategory = "";
			jQuery.each( items, function( index, item ) {
				if ( item.category != currentCategory ) {
					ul.append( "<li class='ui-autocomplete-category'>" + item.category + "</li>" );
					currentCategory = item.category;
				}
				self._renderItem( ul, item );
			});
		}
	});
	</script>
	<script>
        jQuery().noConflict();
	jQuery(function() {
		var data = [
			{ label: "anders", category: "" },
			{ label: "andreas", category: "" },
			{ label: "antal", category: "" },
			{ label: "annhhx10", category: "Products" },
			{ label: "annk K12", category: "Products" },
			{ label: "annttop C13", category: "Products" },
			{ label: "anders andersson", category: "People" },
			{ label: "andreas andersson", category: "People" },
			{ label: "andreas johnson", category: "People" }
		];

		jQuery( "#search" ).catcomplete({
			delay: 0,
			source: data
		});
                jQuery("#search").click(function(){
                   alert("ini");
                });
	});
	</script>



<div class="demo">
	<label for="search">Search: </label>
	<input id="search" />
</div><!-- End demo -->