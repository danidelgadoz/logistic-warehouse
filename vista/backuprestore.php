<!DOCTYPE html>
<?php 
include('../modelo/conexionrestore.php');
include('../modelo/valida.php');

$enlace = "<a href='../modelo/logout.php'>Cerrar Sesion</a>";

    if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['databasename'])) {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $databasename = trim($_POST['databasename']);
        $backupRestore = $_POST['backupRestore'];
 
        if ($backupRestore == 'backup'){        
            $data = $_POST['data'];

            date_default_timezone_set('America/Lima');

            $now = str_replace(":", "", date("Y-m-d H:i:s"));
            $outputfilename = $databasename . '-' . $now . '.sql';
            $outputfilename = str_replace(" ", "-", $outputfilename);
 
            // Backup de la BD con mysqldump
            if ($data == "wd"){
                // Con Datos
                exec('D:\DEDD\UwAmp\bin\database\mysql-5.6.20\bin\mysqldump -u '. $username .' -p'. $password .' '. $databasename .' > '. $outputfilename);
            }
            else{
                // Sin Datos
                exec('D:\DEDD\UwAmp\bin\database\mysql-5.6.20\bin\mysqldump --no-data  -u '. $username .' -p'. $password .' '. $databasename .' > '. $outputfilename);
            }   
 
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename='.basename($outputfilename));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($outputfilename));
            ob_clean();
            flush();
            readfile($outputfilename);
         
                // Se mueve el archivo
            exec('rm ' . $outputfilename);  
 
        }
        else{

                // Restauramos la base de datos

            $enlace1 = mysql_connect('localhost:88', 'root', 'root');
            if (!$enlace1) {
                die('No pudo conectarse: ' . mysql_error());
            }

            $sql = 'CREATE DATABASE sist_almacen_by';
            if (mysql_query($sql, $enlace1)) {
                echo "<script type=\"text/javascript\">alert(\"La base de datos fue creada satisfactoriamente.\");</script>";
            } else {
                echo "<script type=\"text/javascript\">alert(\"Error al crear la base de datos.\");</script>"; 
            }    
            
            $target_path = getcwd();
            $databasefilename = $_FILES["databasefile"]["name"];
 
            // Se sube la BD al directorio actual
            move_uploaded_file($_FILES["databasefile"]["tmp_name"], $target_path . '/' . $databasefilename);
 
            // Se restaura la BD
            exec('D:\DEDD\UwAmp\bin\database\mysql-5.6.20\bin\mysql -u '. $username .' -p'. $password .' '. $databasename .' < '. $databasefilename);
        }
    }
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Sistema de Gestion Almacen</title>
        <link rel="stylesheet" href="../vista/css/style.css">
        <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
        <script type="text/javascript" src="../controlador/js/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="../controlador/js/jquery-ui-1.10.3.custom.min.js"></script>
        <script src="../controlador/js/jquery.dataTables.js" type="text/javascript"></script>
        <script src="../controlador/js/TableTools.min.js" type="text/javascript"></script>
        <style type="text/css">
            @import "../vista/css/demo_table_jui.css";
            @import "../vista/css/TableTools.css";
        </style>
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $(".restoreFile").hide();
            });
            function checkParameters(){
                var username = $.trim($("#username").val());
                var password = $.trim($("#password").val());
                var databasename = $.trim($("#databasename").val());
                if (username == ""){
                    alert("Por favor, ingrese el nombre de usuario MySQL.");return false;
                }
                else if (password == ""){
                    alert("Por favor, ingrese la contraseña MySQL.");return false;
                }
                else if (databasename == ""){
                    alert("Por favor, ingrese el nombre de la BD.");return false;
                }
                else if($("#restore").is(':checked')){
                    var filename = $(".restoreFile").val();
                    if(filename == ""){
                        alert("Por favor, escoja un archivo.");return false;
                    }
                    else{
                        var valid_extensions = /(\.db|\.sql)$/;   
                        if (!valid_extensions.test(filename)){ 
                            alert('Archivo de formato invalido. Elija otro.');return false;
                        }                   
                    }
                }
                else{
                    return true;
                }
            }
            function showHide(id){
                if (id == "backup"){
                    $(".backupRadio").show();
                    $(".restoreFile").hide();
                }
                else{
                    $(".backupRadio").hide();
                    $(".restoreFile").show();
                }
            }
        </script>
    </head>
    <body>

    <div class="container">
        <div class="header"></div>
        <div class="menu-div">
            <?php include('../vista/include/menu.php'); ?>
        </div>
        <div class="sidebar">
            <div class="menuside">
                <?php include('../vista/include/sidebar.php'); ?>
            </div>
        </div>
        <div class="content">
            <div class="main">
                <fieldset class="data">
                        <legend><strong>Backup y Restore</strong></legend>
                        

                <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" onsubmit="return checkParameters();" enctype="multipart/form-data">
                    <div class="divformu">
                    <label for="">User MySQL : &nbsp;&nbsp;</label>
                    <input type="text" id="username" name="username">
                    </div>

                    <div class="divformu">
                    <label for="">Password MySQL : </label>
                    <input type="text" id="password" name="password">
                    </div>

                    <div class="divformu">
                    <label for="">Nombre BD : </label>
                    <input type="text" id="databasename" name="databasename">
                    </div>

                <table>
                <tr>
                <td colspan="2">Backup <input type="radio" name="backupRestore" id="backup" value="backup" checked="true" onclick="showHide(this.id);" /></td>
                <td>
                    <div class="backupRadio">
                        <input type="radio" name="data" value="wd" checked="true" />Todo
                        <input type="radio" name="data" value="wod"/>Solo Estructura de Tablas
                    </div>
                </td>
            </tr>
            <tr>
                <td>Restore <input type="radio" name="backupRestore" id="restore" value="restore" onclick="showHide(this.id);" /></td>
                <td></td>
                <td><input class="restoreFile" type="file" name="databasefile" /></td>
            </tr>
        </table>       
                
                <center>
                <div class="divboton">
                    <input align="center" type="submit" class="boton" value="Aceptar">
                    <input align="center" type="reset" class="boton" value="Limpiar"> </a>
                </div>
                </center>
                </form>
            </div>
        </div>
        <div class="footer">
            <?php include('../vista/include/footer.php'); ?>
        </div>
    </div>
    </body>   
</html>