<!DOCTYPE html>
<html lang='cs'>
  <head>
    <title>ChebuNet</title>

    <link href='images/favicon.png' rel='shortcut icon' type='image/png'>
    <link type="text/css" href="style.css" rel="stylesheet">
      <meta charset="UTF-8">
    
    
  </head>
  
  <body>
    <header>
        <?php
            include 'zahlavi.php';
        ?>
    </header>
        <div class="galerieBox">
            <div class="introText">
                  <h4>Galerie</h4>
            </div>
        </div>
        <div class="gallery">
        <h1>Použité obrázky</h1>
        <table>
            <tr>
              <td>
                <a href="images/intro.png"><img src="images/intro_res.png" alt="Image 1"></a>
              </td>
              <td>
                <a href="images/kontakt.jpg"><img src="images/kontakt_res.png" alt="Image 2"></a>
              </td>
              <td>
                <a href="images/nabidky.jpg"><img src="images/nabidky_res.png" alt="Image 3"></a>
              </td>
            </tr>
            <tr>
            <td>
                <a href="images/cheb.png"><img src="images/cheb_res.png" alt="Image 3"></a>
              </td>
              <td>
                <a href="images/galerie.jpg"><img src="images/galerie_res.png" alt="Image 2"></a>
              </td>
              <td>
                <a href="images/logo.png"><img src="images/logo_res.png" alt="Image 3"></a>
              </td>
            </tr>
          </table>
            <h1>Naši šťastní zákazníci</h1>
            <table>
            <tr>
              <td>
                <a href="images/zakaznik_1.png"><img src="images/zakaznik_1_res.png" alt="Image 1"></a>
              </td>
              <td>
                <a href="images/zakaznik_2.jpg"><img src="images/zakaznik_2_res.png" alt="Image 2"></a>
              </td>
              <td>
                <a href="images/zakaznik_3.jpg"><img src="images/zakaznik_3_res.png" alt="Image 3"></a>
              </td>
            </tr>

          </table>
          </div>
            

        <footer>
            <?php
                include 'footer.php';
            ?>
        </footer>
    </body>
</html>
