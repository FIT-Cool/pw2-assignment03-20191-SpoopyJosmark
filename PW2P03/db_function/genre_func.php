<?php
// =============== INSURANCE ============
function getAllInsurance()
{
$database="mysql";
$databaseName="prakpw220191";
$link = new PDO("$database:host=localhost;dbname=$databaseName","root","");
$link->setAttribute(PDO::ATTR_AUTOCOMMIT,false);
$link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$query='SELECT * FROM insurance ORDER BY name_class ';
$result=$link->query($query);
return $result;

}

function addInsurance($name){
    $database="mysql";
    $databaseName="prakpw220191";
    $link = new PDO("$database:host=localhost;dbname=$databaseName","root","");
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT,false);
    $link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $link->beginTransaction();
    $query='INSERT INTO insurance(name_class) VALUES (?)';
    $statement = $link->prepare($query);
    $statement->bindParam(1,$name,PDO::PARAM_STR);
    if ($statement->execute()){
        $link->commit();
    }else{
        $link->rollBack();
    }
    $link=null;
}
function deleteInsurance($id){
    $database="mysql";
    $databaseName="prakpw220191";
    $link = new PDO("$database:host=localhost;dbname=$databaseName","root","");
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT,false);
    $link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $link->beginTransaction();
    $query='DELETE FROM insurance WHERE id = ?';
    $statement = $link->prepare($query);
    $statement->bindParam(1,$id,PDO::PARAM_INT);
    if ($statement->execute()){
        $link->commit();
    }else{
        $link->rollBack();
    }
    $link=null;
}
function updateInsurance($id, $name){
    $database="mysql";
    $databaseName="prakpw220191";
    $link = new PDO("$database:host=localhost;dbname=$databaseName","root","");
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT,false);
    $link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $link->beginTransaction();
    $query='UPDATE insurance SET name_class = ? WHERE id = ?';
    $statement = $link->prepare($query);
    $statement->bindParam(1,$name,PDO::PARAM_STR);
    $statement->bindParam(2,$id,PDO::PARAM_INT);
    if ($statement->execute()){
        $link->commit();
    }else{
        $link->rollBack();
    }
    $link=null;
}
function getInsurance($id){
    $database="mysql";
    $databaseName="prakpw220191";
    $link = new PDO("$database:host=localhost;dbname=$databaseName","root","");
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT,false);
    $link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $query = "SELECT * from insurance WHERE id = ? LIMIT 1";
    $statement = $link->prepare($query);
    $statement->bindParam(1, $id,PDO::PARAM_INT);
    $statement->execute();
    $result = $statement->fetch();
    $link = null;
    return $result;
}
// =============== PATIENT ============

function getAllPatient()
{
    $database="mysql";
    $databaseName="prakpw220191";
    $link = new PDO("$database:host=localhost;dbname=$databaseName","root","");
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT,false);
    $link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $query='SELECT p.med_record_number,p.citizen_id_number,p.name,p.address,p.birth_place,p.birth_date,i.name_class FROM patient p INNER JOIN insurance i ON p.insurance_id=i.id' ;
    $result=$link->query($query);
    return $result;

}
function addPatient($Medical_Record,$Citizen_ID,$Name,$Address,$Birth_Place,$Birth_Date,$Name_Class){
    $database="mysql";
    $databaseName="prakpw220191";
    $link = new PDO("$database:host=localhost;dbname=$databaseName","root","");
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT,false);
    $link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $link->beginTransaction();

    $query='INSERT INTO patient(med_record_number,citizen_id_number,name,address,birth_place,birth_date,insurance_id) VALUES (?,?,?,?,?,?,?)';
    $statement = $link->prepare($query);
    $statement->bindParam(1,$Medical_Record,PDO::PARAM_STR);
    $statement->bindParam(2,$Citizen_ID,PDO::PARAM_STR);
    $statement->bindParam(3,$Name,PDO::PARAM_STR);
    $statement->bindParam(4,$Address,PDO::PARAM_STR);
    $statement->bindParam(5,$Birth_Place,PDO::PARAM_STR);
    $statement->bindParam(6,$Birth_Date,PDO::PARAM_STR);
    $statement->bindParam(7,$Name_Class,PDO::PARAM_STR);
    if ($statement->execute()){
        $link->commit();
    }else{
        $link->rollBack();
    }
    $link=null;
}
function deletePatient($med_record_number){
    $database="mysql";
    $databaseName="prakpw220191";
    $link = new PDO("$database:host=localhost;dbname=$databaseName","root","");
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT,false);
    $link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $link->beginTransaction();
    $query='DELETE FROM patient WHERE med_record_number = ?';
    $statement = $link->prepare($query);
    $statement->bindParam(1,$med_record_number,PDO::PARAM_STR);
    if ($statement->execute()){
        $link->commit();
    }else{
        $link->rollBack();
    }
    $link=null;
}
function getPatient($med_record_number){
    $database="mysql";
    $databaseName="prakpw220191";
    $link = new PDO("$database:host=localhost;dbname=$databaseName","root","");
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT,false);
    $link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $query = "SELECT * from patient WHERE med_record_number = ? LIMIT 1";
    $statement = $link->prepare($query);
    $statement->bindParam(1, $med_record_number,PDO::PARAM_STR);
    $statement->execute();
    $result = $statement->fetch();
    $link = null;
    return $result;
}
function updatePatient($med_record_number, $Citizen_ID,$Name,$Address,$Birth_Place,$Birth_Date,$Name_Class){
    $database="mysql";
    $databaseName="prakpw220191";
    $link = new PDO("$database:host=localhost;dbname=$databaseName","root","");
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT,false);
    $link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $link->beginTransaction();
    $query='UPDATE patient SET citizen_id_number = ?, name = ?, address = ?, birth_place = ?, birth_date = ?, insurance_id = ? WHERE med_record_number = ?';
    $statement = $link->prepare($query);
    $statement->bindParam(1,$Citizen_ID,PDO::PARAM_STR);
    $statement->bindParam(2,$Name,PDO::PARAM_STR);
    $statement->bindParam(3,$Address,PDO::PARAM_STR);
    $statement->bindParam(4,$Birth_Place,PDO::PARAM_STR);
    $statement->bindParam(5,$Birth_Date,PDO::PARAM_STR);
    $statement->bindParam(6,$Name_Class,PDO::PARAM_STR);
    $statement->bindParam(7,$med_record_number,PDO::PARAM_STR);
    if ($statement->execute()){
        $link->commit();
    }else{
        $link->rollBack();
    }
    $link=null;
}