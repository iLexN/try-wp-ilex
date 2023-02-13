<h3>Additional Information</h3>
<table class='form-table'>
    <tr>
        <th><label for='city'>City</label></th>
        <td>
            <input type='text' name='city' id='city' value="<?php echo esc_attr( $city ) ?>" class='regular-text'/>
        </td>
    </tr>
    <tr>
        <th>Drinks</th>
        <td>
            <ul>
                <li>
                    <label>
                        <input type='radio' value='wine' name='drinks'<?php checked( $drinks, 'wine' ) ?> /> Wine
                    </label>
                </li>
                <li>
                    <label>
                        <input type="radio" value="coffee" name="drinks"<?php checked( $drinks, 'coffee' ) ?> /> Coffee
                    </label>
                </li>
                <li>
                    <label>
                        <input type="radio" value="water" name="drinks"<?php checked( $drinks, 'water' ) ?> /> Water
                    </label>
                </li>
            </ul>
        </td>
    </tr>
</table>
