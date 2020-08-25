<?php

//get a word format from snake case string
if (!function_exists('snake_case_string_to_word'))
{
  function snake_case_string_to_word($text)
  {
      return ucwords(str_replace("_"," ",$text));
  }
}
