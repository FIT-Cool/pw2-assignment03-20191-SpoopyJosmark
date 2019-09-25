<?php
// Block below for fetch data
$med_record_number = filter_input(INPUT_GET, 'med_record_number');
if(isset($med_record_number)){
    $patient = getPatient($med_record_number);
}

// Block below for update
$submitted = filter_input(INPUT_POST, 'btnUpdate');
if (isset($submitted)) {
    $Citizen_ID = filter_input(INPUT_POST, 'txtCitizen_ID');
    $Name = filter_input(INPUT_POST, 'txtName');
    $Address = filter_input(INPUT_POST, 'txtAddress');
    $Birth_Place = filter_input(INPUT_POST, 'txtBirth_Place');
    $Birth_Date = filter_input(INPUT_POST, 'txtBirth_Date');
    $Name_Class = filter_input(INPUT_POST, 'Name_Class');
    updatePatient($patient['med_record_number'],$Citizen_ID,$Name,$Address,$Birth_Place,$Birth_Date,$Name_Class);
    header("location:index.php?menu=pt");
}
?>
<form method="post">
    <fieldset>
        <legend>New Patient</legend>

        <label class="form-label">Citizen_ID</label>
        <input type="text" id="txtNameIdx" name="txtCitizen_ID" placeholder="Citizen_ID" autofocus required
               class="form-input" value="<?php echo $patient['citizen_id_number']; ?>">
        <br>
        <label class="form-label">Name</label>
        <input type="text" id="txtNameIdx" name="txtName" placeholder="Name" autofocus required
               class="form-input" value="<?php echo $patient['name']; ?>">
        <br>
        <label class="form-label">Address</label>
        <input type="text" id="txtNameIdx" name="txtAddress" placeholder="Address" autofocus required
               class="form-input" value="<?php echo $patient['address']; ?>">
        <br>
        <label class="form-label">Birth_Place</label>
        <input type="text" id="txtNameIdx" name="txtBirth_Place" placeholder="Birth_Place" autofocus required
               class="form-input" value="<?php echo $patient['birth_place']; ?>">
        <br>
        <label class="form-label">Birth_Date</label>
        <input type="date" id="txtNameIdx" name="txtBirth_Date" placeholder="Birth_Date" autofocus required
               class="form-input" value="<?php echo $patient['birth_date']; ?>">
        <br>
        <label  class="form-label">Name_Class</label>
        <select name="Name_Class" id="">
            <?php
            $insurances = getAllInsurance();
            foreach ($insurances as $insurance) {
                echo '<option value="'.$insurance['id'].'">' . $insurance['name_class'] . '</option>';
            }
            ?>
        </select>
        <br>
        <input type="submit" name="btnUpdate" value="Update Patient" class="button button-primary">

    </fieldset>
</form>