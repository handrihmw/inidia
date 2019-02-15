<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('Pdf');
        $this->load->model(array('Md_karyawan','Md_resign','Md_permohonan','Md_mpp','Md_percobaan',
            'Md_departemen','Md_penilaian','Md_training'));
        $this->load->helper(array('tanggal','tgl_indo'));
    }

    // =========================================== PRINT KARYAWAN START =========================================== //

    public function print_karyawan(){

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        // document informasi
        $pdf->SetCreator('PT. Astrindo Senayasa');
        $pdf->SetTitle('Laporan Data Karyawan');
        $pdf->SetSubject('Data Karyawan');
        //header Data
        $pdf->SetHeaderData('logo.jpg',30,'PT. Astrindo Senayasa','Mangga Dua Square Blok G 24, Jalan Gunung Sahari Raya, Pademangan, RT.12/RW.6, Jakarta Utara, Daerah Khusus Ibukota Jakarta.',array(0, 0, 0),array(0, 0, 0));
        $pdf->SetFooterData(array(255, 255, 255), array(255, 255, 255));
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        //set margin
        $pdf->SetMargins(PDF_MARGIN_LEFT,PDF_MARGIN_TOP - 6,PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $pdf->SetAutoPageBreak(FALSE, PDF_MARGIN_BOTTOM - 5);
        //SET Scaling ImagickPixel
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        //FONT Subsetting
        $pdf->setFontSubsetting(true);
        $pdf->SetFont('helvetica','',6,'',true);
        // $pdf->AddPage('P');
        $pdf->AddPage('L');
        $i=0;
        $html='<h3>Data Karyawan</h3>
            <table border="0.5" bgcolor="#666666" cellpadding="2" width: 100%>
                <tr align="center" bgcolor="#ffffff">
                    <th width="3%">No</th>
                    <th  align="center">Nama Lengkap</th>
                    <th align="center">NIK</th>
                    <th  align="center">Jabatan</th>
                    <th align="center">Pangkat</th>
                    <th  align="center">Divisi</th>
                    <th  align="center">Departemen</th>
                    <th align="center">Unit</th>
                    <th  align="center">Nama Panggilan</th>
                    <th  align="center">Identitas</th>
                    <th align="center">JK</th>
                    <th  align="center">Tempat Lahir</th>
                    <th  align="center">Tanggal Lahir</th>
                    <th  align="center">Negara</th>
                    <th  align="center">Agama</th>
                    <th  align="center">NPWP</th>
                    <th  align="center">Alamat</th>
                    <th  align="center">Telp. Rumah</th>
                    <th  align="center">No. Handphone</th>
                    <th  align="center">Tgl. Masuk</th>
                    <th  align="center">Status Kerja</th>
                    <th  align="center">Status Nikah</th>
                    <th  align="center">Email</th>
                </tr>';
                $karyawanku = $this->Md_karyawan->print();
                foreach ($karyawanku as $row) 
                {
                    $i++;
                    $html.='<tr bgcolor="#ffffff">
                                <td align="center">'.$i.'</td>
                                <td>'.$row['nama_kry'].'</td>
                                <td align="center">'.$row['nik_kry'].'</td>
                                <td>'.$row['jabatan_kry'].'</td>
                                <td>'.$row['pangkat_kry'].'</td>
                                <td>'.$row['divisi_kry'].'</td>
                                <td>'.$row['dep_kry'].'</td>
                                <td>'.$row['lokasi_kry'].'</td>
                                <td>'.$row['panggilan_kry'].'</td>
                                <td>'.$row['identitas_kry'].'</td>
                                <td align="center">'.$row['jk_kry'].'</td>
                                <td>'.$row['tempat_lahir_kry'].'</td>
                                <td align="center">'.$row['tgl_lahir_kry'].'</td>
                                <td>'.$row['negara_kry'].'</td>
                                <td>'.$row['agama_kry'].'</td>
                                <td align="center">'.$row['npwp_kry'].'</td>
                                <td>'.$row['alamat_kry'].'</td>
                                <td align="center">'.$row['tlp_rumah_kry'].'</td>
                                <td align="center">'.$row['no_hp_kry'].'</td>
                                <td align="center">'.$row['tgl_masuk_kry'].'</td>
                                <td>'.$row['status_kerja_kry'].'</td>
                                <td>'.$row['status_nikah_kry'].'</td>
                                <td>'.$row['email_kry'].'</td>
                            </tr>';
                }

                $html.='<p>AST-CRM-HRG-024 Rev. 02 10-03-2017 | '.date("d-m-Y", time()) .'</p>';
                $html.='</table>';
                $pdf->writeHTML($html, true, false, true, false, '');
                ob_end_clean();
                $pdf->Output('laporan_karyawan'.date("d-m-Y", time()) .'.pdf', 'I');
    }

    public function print_karyawan_id($id_kry){
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        // document informasi
        $pdf->SetCreator('PT. Astrindo Senayasa');
        $pdf->SetTitle('Laporan Data Karyawan');
        $pdf->SetSubject('Data Karyawan');
        //header Data
        $pdf->SetHeaderData('logo.jpg',30,'PT. Astrindo Senayasa','Mangga Dua Square Blok G 24, Jalan Gunung Sahari Raya, Pademangan, RT.12/RW.6, Jakarta Utara, Daerah Khusus Ibukota Jakarta.',array(0, 0, 0),array(0, 0, 0));
        $pdf->SetFooterData(array(255, 255, 255), array(255, 255, 255));
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        //set margin
        $pdf->SetMargins(PDF_MARGIN_LEFT,PDF_MARGIN_TOP - 6,PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $pdf->SetAutoPageBreak(FALSE, PDF_MARGIN_BOTTOM - 5);
        //SET Scaling ImagickPixel
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        //FONT Subsetting
        $pdf->setFontSubsetting(true);
        $pdf->SetFont('helvetica','',10,'',true);
        $pdf->AddPage('P');
        $i=0;
            
        $where = array('id_kry' => $id_kry);
        $karyawannya = $this->Md_karyawan->print_id($id_kry);
        foreach ($karyawannya as $row)

            $html='<br><br><h3 align="center"> DATA LENGKAP KARYAWAN</h3><br><br><br>
                <table border="0.5">
                    <tbody>
                        <tr>
                            <td  width="30%"> Nama Karyawan </td>
                            <td> '.$row['nama_kry'].'</td>
                        </tr>
                        <tr>
                            <td> NIK </td>
                            <td> '.$row['nik_kry'].'</td>
                        </tr>
                        <tr>
                            <td> Jabatan </td>
                            <td> '.$row['jabatan_kry'].'</td>
                        </tr>
                        <tr>
                            <td> Pangkat </td>
                            <td> '.$row['pangkat_kry'].'</td>
                        </tr>
                        <tr>
                            <td> Divisi </td>
                            <td> '.$row['divisi_kry'].'</td>
                        </tr>
                        <tr>
                            <td> Departemen </td>
                            <td> '.$row['dep_kry'].'</td>
                        </tr>
                        <tr>
                            <td> Unit / Cabang </td>
                            <td> '.$row['lokasi_kry'].'</td>
                        </tr>
                        <tr>
                            <td> Nama Panggilan </td>
                            <td> '.$row['panggilan_kry'].'</td>
                        </tr>
                        <tr>
                            <td> Identitas </td>
                            <td> '.$row['identitas_kry'].'</td>
                        </tr>
                        <tr>
                            <td> Jenis Kelamin </td>
                            <td> '.$row['jk_kry'].'</td>
                        </tr>
                        <tr>
                            <td> Tempat Lahir </td>
                            <td> '.$row['tempat_lahir_kry'].'</td>
                        </tr>
                        <tr>
                            <td> Tanggal Lahir </td>
                            <td> '.$row['tgl_lahir_kry'].'</td>
                        </tr>
                        <tr>
                            <td> Kewarganegaraan </td>
                            <td> '.$row['negara_kry'].'</td>
                        </tr>
                        <tr>
                            <td> Agama </td>
                            <td> '.$row['agama_kry'].'</td>
                        </tr>
                        <tr>
                            <td> NPWP </td>
                            <td> '.$row['npwp_kry'].'</td>
                        </tr>
                        <tr>
                            <td> Alamat </td>
                            <td> '.$row['alamat_kry'].'</td>
                        </tr>
                        <tr>
                            <td> Telpon Rumah </td>
                            <td> '.$row['tlp_rumah_kry'].'</td>
                        </tr>
                        <tr>
                            <td> No. Handphone </td>
                            <td> '.$row['no_hp_kry'].'</td>
                        </tr>
                        <tr>
                            <td> Tanggal Masuk </td>
                            <td> '.$row['tgl_masuk_kry'].'</td>
                        </tr>
                        <tr>
                            <td> Status Pekerjaan </td>
                            <td> '.$row['status_kerja_kry'].'</td>
                        </tr>
                        <tr>
                            <td> Status Pernikahan </td>
                            <td> '.$row['status_nikah_kry'].'</td>
                        </tr>
                        <tr>
                            <td> Email </td>
                            <td> '.$row['email_kry'].'</td>
                        </tr>
                    </tbody>
                </table>';
            
            $html.='<br><br><p>AST-CRM-HRG-024 Rev. 02 10-03-2017 | '.date("d-m-Y", time()) .'</p>';
            $pdf->writeHTML($html, true, false, true, false, '');
            ob_end_clean();
            $pdf->Output('laporan_perkaryawan'.date("d-m-Y", time()) .'.pdf', 'I');
    }

    // =========================================== PRINT KARYAWAN END =========================================== //

    // =========================================== PRINT PERMOHONAN START =========================================== //

    public function print_permohonan(){
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        // document informasi
        $pdf->SetCreator('PT. Astrindo Senayasa');
        $pdf->SetTitle('Laporan Data Karyawan');
        $pdf->SetSubject('Permohonan Karyawan');
        //header Data
        $pdf->SetHeaderData('logo.jpg',30,'PT. Astrindo Senayasa','Mangga Dua Square Blok G 24, Jalan Gunung Sahari Raya, Pademangan, RT.12/RW.6, Jakarta Utara, Daerah Khusus Ibukota Jakarta.',array(0, 0, 0),array(0, 0, 0));
        $pdf->SetFooterData(array(255, 255, 255), array(255, 255, 255));
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        //set margin
        $pdf->SetMargins(PDF_MARGIN_LEFT,PDF_MARGIN_TOP - 6,PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $pdf->SetAutoPageBreak(FALSE, PDF_MARGIN_BOTTOM - 5);
        //SET Scaling ImagickPixel
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        //FONT Subsetting
        $pdf->setFontSubsetting(true);
        $pdf->SetFont('helvetica','',6,'',true);
        $pdf->AddPage('L');
        $i=0;
            
            $html='<h3>Data Permohonan Karyawan</h3>
                    <table border="0.5" bgcolor="#666666" cellpadding="2">
                        <tr align="center" bgcolor="#ffffff">
                            <th width="3%">No</th>
                            <th>Departemen</th>
                            <th>Nama Pemohon</th>
                            <th>Jabatan Pemohon</th>
                            <th>Jabatan</th>
                            <th>Lokasi</th>
                            <th>Waktu</th>
                            <th>Status Kerja</th>
                            <th>Jumlah</th>
                            <th>Tanggal</th>
                            <th>Dasar Permohonan</th>
                            <th>Sumber Rekrutmen</th>
                            <th>Ringkasan Tugas</th>
                            <th>Gajih</th>
                            <th>JK</th>
                            <th>Usia</th>
                            <th>Pendidikan</th>
                            <th>Jurusan</th>
                            <th>Pengalaman Kerja</th>
                            <th>Bidang</th>
                            <th>Syarat Lain</th>
                            <th>Keterampilan</th>
                            <th>Tanggal Bergabung</th>
                            <th>Office Euipment</th>
                        </tr>';
            $permohonan = $this->Md_permohonan->print();
            foreach ($permohonan as $row) 
                {
                    $i++;
                    $html.='<tr bgcolor="#ffffff">
                            <td align="center">'.$i.'</td>
                            <td align="center">'.$row['dep_pmhn'].'</td>
                            <td> '.$row['nama_pemohon_pmhn'].'</td>
                            <td> '.$row['jabatan_pemohon_pmhn'].'</td>
                            <td> '.$row['jabatan_pmhn'].'</td>
                            <td>'.$row['lokasi_pmhn'].'</td>
                            <td align="center">'.$row['waktu_pmhn'].'</td>
                            <td align="center">'.$row['status_kerja_pmhn'].'</td>
                            <td align="center">'.$row['jumlah_pmhn'].'</td>
                            <td align="center"> '.$row['tanggal_pmhn'].'</td>
                            <td> '.$row['dasar_permohonan_pmhn'].'</td>
                            <td> '.$row['sumber_rekrutmen_pmhn'].'</td>
                            <td> '.$row['ringkasan_tugas_pmhn'].'</td>
                            <td align="center"> '.$row['gajih_pmhn'].'</td>
                            <td align="center"> '.$row['jk_pmhn'].'</td>
                            <td align="center"> '.$row['usia_pmhn'].'</td>
                            <td align="center"> '.$row['pendidikan_pmhn'].'</td>
                            <td> '.$row['jurusan_pmhn'].'</td>
                            <td> '.$row['pengalaman_kerja_pmhn'].'</td>
                            <td> '.$row['bidang_pmhn'].'</td>
                            <td> '.$row['syarat_lain_pmhn'].'</td>
                            <td> '.$row['keterampilan_pmhn'].'</td>
                            <td align="center"> '.$row['tgl_bergabung_pmhn'].'</td>
                            <td> '.$row['office_equipment_pmhn'].'</td>
                        </tr>';
                }
            
            $html.='<p>AST-CRM-HRG-024 Rev. 02 10-03-2017 | '.date("d-m-Y", time()) .'</p>';
            $html.='</table>';
            $pdf->writeHTML($html, true, false, true, false, '');
            ob_end_clean();
            $pdf->Output('laporan_permohonan'.date("d-m-Y", time()) .'.pdf', 'I');
    }

    public function print_permohonan_id($id_pmhn){
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        // document informasi
        $pdf->SetCreator('PT. Astrindo Senayasa');
        $pdf->SetTitle('Laporan Data Karyawan');
        $pdf->SetSubject('Permohonan Karyawan');
        //header Data
        $pdf->SetHeaderData('logo.jpg',30,'PT. Astrindo Senayasa','Mangga Dua Square Blok G 24, Jalan Gunung Sahari Raya, Pademangan, RT.12/RW.6, Jakarta Utara, Daerah Khusus Ibukota Jakarta.',array(0, 0, 0),array(0, 0, 0));
        $pdf->SetFooterData(array(255, 255, 255), array(255, 255, 255));
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        //set margin
        $pdf->SetMargins(PDF_MARGIN_LEFT,PDF_MARGIN_TOP - 6,PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $pdf->SetAutoPageBreak(FALSE, PDF_MARGIN_BOTTOM - 5);
        //SET Scaling ImagickPixel
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        //FONT Subsetting
        $pdf->setFontSubsetting(true);
        $pdf->SetFont('helvetica','',10,'',true);
        $pdf->AddPage('P');
        $i=0;
            
        $where = array('id_pmhn' => $id_pmhn);
        $permohonannya = $this->Md_permohonan->print_id($id_pmhn);
        foreach ($permohonannya as $row)

            $html='<br><br><h3 align="center"> DATA PERMOHONAN KARYAWAN</h3><br><br><br>
                <table border="0.5">
                    <tbody>
                        <tr>
                            <td colspan="1"><b> A. DATA PEMOHON</b></td>
                        </tr>
                        <tr>
                            <td width="35%"> Departemen </td>
                            <td> '.$row['dep_pmhn'].'</td>
                        </tr>
                        <tr>
                            <td> Nama Pemohon </td>
                            <td> '.$row['nama_pemohon_pmhn'].'</td>
                        </tr>
                        <tr>
                            <td> Jabatan Pemohon </td>
                            <td> '.$row['jabatan_pemohon_pmhn'].'</td>
                        </tr>
                        <tr>
                            <td colspan="1"><b> B. KLASIFIKASI KEBUTUHAN</b></td>
                        </tr>
                        <tr>
                            <td> Jabatan </td>
                            <td> '.$row['jabatan_pmhn'].'</td>
                        </tr>
                        <tr>
                            <td> Lokasi </td>
                            <td> '.$row['lokasi_pmhn'].'</td>
                        </tr>
                        <tr>
                            <td> Waktu </td>
                            <td> '.$row['waktu_pmhn'].'</td>
                        </tr>
                        <tr>
                            <td> Status </td>
                            <td> '.$row['status_kerja_pmhn'].'</td>
                        </tr>
                        <tr>
                            <td> Jumlah </td>
                            <td> '.$row['jumlah_pmhn'].'</td>
                        </tr>
                        <tr>
                            <td> Tanggal </td>
                            <td> '.$row['tanggal_pmhn'].'</td>
                        </tr>
                        <tr>
                            <td> Dasar Permohonan </td>
                            <td> '.$row['dasar_permohonan_pmhn'].'</td>
                        </tr>
                        <tr>
                            <td> Sumber Rekrutmen </td>
                            <td> '.$row['sumber_rekrutmen_pmhn'].'</td>
                        </tr>
                        <tr>
                            <td> Ringkasan Tugas </td>
                            <td> '.$row['ringkasan_tugas_pmhn'].'</td>
                        </tr>
                        <tr>
                            <th colspan="1"><b> C. PERSYARATAN</b></th>
                        </tr>
                        <tr>
                            <td> Gajih </td>
                            <td> '.$row['gajih_pmhn'].'</td>
                        </tr>
                        <tr>
                            <td> Jenis Kelamin </td>
                            <td> '.$row['jk_pmhn'].'</td>
                        </tr>
                        <tr>
                            <td> Pendidikan </td>
                            <td> '.$row['pendidikan_pmhn'].'</td>
                        </tr>
                        <tr>
                            <td> Jurusan </td>
                            <td> '.$row['jurusan_pmhn'].'</td>
                        </tr>
                        <tr>
                            <td> Pengalaman Kerja </td>
                            <td> '.$row['pengalaman_kerja_pmhn'].'</td>
                        </tr>
                        <tr>
                            <td> Bidang </td>
                            <td> '.$row['bidang_pmhn'].'</td>
                        </tr>
                        <tr>
                            <td> Syarat Lainnya </td>
                            <td> '.$row['syarat_lain_pmhn'].'</td>
                        </tr>
                        <tr>
                            <td> Keterampilan </td>
                            <td> '.$row['keterampilan_pmhn'].'</td>
                        </tr>
                        <tr>
                            <td colspan="1"><b> D. TANGGAL BERGABUNG</b></td>
                        </tr>
                        <tr>
                            <td> Tanggal Bergabung </td>
                            <td> '.$row['tgl_bergabung_pmhn'].'</td>
                        </tr>
                        <tr>
                            <td colspan="1"><b> E. LAMPIRAN</b></td>
                        </tr>
                        <tr>
                            <td> Office Equipment </td>
                            <td> '.$row['office_equipment_pmhn'].'</td>
                        </tr>
                    </tbody>
                </table>';
            
            $html.='<br><br><p>AST-CRM-HRG-024 Rev. 02 10-03-2017 | '.date("d-m-Y", time()) .'</p>';
            $pdf->writeHTML($html, true, false, true, false, '');
            ob_end_clean();
            $pdf->Output('laporan_permohonan'.date("d-m-Y", time()) .'.pdf', 'I');
    }

    // =========================================== PRINT PERMOHONAN END =========================================== //

    // =========================================== PRINT RESIGN START =========================================== //

    public function print_resign(){
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        // document informasi
        $pdf->SetCreator('PT. Astrindo Senayasa');
        $pdf->SetTitle('Laporan Data Karyawan');
        $pdf->SetSubject('Karyawan Resign');
        //header Data
        $pdf->SetHeaderData('logo.jpg',30,'PT. Astrindo Senayasa','Mangga Dua Square Blok G 24, Jalan Gunung Sahari Raya, Pademangan, RT.12/RW.6, Jakarta Utara, Daerah Khusus Ibukota Jakarta.',array(0, 0, 0),array(0, 0, 0));
        $pdf->SetFooterData(array(255, 255, 255), array(255, 255, 255));
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        //set margin
        $pdf->SetMargins(PDF_MARGIN_LEFT,PDF_MARGIN_TOP - 6,PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $pdf->SetAutoPageBreak(FALSE, PDF_MARGIN_BOTTOM - 5);
        //SET Scaling ImagickPixel
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        //FONT Subsetting
        $pdf->setFontSubsetting(true);
        $pdf->SetFont('helvetica','',6,'',true);
        $pdf->AddPage('P');
        $i=0;
            
        $html='<h3>Data Karyawan Resign</h3>
                <table border="0.5" bgcolor="#666666" cellpadding="2">
                    <tr align="center" bgcolor="#ffffff">
                        <th width="3%">No</th>
                        <th width="6%">Bulan</th>
                        <th width="15%">Nama</th>
                        <th>Pangkat</th>
                        <th width="20%">Jabatan</th>
                        <th>Departemen</th>
                        <th>Tanggal Masuk</th>
                        <th>Tanggal Resign</th>
                        <th width="6%">Masa (Bulan)</th>
                        <th width="6%">Masa (Tahun)</th>
                        <th width="10%">Keterangan</th>
                    </tr>';
            
            $resign = $this->Md_resign->print();
            foreach ($resign as $row) 
                {
                    $i++;
                    $html.='<tr bgcolor="#ffffff">
                                <td align="center">'.$i.'</td>
                                <td align="center">'.$row['bulan_rs'].'</td>
                                <td> '.$row['nama_rs'].'</td>
                                <td align="center"> '.$row['pangkat_rs'].'</td>
                                <td> '.$row['jabatan_rs'].'</td>
                                <td align="center"> '.$row['dep_rs'].'</td>
                                <td align="center">'.$row['tgl_masuk_rs'].'</td>
                                <td align="center">'.$row['tgl_resign_rs'].'</td>
                                <td align="center">'.$row['masa_bulan_rs'].'</td>
                                <td align="center">'.$row['masa_tahun_rs'].'</td>
                                <td> '.$row['keterangan_rs'].'</td>
                            </tr>';
                }
            
                $html.='<p>AST-CRM-HRG-024 Rev. 02 10-03-2017 | '.date("d-m-Y", time()) .'</p>';
            $html.='</table>';
            $pdf->writeHTML($html, true, false, true, false, '');
            ob_end_clean();
            $pdf->Output('laporan_resign'.date("d-m-Y", time()) .'.pdf', 'I');
    }

    // =========================================== PRINT RESIGN END =========================================== //// =========================================== PRINT PENILAIAN START =========================================== //

    // =========================================== PRINT MPP START =========================================== //
    public function print_mpp(){
        
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        // document informasi
        $pdf->SetCreator('PT. Astrindo Senayasa');
        $pdf->SetTitle('Laporan Data Karyawan');
        $pdf->SetSubject('Man Power Planning');
        //header Data
        $pdf->SetHeaderData('logo.jpg',30,'PT. Astrindo Senayasa','Mangga Dua Square Blok G 24, Jalan Gunung Sahari Raya, Pademangan, RT.12/RW.6, Jakarta Utara, Daerah Khusus Ibukota Jakarta.',array(0, 0, 0),array(0, 0, 0));
        $pdf->SetFooterData(array(255, 255, 255), array(255, 255, 255));
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        //set margin
        $pdf->SetMargins(PDF_MARGIN_LEFT,PDF_MARGIN_TOP - 6,PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $pdf->SetAutoPageBreak(FALSE, PDF_MARGIN_BOTTOM - 5);
        //SET Scaling ImagickPixel
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        //FONT Subsetting
        $pdf->setFontSubsetting(true);
        $pdf->SetFont('helvetica','',7,'',true);
        $pdf->AddPage('P');
        
        $html=
        '<div>
            <h1 align="center">MAN POWER PLANNING</h1>
            <table border="0.5">
                <tr>
                    <td align="center">Total Permintaan per Jabatan</td>
                </tr>
                <tr>
                    <td width="20px" align="center">No.</td>
                    <td width="185.5px" align="center">Jabatan</td>
                    <td width="65px" align="center">Januari 2018</td>
                    <td width="65px" align="center">Februari 2018</td>
                    <td width="65px" align="center">Maret 2018</td>
                    <td width="65px" align="center">April 2018</td>
                    <td width="65px" align="center">Mei 2018</td>
                    <td width="100px" align="center">Grand Total</td>
                </tr>
                <tr>
                    <td align="center">1</td>
                    <td> Accounting Based in Banjarmasin</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">2</td>
                    <td> Admin Finance</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">3</td>
                    <td> Admin Logistic Makassar</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">4</td>
                    <td> Admin Sales Makassar</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">5</td>
                    <td> Admin Sales Semarang</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">6</td>
                    <td> Admin Service & IT Support Makassar</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">7</td>
                    <td> Admin Technical Support Bali</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">8</td>
                    <td> Audit Manager</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">9</td>
                    <td> Branch Manager Medan</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">10</td>
                    <td> Corporate Account Exceutive</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">11</td>
                    <td> Design Graphic</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">12</td>
                    <td> Finance</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">13</td>
                    <td> Finance AP</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">14</td>
                    <td> Helper</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">15</td>
                    <td> Logistik Supervisor</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">16</td>
                    <td> Marketing Communication</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">17</td>
                    <td> Marketing Communication Event & Media</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">18</td>
                    <td> Marketing Communication Manager</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">19</td>
                    <td> Marketing Specialist</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">20</td>
                    <td> Pre Sales Engineer</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">21</td>
                    <td> Product Manager</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">22</td>
                    <td> Receptionist</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">23</td>
                    <td> Sales Executive</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">24</td>
                    <td> Sales Executive (Component)</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">25</td>
                    <td> Sales Executive Bali</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">26</td>
                    <td> Sales Executive Bali</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">27</td>
                    <td> Sales Executive Makassar</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">28</td>
                    <td> Sales Executive Medan</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">29</td>
                    <td> Sales Executive Yogyakarta</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">30</td>
                    <td> SPB</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="2"> Grand Total</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </div>';

        $html .='
        <p style="text-align:right;">Jakarta, ...................., 2018</p>
        </div>';

        $html.='<p>AST-CRM-HRG-024 Rev. 02 10-03-2017 | '.date("d-m-Y", time()) .'</p>';

        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 0, 0, true, '', true);
        $pdf->Output('laporan_mpp_jabatan'.date("d-m-Y", time()) .'.pdf','I');
    }
    // =========================================== PRINT MPP END =========================================== //

    // =========================================== PRINT MPP AREA START =========================================== //
    public function print_mpp_area()
    {
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        // document informasi
        $pdf->SetCreator('PT. Astrindo Senayasa');
        $pdf->SetTitle('Laporan Data Karyawan');
        $pdf->SetSubject('Man Power Planning');
        //header Data
        $pdf->SetHeaderData('logo.jpg',30,'PT. Astrindo Senayasa','Mangga Dua Square Blok G 24, Jalan Gunung Sahari Raya, Pademangan, RT.12/RW.6, Jakarta Utara, Daerah Khusus Ibukota Jakarta.',array(0, 0, 0),array(0, 0, 0));
        $pdf->SetFooterData(array(255, 255, 255), array(255, 255, 255));
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        //set margin
        $pdf->SetMargins(PDF_MARGIN_LEFT,PDF_MARGIN_TOP - 6,PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $pdf->SetAutoPageBreak(FALSE, PDF_MARGIN_BOTTOM - 5);
        //SET Scaling ImagickPixel
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        //FONT Subsetting
        $pdf->setFontSubsetting(true);
        $pdf->SetFont('helvetica','',9,'',true);
        $pdf->AddPage('P');
        
        $html=
        '<div>
            <h1 align="center">MAN POWER PLANNING</h1>
            <table border="0.5">
                <tr>
                    <td colspan="9" align="center" > Jumlah permintaan per departemen untuk setiap area</td>
                </tr>
                <tr>
                    <td width="25px" align="center">No.</td>
                    <td width="40px" align="center">Area</td>
                    <td width="85.5px" align="center">Departemen</td>
                    <td width="80px" align="center">Januari 2018</td>
                    <td width="80px" align="center">Februari 2018</td>
                    <td width="80px" align="center">Maret 2018</td>
                    <td width="80px" align="center">April 2018</td>
                    <td width="80px" align="center">Mei 2018</td>
                    <td width="80px" align="center">Grand Total</td>
                </tr>
                <tr>
                    <td align="center">1</td>
                    <td align="center">100</td>
                    <td> Logistik</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">2</td>
                    <td></td>
                    <td> Sales</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">3</td>
                    <td align="center">300</td>
                    <td> Sales</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">4</td>
                    <td align="center">500</td>
                    <td> IT</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">5</td>
                    <td></td>
                    <td> Sales</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">6</td>
                    <td align="center">600</td>
                    <td> Sales</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">7</td>
                    <td align="center">700</td>
                    <td> Logistik</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">8</td>
                    <td></td>
                    <td> QA</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">9</td>
                    <td></td>
                    <td> Sales</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">10</td>
                    <td align="center">800</td>
                    <td> Sales</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">11</td>
                    <td align="center">910</td>
                    <td> Accounting</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">12</td>
                    <td align="center">HO</td>
                    <td> Accounting</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">13</td>
                    <td></td>
                    <td> Audit</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">14</td>
                    <td></td>
                    <td> Finance</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">15</td>
                    <td></td>
                    <td> HR&GA</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">16</td>
                    <td></td>
                    <td> Logistik</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">17</td>
                    <td></td>
                    <td> Marketing</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">18</td>
                    <td></td>
                    <td> Sales</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">19</td>
                    <td></td>
                    <td> HR&GA</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">20</td>
                    <td></td>
                    <td> Logistik</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">21</td>
                    <td></td>
                    <td> Marketing</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">21</td>
                    <td></td>
                    <td> Sales</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="1"> Grand Total</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </div>';

        $html .='
        <p style="text-align:right;">Jakarta, ...................., 2018</p>
        </div>';

        $html.='<p>AST-CRM-HRG-024 Rev. 02 10-03-2017 | '.date("d-m-Y", time()) .'</p>';
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 0, 0, true, '', true);
        $pdf->Output('laporan_mpp_area'.date("d-m-Y", time()) .'.pdf','I');
    }
    // =========================================== PRINT MPP AREA END =========================================== //

    // ======================================== PRINT MPP DEPARTEMEN START ====================================== //
    public function print_mpp_dep()
    {
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        // document informasi
        $pdf->SetCreator('PT. Astrindo Senayasa');
        $pdf->SetTitle('Laporan Data Karyawan');
        $pdf->SetSubject('Man Power Planning');
        //header Data
        $pdf->SetHeaderData('logo.jpg',30,'PT. Astrindo Senayasa','Mangga Dua Square Blok G 24, Jalan Gunung Sahari Raya, Pademangan, RT.12/RW.6, Jakarta Utara, Daerah Khusus Ibukota Jakarta.',array(0, 0, 0),array(0, 0, 0));
        $pdf->SetFooterData(array(255, 255, 255), array(255, 255, 255));
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        //set margin
        $pdf->SetMargins(PDF_MARGIN_LEFT,PDF_MARGIN_TOP - 6,PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $pdf->SetAutoPageBreak(FALSE, PDF_MARGIN_BOTTOM - 5);
        //SET Scaling ImagickPixel
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        //FONT Subsetting
        $pdf->setFontSubsetting(true);
        $pdf->SetFont('helvetica','',6,'',true);
        $pdf->AddPage('P');
        
        $html=
        '<div>
            <h1 align="center">MAN POWER PLANNING</h1>
            <table border="0.5">
                <tr>
                    <td colspan="10" align="center" > Total permintaan per Jabatan untuk setiap Departemen di masing-masing area</td>
                </tr>
                <tr>
                    <td width="20px" align="center">No.</td>
                    <td width="35px" align="center">Area</td>
                    <td width="50px" align="center">Departemen</td>
                    <td width="150px" align="center">Jabatan</td>
                    <td width="60px" align="center">Januari 2018</td>
                    <td width="60px" align="center">Februari 2018</td>
                    <td width="60px" align="center">Maret 2018</td>
                    <td width="60px" align="center">April 2018</td>
                    <td width="60px" align="center">Mei 2018</td>
                    <td width="75.5px" align="center">Grand Total</td>
                </tr>
                <tr>
                    <td align="center">1</td>
                    <td align="center">100</td>
                    <td> Logistik</td>
                    <td> Helper</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">2</td>
                    <td></td>
                    <td> Sales</td>
                    <td> Corporate Account Executive</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">3</td>
                    <td></td>
                    <td></td>
                    <td> Sales Executive (Component)</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">4</td>
                    <td align="center">300</td>
                    <td> Sales</td>
                    <td> Sales Manager - Yogyakarta</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">5</td>
                    <td align="center">500</td>
                    <td> IT</td>
                    <td> Admin Technical Support - Bali</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">6</td>
                    <td></td>
                    <td> Sales</td>
                    <td> Sales Executive - Bali</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">7</td>
                    <td align="center">600</td>
                    <td> Sales</td>
                    <td> Admin Sales - Semarang</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">8</td>
                    <td align="center">700</td>
                    <td> Logistik</td>
                    <td> Admin Logistik Makasar</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">9</td>
                    <td></td>
                    <td> QA</td>
                    <td> Admin Service & IT Support Makassar</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">10</td>
                    <td></td>
                    <td> Sales</td>
                    <td> Admin Sales Makassar</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">11</td>
                    <td></td>
                    <td></td>
                    <td> Sales Executive - Makassar</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">12</td>
                    <td align="center">800</td>
                    <td> Sales</td>
                    <td> Sales Manager Medan</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">13</td>
                    <td align="center">910</td>
                    <td> Accounting</td>
                    <td> Accounting Based in Banjarmasin</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">14</td>
                    <td align="center">HO</td>
                    <td> Accounting</td>
                    <td> Accounting</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">15</td>
                    <td></td>
                    <td> Audit</td>
                    <td> Audit Manager</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">16</td>
                    <td></td>
                    <td> Finance</td>
                    <td> Admin Finance</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">17</td>
                    <td></td>
                    <td></td>
                    <td> Finance</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">18</td>
                    <td></td>
                    <td></td>
                    <td> Finance AP</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">19</td>
                    <td></td>
                    <td> HR&GA</td>
                    <td> Receptionist</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">20</td>
                    <td></td>
                    <td> Logistik</td>
                    <td> Logistik Supervisor</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">21</td>
                    <td></td>
                    <td> Marketing</td>
                    <td> Design Graphic</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">22</td>
                    <td></td>
                    <td></td>
                    <td> Marketing Communication</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">23</td>
                    <td></td>
                    <td></td>
                    <td> Marketing Communication Event & Media</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">24</td>
                    <td></td>
                    <td></td>
                    <td> Marketing Communication Manager</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">25</td>
                    <td></td>
                    <td></td>
                    <td> Marketing Specialist</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">26</td>
                    <td></td>
                    <td></td>
                    <td> Product Manager</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">27</td>
                    <td></td>
                    <td> Sales</td>
                    <td> Branch Manager - Medan</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">28</td>
                    <td></td>
                    <td></td>
                    <td> Corporate Account Executive</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">29</td>
                    <td></td>
                    <td></td>
                    <td> Pre Sales Engineer</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">30</td>
                    <td></td>
                    <td></td>
                    <td> SPB</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="4"> Grand Total</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </div>';

        $html .='
        <p style="text-align:right;">Jakarta, ...................., 2018</p>
        </div>';

        $html.='<p>AST-CRM-HRG-024 Rev. 02 10-03-2017 | '.date("d-m-Y", time()) .'</p>';
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 0, 0, true, '', true);
        $pdf->Output('laporan_mpp_dep'.date("d-m-Y", time()) .'.pdf','I');
    }
    // ======================================== PRINT MPP DEPARTEMEN END ========================================= //

    // =========================================== PRINT MPP TAT START =========================================== //
    public function print_mpp_tat(){

      $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
      // document informasi
      $pdf->SetCreator('PT. Astrindo Senayasa');
      $pdf->SetTitle('Laporan Data Karyawan');
      $pdf->SetSubject('Man Power Planning');
      //header Data
      $pdf->SetHeaderData('logo.jpg',30,'PT. Astrindo Senayasa','Mangga Dua Square Blok G 24, Jalan Gunung Sahari Raya, Pademangan, RT.12/RW.6, Jakarta Utara, Daerah Khusus Ibukota Jakarta.',array(0, 0, 0),array(0, 0, 0));
      $pdf->SetFooterData(array(255, 255, 255), array(255, 255, 255));
      $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
      $pdf->setFooterFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
      $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
      //set margin
      $pdf->SetMargins(PDF_MARGIN_LEFT,PDF_MARGIN_TOP - 6,PDF_MARGIN_RIGHT);
      $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
      $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
      $pdf->SetAutoPageBreak(FALSE, PDF_MARGIN_BOTTOM - 5);
      //SET Scaling ImagickPixel
      $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
      //FONT Subsetting
      $pdf->setFontSubsetting(true);
      $pdf->SetFont('helvetica','',6,'',true);
      $pdf->AddPage('P');
    
      $html=
        '<div>
            <h1 align="center">MAN POWER PLANNING</h1>
            <table border="0.5">
                <tr>
                    <td colspan="10" align="center" > Total permintaan per Jabatan untuk setiap Departemen di masing-masing area</td>
                </tr>
                <tr>
                    <td width="18px" align="center">No.</td>
                    <td width="55px" align="center">Departemen</td>
                    <td width="147.5px" align="center">Jabatan</td>
                    <td width="18px" align="center">1</td>
                    <td width="18px" align="center">2</td>
                    <td width="18px" align="center">8</td>
                    <td width="18px" align="center">9</td>
                    <td width="18px" align="center">14</td>
                    <td width="18px" align="center">23</td>
                    <td width="18px" align="center">24</td>
                    <td width="18px" align="center">26</td>
                    <td width="18px" align="center">28</td>
                    <td width="18px" align="center">44</td>
                    <td width="18px" align="center">69</td>
                    <td width="18px" align="center">71</td>
                    <td width="18px" align="center">88</td>
                    <td width="18px" align="center">93</td>
                    <td width="18px" align="center">95</td>
                    <td width="18px" align="center">106</td>
                    <td width="18px" align="center">110</td>
                    <td width="18px" align="center">123</td>
                    <td width="18px" align="center">146</td>
                    <td width="18px" align="center">227</td>
                    <td width="50px" align="center">Grand Total</td>
                </tr>
                <tr>
                    <td align="center">1</td>
                    <td> Logistik</td>
                    <td> Helper</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">2</td>
                    <td> Sales</td>
                    <td> Corporate Account Executive</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">3</td>
                    <td></td>
                    <td> Sales Executive (Component)</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">4</td>
                    <td> Sales</td>
                    <td> Sales Manager - Yogyakarta</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">5</td>
                    <td> IT</td>
                    <td> Admin Technical Support - Bali</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">6</td>
                    <td> Sales</td>
                    <td> Sales Executive - Bali</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">7</td>
                    <td> Sales</td>
                    <td> Admin Sales - Semarang</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">8</td>
                    <td> Logistik</td>
                    <td> Admin Logistik Makasar</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">9</td>
                    <td> QA</td>
                    <td> Admin Service & IT Support Makassar</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">10</td>
                    <td> Sales</td>
                    <td> Admin Sales Makassar</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">11</td>
                    <td></td>
                    <td> Sales Executive - Makassar</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">12</td>
                    <td> Sales</td>
                    <td> Sales Manager Medan</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">13</td>
                    <td> Accounting</td>
                    <td> Accounting Based in Banjarmasin</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">14</td>
                    <td> Accounting</td>
                    <td> Accounting</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">15</td>
                    <td> Audit</td>
                    <td> Audit Manager</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">16</td>
                    <td> Finance</td>
                    <td> Admin Finance</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">17</td>
                    <td></td>
                    <td> Finance</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">18</td>
                    <td></td>
                    <td> Finance AP</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">19</td>
                    <td> HR&GA</td>
                    <td> Receptionist</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">20</td>
                    <td> Logistik</td>
                    <td> Logistik Supervisor</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">21</td>
                    <td> Marketing</td>
                    <td> Design Graphic</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">22</td>
                    <td></td>
                    <td> Marketing Communication</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">23</td>
                    <td></td>
                    <td> Marketing Communication Event & Media</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">24</td>
                    <td></td>
                    <td> Marketing Communication Manager</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">25</td>
                    <td></td>
                    <td> Marketing Specialist</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">26</td>
                    <td></td>
                    <td> Product Manager</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">27</td>
                    <td> Sales</td>
                    <td> Branch Manager - Medan</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">28</td>
                    <td></td>
                    <td> Corporate Account Executive</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">29</td>
                    <td></td>
                    <td> Pre Sales Engineer</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">30</td>
                    <td></td>
                    <td> SPB</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="1"> Grand Total</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </div>';
  
        $html .='
        <p style="text-align:right;">Jakarta, ...................., 2018</p>
        </div>';

        $html.='<p>AST-CRM-HRG-024 Rev. 02 10-03-2017 | '.date("d-m-Y", time()) .'</p>';
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 0, 0, true, '', true);
        $pdf->Output('laporan_mpp_tat'.date("d-m-Y", time()) .'.pdf','I');
    }
    // =========================================== PRINT MPP AREA END =========================================== //

    // =========================================== PRINT TRAINING START =========================================== //
    public function form_training(){
        
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        // document informasi
        $pdf->SetCreator('PT. Astrindo Senayasa');
        $pdf->SetTitle('Laporan Data Karyawan');
        $pdf->SetSubject('Karyawan Training');
        //header Data
        $pdf->SetHeaderData('logo.jpg',30,'PT. Astrindo Senayasa','Mangga Dua Square Blok G 24, Jalan Gunung Sahari Raya, Pademangan, RT.12/RW.6, Jakarta Utara, Daerah Khusus Ibukota Jakarta.',array(0, 0, 0),array(0, 0, 0));
        $pdf->SetFooterData(array(255, 255, 255), array(255, 255, 255));
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        //set margin
        $pdf->SetMargins(PDF_MARGIN_LEFT,PDF_MARGIN_TOP - 6,PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $pdf->SetAutoPageBreak(FALSE, PDF_MARGIN_BOTTOM - 5);
        //SET Scaling ImagickPixel
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        //FONT Subsetting
        $pdf->setFontSubsetting(true);
        $pdf->SetFont('helvetica','',8,'',true);
        $pdf->AddPage('P');
        
        $html=
        '<div>
            <h1 align="center">FORM PENGAJUAN TRAINING</h1>
            <table>
                <tbody>
                    <tr>
                        <td width="30%"> <b>A. PEMOHON</b> </td>
                    </tr>
                    <tr>
                        <td width="30%">    1. Nama Pemohon </td>
                        <td width="1%">:</td>
                        <td>.....................................................................</td>
                    </tr>
                    <tr>
                        <td width="30%">    2. NIK </td>
                        <td width="1%">:</td>
                        <td>.....................................................................</td>
                    </tr>
                    <tr>
                        <td width="30%">    3. Jabatan </td>
                        <td width="1%">:</td>
                        <td>.....................................................................</td>
                    </tr>
                    <tr>
                        <td width="30%">    4. Departemen</td>
                        <td width="1%">:</td>
                        <td>.....................................................................</td>
                    </tr>
                    <tr>
                        <td width="30%">    5. Tanggal Permohonan </td>
                        <td width="1%">:</td>
                        <td>.....................................................................</td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td width="30%"> <b>A. DATA PERMINTAAN TRAINING</b> </td>
                    </tr>
                    <tr>
                        <td width="30%">    1. Judul Training</td>
                        <td width="1%">:</td>
                        <td>.....................................................................</td>
                    </tr>
                    <tr>
                        <td width="30%">    2. Penyelenggara</td>
                        <td width="1%">:</td>
                        <td>.....................................................................</td>
                    </tr>
                    <tr>
                        <td width="30%">    3. Waktu Pelaksanaan</td>
                        <td width="1%">:</td>
                        <td>.....................................................................</td>
                    </tr>
                    <tr>
                        <td width="30%">    4. Tempat Pelaksanaan</td>
                        <td width="1%">:</td>
                        <td>.....................................................................</td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td width="30%"> <b>C. BIAYA TRAINING</b> </td>
                    </tr>
                    <tr>
                        <td width="30%">    1. Biaya</td>
                        <td width="1%">:</td>
                        <td>.....................................................................</td>
                    </tr>
                    <tr>
                        <td width="30%">    2. Cara Pembayaran</td>
                        <td width="1%">:</td>
                        <td>.....................................................................</td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td align="center">Tanda Tangan Pemohon</td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td align="center">(........................................)</td>
                    </tr>
                    <tr>
                        <td> Tanggal :</td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td width="30%"> <b>D. KEPUTUSAN MANAJEMEN</b> </td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td align="center">Atasan Pemohon</td>
                        <td></td>
                        <td align="center">HRD Manager</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td align="center">(........................................)</td>
                        <td></td>
                        <td align="center">(......................................)</td>
                    </tr>
                    <tr>
                        <td> Tanggal :</td>
                        <td width="20%"></td>
                        <td> Tanggal :</td>
                    </tr>
                    <tr>
                        <td> Setuju/Tidak Setuju(*)</td>
                        <td width="20%"></td>
                        <td> Setuju/Tidak Setuju(*)</td>
                    </tr>
                    <tr>
                        <td> Komentar : </td>
                        <td width="20%"></td>
                        <td> Komentar : </td>
                    </tr>
                    <tr>
                        <td>...................................................................</td>
                        <td></td>
                        <td>...................................................................</td>
                    </tr>
                    <tr>
                        <td>...................................................................</td>
                        <td></td>
                        <td>...................................................................</td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td align="center">General Manager</td>
                        <td width="1%"></td>
                        <td align="center">Direktur / BOD</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td align="center">(........................................)</td>
                        <td></td>
                        <td align="center">(......................................)</td>
                    </tr>
                    <tr>
                        <td> Tanggal :</td>
                        <td width="20%"></td>
                        <td> Tanggal :</td>
                    </tr>
                    <tr>
                        <td> Setuju/Tidak Setuju(*)</td>
                        <td width="20%"></td>
                        <td> Setuju/Tidak Setuju(*)</td>
                    </tr>
                    <tr>
                        <td> Komentar : </td>
                        <td width="20%"></td>
                        <td> Komentar : </td>
                    </tr>
                    <tr>
                        <td>...................................................................</td>
                        <td></td>
                        <td>...................................................................</td>
                    </tr>
                    <tr>
                        <td>...................................................................</td>
                        <td></td>
                        <td>...................................................................</td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td width="30%"> <b>D. PROSES DI HRD</b> </td>
                    </tr>
                    <tr>
                        <td width="30%"> 1. Diterima di HRD</td>
                        <td width="1%">:</td>
                        <td>.....................................................................</td>
                    </tr>
                    <tr>
                        <td width="30%"> 2. Pembayaran Tanggal</td>
                        <td width="1%">:</td>
                        <td>.....................................................................</td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td width="30%">Catatan: <br style="font-size: 6px;"> 
                        - Pengujian formulir training ke HRD paling lambat 2 minggu sebelum pelaksanaan. <br style="font-size: 6px;"> 
                        - Melampirkan brosur/leaflet training yang akan diikuti. <br style="font-size: 6px;"> 
                        - (*) Coret salah satu.</td>
                    </tr>
                </tbody>
            </table>
        </div>';

        $html.='<p>AST-CRM-HRG-024 Rev. 02 10-03-2017 | '.date("d-m-Y", time()) .'</p>';
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 0, 0, true, '', true);
        $pdf->Output('form_training'.date("d-m-Y", time()) .'.pdf','I');
    }

    public function form_training_id($id_tr){
        
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        // document informasi
        $pdf->SetCreator('PT. Astrindo Senayasa');
        $pdf->SetTitle('Laporan Data Karyawan');
        $pdf->SetSubject('Karyawan Training');
        //header Data
        $pdf->SetHeaderData('logo.jpg',30,'PT. Astrindo Senayasa','Mangga Dua Square Blok G 24, Jalan Gunung Sahari Raya, Pademangan, RT.12/RW.6, Jakarta Utara, Daerah Khusus Ibukota Jakarta.',array(0, 0, 0),array(0, 0, 0));
        $pdf->SetFooterData(array(255, 255, 255), array(255, 255, 255));
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        //set margin
        $pdf->SetMargins(PDF_MARGIN_LEFT,PDF_MARGIN_TOP - 6,PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $pdf->SetAutoPageBreak(FALSE, PDF_MARGIN_BOTTOM - 5);
        //SET Scaling ImagickPixel
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        //FONT Subsetting
        $pdf->setFontSubsetting(true);
        $pdf->SetFont('helvetica','',8,'',true);
        $pdf->AddPage('P');
        
        $where = array('id_tr' => $id_tr);
        $trainingnya = $this->Md_training->print_id($id_tr);
        foreach ($trainingnya as $row)

        $html='
        <div>
            <h1 align="center">FORM PENGAJUAN TRAINING</h1>
            <table>
                <tbody>
                    <tr>
                        <td width="30%"> <b>A. PEMOHON</b> </td>
                    </tr>
                    <tr>
                        <td width="30%">    1. Nama Pemohon </td>
                        <td width="1%">:</td>
                        <td>'.$row['nama_pemohon_tr'].'</td>
                    </tr>
                    <tr>
                        <td width="30%">    2. NIK </td>
                        <td width="1%">:</td>
                        <td>'.$row['nik_pemohon_tr'].'</td>
                    </tr>
                    <tr>
                        <td width="30%">    3. Jabatan </td>
                        <td width="1%">:</td>
                        <td>'.$row['jabatan_pemohon_tr'].'</td>
                    </tr>
                    <tr>
                        <td width="30%">    4. Departemen</td>
                        <td width="1%">:</td>
                        <td>'.$row['dep_pemohon_tr'].'</td>
                    </tr>
                    <tr>
                        <td width="30%">    5. Tanggal Permohonan </td>
                        <td width="1%">:</td>
                        <td>'.$row['tgl_permohonan_tr'].'</td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td width="30%"> <b>A. DATA PERMINTAAN TRAINING</b> </td>
                    </tr>
                    <tr>
                        <td width="30%">    1. Judul Training</td>
                        <td width="1%">:</td>
                        <td>'.$row['judul_training_tr'].'</td>
                    </tr>
                    <tr>
                        <td width="30%">    2. Penyelenggara</td>
                        <td width="1%">:</td>
                        <td>'.$row['penyelenggara_tr'].'</td>
                    </tr>
                    <tr>
                        <td width="30%">    3. Waktu Pelaksanaan</td>
                        <td width="1%">:</td>
                        <td>'.$row['tgl_pelaksanaan_tr'].'</td>
                    </tr>
                    <tr>
                        <td width="30%">    4. Tempat Pelaksanaan</td>
                        <td width="1%">:</td>
                        <td>'.$row['tempat_pelaksanaan_tr'].'</td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td width="30%"> <b>C. BIAYA TRAINING</b> </td>
                    </tr>
                    <tr>
                        <td width="30%">    1. Biaya</td>
                        <td width="1%">:</td>
                        <td>'.$row['biaya_tr'].'</td>
                    </tr>
                    <tr>
                        <td width="30%">    2. Cara Pembayaran</td>
                        <td width="1%">:</td>
                        <td>'.$row['pembayaran_tr'].'</td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td align="center">Tanda Tangan Pemohon</td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td align="center">(........................................)</td>
                    </tr>
                    <tr>
                        <td> Tanggal :</td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td width="30%"> <b>D. KEPUTUSAN MANAJEMEN</b> </td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td align="center">Atasan Pemohon</td>
                        <td></td>
                        <td align="center">HRD Manager</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td align="center">(........................................)</td>
                        <td></td>
                        <td align="center">(......................................)</td>
                    </tr>
                    <tr>
                        <td> Tanggal :</td>
                        <td width="20%"></td>
                        <td> Tanggal :</td>
                    </tr>
                    <tr>
                        <td> Setuju/Tidak Setuju(*)</td>
                        <td width="20%"></td>
                        <td> Setuju/Tidak Setuju(*)</td>
                    </tr>
                    <tr>
                        <td> Komentar : </td>
                        <td width="20%"></td>
                        <td> Komentar : </td>
                    </tr>
                    <tr>
                        <td>...................................................................</td>
                        <td></td>
                        <td>...................................................................</td>
                    </tr>
                    <tr>
                        <td>...................................................................</td>
                        <td></td>
                        <td>...................................................................</td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td align="center">General Manager</td>
                        <td width="1%"></td>
                        <td align="center">Direktur / BOD</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td align="center">(........................................)</td>
                        <td></td>
                        <td align="center">(......................................)</td>
                    </tr>
                    <tr>
                        <td> Tanggal :</td>
                        <td width="20%"></td>
                        <td> Tanggal :</td>
                    </tr>
                    <tr>
                        <td> Setuju/Tidak Setuju(*)</td>
                        <td width="20%"></td>
                        <td> Setuju/Tidak Setuju(*)</td>
                    </tr>
                    <tr>
                        <td> Komentar : </td>
                        <td width="20%"></td>
                        <td> Komentar : </td>
                    </tr>
                    <tr>
                        <td>...................................................................</td>
                        <td></td>
                        <td>...................................................................</td>
                    </tr>
                    <tr>
                        <td>...................................................................</td>
                        <td></td>
                        <td>...................................................................</td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td width="30%"> <b>D. PROSES DI HRD</b> </td>
                    </tr>
                    <tr>
                        <td width="30%"> 1. Diterima di HRD</td>
                        <td width="1%">:</td>
                        <td>'.$row['tgl_terima_tr'].'</td>
                    </tr>
                    <tr>
                        <td width="30%"> 2. Pembayaran Tanggal</td>
                        <td width="1%">:</td>
                        <td>'.$row['tgl_bayar_tr'].'</td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td width="30%">Catatan: <br style="font-size: 6px;"> 
                        - Pengujian formulir training ke HRD paling lambat 2 minggu sebelum pelaksanaan. <br style="font-size: 6px;"> 
                        - Melampirkan brosur/leaflet training yang akan diikuti. <br style="font-size: 6px;"> 
                        - (*) Coret salah satu.</td>
                    </tr>
                </tbody>
            </table>
        </div>';

        $html.='<p>AST-CRM-HRG-024 Rev. 02 10-03-2017 | '.date("d-m-Y", time()) .'</p>';
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 0, 0, true, '', true);
        $pdf->Output('form_training'.date("d-m-Y", time()) .'.pdf','I');
    }

    public function print_training(){

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        // document informasi
        $pdf->SetCreator('PT. Astrindo Senayasa');
        $pdf->SetTitle('Laporan Data Karyawan');
        $pdf->SetSubject('Training Karyawan');
        //header Data
        $pdf->SetHeaderData('logo.jpg',30,'PT. Astrindo Senayasa','Mangga Dua Square Blok G 24, Jalan Gunung Sahari Raya, Pademangan, RT.12/RW.6, Jakarta Utara, Daerah Khusus Ibukota Jakarta.',array(0, 0, 0),array(0, 0, 0));
        $pdf->SetFooterData(array(255, 255, 255), array(255, 255, 255));
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        //set margin
        $pdf->SetMargins(PDF_MARGIN_LEFT,PDF_MARGIN_TOP - 6,PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $pdf->SetAutoPageBreak(FALSE, PDF_MARGIN_BOTTOM - 5);
        //SET Scaling ImagickPixel
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        //FONT Subsetting
        $pdf->setFontSubsetting(true);
        $pdf->SetFont('helvetica','',6,'',true);
        $pdf->AddPage('L');
        $i=0;

            $html='<h3>Data Training Karyawan</h3>
                    <table border="0.5" bgcolor="#666666" cellpadding="2">
                        <tr align="center" bgcolor="#ffffff">
                            <th width="3%">No</th>
                            <th>Nama Pemohon</th>
                            <th >NIK</th>
                            <th width="13%">Jabatan</th>
                            <th>Departemen</th>
                            <th>Tgl Permohonan</th>
                            <th>Judul Training</th>
                            <th >Penyelenggara</th>
                            <th >Tgl Acara</th>
                            <th >Tempat</th>
                            <th>Biaya</th>
                            <th>Pembayaran</th>
                            <th>Tgl Terima</th>
                            <th>Tgl Bayar</th>
                        </tr>';

            $training = $this->Md_training->print();
            foreach ($training as $row) 
                {
                    $i++;
                    $html.='<tr bgcolor="#ffffff">
                                <td align="center">'.$i.'</td>
                                <td align="center">'.$row['nama_pemohon_tr'].'</td>
                                <td align="center"> '.$row['nik_pemohon_tr'].'</td>
                                <td> '.$row['jabatan_pemohon_tr'].'</td>
                                <td align="center"> '.$row['dep_pemohon_tr'].'</td>
                                <td align="center">'.$row['tgl_permohonan_tr'].'</td>
                                <td align="center">'.$row['judul_training_tr'].'</td>
                                <td align="center">'.$row['penyelenggara_tr'].'</td>
                                <td align="center">'.$row['tgl_pelaksanaan_tr'].'</td>
                                <td> '.$row['tempat_pelaksanaan_tr'].'</td>
                                <td align="center"> '.$row['biaya_tr'].'</td>
                                <td> '.$row['pembayaran_tr'].'</td>
                                <td align="center"> '.$row['tgl_terima_tr'].'</td>
                                <td align="center"> '.$row['tgl_bayar_tr'].'</td>
                            </tr>';
                }

            $html.='</table>';

            $html.='<p>AST-CRM-HRG-024 Rev. 02 10-03-2017 | '.date("d-m-Y", time()) .'</p>';
            $pdf->writeHTML($html, true, false, true, false, '');
            ob_end_clean();
            $pdf->Output('laporan_training'.date("d-m-Y", time()) .'.pdf', 'I');
    }
    // =========================================== PRINT TRAINING END =========================================== //

    // =========================================== PRINT PERCOBAAN START =========================================== //
    public function form_percobaan(){

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        // document informasi
        $pdf->SetCreator('PT. Astrindo Senayasa');
        $pdf->SetTitle('Laporan Data Karyawan');
        $pdf->SetSubject('Karyawan Percobaan');
        //header Data
        $pdf->SetHeaderData('logo.jpg',30,'PT. Astrindo Senayasa','Mangga Dua Square Blok G 24, Jalan Gunung Sahari Raya, Pademangan, RT.12/RW.6, Jakarta Utara, Daerah Khusus Ibukota Jakarta.',array(0, 0, 0),array(0, 0, 0));
        $pdf->SetFooterData('AST-CRM-HRG-024 Rev. 02 10-03-2017',array(0, 0, 0), array(0, 0, 0));
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        //set margin
        $pdf->SetMargins(PDF_MARGIN_LEFT,PDF_MARGIN_TOP - 6,PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $pdf->SetAutoPageBreak(FALSE, PDF_MARGIN_BOTTOM - 5);
        //SET Scaling ImagickPixel
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        //FONT Subsetting
        $pdf->setFontSubsetting(true);
        $pdf->SetFont('helvetica','',6,'',true);
        $pdf->AddPage('P');

        $percobaanku = $this->Md_percobaan->print();
        foreach ($percobaanku as $row) 
    
            $html='
                <br>
                <h3 align="center">FORM PENILAIAN MASA PERCOBAAN <br><span>( Operator / Staff )</span></h3>
                <br><br><br><br>
                <table>
                    <tbody>
                        <tr>
                            <td width="15%"> Nama Lengkap </td>
                            <td width="1%">:</td>
                            <td>'.$row['nama_cb'].'</td>
                        </tr>
                        <tr>
                            <td width="15%"> NIK </td>
                            <td width="1%">:</td>
                            <td>'.$row['nik_cb'].'</td>
                        </tr>
                        <tr>
                            <td width="15%"> Departemen</td>
                            <td width="1%">:</td>
                            <td>'.$row['dep_cb'].'</td>
                        </tr>
                        <tr>
                            <td width="15%"> Jabatan </td>
                            <td width="1%">:</td>
                            <td>'.$row['jabatan_cb'].'</td>
                        </tr>
                        <tr>
                            <td width="15%"> Tanggal Masuk </td>
                            <td width="1%">:</td>
                            <td>'.$row['tgl_masuk_cb'].'</td>
                        </tr>
                        <tr>
                            <td width="15%"> Jenis Percobaan</td>
                            <td width="1%">:</td>
                            <td>'.$row['jenis_cb'].'</td>
                        </tr>
                        <tr>
                            <td width="15%"> Tanggal Mulai </td>
                            <td width="1%">:</td>
                            <td>'.$row['tgl_mulai_cb'].'</td>
                        </tr>
                        <tr>
                            <td width="15%"> Tanggal Selesai </td>
                            <td width="1%">:</td>
                            <td>'.$row['tgl_selesai_cb'].'</td>
                        </tr>
                        <tr>
                            <td width="15%"> Percobaan Ke</td>
                            <td width="1%">:</td>
                            <td>'.$row['percobaan_cb'].'</td>
                        </tr>
                        <tr>
                            <td width="15%"> Catatan HR/GA </td>
                            <td width="1%">:</td>
                            <td>'.$row['catatan_hr_cb'].'</td>
                        </tr>
                        <tr>
                            <td width="15%"> Catatan Atasan </td>
                            <td width="1%">:</td>
                            <td>'.$row['catatan_atasan_cb'].'</td>
                        </tr>
                    </tbody>             
                </table>

                <p>Harap diisi penilaian terhadap karyawan Saudara dan dikembalikan ke bagian HRG setelah selesai dilakukan penilaian.</p>
                <p>Penilaian dilakukan berdasarkan kriteria di bawah ini :</p>
    
                <table border="0.5">
                    <tr>
                        <td width="20px" align="center" rowspan="2"><b>NO</b></td>
                        <td width="150px" align="center" rowspan="2"><b>KRITERIA</b></td>
                        <td width="100px" align="center" colspan="5"><b>KATEGORI</b></td>   
                        <td width="200px" align="center" rowspan="2"><b>KETERANGAN</b></td>
                    </tr>
                    <tr>
                        <td align="center">0</td>
                        <td align="center">1</td>
                        <td align="center">2</td>
                        <td align="center">3</td>
                        <td align="center">4</td>
                    </tr>
                    <tr>
                        <td align="center"><b>A</b></td>
                        <td> <b>GENERAL</b></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td align="center">1</td>
                        <td> Disiplin</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td align="center">2</td>
                        <td> Integritas</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td align="center">3</td>
                        <td> Komunikasi</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td align="center">4</td>
                        <td> Disiplin</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td align="center">5</td>
                        <td> Integritas</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td align="center">6</td>
                        <td> Komunikasi</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td align="center">7</td>
                        <td> Disiplin</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td align="center"><b>B</b></td>
                        <td> <b>OBJECTIVES</b></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td align="center">1</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td align="center">2</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td align="center">3</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="8"><b>  Dikembalikan he HRD Tanggal:</b></td>
                    </tr>
                </table>
    
                <p>Berdasarkan hasil penilaian selama masa percobaan :</p>
                <table>
                    <tbody>
                        <tr>
                            <td><b>Kesimpulan User :</b> </td>
                        </tr>
                        <tr>
                            <td>1.  Karyawan LULUS masa percobaan.</td>
                        </tr>
                        <tr>
                            <td>2.  Karyawan LULUS masa percobaan dan diangkat menjadi karyawan tetap.</td>
                        </tr>
                        <tr>
                            <td>3.  Karyawan LULUS masa percobaan dengan kontrak 1 (satu) tahun</td>
                        </tr>
                        <tr>
                            <td>4.  Masa percobaan diperpanjang 3 (tiga) / 6 (enam) / 12 (dua belas) *) bulan</td>
                        </tr>
                        <tr>
                            <td>5.  Karyawan TIDAK LULUS masa percobaan.</td>
                        </tr>
                        <tr>
                            <td></td>
                        </tr>
                        <tr>
                            <td><b>Kesimpulan HR & GA :</b> </td>
                        </tr>
                        <tr>
                            <td>1.  Karyawan LULUS masa percobaan.</td>
                        </tr>
                        <tr>
                            <td>2.  Karyawan LULUS masa percobaan dan diangkat menjadi karyawan tetap.</td>
                        </tr>
                        <tr>
                            <td>3.  Karyawan LULUS masa percobaan dengan kontrak 1 (satu) tahun</td>
                        </tr>
                        <tr>
                            <td>4.  Masa percobaan diperpanjang 3 (tiga) / 6 (enam) / 12 (dua belas) *) bulan</td>
                        </tr>
                        <tr>
                            <td>5.  Karyawan TIDAK LULUS masa percobaan.</td>
                        </tr>
                    </tbody>
                </table>
    
                <p><b>Catatan HR & GA:</b></p>
                <p>...................................................................................................</p>
                <p ><b>Catatan Atasan Langsung:</b></p>
                <p>...................................................................................................</p>
            
                <p>Jakarta, ...................., 2018</p>
                <table>
                    <tr>
                        <td align="center">Penilai, <br>Atasan Langsung</td>
                        <td align="center">Mengetahui, <br>Karyawan</td>
                        <td align="center">Catatan Tidak Langsung</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td align="center">(..................................)</td>
                        <td align="center">(..................................)</td>
                        <td align="center">(..................................)</td>
                    </tr>
                </table>
    
                <p><b>Catatan : </b></p>
                <p>1. Objectives diisi oleh atasan langsung disesuaikan dengan pekerjaan masing-masing karyawan. Khusus untuk tim sales salah satu isi dari objectives adalah sales achievement.</p>
                <p>2. Kriteria pengisian untuk penilaian adalah sebagai berikut : </p>
        
                <table border="0.5">
                    <tr>
                        <td style="width:20px" align="center">4</td>
                        <td style="width:600px"> <b>Sangat Baik :</b> Secara keseluruhan kinerja Karyawan istimewa dan melampaui standard/target yang diberikan. Berjasa memberi nilai tambah suatu hasil nilai kerja, menghasilkan karya yang meningkatkan produktifitas/kualitas secara nyata.</td>
                    </tr>
                    <tr>
                        <td style="width:20px" align="center">3</td>
                        <td style="width:600px"> <b>Baik :</b>  Kinerja Karyawan sesuai/sedikit di atas standard/target yang ditetapkan. Target terlampaui. Bisa diandalkan dan diberi tanggung jawab lebih.</td>
                    </tr>
                    <tr>
                        <td style="width:20px" align="center">2</td>
                        <td style="width:600px"> <b>Cukup :</b> Kinerja Karyawan sedikit di bawah standard. Beberapa target tidak tercapai. Masih memerlukan bantuan/arahan/bimbingan.</td>
                    </tr>
                    <tr>
                        <td style="width:20px" align="center">1</td>
                        <td style="width:600px"> <b>Sangat Kurang :</b> Kinerja Karyawan di bawah standard, hampir tidak memenuhi semua standard/target kerja. Membutuhkan bantuan/bimbingan/arahan yang sangat intensif.</td>
                    </tr>
                    <tr>
                        <td style="width:20px" align="center">0</td>
                        <td style="width:600px"> <b>Buruk :</b> Kinerja karyawan jauh di bawah standard, tidak memenuhi semua standard/target kerja. Kinerja karyawan perlu di tinjau kembali..</td>
                    </tr>
                </table>
                <p style="font-color:red";>*) Lingkari yang dipilih</p>
            ';

            $html.='<p>AST-CRM-HRG-024 Rev. 02 10-03-2017 | '.date("d-m-Y", time()) .'</p>';
        
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 0, 0, true, '', true);
        ob_end_clean();
        $pdf->Output('form_percobaan'.date("d-m-Y", time()) .'.pdf','I');
    }

    public function form_percobaan_id($id_cb){

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        // document informasi
        $pdf->SetCreator('PT. Astrindo Senayasa');
        $pdf->SetTitle('Laporan Data Karyawan');
        $pdf->SetSubject('Karyawan Percobaan');
        //header Data
        $pdf->SetHeaderData('logo.jpg',30,'PT. Astrindo Senayasa','Mangga Dua Square Blok G 24, Jalan Gunung Sahari Raya, Pademangan, RT.12/RW.6, Jakarta Utara, Daerah Khusus Ibukota Jakarta.',array(0, 0, 0),array(0, 0, 0));
        $pdf->SetFooterData('AST-CRM-HRG-024 Rev. 02 10-03-2017',array(0, 0, 0), array(0, 0, 0));
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        //set margin
        $pdf->SetMargins(PDF_MARGIN_LEFT,PDF_MARGIN_TOP - 6,PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $pdf->SetAutoPageBreak(FALSE, PDF_MARGIN_BOTTOM - 5);
        //SET Scaling ImagickPixel
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        //FONT Subsetting
        $pdf->setFontSubsetting(true);
        $pdf->SetFont('helvetica','',6,'',true);
        $pdf->AddPage('P');

        $where = array('id_cb' => $id_cb);
        $percobaannya = $this->Md_percobaan->print_id($id_cb);
        foreach ($percobaannya as $row) 
    
            $html='
                <br>
                <h3 align="center">FORM PENILAIAN MASA PERCOBAAN <br><span>( Operator / Staff )</span></h3>
                <br><br><br><br>
                <table>
                    <tbody>
                        <tr>
                            <td width="15%"> Nama Lengkap </td>
                            <td width="1%">:</td>
                            <td>'.$row['nama_cb'].'</td>
                        </tr>
                        <tr>
                            <td width="15%"> NIK </td>
                            <td width="1%">:</td>
                            <td>'.$row['nik_cb'].'</td>
                        </tr>
                        <tr>
                            <td width="15%"> Departemen</td>
                            <td width="1%">:</td>
                            <td>'.$row['dep_cb'].'</td>
                        </tr>
                        <tr>
                            <td width="15%"> Jabatan </td>
                            <td width="1%">:</td>
                            <td>'.$row['jabatan_cb'].'</td>
                        </tr>
                        <tr>
                            <td width="15%"> Tanggal Masuk </td>
                            <td width="1%">:</td>
                            <td>'.$row['tgl_masuk_cb'].'</td>
                        </tr>
                        <tr>
                            <td width="15%"> Jenis Percobaan</td>
                            <td width="1%">:</td>
                            <td>'.$row['jenis_cb'].'</td>
                        </tr>
                        <tr>
                            <td width="15%"> Tanggal Mulai </td>
                            <td width="1%">:</td>
                            <td>'.$row['tgl_mulai_cb'].'</td>
                        </tr>
                        <tr>
                            <td width="15%"> Tanggal Selesai </td>
                            <td width="1%">:</td>
                            <td>'.$row['tgl_selesai_cb'].'</td>
                        </tr>
                        <tr>
                            <td width="15%"> Percobaan Ke</td>
                            <td width="1%">:</td>
                            <td>'.$row['percobaan_cb'].'</td>
                        </tr>
                        <tr>
                            <td width="15%"> Catatan HR/GA </td>
                            <td width="1%">:</td>
                            <td>'.$row['catatan_hr_cb'].'</td>
                        </tr>
                        <tr>
                            <td width="15%"> Catatan Atasan </td>
                            <td width="1%">:</td>
                            <td>'.$row['catatan_atasan_cb'].'</td>
                        </tr>
                    </tbody>             
                </table>

                <p>Harap diisi penilaian terhadap karyawan Saudara dan dikembalikan ke bagian HRG setelah selesai dilakukan penilaian.</p>
                <p>Penilaian dilakukan berdasarkan kriteria di bawah ini :</p>
    
                <table border="0.5">
                    <tr>
                        <td width="20px" align="center" rowspan="2"><b>NO</b></td>
                        <td width="150px" align="center" rowspan="2"><b>KRITERIA</b></td>
                        <td width="100px" align="center" colspan="5"><b>KATEGORI</b></td>   
                        <td width="200px" align="center" rowspan="2"><b>KETERANGAN</b></td>
                    </tr>
                    <tr>
                        <td align="center">0</td>
                        <td align="center">1</td>
                        <td align="center">2</td>
                        <td align="center">3</td>
                        <td align="center">4</td>
                    </tr>
                    <tr>
                        <td align="center"><b>A</b></td>
                        <td> <b>GENERAL</b></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td align="center">1</td>
                        <td> Disiplin</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td align="center">2</td>
                        <td> Integritas</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td align="center">3</td>
                        <td> Komunikasi</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td align="center">4</td>
                        <td> Disiplin</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td align="center">5</td>
                        <td> Integritas</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td align="center">6</td>
                        <td> Komunikasi</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td align="center">7</td>
                        <td> Disiplin</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td align="center"><b>B</b></td>
                        <td> <b>OBJECTIVES</b></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td align="center">1</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td align="center">2</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td align="center">3</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="8"><b>  Dikembalikan he HRD Tanggal:</b></td>
                    </tr>
                </table>
    
                <p>Berdasarkan hasil penilaian selama masa percobaan :</p>
                <table>
                    <tbody>
                        <tr>
                            <td><b>Kesimpulan User :</b> </td>
                        </tr>
                        <tr>
                            <td>1.  Karyawan LULUS masa percobaan.</td>
                        </tr>
                        <tr>
                            <td>2.  Karyawan LULUS masa percobaan dan diangkat menjadi karyawan tetap.</td>
                        </tr>
                        <tr>
                            <td>3.  Karyawan LULUS masa percobaan dengan kontrak 1 (satu) tahun</td>
                        </tr>
                        <tr>
                            <td>4.  Masa percobaan diperpanjang 3 (tiga) / 6 (enam) / 12 (dua belas) *) bulan</td>
                        </tr>
                        <tr>
                            <td>5.  Karyawan TIDAK LULUS masa percobaan.</td>
                        </tr>
                        <tr>
                            <td></td>
                        </tr>
                        <tr>
                            <td><b>Kesimpulan HR & GA :</b> </td>
                        </tr>
                        <tr>
                            <td>1.  Karyawan LULUS masa percobaan.</td>
                        </tr>
                        <tr>
                            <td>2.  Karyawan LULUS masa percobaan dan diangkat menjadi karyawan tetap.</td>
                        </tr>
                        <tr>
                            <td>3.  Karyawan LULUS masa percobaan dengan kontrak 1 (satu) tahun</td>
                        </tr>
                        <tr>
                            <td>4.  Masa percobaan diperpanjang 3 (tiga) / 6 (enam) / 12 (dua belas) *) bulan</td>
                        </tr>
                        <tr>
                            <td>5.  Karyawan TIDAK LULUS masa percobaan.</td>
                        </tr>
                    </tbody>
                </table>
    
                <p><b>Catatan HR & GA:</b></p>
                <p>...................................................................................................</p>
                <p ><b>Catatan Atasan Langsung:</b></p>
                <p>...................................................................................................</p>
            
                <p>Jakarta, ...................., 2018</p>
                <table>
                    <tr>
                        <td align="center">Penilai, <br>Atasan Langsung</td>
                        <td align="center">Mengetahui, <br>Karyawan</td>
                        <td align="center">Catatan Tidak Langsung</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td align="center">(..................................)</td>
                        <td align="center">(..................................)</td>
                        <td align="center">(..................................)</td>
                    </tr>
                </table>
    
                <p><b>Catatan : </b></p>
                <p>1. Objectives diisi oleh atasan langsung disesuaikan dengan pekerjaan masing-masing karyawan. Khusus untuk tim sales salah satu isi dari objectives adalah sales achievement.</p>
                <p>2. Kriteria pengisian untuk penilaian adalah sebagai berikut : </p>
        
                <table border="0.5">
                    <tr>
                        <td style="width:20px" align="center">4</td>
                        <td style="width:600px"> <b>Sangat Baik :</b> Secara keseluruhan kinerja Karyawan istimewa dan melampaui standard/target yang diberikan. Berjasa memberi nilai tambah suatu hasil nilai kerja, menghasilkan karya yang meningkatkan produktifitas/kualitas secara nyata.</td>
                    </tr>
                    <tr>
                        <td style="width:20px" align="center">3</td>
                        <td style="width:600px"> <b>Baik :</b>  Kinerja Karyawan sesuai/sedikit di atas standard/target yang ditetapkan. Target terlampaui. Bisa diandalkan dan diberi tanggung jawab lebih.</td>
                    </tr>
                    <tr>
                        <td style="width:20px" align="center">2</td>
                        <td style="width:600px"> <b>Cukup :</b> Kinerja Karyawan sedikit di bawah standard. Beberapa target tidak tercapai. Masih memerlukan bantuan/arahan/bimbingan.</td>
                    </tr>
                    <tr>
                        <td style="width:20px" align="center">1</td>
                        <td style="width:600px"> <b>Sangat Kurang :</b> Kinerja Karyawan di bawah standard, hampir tidak memenuhi semua standard/target kerja. Membutuhkan bantuan/bimbingan/arahan yang sangat intensif.</td>
                    </tr>
                    <tr>
                        <td style="width:20px" align="center">0</td>
                        <td style="width:600px"> <b>Buruk :</b> Kinerja karyawan jauh di bawah standard, tidak memenuhi semua standard/target kerja. Kinerja karyawan perlu di tinjau kembali..</td>
                    </tr>
                </table>
                <p style="font-color:red";>*) Lingkari yang dipilih</p>
            ';

            $html.='<p>AST-CRM-HRG-024 Rev. 02 10-03-2017 | '.date("d-m-Y", time()) .'</p>';
        
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 0, 0, true, '', true);
        ob_end_clean();
        $pdf->Output('form_percobaan'.date("d-m-Y", time()) .'.pdf','I');
    }

    public function print_percobaan(){
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        // document informasi
        $pdf->SetCreator('PT. Astrindo Senayasa');
        $pdf->SetTitle('Laporan Data Karyawan');
        $pdf->SetSubject('Karyawan Percobaan');
        //header Data
        $pdf->SetHeaderData('logo.jpg',30,'PT. Astrindo Senayasa','Mangga Dua Square Blok G 24, Jalan Gunung Sahari Raya, Pademangan, RT.12/RW.6, Jakarta Utara, Daerah Khusus Ibukota Jakarta.',array(0, 0, 0),array(0, 0, 0));
        $pdf->SetFooterData(array(255, 255, 255), array(255, 255, 255));
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        //set margin
        $pdf->SetMargins(PDF_MARGIN_LEFT,PDF_MARGIN_TOP - 6,PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $pdf->SetAutoPageBreak(FALSE, PDF_MARGIN_BOTTOM - 5);
        //SET Scaling ImagickPixel
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        //FONT Subsetting
        $pdf->setFontSubsetting(true);
        $pdf->SetFont('helvetica','',6,'',true);
        $pdf->AddPage('P');
        $i=0;
            
            $html='<h3>Data Karyawan Percobaan</h3>
                    <table border="0.5" bgcolor="#666666" cellpadding="2" position: relative;>
                        <tr align="center" bgcolor="#ffffff">
                            <th width="3%">No</th>
                            <th width="15%">Nama Pemohon</th>
                            <th width="6%">NIK</th>
                            <th>Departemen</th>
                            <th>Jabatan</th>
                            <th width="8%">Tgl Masuk</th>
                            <th>Jenis</th>
                            <th width="8%">Tgl Mulai</th>
                            <th width="8%">Tgl Selesai</th>
                            <th>Percobaan</th>
                            <th>Catatan HR/GA</th>
                            <th>Catatan Atasan</th>
                        </tr>';
            $percobaan = $this->Md_percobaan->print();
            foreach ($percobaan as $row) 
                {
                    $i++;
                    $html.='<tr bgcolor="#ffffff">
                            <td align="center">'.$i.'</td>
                            <td>'.$row['nama_cb'].'</td>
                            <td align="center"> '.$row['nik_cb'].'</td>
                            <td> '.$row['dep_cb'].'</td>
                            <td> '.$row['jabatan_cb'].'</td>
                            <td align="center">'.$row['tgl_masuk_cb'].'</td>
                            <td>'.$row['jenis_cb'].'</td>
                            <td align="center">'.$row['tgl_mulai_cb'].'</td>
                            <td align="center">'.$row['tgl_selesai_cb'].'</td>
                            <td> '.$row['percobaan_cb'].'</td>
                            <td> '.$row['catatan_hr_cb'].'</td>
                            <td> '.$row['catatan_atasan_cb'].'</td>
                        </tr>';
                }
            $html.='</table>';

            $html.='<p>AST-CRM-HRG-024 Rev. 02 10-03-2017 | '.date("d-m-Y", time()) .'</p>';
            $pdf->writeHTML($html, true, false, true, false, '');
            ob_end_clean();
            $pdf->Output('laporan_percobaan'.date("d-m-Y", time()) .'.pdf', 'I');
    }
    // =========================================== PRINT PERCOBAAN END =========================================== //

    // =========================================== PRINT PENILAIAN START =========================================== //
    public function form_penilaian()
    {
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        // document informasi
        $pdf->SetCreator('PT. Astrindo Senayasa');
        $pdf->SetTitle('Laporan Data Karyawan');
        $pdf->SetSubject('Karyawan penilaian');
        //header Data
        $pdf->SetHeaderData('logo.jpg',30,'PT. Astrindo Senayasa','Mangga Dua Square Blok G 24, Jalan Gunung Sahari Raya, Pademangan, RT.12/RW.6, Jakarta Utara, Daerah Khusus Ibukota Jakarta.',array(0, 0, 0),array(0, 0, 0));
        $pdf->SetFooterData(array(255, 255, 255), array(255, 255, 255));
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        //set margin
        $pdf->SetMargins(PDF_MARGIN_LEFT,PDF_MARGIN_TOP - 6,PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $pdf->SetAutoPageBreak(FALSE, PDF_MARGIN_BOTTOM - 5);
        //SET Scaling ImagickPixel
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        //FONT Subsetting
        $pdf->setFontSubsetting(true);
        $pdf->SetFont('helvetica','',6,'',true);
        $pdf->AddPage('P');
        
        $html=
        '<div>
            <h1 align="center">FORM PENILAIAN TAHUNAN KARYAWAN</h1>
            <table>
                <tbody>
                    <tr>
                        <td width="20%"> Nama Lengkap </td>
                        <td width="1%">:</td>
                        <td>.....................................................................</td>
                    </tr>
                    <tr>
                        <td width="20%"> NIK </td>
                        <td width="1%">:</td>
                        <td>.....................................................................</td>
                    </tr>
                    <tr>
                        <td width="20%"> Departemen</td>
                        <td width="1%">:</td>
                        <td>.....................................................................</td>
                    </tr>
                    <tr>
                        <td width="20%"> Tanggal Masuk </td>
                        <td width="1%">:</td>
                        <td>.....................................................................</td>
                    </tr>
                    <tr>
                        <td width="20%"> Jabatan </td>
                        <td width="1%">:</td>
                        <td>.....................................................................</td>
                    </tr>
                    <tr>
                        <td width="20%"> Penilai (Atasan Langsung)</td>
                        <td width="1%">:</td>
                        <td>.....................................................................</td>
                    </tr>
                    <tr>
                        <td width="20%"> Jabatan Penilai</td>
                        <td width="1%">:</td>
                        <td>.....................................................................</td>
                    </tr>
                </tbody>
            </table>

            <p><b>PETUNJUK PENILAIAN</b></p>
            <p>Nilai dibawah ini digunakan untuk Penilaian Karyawan:</p>
            <table>
                <tr>
                    <td style="width:20px" align="center">4</td>
                    <td style="width:600px"> <b>Sangat Baik :</b> Secara keseluruhan kinerja Karyawan istimewa dan melampaui standard/target yang diberikan. Berjasa memberi nilai tambah suatu hasil nilai kerja, menghasilkan karya yang meningkatkan produktifitas/kualitas secara nyata.</td>
                </tr>
                <tr>
                    <td style="width:20px" align="center">3</td>
                    <td style="width:600px"> <b>Baik :</b>  Kinerja Karyawan sesuai/sedikit di atas standard/target yang ditetapkan. Target terlampaui. Bisa diandalkan dan diberi tanggung jawab lebih.</td>
                </tr>
                <tr>
                    <td style="width:20px" align="center">2</td>
                    <td style="width:600px"> <b>Cukup :</b> Kinerja Karyawan sedikit di bawah standard. Beberapa target tidak tercapai. Masih memerlukan bantuan/arahan/bimbingan.</td>
                </tr>
                <tr>
                    <td style="width:20px" align="center">1</td>
                    <td style="width:600px"> <b>Sangat Kurang :</b> Kinerja Karyawan di bawah standard, hampir tidak memenuhi semua standard/target kerja. Membutuhkan bantuan/bimbingan/arahan yang sangat intensif.</td>
                </tr>
                <tr>
                    <td style="width:20px" align="center">-1</td>
                    <td style="width:600px"> <b>Buruk :</b> Kinerja karyawan jauh di bawah standard, tidak memenuhi semua standard/target kerja. Kinerja karyawan perlu di tinjau kembali.</td>
                </tr>
            </table>

            <p><b>A. General Kriteria</b></p>
            <p style="font-size: 6px;">Dibawah ini adalah beberapa hal yang harus diperhatikan oleh semua karyawan. Berikan penilaian Anda sebagai Karyawan lalu diskusikan dengan Ataan Anda
            sampai menghasilkan nilai akhir yang disetujui kedua belah pihak. Atasan memberikan umpan balik bila ada. Bobot bagian ini adalah 40%.</p>

            <table border="0.5">
                <tr>
                    <td width="20px" align="center" rowspan="2"><b>No</b></td>
                    <td width="510px" align="center" rowspan="2"><br><b>General Kriteria</b></td>
                    <td width="90px" align="center" colspan="2"><b>Nilai</b></td>   
                </tr>
                <tr>
                    <td align="center" valign="middle">Karyawan</td>
                    <td align="center" >Atasan <br>Langsung</td>
                </tr>
                <tr>
                    <td align="center">1</td>
                    <td> <b>INTEGRITAS</b><br> Kejujuran dalam melaksanakan tugas & tanggung jawab termasuk didalamnya kosistensi & tidak melakukan kecurangan yang dapat merugikan  perusahaan <i><br style="font-size: 6px;"> 
                    Sebutkan 3 implementasi yang telah dilakukan untuk hal tersebut diatas.</i> <br> 1. <br> 2. <br> 3.</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">2</td>
                    <td> <b>KOMUNIKASI</b><br> Kemampuan untuk menyampaikan berbagai hal yang menyangkut pekerjaan & berinteraksi secara jelas serta dapat dipahami oleh semua pihak <i><br style="font-size: 6px;">
                    Sebutkan 3 implementasi yang telah dilakukan untuk hal tersebut diatas.</i> <br> 1. <br> 2. <br> 3.</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td rowspan="2" align="center">3</td>
                    <td> <b>KEMAMPUAN MEMECAHKAN MASALAH & MEMBUAT KEPUTUSAN</b><br> a. menganalisa, menangani, dan memecahkan masalah-masalah sulit <i><br style="font-size: 6px;"> 
                    Sebutkan 3 implementasi yang telah dilakukan untuk hal tersebut diatas.</i>. <br> a.1. <br> a.2. <br> a.3.</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td> b. membuat keputusan <br>
                    Sebutkan 3 implementasi yang telah dilakukan untuk hal tersebut diatas.<br> b.1. <br> b.2. <br> b.3.</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td rowspan="2" align="center">4</td>
                    <td> <b>KERJASAMA</b><br> a. kemampuan untuk kerjasama dengan intern dept <i><br style="font-size: 6px;"> 
                    Sebutkan 3 implementasi yang telah dilakukan untuk hal tersebut diatas.</i> <br> a.1. <br> a.2. <br> a.3.</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td> b. kemampuan untuk kerjasama dengan intra dept <i><br style="font-size: 6px;"> 
                    Sebutkan 3 implementasi yang telah dilakukan untuk hal tersebut diatas.</i> <br> b.1. <br> b.2. <br> b.3.</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">5</td>
                    <td> <b>INISIATIF</b><br> Melakukan pengembangan terhadap hal-hal yang sudah menjadi lebih efektif & efisien <i><br style="font-size: 6px;"> 
                    Sebutkan 3 implementasi yang telah dilakukan untuk hal tersebut diatas.</i> <br> 1. <br> 2. <br> 3.</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td rowspan="2" align="center">6</td>
                    <td> <b>INOVASI</b><br> Mencipatakan ide-ide baru yang belum pernah ada sebelumnya <i><br style="font-size: 6px;"> 
                    Sebutkan 3 implementasi yang telah dilakukan untuk hal tersebut diatas.</i> <br> a.1. <br> a.2. <br> a.3.</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td> b. pelaksanaan atas ide baru <i><br style="font-size: 6px;"> 
                    Sebutkan 3 implementasi yang telah dilakukan untuk hal tersebut diatas.</i> <br> b.1. <br> b.2. <br> b.3.</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">7</td>
                    <td> <b>DISIPLIN</b><br> Penilaian dilakukan terhadap perilaku Karyawan dalam memenuhi standar yang ditetapkan Perusahaan
                    sebagaimana tercantum dalam peraturan Perusahaan maupun aturan lain yang berlaku di Perusahaan, Misal: penilaian mengenai hari
                    produktif dan ketepatan waktu yang ditunjukan Karyawan berdasarkan catatan waktu, kepatuhan terhadap peraturan Perusahaan. <i><br style="font-size: 6px;"> 
                    Sebutkan 3 implementasi yang telah dilakukan untuk hal tersebut diatas.</i> <br> 1. <br> 2. <br> 3. </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td align="center">8</td>
                    <td> <b>LAPORAN</b><br> Menyampaikan laporan kerjasama secara: <i><br style="font-size: 6px;"> 
                    Sebutkan 3 implementasi yang telah dilakukan untuk hal tersebut diatas.</i> <br> 1. <br> 2. <br> 3. </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="2"><b> Total Nilai:</b></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="2"><b> Rata-Rata Nilai:</b></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
        </div>';

        $html.='<p>AST-CRM-HRG-024 Rev. 02 10-03-2017 | '.date("d-m-Y", time()) .'</p>';
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 0, 0, true, '', true);
        $pdf->Output('form_penilaian'.date("d-m-Y", time()) .'.pdf','I');
    }

    public function form_penilaian_id($id_nl)
    {
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        // document informasi
        $pdf->SetCreator('PT. Astrindo Senayasa');
        $pdf->SetTitle('Laporan Data Karyawan');
        $pdf->SetSubject('Karyawan penilaian');
        //header Data
        $pdf->SetHeaderData('logo.jpg',30,'PT. Astrindo Senayasa','Mangga Dua Square Blok G 24, Jalan Gunung Sahari Raya, Pademangan, RT.12/RW.6, Jakarta Utara, Daerah Khusus Ibukota Jakarta.',array(0, 0, 0),array(0, 0, 0));
        $pdf->SetFooterData(array(255, 255, 255), array(255, 255, 255));
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        //set margin
        $pdf->SetMargins(PDF_MARGIN_LEFT,PDF_MARGIN_TOP - 6,PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $pdf->SetAutoPageBreak(FALSE, PDF_MARGIN_BOTTOM - 5);
        //SET Scaling ImagickPixel
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        //FONT Subsetting
        $pdf->setFontSubsetting(true);
        $pdf->SetFont('helvetica','',6,'',true);
        $pdf->AddPage('P');

        $where = array('id_nl' => $id_nl);
        $penilaiannya = $this->Md_penilaian->print_id($id_nl);
        foreach ($penilaiannya as $row)
        
            $html=
            '<div>
                <h1 align="center">FORM PENILAIAN TAHUNAN KARYAWAN</h1>
                <table>
                    <tbody>
                        <tr>
                            <td width="20%"> Nama Lengkap </td>
                            <td width="1%">:</td>
                            <td>'.$row['nama_nl'].'</td>
                        </tr>
                        <tr>
                            <td width="20%"> NIK </td>
                            <td width="1%">:</td>
                            <td>'.$row['nik_nl'].'</td>
                        </tr>
                        <tr>
                            <td width="20%"> Departemen</td>
                            <td width="1%">:</td>
                            <td>'.$row['dep_nl'].'</td>
                        </tr>
                        <tr>
                            <td width="20%"> Tanggal Masuk </td>
                            <td width="1%">:</td>
                            <td>'.$row['tgl_masuk_nl'].'</td>
                        </tr>
                        <tr>
                            <td width="20%"> Jabatan </td>
                            <td width="1%">:</td>
                            <td>'.$row['jabatan_nl'].'</td>
                        </tr>
                        <tr>
                            <td width="20%"> Penilai (Atasan Langsung)</td>
                            <td width="1%">:</td>
                            <td>'.$row['nama_penilai_nl'].'</td>
                        </tr>
                        <tr>
                            <td width="20%"> Jabatan Penilai</td>
                            <td width="1%">:</td>
                            <td>'.$row['jabatan_penilai_nl'].'</td>
                        </tr>
                    </tbody>
                </table>

                <p><b>PETUNJUK PENILAIAN</b></p>
                <p>Nilai dibawah ini digunakan untuk Penilaian Karyawan:</p>
                <table>
                    <tr>
                        <td style="width:20px" align="center">4</td>
                        <td style="width:600px"> <b>Sangat Baik :</b> Secara keseluruhan kinerja Karyawan istimewa dan melampaui standard/target yang diberikan. Berjasa memberi nilai tambah suatu hasil nilai kerja, menghasilkan karya yang meningkatkan produktifitas/kualitas secara nyata.</td>
                    </tr>
                    <tr>
                        <td style="width:20px" align="center">3</td>
                        <td style="width:600px"> <b>Baik :</b>  Kinerja Karyawan sesuai/sedikit di atas standard/target yang ditetapkan. Target terlampaui. Bisa diandalkan dan diberi tanggung jawab lebih.</td>
                    </tr>
                    <tr>
                        <td style="width:20px" align="center">2</td>
                        <td style="width:600px"> <b>Cukup :</b> Kinerja Karyawan sedikit di bawah standard. Beberapa target tidak tercapai. Masih memerlukan bantuan/arahan/bimbingan.</td>
                    </tr>
                    <tr>
                        <td style="width:20px" align="center">1</td>
                        <td style="width:600px"> <b>Sangat Kurang :</b> Kinerja Karyawan di bawah standard, hampir tidak memenuhi semua standard/target kerja. Membutuhkan bantuan/bimbingan/arahan yang sangat intensif.</td>
                    </tr>
                    <tr>
                        <td style="width:20px" align="center">-1</td>
                        <td style="width:600px"> <b>Buruk :</b> Kinerja karyawan jauh di bawah standard, tidak memenuhi semua standard/target kerja. Kinerja karyawan perlu di tinjau kembali.</td>
                    </tr>
                </table>

                <p><b>A. General Kriteria</b></p>
                <p style="font-size: 6px;">Dibawah ini adalah beberapa hal yang harus diperhatikan oleh semua karyawan. Berikan penilaian Anda sebagai Karyawan lalu diskusikan dengan Ataan Anda
                sampai menghasilkan nilai akhir yang disetujui kedua belah pihak. Atasan memberikan umpan balik bila ada. Bobot bagian ini adalah 40%.</p>

                <table border="0.5">
                    <tr>
                        <td width="20px" align="center" rowspan="2"><b>No</b></td>
                        <td width="510px" align="center" rowspan="2"><br><b>General Kriteria</b></td>
                        <td width="90px" align="center" colspan="2"><b>Nilai</b></td>   
                    </tr>
                    <tr>
                        <td align="center" valign="middle">Karyawan</td>
                        <td align="center" >Atasan <br>Langsung</td>
                    </tr>
                    <tr>
                        <td align="center">1</td>
                        <td> <b>INTEGRITAS</b><br> Kejujuran dalam melaksanakan tugas & tanggung jawab termasuk didalamnya kosistensi & tidak melakukan kecurangan yang dapat merugikan  perusahaan <i><br style="font-size: 6px;"> 
                        Sebutkan 3 implementasi yang telah dilakukan untuk hal tersebut diatas.</i> <br> 1. <br> 2. <br> 3.</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td align="center">2</td>
                        <td> <b>KOMUNIKASI</b><br> Kemampuan untuk menyampaikan berbagai hal yang menyangkut pekerjaan & berinteraksi secara jelas serta dapat dipahami oleh semua pihak <i><br style="font-size: 6px;">
                        Sebutkan 3 implementasi yang telah dilakukan untuk hal tersebut diatas.</i> <br> 1. <br> 2. <br> 3.</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td rowspan="2" align="center">3</td>
                        <td> <b>KEMAMPUAN MEMECAHKAN MASALAH & MEMBUAT KEPUTUSAN</b><br> a. menganalisa, menangani, dan memecahkan masalah-masalah sulit <i><br style="font-size: 6px;"> 
                        Sebutkan 3 implementasi yang telah dilakukan untuk hal tersebut diatas.</i>. <br> a.1. <br> a.2. <br> a.3.</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td> b. membuat keputusan <br>
                        Sebutkan 3 implementasi yang telah dilakukan untuk hal tersebut diatas.<br> b.1. <br> b.2. <br> b.3.</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td rowspan="2" align="center">4</td>
                        <td> <b>KERJASAMA</b><br> a. kemampuan untuk kerjasama dengan intern dept <i><br style="font-size: 6px;"> 
                        Sebutkan 3 implementasi yang telah dilakukan untuk hal tersebut diatas.</i> <br> a.1. <br> a.2. <br> a.3.</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td> b. kemampuan untuk kerjasama dengan intra dept <i><br style="font-size: 6px;"> 
                        Sebutkan 3 implementasi yang telah dilakukan untuk hal tersebut diatas.</i> <br> b.1. <br> b.2. <br> b.3.</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td align="center">5</td>
                        <td> <b>INISIATIF</b><br> Melakukan pengembangan terhadap hal-hal yang sudah menjadi lebih efektif & efisien <i><br style="font-size: 6px;"> 
                        Sebutkan 3 implementasi yang telah dilakukan untuk hal tersebut diatas.</i> <br> 1. <br> 2. <br> 3.</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td rowspan="2" align="center">6</td>
                        <td> <b>INOVASI</b><br> Mencipatakan ide-ide baru yang belum pernah ada sebelumnya <i><br style="font-size: 6px;"> 
                        Sebutkan 3 implementasi yang telah dilakukan untuk hal tersebut diatas.</i> <br> a.1. <br> a.2. <br> a.3.</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td> b. pelaksanaan atas ide baru <i><br style="font-size: 6px;"> 
                        Sebutkan 3 implementasi yang telah dilakukan untuk hal tersebut diatas.</i> <br> b.1. <br> b.2. <br> b.3.</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td align="center">7</td>
                        <td> <b>DISIPLIN</b><br> Penilaian dilakukan terhadap perilaku Karyawan dalam memenuhi standar yang ditetapkan Perusahaan
                        sebagaimana tercantum dalam peraturan Perusahaan maupun aturan lain yang berlaku di Perusahaan, Misal: penilaian mengenai hari
                        produktif dan ketepatan waktu yang ditunjukan Karyawan berdasarkan catatan waktu, kepatuhan terhadap peraturan Perusahaan. <i><br style="font-size: 6px;"> 
                        Sebutkan 3 implementasi yang telah dilakukan untuk hal tersebut diatas.</i> <br> 1. <br> 2. <br> 3. </td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td align="center">8</td>
                        <td> <b>LAPORAN</b><br> Menyampaikan laporan kerjasama secara: <i><br style="font-size: 6px;"> 
                        Sebutkan 3 implementasi yang telah dilakukan untuk hal tersebut diatas.</i> <br> 1. <br> 2. <br> 3. </td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="2"><b> Total Nilai:</b></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="2"><b> Rata-Rata Nilai:</b></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
            </div>';

        $html.='<p>AST-CRM-HRG-024 Rev. 02 10-03-2017 | '.date("d-m-Y", time()) .'</p>';
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 0, 0, true, '', true);
        $pdf->Output('form_penilaian'.date("d-m-Y", time()) .'.pdf','I');
    }

    public function print_penilaian(){

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        // document informasi
        $pdf->SetCreator('PT. Astrindo Senayasa');
        $pdf->SetTitle('Laporan Data Karyawan');
        $pdf->SetSubject('Penilaian Karyawan');
        //header Data
        $pdf->SetHeaderData('logo.jpg',30,'PT. Astrindo Senayasa','Mangga Dua Square Blok G 24, Jalan Gunung Sahari Raya, Pademangan, RT.12/RW.6, Jakarta Utara, Daerah Khusus Ibukota Jakarta.',array(0, 0, 0),array(0, 0, 0));
        $pdf->SetFooterData(array(255, 255, 255), array(255, 255, 255));
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        //set margin
        $pdf->SetMargins(PDF_MARGIN_LEFT,PDF_MARGIN_TOP - 6,PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
        $pdf->SetAutoPageBreak(FALSE, PDF_MARGIN_BOTTOM - 5);
        //SET Scaling ImagickPixel
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        //FONT Subsetting
        $pdf->setFontSubsetting(true);
        $pdf->SetFont('helvetica','',6,'',true);
        $pdf->AddPage('P');
        $i=0;
            
            $html='<h3>Data Penilaian Karyawan</h3>
                    <table border="0.5" bgcolor="#666666" cellpadding="2">
                        <tr align="center" bgcolor="#ffffff">
                            <th width="3%">No</th>
                            <th width="17%">Nama Karyawan</th>
                            <th width="6%">NIK</th>
                            <th>Departemen</th>
                            <th width="8%">Tgl Masuk</th>
                            <th width="17%">Jabatan</th>
                            <th width="17%">Nama Penilai</th>
                            <th width="19%">Jabatan Penilai</th>
                        </tr>';
            $penilaian = $this->Md_penilaian->print();
            foreach ($penilaian as $row) 
                {
                    $i++;
                    $html.='<tr bgcolor="#ffffff">
                                <td align="center">'.$i.'</td>
                                <td>'.$row['nama_nl'].'</td>
                                <td align="center"> '.$row['nik_nl'].'</td>
                                <td align="center"> '.$row['dep_nl'].'</td>
                                <td align="center"> '.$row['tgl_masuk_nl'].'</td>
                                <td align="center">'.$row['jabatan_nl'].'</td>
                                <td>'.$row['nama_penilai_nl'].'</td>
                                <td>'.$row['jabatan_penilai_nl'].'</td>
                            </tr>';
                }
            $html.='</table>';
            $html.='<p>AST-CRM-HRG-024 Rev. 02 10-03-2017 | '.date("d-m-Y", time()) .'</p>';
        
            $pdf->writeHTML($html, true, false, true, false, '');
            ob_end_clean();
            $pdf->Output('laporan_penilaian'.date("d-m-Y", time()) .'.pdf', 'I');
    }
    // =========================================== PRINT PENILAIAN END =========================================== //
}?>
