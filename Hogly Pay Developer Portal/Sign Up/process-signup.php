<?php

if (empty($_POST["firstname"])) {
    die("First name is required");
}

if (empty($_POST["surname"])) {
    die("Surname is required");
}

if ( ! filter_var($_POST["email-address"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}

if (empty($_POST["id-number"])) {
    die("ID number is required");
}

if (! preg_match('/^[0-9]{4}[0-9]{3}[0-9]{3}$/', $_POST["cell-number"])) {
    die("Valid cell number is required");
}

$mysqli = require __DIR__ . "/database.php";

$sql = "INSERT INTO sign_up (firstname, surname, emailaddress, idnumber, gender, dob, cellnumber, physicaladdress, rolename, department, companyname, companyaddress)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $mysqli->stmt_init();

if ( !$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
};

$stmt->bind_param("sssssiisssss", $_POST["firstname"], $_POST["surname"], $_POST["emailaddress"], $_POST["idnumber"], $_POST["gender"], $_POST["dob"], $_POST["cellnumber"], $_POST["physicaladdress"], $_POST["rolename"], $_POST["department"], $_POST["companyname"], $_POST["companyaddress"]);

$stmt->execute();

echo "Signup successful";

?>