<?php
// Block below for delete
$deleteCommand = filter_input(INPUT_GET, 'delcom');
if(isset($deleteCommand) && $deleteCommand == 1){
    $med_record_number = filter_input(INPUT_GET, 'med_record_number');
    deletePatient($med_record_number);
}

// Block below for insert
$submitted = filter_input(INPUT_POST, 'btnSubmit');
if (isset($submitted)) {
    $Medical_Record = filter_input(INPUT_POST, 'txtMedical_Record');
    $Citizen_ID = filter_input(INPUT_POST, 'txtCitizen_ID');
    $Name = filter_input(INPUT_POST, 'txtName');
    $Address = filter_input(INPUT_POST, 'txtAddress');
    $Birth_Place = filter_input(INPUT_POST, 'txtBirth_Place');
    $Birth_Date = filter_input(INPUT_POST, 'txtBirth_Date');
    $Name_Class = filter_input(INPUT_POST, 'Name_Class');
    addPatient($Medical_Record,$Citizen_ID,$Name,$Address,$Birth_Place,$Birth_Date,$Name_Class);
}
?>
<form method="post">
    <fieldset>
        <legend>New Patient</legend>

        <label class="form-label">Medical_Record</label>
        <input type="text" id="txtNameIdx" name="txtMedical_Record" placeholder="Medical_Record" autofocus required
               class="form-input">
        <br>
        <label class="form-label">Citizen_ID</label>
        <input type="text" id="txtNameIdx" name="txtCitizen_ID" placeholder="Citizen_ID" autofocus required
               class="form-input">
        <br>
        <label class="form-label">Name</label>
        <input type="text" id="txtNameIdx" name="txtName" placeholder="Name" autofocus required
               class="form-input">
        <br>
        <label class="form-label">Address</label>
        <input type="text" id="txtNameIdx" name="txtAddress" placeholder="Address" autofocus required
               class="form-input">
        <br>
        <label class="form-label">Birth_Place</label>
        <input type="text" id="txtNameIdx" name="txtBirth_Place" placeholder="Birth_Place" autofocus required
               class="form-input">
        <br>
        <label class="form-label">Birth_Date</label>
        <input type="date" id="txtNameIdx" name="txtBirth_Date" placeholder="Birth_Date" autofocus required
               class="form-input">
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
        <input type="submit" name="btnSubmit" value="Add Patient" class="button button-primary">

    </fieldset>
</form>

<table id="myTable" class="display">
    <thead>
    <tr>
        <th>Medical Record</th>
        <th>Citizen ID</th>
        <th>Name</th>
        <th>Address</th>
        <th>Birth Place</th>
        <th>Birth Date</th>
        <th>Insurance Name</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
        <?php
        $patients = getAllPatient();
        foreach ($patients as $patient) {
            echo '<tr>';
            echo '<td>' . $patient['med_record_number'] . '</td>';
            echo '<td>' . $patient['citizen_id_number'] . '</td>';
            echo '<td>' . $patient['name'] . '</td>';
            echo '<td>' . $patient['address'] . '</td>';
            echo '<td>' . $patient['birth_place'] . '</td>';
            echo '<td>' .
                DateTime::createFromFormat('Y-m-d', $patient['birth_date'])->format('d M Y')
                . '</td>';
            echo '<td>' . $patient['name_class'] . '</td>';
            echo '<td><button onclick="updatePatient(\''. $patient['med_record_number'] .'\')">Edit</button><button onclick="deletePatient(\''. $patient['med_record_number'] .'\')">Delete</button></td>';
        }
        ?>
    </tbody>
</table>