<img src="assets/img/speed-picto.svg" alt="" class="picto-page">
<h1>Dashboard</h1>
<div id="dashboard" class="container-grid">
  <div class="top row group">
    <section class="col-md-6 col-xs-12 u-pd--m no-spacing-right-sm no-spacing-right-xs group">
      <div>
        <header>
          <span>derniers articles</span>
          <img src="" alt="">
        </header>
        <div class="content">
          <div class="children">
            <h3>Jean louis</h3>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
            Sunt quo quae repellendus obcaecati maiores? Possimus aut ea mollitia voluptas, 
            ullam quam labore obcaecati, in error ducimus illo expedita recusandae. Est.</p>
            <span>il y a 2 jours</span>
          </div>
          <div class="children">
            <h3>Jean louis</h3>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
            Sunt quo quae repellendus obcaecati maiores? Possimus aut ea mollitia voluptas, 
            ullam quam labore obcaecati, in error ducimus illo expedita recusandae. Est.</p>
            <span>il y a 2 jours</span>
          </div>
        </div>
      </div>
    </section>
    <section class="col-md-6 col-xs-12 u-pd--m no-spacing-left-sm no-spacing-left-xs group">
      <div>
        <header>
          <span>derniers commentaires</span>
          <img src="" alt="">
        </header>
        <div class="content">
          <div class="children">
            <h3>Jean louis</h3>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
            Sunt quo quae repellendus obcaecati maiores? Possimus aut ea mollitia voluptas, 
            ullam quam labore obcaecati, in error ducimus illo expedita recusandae. Est.</p>
            <span>il y a 2 jours</span>
          </div>
          <div class="children">
            <h3>Jean louis</h3>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
            Sunt quo quae repellendus obcaecati maiores? Possimus aut ea mollitia voluptas, 
            ullam quam labore obcaecati, in error ducimus illo expedita recusandae. Est.</p>
            <span>il y a 2 jours</span>
          </div>
       </div>
      </div>
    </section>
  </div>
  <hr class="lineSeparator">
  <div class="bottom row">
    <div class="left group col-md-7 col-xs-12 spacing-right">
      <div>
        <canvas id="myChart" width="400" height="400"></canvas>
        <script>
          var ctx = document.getElementById("myChart").getContext('2d');
          var myDoughnutChart = new Chart(ctx, {
              type: 'doughnut',
              data: {
                datasets: [{
                    data: [90, 10],
                    borderWidth: [10],
                    borderColor: ['#304A52'],
                    backgroundColor: [
                      '#49C5B6',
                      '#fefefe'
                    ]
                }],
              },
          });
        </script>
        <!-- <img src="assets/img/stats.svg" alt=""> -->
      </div>
      <span>TOTAL - 12 300 views</span>
    </div>
    <div class="col-md-5 col-xs-12">
      <img src="assets/img/stats2.svg" alt="">   
    </div>
  </div>
</div>