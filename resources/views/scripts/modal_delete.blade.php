<div class="modal fade" id="excluir" role="dialog" aria-labelledby="excluir" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Excluir?</h4>
            </div>
            <div class="modal-body">
                <p>Confirma?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" id="confirm">Excluir</button>
            </div>
        </div>
    </div>
</div>

<script defer type="text/javascript">
	
	$('#excluir').on('show.bs.modal', function (e)
    {	
    	let message = $(e.relatedTarget).attr('data-title');
    	let route = $(e.relatedTarget).attr('data-route')
    	
    	$(this).find('.modal-title').text(`${message}`);
        $(this).find('form').append(`<input type="hidden" name="_method" value="DELETE">`);
    	$(this).find('form').attr('action', `${route}`);
    });

</script>