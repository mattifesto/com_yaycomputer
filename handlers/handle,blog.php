<?php

/**
 * Earlier this site had a specific /blog/ URI that has since been moved to the
 * front page. We redirect here instead of customizing the .htaccess file.
 */

header('Location: /', true, 301);
