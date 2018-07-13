<img src="assets/img/stat-picto.svg" alt="speed" class="picto-page">
<h1>Statistiques</h1>

<div id="stats">
  <!-- <nav class="container ctn-nav">
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
  </nav> -->

  <div class="calendar container container-grid">
    <div class="row">
      <canvas id="myChart4"></canvas>
      <script>
        var ctx = document.getElementById("myChart4").getContext('2d');
        var myDoughnutChart = new Chart(ctx, {
          type: 'line',
          maintainAspectRatio: true,
          data: {
            labels: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
            datasets: [
              {
                data: <?php echo '['.implode(',',$dateLike).']'; ?>,
                label:"Like",
                borderWidth: [3],
                fill : false,
                borderColor: ['#49C5B6']
              },
              {
                data: <?php echo '['.implode(',',$dateDislike).']'; ?>,
                label:"Disike",
                borderWidth: [3],
                fill : false,
                borderColor: ['#bf4c4c']
              },
              {
                data: <?php echo '['.implode(',',$dateUser).']'; ?>,
                label:"Inscription",
                borderWidth: [3],
                fill : false,
                borderColor: ['#847']
              }
              ,
              {
                data: <?php echo '['.implode(',',$dateCommentaire).']'; ?>,
                label:"Commentaires",
                borderWidth: [3],
                fill : false,
                borderColor: ['#883008']
              }
            ]
          },
          options: {
            responsive: true,
            title: {
              display: true,
              text: 'Statistiques annuels'
            },
            scales: {
              xAxes: [{
                display: true,
              }],
              yAxes: [{
                display: true,
                ticks: {
                  stepSize: 1
                }
              }]
            }
          }
        });
      </script>
      <div class="full text-center">
        <div class="stats-info col-lg-3">
          <i class="fas fa-heart"></i>
          <span class="title">Like</span>
          <span class="content"><?php echo $nblike; ?></span>
        </div>
        <div class="stats-info col-lg-3">
          <i class="fas fa-thumbs-down"></i>
          <span class="title">Dislike</span>
          <span class="content"><?php echo $nbdislike; ?></span>
        </div>
        <div class="stats-info col-lg-3">
          <img src="assets/img/man-user.svg" alt="">
          <span class="title">Utilisateur(s)</span>
          <span class="content"><?php echo $nbuser; ?></span>
        </div>
        <div class="stats-info col-lg-3">
          <img src="assets/img/black-bubble-speech.svg" alt="">
          <span class="title">Commentaire(s)</span>
          <span class="content"><?php echo $nbcommentaire; ?></span>
        </div>
      </div>
    </div>
  </div>
</div>
