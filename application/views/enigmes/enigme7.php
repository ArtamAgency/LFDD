<?php $this->load->view('header'); ?>
<body>
<div class="page-bg"></div>
<?php $this->load->view('nav'); ?>
<a class="tlt title" href="<?=base_url();?>">La ferme de Didier</a>
<div class="content">
    <h1>ENIGME 7</h1>
    <div class="content-2">
        <div class="content-2-left">
            <p class="tryleft">Essais restants: 3 / 3</p>
            <div class="legume radish">
                <img src="<?=base_url();?>asset/images/radish.png" onmousedown="return false"/>
            </div>
            <div class="legume pumpkin">
                <img src="<?=base_url();?>asset/images/pumpkin.png" onmousedown="return false"/>
            </div>
            <div class="legume aubergine">
                <img src="<?=base_url();?>asset/images/aubergine.png" onmousedown="return false"/>
            </div>
            <div class="legume carrot">
                <img src="<?=base_url();?>asset/images/carrot.png" onmousedown="return false"/>
            </div>
            <p class="tryagain">Ce n'est pas le bon légume, réessaye !</p>
        </div>
        <div class="content-2-right">
            <div class="description">
                <h1>REFERENCE DE L'ENIGME</h1>
                <h2>DESCRIPTION</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tristique viverra risus, in semper lacus. Aliquam in tincidunt eros, at pharetra odio. Proin id enim fermentum, rutrum ipsum a, porttitor dui.</p>
            </div>
            <form method="POST" action="<?=base_url();?>Enigme/enigmeHandler/7">
                <input class="input-hidden" name="response" type="hidden" value="">
                <input class="next" type="submit" value="ÉNIGME SUIVANTE">
            </form>
            <form class="ban-form" action="ban.html">
                <input type="hidden" value="ban">
            </form>
        </div>
    </div>
</div>
<footer>
    <a href="<?=base_url();?>Contact" >Contact</a>
    <a href="#">Nos jeux</a>
    <a class="infos-legales" href="#">Informations légales</a>
</footer>


<!--	JAVASCRIPT 	-->

<script type="text/javascript">

    $(document).ready(function(){


        var essai = 0;
        completed = false;
        $('.legume').click(function(){
            if($(this).hasClass('pumpkin')){
                $('.input-hidden').val('completed');
                $('.tryagain').text('Bravo, le bon légume était bien la CITROUILLE mais Célestin s\'est encore enfui, passe vite à l\'énigme suivante pour le rattraper !').css('color', '#33c054').css('opacity', '1');
                completed = true;
            }
            else{
                $('.tryagain').css('opacity', '1');
                essai++;
            }
            if( completed == false){
                $('.tryleft').text('Essais restants: '+(3 - essai)+' / 3');
            }
            if(essai == 1 && completed == false){
                $('.tryleft').css('color', '#ee9c33');
            }
            if(essai == 2 && completed == false){
                $('.tryleft').css('color', '#ee3333');
            }
            if(essai == 3 && completed == false){
                $('.ban-form').submit();
            }
        });
        $('.legume').click(function(){
            $(this).css('transform', 'scale(0.95)').one('transitionend', function(){
                $(this).css('transform', 'scale(1)');
            });
        })
        $('.legume').mouseover(function(){
            $(this).css('transform', 'scale(0.98)');
        });
        $('.legume').mouseout(function(){
            $(this).css('transform', 'scale(1)');
        });
    });

</script>

<style type="text/css">

    .content{
        display: inline-block;
        margin:  80px auto 80px auto;
    }
    .content h1{
        text-align: left;
        font-family: 'Skater Girls Rock';
        font-weight: 500;
        color: #222222;
        font-size: 80px;
        margin: 0;
    }
    .content-2{
        display: flex;
        align-items: stretch;
        justify-content: center;
        width: 100%;
    }
    .content-2-left{
        background: rgba(0,0,0,0.1);
        border-radius: 5px;
        width: 780px;
        margin: 0 40px 0 0;
    }
    .tryleft{
        text-align: right;
        font-family: 'Skater Girls Rock';
        font-size: 30px;
        color: #33c054;
        margin: 10px;
    }
    .legume{
        display: inline-block;
        width: 40%;
        margin: 20px;
        cursor: pointer;
        transition: 0.2s ease;
    }
    .legume img{
        width: 60%;
        margin: 0 20px 20px 20px;
    }
    .tryagain{
        font-family: 'Skater Girls Rock';
        font-size: 30px;
        color: #ee3333;
        width: 100%;
        opacity: 0;
        margin: 0 0 20px 0;
        user-select: none;
        cursor: default;
    }
    .input-text:focus{
        outline: none;
    }
    .content-2-right{
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-direction: column;
        width: 360px;
        padding: 20px;
        background: rgba(0,0,0,0.1);
        border-radius: 5px;
    }
    .next{
        width: 300px;
        height: 80px;
        font-family: 'Skater Girls Rock';
        font-size: 35px;
        text-decoration: none;
        color: #ffffff;
        background: #33c054;
        border-radius: 5px;
        border: none;
        margin: 50px 0 0 0;
        padding: 15px 0 0 0;
        cursor: pointer;
    }
    .description{
        text-align: left;
    }
    .description h1{
        font-family: 'Skater Girls Rock';
        font-size: 30px;
        color: #222222;
        margin: 0 0 50px 0;
    }
    .description h2{
        font-family: 'Skater Girls Rock';
        font-size: 30px;
        color: #222222;
    }
    .description p{
        font-family: 'Skater Girls Rock';
        font-size: 20px;
        color: #222222;
        text-align: justify;
    }
    @media screen and (max-device-width: 1080px){
        .content h1{
            text-align: center;
        }
        .content-2{
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .content-2-left{
            margin: 0 0 40px 0;
        }
        .content-2-right{
            width: 740px;v
        }
        .content-2-right a{
            width: 300px;
            height: 100px;
            font-size: 50px;
        }
        .description h1{
            text-align: left;
        }
        .animal-form{
            width: 80%;
            margin: 40px;
        }
        .animal-form img{
            width: 40%;
        }
        .input-text{
            font-size: 40px;
        }
        .tryagain{
            font-size: 45px;
        }
        .valider{
            width: 100px;
            font-size: 50px;
            padding: 15px 0 15px 0;
        }
    }
</style>
</body>
</html>