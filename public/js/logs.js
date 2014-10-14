$(function()
{
	$(".table").footable
	({
		breakpoints:
		{
			phone : 480,
			tablet: 700

		},

		delay       : 100,
		addRowToggle: true,

		firstText   : "Primeiro",
		nextText    : "&raquo;",
		previousText: "&laquo;",
		lastText    : "Último"

	});

	$("select[name='situacao']").change(function()
	{
		if($(this).val() != 3)
		{
			$("input[name='usuario']").val("").prop("disabled", true);

		}
		else
			$("input[name='usuario']").prop("disabled", false);

	});

	$("button[type='submit']").click(function()
	{
		$(this).button("loading");

	});

});