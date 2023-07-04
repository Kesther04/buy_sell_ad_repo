<?php

    require("database_connection.php");

    //to create the database
    $db = $con->query("CREATE DATABASE if not exists trading_adv_db");
    if ($db) {
        echo "Database created";
    }


    //to create table for registering sales people
    $sel_tb = $con->query("CREATE TABLE if not exists seller_reg_tb
    (id int(100)not null primary key auto_increment,
    img text not null,
    fullname varchar(120)not null,
    gender varchar(120)not null,
    email varchar(120)not null,
    state_of_origin varchar(120)not null,
    lga varchar(120)not null,
    password  varchar(120)not null,
    pnumber varchar(120)not null,
    des varchar(120)not null,
    date varchar(20)not null,
    fullDay varchar(100)not null,
    time varchar(20)not null)ENGINE=innoDB");

    if ($sel_tb) {
        echo "<p>table created</p>";
    }


    //table for registering administrator/controller of the entire site
    $adm_tb = $con->query("CREATE TABLE if not exists admin_tb
    (id int(100)not null primary key auto_increment,
    fullname varchar(120)not null,
    email varchar(120)not null,
    password  varchar(120)not null,
    pnumber varchar(120)not null,
    date varchar(20)not null,
    time varchar(20)not null)ENGINE=innoDB");

    if ($adm_tb) {
        echo "<p>admin table created</p>";
    }

    // to create table for registering items for sellers
    $item_tb = $con->query("CREATE TABLE if not exists item_table
    (id int(100)not null primary key auto_increment,
    sel_id int(100)not null,
    item_name varchar(120)not null,
    item_cat varchar(120)not null,
    group_in_cat varchar(120)not null,
    img text not null,
    location varchar(120)not null,
    price varchar(120)not null,
    sel_name varchar(120)not null,
    pnumber varchar(20)not null,
    des varchar(120)not null,
    date varchar(20)not null,
    fullDay varchar(100)not null,
    time varchar(20)not null)ENGINE=innoDB");
    
    if ($item_tb) {
        echo "<p>item table created</p>";
    }else {
        echo "<p>item table not created</p>";
    }

    // to create table for registering item images
    $img_tb = $con->query("CREATE TABLE if not exists img_table
    (id int(100)not null primary key auto_increment,
    item_id int(100)not null,
    img text not null,
    size text not null,
    type text not null,
    date varchar(20)not null,
    time varchar(20)not null)ENGINE=innoDB");

    if ($img_tb) {
        echo "<p>image table created</p>";
    }

    // to create table for registering features
    $feature_tb = $con->query("CREATE TABLE if not exists feature_table
    (id int(100)not null primary key auto_increment,
    cat_id int(100)not null,
    item_id varchar(100)not null,
    item_name varchar(150)not null,
    feature_name varchar(150)not null,
    feature_prop text not null,
    date varchar(20)not null,
    time varchar(20)not null)ENGINE=innoDB");

    if ($feature_tb) {
        echo "<p>3rd tb created</p>";
    }else {
        echo "<p>3rd not created</p>";
    }

    // to create table for uploading created categories
    $cat_tb = $con->query("CREATE TABLE if not exists category_table
    (id int(100)not null primary key auto_increment,
    item_cat text not null,
    ic_img text not null,
    group_in_cat text not null,
    gic_img text not null,
    feature_name varchar(150)not null,
    feature_prop text not null,
    date varchar(20)not null,
    time varchar(20)not null)ENGINE=innoDB");

    if ($cat_tb) {
        echo "<p>cat tb created</p>";
    }else {
        echo "<p>cat tb not created</p>";
    }


    // to create table for accumulating views of a commodity
    $views_tb = $con->query("CREATE TABLE if not exists views_table
    (id int(100)not null primary key auto_increment,
    item_id int(100)not null,
    item_name text not null,
    session varchar(50)not null,
    user_id int(100)not null,
    views varchar(50)not null,
    date varchar(20)not null,
    time varchar(20)not null)ENGINE=innoDB");
    if ($views_tb) {
        echo "<p>views table created</p>";
    }else {
        echo "<p>views table not created</p>";
    }


    //to create table for messages of users
    $msg_table= $con->query("CREATE TABLE if not exists user_msg
    (id int(80)not null primary key auto_increment,
    convo_id varchar(200)not null,
    user_id int(90)not null,
    username varchar(90)not null,
    email varchar(80)not null,
    message text not null,
    date varchar(100)not null,
    time varchar(80)not null,
    rep_id int(90)not null, 
    rep_name varchar(90)not null)ENGINE=innoDB");
    if($msg_table){
        echo "<p>msg table created</p>";
    }else{
        echo "msg table not created";
    }



    //to create table for feedbacks of users on particular sellers
    $fd_tb = $con->query("CREATE TABLE if not exists feedback_table
    (id int(100)not null primary key auto_increment,
    sel_id int(100)not null,
    user_id int(120)not null,
    sel_name varchar(500)not null,
    username varchar(120)not null,
    email varchar(120)not null,
    feed_back text not null,
    likes int(100)not null,
    reply int(120)not null,
    date varchar(20)not null,
    time varchar(20)not null)ENGINE=innoDB");
    if ($fd_tb) {
        echo "<p>feed table created</p>";
    }else{
        echo "<p>feed table not created</p>";
    }

    // replies to feedbacks above
    $reply_tb = $con->query("CREATE TABLE if not exists reply_table
    (id int(100)not null primary key auto_increment,
    com_id int(100)not null,
    sel_id int(100)not null,
    sel_name varchar(500)not null,
    reply text not null,
    likes int(100)not null,
    reply_rep int(100)not null,
    date varchar(20)not null,
    time varchar(20)not null)ENGINE=innoDB");
    if ($reply_tb) {
        echo "<p>reply table created</p>";
    }else{
        echo "<p>reply table not created</p>";
    }

    //to create table for accumulating likes of a feedback
    $likes_tb = $con->query("CREATE TABLE if not exists likes_table
    (id int(100)not null primary key auto_increment,
    com_id int(100)not null,
    sel_id int(100)not null,
    sel_name varchar(500)not null,
    likes int(100)not null,
    date varchar(20)not null,
    time varchar(20)not null)ENGINE=innoDB");
    if ($likes_tb) {
        echo "<p>likes table created</p>";
    }else {
        echo "<p>likes table not created</p>";
    }

    //to create table for accumulating likes of a reply
    $rep_likes_tb = $con->query("CREATE TABLE if not exists rep_likes_table
    (id int(100)not null primary key auto_increment,
    rep_id int(100)not null,
    sel_id int(100)not null,
    sel_name varchar(500)not null,
    likes int(100)not null,
    date varchar(20)not null,
    time varchar(20)not null)ENGINE=innoDB");
    if ($rep_likes_tb) {
        echo "<p>likes table created</p>";
    }else {
        echo "<p>likes table not created</p>";
    }

    //to create table for saved commodities of a particular individual
    $saved_tb = $con->query("CREATE TABLE if not exists saved_table
    (id int(100)not null primary key auto_increment,
    sel_id int(100)not null,
    item_id int(100)not null,
    sel_name varchar(500)not null,
    date varchar(20)not null,
    time varchar(20)not null)ENGINE=innoDB");
    if ($saved_tb) {
        echo "<p>saved table created</p>";
    }else {
        echo "<p>saved table not created</p>";
    }    
?>