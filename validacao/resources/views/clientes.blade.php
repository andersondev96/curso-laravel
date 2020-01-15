<html>
    <head>
        <title>Cadastro de Cliente</title>
        <link href="{{asset('css/app.css')}}" rel="stylesheet">
        <meta name="csrf-token" content="{{csrf_token()}}">
        <style>
            body {
                padding: 20px;
            }
        </style>
    </head>
    <body>
        <main role="main">
            <div class="row">
                <div class="container col-sm-8 offset-nd-2">
                    <div class="card border">
                        <div class="card-header">
                            <div class="card-title">
                                <h4>Cadastro de Clientes</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-border table-hover" id="tabelaprodutos">
                                <thead>
                                    <tr>
                                        <th>Codigo</th>
                                        <th>Nome</th>
                                        <th>Endereço</th>
                                        <th>Idade</th>
                                        <th>E-mail</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clientes as $c)
                                        <tr>
                                            <td>{{$c->id}}</td>
                                            <td>{{$c->nome}}</td>
                                            <td>{{$c->endereco}}</td>
                                            <td>{{$c->idade}}</td>
                                            <td>{{$c->email}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        <a href="{{'novocliente'}}"> <button class="btn btn-primary btn-sm">Cadastrar Cliente</button></a>
                        </div>
                    </div>
                </div>
                
            </div>
           

        </main>
        <script src="{{ asset('js/app.js')}}" type="text/javascript"></script>
    </body>
</html>