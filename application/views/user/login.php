<?php $this->load->view('header.php') ?>
<body>
<div class="page-bg"></div>
<?php $this->load->view('nav'); ?>
<a class="title" href="<?=base_url();?>">La ferme de Didier</a>
<div id="content">
    <img src="<?=base_url();?>asset/images/sheep.svg">
    <div id="center">
        <h1>Rejoins l'univers de Didier et sa ferme !</h1>
        <form method="POST" action="<?=base_url();?>connexion">
            <p>Pseudo</p>
            <input class="validate[required] input-text" type="text" name="login" value="<?php echo set_value('login'); ?>">
            <?php echo form_error('login'); ?>
            <p>Mot de passe</p>
            <input class="validate[required] input-text" type="password" id="inputPassword" name="password">
            <?php echo form_error('password'); ?>
            <input id="valider" type="submit" value="Valider">
        </form>
        <?php if ($this->session->flashdata('change')) : ?>
            <div class="alert alert-error">
                <strong><?= $this->session->flashdata('change')?><strong>
            </div>
        <?php endif ?>
    </div>
    <img src="<?=base_url();?>asset/images/pig.svg">
</div>
<footer>
    <a href="<?=base_url();?>Contact" >Contact</a>
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

    #content{
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 50px 0 100px 0;
    }
    #content img{
        position: relative;
        display: inline-block;
        width: 200px;
        margin: 50px;
    }
    #center{
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        width: 600px;
    }
    #center h1{
        position: relative;
        display: inline-block;
        font-family: 'Skater Girls Rock';
        font-size: 30px;
        color: #222222;
        font-weight: 500;
        background: rgba(0,0,0,0.1);
        width: 100%;
        padding: 25px 0 20px 0;
        margin: 10px 0;
        border-radius: 5px;
    }
    form{
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-wrap: wrap;
        font-family: 'Skater Girls Rock';
        color: #222222;
        background: rgba(0,0,0,0.1);
        width: 100%;
        border-radius: 5px;
    }
    form p{
        position: relative;
        display: inline-block;
        font-size: 25px;
        width: 40%;
        margin: 20 0px;
    }
    .input-text{
        position: relative;
        display: inline-block;
        font-family: 'Skater Girls Rock';
        font-size: 25px;
        color: #222222;
        border: none;
        width: 50%;
        height: 35px;
        padding: 10px;
        margin: 20px 0;
        border-radius: 5px;
    }
    .input-text:focus{
        outline: none;
    }
    #valider{
        position: relative;
        display: inline-block;
        width: 200px;
        height: 60px;
        font-family: 'Skater Girls Rock';
        font-size: 35px;
        color: #ffffff;
        background: #33c054;
        border: none;
        border-radius: 5px;
        padding: 5px 0 0 0;
        margin: 20px 0;
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