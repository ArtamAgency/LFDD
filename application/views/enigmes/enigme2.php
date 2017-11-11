<?php $this->load->view('header.php') ?>
<body>
<div class="page-bg"></div>
<?php $this->load->view('nav'); ?>
<a class="tlt title" href="<?=base_url();?>">La ferme de Didier</a>
<div class="content">
    <h1>ENIGME 2</h1>
    <div class="content-2">
        <div class="content-2-left">
            <div class="alert">
                <h1>Bravo ! Tu as trouvé une différence, il n'en reste plus que 6.</h1>
                <a>Ok</a>
            </div>
            <div class="hitbox" id="arbre"></div>
            <div class="hitbox" id="tracteur"></div>
            <div class="hitbox" id="pomme"></div>
            <div class="hitbox" id="nuage"></div>
            <div class="hitbox" id="mouton"></div>
            <div class="hitbox" id="mouton2"></div>
            <div class="hitbox" id="poussin"></div>
            <img onmousedown="return false" src="<?=base_url();?>asset/images/7differences.png"/>
        </div>
        <div class="content-2-right">
            <div class="description">
                <h2>CONSIGNE</h2>
                <p>Il y a 7 différences entre cette image et celle sur le livre. Trouve-les et clique dessus !</p>
            </div>
            <form method="POST" action="<?=base_url();?>Enigme/enigmeHandler/2">
                <input class="input-hidden" name="response" type="hidden" value="">
                <input class="next" type="submit" value="ÉNIGME SUIVANTE">
            </form>
        </div>
    </div>
</div>
<footer>
    <a href="#" >Contact</a>
    <a href="">Nos jeux</a>
    <a class="infos-legales" href="#">Informations légales</a>
</footer>


<!--	JAVASCRIPT 	-->

<script type="text/javascript">

    $(document).ready(function(){

        var completion = 0;
        $('#mouton').click(function(){
            $(this).hide();
            $('.alert').css('display', 'flex');
            completion++;
        });
        $('#tracteur').click(function(){
            $(this).hide();
            $('.alert').css('display', 'flex');
            completion++;
        });
        $('#pomme').click(function(){
            $(this).hide();
            $('.alert').css('display', 'flex');
            completion++;
        });
        $('#arbre').click(function(){
            $(this).hide();
            $('.alert').css('display', 'flex');
            completion++;
        });
        $('#mouton2').click(function(){
            $(this).hide();
            $('.alert').css('display', 'flex');
            completion++;
        });
        $('#nuage').click(function(){
            $(this).hide();
            $('.alert').css('display', 'flex');
            completion++;
        });
        $('#poussin').click(function(){
            $(this).hide();
            $('.alert').css('display', 'flex');
            completion++;
        });
        $('.alert').find('a').click(function(){
            $('.alert').hide();
        });
        $('.hitbox').click(function(){
            $('.alert').find('h1').text('Bravo ! Tu as trouvé une différence, il n\'en reste plus que '+(7 - completion)+'.');
            if(completion == 7){
                $('.alert').find('a').hide();
                $('.alert').find('h1').css('font-size', '40px').text('Tu as réussi cette énigme mais Célestin s\'est encore enfui, passe vite à l\'énigme suivante pour le rattraper !');
                $('.input-hidden').val('completed');
            }
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
        position: relative;
        display: flex;
        align-items: flex-start;
        justify-content: center;
        width: 780px;
        margin: 0 40px 0 0;
    }
    .content-2-left img{
        width: 100%;
        border-radius: 5px;
        user-select: none;
    }
    .hitbox{
        position: absolute;
        transform: translateX(-50%) translateY(-50%);
        z-index: 10;
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
    #arbre{
        top: 40.5%;
        left: 51.5%;
        height: 70px;
        width: 60px;
    }
    #mouton{
        top: 72%;
        left: 71.5%;
        height: 55px;
        width: 65px;
    }
    #tracteur{
        top: 56.5%;
        left: 60%;
        height: 100px;
        width: 115px;
    }
    #pomme{
        top: 64%;
        left: 15%;
        height: 35px;
        width: 35px;
    }
    #poussin{
        top: 51%;
        left: 29%;
        height: 30px;
        width: 25px;
    }
    #mouton2{
        top: 57.5%;
        left: 41%;
        height: 50px;
        width: 40px;
    }
    #nuage{
        top: 20%;
        left: 33%;
        height: 55px;
        width: 85px;
    }
    .alert{
        position: absolute;
        display: none;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        background: rgba(0,0,0,0.5);
        border-radius: 5px;
        width: 100%;
        height: 100%;
        z-index: 20;
    }
    .alert h1{
        font-family: 'Skater Girls Rock';
        font-size: 40px;
        color: #ffffff;
        width: 80%;
        text-align: center;
    }
    .alert a{
        font-family: 'Skater Girls Rock';
        font-size: 50px;
        color: #ffffff;
        width: 150px;
        height: 70px;
        background: #33c054;
        padding: 25px 0 0 0;
        margin: 20px;
        border-radius: 5px;
        cursor: pointer;
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
    }
</style>
</body>
</html>