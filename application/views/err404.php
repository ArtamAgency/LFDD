<?php $this->load->view('header') ?>
<body>
<div class="page-bg"></div>
<?php $this->load->view('nav'); ?>
<div id="content">
    <h1>404</h1>
    <h2>Tu as l'air perdu !</h2>
    <h3>CLIQUE SUR LA MAISON POUR RETROUVER TON CHEMIN</h3>
    <a href="index.html"><img src="<?=base_url();?>asset/images/barn.svg"/></a>
</div>
<footer>
    <a href="#" >Contact</a>
    <a href="#">Nos jeux</a>
    <a class="infos-legales" href="#">Informations légales</a>
</footer>


<!--	JAVASCRIPT 	-->

<script type="text/javascript">

    $(document).ready(function(){


    });

</script>

<style type="text/css">

    #content{
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        margin: 50px 0 100px 0;
    }
    #content h1{
        font-family: 'Alamain';
        font-size: 150px;
        color: #222222;
        height: 300px;
        margin: 0;
    }
    #content h2{
        font-family: 'Skater Girls Rock';
        font-size: 60px;
        color: #222222;
        margin: 0;
    }
    #content h3{
        font-family: 'Skater Girls Rock';
        font-size: 30px;
        color: #222222;
        margin: 0;
    }
    #content a{
        width: 150px;
        margin: 50px;
    }

    @media screen and (max-width: 1080px){
        #content{
            flex-direction: column;
        }
    }

</style>
</body>
</html>