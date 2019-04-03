<?php namespace estoque\Http\Controllers;
//use Request;
use Illuminate\Support\Facades\DB;
use estoque\Http\Requests\ProdutosRequest;
use estoque\Produto;
use Request;
use estoque\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

class ProdutoController extends Controller {

    public function __construct(){
        $this->middleware('auth', ['only' => ['adiciona', 'editar', 'altera', 'novo']]);
    }

    public function lista(){

        $produtos = Produto::all();
        return view('produto.listagem')->with('produtos', $produtos);
    }

    public function mostra($id){

        $produto = Produto::find($id);
        if(empty($produto)) {
            return "Esse produto não existe";
        }
        return view('produto.detalhes')->with('p',$produto);
    }

    public function novo(){
        return view('produto.formulario');
    }

    public function adiciona(ProdutosRequest $request){

        $params = Request::all();
        $produto = new Produto($params);
        $produto->save();

        return redirect()
            ->action('ProdutoController@lista')
            ->WithInput(Request::only('nome'));
    }

    public function altera(ProdutosRequest $request, $id){
        $params = Request::all();
        $produto = Produto::find($id);
        $produto->update($params);

        return redirect()->action('ProdutoController@lista')->withInput(Request::only('id'));
    
    }

    public function listaJson(){
        $produtos = Produto::all();
        return response()->json($produtos);
    }

    public function remove($id){
        $produto = Produto::find($id);
        $produto->delete();
        return redirect()->action('ProdutoController@lista');
    }

    public function editar($id){
        $produto = Produto::find($id);
        if(empty($produto)){
            return "Prduto inexistente! :(";
        }
        return view('produto.editar')->with('p',$produto);
    }  
}
