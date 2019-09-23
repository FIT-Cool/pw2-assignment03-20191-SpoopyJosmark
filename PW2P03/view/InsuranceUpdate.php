<?php
// Block below for fetch data
$id = filter_input(INPUT_GET, 'id');
if(isset($id)){
    $insurance = getInsurance($id);
}

// Block below for update
$submitted =filter_input(INPUT_POST,'btnUpdate');
if(isset($submitted)){
    $name=filter_input(INPUT_POST,'txtName');
    updateInsurance($insurance['id'],$name);
    header("location:index.php?menu=in");
//  updateInsrurance($id, $name);
}
?>
<form method="post">
    <fieldset>
        <legend>Update Insurance</legend>
        <label for="txtNameIdx" class="form-label">Name</label>
        <input type="text" id="txtNameIdx" name="txtName" placeholder="Name (e.g InHealth)" autofocus required
               class="form-input" value="<?php echo $insurance['name_class']; ?>">
        <input type="submit" name="btnUpdate" value="Update Insurance" class="button button-primary">
    </fieldset>
</form>