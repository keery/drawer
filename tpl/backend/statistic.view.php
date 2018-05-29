<img src="assets/img/speed-picto.svg" alt="speed" class="picto-page">
<h1>Statistiques</h1>

<div id="stats">
  <nav class="container ctn-nav">
    <div class="nav-links" data-selected-filter="Traffic">
      <a href="" class="selected">Traffic</a>
      <a href="">Insights</a>
    </div>
    <div class="nav-options cf">
      <div><a href="" class="selected">Days</a></div>
      <div><a href="">Weeks</a></div>
      <div><a href="">Months</a></div>
      <div><a href="">Years</a></div>
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
                data: [19, 23, 23, 12, 7, 12],
                borderWidth: [3],
                borderColor: ['#49C5B6']
              },
            ],
          },
        });
      </script>
      <div class="stats-info col-lg-3">
        <img src="assets/img/eye.svg" alt="">
        <span class="title">views</span>
        <span class="content">1000</span>
      </div>
      <div class="stats-info col-lg-3">
        <img src="assets/img/man-user.svg" alt="">
        <span class="title">visitors</span>
        <span class="content">174</span>
      </div>
      <div class="stats-info col-lg-3">
        <img src="assets/img/star.svg" alt="">
        <span class="title">likes</span>
        <span class="content">10</span>
      </div>
      <div class="stats-info col-lg-3">
        <img src="assets/img/black-bubble-speech.svg" alt="">
        <span class="title">comments</span>
        <span class="content">2387</span>
      </div>
    </div>
  </div>
</div>
