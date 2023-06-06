<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>NaZMaLogy | Daftar Kursus</title>

    <!-- Required Style Components -->
    <?php include(APPPATH . 'views/partials/member/style.php'); ?>

    <!-- External CSS -->
    <link href="<?= base_url('assets/css/pages/member/course_list/style.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/search_front.css') ?>" rel="stylesheet">
</head>

<body>
    <!-- Header -->
    <?php include(APPPATH . 'views/layout/member/header.php'); ?>
    <!-- Header -->

    <!-- Content -->
    <?php include(APPPATH . 'views/components/member/course_list.php'); ?>
    <!-- Content -->

    <!-- Footer -->
    <?php include(APPPATH . 'views/layout/member/footer.php'); ?>
    <!-- Footer -->

    <!-- Script -->
    <script type="text/javascript" src="<?= base_url('assets/node_modules/jquery/dist/jquery.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/js/search.js') ?>"></script>
    <?php include(APPPATH . 'views/partials/member/script.php'); ?>
    <!-- Script -->
</body>


<body>

</body>

</html>