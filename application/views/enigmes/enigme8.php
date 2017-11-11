<?php $this->load->view('header'); ?>
<body>
<div class="page-bg"></div>
<?php $this->load->view('nav'); ?>
<a class="tlt title" href="<?=base_url();?>">La ferme de Didier</a>
<div class="content">
    <audio id="sound-chicken" src="<?=base_url();?>asset/sounds/chicken.mp3"></audio>
    <h1>ENIGME 8</h1>
    <div class="content-2">
        <div class="content-2-left">
            <p class="tryleft">Essais restants: 3 / 3</p>
            <h1>QUI SUIS-JE ?</h1>
            <form>
                <input class="input-text" type="text" onkeydown="this.value = this.value.toUpperCase()" onkeyup="this.value = this.value.toUpperCase()">
                <a class="valider">Ok</a>
            </form>
            <p class="tryagain">Ce n'est pas le bon mot, essaye encore !</p>
            <img src="<?=base_url();?>asset/images/mouse.svg" onmousedown="return false"/>
        </div>
        <div class="content-2-right">
            <div class="description">
                <h2>CONSIGNE</h2>
                <p>Tu as découvert l’animal mystère ? A l’aide du clavier, entre son nom dans la zone de texte.</p>
            </div>
            <form method="POST" action="<?=base_url();?>Enigme/enigmeHandler/8">
                <input class="input-hidden" name="response" type="hidden" value="">
                <input class="next" type="submit" value="ÉNIGME SUIVANTE">
            </form>
            <form method="POST" class="ban-form" action="<?=base_url();?>Enigme/blockUser">
                <input type="hidden" value="ban">
            </form>
        </div>
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


        var essai = 0;
        $('.valider').click(function(){
            if($('.input-text').val() == 'SOURIS' || $('.input-text').val() == 'UNE SOURIS' || $('.input-text').val() == 'LA SOURIS'){
                $('.tryagain').text('Bravo ! Tu as deviné quel animal j\'étais mais Célestin s\'est encore enfui, passe vite à l\'énigme suivante pour le rattraper !').css('color', '#33c054').css('opacity', '1');
                $('.input-hidden').val('completed');
                $('.input-text').prop('disabled', true);
                $('.content-2-left').find('img').css('opacity', '1').css('cursor', 'default');
            }
            else{
                $('.tryagain').css('opacity', '1');
                essai++;
            }
            $('.tryleft').text('Essais restants: '+(3 - essai)+' / 3');
            if(essai == 1){
                $('.tryleft').css('color', '#ee9c33');
            }
            if(essai == 2){
                $('.tryleft').css('color', '#ee3333');
            }
            if(essai == 3){
                $('.ban-form').submit();
            }

        });
        $('.input-text').click(function(){
            $('.tryagain').css('opacity', '0');
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
    .content-2-left h1{
        font-size: 50px;
        text-align: center;
    }
    .content-2-left img{
        width: 100px;
        margin: 40px 0 40px 0;
        opacity: 0;
        cursor: pointer;
        transition: 0.2s ease;
    }
    .content-2-left form{
        display: flex;
        align-items: center;
        justify-content: center;
        height: 35px;
        margin: 40px 0 40px 0;
    }
    .tryleft{
        text-align: right;
        font-family: 'Skater Girls Rock';
        font-size: 30px;
        color: #33c054;
        margin: 10px;
    }
    .tryagain{
        display: inline-block;
        font-family: 'Skater Girls Rock';
        font-size: 30px;
        color: #ee3333;
        width: 90%;
        opacity: 0;
        margin: 0;
        user-select: none;
        cursor: default;
    }
    .input-text{
        text-align: center;
        font-family: 'Skater Girls Rock';
        font-size: 25px;
        color: #222222;
        border: none;
        width: 350px;
        height: 100%;
        padding: 10px;
        border-radius: 5px;
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
            width: 740px;
        }
        .content-2-right a{
            width: 300px;
            height: 100px;
            font-size: 50px;
        }
        .description h1{
            text-align: left;
        }
        .tryagain{
            font-size: 50px;
        }
        .input-text{
            font-size: 40px;
        }
        .indice-text{
            font-size: 40px;
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