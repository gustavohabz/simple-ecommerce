<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Produto;
use Illuminate\Support\Facades\DB;

class ProdutoController extends Controller
{
    //
    public function getProdutos(){
        $produtos = DB::table('produtos as p')
            ->select('p.id', 'p.titulo', 'p.preco', 'p.quantidade_em_estoque as quantidadeEmEstoque', 'p.rotulo_unico as rotuloUnico', 'p.tipo_produto_id as tipoProdutoId')
            ->where('p.quantidade_em_estoque', '>', 0)
            ->get();
        $retorno = [];
        foreach ($produtos as $key => $produto){
            array_push($retorno, [
                'produto'=>$produto,
                'imagens'=>$this->getImagensProduto($produto->id)
            ]);
        };
        return $retorno;
    }

    private function getAvaliacoesProduto($produtoId){
        return DB::table('avaliacoes as av')
            ->select('us.nome_completo as nome', 'av.id', 'av.comentario', 'av.avaliacao', 'av.data_avaliacao as dataAvaliacao', 'av.produto_id as produtoId', 'av.usuario_id as usuarioId')
            ->join('usuarios as us', 'us.id', '=', 'av.usuario_id')
            ->where('av.produto_id', '=', $produtoId)
            ->get();
    }

    private function getImagensProduto($produtoId){
        return DB::table('imagem_produtos as ip')
            ->select('ip.id', 'ip.label', 'ip.url', 'ip.produto_id as produtoId')
            ->where('ip.produto_id', '=', $produtoId)
            ->get();
    }

    private function getDetalhesProduto($produtoId){
        return DB::table('detalhe_produtos as dp')
            ->select('dp.id', 'dp.label', 'dp.titulo', 'dp.produto_id as produtoId')
            ->where('dp.produto_id', '=', $produtoId)
            ->get();
    }

    public function getProdutoDetalhe($rotuloUnico){
        $produto = DB::table('produtos as p')
            ->select('p.id', 'p.rotulo_unico as rotuloUnico', 'p.titulo', 'p.preco', 'p.descricao', 'p.quantidade_em_estoque as quantidadeEmEstoque', 'tp.label')
            ->join('tipo_produtos as tp', 'tp.id', '=', 'p.tipo_produto_id')
            ->where('p.rotulo_unico', '=', $rotuloUnico)
            ->first();

        $produtoId = $produto->id;

        $avaliacoes = $this->getAvaliacoesProduto($produtoId);
        
        $somatoriaAvaliacoes = 0;
        $mediaAvaliacoes = 0;
        
        foreach ($avaliacoes as $key => $avaliacao) {
            $somatoriaAvaliacoes += $avaliacao->avaliacao;
        };

        $numAvaliacoes = sizeof($avaliacoes);
        $mediaAvaliacoes = ($numAvaliacoes > 0) ? $somatoriaAvaliacoes / $numAvaliacoes : 0;
        

        $objetoFinal = [
            'produto'=>$produto,
            'numAvaliacoes'=>$numAvaliacoes,
            'mediaAvaliacoes'=>round($mediaAvaliacoes),
            'avaliacoes'=>$avaliacoes,
            'imagens'=>$this->getImagensProduto($produtoId),
            'detalhes'=>$this->getDetalhesProduto($produtoId),
        ];
        return $objetoFinal;
    }

    public function addProduto(Request $request){
        return Produto::create($request->all());
    }
}
