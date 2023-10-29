<?php

function conexao()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "notas";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    return $conn;
}

function inserirNota($text, $color)
{
    if(is_empty($text)){
        return;
    }

    $conn = conexao();
    $sql = "INSERT INTO sticks_notas (description, color)
VALUES ('$text', '$color')";

    if (!mysqli_query($conn, $sql)) {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}

function listarNotas()
{
    $conn = conexao();
    $sql = "SELECT * FROM sticks_notas";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}

function apagarNota($id)
{
    $conn = conexao();
    $sql = "DELETE FROM sticks_notas WHERE sticks_notas_id=$id";

    if (!mysqli_query($conn, $sql)) {
        echo "Error deleting record: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}

function alterarNota($id, $description, $color)
{   
    if(is_empty($description)){
        return;
    }

    $conn = conexao();
    $sql = "UPDATE sticks_notas SET description='$description', color='$color' WHERE sticks_notas_id=$id";

    if (!mysqli_query($conn, $sql)) {
        echo "Error updating record: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}

function is_empty($value){
    $empty = (is_null($value) || empty($value) || $value == "");
    return $empty;
}