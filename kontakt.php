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
        <div class="kontaktBox">
            <div class="introText">
                  <h4>Kontakt</h4>
            </div>
        </div>
        <div class="info-box">
          <div class="kontakt-info">
            <h4>ChebuNet s.r.o</h4>
            <p>Nutella 420/53</p>
            <p>351 34 Cheb</p>
            <p style="margin-bottom: 20px;"></p>
            <p>IČ: 694518453</p>
            <p>DIČ: PL25465123</p>
            <p style="margin-bottom: 20px;"></p>
            <h4>Telefonní číslo:</h4>
            <p>798 500 480</p>
            <p style="margin-bottom: 20px;"></p>
            <h4>Email:</h4>
            <p>ChebuNet@gmail.com</p>
          </div>
          <div class="kontakt-info">
            <h4>Banka:</h4>
            <p>číslo účtu: 42083069/6900</p>
            <p style="margin-bottom: 20px;"></p>
            <h4>provozní doba:</h4>
            <p>st-pá 23.00-23.59</p>
            <p style="margin-bottom: 20px;"></p>
            <h4>technická podpora:</h4>
            <p>út-st 2-8</p>
            <p>čt-pá 7-20</p>
            <p>so-ne 11-12</p>
          </div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d640.1428999739366!2d12.369550669679372!3d50.07558415890976!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNTDCsDA0JzMyLjEiTiAxMsKwMjInMTIuNyJF!5e0!3m2!1sen!2scz!4v1685829471547!5m2!1sen!2scz" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="forms">
          
          <form action="#" method="POST">
            <div class="form-group">
                <h1>Kontaktujte nás</h1>
              <label for="name"><h4>Jméno:</h4></label>
              <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
              <label for="email"><h4>Email:</h4></label>
              <input type="text" id="email" name="email" required>
            </div>
            <div class="form-group">
              <label for="message"><h4>Zpráva:</h4></label>
              <textarea id="message" name="message" required></textarea>
            </div>
            <button type="submit" class="button">Odeslat</button>
          </form>
        </div>
        
        <footer>
            <?php
                include 'footer.php';
            ?>
        </footer>
    </body>
</html>
