<?php

use App\Produto;
use App\Categoria;

Route::get('/categorias', function () {
    $cats = Categoria::all();
    if (count($cats) == 0) {
        echo "<h4>Você não possui nenhuma categoria cadastrada";
    } else {
        foreach($cats as $c) {
            echo "<p>" . $c->id . " - " . $c->nome . "</p>";
        }
    }
});

Route::get('/produtos', function () {
    $prods = Produto::all();
    if (count($prods) == 0) {
        echo "<h4>Você não possui nenhum produto cadastrado";
    } else {
        echo "<table>";
        echo "<thead><tr><td>Nome</td><td>Estoque</td><td>Preço</td><td>Categoria</td></tr></thead>";
        foreach($prods as $p) {
            echo "<tr>";
                echo "<td>" . $p->nome . "</td>";
                echo "<td>" . $p->estoque . "</td>";
                echo "<td>" . $p->preco . "</td>";
                echo "<td>" . $p->categoria->nome . "</td>";
            echo "</tr>";
        }
    }
});

Route::get('/categoriasprodutos', function () {
    $cats = Categoria::all();
    if (count($cats) == 0) {
        echo "<h4>Você não possui nenhuma categoria cadastrada";
    } else {
        foreach($cats as $c) {
            echo "<p>" . $c->id . " - " . $c->nome . "</p>";
            $produtos = $c->produtos;
            if (count($produtos) > 0) {
                echo "<ul>";
                foreach($produtos as $p) {
                    echo "<li>" . $p->nome . "</li>";
                }
                echo "</ul>";
            }
        }
    }
});

Route::get('/categoriasprodutos/json', function () {
    $cats = Categoria::with('produtos')->get();
    return $cats->toJson();
});

Route::get('/adicionarproduto', function () {
    $cat = Categoria::find(1);
    $p = new Produto();
    $p->nome = "Meu novo produto";
    $p->estoque = 10;
    $p->preco = 100;
    $p->categoria()->associate($cat);
    $p->save();
    return $p->toJson();
});

Route::get('/removerprodutocategoria', function () {
    $p =  Produto::find(9);
    if (isset($p)) {
        $p->categoria()->dissociate();
        $p->save();
        return $p->toJson();
    }
    return '';
});

Route::get('/adicionarproduto/{cat}', function ($catid) {
    $cat = Categoria::with('produtos')->find($catid);

    $p = new Produto();
    $p->nome = "Meu novo produto adicionado";
    $p->estoque = 40;
    $p->preco = 500;

    if (isset($cat)) {
        $cat->produtos()->save($p);
    }
    $cat->load('produtos');
    return $cat->toJson();

});
