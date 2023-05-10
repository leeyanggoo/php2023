<?php
    include "../connect/connect.php";

    $sql = "create table members(";
    $sql .= "memberID int(10) unsigned auto_increment,";
    $sql .= "youEmail varchar(40) UNIQUE NOT NULL,";
    $sql .= "youName varchar(10) NOT NULL,";
    $sql .= "youPass varchar(20) NOT NULL,";
    $sql .= "youPhone varchar(40),";
    $sql .= "regTime int(40) NOT NULL,";
    $sql .= "PRIMARY KEY(memberID)";
    $sql .= ") charset=utf8;";

    $result = $connect -> query($sql);

    if($result){
        echo "create tables complete";
    } else {
        echo "create tables false";
    }

    // create table members(
    //     memberID int(10) unsigned auto_increment,
    //     youEmail varchar(40) UNIQUE NOT NULL,
    //     youName varchar(10) NOT NULL,
    //     youPass varchar(20) NOT NULL,
    //     youPhone varchar(40),
    //     regTime int(40) NOT NULL,
    //     PRIMARY KEY(memberID)
    // ) charset=utf8;
?>