<?php 
class PDFKU extends TCPDF {

    //Page header
    public function Header() {
        // menentukan logo berdasrkan lokasi logo
        $image_file = K_PATH_IMAGES.'../tcpdf_logo.jpg';
		// membuat sebuah gambar dengan file gambar dari $image_file, koortdinat x=10, y=10, ukuran Width gambar 15, align T(top), dpi = 300
        $this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // membuat tulisan dengan font helvetica, tebal, ukuran 10
        $this->SetFont('helvetica', 'B', 10);
        // menentukan judul yang akan tampil. width=0, height=15, text=<< TCPDF CODEDB.CO >>, align=C(center)
        $this->Cell(0, 15, '<< TCPDF CODEDB.CO >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

    // Page footer
    public function Footer() {
        // Membuat posisi footer pada 15 mm dari bawah
        $this->SetY(-15);
        // menentukan tulisan miring dan ukuran font 8
        $this->SetFont('helvetica', 'I', 8);
        // menampilkan nomor halaman
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}

// membuat format dokumen pdf baru berdasrkan konfigurasi file di folder tcpdf/config/tcpdf_config.php
$pdf = new PDFKU("P", "mm", "A4", true, 'UTF-8', false);

// set margins
$pdf->SetMargins(10, 25, 10); // kiri, atas, kanan
$pdf->SetHeaderMargin(5); // mengatur jarak antara header dan top margin
$pdf->SetFooterMargin(10); //  mengatur jarak minimum antara footer dan bottom margin
 
?>