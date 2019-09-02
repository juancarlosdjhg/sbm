<?php

include("../M/mConexion.php");   
class gestionBD{
        
        public $nom_archivo;
        public $host;
        public $puerto;
        public $user;
        public $pass;
        public $nameDB;
        public $conexion;


        function gestionBD(){

            $cnx = new conexion();
            $cnx->conectar();
            $dump_date = date("Ymd_Hs");

            $this->host=$cnx->host;
            $this->puerto=$cnx->port;
            $this->user=$cnx->host;
            $this->pass=$cnx->password;
            $this->nameDB=$cnx->dbname;
            $this->conexion=$cnx->conx;
            $this->nom_archivo="../V/backup/Respaldo_".$dump_date.".sql";


        }


    function backup()
    {
        
                $back = fopen($this->nom_archivo,"w");
                $res = pg_query(" select relname as tablename
                                from pg_class where relkind in ('r')
                                and relname not like 'pg_%' and relname not like 
                                'sql_%' order by tablename");
                $str="";
                    while($row = pg_fetch_row($res))
                        {
                            $table = $row[0];

                            $_def = pg_query("SELECT  adsrc AS def
                                            FROM pg_attribute, pg_class, pg_type, pg_attrdef WHERE 
                                            pg_class.oid=attrelid
                                            AND pg_type.oid=atttypid AND attnum>0 AND pg_class.oid=adrelid AND 
                                            adnum=attnum
                                            AND atthasdef='t' AND lower(relname)='$table'");

                            $_def=pg_fetch_array($_def);

                            $def=$_def[0];

                            if (eregi("^nextval", $def))
                                {

                                    $_t = explode("'", $def);
                                    $seq= $_t[1];

                                    $SQL = "SELECT * FROM ".$seq."\n";
                                    $val=pg_query($SQL);
                                        $val=pg_fetch_array($val);

                                        $_incrementby = $val["increment_by"];
                                            $_minvalue    = $val["min_value"];
                                            $_maxvalue    = $val["max_value"];
                                            $_lastvalue   = $val["last_value"]+1;
                                            $_cachevalue  = $val["cache_value"];
                                            
                                            $str .= "\n--\n";
                                            $str .= "DROP SEQUENCE IF EXISTS ".$seq." CASCADE;";
                                            $str .= "\n--\n";
                                            $str.=("CREATE SEQUENCE ".$seq." INCREMENT ".$_incrementby." MINVALUE ".$_minvalue." MAXVALUE ".$_maxvalue." START ".$_lastvalue." CACHE ".$_cachevalue." ;\n");


                                }

                            $str .= "\n--\n";

                            $str .= "\n\nDROP TABLE IF EXISTS $table CASCADE;";
                            $str .= "\nCREATE TABLE $table (";
                            $res2 = pg_query("SELECT  attnum,attname , typname , atttypmod-4 , attnotnull 
                                            ,atthasdef ,adsrc AS def
                                                FROM pg_attribute, pg_class, pg_type, pg_attrdef WHERE 
                                            pg_class.oid=attrelid
                                                AND pg_type.oid=atttypid AND attnum>0 AND pg_class.oid=adrelid AND 
                                            adnum=attnum
                                                AND atthasdef='t' AND lower(relname)='$table' UNION
                                                SELECT attnum,attname , typname , atttypmod-4 , attnotnull , 
                                            atthasdef ,'' AS def
                                                FROM pg_attribute, pg_class, pg_type WHERE pg_class.oid=attrelid
                                                AND pg_type.oid=atttypid AND attnum>0 AND atthasdef='f' AND 
                                            lower(relname)='$table' order by attnum");
                            
                                while($r = pg_fetch_row($res2))
                                    {
                                    $str .= "\n" . $r[1]. " " . $r[2];
                                     if ($r[2]=="varchar")
                                    {
                                    $str .= "(".$r[3] .")";
                                    }
                                    if ($r[4]=="t")
                                    {
                                    $str .= " NOT NULL";
                                    }
                                    if ($r[5]=="t")
                                    {
                                    $str .= " DEFAULT ".$r[6];
                                    }
                                    $str .= ",";
                                    }
                                $str=rtrim($str, ",");  
                                $str .= "\n);\n";


                                $res3 = pg_query("SELECT * FROM $table");
                                while($r = pg_fetch_row($res3))
                                    { 
                                        $str .= "\n";
                                        $sql = "INSERT INTO $table VALUES ('";
                                        $sql .= utf8_decode(implode("','",$r));
                                        $sql .= "');";
                                        $str = str_replace("''","NULL",$str);
                                        $str .= $sql;  
                                        $str .= "\n";
                                    }

                                $res1 = pg_query("SELECT pg_index.indisprimary,
                                                    pg_catalog.pg_get_indexdef(pg_index.indexrelid)
                                                FROM pg_catalog.pg_class c, pg_catalog.pg_class c2,
                                                    pg_catalog.pg_index AS pg_index
                                                WHERE c.relname = '$table'
                                                    AND c.oid = pg_index.indrelid
                                                    AND pg_index.indexrelid = c2.oid
                                                    AND pg_index.indisprimary");
                                while($r = pg_fetch_row($res1))
                                    {
                                        $t = str_replace("CREATE UNIQUE INDEX", "", $r[1]);
                                        $t = str_replace("USING btree", "|", $t);
                                        //Las siguientes lineas se pueden mejorar(fue improvisado)!!!
                                        $t = str_replace("ON", "|", $t);
                                        $Temparray = explode("|", $t);
                                        $str .= "ALTER TABLE ONLY ". $Temparray[1] . " ADD CONSTRAINT " . 
                                        $Temparray[0] . " PRIMARY KEY " . $Temparray[2] .";\n";
                                    }   
          
            
                        }
            
            
            $res = pg_query(" SELECT
             cl.relname AS tabela,ct.conname,
            pg_get_constraintdef(ct.oid)
            FROM pg_catalog.pg_attribute a
            JOIN pg_catalog.pg_class cl ON (a.attrelid = cl.oid AND cl.relkind = 'r')
            JOIN pg_catalog.pg_namespace n ON (n.oid = cl.relnamespace)
            JOIN pg_catalog.pg_constraint ct ON (a.attrelid = ct.conrelid AND
            ct.confrelid != 0 AND ct.conkey[1] = a.attnum)
            JOIN pg_catalog.pg_class clf ON (ct.confrelid = clf.oid AND 
            clf.relkind = 'r')
            JOIN pg_catalog.pg_namespace nf ON (nf.oid = clf.relnamespace)
            JOIN pg_catalog.pg_attribute af ON (af.attrelid = ct.confrelid AND
            af.attnum = ct.confkey[1]) order by cl.relname ");
                while($row = pg_fetch_row($res))
                    {
                        $str .= "ALTER TABLE ONLY ".$row[0] . " ADD CONSTRAINT " . $row[1] . 
                        " " . $row[2] . ";\n";
                    }       
                    
//==============================================================================                    
//================================== triggers ==================================
//==============================================================================  
                    
                $Body='$BODY$';              
                        
                    $str .= "\n\n";
                    $str .= "--trigger";
                    $str .= "\n\n";
                    $str .= "--Funciones";
                    $str .= "\n";
                    $str .= "DROP FUNCTION IF EXISTS llenarbitacora();";
                    $str .= "\n\n";
                        
                    $str .= "--Funcion: llenarbitacora()";
                    $str .= "\n";
                    $str .= "CREATE OR REPLACE FUNCTION llenarbitacora()
                                RETURNS trigger AS
                              ".$Body."

        DECLARE
        id_u integer;

        BEGIN

        IF (TG_OP = 'DELETE') THEN
        SELECT usuario INTO id_u from usuario_on;
         INSERT INTO bitacora(nombre_tabla,tipo_operacion,fecha,hora,id_usuario, viejo_valor, nuevo_valor) 
        SELECT TG_TABLE_NAME,'Eliminación',cast(now() as date),cast(now() as time),id_u,OLD, 'VACIO';
            RETURN OLD;
        ELSIF (TG_OP = 'UPDATE') THEN
             SELECT usuario INTO id_u from usuario_on;
         INSERT INTO bitacora(nombre_tabla,tipo_operacion,fecha,hora,id_usuario, viejo_valor, nuevo_valor) 
        SELECT TG_TABLE_NAME,'Modificación', cast(now() as date),cast(now() as time),id_u, OLD, NEW;
            RETURN NEW;
        ELSIF (TG_OP = 'INSERT') THEN
            SELECT usuario INTO id_u from usuario_on;
    INSERT INTO bitacora(nombre_tabla,tipo_operacion,fecha,hora,id_usuario, viejo_valor, nuevo_valor) 
        SELECT TG_TABLE_NAME,'Inclusión',cast(now() as date),cast(now() as time),id_u,'VACIO', NEW;
            RETURN NEW;
        END IF;
        RETURN NULL;
    END;
                            ".$Body."
  LANGUAGE plpgsql VOLATILE
  COST 100;
ALTER FUNCTION llenarbitacora()
  OWNER TO postgres;";



                    $str .= "--Funcion: logeo_usuario()";
                    $str .= "\n";
                    $str .= "\n";
                    $str .= "DROP FUNCTION IF EXISTS logeo_usuario();";
                    $str .= "\n\n";
                    $str .= "CREATE OR REPLACE FUNCTION logeo_usuario()
                                RETURNS trigger AS
                              ".$Body."
        BEGIN

        IF (TG_OP = 'DELETE') THEN
           
            INSERT INTO bitacora(nombre_tabla,tipo_operacion,fecha,hora,id_usuario, viejo_valor, nuevo_valor) 
        SELECT TG_TABLE_NAME,'Cerro Sesión',cast(now() as date),cast(now() as time),OLD.id_usuario,'VACIO', 'VACIO';
            RETURN OLD;
        ELSIF (TG_OP = 'INSERT') THEN
           INSERT INTO bitacora(nombre_tabla,tipo_operacion,fecha,hora,id_usuario, viejo_valor, nuevo_valor) 
        SELECT TG_TABLE_NAME,'Inicio Sesión',cast(now() as date),cast(now() as time),NEW.id_usuario,'VACIO', 'VACIO';
            RETURN NEW;
        END IF;
        RETURN NULL;
    END;
                              ".$Body."
        LANGUAGE plpgsql VOLATILE
        COST 100;
        ALTER FUNCTION logeo_usuario()
        OWNER TO postgres;";
                    $str .= "\n\n";
                    
                    
                    $tablasBit =Array("cargo","concepto_de_movimiento","entidad_propietaria","grupo",
                                    "proveedor","seccion","sub_categoria_especifica","subgrupo");
                    $str .= "--trigger de las tablas";
                    $str .= "\n";
                    for($i=0;$i<count($tablasBit);$i++){
                      $str .= "CREATE TRIGGER activarfuncion
                                AFTER INSERT OR UPDATE OR DELETE
                                ON $tablasBit[$i]
                                FOR EACH ROW
                                EXECUTE PROCEDURE llenarbitacora();";
                       $str .= "\n\n";
                    }
                    
                    $str .= "-- Fin";
                    $str .= "\n\n";
                    
            fwrite($back,$str);
            fclose($back);
            $this->dl_file($this->nom_archivo);
            
    }
            
            
    function restore(){             
            

        $back = fopen($this->nom_archivo,"r");
        $contents = fread($back, filesize($this->nom_archivo));
        $res = pg_query(utf8_encode($contents));
        if($res){
        echo "<script> alert('La copia de seguridad se ha restaurado correctamente. ') </script>";
        }
        else{
            echo "<script> alert('ERROR: nose ha podido restaurar') </script>";
        }
        fclose($back);

       echo "<meta http-equiv='refresh' content='0; url=../V/vGestionBD.php'>";
    }
   
    
   
    function dl_file($file){
       if (!is_file($file)) { die("<b>Pagina no encontrada!</b>"); }
       $len = filesize($file);
       $filename = basename($file);
       $file_extension = strtolower(substr(strrchr($filename,"."),1));
       $ctype="application/force-download";
       header("Pragma: public");
       header("Expires: 0");
       header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
       header("Cache-Control: public");
       header("Content-Description: File Transfer");
       header("Content-Type: $ctype");
       $header="Content-Disposition: attachment; filename=".$filename.";";
       header($header );
       header("Content-Transfer-Encoding: binary");
       header("Content-Length: ".$len);
       @readfile($file);
       exit;
    }        


            }
