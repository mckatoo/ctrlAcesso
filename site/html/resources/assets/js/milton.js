// $('#fileUpload').on('click',function () {
// 	$('.loading').removeClass('hidden');
// });

$('#btnUpload').on('click',function () {
	$('.loading').removeClass('hidden');
	$('#frmUpload').submit();
	
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