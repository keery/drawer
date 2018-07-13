<img src="assets/img/speedometer.svg" alt="" class="picto-page">
<h1>Dashboard</h1>
<div id="dashboard" class="container-grid">
    <div class="top row group">
        <section class="col-md-6 col-xs-12 u-pd--m no-spacing-right-sm no-spacing-right-xs group">
            <div>
                <header>
                    <span>Derniers articles</span>
                    <img src="" alt="">
                </header>                
                <div class="content">
                    <?php if (sizeof($articles) > 0) :
                        foreach ($articles as $article) : ?>
                            <div class="children">
                                <h3><?php echo (empty($article->getAuteur()) ? 'Anonyme' : $article->getAuteur()) ; ?></h3>
                                <p><?php echo $article->getDescription(); ?></p>
                                <span><p><?php echo articleTimeAgo($article->getDate_creation()); ?></p></span>
                            </div>
                        <?php endforeach;
                    else: echo "Il n'y a actuellement aucun article";
                    endif; ?>
                </div>
            </div>
        </section>
        <section class="col-md-6 col-xs-12 u-pd--m no-spacing-left-sm no-spacing-left-xs group">
            <div>
                <header>
                    <span>Derniers commentaires</span>
                    <img src="" alt="">
                </header>
                <div class="content">
                    <?php if (sizeof($commentaires) > 0) :
                        foreach ($commentaires as $commentaire) : ?>
                            <div class="children">
                                <h3><?php echo $commentaire->getUser()->getPrenom(). " ".$commentaire->getUser()->getNom() ; ?></h3>
                                <p><?php echo $commentaire->getCommentaire(); ?></p>
                                <span><p><?php echo articleTimeAgo($commentaire->getPublication()); ?></p></span>
                            </div>
                        <?php endforeach;
                        else: echo "Il n'y a actuellement aucun commentaire";
                    endif; ?>
                </div>
            </div>
        </section>
    </div>
    <hr class="lineSeparator">
    <div class="bottom row">
        <div class="left group col-xs-12 spacing-right">
            <div class="chart-container">
                <canvas id="myChart" class="chart-item"></canvas>
                <script>
                    var ctx = document.getElementById("myChart").getContext('2d');
                    var myDoughnutChart = new Chart(ctx, {
                        type: 'doughnut',
                        maintainAspectRatio: true,
                        data: {
                            datasets: [{
                                data: [<?php echo $like; ?>, <?php echo $dislike; ?>],
                                borderWidth: [10],
                                backgroundColor: [
                                    '#49C5B6',
                                    '#bf4c4c'
                                ]
                            }],
                        },


                        options:{
                            title: {
                                display: true,
                                text: 'Dislike/Like',
                                fontSize:50,
                                fontStyle:"normal"
                            }
                        }
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
                                data: [<?php echo $com_active; ?>, <?php echo $com_unactive; ?>],
                                borderWidth: [10],
                                backgroundColor: [
                                    '#49C5B6',
                                    '#bf4c4c'
                                ]
                            }],
                        },
                        options:{
                            title: {
                                display: true,
                                text: 'Commentaire(s) validé(s)',
                                fontSize:50,
                                fontStyle:"normal"
                            }
                        }
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
                                data: [<?php echo $user_active; ?>, <?php echo $user_banned; ?>],
                                borderWidth: [10],
                                backgroundColor: [
                                    '#49C5B6',
                                    '#bf4c4c'
                                ]
                            }],
                        },


                        options:{
                            title: {
                                display: true,
                                text: 'Utilisateur(s) banni(s)',
                                fontSize:50,
                                fontStyle:"normal"
                            }
                        }
                    });
                </script>                
            </div>
            <span>TOTAL - <?php echo $nbarticles; ?> article(s)</span>
        </div>
    </div>
</div>