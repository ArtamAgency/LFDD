<?php $this->load->view('header') ?>
<body>
<div class="page-bg"></div>
<?php $this->load->view('nav'); ?>
<a class="title" href="<?=base_url();?>">La ferme de Didier</a>
	<div id="content">
		<img src="<?=base_url();?>asset/images/sheep.svg">
    <div id="center">
        <h1>
            Profil
            <a href="User/ranking">Classement</a>
            <?php if($enigme == 11): ?>
                <a href="Enigme/resetGame/<?= $_SESSION['user_infos'][0]['user_id']; ?>">Recommencer</a>
            <?php endif ?>
        </h1>
        
        <div id="center-bottom">
            <div class="infos-compte">
                <p><b>Pseudo : &nbsp;</b><?=$_SESSION['user_infos'][0]['user_name']?></p>
                <p><b>Email : &nbsp;</b><?=$_SESSION['user_infos'][0]['user_mail']?></p>
                <?php $enigme -= 1; ?>
                <p><b>Enigme(s) validée(s) : <?= $enigme; ?></b> / 10</p>
            </div>
            <div class="change-form">
                <form class="pswd-form" method="post" action="User/cgPassword">
                    <h1>Changer le mot de passe</h1>
                    <input class="validate[required] input-text" type="password" name="curpaswd" placeholder="Mot de passe actuel">
                    <?php echo form_error('curpaswd'); ?>

                    <input class="validate[required] input-text" type="password" placeholder="Nouveau mot de passe" name="newpaswd">
                    <?php echo form_error('newpaswd'); ?>

                    <input class="validate[required] input-text" type="password" placeholder="Répéter nouveau mot de passe" name="rpnewpaswd">
                    <?php echo form_error('rpnewpaswd'); ?>

                    <input class="valider" type="submit" value="Ok">
                </form>
                <form class="mail-form" method="post" action="User/cgMail">
                    <h1>Changer l'email</h1>
                    <input class="validate[required] input-text" type="email" name="curmail" placeholder="Email actuel">
                    <?php echo form_error('curmail'); ?>
                    <input class="validate[required] input-text" type="email" placeholder="Nouvel email" name="newmail">
                    <?php echo form_error('newmail'); ?>
                    <input class="valider" type="submit" value="Ok">
                    <form>
            </div>
            <a class="logout" href="User/logout">Se déconnecter</a>
            <?php if ($this->session->flashdata('change')) : ?>
                <div class="alert alert-error">
                    <strong><?= $this->session->flashdata('change')?><strong>
                </div>
            <?php endif ?>

        </div>
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

            $('.logout').mouseover(function(){
                $(this).css('transform', 'scale(0.98)');
            });
            $('.logout').mouseout(function(){
                $(this).css('transform', 'scale(1)');
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
            width: 800px;
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

        #center h1 a {
            text-decoration: none;
            padding-left: 50px;
        }

        #center h1 a:visited {
            color: #222222;
        }

        #center-bottom{
            position: relative;
            display: inline-block;
            background: rgba(0,0,0,0.1);
            width: 100%;
        }
        #center-bottom h1{
            background: none;
            padding: 0;
        }
        .infos-compte{
            display: inline-block;
            text-align: left;
            width: 40%;
        }
        .infos-compte p{
            font-family: 'Skater Girls Rock';
            font-size: 20px;
            color: #222222;
        }
        .change-form{
            display: flex;
            align-items: flex-start;
            justify-content: center;
            margin: 40px 0 0 0;
        }
        form{
            position: relative;
            display: inline-block;
            font-family: 'Skater Girls Rock';
            color: #222222;
            width: 48%;
            border-radius: 5px;
        }
        .input-text{
            position: relative;
            display: inline-block;
            font-family: 'Skater Girls Rock';
            font-size: 25px;
            color: #222222;
            border: none;
            width: 80%;
            height: 35px;
            padding: 10px;
            margin: 20px 0;
            border-radius: 5px;
        }
        .input-text:focus{
            outline: none;
        }
        .logout{
            display: inline-block;
            font-family: 'Skater Girls Rock';
            font-size: 35px;
            color: #ffffff;
            background: #ee3333;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            padding: 10px 15px 0 15px;
            margin: 20px;
            cursor: pointer;
            user-select: none;
            transition: 0.2s ease;
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
            .logout{
                padding: 15px 25px 0 25px;
            }
            .infos-compte p{
                font-size: 35px;
            }
        }
    </style>
</body>
</html>