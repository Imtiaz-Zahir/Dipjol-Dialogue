<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <link rel="icon" type="image/svg+xml" href="./favicon.ico" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="The website may feature video clips or compilations of Dipjol's dialogues, likely in the Bengali language, that are intended to entertain and amuse the viewers. It could be a source of light-hearted entertainment for fans of Dipjol or Bengali cinema in general.">

  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
  <title>Dipjol Dialogue</title>
  <link rel="stylesheet" href="./style.css">
</head>

<body class="bg-black text-white text-center">
<nav class="px-1 xs:px-2 sm:px-4 md:px-8 lg:px-16 xl:px-20 flex justify-between">
    <a href="./"><img class="h-10" src="./logo.png" alt=""></a>
    <form class="py-2 mr-2" method="get">
      <input class="border-2 border-gray-300 bg-black h-10 pl-2 pr-6 rounded-lg focus:outline-none" type="search"
        name="search" placeholder="Search">
      <button type="submit" name="submit" class="-ml-6">
        <i class="uil uil-search h-8 w-8 fill-current"></i>
      </button>
    </form>
  </nav>
  <section class="px-1 xs:px-2 sm:px-4 md:px-8 lg:px-16 xl:px-20 my-8">
    <h1 class="text-2xl border border-gray-300 p-2 mx-6 font-semibold rounded-xl">Most Used Dialogue</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 lg:grid-cols-3 my-6">
      <?php
      include './conation.php'; 
      if (isset($_GET['submit'])) {
        $search = $_GET['search'];

        $sql = "SELECT * FROM `dialogue` WHERE `search` LIKE '%$search%' or `tital` LIKE '%$search%'";
        
      }else{

        $sql = 'SELECT `tital`,`video` FROM `dialogue`';}

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          // output data of each row
          while ($row = $result->fetch_assoc()) {
            ?>
            <div class="m-4 rounded-xl border border-gray-300 overflow-hidden">
            <video class="w-full" controls>
                <source src="./videos/<?php echo $row["video"]; ?>" type="video/mp4">
              </video>
              <div class="p-4">
                <h2 class="text-xl font-medium my-2">
                  <?php echo $row["tital"]; ?>
                </h2>
                <hr>
                <div class="flex my-2 px-4 justify-between">
                  <a href="./videos/<?php echo $row["video"]; ?>" download class="flex items-center bg-slate-900 px-4 py-2"><i
                      class="uil uil-import mr-2"></i> Download</a>
                  <div class="flex items-center bg-slate-900 px-4 py-2 cursor-pointer"><i class="uil uil-copy mr-2"></i> Copy
                  </div>
                </div>
              </div>
            </div>

            <?php
          }
        } else {
          echo "0 results";
        }
      
      $conn->close();
      ?>
    </div>
  </section>
  <footer
    class="px-1 xs:px-2 sm:px-4 md:px-8 lg:px-16 xl:px-20 py-4 border-t border-gray-600 text-center w-full font-sans font-medium text-white text-xl">
    © Copy 2023 All Rights Reserved To <a href="./">Dipjol Dialogue</a>
  </footer>
  <script>
    const work = () => { document.getElementById('video').style.display = 'none' };
    const show = (url) => { document.getElementById('video').style.display = 'block'; document.getElementById('player').src = url }
  </script>
</body>

</html>