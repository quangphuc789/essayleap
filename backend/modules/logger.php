<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/esme/backend/db/sql.php';

function isLogged() {
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
                    $GLOBALS['name'] = $user[0]['firstname'];
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