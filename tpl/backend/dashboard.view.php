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
<<<<<<< HEAD
        <div class="left group col-md-7 col-xs-12 spacing-right">
=======
        <div class="left group col-lg-5 col-md-12 col-xs-12 spacing-right">
>>>>>>> 6a90b59204d90f0f822d5fadb6c37c2f93d19e23
            <div class="chart-container">
                <canvas id="myChart" class="chart-item"></canvas>
                <script>
                    var ctx = document.getElementById("myChart").getContext('2d');
                    var myDoughnutChart = new Chart(ctx, {
                        type: 'doughnut',
                        maintainAspectRatio: true,
                        data: {
                            datasets: [{
                                data: [90, 10],
                                borderWidth: [10],
                                backgroundColor: [
                                    '#49C5B6',
                                    '#fefefe'
                                ]
                            }],
                        },
                    });
                </script>
                <canvas id="myChart2" class="chart-item"></canvas>
                <script>
                    var ctx = document.getElementById("myChart2").getContext('2d');
                    var myDoughnutChart = new Chart(ctx, {
                        type: 'doughnut',
                        maintainAspectRatio: true,
                        data: {
                            datasets: [{
                                data: [90, 10],
                                borderWidth: [10],
                                backgroundColor: [
                                    '#49C5B6',
                                    '#fefefe'
                                ]
                            }],
                        },
                    });
                </script>
                <canvas id="myChart3" class="chart-item"></canvas>
                <script>
                    var ctx = document.getElementById("myChart3").getContext('2d');
                    var myDoughnutChart = new Chart(ctx, {
                        type: 'doughnut',
                        maintainAspectRatio: true,
                        data: {
                            datasets: [{
                                data: [90, 10],
                                borderWidth: [10],
                                backgroundColor: [
                                    '#49C5B6',
                                    '#fefefe'
                                ]
                            }],
                        },
                    });
                </script>
            </div>
            <span>TOTAL - 12 300 views</span>
        </div>
<<<<<<< HEAD
        <div class="col-md-5 col-xs-12">
=======
        <div class="col-lg-5 col-md-12 col-xs-12">
>>>>>>> 6a90b59204d90f0f822d5fadb6c37c2f93d19e23
            <canvas id="myChart4"></canvas>
            <script>
                var ctx = document.getElementById("myChart4").getContext('2d');
                var myDoughnutChart = new Chart(ctx, {
                    type: 'bar',
                    maintainAspectRatio: true,
                    data: {
                        datasets: [
                            {
                                data: [{x:'2016-12-25', y:5}, {x:'2016-12-26', y:50}],
                                backgroundColor: [
                                    '#49C5B6',
                                    '#fefefe'
                                ]
                            },
                            {
                                data: [{x:'2016-12-25', y:35}],
                                backgroundColor: [
                                    '#49C5B6',
                                    '#fefefe'
                                ]
                            },
                            {
                                data: [{x:'2016-12-25', y:13}],
                                backgroundColor: [
                                    '#49C5B6',
                                    '#fefefe'
                                ]
                            },
                            {
                                data: [{x:'2016-12-25', y:34}],
                                backgroundColor: [
                                    '#49C5B6',
                                    '#fefefe'
                                ]
                            },
                            {
                                data: [{x:'2016-12-25', y:5}],
                                backgroundColor: [
                                    '#49C5B6',
                                    '#fefefe'
                                ]
                            },
                            {
                                data: [{x:'2016-12-25', y:10}],
                                backgroundColor: [
                                    '#49C5B6',
                                    '#fefefe'
                                ]
                            },
                            {
                                data: [{x:'2016-12-25', y:12}],
                                backgroundColor: [
                                    '#49C5B6',
                                    '#fefefe'
                                ]
                            }
                        ],
                    },
                });
            </script>
        </div>
    </div>
</div>