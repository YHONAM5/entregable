$('.nav-bar a').click(function(e) {
    e.preventDefault();
    const url = $(this).attr('href');
    $('#loader').show();
    $.get(url, function(data) {
        $('.dynamic-view-container').html(data);
    }).always(() => {
        $('#loader').hide();
    });
});
function cargarVista(entidad, accion, id = null) {
    let url = `index.php?entidad=${entidad}&accion=${accion}`;
    if (id) url += `&id=${id}`;
    
    $.get(url, function (data) {
        $('#contenido').html(data);
    }).fail(function () {
        $('#contenido').html('<p>Error al cargar la vista.</p>');
    });
}
