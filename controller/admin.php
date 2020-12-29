<?php
    if( !isset($_SESSION["admin"]) ) {
        header("Location: " .BASE_PATH. "booking");
        exit;
    }

    require("model/specialties.php");
    require("model/doctors.php");
   

    require("view/admin.php");


    /***************ADMIN***************/
    /**TO DO: *******/
    /**CRIAR COLUNA EXTRA (ADMIN C BOLEAN) NA TABELA PATIENTS QUE NESTE CASO SÃO OS MEUS USERS. 
     * VERIFICAR SE A SESSÃO ESTÁ INICIADA COM ADMIN E DEVOLVER VIEW ADMIN A SER CRIADA. DE MODO A EDITAR
     * SPECIALTIES, DOCTORS...***/