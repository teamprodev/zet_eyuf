<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jquery-asBreadcrumbs@0.2.3/dist/css/asBreadcrumbs.css">
</head>
<body>

<ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Getting Started</a></li>
    <li class="breadcrumb-item"><a href="#">Library</a></li>
    <li class="breadcrumb-item active">
        <a href="#">Document</a>
    </li>
    <li class="breadcrumb-item"><a href="#">Components</a></li>
    <li class="breadcrumb-item"><a href="#">JavaScript</a></li>
    <li class="breadcrumb-item"><a href="#">Customize</a></li>
    <li class="breadcrumb-item">Data</li>
</ul>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-asBreadcrumbs@0.2.3/dist/jquery-asBreadcrumbs.js"></script>
<script>

    $('.breadcrumb').asBreadcrumbs({
        namespace: 'breadcrumb',
        overflow: "right",
        responsive: true,
        ellipsisText: "&#8230;",
        ellipsisClass: null,
        hiddenClass: 'is-hidden',
        dropdownClass: 'drop',
        dropdownMenuClass: null,
        dropdownItemClass: 'drop',
        dropdownItemDisableClass: 'block',
        toggleClass: null,
        toggleIconClass: 'caret',
        onInit: null,
        onReady: null
    });

</script>
</body>
</html>
