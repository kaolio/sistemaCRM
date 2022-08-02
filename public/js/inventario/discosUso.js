document.oncontextmenu = function(){return false}

$(document).ready(function(){
    $("#busquedaRapida").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#tablaNotas tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});