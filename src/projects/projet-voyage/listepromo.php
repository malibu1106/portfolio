<?php
foreach (glob("promos/*.php") as $filename) {
    echo '<option value="' . $filename . '">' . $filename . '</option>';
}
