(function () {
	"use strict";

	var treeviewMenu = $('.app-menu');

	// Toggle Sidebar
	$('[data-toggle="sidebar"]').click(function(event) {
		event.preventDefault();
		$('.app').toggleClass('sidenav-closed');

		var cookie = getCookie('class');
		if(cookie == 'sidenav-closed'){
            document.cookie = "class=";
		}else{
            document.cookie = "class=sidenav-closed";
		}
	});

	// Activate sidebar treeview toggle
	$("[data-toggle='treeview']").click(function(event) {
		event.preventDefault();
		if(!$(this).parent().hasClass('is-expanded')) {
			treeviewMenu.find("[data-toggle='treeview']").parent().removeClass('is-expanded');
		}
		$(this).parent().toggleClass('is-expanded');
	});

	// Set initial active toggle
	$("[data-toggle='treeview.'].is-expanded").parent().toggleClass('is-expanded');

	//Activate bootstrip tooltips
	$("[data-toggle='tooltip']").tooltip();

    function deleteCookie(name) {
        if (getCookie(name)) {
            document.cookie = name + "=" + "; expires=Thu, 01-Jan-70 00:00:01 GMT";
        }
    }

    function getCookie(name) {
        var cookies = document.cookie;
        var prefix = name + "=";
        var begin = cookies.indexOf("; " + prefix);

        if (begin == -1) {

            begin = cookies.indexOf(prefix);

            if (begin != 0) {
                return null;
            }

        } else {
            begin += 2;
        }

        var end = cookies.indexOf(";", begin);

        if (end == -1) {
            end = cookies.length;
        }

        return unescape(cookies.substring(begin + prefix.length, end));
    }

})();
