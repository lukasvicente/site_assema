<?php 

//ini_set('display_errors', 1);
//ini_set('display_startup_erros', 1);
//error_reporting(E_ALL);
require_once "app/control/UtilWebservice.php"; 
  
        $GRUPO_SERVICO_WEBSERVICE =
        UtilWebservice::$HOST_NAME .
        UtilWebservice::$PROJECT_NAME .
        UtilWebservice::$WEBSERVICE_DIRECTORY .
        "SliderNoticiaWebservice.class.php";

        $jsonData = file_get_contents( $GRUPO_SERVICO_WEBSERVICE );
        $jsonServicos = json_decode( $jsonData, true );
        $successServico = $jsonServicos[UtilWebservice::$SUCCESS_TAG];
        $dadosJson = $jsonServicos[UtilWebservice::$DADOS_TAG];
        
        $div = '<main class="container section no-pad-bot">
        <div class="row" > <div class="slider">
        <ul class="slides bluee lighten-1 z-depth-4" style="border-radius: 15px 50px 30px; ">
        ';

        echo $div;

        if( $successServico == 1 )
        {
        
            mountSlider( $dadosJson );
             
        }else if( $successServico == 2 )
        {
             
            //new TMessage( 'INFO', 'Nenhum valor foi encontrado.' );
             
        }else if( $successServico == 0 )
        {
             
            //new TMessage( 'INFO', 'Ocorreu um problema, tente novamente.' );
             
        }

    function mountSlider( $values )
    {
        foreach ($values as $key) {

       $descricao = substr( $key['descricao'], 0,80 ) . "...";
       $titulo = substr( $key['titulo'], 0,50 ) . "...";

       $className =  'sliderdiv';
       $div = '<li> <img style="border-radius: 15px 50px 30px; padding: 100px; " src="'. UtilWebservice::$HOST_NAME . UtilWebservice::$PROJECT_NAME .'app/images/site/'. strtolower($key['tipo']) .'/'. $key['nomearquivo'] .'"> <div  class="caption center-align '. $className .'">
                <h4 style="text-shadow: 2px 2px #000;">'.  $titulo .'</h4>
                <h6 class="light grey-text text-lighten-3" style="text-shadow: 2px 2px #000;" >'.$descricao.'</h6>
              </div>
             ';

        
  echo $div;

    }
  }

  $div ='</div>
      </li>
      
    </ul>
  </div>
';
echo $div;
    ?>
<section>

    <div class="intro-message center-align">
      <h3>Destaques</h3>
      <hr class="intro-divider">
    </div>
<?php 
        $DESTAQUE_SERVICO_WEBSERVICE =
        UtilWebservice::$HOST_NAME .
        UtilWebservice::$PROJECT_NAME .
        UtilWebservice::$WEBSERVICE_DIRECTORY .
        "DestaqueWebservice.class.php";

        $jsonData = file_get_contents( $DESTAQUE_SERVICO_WEBSERVICE );
        $jsonServicos = json_decode( $jsonData, true );
        $successServico = $jsonServicos[UtilWebservice::$SUCCESS_TAG];
        $dadosJson = $jsonServicos[UtilWebservice::$DADOS_TAG];
        
        if( $successServico == 1 )
        {
        
            mountDestaque( $dadosJson );

             
        }else if( $successServico == 2 )
        {
             
            //new TMessage( 'INFO', 'Nenhum valor foi encontrado.' );
             
        }else if( $successServico == 0 )
        {
             
            //new TMessage( 'INFO', 'Ocorreu um problema, tente novamente.' );
             
        }
      


function mountDestaque( $values )
    {
        foreach ($values as $key) {

       $descricao = substr( $key['descricao'], 0,80 ) . "...";
       $titulo = substr( $key['titulo'], 0,50 ) . "...";

       
       $div1 = '<div class="row">

      <div class="col s12 m4 l4"> <!-- Note that "m4 l3" was added -->
        <div>

          <div class="card-panel hoverable"> <i class="large material-icons">insert_chart</i> <br><b>'.$key['titulo'].'</b> <br> <br>&nbsp; '.$key['descricao'].'
        </div>

      </div>  <!-- Grey navigation panel

              This content will be:
          3-columns-wide on large screens,
          4-columns-wide on medium screens,
          12-columns-wide on small screens  -->
      </div>';   
  echo $div1;


    }

  }
?>

      </div>   
      
    <div class="intro-message center-align">
      <h3>Parceiros</h3>
      <hr class="intro-divider">
    </div>
     
    <div class="col  m3 s6 center-align">
      <a href="#">
        <img height="130px" src="app/images/ceres.png" alt="">
      </a>
      <a href="http://www.emater.rn.gov.br/" target="_blank">
        <img height="130px" src="app/images/LOGO_EMATER.png" alt="">
      </a>
    </div>
     
</main>
<section/>
