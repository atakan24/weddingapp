
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script class="code" type="text/javascript">
        /*
        $(document).ready(function(){
          $('#stage').load('city.php');
        });
        */
        $(document).ready(function(){

          var url="city.php";

          $.getJSON(url,function(data){
            console.log(data);
            $.each(data.user, function(i,post){
              var newRow =
              "<tr>"
              +"<td>"+post.city_id+"</td>"
              +"<td>"+post.city_name+"</td>"
              +"</tr>" ;
              $(newRow).appendTo("#json-data");
            });
          });

        });
      </script>

  </head>
  <body>

    <table id="json-data" border="3">

    </table>



  </body>
</html>
