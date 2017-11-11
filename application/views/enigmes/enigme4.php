<?php $this->load->view('header') ?>
<body>
<div class="page-bg"></div>
<?php $this->load->view('nav'); ?>
<a class="tlt title" href="<?=base_url();?>">La ferme de Didier</a>
<div class="content">
    <h1>ENIGME 4</h1>
    <div class="content-2">
        <div class="content-2-left">
            <div class="animal-form pig-form">
                <img src="<?=base_url();?>asset/images/headset.svg" onmousedown="return false"/>
                <audio src="<?=base_url();?>asset/sounds/pig.wav"></audio>
                <input class="input-text" type="text" onkeydown="this.value = this.value.toUpperCase()" onkeyup="this.value = this.value.toUpperCase()">
            </div>
            <div class="animal-form sheep-form">
                <img src="<?=base_url();?>asset/images/headset.svg" onmousedown="return false"/>
                <audio src="<?=base_url();?>asset/sounds/sheep.wav"></audio>
                <input class="input-text" type="text" onkeydown="this.value = this.value.toUpperCase()" onkeyup="this.value = this.value.toUpperCase()">
            </div>
            <div class="animal-form cow-form">
                <img src="<?=base_url();?>asset/images/headset.svg" onmousedown="return false"/>
                <audio src="<?=base_url();?>asset/sounds/cow.wav"></audio>
                <input class="input-text" type="text" onkeydown="this.value = this.value.toUpperCase()" onkeyup="this.value = this.value.toUpperCase()">
            </div>
            <div class="animal-form horse-form">
                <img src="<?=base_url();?>asset/images/headset.svg" onmousedown="return false"/>
                <audio src="<?=base_url();?>asset/sounds/horse.wav"></audio>
                <input class="input-text" type="text" onkeydown="this.value = this.value.toUpperCase()" onkeyup="this.value = this.value.toUpperCase()">
            </div>
            <div class="animal-form dog-form">
                <img src="<?=base_url();?>asset/images/headset.svg" onmousedown="return false"/>
                <audio src="<?=base_url();?>asset/sounds/dog.wav"></audio>
                <input class="input-text" type="text" onkeydown="this.value = this.value.toUpperCase()" onkeyup="this.value = this.value.toUpperCase()">
            </div>
            <div class="animal-form chicken-form">
                <img src="<?=base_url();?>asset/images/headset.svg" onmousedown="return false"/>
                <audio src="<?=base_url();?>asset/sounds/chicken.mp3"></audio>
                <input class="input-text" type="text" onkeydown="this.value = this.value.toUpperCase()" onkeyup="this.value = this.value.toUpperCase()">
            </div>
            <a class="valider">Ok</a>
            <p class="tryagain">Il y a des erreurs, vérifie les noms et réessaye !</p>
        </div>
        <div class="content-2-right">
            <div class="description">
                <h1>REFERENCE DE L'ENIGME</h1>
                <h2>DESCRIPTION</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tristique viverra risus, in semper lacus. Aliquam in tincidunt eros, at pharetra odio. Proin id enim fermentum, rutrum ipsum a, porttitor dui.</p>
            </div>
            <form method="POST" action="Enigme/enigmeHandler/4">
                <input class="input-hidden" name="response" type="hidden" value="">
                <input class="next" type="submit" value="ÉNIGME SUIVANTE">
            </form>
        </div>
    </div>
