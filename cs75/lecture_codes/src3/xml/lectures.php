<!DOCTYPE html>

<html>
  <head>
    <title>My Lecture Reader</title>
  </head>
  <body>
    <h1>CSCI S-75</h1>
    <ul>
      <?

         $dom = simplexml_load_file("lectures.xml");
         foreach ($dom->xpath("/lectures/lecture") as $lecture)
         {
             print "<li>";
             print $lecture->title;
             print "</li>";
         }

      ?>
    </ul>
  </body>
</html>
