<div id="put-{{$produto->quantity}}" class="modal">
    <div class="modal-content">
      <h4><i class="material-icons">refresh</i> Atualizar produto</h4>
      
        <div class="row">
            <p>Tem certeza que deseja Atualizar {{$produto->nome}} ?</p>

            
            <form action="{{route('admin.putprodutos', $produto->id)}}" method="POST">
              @method('PUT')
              @csrf
              <input type="number" name="quantity" value="{{$produto->quantity}}" min="1" style="width: 40px; font-weight:900;">

              
              
              <button type="submit" class=" waves-effect waves-green btn red right">Salvar</button><br>
              
            </form>
          </div>
    </div>
    
  </div>