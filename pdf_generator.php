<?php
include('Banco de Dados/connectDB.php');
require('FPDF/fpdf.php');
$mes = $_GET['mes'];
include('infos/profit_copy.php');

class PDF extends FPDF{
    function Header(){
        // $this->Image('logo.png',10,6,30);
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        $this->Cell(25);
        $this->Cell(30,10,utf8_decode('Casa Linda - Relatório de Vendas'),0,0,'C');
        $this->Ln(20);
    }

    function Footer(){
        $this->SetY(-15);   
        $this->SetFont('Arial','I',8);
        $this->Cell(0,10,utf8_decode('Página ').$this->PageNo(),0,0,'C');
    }
}

$sql_code = "SELECT * FROM VENDAS WHERE MONTH(data_venda) = $mes";
$sql_query = $mysqli->query($sql_code) OR die('Erro de Acesso de Vendas' . $mysqli->error);

$pdf = new PDF();
$pdf->SetFont('Arial','B',16);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

$pdf->Ln(15);

$pdf->SetFont('Arial','i',13);
$pdf->SetX(12);
$pdf->Cell(40, 10, utf8_decode('Código de Produto'),1,0,'C');
$pdf->Cell(35, 10, utf8_decode('Nome'),1,0,'C');
$pdf->Cell(30, 10, utf8_decode('Quantidade'),1,0,'C');
$pdf->Cell(35, 10, utf8_decode('Preço Unitário'),1,0,'C');
$pdf->Cell(45, 10, utf8_decode('Data'),1,1,'C');


$prodVendido_code = "SELECT codigo_produto,nome,sum(quantidade_vendida) from vendas group by codigo_produto order by SUM(quantidade_vendida) DESC";
$prodVendido_query = $mysqli->query($prodVendido_code) or die("Erro de Produto mais vendido<br/>");
$MaisVendido = $prodVendido_query->fetch_assoc();

if($sql_query->num_rows == 0){
    $pdf->SetX(12);    
    $pdf->Cell(185, 5.5, utf8_decode('Não há vendas cadastradas'),1,0,'C');
}else{
    $pdf->SetFont('Arial','',11);
    while($venda = $sql_query->fetch_assoc()){
        $pdf->SetX(12);
        $pdf->Cell(40, 5.8, utf8_decode("${venda['codigo_produto']}"),1,0,'C');
        $pdf->Cell(35, 5.8, utf8_decode("${venda['nome']}"),1,0,'C');
        $pdf->Cell(30, 5.8, utf8_decode("${venda['quantidade_vendida']}"),1,0,'C');
        $pdf->Cell(35, 5.8, utf8_decode("${venda['preco']}"),1,0,'C');
        $pdf->Cell(45, 5.8, utf8_decode("${venda['data_venda']}"),1,1,'C');
    }

    $pdf->SetFont('Arial','B',12);
    $pdf->SetX(12);
    $pdf->Cell(105, 6, "Valor total de Vendas", 1,0,'C');
    $pdf->Cell(80, 6, "R$ $s", 1, 1,'C');
    $pdf->SetX(12);
    $pdf->Cell(105, 6, "Valor total de Compra", 1,0,'C');
    $pdf->Cell(80, 6, "R$ $e", 1, 1,'C');
    $pdf->SetX(12);
    $pdf->Cell(105, 6, utf8_decode("Situação final da Loja"), 1,0,'C');
    $pdf->Cell(80, 6, "R$ $lucro", 1, 1,'C');
    $pdf->SetX(12);
    $pdf->Cell(105, 6, "Produto Mais Vendido", 1, 0, 'C');
    $pdf->Cell(80, 6, "${MaisVendido['nome']}", 1, 1, 'C');
}
$pdf->Output();
?>