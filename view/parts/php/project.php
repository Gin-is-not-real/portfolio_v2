<?php 
$img_folder_url = 'http://localhost/FORM_PROJETS/form_projet4_Portfolio_v2/static/img/';
?>

<section class="projet-section">
    <header>
        <h3><?= $data['project_title']; ?></h3>
        <p><?= $data['project_describe']; ?></p>
    </header>

    <div class="section-main" id="projet-main-content">
        <div class="div-container-screen">
            <figure class="figure-screen">
                <img class="img-screen ginfram-movingDemo-img vertical" src="<?= $img_folder_url . $data['project_image']; ?>">
            </figure>
        </div>
    </div>
    <footer>
        <nav class="nav-links">
            <a href="<?=$data['project_github']; ?>" target="_blank">
                <figure>
                    <img class="icon" src="<?= $img_folder_url; ?>icons/skills-color/icon-github-64.png" alt="icone git hub" width="64px" heigth="64px">
                </figure>
            </a>

            <a href="<?=$data['project_link']; ?>" target="_blank">
                <figure>
                    <img class="icon" src="<?= $img_folder_url; ?>icons/others/icon-extlink-64.png" alt="icone lien vers projet">
                </figure>
            </a>
        </nav>
</footer>
</section>