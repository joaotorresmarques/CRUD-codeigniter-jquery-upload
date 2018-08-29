$(document).ready(function(){
    //BALÃO 
    $('[data-balao="tooltip"]').tooltip();   

    //EDIÇÃO CATEGORIA
    $('#editarCategorias').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var cat_nome = button.data('nome') // Extract info from data-* attributes
        var cat_id = button.data('id')

        var modal = $(this)
        modal.find('#cat_nome').val(cat_nome)
        modal.find('#cat_id').val(cat_id)
    })

    //MODAL EXCLUIR CATEGORIAS
    $('#excluirCategorias').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var inpt_idCat = button.data('id') // Extract info from data-* attributes

        var modal = $(this)
        modal.find('#inpt_idCat').val(inpt_idCat)
    })
    //MODAL EXCLUIR VIDEOS
    $('#excluirVideos').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var idvideos = button.data('idvideos') // Extract info from data-* attributes

        var modal = $(this)
        modal.find('#idvideos').val(idvideos)
    })

    //MODAL VISUALIZAR VIDEO
    $('#visualizarVideo').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var vid_video = button.data('video') // Extract info from data-* attributes

        var vid_html = '<video width="100%" height="400" controls="controls" style="padding: 0 10px 0 10px">'
        +'<source src="../upload/'+vid_video+'" type="video/mp4"></source>'
        +'</video>';
        $("#vid_video").html(vid_html)
    })
    
     //EDIÇÃO USUARIOS
    $('#modal_editar').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var usu_id = button.data('id') // Extract info from data-* attributes
        var usu_nome = button.data('nome')
        var usu_email = button.data('email')

        var modal = $(this)
        modal.find('#usu_id').val(usu_id)
        modal.find('#usu_nome').val(usu_nome)
        modal.find('#usu_email').val(usu_email)
    })

    //MODAL EXCLUIR USUARIOS
    $('#modal_excluir').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var idusuario = button.data('id') // Extract info from data-* attributes

        var modal = $(this)
        modal.find('#idusuario').val(idusuario)
    })




});
