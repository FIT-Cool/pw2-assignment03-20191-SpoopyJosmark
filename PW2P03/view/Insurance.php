<?php
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
    </tr>
    </thead>
    <tbody>
    <?php
    $genres = getAllInsurance();
    foreach ($genres as $genre) {
        echo '<tr>';
        echo '<td>' . $genre['id'] . '</td>';
        echo '<td>' . $genre['name_class'] . '</td>';
    }
    ?>
    </tbody>
</table>