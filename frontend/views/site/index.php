<?php
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
$this->title = 'Lowongan Kerja';
?>

<body>

    <h1 align="center">
      <font color="black"><b>
     <!--  <span class="site-heading-upper text-primary mb-3">Sistem Informasi Rekrutmen Dosen IT Del</span> -->
     Sistem Informasi Rekrutmen Dosen IT Del </font></b>
    </h1>

    <!-- Navigation -->
   <!--  <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
     
    </nav> -->

    <section class="page-section clearfix">
      <div class="container">
        <div class="intro">
          <img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src="hiasan/intro.jpg" alt="">
          <div class="intro-text left-0 text-center bg-faded p-5 rounded">
            <h2 class="section-heading mb-4">
             <!--  <span class="section-heading-upper">Fresh Coffee</span> -->
              <span class="section-heading-lower">IT Del</span>
            </h2>
            <p class="mb-3">Institut Teknologi Del (IT DEL) (Bahasa Inggris: Del Institute of Technology) adalah sebuah perguruan tinggi swasta yang berkedudukan di desa Sitoluama, Toba Samosir, Sumatera Utara, Indonesia. ITDEL didirikan oleh Luhut Binsar Panjaitan yang merupakan Menteri Perindustrian dan Perdagangan Republik Indonesia ke-28. ITDEL mulai melakukan kegiatan akademik pada tahun 2001 dan telah menamatkan 13 angkatan hingga saat ini pada Oktober 2016.
            </p>
            <!-- <div class="intro-button mx-auto">
              <a class="btn btn-primary btn-xl" href="#">Visit Us Today!</a>
            </div> -->
          </div>
        </div>
      </div>
    </section>
    <h1 style='text-align:center'><?= Html::encode($this->title) ?></h1>
    <div class="row">
      
            <div class="col-md-12">
                <?php
                if(count($dataProvider) == 0){
                    echo '<p class="alert-danger">Maaf lowongan kerja yang anda cari tidak tersedia.</p>';
                }
                foreach ($dataProvider as $dp)
                {
                    echo '<div class="box box-default">'
                        .'<div class="box-body">'
                        .'<div class="row">'
                        .'<div class="col-md-8">'
                        .'<h3>'
                        .'<strong>' .Html::encode($dp->idMatkul->nama_matkul) . '</strong>'
                        .'<br/>'
                        .'</h3>'
                        .'</div>'
                        .'<div class="col-md-4">'
                        .'<div class="col-md-12" align="right">'
                        .'<br/>'
                        . Html::a('Rincian', ['reqdosen/view', 'id' => $dp->id_request], ['class' => 'btn btn-primary'])
                        .'</div>'
                        .'<br/>'
                        .'</div>'
                        .'</div>';

                    echo '</div>'
                        .'</div>';
                        
                }

                ?>
            </div>
                </div>