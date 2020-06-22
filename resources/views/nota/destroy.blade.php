<div class="modal" tabindex="-1" role="dialog" id="modal-delete-{{$nota->id}}">
<form action="{{route('nota.destroy',['nota'=>$nota->id])}}" method="POST">
                @method('DELETE')
                @csrf
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Eliminar nota</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Seguro de eliminar el registro {{$nota->titulo}}?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-danger">Eliminar</button>
      </div>
    </div>
  </div>
  </form>
</div>