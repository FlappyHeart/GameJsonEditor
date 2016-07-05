/**
* @Author: Alfred Liu
* @Date:   2016-07-05T09:01:13+08:00
* @Email:  liuchunyao0321@gmail.com
* @Last modified by:   Alfred Liu
* @Last modified time: 2016-07-05T10:13:36+08:00
* @License: MIT
*/


var App = function () {

	var settings = {
		reader     : new FileReader(),
		document   : $(document),
		actionBtns : $('.action-btns'),
		dwldCsvBtn : $('.save'),
	};

	function _generateJson ( button ) {
		var name = button.attr('name');
		var index = button.attr('index');
		var change = button.html();

		$.ajax({
			url: "generate_json.php",
			method: 'post',
			data: { change: change, index: index, file: name },
			dataType: 'json',
			beforeSend: function () { },
			success: function ( data ) {

			},
			complete: function () { },
			error: function () { }
		});
	}

	return {

		init: function () {
			this.bindUI();
		},

		bindUI: function () {

			settings.dwldCsvBtn.on('focusout', function ( e ) {
				e.preventDefault();
				_generateJson( $(this) );
			});
		}
	}
}
