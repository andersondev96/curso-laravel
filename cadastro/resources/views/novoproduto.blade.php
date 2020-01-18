@extends('layouts.app',["current" => "produtos"])

@section('body')
   <div class="card border">
       <div class="card-body">
           <form action="/produtos" method="POST">
            @csrf
                <div class="form-group">
                    <label for="nomeProduto">Nome do produto: </label>
                    <input type="text" class="form-control" name="nomeProduto" 
                    id="nomeProduto"  placeholder="Produto"> 
                    
                    <label for="Estoque">Estoque: </label>
                    <input type="number" class="form-control" name="estoqueProduto" 
                    id="estoque"  placeholder="Estoque"> 

                    <label for="Preco">Preço do Produto: </label>
                    <input type="text" class="form-control" name="precoProduto" 
                    id="preco"  placeholder="Preço">
                    
                    <label for="categoria">Categoria</label>
                    <select class="form-control"  id="categoria" name="categoriaProduto">
                        @foreach($cats as $cat)
                            <option value="{{$cat->id}}">{{$cat->nome}}</option>
                        @endforeach
                    </select>

                </div>
                <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
                <button type="cancel" class="btn btn-danger btn-sm">Cancelar</button>

           </form>
       </div>
   </div>
@endsection