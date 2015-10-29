<?php

require 'vendor/autoload.php';
use Parse\ParseClient;
use Parse\ParseQuery;
use Parse\ParseException;
ParseClient::initialize('XYVa8aop9gJj7A7GC4Rl5KELXIJCOD2dceWu1QhP', 'jxxaxaNj0avTQXQPH51DLT8f3vXRRqPBLm6ssiuY', 'hMaVrHtAn7YZB0Gmtvr0xKxj5DPILRlNRUHqaIQG');

$query = new ParseQuery("Tags");
try {
  $tags = $query->get("NXu6Amb9ba"); //unique object id
  // The object was retrieved successfully.
  $tags_array = $tags->get("tagsArray");
  $js_tags = json_encode($tags_array);
  echo $js_tags;
} catch (ParseException $ex) {
  // The object was not retrieved successfully.
  // error is a ParseException with an error code and message.
}

?>
