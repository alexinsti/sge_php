<!-- Header -->
<?php
    require_once('header.php');
?>

<!-- Activación de avisos -->
    <?php 

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    ?>

<!-- Procesamiento de datos -->
    <?php 
        echo $_SERVER['PHP_SELF'];
        echo" prueba";
    
        if(isset($_POST['submit'])){
            
            echo"Los valores de las variables son: ".$_POST['fName'].",".$_POST['lName'].",".$_POST['eMail'].",".$_POST['date'].",".$_POST['time'].",".$_POST['number'].",".$_POST['description'].",".$_POST['actions'].",".$_POST['saw'].",".$_POST['additions'];
            if(empty($_POST['fName']) || empty($_POST['lName']) || empty($_POST['eMail'])){
                $error=-1;
                $msgerror="Los campos marcados son necesarios";
            }else{
                //Data Harvesting
                $name= $_POST['fName'].' '.$_POST['lName'];
                $eMail= $_POST['eMail'];
                $date= $_POST['date'];
                $time= $_POST['time'];
                $number= $_POST['number'];
                $description= $_POST['description'];
                $actions= $_POST['actions'];
                
                
                //Campos para el email
                $from = $eMail;
                $to="correofalso@gmail.com";
                $subject="Avistamiento de abduccion de Fang";
                $msg="El individuo llamado ".$name;
                $msg.="los datos entregados son: \n 
                        fecha: $date";
                $header="From: ".$from."\r\n" .
                        "Reply-To: ". $email ."\r\n".
                        "X-Mailer: PHP/".phpversion();
            
                echo $msg;
            
                //Se manda el mensaje comprobando los campos necesarios
                if(mail($to, $subject, $msg, $header)){
                    $error=0;
                    $msgerror="El correo se ha podido enviar";
                    
                    
                }else{
                    
                    $error=-1;
                    $msgerror="El correo no se ha podido enviar";
                    
                }
            
            }
            
            
        }
    
        
    ?>

    <h1 style ="color: red">Aliens Abducted Me - Report an Abduction</h1>
    <form action="manejador.html"></form>

    <h2 style="color: darkcyan">Share your story of alien abduction:</h2>
    
    <!--
    <?php 
        if(isset($error)){
           echo '<p class="error.$error. >'. $errormsg .'</p>';
        }else{
            echo '<p class="error.$error. >'. $errormsg .'</p>';
        }
        
        
    ?>-->
    <?php 
        echo $error. " ". $msgerror;
    ?>
    <div style="align: center; display:flex">
        
            <div class="perro" style="float: left; width: 50%">
                   
            </div>
           
            <div style="width: 50%; padding 20px">
                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                    <div style="display:flex">
                        <div style="width: 50%; display:flex; align-items: flex-start; flex-direction: column">
                            <label for="fName">First name: *</label>
                            <label for="lName">Last name: *</label>
                            <label for="eMail">What is your e-mail address? *</label>
                            <label for="date">When did it happen?</label>
                            <label for="time">How long where you gone?</label>
                            <label for="number">How many did you see?</label>
                            <label for="description">Describe them:</label>
                            <label for="actions">What did they do to you?</label>
                        
                        </div>

                        
                        <div style="width: 50%; display:flex; align-items: flex-end; flex-direction: column">
                            <input type="text" id="fName" name="fName" value="" class="dcha">
                            <input type="text" id="lName" name="lName" value="" class="dcha">
                            <input type="text" id="eMail" name="eMail" value="" class="dcha">
                            <input type="text" id="date" name="date" value="" class="dcha">
                            <input type="text" id="time" name="time" value="" class="dcha">
                            <input type="text" id="number" name="number" value="" class="dcha">
                            <input type="text" id="description" name="description" value="" class="dcha">
                            <input type="text" id="actions" name="actions" value="" class="dcha">

                        </div>

                        
                    </div>
                  
                    <div>
                        <p>Have you seen my dog Fang?</p>
                        <input type="radio" id="Yes" name="saw" value="Yes">
                        <label for="Yes">Yes</label><br/>
                        <input type="radio" id="No" name="saw" value="Yes">
                        <label for="No">No</label><br/>
                    </div>
                      
                    <div>
                        <label for="additions">Anything else you want to add?</label><br/>
                        <textarea id="additions" name="additions" rows="4" cols="50" style="width: 100%" > </textarea><br/>
                    </div>
                  
                    <input type="submit" value="Enviar" name="submit" style="color:white; background:blue" class="button">
                </form> 
                
               

        </div>
        
    </div>
    
    <p>las variables son: <br/>
        Nombre=<?php echo $_POST['fName'] ?> <br/>
        Apellido=<?php echo $_POST['lName'] ?> <br/>
        E-mail=<?php echo $_POST['eMail'] ?> <br/>
        Fecha=<?php echo $_POST['date'] ?> <br/>
        Duración=<?php echo $_POST['time'] ?> <br/>
        Número=<?php echo $_POST['number'] ?> <br/>
        Descripción=<?php echo $_POST['description'] ?> <br/>
        Acciones=<?php echo $_POST['actions'] ?> <br/>
        Perro=<?php echo $_POST['saw'] ?> <br/>
        Extras=<?php echo $_POST['additions'] ?> <br/>
    </p>
    

<!-- Footer -->   
<?php
    require_once('footer.php');
?>