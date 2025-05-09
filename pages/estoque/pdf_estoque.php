<?php
session_start();
if(!$_SESSION['admin']){
  header('location:../admin/login.html');
}
require "../FPDF/fpdf.php";
require "../config.php";

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B','16');
$pdf->Cell(190,10,utf8_decode("RELATORIO DE ESTOQUE"),0,0,"C");
$pdf->Ln(15);

$pdf->setFont("Arial","",7);
$pdf->Cell(40,7,utf8_decode("Produto"),1,0,"C");
$pdf->Cell(40,7,utf8_decode("Categoria"),1,0,"C");
$pdf->Cell(80,7,utf8_decode("Descrição"),1,0,"C");
$pdf->Cell(13,7,utf8_decode("Consumo"),1,0,"C");
$pdf->Cell(13,7,utf8_decode("Q"),1,0,"C");
$pdf->Ln(); 

$sql = "SELECT * FROM estoque";
$declaracaoSql = $conexao->prepare($sql);
$declaracaoSql->execute();
$produtos = $declaracaoSql->fetchAll();

foreach($produtos as $prod){
    $pdf->Cell(40,7,utf8_decode($prod['PRODUTO']),1,0);
    $pdf->Cell(40,7,utf8_decode($prod['CATEGORIA']),1,0);
    $pdf->Cell(80,7,utf8_decode($prod['DESCRIÇÃO']),1,0);
    $pdf->Cell(13,7,utf8_decode($prod['USO']),1,0,"C");
    $pdf->Cell(13,7,utf8_decode($prod['QUANTIDADE']),1,0,"C");
    $pdf->Ln();
}

$pdf->Output();

?>
