<?php 



function generateReferralCode($userId, $length = 15)
{
    $pre = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $code = "ref_";

    for ($i = 0; $i < $length; $i++) {
        $code .= $pre[rand(0, strlen($pre) - 1)];
    }

    $code .= "-$userId";
    return $code;
}

function getReferral($code)
{
    $userID = explode("-", $code)[1];
    return $userID;
}

function getUser($email, $conn)
{
    $query = "SELECT * FROM users WHERE user_email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        return $user;
    } else {
        return false;
    }
}

function getUserById($id, $conn)
{
    $query = "SELECT * FROM users WHERE id_no = '$id'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        return $user;
    } else {
        return false;
    }
}

function getReferralCount($user, $conn)
{
    $query = "SELECT * FROM referral WHERE referral = '$user'";
    $result = mysqli_query($conn, $query);

    return mysqli_num_rows($result) ?? 0;
}

function getAllRefers($conn)
{
    $query = "SELECT * FROM referral";
    $result = mysqli_query($conn, $query);

    $refers = [];

    if(mysqli_num_rows($result)) {
        while($row = mysqli_fetch_assoc($result)) {
            array_push($refers, $row);
        }
    }

    return $refers;
}