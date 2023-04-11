<?php

switch($vars['action']){
    case "list":{
        $items = $db->query("SELECT * FROM items where user_id = ?",$appuser['user_id'])->fetchAll();
        
        include("view/header.php");
        include("view/list.php");
        include("view/footer.php");
        exit;
    }break;

    case "do_add":{
        $db->query("INSERT INTO items (user_id, title) VALUES (?, ?)",$appuser['user_id'], $vars['title']);
        header("location: index.php");
        exit;
    }break;
    
    case "delete":{
        //Some code here to delete ....
        if (isset($_GET['item_id'])) {
            $db->query("Delete from items where item_id = ? and user_id = ?",$vars['item_id'], $appuser['user_id']);
        }
        header("location: index.php");
        exit;        
    }break;
    
    case "do_edit":{
        if (isset($_GET['item_id'])) {
            $db->query("Update items set title = ? where item_id = ?",$vars['title'], $vars['item_id']);
        }
        header("location: index.php");
        exit; 
    }break;
    
    case "help":{
        //some code here to show help 
        exit;
    }break;
    
    
}  

?>