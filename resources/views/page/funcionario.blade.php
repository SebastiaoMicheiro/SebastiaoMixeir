@extends('base.base')
@section('gestao')
@if(Session:: has('Sucesso'));
<div class="alert alert-success"></div>
<p>{{Session:: get('sucesso')}}</p>
@endif
<div class="card">
    <div class="card-header">  
        <h4>lista de usuario</h4>
        <a href="#Cadastro" data-bs-toggle="modal" onclick="limpar()"><i class="fa fa-circle-plus"></i></a>
    </div>      
        <div class="card-body"> 
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Imagem</th>
                        <th>Nº Agente</th>
                        <th>Nome completo</th>
                        <th>cargo</th>
                        <th>Categoria</th>
                    </tr>
                </thead>
                <thead>
                    @foreach ($funcionario as $func)
                        <tr>
                            <td><img src="{{asset('img/carregadas/'.$func->imagem)}}" style="width: 100px" alt=""></td>
                            <td>{{$func->nAgente}}</td>
                            <td>{{$func->nomeCompleto}}</td>
                            <td>{{$func->cargo}}</td>
                            <td>{{$func->categoria}}</td>
                            <td>
                                <a href="#Cadastro" data-bs-toggle="modal" onclick="editar({{$func}})"><i class="fa fa-edit"></i></a>
                                <a href="{{route('user.apagar',$func->id)}}" class="text-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </thead>
            </table>                 
                
            
        </div>
</div>

<!-- Button trigger modal -->

<!-- Modal -->
<div
    class="modal fade"
    id="Cadastro"
    tabindex="-1"
    role="dialog"
    aria-labelledby="modalTitleId"
    aria-hidden="true"
>
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Modal title
                </h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                <form action="{{route('funcionario.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <div class="form-grup">
                        <label for="">imagem</label>
                        <input type="file" name="imagem" id="imagem" class="form-control">
                    </div>
                    <div class="form-grup">
                        <label for="">nome completo</label>
                        <input type="text" name="nomeCompleto" id="nomeCompleto" class="form-control">
                    </div>
                    <div class="form-grup">
                        <label for="">numero de agente</label>
                        <input type="text" name="nAgente" id="nAgente" class="form-control">
                    </div>
                    <div class="form-grup">
                        <label for="">cargo</label>
                        <input type="text" name="cargo" id="cargo" class="form-control">
                    </div>
                    <div class="form-grup">
                        <label for="">categoria</label>
                        <input type="text" name="categoria" id="categoria" class="form-control">
                    </div>
                    <div class="form-grup">
                        <label for="">Email</label>
                        <input type="email" name="email" id="email" class="form-control">
                     </div>
                    
            </div>
            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-secondary"
                    data-bs-dismiss="modal"
                >
                    Close
                </button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
        </div>
    </div>
</div>

<script>
    var modalId = document.getElementById('modalId');

    modalId.addEventListener('show.bs.modal', function (event) {
          // Button that triggered the modal
          let button = event.relatedTarget;
          // Extract info from data-bs-* attributes
          let recipient = button.getAttribute('data-bs-whatever');

        // Use above variables to manipulate the DOM
    });
</script>
<script>
    function editar(valor){
        document.getElementById('id').value = valor.id
        document.getElementById('name').value = valor.name
        document.getElementById('tipo').value = valor.tipo
        document.getElementById('email').value = valor.email



    }
    function limpar(){
        document.getElementById('id').value = ""
        document.getElementById('name').value =""
        document.getElementById('tipo').value =""
        document.getElementById('email').value =""



    }
</script>
@endsection 