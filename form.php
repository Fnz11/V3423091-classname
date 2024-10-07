<?php
class Form
{
    var $fields = array();
    var $action;
    var $submit = "";
    var $jumField = 0;

    function __construct($action, $submit)
    {
        $this->action = $action;
        $this->submit = $submit;
    }

    function displayForm()
    {
        echo "<div style='width: 100%; text-align: center; padding: 20px; font-size: 24px; font-weight: bold;'>";
        echo "<h1 style='text-align: center;'>Register Form</h1>";
        echo "<form action='" . $this->action . "' method='post' style='width: 100%; max-width: 400px; margin: auto; border: 1px solid #ccc; padding: 20px; box-shadow: 2px 2px 12px #aaa; border-radius: 10px; background-color: #f9f9f9;'>";
        echo "<table style='width: 100%; border-collapse: collapse;'>";
        for ($i = 0; $i < $this->jumField; $i++) {
            echo "<tr style='border-bottom: 1px solid #ddd;'>";
            echo "<td align='right' style='padding: 10px; font-weight: bold; vertical-align: top;'>" . $this->fields[$i]['label'] . "</td>";
            echo "<td style='padding: 10px;'>" . $this->fields[$i]['input'] . "</td>";
            echo "</tr>";
        }
        echo "<tr>";
        echo "<td colspan='2' style='text-align: center; padding: 20px;'>";
        echo "<input type='submit' name='tombol' value='" . $this->submit . "' style='padding: 10px 20px; background-color: #4CAF50; color: white; border: none; cursor: pointer; border-radius: 5px; font-size: 16px;'>";
        echo "</td>";
        echo "</tr>";
        echo "</table>";
        echo "</form>";
        echo "</div>";
    }

    function addField($name, $label, $type = 'text', $options = null)
    {
        $input = "";
        switch ($type) {
            case 'text':
            case 'password':
                $input = "<input type='$type' name='$name'>";
                break;
            case 'radio':
                if (is_array($options)) {
                    foreach ($options as $value => $text) {
                        $input .= "<input type='radio' name='$name' value='$value'> $text ";
                    }
                }
                break;
            case 'checkbox':
                if (is_array($options)) {
                    foreach ($options as $value => $text) {
                        $input .= "<input type='checkbox' name='" . $name . "[]' value='$value'> $text ";
                    }
                }
                break;
            case 'select':
                $input = "<select name='$name'>";
                if (is_array($options)) {
                    foreach ($options as $value => $text) {
                        $input .= "<option value='$value'>$text</option>";
                    }
                }
                $input .= "</select>";
                break;
            case 'textarea':
                $input = "<textarea name='$name'></textarea>";
                break;
        }

        $this->fields[$this->jumField]['name'] = $name;
        $this->fields[$this->jumField]['label'] = $label;
        $this->fields[$this->jumField]['input'] = $input;
        $this->jumField++;
    }
}
