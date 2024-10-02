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
                        <th>Data Inicio</th>
                        <th>Data Fim</th>
                        <th>Aprovada Por</th>
                        <th>Estudo</th>
                        <th>id</th>
                    </tr>
                </thead>
                <thead>
                    @foreach ($ferias as $fer)
                        <tr>
                            <td><img src="{{asset('img/carregadas/'.$fer->imagem)}}" style="width: 100px" alt=""></td>
                            <td>{{$fer->Data_Incio}}</td>
                            <td>{{$fer->Data_fim}}</td>
                            <td>{{$fer->Aprovado_Por}}</td>
                            <td>{{$fer->Estado}}</td>
                            <td>{{$fer->id}}</td>
                            <td>
                                @if($ferias->estado =="Pendente")
                                <a href="" class="text-success"><i class="fa fa-check"></i></a>
                                <a href="{{route('user.apagar',$fer->id)}}" class="text-danger"><i class="fa fa-circle-xmark"></i></a>

                               @endif
                                <a href="{{route('user.apagar',$fer->id)}}" class="text-danger"><i class="fa fa-trash"></i></a>
                                <a href="{{route('user.apagar',$fer->id)}}" class="text-danger"><i class="fa fa-trash"></i></a>
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
                <form action="{{route('ferias.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="funcionario_id" id="id">
                    <div class="form-grup">
                        <label for="">funcionario</label>
                        <select name="funcionario_id" id="funcionario_id" class="form-control">
                            @foreach (App\Models\Ferias::all() as $item)
                                <option value="{{$item->id}}">{{$item->nomeCompleto}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-grup">
                        <label for="">Data_Incio</label>
                        <input type="file" name="datainicio" id="datainicio" class="form-control">
                    </div>
                    <div class="form-grup">
                        <label for="">Data_fim</label>
                        <input type="text" name="datafim" id="datafim" class="form-control">
                    </div>
                   
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
        document.getElementById('data_inicio').value = valor.data_inicio
        document.getElementById('data_fim').value = valor.data_fim
        document.getElementById('aprovado_por').value =aprovado_por
        document.getElementById('estado').value = valor.estudo
        document.getElementById('id').value = valor.id



    }
    function limpar(){
        document.getElementById('data_inicio').value = ""
        document.getElementById('data_inicio').value =""
        document.getElementById('aprovado_por').value =""
        document.getElementById('estado').value =""
        document.getElementById('id').value =""



    }
</script>
@endsection 