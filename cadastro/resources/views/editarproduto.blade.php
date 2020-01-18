@extends('layouts.app',["current" => "produtos"])

@section('body')
   <div class="card border">
       <div class="card-body">
           <form action="/produtos/{{$prods->id}}" method="POST">
            @csrf
                <div class="form-group">
                    <label for="nomeProduto">Nome do produto: </label>
                    <input type="text" class="form-control" name="nomeProduto" 
                    id="nomeProduto"  placeholder="Produto" value="{{$prods->nome}}"> 
                    
                    <label for="Estoque">Estoque: </label>
                    <input type="number" class="form-control" name="estoqueProduto" 
                    id="estoque"  placeholder="Estoque" value="{{$prods->estoque}}"> 

                    <label for="Preco">Preço do Produto: </label>
                    <input type="text" class="form-control" name="precoProduto" 
                    id="preco"  placeholder="Preço" value="{{$prods->preco}}">
                    
                    <label for="categoria">Categoria</label>
                    <select class="form-control"  id="categoria" name="categoriaProduto">
                        @foreach($cats as $cat)
                            @if ($prods->categoria_id == $cat->id)
                                <option value="{{$cat->id}}" selected="{{$prods->categoria_id}}">
                                    {{$cat->nome}}
                                </option>
                            @endif
                        @endforeach
                    </select>

                </div>
                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                <button type="cancel" class="btn btn-danger btn-sm">Cancelar</button>

           </form>
       </div>
   </div>
@endsection