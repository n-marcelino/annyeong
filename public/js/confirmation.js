function showConfirmation() {
    if (confirm("Are you sure you want to delete this item?")) {
        document.getElementById("delete-form").submit();
        return true;
    } else {
        alert("Item removal cancelled.");
        return false;
    }
}


