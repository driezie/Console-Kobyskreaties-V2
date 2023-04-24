<?php
// Include any necessary files or configurations
require_once '../../includes/php/actions.php'; 
console_log($_POST);
// Retrieve the selected category ID from the AJAX request
$categoryID = $_POST['category'];

// Retrieve the brands from the database
$brands = getBrandsByCategory($categoryID);

// Generate the updated options for the brand select input
$options = '<option value="" disabled="" selected="">Selecteer een subcategorie</option>';
foreach ($brands as $brand) {
    $options .= '<option value="' . $brand['id'] . '">' . $brand['title'] . '</option>';
}

// Echo the generated options as the response to the AJAX request
echo $options;
?>
