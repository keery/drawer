<img src="assets/img/stat-picto.svg" alt="speed" class="picto-page">
<h1>Statistiques</h1>

<div id="stats">
  <nav class="container ctn-nav">
    <div class="nav-links" data-selected-filter="Traffic">
      <a href="" class="selected">Traffic</a>
      <a href="">Insights</a>
    </div>
    <div class="nav-options cf">
      <div><a href="" class="selected">Jours</a></div>
      <div><a href="">Semaine</a></div>
      <div><a href="">Mois</a></div>
      <div><a href="">Année</a></div>
    </div>
  </nav>

  <div class="calendar container container-grid">
    <div class="row">
      <canvas id="myChart4"></canvas>
      <script>
        var ctx = document.getElementById("myChart4").getContext('2d');
        var myDoughnutChart = new Chart(ctx, {
          type: 'line',
          maintainAspectRatio: true,
          data: {
            datasets: [
              {
                data: [9, 23, 23, 12, 7, 12],
                label:"vue",
                borderWidth: [3],
                fill : false,
                borderColor: ['#49C5B6']
              },



                {
                    data: [5, 7, 17, 4, 7, 12],
                    label:"visiteur",
                    borderWidth: [3],
                    fill : false,
                    borderColor: ['#847']
                }
                ,



                {
                    data: [2, 17, 3, 15, 8, 16],
                    label:"j'aime",
                    borderWidth: [3],
                    fill : false,
                    borderColor: ['#7ed866']
                }




                ,


                {
                    data: [2, 7, 17, 4, 7, 12],
                    label:"Commentaires",
                    borderWidth: [3],
                    fill : false,
                    borderColor: ['#883008']
                }

            ],
          },
        });
      </script>
      <div class="stats-info col-lg-3">
        <img src="assets/img/eye.svg" alt="">
        <span class="title">Vue</span>
        <span class="content">1000</span>
      </div>
      <div class="stats-info col-lg-3">
        <img src="assets/img/man-user.svg" alt="">
        <span class="title">Visiteurs</span>
        <span class="content">174</span>
      </div>
      <div class="stats-info col-lg-3">
        <img src="assets/img/star.svg" alt="">
        <span class="title">Mention j'aime</span>
        <span class="content">10</span>
      </div>
      <div class="stats-info col-lg-3">
        <img src="assets/img/black-bubble-speech.svg" alt="">
        <span class="title">Commentaires</span>
        <span class="content">2387</span>
      </div>
    </div>
  </div>
</div>
