<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/schoolmailer/backend/db/sql.php';

function isLogged() {
    if (isset($GLOBALS['firstname']) && isset($GLOBALS['lastname']) && isset($GLOBALS['id'])) {
        return true;
    }

    if (isset($_COOKIE['id'])) {
        $id = $_COOKIE['id'];
        $sql = new Sql();
        $objs = $sql->query("SELECT * FROM session WHERE id = '$id' LIMIT 1");
        if (count($objs) > 0) {
            $obj = $objs[0];
            $expiry = intval($obj['expiry']);
            if ($obj['expiry']-time() > 0) {
                $user_id = $obj['id'];
                $user = $sql->query("SELECT * FROM user WHERE id = '$user_id' LIMIT 1");
                if (count($user) > 0) {
                    // Set global name
                    $GLOBALS['firstname'] = $user[0]['firstname'];
                    $GLOBALS['lastname'] = $user[0]['lastname'];
                    $GLOBALS['id'] = $user[0]['id'];

                    // Update session expiry
                    $sql->query("UPDATE session SET expiry='".(time() + (86400 * 30))."' WHERE id = '$id'");

                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}