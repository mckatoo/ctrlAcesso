// $('#fileUpload').on('click',function () {
// 	$('.loading').removeClass('hidden');
// });

$('#btnUpload').on('click',function () {
	$('.loading').removeClass('hidden');
	$('#frmUpload').submit();
	
});

$( function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true,
      dateFormat: "dd/mm/yy",
    });
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