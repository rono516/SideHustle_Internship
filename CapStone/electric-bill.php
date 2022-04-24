<?php

if(isset($_POST['calculate'])){
    $unit=$_POST['unit'];
    $amount=callculateBill($unit);
}

function callculateBill($unit){
    //prices per unit
    $chargeA=3.50;
    $chargeB=4.0;
    $chargeC=5.2;
    $chargeD=6.5;

    if($unit<=50){
        return $unit*$chargeA;
    }else if($unit>50 && $unit <=150){
        $rem=$unit-50;
        return ((50*$chargeA)+($rem*$chargeB));
    }else if($unit>150 && $unit<=250){
        $rem1=$unit-50;
        $rem2=$rem1-100;
        return ((50*$chargeA)+($rem1*$chargeB)+($rem2*$chargeC));
    }else{
        $rem1=$unit-50;
        $rem2=$rem1-100;
        $rem3=$rem2-100;
        return ((50*$chargeA)+($rem1*$chargeB)+($rem2*$chargeC)+($rem3*$chargeD));
    }
}
?>
<html>
    <head>
    </head>
    <body>
        <div class="container">
            <!--Handle form in this page-->
            <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
                <input type="number" name="unit" placeholder="Enter Unit">
                <input type="submit" name="calculate" value="Calculate"/>
            </form>
            <p style="font-weight:bold;">
                <?php
                if(isset($amount)){
                    echo "Total amount=".$amount." USD";
                }
                ?>
            </p>
    </div>
    </body>
</html>
