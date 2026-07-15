<!-- Modal Structure -->
   <div id="modal1" class="modal">
    <div class="modal-content">
      <h4><i class="material-icons">card_giftcard</i> Novo produto</h4>

      <form name="form_cadastrarProdutos"action ="{{route('admin.create')}}" method="POST" enctype="multipart/form-data" class="col s12">

        <div class="row">
          <div class="input-field col s6">

            <input name="nome"placeholder="Placeholder" id="nome" type="text" class="validate">
            <label for="nome">Nome </label>
          </div>

          <div class="input-field col s6">
            <input id="preco" type="number" class="validate">
            <label for="preco">Preço</label>
          </div>

          <div class="input-field col s12">
            <input id="descricao  " type="text" class="validate">
            <label for="descricao">Descrição</label>
          </div>

          <div class="input-field col s12">

            <select name="categoria">
              <option value="" disabled selected>Escolha uma opção:</option>
              @foreach ($produtos as $produto)
                  
              <option value="{{$produto->categoria->id}}"> {{$produto->categoria->nome}} </option>
              
              @endforeach
            </select>

            <label>Categoria</label>
          </div>  
          
          
            <div class="file-field input-field col s12">
            <div class="btn">
              <span>Imagem</span>
              <input name="imagem" type="file">
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text">
          </div>
        </div>      

        </div>
        <a href="#!" class="modal-close waves-effect waves-green btn blue right">Cancelar</a><br>
        <button type="submit" onclick="document.forms['form_cadastrarProdutos'].submit()"class="modal-close waves-effect waves-green btn green right">Cadastrar</button><br>
    </div>
    
  </form>
  </div>