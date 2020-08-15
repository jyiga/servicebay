<?php

echo $content;
error_log(date('Y m d :g:i:s:a ') . $content . "\n", 3, ROOT . DS . 'tmp' . DS . 'logs' . DS . 'content.log');