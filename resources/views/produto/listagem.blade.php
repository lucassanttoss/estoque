 @extends('layoult.principal')
 @section('conteudo')

 @if(old('nome'))
 <div class="alert alert-success">
     <strong>Sucesso!</strong> O produto {{ old('nome') }} foi adicionado!
 </div>
 @endif

 @if(empty($produtos))
 <div class="alert alert-info" role="alert">
     <strong>Você não tem nenhum produto cadastrado</strong>
 </div>
 @else

 <h1>Listagem de produtos</h1>
 <table class="table table-striped table-bordered table-hover">
     @foreach ($produtos as $p)
     <tr class="{{ $p->quantidade <= 1 ? 'danger' : ''}}">
         <td> {{$p->nome}} </td>
         <td> {{$p->valor}} </td>
         <td> {{$p->descricao}} </td>
         <td> {{$p->quantidade}} </td>
         <td><a href="/produtos/mostra/{{$p->id}}" class="btn btn-primary"><i class="fas fa-eye"></i></a></td>

         <td><a href="/produtos/editar/{{$p->id}}" class="btn btn-primary"><i class="fas fa-edit"></i></a></td>

         <td><button class="btn btn-danger btn-edit" value="{{$p->id}}"><i class="fas fa-trash"></i></button></td>
     </tr>
     @endforeach
 </table>
 @endif

 <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Excluir produto</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 Deseja realmente excluir este produto?
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal" id="modal-btn-y">Sim</button>
                 <button type="button" class="btn btn-primary" id="modal-btn-n">Cancelar</button>
             </div>
         </div>
     </div>
 </div>

 <div class="alert" role="alert" id="result"></div>

 @if(old('nome'))
    <div class="alert alert-success">
        <strong>Sucesso!</strong> O produto {{ old('nome') }} foi adicionado!
    </div>
 @endif
 @stop
