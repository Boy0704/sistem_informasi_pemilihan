<?php 
$rw = $data->row();
 ?>
<div id="page">
        <div class="header header-fixed header-logo-app">
            <a href="#" class="header-title">Lihat Hasil Pemilihan</a>
            <a href="#" class="header-icon header-icon-1" data-back-button><i class="fas fa-arrow-left"></i></a>
            <a href="#" class="header-icon header-icon-2" data-toggle-theme><i class="fas fa-moon"></i></a>
        </div>

        <!-- Pendeteksi Internet -->
        <div id="menu-offline" class="menu menu-box-modal round-medium bg-gradasi">
            <div data-height="100%" class="caption">
                <div class="caption-center">
                    <h2 class="center-text color-theme bolder font-30">Internet Terputus</h2>
                    <p class="boxed-text-huge color-theme opacity-60 bottom-30 top-15">
                        Aplikasi ini membutuhkan koneksi internet. Periksa kembali data seluler atau wifi untuk
                        melanjutkan.
                    </p>
                </div>
            </div>
        </div>

        <div class="page-content header-clear-sedang">
            <div class="content">
                <div class="list-columns-left">
                    <div>
                        <img src="front/images/pictures/3t.jpg" alt="img">
                        <h1 class="b"><?php echo $rw->nama_pemilihan ?></h1>
                        <p>
                            <?php echo $rw->kelurahan ?>.
                        </p>
                    </div>
                </div>
            </div>

            <div class="divider divider-margins"></div>

            <div class="content">
                <p class="center-text under-heading font-15 color-theme bottom-5">Grafik Perolehan Suara</p>
                <div class="content bottom-0">
                    <canvas class="chart" id="vertical-chart" style="height: 300px;" /></canvas>
                </div>
            </div>

            <div class="profile-2">
                <div class="profile-stats">
                    <a href="#"></i>0<em class="color-blue1-dark">Calon</em></a>
                    <a href="#"></i>0<em class="color-blue1-dark">Pemilih</em></a>
                    <a href="#"></i>0<em class="color-green1-dark">Sudah Pilih</em></a>
                    <a href="#"></i>0<em class="color-red1-dark">Belum Pilih</em></a>
                    <div class="clear"></div>
                </div>
            </div>

            <div class="divider divider-margins"></div>

            <div class="content">
                <p class="center-text under-heading font-15 color-theme bottom-5">Daftar Suara Terbanyak</p>
                <table class="table-borders">
                    <!-- <tr>
                        <th style="min-width: 30px;">#</th>
                        <th >No Calon</th>
                        <th class="tbl-kiri">Nama Calon</th>
                        <th>Suara</th>
                        <th>Persentase</th>
                    </tr> -->
                    
                </table>
            </div>
        </div>
    </div>
        <canvas class="chart disabled" id="pie-chart" /></canvas>
    <canvas class="chart disabled" id="doughnut-chart" /></canvas>
    <canvas class="chart disabled" id="polar-chart" /></canvas>
    <canvas class="chart disabled" id="bar-chart" /></canvas>

    <script type="text/javascript">
        //Charts
        if($('.chart').length > 0){
            var loadJS = function(url, implementationCode, location){
                var scriptTag = document.createElement('script');
                scriptTag.src = url;
                scriptTag.onload = implementationCode;
                scriptTag.onreadystatechange = implementationCode;
                location.appendChild(scriptTag);
            };
            var call_charts_to_page = function(){
                // new Chart(document.getElementById("pie-chart"), {
                //     type: 'pie',
                //     data: {
                //       labels: ["Facebook", "Twitter", "WhatsApp"],
                //       datasets: [{
                //         backgroundColor: ["#4A89DC", "#4FC1E9", "#A0D468"],
                //         borderColor:"rgba(255,255,255,0.5)",
                //         data: [7000,3000,2000]
                //       }]
                //     },
                //     options: {
                //         responsive: true, maintainAspectRatio:false,
                //         legend: {display: true, position:'bottom', labels:{fontSize:13, padding:15,boxWidth:12},},
                //         tooltips:{enabled:true}, animation:{duration:1500}
                //     }
                // });     


                // new Chart(document.getElementById("bar-chart"), {
                //     type: 'bar',
                //     data: {
                //       labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
                //       datasets: [
                //         {
                //           label: "Population (millions)",
                //           backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                //           data: [2478,5267,734,784,433]
                //         }
                //       ]
                //     },
                //     options: {
                //       legend: { display: false },
                //       title: {
                //         display: true,
                //         text: 'Predicted world population (millions) in 2050'
                //       }
                //     }
                // });

                // new Chart(document.getElementById("doughnut-chart"), {
                //     type: 'doughnut',
                //     data: {
                //       labels: ["Apple", "Samsung", "Google"],
                //       datasets: [{
                //         backgroundColor: ["#CCD1D9", "#5D9CEC","#FC6E51"],
                //         borderColor:"rgba(255,255,255,0.5)",
                //         data: [5500,4000,3000]
                //       }]
                //     },
                //     options: {
                //         responsive: true, maintainAspectRatio:false,
                //         legend: {display: true, position:'bottom', labels:{fontSize:13, padding:15,boxWidth:12},},
                //         tooltips:{enabled:true}, animation:{duration:1500}, layout:{ padding: {bottom: 30}}
                //     }
                // });     

                // new Chart(document.getElementById("polar-chart"), {
                //     type: 'polarArea',
                //     data: {
                //       labels: ["Windows", "Mac", "Linux"],
                //       datasets: [{
                //         backgroundColor: ["#CCD1D9", "#5D9CEC","#FC6E51"],
                //         borderColor:"rgba(255,255,255,0.5)",
                //         data: [7000,10000,5000]
                //       }]
                //     },
                //     options: {
                //         responsive: true, maintainAspectRatio:false,
                //         legend: {display: true, position:'bottom', labels:{fontSize:13, padding:15,boxWidth:12},},
                //         tooltips:{enabled:true}, animation:{duration:1500}, layout:{ padding: {bottom: 30}}
                //     }
                // });         

                //insert data total pemilihan
                
                new Chart(document.getElementById("vertical-chart"), {
                    type: 'bar',
                    data: {
                      labels: [
                                <?php 
                                foreach ($this->db->get_where('total_suara', array('id_pemilihan'=>$id_pemilihan))->result() as $rw) {
                                 ?>
                                "<?php echo get_data('calon','id_calon',$rw->id_calon,'no_calon') ?>",
                            <?php } ?>
                                ],
                      datasets: [
                        {
                          label: "Perolehan Suara",
                          backgroundColor: ["#ff5c1e","#ff0000","#aa3ce2","#8d049c","#3cc3e2","#2f1dc3","#3bc125","#1d6101","#a90101","#656161",],
                          data: [
                          <?php 
                          foreach ($this->db->get_where('total_suara', array('id_pemilihan'=>$id_pemilihan))->result() as $rw) {
                           ?>
                          <?php echo $rw->total ?>,
                          <?php } ?>
                          ]
                        }, 
                      ]
                    },
                    options: {
                        responsive: true, maintainAspectRatio:false,
                        legend: {display: false, position:'bottom', labels:{fontSize:13, padding:15,boxWidth:12},},
                        title: {display: false}
                    }
                }); 

                // new Chart(document.getElementById("horizontal-chart"), {
                //     type: 'horizontalBar',
                //     data: {
                //       labels: ["2010", "2013", "2016", "2020"],
                //       datasets: [
                //         {
                //           label: "Mobile",
                //           backgroundColor: "#BF263C",
                //           data: [330,400,580,590]
                //         }, {
                //           label: "Responsive",
                //           backgroundColor: "#EC87C0",
                //           data: [390,450,550,570]
                //         }
                //       ]
                //     },
                //     options: {
                //         legend: {display: true, position:'bottom', labels:{fontSize:13, padding:15,boxWidth:12},},
                //         title: {display: false}
                //     }
                // }); 

                // new Chart(document.getElementById("line-chart"), {
                //   type: 'line',
                //   data: {
                //     labels: [2000,2005,2010,2015,2010],
                //     datasets: [{ 
                //         data: [500,400,300,200,300],
                //         label: "Desktop Web",
                //         borderColor: "#D8334A"
                //       }, { 
                //         data: [0,100,300,400,500],
                //         label: "Mobile Web",
                //         borderColor: "#4A89DC"
                //       }
                //     ]
                //   },
                //   options: {
                //     responsive: true, maintainAspectRatio:false,
                //     legend: {display: true, position:'bottom', labels:{fontSize:13, padding:15,boxWidth:12},},
                //     title: {display: false}
                //   }
                // });
            }
            loadJS('front/scripts/charts.js', call_charts_to_page, document.body);
        } 
    </script>