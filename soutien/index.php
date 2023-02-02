<?php 

require './operation.php';

$form = [
        'nb1' => 0,
        'nb2' => 0,
        'calcul' => "",
        'calcul_surface' => ""
    ];

$result = 0;
$result_surface = 0;
    
if(isset($_POST['nb1'])){
   $form['nb1'] = intval($_POST['nb1']);
}

if(isset($_POST['nb2'])){
    $form['nb2'] = intval($_POST['nb2']);
}

if(isset($_POST['calcul'])){
    $form['calcul'] = $_POST['calcul'];
}

if(isset($_POST['calcul_surface'])){
    $form['calcul_surface'] = $_POST['calcul_surface'];
}

if($form['calcul'] === 'add'){
    
    $result = add($form['nb1'], $form['nb2']);
    
}else if($form['calcul'] === 'substract'){
    
    $result = substract($form['nb1'], $form['nb2']);
    
}else if($form['calcul'] === 'multiply'){
    
    $result = multiply($form['nb1'], $form['nb2']);
    
}else if($form['calcul'] === 'divide'){
    
    if(divide($form['nb1'], $form['nb2']) === null){
        $result = "Désolé, mon intelligence ne sait pas divisé par zéro";
    }else{
        $result = divide($form['nb1'], $form['nb2']);
    }
    
}else if($form['calcul'] === 'modulo'){
    
    if(moldu($form['nb1'], $form['nb2']) === null){
        
        $result = "Désolé, mon intelligence ne sait pas faire le modulo de 0";
    }else{
        $result = moldu($form['nb1'], $form['nb2']);
    }
    
}else if($form['calcul'] === 'power'){
    
    $result = power($form['nb1'], $form['nb2']);
    
}else if($form['calcul'] === 'factorial'){
    
    $result = factorial($form['nb1']);
    
}else if($form['calcul_surface'] === 'rectangle_surface'){
    
    $result_surface = rectangle_surface($form['nb1'], $form['nb2']);
    
}else if($form['calcul_surface'] === 'rectangle_triangle_surface'){
    
    $result_surface = rectangle_triangle_surface($form['nb1'], $form['nb2']);
    
}else if($form['calcul_surface'] === 'basic_triangle_surface'){
    
    $result_surface = basic_triangle_surface($form['nb1'], $form['nb2']);
    
}else if($form['calcul_surface'] === 'disk_surface'){
    
    $result_surface = disk_surface($form['nb1']);
    
}

echo '<pre>';
var_dump($form);
echo '</pre>';


require './calculator.phtml';

?>