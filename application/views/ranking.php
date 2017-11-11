<?php $this->load->view('header') ?>
<body>
<div class="page-bg"></div>
<?php $this->load->view('nav'); ?>
<a class="title" href="<?=base_url();?>">La ferme de Didier</a>
<div class="content">
    <div class="title-column">
        <h1>CLASSEMENT</h1>
        <h1>PSEUDO</h1>
        <h1>SCORE</h1>
    </div>
    <?php
    $i = 1;
    foreach($ranking as $row): ?>
    <div class="rank">
        <h1><?= $i; ?></h1>
        <h1><?= $row['user_name']; ?></h1>
        <h1><?php if($row['enigme_id'] == 10): ?>
                <?= $row['enigme_id']*10; ?>
            <?php else: ?>
                <?= ($row['enigme_id']-1)*10; ?>
            <?php endif ?>
            <?php $i++; ?>

            </h1>
    </div>
    <?php endforeach; ?>
</div>
<footer>
    <a href="#" >Contact</a>
    <a href="#">Nos jeux</a>
    <a class="infos-legales" href="#">Informations légales</a>
</footer>


<!--	JAVASCRIPT 	-->

<script type="text/javascript">

    $(document).ready(function(){

        $('#content').find('img').click(function(){
            $(this).addClass('animated rubberBand').one('animationend', function(){
                $(this).removeClass('animated rubberBand');
            });
        });


</script>

<style type="text/css">

    .content{
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        width: 70%;
        margin: 50px auto 100px auto;
    }
    .title-column{
        display: flex;
        justify-content: center;
        align-items: center;
        background: rgba(0,0,0,0.1);
        width: 100%;
        border-radius: 5px;
        padding: 20px 0;
        margin: 5px 0;
    }
    .title-column h1{
        display: inline-block;
        font-family: 'Skater Girls Rock';
        font-size: 30px;
        font-weight: 500;
        color: #222222;
        width: 30%;
        margin: 0;
    }
    .rank{
        display: flex;
        justify-content: center;
        align-items: center;
        background: rgba(0,0,0,0.1);
        width: 100%;
        border-radius: 5px;
        padding: 20px 0;
        margin: 5px 0;
    }
    .rank h1{
        display: inline-block;
        font-family: 'Skater Girls Rock';
        font-size: 30px;
        font-weight: 500;
        color: #33c054;
        width: 30%;
        margin: 0;
    }

    @media screen and (max-width: 1080px){
        #content{
            flex-direction: column;
        }
        #center{
            width: 900px;
        }
        #center h1{
            font-size: 50px;
        }
        form p{
            font-size: 45px;
        }
        .input-text{
            height: 80px;
            font-size: 45px;
        }
        #valider{
            width: 300px;
            height: 100px;
            font-size: 60px;
        }
    }
</style>
</body>
</html>