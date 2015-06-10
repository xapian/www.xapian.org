<?php
putenv('REQUEST_METHOD=GET');
putenv('SERVER_PROTOCOL=INCLUDED');
putenv('QUERY_STRING=' . $_SERVER['QUERY_STRING']);
putenv('SCRIPT_NAME=');
system("/srv/www/xapian.org/omega.cgi"); ?>
