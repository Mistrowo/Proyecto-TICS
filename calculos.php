<?php
    # Cantidad de meses restantes de cotizacion según género
    $tiempo_trabajo = 0;
    if($_POST['Sexo'] == 'Masculino'){
        $tiempo_trabajo = (65 - $_POST['Edad'])*12;
    }else if($_POST['Sexo'] == 'Femenino'){
        $tiempo_trabajo = (60 - $_POST['Edad'])*12;
    }
    
    # Cotizaciones = 10% del sueldo * cantidad de meses de trabajo restantes
    $cotizaciones = ($_POST['Sueldo']*0.1)*$tiempo_trabajo;

    # Calculo de ahorros
    if($_POST['Fondo'] != 0){
        # Ahorros de usuarios sin cambio de fondos
        $ahorros_afp = $cotizaciones + $_POST['Ahorro'];
        $final_afp = $ahorros_afp + $ahorros_afp*$AFP[$_POST['AFP']][$_POST['Fondo']]/100;
    }else{
        # Ahorro de usuarios con cambio de Fondo A hacia B
        if($_POST['Sexo'] = 'Masculino'){
            $tiempo_trabajo = (55-$_POST['Edad'])*12;
        }else if($_POST['Sexo'] = 'Femenino'){
            $tiempo_trabajo = (50-$_POST['Edad'])*12;
        }
        # Cálculo de ahorro antes de cambiar fondo
        $cotizaciones_A = ($_POST['Sueldo']*0.1)*$tiempo_trabajo;
        $ahorros_fondo_A = $cotizaciones_A + $_POST['Ahorro'];
        $final_fondo_A = $ahorros_fondo_A + $ahorros_fondo_A*($AFP[$_POST['AFP']][$_POST['Fondo']]/100);

        # Cálculo de ahorro despues de cambiar fondo
        $tiempo_trabajo = 120;
        $cotizaciones_B = ($_POST['Sueldo']*0.1)*$tiempo_trabajo;
        $ahorros_fondo_B = $cotizaciones_B + $final_fondo_A ;
        $final_afp = $ahorros_fondo_B + $ahorros_fondo_B*($AFP[$_POST['AFP']][1]/100);
    }
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