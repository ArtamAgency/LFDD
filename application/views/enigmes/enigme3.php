<?php $this->load->view('header') ?>
<body>
<div class="page-bg"></div>
<?php $this->load->view('nav'); ?>
<a class="tlt title" href="<?=base_url();?>">La ferme de Didier</a>
<div class="content">
    <h1>ENIGME 3</h1>
    <div class="content-2">
        <div class="content-2-left">
            <p class="tryleft">Essais restants: 3 / 3</p>
            <div class="animal-form horse-form">
                <img src="<?=base_url();?>asset/images/horse.svg" onmousedown="return false"/>
                <input class="input-text" type="text" onkeydown="this.value = this.value.toUpperCase()" onkeyup="this.value = this.value.toUpperCase()">
            </div>
            <div class="animal-form cow-form">
                <img src="<?=base_url();?>asset/images/cow.svg" onmousedown="return false"/>
                <input class="input-text" type="text" onkeydown="this.value = this.value.toUpperCase()" onkeyup="this.value = this.value.toUpperCase()">
            </div>
            <div class="animal-form sheep-form">
                <img src="<?=base_url();?>asset/images/sheep.svg" onmousedown="return false"/>
                <input class="input-text" type="text" onkeydown="this.value = this.value.toUpperCase()" onkeyup="this.value = this.value.toUpperCase()">
            </div>
            <div class="animal-form pig-form">
                <img src="<?=base_url();?>asset/images/pig.svg" onmousedown="return false"/>
                <input class="input-text" type="text" onkeydown="this.value = this.value.toUpperCase()" onkeyup="this.value = this.value.toUpperCase()">
            </div>
            <div class="animal-form chicken-form">
                <img src="<?=base_url();?>asset/images/chicken.svg" onmousedown="return false"/>
                <input class="input-text" type="text" onkeydown="this.value = this.value.toUpperCase()" onkeyup="this.value = this.value.toUpperCase()">
            </div>
            <div class="animal-form cat-form">
                <img src="<?=base_url();?>asset/images/cat.svg" onmousedown="return false"/>
                <input class="input-text" type="text" onkeydown="this.value = this.value.toUpperCase()" onkeyup="this.value = this.value.toUpperCase()">
            </div>
            <a class="valider">Ok</a>
            <p class="tryagain">Il y a des erreurs, vérifie les noms et réessaye !</p>
        </div>
        <div class="content-2-right">
            <div class="description">
                <h2>CONSIGNE</h2>
                <p>Retrouve les animaux correspondants aux images puis nomme-les à l’aide du clavier dans les zones de texte.</p>
            </div>
            <form method="POST" action="<?=base_url();?>Enigme/enigmeHandler/3">
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
        completed = false;
        $('.valider').click(function(){

            if($('.horse-form').find('input').val() == 'CHEVAL'){
                $('.horse-form').find('input').css('background', '#33c054').prop('disabled', true);
            }
            else{
                $('.tryagain').css('opacity', '1');
                $('.horse-form').find('input').css('background', '#ee3333');
            }


            if($('.cow-form').find('input').val() == 'VACHE'){
                $('.cow-form').find('input').css('background', '#33c054').prop('disabled', true);
            }
            else{
                $('.tryagain').css('opacity', '1');
                $('.cow-form').find('input').css('background', '#ee3333');
            }


            if($('.sheep-form').find('input').val() == 'MOUTON'){
                $('.sheep-form').find('input').css('background', '#33c054').prop('disabled', true);
            }
            else{
                $('.tryagain').css('opacity', '1');
                $('.sheep-form').find('input').css('background', '#ee3333');
            }


            if($('.pig-form').find('input').val() == 'COCHON'){
                $('.pig-form').find('input').css('background', '#33c054').prop('disabled', true);
            }
            else{
                $('.tryagain').css('opacity', '1');
                $('.pig-form').find('input').css('background', '#ee3333');
            }


            if($('.chicken-form').find('input').val() == 'POULE'){
                $('.chicken-form').find('input').css('background', '#33c054').prop('disabled', true);
            }
            else{
                $('.tryagain').css('opacity', '1');
                $('.chicken-form').find('input').css('background', '#ee3333');
            }


            if($('.cat-form').find('input').val() == 'CHAT'){
                $('.cat-form').find('input').css('background', '#33c054').prop('disabled', true);
            }
            else{
                $('.tryagain').css('opacity', '1');
                $('.cat-form').find('input').css('background', '#ee3333');
            }
            if($('.horse-form').find('input').val() == 'CHEVAL' && $('.cow-form').find('input').val() == 'VACHE' && $('.sheep-form').find('input').val() == 'MOUTON' && $('.pig-form').find('input').val() == 'COCHON' && $('.chicken-form').find('input').val() == 'POULE'&& $('.cat-form').find('input').val() == 'CHAT'){
                $('.tryagain').text('Bravo, tu as trouvé tous les noms des animaux, mais Célestin s\'est encore enfui, passe vite à l\'énigme suivante pour le rattraper !').css('color', '#33c054').css('opacity', '1');
                $('.input-hidden').val('completed');
            }
            else{
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
                //$('.ban-form').submit();
                alert('pd');
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
    .tryleft{
        text-align: right;
        font-family: 'Skater Girls Rock';
        font-size: 30px;
        color: #33c054;
        margin: 10px;
    }
    .animal-form{
        display: inline-block;
        width: 25%;
        margin: 20px;
    }
    .animal-form img{
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
    .input-text{
        text-align: center;
        font-family: 'Skater Girls Rock';
        font-size: 25px;
        color: #222222;
        border: none;
        width: calc(100% - 20px);
        height: 35px;
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