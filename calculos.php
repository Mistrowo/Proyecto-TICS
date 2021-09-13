<?php
    # Cantidad de meses restantes de cotizacion según género
    $tiempo_trabajo = 0;
    if($_POST['Sexo'] == 'Masculino'){
        $tiempo_trabajo = 65 - $_POST['Edad'];
    }else if($_POST['Sexo'] == 'Femenino'){
        $tiempo_trabajo = 60 - $_POST['Edad'];
    }
    # Cotizaciones = 10% del sueldo
    $cotizaciones = ($_POST['Sueldo']*0.1)*12;

    #Inicializar variables para condiciones
    $FondA = false;
    $Fondox = $_POST['Fondo'];
    $ahorros_afp = $_POST['Ahorro'];
    
    #En el caso de ser fondo A
    if($Fondox == 0){
        $FondA = true;
        $Fondox = 1;
        $tiempo_trabajo = $tiempo_trabajo - 10;     
    }

    # Calculo de ahorros
    for($i = 0; $i < $tiempo_trabajo ; $i++){
        # Ahorros de usuarios sin cambio de fondos
        $ahorros_afp = $cotizaciones + $ahorros_afp;
        $ahorros_afp = $ahorros_afp + $ahorros_afp*$AFP[$_POST['AFP']][$_POST['Fondo']]/100;
    }
    if($FondA){
        for($i =0; $i < 10 ; $i++){
            $ahorros_afp = $cotizaciones + $ahorros_afp;
            $ahorros_afp = $ahorros_afp + $ahorros_afp*$AFP[$_POST['AFP']][1]/100;
        }
    }
    $final_afp = $ahorros_afp;

    # Monto final ahorrado
    $total_ahorro = $final_afp;
        
    # Cálculo de pensión
    if($_POST['Sexo'] = 'Masculino'){
        $tiempo_pension = 15*12; # asumiendo que la esperanza de vida en chile para un hombre es de 80 años y se jubila a los 65
    }
    if($_POST['Sexo'] = 'Femenino'){
        $tiempo_pension = 25*12; # asumiendo que la esperanza de vida en chile para una mujer es de 85 años  y se jubila a los 60
    }
    $pension = $total_ahorro/$tiempo_pension;

#Obtiene monto de Apv necesario para alcanzar la pensión deseada

    #Validacion de datos ingresados
    if($pensionX){
    if($_POST['Pension'] > 0){

    #Cantidad de meses de pensión y cotizaciones
    if($_POST['Sexo'] == 'Masculino'){
        $tiempo_pension = 180; # Asumiendo que la esperanza de vida en chile para un hombre es de 80 años y se jubila a los 65
        $tiempo_trabajo = (65 - $_POST['Edad'])*12;
    }
    if ($_POST['Sexo'] == 'Femenino'){
        $tiempo_pension = 300 ;# Asumiendo que la esperanza de vida en chile para una mujer es de 85 años y se jubila a los 60
        $tiempo_trabajo = (60 - $_POST['Edad'])*12;
    }

    #Obtención del Apv requerido
    $monto_total_deseado = ($_POST['Pension'] - $pension)*$tiempo_pension;

    $apv = ($monto_total_deseado) / $tiempo_trabajo;

    $AhorroVolun = $monto_total_deseado;
    }
}
?>