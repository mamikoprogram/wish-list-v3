<span class="errormessage"><?php
    if (!empty($errors)):
        foreach ($errors as $error) {
            echo $error;
            echo "<br>";
        }
    endif; ?></span>