</div>
<footer>
    <a href="contact.html" >Contact</a>
    <a href="next.html">Nos jeux</a>
    <a class="infos-legales" href="next.html">Informations légales</a>
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
        $('')


        var essai = 0;
        completion = 0;

        $('.animal-form').find('img').mouseover(function(){
            if(completion != 6){
                $(this).css('transform', 'scale(0.98)');
            }
        });
        $('.animal-form').find('img').mouseout(function(){
            if(completion != 6){
                $(this).css('transform', 'scale(1)');
            }
        });
        $('.animal-form').find('img').click(function(){
            if(completion != 6){
                $(this).css('transform', 'scale(0.95)').one('transitionend', function(){
                    $(this).css('transform', 'scale(1)');
                });
                $(this).next('audio')[0].play();
            }
        });

        $('.valider').click(function(){
            if($('.horse-form').find('input').val() == 'CHEVAL'){
                completion++;
                $('.horse-form').find('input').css('background', '#33c054').prop('disabled', true);
                $('.horse-form').find('img').attr('src', '<?=base_url();?>asset/images/horse.svg').css('cursor', 'default');
            }
            else{
                $('.tryagain').css('opacity', '1');
                $('.horse-form').find('input').css('background', '#ee3333');
            }


            if($('.cow-form').find('input').val() == 'VACHE'){
                completion++;
                $('.cow-form').find('input').css('background', '#33c054').prop('disabled', true);
                $('.cow-form').find('img').attr('src', '<?=base_url();?>asset/images/cow.svg').css('cursor', 'default');
            }
            else{
                $('.tryagain').css('opacity', '1');
                $('.cow-form').find('input').css('background', '#ee3333');
            }


            if($('.sheep-form').find('input').val() == 'MOUTON'){
                completion++;
                $('.sheep-form').find('input').css('background', '#33c054').prop('disabled', true);
                $('.sheep-form').find('img').attr('src', '<?=base_url();?>asset/images/sheep.svg').css('cursor', 'default');
            }
            else{
                $('.tryagain').css('opacity', '1');
                $('.sheep-form').find('input').css('background', '#ee3333');
            }


            if($('.pig-form').find('input').val() == 'COCHON'){
                completion++;
                $('.pig-form').find('input').css('background', '#33c054').prop('disabled', true);
                $('.pig-form').find('img').attr('src', '<?=base_url();?>asset/images/pig.svg').css('cursor', 'default');
            }
            else{
                $('.tryagain').css('opacity', '1');
                $('.pig-form').find('input').css('background', '#ee3333');
            }


            if($('.chicken-form').find('input').val() == 'POULE'){
                completion++;
                $('.chicken-form').find('input').css('background', '#33c054').prop('disabled', true);
                $('.chicken-form').find('img').attr('src', '<?=base_url();?>asset/images/chicken.svg').css('cursor', 'default');
            }
            else{
                $('.tryagain').css('opacity', '1');
                $('.chicken-form').find('input').css('background', '#ee3333');
            }


            if($('.dog-form').find('input').val() == 'CHIEN'){
                completion++;
                $('.dog-form').find('input').css('background', '#33c054').prop('disabled', true);
                $('.dog-form').find('img').attr('src', '<?=base_url();?>asset/images/dog.svg').css('cursor', 'default');
            }
            else{
                $('.tryagain').css('opacity', '1');
                $('.dog-form').find('input').css('background', '#ee3333');
            }


            if(completion == 6){
                $('.tryagain').text('Bravo, tu as bien reconnus les cris des animaux, mais Célestin s\'est encore enfuit, passe vite à l\'énigme suivante pour le rattraper !').css('color', '#33c054').css('opacity', '1');
                $('.input-hidden').val('completed');
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
    .animal-form{
        display: inline-block;
        width: 25%;
        margin: 20px;
    }
    .animal-form img{
        width: 60%;
        margin: 0 20px 20px 20px;
        cursor: pointer;
        transition: 0.2s ease;
    }
    .tryagain{
        font-family: 'Skater Girls Rock';
        font-size: 30px;
        color: #ee3333;
        width: 100%;
        opacity: 0;
        margin: 0 0 20px 0;
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
    .valider{
        display: block;
        width: 65px;
        height: 35px;
        font-family: 'Skater Girls Rock';
        font-size: 35px;
        color: #ffffff;
        background: #33c054;
        border: none;
        border-radius: 5px;
        padding: 15px 0 5px 0;
        margin: 0 auto 30px auto;
        cursor: pointer;
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