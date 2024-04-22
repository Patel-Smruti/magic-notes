<?php
function formatArray($array, $prefix = '')
{
    $output = '';

    foreach ($array as $key => $value) {
        if (is_array($value)) {
            // If the value is an array and the prefix matches 'ACTION' or 'ADMIN'
            if ($prefix == 'ACTION.' || $prefix == 'ADMIN.') {
                $output .= formatArray($value, $prefix . $key . '.');
            }
        } else {
            // If the value is not an array and the prefix matches 'ACTION' or 'ADMIN'
            if ($prefix == 'ACTION.' || $prefix == 'ADMIN.') {
                $output .= $prefix . $key . '=' . $value . "\n";
            }
        }
    }

    return $output;
}

// Example usage:
$array = array(
    "ACTION" => array(
        "key1" => "Item 1",
        "key2" => "Item 2",
        "key3" => "Item 3",
        "key4" => "Item 4"
    ),
    "ADMIN" => array(
        "key1" => "Item 1",
        "key2" => array(
            "subkey1" => "Item 1",
            "subkey2" => "Item 2"
        )
    )
);

$output = formatArray($array);
echo nl2br($output); // Use nl2br to convert newlines to HTML line breaks for display in HTML
