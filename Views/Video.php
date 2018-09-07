<?php

echo "<video width='400' height='200' controls>
        <source src='upload/" . $_FILES['file']['name'] . "'type='video/mp4'>
        </video>";
?>