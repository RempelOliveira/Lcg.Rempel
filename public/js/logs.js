$(function()
{
	$(".table").footable
	({
		breakpoints:
		{
			phone : 600,
			tablet: 800

		},

		delay       : 100,
		addRowToggle: true,

		firstText   : $("#script").data("footable-first"),
		nextText    : "&raquo;",
		previousText: "&laquo;",
		lastText    : $("#script").data("footable-last")

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

	$(document).submit("form", function()
	{
		$(this).find("button[type='submit']").button("loading");

	});

});