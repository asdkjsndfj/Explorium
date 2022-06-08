<?php
include 'backend/website.php';
include 'backend/componets.php';
buildHeader("Rules");
echo buildNavigation("Rules");
echo buildBanner();
?>

<body>
    <div class="container py-4">
        <div class="card shadow-sm">
            <div class="card-header">
                Rules
            </div>
            <div class="card-body">
                <ul>
                    <li>1. Do not post the invite ANYWHERE (Even though none exist)</li>
                    <li>2. Do not spam</li>
                    <li>3. Be kind</li>
                    <li>5. Do not exploit</li>
                    <li>6. Have fun</li>
                    <li>7. If you find any bugs, report them immediately</li>
                    <li>8. Dont be toxic; I know there is a rule like this, but it needs to be seen</li>
                    <li>9. Dont advertise your revival.</li>
                    <li>10. Showing ways to exploit the site. If done, you get auto IP banned.</li>
                </ul>
            </div>
        </div>
    </div>
    <?= buildFooter(); ?>
</body>