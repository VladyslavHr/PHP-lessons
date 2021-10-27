<?php

include 'data/jquery-rules.php';

pa($jquery_rules);

$jquery_rules = db_escape($jquery_rules);

pa($jquery_rules);
foreach ($jquery_rules as $key => $rule)
{
    $type = $rule['type'] ?? 'jQuery';
    db_query("INSERT INTO jq_rules SET
    title = '$rule[title]',
    `description` = '$rule[description]',
    example = '$rule[example]',
    `type` = '$type'");
}