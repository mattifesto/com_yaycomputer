<?php

final class YCFrontPageListView {

    /**
     * @return [stdClass]
     */
    public static function fetchPages() {
        $SQL = <<<EOT

            SELECT  `published`, `subtitleHTML`, `thumbnailURL`, `titleHTML`, `URI`
            FROM `ColbyPages`
            WHERE `classNameForKind` = 'YCBlogPostPageKind' AND `published` IS NOT NULL
            ORDER BY `published` DESC
            LIMIT 10

EOT;

        return CBDB::SQLToObjects($SQL);
    }

    /**
     * @param stdClass $model
     *
     * @return null
     */
    public static function renderModelAsHTML(stdClass $model) {
        CBHTMLOutput::requireClassName(__CLASS__);

        $pages = YCFrontPageListView::fetchPages();
        $firstPage = array_shift($pages)

        ?>

        <div class="YCFrontPageListView">
            <div class="first">
                <?php YCFrontPageListView::renderPagePanel($firstPage, "rw1280"); ?>
            </div>
            <div class="container">
                <?php array_walk($pages, function ($page) { YCFrontPageListView::renderPagePanel($page); }); ?>
            </div>
        </div>

        <?php
    }

    /**
     * @param stdClass $page
     *
     * @return null
     */
    public static function renderPagePanel(stdClass $page, $imageSize = "rw640") {
        if ($image = CBImage::URIToImage($page->thumbnailURL)) {
            $filename = "{$imageSize}.{$image->extension}";
            $URL = CBDataStore::flexpath($image->ID, $filename, CBSiteURL);
        }

        ?>

        <a class="page" href="<?= CBSiteURL . "/{$page->URI}/" ?>">
            <figure class="image">
                <div>
                    <div>
                        <?php if (!empty($URL)) { ?>

                        <img src="<?= $URL ?>" alt="<?= $page->titleHTML ?>">

                        <?php } ?>
                    </div>
                </div>
            </figure>
            <h2 class="title"><?= $page->titleHTML ?></h2>
            <div class="description"><?= $page->subtitleHTML ?></div>
            <div><?= ColbyConvert::timestampToHTML($page->published) ?></div>
        </a>

        <?php
    }

    /**
     * @return [string]
     */
    public static function requiredCSSURLs() {
        return [Colby::flexnameForCSSForClass(CBSiteURL, __CLASS__)];
    }

    /**
     * @param stdClass $spec
     *
     * @return stdClass
     */
    public static function specToModel(stdClass $spec) {
        return (object)[
            'className' => __CLASS__,
        ];
    }
}
