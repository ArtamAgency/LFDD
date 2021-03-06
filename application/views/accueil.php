<?php $this->load->view('header.php') ?>
<body>
<div class="page-bg"></div>
<?php $this->load->view('nav'); ?>
<a class="tlt title" href="">La ferme de Didier</a>
<div id="description">
    <div id="desc2">
        <img src="<?=base_url();?>asset/images/barn.svg"/>
        <p style="text-align:center;">Didier le fermier a besoin d’aide, son poussin Célestin s’est échappé !</p>
        <p style="text-align:center;">Parcours la ferme afin de retrouver le poussin de Didier. Durant les 10 étapes de ton aventure, découvre les animaux, leurs cris, leurs caractéristiques, et travaille même les mathématiques ! Utilise le livre, à télécharger ci-dessous, pour résoudre les différentes énigmes et progresser dans ta recherche du poussin.</p>
    </div>
    <div id="desc3">
        <p>
            Pour progresser dans l’aventure, suis les consignes des énigmes sur le site et sur le livre !
            <a target=_blank" href="<?=base_url();?>asset/print.pdf">Télécharge le livre ici</a>
        </p>

        <img src="<?=base_url();?>asset/images/open_book.svg"/>
    </div>
</div>
<div class="play">
    <img src="<?=base_url();?>asset/images/chick.svg"/>
    <div class="play-right">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tristique viverra risus, in semper lacus. Aliquam in tincidunt eros, at pharetra odio.</p>
        <?php if(isset($_SESSION['user_infos'])): ?>
        <a href="<?=base_url();?>jouer" class="play-button">
            <h1>C'EST &nbsp;PARTI !</h1>
        </a>
        <?php else: ?>gi
        <a href="<?=base_url();?>inscription" class="play-button">
            <h1>C'EST &nbsp;PARTI !</h1>
        </a>
        <?php endif ?>
    </div>
</div>
<footer>
    <a href="#" >Contact</a>
    <a href="#">Nos jeux</a>
    <a class="infos-legales" href="#">Informations légales</a>
</footer>


<!--	JAVASCRIPT 	-->

<script type="text/javascript">

    $(document).ready(function(){

        $('.tlt').textillate({
            in: {
                effect: 'bounceInDown',
                callback: function(){
                    $('nav').find('a').removeClass('tlt');
                }
            }
        });

        $('#description').find('img').click(function(){
            $(this).addClass('animated rubberBand').one('animationend', function(){
                $(this).removeClass('animated rubberBand');
            });
        });
        $('.play').find('img').click(function(){
            $(this).addClass('animated rubberBand').one('animationend', function(){
                $(this).removeClass('animated rubberBand');
            });
        });

        $('.play-button').mouseover(function(){
            $(this).css('transform', 'scale(1.03)');
        });
        $('.play-button').mouseout(function(){
            $(this).css('transform', 'scale(1)');
        });

        $('.log').find('a').first().mouseover(function(){
            $('.log').find('a').first().css('transform', 'scale(0.95)');
        });
        $('.log').find('a').first().mouseout(function(){
            $('.log').find('a').first().css('transform', 'scale(1)');
        });

        $('.log').find('a').last().mouseover(function(){
            $('.log').find('a').last().css('transform', 'scale(0.95)');
        });
        $('.log').find('a').last().mouseout(function(){
            $('.log').find('a').last().css('transform', 'scale(1)');
        });
    });

</script>

<style type="text/css">

    #description{
        position: relative;
        display: block;
        width: 100%;
        text-align: center;
        margin:  0 auto 0 auto;
    }
    #desc1{
        position: relative;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: center;
        width: 100%;
        color: #8bcfff;
        background: rgba(0,0,0,0.1);
        padding: 25px 0;
        align-items: center;
    }
    #desc1 img{
        position: relative;
        display: inline-block;
        width: 150px;
        margin: 55px;
    }
    #desc1 p{
        position: relative;
        display: inline-block;
        text-align: justify;
        font-size: 1.2rem;
        line-height: 24px;
        font-family: 'Skater Girls Rock';
        color: #222222;
        width: 700px;
        margin: 0;
    }
    #desc2{
        position: relative;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        width: 100%;
        align-items: center;
        margin: 0 0 50px 0;
    }
    #desc2 img{
        position: relative;
        display: inline-block;
        width: 150px;
        margin: 55px;
    }
    #desc2 p{
        position: relative;
        display: inline-block;
        text-align: justify;
        font-size: 1.2rem;
        line-height: 24px;
        font-family: 'Skater Girls Rock';
        color: #222222;
        width: 700px;
        margin: 0;
    }
    #desc3{
        position: relative;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: center;
        width: 100%;
        align-items: center;
        background: rgba(0,0,0,0.1);
        padding: 25px 0;
        margin: 50px 0 50px 0;
    }
    #desc3 img{
        position: relative;
        display: inline-block;
        width: 150px;
        margin: 55px;
    }
    #desc3 p{
        position: relative;
        display: inline-block;
        text-align: justify;
        direction: rtl;
        font-size: 1.2rem;
        line-height: 24px;
        font-family: 'Skater Girls Rock';
        color: #222222;
        width: 700px;
        margin: 0;
    }
    .play{
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-wrap: wrap;
        margin: 80px 0 80px 0;
    }
    .play img{
        position: relative;
        display: inline-block;
        width: 200px;
        margin: 35px;
    }
    .play-right{
        position: relative;
        display: inline-block;
    }
    .play-right p{
        position: relative;
        display: inline-block;
        text-align: justify;
        font-size: 1.2rem;
        line-height: 24px;
        font-family: 'Skater Girls Rock';
        color: #222222;
        width: 400px;
        margin: 0;
    }
    .play-button{
        position: relative;
        display: flex;
        align-items: center;
        width: 100%;
        height: 120px;
        text-decoration: none;
        background: #33c054;
        justify-content: center;
        border-radius: 5px;
        margin: 15px 0;
        transition: 0.5s ease;
    }
    .play-button h1{
        position: relative;
        display: inline-block;
        color: white;
        font-family: 'Skater Girls Rock';
        font-weight: 500;
        font-size: 60px;
        text-decoration: none;
        padding: 15px 0 0 0;
        margin: 0;
    }

    @media screen and (max-width: 1080px){
        #desc1{
            flex-direction: column;
        }
        #desc1 p{
            width: 800px;
        }
        #desc2{
            flex-direction: column;
        }
        #desc2 p{
            width: 800px;
        }
        #desc3{
            flex-direction: column;
        }
        #desc3 p{
            width: 800px;
        }
        .play-right p{
            font-size: 2.5rem;
            line-height: 2.5rem;
        }
    }
</style>
</body>
</html>