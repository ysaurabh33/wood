<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>canvas Image manupulation</title>
  </head>
  <body>
    <img id="img1" src="sample.jpeg" alt="hello" height="200px" width="200px">
    <canvas id="c1" width="300" height="300">empty</canvas>
    <script>
      window.onload = canvas;

      function canvas()
      {
        var c1 = document.getElementById('c1');
        if(c1 && c1.getContext('2d'))
        {
          var context = c1.getContext('2d');
          var imgScr = document.getElementById('img1');

          context.drawImage(imgScr, 0, 0, 300, 300);

          var Image = context.getImageData(0, 0, 300, 300);
          var pixel = Image.data;
          var init = 1;
          //console.log(pixel);
          while(init < 300) //height of canavs
          {
            for(var j = 0; j < 5; j++)
            {
              var row = (init + j) * context.canvas.width * 4;
              for(var i = 0; i < context.canvas.width * 4; i += 4)
              {
                if(pixel[row + i + 1] == 122)
                {
                  pixel[row + i + 1] = 0; //alpha
                }
                //pixel[row + i] = 255 - pixel[row + i]; //red
                //pixel[row + i + 1] = 0; //green
                //pixel[row + i + 2] = 255 - pixel[row + i]; //blue
                //pixel[row + i + 3] = 255 - pixel[row + i]; //alpha
              }
            }
            //console.log(row);
            init++;
          }
          context.putImageData(Image, 0, 0);
        }
      }
    </script>
  </body>
</html>
