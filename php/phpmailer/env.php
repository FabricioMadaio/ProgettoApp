<?php

$key = "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";
echo "export SENDGRID_API_KEY='$key'" > sendgrid.env
echo "sendgrid.env" >> .gitignore
source ./sendgrid.env

?>