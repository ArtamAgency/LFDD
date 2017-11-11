<?php $this->load->view('header') ?>
<body>
<div class="page-bg"></div>
<?php $this->load->view('nav'); ?>
<a class="tlt title" href="<?=base_url()?>">La ferme de Didier</a>
<div class="content">
    <h1>ENIGME 1</h1>
    <div class="content-2">
        <div class="content-2-left">
            <img class="puzzle" src="<?=base_url();?>asset/images/puzzle.png"/>
            <div class="puzzle-pieces">
                <h1>Bravo ! Tu as reconstitué le puzzle correctement mais Célestin s'est enfui, passe vite à l'énigme suivante pour le rattraper !</h1>
            </div>
        </div>
        <div class="content-2-right">
            <div class="description">
                <h1>REFERENCE DE L'ENIGME</h1>
                <h2>DESCRIPTION</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce tristique viverra risus, in semper lacus. Aliquam in tincidunt eros, at pharetra odio. Proin id enim fermentum, rutrum ipsum a, porttitor dui.</p>
            </div>
            <form method="POST" action="<?=base_url();?>Enigme/enigmeHandler/1">
                <input class="input-hidden" name="response" type="hidden" value="">
                <input class="next" type="submit" value="ÉNIGME SUIVANTE">
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

        $('.puzzle').snapPuzzle({
            rows:3,
            columns:3,
            pile: ".puzzle-pieces",
            containment: ".content-2-left",
            onComplete: function(){
                $('.puzzle-pieces').find('h1').show();
                $('.input-hidden').val('completed');
            }
        });

    });

</script>

<style type="text/css">




    .snappuzzle-wrap{
        position: relative;
        display: block;
        width: 60%;
        border-radius: 5px;
        overflow: hidden;
    }
    .snappuzzle-pile{
        position: relative;
    }
    .snappuzzle-piece{
        cursor: move;
    }
    .snappuzzle-slot{
        position: absolute;
        background: #fff;
        opacity: .98;
    }
    .snappuzzle-slot-hover{
        background: #eee;
    }



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
        align-items: center;
        justify-content: center;
        flex-direction: column;
        background: rgba(0,0,0,0.1);
        padding: 20px;
        border-radius: 5px;
        width: 780px;
        margin: 0 40px 0 0;
    }
    .content-2-left img{
        width: 100%;
        border-radius: 5px;
    }
    .puzzle-pieces{
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 200px;
    }
    .puzzle-pieces h1{
        display: none;
        text-align: center;
        font-size: 30px;
        width: 80%;
        color: #33c054;
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
    }
</style>
</body>
</html>