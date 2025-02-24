<?php
$arUrlRewrite = [
	[
      	"CONDITION" => "#^/cats_list#",
        "PATH" => "/cats_list/index.php",
	],
	[
      	"CONDITION" => "#^/pandas#",
        "PATH" => "/pandas/index.php",
	],
    [
        "CONDITION" => "#^/news/detail/([a-zA-Z0-9\\.\\-_]+)/?.*#",
        "RULE"      => "CODE=$1",
        "PATH"      => "/news/detail.php",
    ],
    [
        "CONDITION" => "#^/news/page-news/page-([0-9]+)/?$#",
        "RULE" => "PAGEN_1=$1",
        "PATH" => "/news/index.php",
    ],
    [
        "CONDITION" => "#^/news/([a-zA-Z0-9_-]+)/?#",
        "RULE" => "IBLOCK_ID=$1",
        "PATH" => "/news/index.php",
	],
	[
        "CONDITION" => "#^/cats/detail/([a-zA-Z0-9\\.\\-_]+)/?.*#",
        "RULE"      => "CODE=$1",
        "PATH"      => "/cats/detail.php",
    ],
	[
        "CONDITION" => "#^/cats/cats-page/page-([0-9]+)/?$#",
        "RULE" => "PAGEN_1=$1",
        "PATH" => "/cats/index.php",
    ],
    [
        "CONDITION" => "#^/cats/([a-zA-Z0-9_-]+)/?#",
        "RULE" => "IBLOCK_ID=$1",
        "PATH" => "/cats/index.php",
	],
];		
