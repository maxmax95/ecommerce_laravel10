<!-- Modal Structure -->
   <div id="create" class="modal">
    <div class="modal-content">
      <h4><i class="material-icons">playlist_add_circle</i> Novo produto</h4>
      <form action="{{route('admin/product/store')}}" method="POST" enctype="multipart/form-data" clas="col s12">
        @csrf

        <input type="hidden" name="id_user" value="{{ auth()->user()->id}}">
        <div class="row">
          <div class="input-field col s6">
            <input name="name" id="nam" type="text" class="validate">
            <label for="nam">Name</label>
          </div>
          <div class="input-field col s6">
            <input name="price" id="price" type="number" class="validate">
            <label for="price">Price</label>
          </div>
          <div class="input-field col s12">
            <input name="description" id="description" type="text" class="validate">
            <label for="description">Description</label>
          </div>

          <div class="input-field col s12">
            <select name="id_category">
              <option value="" disabled selected>Choose your option</option>
              @foreach($categories as $category)
              <option value="{{$category->id}}">{{ $category->categoryName}}}</option>
              @endforeach
        

            </select>
            <label>Categories</label>
          </div>          
          <div class="file-field input-field col S12">
            <div class="btn">
              <span>Image</span>
              <input name="image" type="file">
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text">
            </div>
          </div>
        </div> 
       
        <a href="#!" class="modal-close waves-effect waves-green btn blue right">Cancel</a><br>
        <button type="submit" href="#!" class=" waves-effect waves-green btn green right">Cadastrar</button><br>
    </div>
    
  </form>
  </div>
  
    
   