<?php
$url_host = 'http://' . $_SERVER['HTTP_HOST'];
$pattern_document_root = addcslashes(realpath($_SERVER['DOCUMENT_ROOT']), '\\');
$pattern_uri = '/' . $pattern_document_root . '(.*)$/';

preg_match_all($pattern_uri, __DIR__, $matches);
$url_path = $url_host . $matches[1][0];
$url_path = str_replace('\\', '/', $url_path);

if (!class_exists('lessc')) {
    $dir_block = dirname($_SERVER['SCRIPT_FILENAME']);
    require_once($dir_block . '/libs/lessc.inc.php');
}
$less = new lessc;
$less->compileFile('less/3217.less', 'css/3217.css');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>3217</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
      
        <link href="<?php echo $url_path ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css"/
              <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo $url_path ?>/css/3217.css" rel="stylesheet" type="text/css"/>
 
    </head>
    <body>
    <h5>Main home > Forum</h5>
    
<div class="search-container">
  <input type="text" placeholder="Search...">
  <button type="submit">
    <img src="https://img.icons8.com/ios-filled/50/000000/search.png" alt="Search">
  </button>
</div>

<table>
  <tr>
    <th>Forum</th>
    <th>Topics</th>
    <th>Posts</th>
    <th>Last Post</th>
  </tr>
  <tr>
    <td>Arts & Crafts</td>
    <td>21</td>
    <td>181</td>
    <td>19 minutes ago<br>nytwordlehints</td>
  </tr>
  <tr>
    <td>Business & Marketing</td>
    <td>17</td>
    <td>128</td>
    <td>2 days ago<br>Anonymous</td>
  </tr>
  <tr>
    <td>MasterClass Economy</td>
    <td>3</td>
    <td>43</td>
    <td>3 days, 4 hours ago<br>Anonymous</td>
  </tr>
  <tr>
    <td>MasterClass Languages</td>
    <td>3</td>
    <td>18</td>
    <td>2 days, 9 hours ago<br>Anonymous</td>
  </tr>
  <tr>
    <td>MasterClass Psychology</td>
    <td>8</td>
    <td>66</td>
    <td>1 day, 21 hours ago<br>Anonymous</td>
  </tr>
  <tr>
    <td>MasterClass Technology</td>
    <td>10</td>
    <td>72</td>
    <td>5 days, 18 hours ago<br>Anonymous</td>
  </tr>
</table>

    </body>
</html>
