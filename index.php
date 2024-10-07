<?php
include 'form.php';

$form = new Form("submit.php", "Submit");

$form->addField("username", "Username", "text");
$form->addField("password", "Password", "password");
$form->addField("gender", "Gender", "radio", ["M" => "Male", "F" => "Female"]);
$form->addField("hobbies", "Hobbies", "checkbox", ["coding" => "Coding", "gaming" => "Gaming"]);
$form->addField("country", "Country", "select", ["ID" => "Indonesia", "MY" => "Malaysia"]);
$form->addField("bio", "Bio", "textarea");

$form->displayForm();
