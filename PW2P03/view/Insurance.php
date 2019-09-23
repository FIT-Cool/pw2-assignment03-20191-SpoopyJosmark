<?php
// Block below for delete
$deleteCommand = filter_input(INPUT_GET, 'delcom');
if(isset($deleteCommand) && $deleteCommand == 1){
    $id = filter_input(INPUT_GET, 'id');
    deleteInsurance($id);
}

// Block below for insert
$submitted =filter_input(INPUT_POST,'btnSubmit');
if(isset($submitted)){
    $name=filter_input(INPUT_POST,'txtName');
    addInsurance($name);
}
?>
<form method="post">
    <fieldset>
        <legend>New Insurance</legend>
        <label for="txtNameIdx" class="form-label">Name</label>
        <input type="text" id="txtNameIdx" name="txtName" placeholder="Name (e.g Inhealth)" autofocus required
               class="form-input">
        <input type="submit" name="btnSubmit" value="Add Insurance" class="button button-primary">
    </fieldset>
</form>

<table id="myTable" class="display">
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $insurance = getAllInsurance();
    foreach ($insurance as $insurance) {
        echo '<tr>';
        echo '<td>' . $insurance['id'] . '</td>';
        echo '<td>' . $insurance['name_class'] . '</td>';
        echo '<td><button onclick="updateInsurance('.$insurance['id'].')">Edit</button><button onclick="deleteInsurance('.$insurance['id'].')">Delete</button></td>';
    }
    ?>
    </tbody>
</table>