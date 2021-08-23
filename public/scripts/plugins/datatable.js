(function ($) {
	"use strict";

	var colors = ['red', 'pink', 'purple', 'deep-purple', 'indigo', 'blue', 'light-blue', 'cyan', 'teal', 'green', 'light-green', 'lime', 'yellow', 'amber', 'orange', 'deep-orange', 'brown', 'blue-grey', 'grey'];

	var init = async function(){

		$('#user_table').dataTable();
		$('#physician-table').dataTable();
	}

	$.fn.dataTable.init = init;

})(jQuery);
