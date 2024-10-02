@extends('base.base')
@section('gestao')

<div class="card">
    <div class="card-header">  
        <h4>lista de usuario</h4>
        <a href="#Cadastro" data-bs-toggle="modal" onclick="limpar()"><i class="fa fa-circle-plus"></i></a>
    </div>      
        <div class="card-body"> 
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>E-email</th>
                        <th>Tipo</th>
                        <th></th>
                    </tr>
                </thead>
                <thead>
                    @foreach ($users as $use)
                        <tr>
                            <td>{{$use->id}}</td>
                            <td>{{$use->name}}</td>
                            <td>{{$use->email}}</td>
                            <td>{{$use->tipo}}</td>
                            <td>
                                <a href="#Cadastro" data-bs-toggle="modal" onclick="editar({{$use}})"><i class="fa fa-edit"></i></a>
                                <a href="{{route('user.apagar',$use->id)}}" class="text-danger"><i class="fa fa-trash"></i></a>
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
                <form action="{{route('user.store')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <div class="form-grup">
                        <label for="">nome</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-grup">
                        <label for="">Email</label>
                        <input type="email" name="email" id="email" class="form-control">
                     </div>
                    <div class="form-grup">
                        <label for="">tipo</label>
                        <select name="tipo" id="tipo" class="form-control">
                            <option value="Admin">Admin</option>
                            <option value="Funcionario">Funcionario</option>
                        </select>
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