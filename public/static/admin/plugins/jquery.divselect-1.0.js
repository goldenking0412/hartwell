/**
 * jquery.divSelect.js
 * @version 1.0
 * @author Fuzz Productions
 * @license GPLv2
 *
 * Transforms a DOM <select> tag into a themeable set of divs using semantic markup.
 */

(function($){

	$.fn.divSelect = function() {
		return this.filter(function() { return this.divSelectInit !== true }).each(function() {
			this.divSelectInit = true;
			var $this = $(this).hide();

			var firstOption = $this.find('option:selected').text();
			var container   = $('<div class="select-container" />').addClass($this.attr('class'));
			var selected    = $('<div class="selected"><p><span class="content">' + firstOption + '</span><span class="arrow"></span></p></div>');
			var selOptions  = $('<ul class="select-options" />').hide();

			$this
				.wrap(container)
				.after(selOptions)
				.after(selected)
				.on('manualChange', function() {
					var value = $this.val();
					if (value) {
						selOptions.find('li.option[data-val=' + value + ']').trigger('click');
					}
				});

			$this.find('option').each(function() {
				var inside = $(this).text();
				if ($(this).attr("data-details")) {
					inside += ' <span class="details">' + $(this).data('details') + '</span>';
				}
				var classes = $(this).is(':selected') ? 'option active' : 'option';
				selOptions.append('<li class="' + classes + '" data-href="' + $(this).data('href') + '" data-text="' + $(this).text() + '" data-val="' + $(this).val() + '">' + inside + '</li>');
			});

			$this.data({
				selected: selected,
				selOptions: selOptions
			});

			selected.click(function () {

				if (selOptions.is(':visible')) {
					selOptions.hide();
				} else {
					$('.select-options').not(selOptions).hide();
					selOptions.show();
				}
			});

			selOptions.find('li.option').click( function() {
				var innerHTML = $(this).data('text');
				$this.val($(this).data('val')).trigger('change');
				$(this).siblings('li').removeClass('active');
				$(this).addClass('active');
				selected.find('span.content').empty().append(innerHTML);
				selOptions.hide();
			});
		});
	};

	$(document).click(function(e) {
		if ($(e.target).is('.select-container, .select-container *')) {
			return;
		}
		$('.select-options:visible').siblings('div').click();
	});
})(jQuery);
