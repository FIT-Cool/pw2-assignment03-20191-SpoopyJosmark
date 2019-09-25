// Insurance
function deleteInsurance(id) {
    var confirmation = window.confirm("Are you sure want to delete?");

    if(confirmation){
        window.location = "index.php?menu=in&delcom=1&id=" + id;
    }
}

function updateInsurance(id) {
    window.location = "index.php?menu=inu&id=" + id;
}

// Patient
function deletePatient(med_record_number) {
    var confirmation = window.confirm("Are you sure want to delete?");

    if(confirmation){
        window.location = "index.php?menu=pt&delcom=1&med_record_number=" + med_record_number;
    }
}

function updatePatient(med_record_number) {
    window.location = "index.php?menu=ptu&med_record_number=" + med_record_number;
}