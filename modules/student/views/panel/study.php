<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>PDF</title>
  <meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

  <!-- Flipbook StyleSheet -->
  <link href="<?=base_url('assets/flip')?>/css/min.css" rel="stylesheet" type="text/css">
  <!-- Icons Stylesheet -->
  <link href="<?=base_url('assets/flip')?>/css/themify-icons.min.css" rel="stylesheet" type="text/css">

  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .ti-sharethis,.ti-download {
        display: none !important;
    }
  </style>
</head>

<body>

  <div id="flipbookContainer">
  </div>


  <!-- jQuery  -->
  <script src="<?=base_url('assets/flip')?>/js/libs/jquery.min.js" type="text/javascript"></script>
  <!-- Flipbook main Js file -->
  <script src="<?=base_url('assets/flip')?>/js/dflip.min.js" type="text/javascript"></script>
  <!-- Flipbook main Js file -->
  <script>
    jQuery(document).ready(function () {
      //uses source from online(make sure the file has CORS access enabled if used in cross-domain)
      var pdf = '<?=$url?>';
      var options = {
        height: 2000,
        duration: 700,
        backgroundColor: "#2F2D2F"
      };
      var flipBook = $("#flipbookContainer").flipBook(pdf, options);
      $(document).on('pdf-rendered', function () {
        // Remove share and more options buttons
        $('.ti-sharethis,.ti-download').remove();
      });

      // Alternatively, use a timeout if you don't have a specific event
      setTimeout(function () {
        $('.ti-sharethis,.ti-download').remove();
      }, 1000); // Adjust the delay if necessary based on loading time
    });
  </script>

</body>

</html>