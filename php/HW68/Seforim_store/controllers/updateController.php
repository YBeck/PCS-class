<?php
$array="";
$updateArray = [];
if(isset($_POST['buy']) || isset($_POST['update'])){
    include_once 'utils/optionArray.php';
    $array = getArray();
}else if(isset($_GET['buy']) || isset($_GET['update'])){
    $array = &$_GET; //set action to referance $_GET so we can unset it
}

if(isset($_POST['buy']) || isset($_GET['buy'])){
    include_once 'models/updateModel.php';
    include_once 'views/buyView.php';
}

if(isset($_GET['update']) || isset($_POST['update'])){
    include_once 'models/filterModel.php';
    include_once 'views/updateView.php';
}

if(isset($_POST['updateForm'])){
    if(isset($_POST['seferName'])){
        if(!empty($_POST['seferName'])){
            $set = "name";
            $input  = $_POST['seferName'];
            $updateArray[$set] = $input;  
        }
    }
    if(isset($_POST['updatePrice'])){
        if(!empty($_POST['updatePrice']) && is_numeric($_POST['updatePrice'])){
            $set = "price";
            $input  = $_POST['updatePrice'];
            $updateArray[$set] = $input;
        }
    }
    if(isset($_POST['inStock'])){
        if(!empty($_POST['inStock']) && is_numeric($_POST['inStock'])){
            $set = "units_in_stock";
            $input  = $_POST['seferName'];
            $updateArray["units_in_stock"] = $_POST['inStock'];
        }
    }

    if(isset($_POST['updateCategory'])){
        if(!empty($_POST['updateCategory'])){
            $set = "category";
            $input  = $_POST['updateCategory'];
            $updateArray[$set] = $input;  
        }
    }

    if(isset($_POST['sefer'])){ //we need to pass in the values from $_POST['sefer'] again to the second form
        include_once 'utils/optionArray.php';
        $array = getArray();  
    }
    $updateId = $array['id'];
    include_once 'models/updateModel.php';
    include_once 'views/updateView.php';
}










// if(isset($_POST['buy'])){
//     include_once 'utils/optionArray.php';
//     $array = getArray();
// }else if(isset($_GET['buy'])){
//     $array = &$_GET; //set action to referance $_GET so we can unset it
// }

// if(isset($_POST['buy']) || isset($_GET['buy'])){
//     include_once 'models/updateModel.php';
//     include_once 'views/buyView.php';
// }

// if(isset($_GET['update']) || isset($_POST['update'])){
//     $array = $_GET;
//     include_once 'models/filterModel.php';
//     include_once 'views/updateView.php';
// }else if(isset($_POST['update'])){

// }
// $updateArray = [];
// $updateId = $array['id'];
// if(isset($_POST['updateForm'])){
//     if(isset($_POST['seferName'])){
//         if(!empty($_POST['seferName'])){
//             $set = "name";
//             $input  = $_POST['seferName'];
//             $updateArray[$set] = $input;  
//         }
//     }
//     if(isset($_POST['updatePrice'])){
//         if(!empty($_POST['updatePrice']) && is_numeric($_POST['updatePrice'])){
//             $set = "price";
//             $input  = $_POST['updatePrice'];
//             $updateArray[$set] = $input;
//         }
//     }
//     if(isset($_POST['inStock'])){
//         if(!empty($_POST['inStock']) && is_numeric($_POST['inStock'])){
//             $set = "units_in_stock";
//             $input  = $_POST['seferName'];
//             $updateArray["units_in_stock"] = $_POST['inStock'];
//         }
//     }

//     if(isset($_POST['updateCategory'])){
//         if(!empty($_POST['updateCategory'])){
//             $set = "category";
//             $input  = $_POST['updateCategory'];
//             $updateArray[$set] = $input;  
//         }
//     }
//     include_once 'models/updateModel.php';
//     include_once 'views/updateView.php';
// }
?>