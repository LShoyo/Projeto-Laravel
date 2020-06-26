<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Card;

class CardsController extends Controller
{
    public function index() {

        $cards = Card::all();
        /* Card::all() = faz igual o select * from cards */
        //select * from cards;

        if($cards){
            return response()->json($cards, 200);
            /* resposta no formato de um jason com o conteúdo($cards), segundo param
            é o status 200 = OK(td certo) */
        }
   }

   public function create(Request $request){
       /*$request->validate([
           'title':'required|mix:5',
           'content': 'required|max:150'
       ]);  
       caso para validar pode ser usado
       */

       //instanciando objeto card
       $card = new Card;
       // atribuindo valores recebidos no corpo da requisição as respectivas colunas
       $card->title = $request->title;
       $card->content = $request->content;

       //efetuando o insert do registro na base de dados
       $card -> save();

       //verificando se obteve registros para listar
       if($card){
           // retornando resposta JSON com card criado
            return response()->json($card, 201);
       } 
   }

    public function edit(Request $request, $id){
    // encontrando registro pelo id atraves do metodo find
        $card = Card::find($id);
       //procurar um ID especifico dentro de CARD
       // find faz = select * from cards where id = :id 
       // execute (['id'=>$id])

       // atribuindo valores recebidos no corpo da requisição as respectivas colunas
        $card->title = $request->title;
        $card->content = $request->content;


       $card ->update();

       //verificando se obteve registros para listar
       if($card){
        // retornando resposta JSON com card criado
         return response()->json($card, 201);
    } 
   }

    public function delete($id){
    // encontrando registro pelo id atraves do metodo find
        $card = Card::find($id);

        // efetuando sof delete para nao excluri registro efetivamente
        // e sim popular a coluna deleted_at com a data atual passando
        // apenas a impressao para o usuario que aquele registro deixou de existir
        // mas ainda esta em nossa base de dados
        if($card->delete()){
            return response()->json('Registro excluído com sucesso', 200);
        }
    }
}
