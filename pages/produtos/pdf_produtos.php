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
$pdf->Cell(190,10,utf8_decode("RELATORIO"),0,0,"C");
$pdf->Ln(15);

$pdf->setFont("Arial","",7);
$pdf->Cell(40,7,utf8_decode("PRODUTO"),1,0,"C");
$pdf->Cell(40,7,utf8_decode("CATEGORIA"),1,0,"C");
$pdf->Cell(105,7,utf8_decode("DESCRIÇÃO"),1,0,"C");
$pdf->Cell(13,7,utf8_decode("CONSUMO"),1,0,"C");
$pdf->Ln(); 

$sql = "SELECT * FROM produto";
$declaracaoSql = $conexao->prepare($sql);
$declaracaoSql->execute();
$produtos = $declaracaoSql->fetchAll();

foreach($produtos as $prod){
    $pdf->Cell(40,7,utf8_decode($prod['NOME']),1,0);
    $pdf->Cell(40,7,utf8_decode($prod['CATEGORIA']),1,0);
    $pdf->Cell(105,7,utf8_decode($prod['DESCRIÇÃO']),1,0);
    $pdf->Cell(13,7,utf8_decode($prod['CONSUMO']),1,0,"C");
    $pdf->Ln();
}

$pdf->Output();

?>
