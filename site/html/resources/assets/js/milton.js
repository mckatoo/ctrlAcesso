// $('#fileUpload').on('click',function () {
// 	$('.loading').removeClass('hidden');
// });

$('.logout').on('click', function () {
    alert('asldfjsdf');
    $('#logout').submit();
});

$('#btnUpload').on('click',function () {
	$('.loading').removeClass('hidden');
	$('#frmUpload').submit();
	
});

$( function() {
    $( ".datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: "dd/mm/yy",
      language: "pt-BR",
    });

    var url_atual = window.location.pathname;
    if (url_atual == '/') {
    	$('#menuPrincipal').addClass('active');
    } else if (url_atual = '/secretaria') {
    	$('#menuSecretaria').addClass('active');
    } else if (url_atual = '/controle') {
    	$('#menuControle').addClass('active');
    } else if (url_atual = '/relatorios') {
    	$('#menuRelatorios').addClass('active');
    }


    $(window).bind("load resize", function() {
        var topOffset = 50;
        var width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.navbar-collapse').addClass('collapse');
            topOffset = 100; // 2-row-menu
        } else {
            $('div.navbar-collapse').removeClass('collapse');
        }

        var height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $("#page-wrapper").css("min-height", (height) + "px");
        }
    });

    var url = window.location;
    var element = $('ul.nav a').filter(function() {
        return this.href == url;
    }).addClass('active').parent();

    while (true) {
        if (element.is('li')) {
            element = element.parent().addClass('in').parent();
        } else {
            break;
        }
    }
});