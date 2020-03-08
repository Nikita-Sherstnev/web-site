<?php

function checkField($str, $fieldName, $regExp, $description)
{
    $dataCheck = validateField($str, $fieldName);

    if (!preg_match($regExp, $str)) {
        echo("$description<br>");
        $dataCheck = false;
    }

    return $dataCheck;
}

function validateField($str, $fieldName)
{
    if (empty($str)) {
        echo("������� $fieldName!<br>");
        return false;
    }
    return true;
}

function checkSpecialRole($name)
{
    if ($name == "�����") {
        header('Location: adminpage.php');
        exit();
    }
}

