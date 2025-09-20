<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta content="Ajay Kumar Arya" name="author" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- SITE TITLE -->
    <title>
        <?php
        $pageName = $title;
        if (isset($isPrimary) && $isPrimary)
            echo ES('meta_title', $title);
        else {
            $pageName = "{page_name} - {title}";
            echo $pageName;
        }
        ?>
    </title>
    <!-- Favicon Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="{base_url}upload/{favicon_file}" />
    <meta name="keywords" content="<?= meta_keywords() ?>">

    <meta name="description" content="<?= ES('meta_description', $pageName) ?>">
    <meta name="language" content="English">
    <meta property="og:locale" content="en_GB">
    <meta property="og:url" content="{base_url}">
    <meta property="og:type" content="page">
    <meta property="og:title" content="<?= ES('og_title', $title) ?>">
    <meta property="og:description" content="<?= ES('og_description', $pageName) ?>">
    <meta property="og:image" content="{base_url}upload/{favicon_file}">
    <meta property="og:image:url" itemprop="image" content="{base_url}upload/{favicon_file}">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="600">
    <meta property="og:image:height" content="600">

    <link rel="canonical" href="{base_url}">
    <meta name="robots" content="index, follow">
    {link_css}

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->
    {basic_header_link}
    <script src="{base_url}assets/project.js"></script>
    <script type="application/ld+json">
    {
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "{title}",
    "url": "{base_url}",
    "logo": "{base_url}upload/{logo}"
    }
    </script>
    <?php
    
    ?>
</head>